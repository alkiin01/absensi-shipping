$(document).ready(function(){
    Redisplay();
    function emptyStr(str) {
        return !str || !/[^\s]+/.test(str);
    };
    function clear(){
        $("#id_pengiriman").val("0");
        $("#karyawan").val("");
        $("#id_posisi").val("");
        $("#posisi").val("");
        $("#shipment").val("");
        $("#pickup").val("");
        $("#tanggal").val("");
    }
    var data;
    function Redisplay(){
        $('#data tbody').empty();
        $('#data').DataTable().destroy();

        data = $("#data").DataTable({
            "processing": true, // for show progress bar
            "searching": true, // this is for disable filter (search box)
            "ordering": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "ajax":{
                "url": rootUrl+'/pengiriman/getData',
                "type": "POST",
                "dataFilter": function (reps) {
                    console.log(reps);
                    return reps;
                },
                "error": function (err) {
                    console.log(err);
                }
            },
            "columns":[
                {"data": "id_pengiriman", "name": "id_pengiriman", "className": "text-center", "orderable": true, "autoWidth": false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                },
                { "data": "nama", "name": "nama", "autowidth": true },
                { "data": "posisi", "name": "posisi", "autowidth": true },
                { "data": "shipment", "name": "shipment", "autowidth":true},
                 { "data": "pickup", "name": "pickup", "autowidth": true },
                { "data": "tanggal", "name": "tanggal_keluar", "autowidth": true },
                { "data": "id_pengiriman", "orderable":false, className:"text-center","render": function(data) {
                         return '<span class="text-center"><button type="button" class="btn btn-xs btn-info edit" value="' + data + '">&nbsp;<i class="fa fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger hapus" value="' + data + '">&nbsp;<i class="fa fa-trash"></i></button></span>';
                            }, 
                        }
              ], columnDefs: [
                            {
                                targets: [0],
                                orderable : false
                            }
                        ],
            "dom": '<"top pull-right"f>rt<"row"<"col-sm-2"l><"col-sm-6 text-center"i><"col-sm-4"p>>',   
                     "order": [[0, 'asc']],
            "language": {
                "search": "",
                "url":rootUrl+"../assets/Indonesia.json",
                "searchPlaceholder": "Cari",
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            }
        });
    data.buttons().container().appendTo('#data_wrapper .col-md-12:eq(0)').addClass('.btn .btn-info ');
    }
    $("#btnModal").click(function(){
        clear();
    getKaryawan();
        
    });
    function clear(){
        $('#id_pengiriman').val("0");
        $('#karyawan').val("");
        $('#id_posisi').val("");
        $('#posisi').val("");
        $('#shipment').val("");
        $('#ALAMAT').val("");
        $('#pickup').val("");
        $('#PASSWORD').val("");
        $('#akses_level').val("");
        $("#myModal").modal('hide');
    }
    function getKaryawan(){
        $.ajax({
            type: "GET",
            url: rootUrl +"pengiriman/getKaryawan",
            success: function (data) {
                console.log(data);
                var data = JSON.parse(data);
                $("#karyawan").empty();
                $.each(data, function(index,value){
                    $("#karyawan").append("<option value="+value.id_karyawan+">"+value.nama+"</option>")
                });
                $("#karyawan").change(function(e){
                    e.preventDefault();
                    var s = this.selectedIndex
                    var a = data[s];
                    console.log(a);
                    $("#posisi").val(a.POSISI)
                    $("#id_posisi").val(a.ID_POSISI)
                });
                
            }
        });
    }
    $("#btnSimpan").click('click',function(){
        var id = $("#id_pengiriman").val();
        var karyawan = $("#karyawan").val();
        var id_posisi = $("#id_posisi").val();
        var shipment = $("#shipment").val();
        var pickup = $("#pickup").val();
        var tanggal = $("#tanggal").val();
        var isValid = false;
    if(emptyStr(karyawan)||emptyStr(id_posisi)||emptyStr(shipment)||emptyStr(pickup)){
        Swal.fire(
                 'Informasi',
                 'Silakan Lengkapi Data',
                 'warning');
                 isValid = false;
    }else{
        isValid = true;
    }
    if(isValid){
        $.ajax({
            url: rootUrl+ 'pengiriman/tambah/'+id,
            type: "POST",
            data: { id:id,id_karyawan:karyawan, id_posisi:id_posisi,shipment:shipment,pickup:pickup, tanggal:tanggal},
            async: false,
            success: function (data) {
            var dt =  JSON.parse(data);
                if (dt.success) {
                $("#modalId").modal("hide");
                 Swal.fire(
                 'Sukses',
                 'Data Berhasil Disimpan',
                 'success' );
                Redisplay();
                    clear();
        } 
    }, 
        });
        }
    });
    $("#data tbody").on('click','.edit',function(){
        var $self = $(this);
        var nilai = $self.val();
        Edit(nilai);
    });
    $("#data tbody").on('click','.hapus',function(){
            var $self = $(this);
            var nilai = $self.val();
            Hapus(nilai);
    });
    function Edit(id){
        clear();
        $.ajax({
            type: "GET",
            url: rootUrl + 'pengiriman/edit/'+id,
            success: function (data) {
                getKaryawan();
                console.log(data);
                $("#myModal").modal("show");
                var data = JSON.parse(data);
                $("#id_pengiriman").val(data.id_pengiriman);
                $("#karyawan").val(data.id_karyawan);
                $("#id_posisi").val(data.ID_POSISI);
                $("#posisi").val(data.POSISI);
                $("#shipment").val(data.shipment);
                $("#pickup").val(data.pickup);
                $("#tanggal").val(data.tanggal);
                }
        });
    }
    function Hapus(id){
        Swal.fire({
            title: 'Ingin Menghapus Data?',
            icon : 'warning',
            text:'Data yang sudah dihapus tidak bisa dipulihkan',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus',
            denyButtonText: `Hapus`,
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
            type: "GET",
            url: rootUrl + 'pengiriman/hapus/'+id,
            success: function (data) {
                console.log(data);
                var data = JSON.parse(data);
                if(data.success){
            clear();
                Swal.fire('Data berhasil dihapus', '', 
                'success',
                Redisplay())
            }
            }
        });
            } 
            })
    }
});