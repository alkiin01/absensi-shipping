$(document).ready(function () {
    GenTable()
    var table;
    function emptyStr(str) {
        return !str || !/[^\s]+/.test(str);
    };
    function formatMoney(number) {
        return number.toLocaleString('id-ID');
      }
    function GenTable(){
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
          columnDefs: [
            {
                target: [0],
                orderable : false,
                
            },{
                targets:[3],
                className: "text-center"
            }
        ],
        "dom": '<"top pull-right"f>rtn<"row"<"col-sm-2"l>nTf<"col-sm-6 text-center"i><"col-sm-4"p>>',
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
    $("#bulan").change(function(){
       var bulan = this.value
       Redisplay(bulan)
    })

    function Redisplay(bulan){
        $('#data tbody').empty();
        $('#data').DataTable().destroy();
        table = $("#data").DataTable({
            "responsive": false, 
            "retrieve": true,
          "processing": true, // for show progress bar
          "searching": true, // this is for disable filter (search box)
          "length": 5,
          "ordering": true,
          "autoWidth": false, 
          "buttons": [  
            "copy", "csv", 
            {
                extend : "excel", 
                "footer" : true,
                "customize": function ( win ) {
                    $(win.document.footer).find('table tfoot th:eq(0)' )
                    .attr('colspan',"2")
                    $(win.document.body).find('table tfoot th:eq(1)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(2)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(3)')
                    .attr('colspan',2)
                    $(win.document.body).find('table tfoot th:eq(4)')
                    .attr('colspan',2)
                    $(win.document.body).find('table tfoot th:eq(5)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(6)')
                    .attr('colspan',9)
                    $(win.document.body).find('table tfoot th:eq(7)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(8)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(9)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(10)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(11)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(12)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(13)').text("")
                        // $(win.document.body).find('table tfoot th:eq(3)')
    
                        // $(win.document.body).find('table tfoot th[ name="totals"]')
                        // .attr('colspan',9)
                },
              }, 
            {
                extend : "pdf", 
                "footer" : true,
                "customize": function ( win ) {
                    $(win.document.footer).find('table tfoot th:eq(0)' )
                        .attr('colspan',"2")
                        $(win.document.body).find('table tfoot th:eq(1)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(2)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(3)')
                        .attr('colspan',2)
                        $(win.document.body).find('table tfoot th:eq(4)')
                        .attr('colspan',2)
                        $(win.document.body).find('table tfoot th:eq(5)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(6)')
                        .attr('colspan',9)
                        $(win.document.body).find('table tfoot th:eq(7)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(8)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(9)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(10)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(11)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(12)')
                        .css('display','none')
                        $(win.document.body).find('table tfoot th:eq(13)')
                        .css('display','none')
                        // $(win.document.body).find('table tfoot th:eq(3)')
    
                        // $(win.document.body).find('table tfoot th[ name="totals"]')
                        // .attr('colspan',9)
                },
              },{
            extend : "print", 
            "footer" : true,
            "customize": function ( win ) {
                $(win.document.footer).find('table tfoot th:eq(0)' )
                    .attr('colspan',"2")
                    $(win.document.body).find('table tfoot th:eq(1)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(2)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(3)')
                    .attr('colspan',2)
                    $(win.document.body).find('table tfoot th:eq(4)')
                    .attr('colspan',2)
                    $(win.document.body).find('table tfoot th:eq(5)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(6)')
                    .attr('colspan',9)
                    $(win.document.body).find('table tfoot th:eq(7)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(8)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(9)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(10)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(11)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(12)')
                    .css('display','none')
                    $(win.document.body).find('table tfoot th:eq(13)')
                    .css('display','none')
                    // $(win.document.body).find('table tfoot th:eq(3)')

                    // $(win.document.body).find('table tfoot th[ name="totals"]')
                    // .attr('colspan',9)
            },
          },"colvis"],
          "ajax" : {
            "url": rootUrl+'penggajian/getDataGaji/'+bulan+'',
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
            { "data": "jumlah_masuk", "nama": "jumlah_masuk", "autowidth": true, "className" : 'text-left wrap-text' },
            { "data": "gapok", "name": "GAPOK", "autowidth": true, "className" : 'wrap-text',
                render:function(data, type, row, meta){
                    return "Rp. "+ Number(data).toLocaleString('id-ID', {
                        maximumFractionDigits: 2,
                })
            }
        },
            { "data": "shipment", "name": "shipment", "autowidth": true, "className" : 'text-left wrap-text' },
            { "data": "pick_up", "name": "pick_up", "autowidth": true, "className" : 'text-left wrap-text' },
            { "data": "insentif_shipment", "name": "insentif_shipment", "autowidth": true, "className" : 'text-left wrap-text' },
            { "data": "insentif_pickup", "name": "insentif_pickup", "autowidth": true, "className" : 'text-left wrap-text',render:function(data, type, row, meta){
                return "Rp. "+ Number(data).toLocaleString('id-ID', {
                    maximumFractionDigits: 2,
            }) }
        },
            { "data": "BPJS", "name": "BPJS", "autowidth": true, "className" : 'text-left' },
            { "data": "lembur", "name": "lembur", "autowidth": true, "className" : 'text-left' },
            { "data": "kehadiran", "name": "kehadiran", "autowidth": true, "className" : 'text-left' },
            { "data": "hold_sallary", "name": "hold_sallary", "autowidth": true, "className" : 'text-left' },
            { "data": "thp", "name": "thp", "autowidth": true, "className" : 'text-left',
                    render: function (data, type, row, meta) {
                        return "Rp. "+Number(data).toLocaleString('id-ID', {
                            maximumFractionDigits: 2,
                    })
                    }        
            },
            { "data": "bulan", "name": "bulan", "autowidth": true },
          ],
          columnDefs: [
            {
                target: [0],
                orderable : false,
                
            },{
                targets:[13],
                className: "text-left",
                render:function(data, type, row, meta){
                    
                    switch(data){
                        case "1" : return "Januari"; break;
                        case "2" : return "Februari"; break;
                        case "3" : return "Maret"; break;
                        case "4" : return "April"; break;
                        case "5" : return "Mei"; break;
                        case "6" : return "Juni"; break;
                        case "7" : return "Juli"; break;
                        case "8" : return "Agustus"; break;
                        case "9" : return "September"; break; 
                        case "10" : return "Oktober"; break;
                        case "11" : return "November"; break;
                        case "12" : return "Desember"; break;
                    }
                }
        }],
        "dom": '<"top pull-right"fB>rttf<"row"<"col-sm-2"l><"col-sm-6 text-center"i><"col-sm-4"p>>',
        "order": [[0, 'asc']],
        "language": {
        "url":rootUrl+"../assets/Indonesia.json",
        "search": "",
        "searchPlaceholder": "Cari",
        "sEmptyTable": "No Data",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
        },
        footerCallback: function (row, data, start, end, display){
            var api = this.api();
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\R\p\.,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            // Total over all pages
            total = api
                .column(3)
                .data()
                .reduce(function (a, b) {
                    var c =  intVal(a) + intVal(b);
                    return Number(c).toLocaleString('id-ID', {
                        maximumFractionDigits: 2,
                })
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    var c =  intVal(a) + intVal(b);
                    return Number(c).toLocaleString('id-ID', {
                        maximumFractionDigits: 2,
                })
                }, 0);
 
 
            // Total over this page
            pageTotals = api
                .column(12, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    var c =  intVal(a) + intVal(b);
                    return Number(c).toLocaleString('id-ID', {
                        maximumFractionDigits: 2,
                })
                }, 0);
 
            // Update footer
            $(api.column(3).footer()).html('Rp. ' + pageTotal);
            $(api.column(6).footer()).html('Rp. ' + pageTotals);

        }
})
table.buttons().container().appendTo('#data_wrapper .col-md-12:eq(0)').addClass('.btn .btn-info ');
;
}
    
});