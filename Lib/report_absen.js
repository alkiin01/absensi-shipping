$(document).ready(function () {
    var table;
    Redisplay();
    function emptyStr(str) {
        return !str || !/[^\s]+/.test(str);
    };
    $("#jenis").change(function (e) { 
        e.preventDefault();
        var nilai = this.value;
        if(nilai == 1 ){
            $("#bln").removeClass("hidden");
            $("#tgl").addClass("hidden");
            $("#tanggal").val("")
        }else if(nilai == 2){
            $("#tgl").removeClass("hidden");
            $("#bln").addClass("hidden");
            $("#bulan").val("");
        }else{
            $("#bln").addClass("hidden");
            $("#tgl").addClass("hidden")
        }
    });
    $("#generate").click(function(e){
        e.preventDefault();
        var jenis = $("#jenis").val();
        var tgl = $("#tanggal").val();
        var bln = $("#bulan").val();
        isValid = false;
        if(!emptyStr(jenis) && !emptyStr(tgl)){
            getDataAbsensiHarian()
        }else if(!emptyStr(jenis) && !emptyStr(bln)){
            alert(bln)
            
        }else{
            Swal.fire("Peringatan","Silakan Lengkapi data","warning");
        }
    });
    var st = new Date();
    var ed = new Date();
    var start = moment(st);
    var end = moment(ed);
    function cb (start, end){
        $('#getReport span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $("#getReport").daterangepicker({
        startDate: start,
      endDate: end,
      ranges: {
        'Hari ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Minggu ini': [moment().subtract(6, 'days'), moment()],
        '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);
    cb(start, end);

    $("#getReport").on('apply.daterangepicker',function(ev,picker){
        var start = picker.startDate;
        var end = picker.endDate;
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
              var min = start;
              var max = end;
              var startDate = new Date(data[2]);
              
              if (min == null && max == null) {
                return true;
              }
              if (min == null && startDate <= max) {
                return true;
              }
              if (max == null && startDate >= min) {
                return true;
              }
              if (startDate <= max && startDate >= min) {
                return true;
              }
              return false;
            }
          );
          table.draw();
          $.fn.dataTable.ext.search.pop();
    });

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
                "url": rootUrl+'report/getDataAbsensi',
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
                {"data": "id_absen", "name": "id_absen", "className": "text-center", "orderable": true, "autoWidth": false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                },
                { "data": "nama", "name": "POSISI", "autowidth": true },
                { "data": "tgl_absen", "name": "tgl_absen", "autowidth": true },
                { "data": "jam_masuk", "name": "jam_masuk", "autowidth": true },
                { "data": "jam_keluar", "name": "jam_keluar", "autowidth": true },
                
              ],
            columnDefs: [
                {
                    target: [0],
                    orderable : false,
                    
                },{
                    targets:[3],
                    className: "text-center"
                }
            ],
        "dom": '<"top pull-left"Bf>rt<"row"<"col-sm-2"l><"col-sm-6 text-center"i><"col-sm-4"p>>',
        "order": [[0, 'asc']],
        "language": {
        "url":rootUrl+"../assets/Indonesia.json",
        "search": "",
        "searchPlaceholder": "Cari",
        "sEmptyTable": "No Data",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
        },

    })
        table.buttons().container().appendTo('#data_wrapper .col-md-12:eq(0)').addClass('.btn .btn-info ');
    }
    function getDataAbsensiHarian(){
        $.ajax({
            type: rootUrl+"report/getDataAbsensiHarian",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    }
});