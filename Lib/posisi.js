$(document).ready(function(){
    Redisplay();
    var table;
    $("#btnModal").click(function(){
        $("#myModal").modal("show");
        clear();
    });
    function clear(){
        $('#ID_POSISI').val("0");
        $('#POSISI').val("");
        $('#GAPOK').val("");
    }
    function emptyStr(str) {
        return !str || !/[^\s]+/.test(str);
    };
    function Redisplay(){
    $('#data tbody').empty();
            $('#data').DataTable().destroy();
   table = $("#data").DataTable({
      "responsive": true, 
      "retrieve": true,
    "processing": true, // for show progress bar
    "searching": true, // this is for disable filter (search box)
    "length": 5,
    "ordering": true,
    "autoWidth": false,
      "ajax" : {
        "url": rootUrl+'posisi/getData',
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
        {"data": "ID_POSISI", "name": "ID_POSISI", "className": "text-center", "orderable": true, "autoWidth": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
        },
        { "data": "POSISI", "name": "POSISI", "autowidth": true },
        { "data": "GAPOK", "name": "GAPOK", "autowidth": true },
        { "data": "ID_POSISI","className": "text-center", "orderable":false, "render": function(data) {
                 return '<button type="button" class="btn btn-xs btn-info edit" value="' + data + '">&nbsp;<i class="fa fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger hapus" value="' + data + '">&nbsp;<i class="fa fa-trash"></i></button>';
                    },
                }
      ], columnDefs: [
                    {
                        target: [0],
                        orderable : false,
                        
                    },{
                        targets:[3],
                        className: "text-center"
                    }
                ],
    "dom": '<"top pull-right"f>rt<"row"<"col-sm-2"l><"col-sm-6 text-center"i><"col-sm-4"p>>',
    "order": [[0, 'asc']],
    "language": {
        "url":rootUrl+"../assets/Indonesia.json",
        "search": "",
        "searchPlaceholder": "Cari",
        "sEmptyTable": "No Data",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
    },
    });
}
$("#btnSimpan").click('click',function(){
    var ID = $("#ID_POSISI").val();
    var POSISI = $("#POSISI").val();
    var GAPOK = $("#GAPOK").val();
    var isValid = false;
if(emptyStr(POSISI)){
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
        url: rootUrl+ 'posisi/tambah/'+ID,
        type: "POST",
        data: { ID_POSISI:ID, POSISI : POSISI, GAPOK : GAPOK},
        async: false,
        success: function (data) {
        var dt =  JSON.parse(data);
            if (dt.success) {
            $("#myModal").modal("hide");
             Swal.fire(
             'Sukses',
             'Data Berhasil Disimpan',
             'success' );
            Redisplay();
                clear();
    } else{
        Swal.fire('Peringatan','Data Gagal Disimpan','warning');
        $("#myModal").modal("hide");

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
function Edit(id){
    clear();
    $.ajax({
        type: "GET",
        url: rootUrl + 'posisi/edit/'+id,
        success: function (data) {
            console.log(data);
            var data = JSON.parse(data);
            var ID = $("#ID_POSISI").val(data.ID_POSISI);
            var POSISI = $("#POSISI").val(data.POSISI);
            var GAPOK = $("#GAPOK").val(data.GAPOK);
            
            $("#myModal").modal('show'); 
            $("#pw").removeClass('hidden');
        }
    });
}
$("#data tbody").on('click','.hapus',function(){
        var $self = $(this);
        var nilai = $self.val();
        Hapus(nilai);
});
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
    url: rootUrl + 'posisi/hapus/'+id,
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