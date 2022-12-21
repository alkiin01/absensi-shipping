$(document).ready(function(){
    $("#btnModal").click(function(){
        $("#modalId").modal("show");
        clear();
    });
    function emptyStr(str) {
        return !str || !/[^\s]+/.test(str);
    };
    Redisplay();
    var table = null;
function Redisplay(){
    $('#dataKaryawan tbody').empty();
            $('#dataKaryawan').DataTable().destroy();
   table = $("#dataKaryawan").DataTable({
      "responsive": true, 
    "processing": true, // for show progress bar
    "searching": true, // this is for disable filter (search box)
    "length": 9,
    "ordering": true,
    "autoWidth": false,
     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

      "ajax" : {
        "url": rootUrl+'/karyawan/getData',
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
        {"data": "id_karyawan", "name": "id_karyawan", "className": "text-center", "orderable": true, "autoWidth": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
        },
        { "data": "nama", "name": "nama", "autowidth": true },
        { "data": "jenkel", "name": "jenkel", "autowidth": true },
        { "data": "tlp", "name": "tlp", "autowidth": true },
        { "data": "alamat", "name": "alamat", "autowidth": true },
        { "data": "posisi", "name": "posisi", "autowidth":true},
         { "data": "tanggal_masuk", "name": "tanggal_masuk", "autowidth": true },
        { "data": "tanggal_keluar", "name": "tanggal_keluar", "autowidth": true },
        { "data": "id_karyawan", "orderable":false, className:"text-center","render": function(data) {
                 return '<span class="text-center"><button type="button" class="btn btn-xs btn-info edit" value="' + data + '">&nbsp;<i class="fa fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger hapus" value="' + data + '">&nbsp;<i class="fa fa-trash"></i></button></span>';
                    }, 
                }
      ], columnDefs: [
                    {
                        targets: [0],
                        orderable : false
                    }
                ],
                "dom": '<"top pull-right"f>rt<"row"<"col-sm-2"l><"col-sm-6 text-center"i><"col-sm-4"p>>',    "order": [[0, 'asc']],
    "language": {
        "search": "",
        "url":rootUrl+"../assets/Indonesia.json",
        "searchPlaceholder": "Cari",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
    },
    })
    table.buttons().container().appendTo('#dataKaryawan_wrapper .col-md-12:eq(0)').addClass('.btn .btn-info ');
}
    $("#btnSimpan").click('click',function(){
                var ID = $("#ID_KARYAWAN").val();
                var NAMA = $("#NAMA").val();
                var JENIS_KELAMIN = $("#JENIS_KELAMIN :selected").val();
                var NOHP = $("#TLP").val();
                var ALAMAT = $("#ALAMAT").val();
                var USERNAME = $("#USERNAME").val();
                var PASSWORD = $("#PASSWORD").val();
                var AKSES = $("#akses_level").val();
                var MASUK = $("#TANGGAL_MASUK").val();
                var KELUAR = $("#TANGGAL_KELUAR").val() ?? String.empty ;
                
                var isValid = false;
            if(emptyStr(NAMA)||emptyStr(JENIS_KELAMIN)||emptyStr(NOHP)||emptyStr(ALAMAT)||emptyStr(USERNAME)){
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
                    url: rootUrl+ 'karyawan/tambah/'+ID,
                    type: "POST",
                    data: { id:ID, nama : NAMA, jenkel : JENIS_KELAMIN, 
                        tlp : NOHP, alamat: ALAMAT, username:USERNAME,
                        password:PASSWORD, akses_level:AKSES,tanggal_masuk:MASUK },
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
    $("#dataKaryawan tbody").on('click','.edit',function(){
            var $self = $(this);
            var nilai = $self.val();
            Edit(nilai);
    });
    $("#dataKaryawan tbody").on('click','.hapus',function(){
            var $self = $(this);
            var nilai = $self.val();
            Hapus(nilai);
    });
    function clear(){
        $('#ID_KARYAWAN').val("0");
        $('#NAMA').val("");
        $('#JENIS_KELAMIN').val("");
        $('#TLP').val("");
        $('#ALAMAT').val("");
        $('#USERNAME').val("");
        $('#PASSWORD').val("");
        $('#akses_level').val("");
        $("#pw").addClass('hidden');

    }
    function Edit(id){
        clear();
        $.ajax({
            type: "GET",
            url: rootUrl + 'karyawan/edit/'+id,
            success: function (data) {
                console.log(data);
                var data = JSON.parse(data);
                $('#ID_KARYAWAN').val(data.id_karyawan);
                $('#NAMA').val(data.nama);
                $('#JENIS_KELAMIN').val(data.jenkel);
                $('#TLP').val(data.tlp);
                $('#ALAMAT').val(data.alamat);
                $('#USERNAME').val(data.username);
                $('#PASSWORD').val("");
                $('#akses_level').val(data.ID_POSISI);
                $('#TANGGAL_MASUK').val(data.tanggal_masuk)
                $('#TANGGAL_KELUAR').val(data.tanggal_keluar)
                $("#modalId").modal('show'); 
                $("#pw").removeClass('hidden');
            }
        });
    }
    function Hapus(id){
            Swal.fire({
            title: 'Ingin Menghapus Data?',
            icon : 'warning',
            textContent:'Data yang sudah dihapus tidak bisa dipulihkan',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus',
            denyButtonText: `Hapus`,
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
            type: "GET",
            url: rootUrl + 'karyawan/hapus/'+id,
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
    GetPosisi();

    function GetPosisi(){
        $.ajax({
            type: "GET",
            url: rootUrl + 'karyawan/getDataPosisi',
            dataType: "JSON",
            async: false,
            success: function (data) {
                console.log(data);
                var data = JSON.parse(data);
                $('#akses_level').append('<option value="" selected> -Silakan Pilih Posisi atau Jabatan- </option>');
                $.each(data.data, function (index, value) {
                    $('#akses_level').append('<option value = "' + value.ID_POSISI + '" > ' + value.POSISI + '</option > ');
                });
            },
        });
    }
   
});