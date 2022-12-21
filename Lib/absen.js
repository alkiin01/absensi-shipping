$(document).ready(function () {
    CheckAbsen();
     var waktu = new Date();
      var jam = waktu.getHours("");
      var menit = waktu.getMinutes("");
      menit = ("0" + menit).slice(-2);
      jam = ("0" + jam).slice(-2)
    $("#waktu").text(jam +":"+ menit)

function getLocation() {
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }else{
        alert("Geolocation is not supported by this browser.");
    }

}
var lat,longi;
function showPosition(position) {
     lat = position.coords.latitude;
     longi = position.coords.longitude;
}
$("#logout").click(function(){
    Swal.fire({
  title: 'Apakah anda yakin ingin keluar dari halaman ?',
  icon:'question',
  showCancelButton: true,
  confirmButtonText: '<i class="fa fa-sign-out"></i>  Keluar',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.href = akarUrl+'admin/masuk/keluar'; 
  }
  });
});
getLocation();

//#region ABSEN MASUK
    $("#MASUK").click(function(){
        var id_karyawan = $("#id_karyawan").val();
        var id_posisi = $("#id_posisi").val();
        var longitude = longi;
        var latitude = lat;
        var masuk = 1;
        var keluar = 0;
        $.ajax({
            url: akarUrl+'presensi/absen',
            type: "POST",
            data: { id_karyawan : id_karyawan, id_posisi:id_posisi,longitude:longitude,latitude:latitude, masuk : masuk, keluar:keluar},
            async: false,
            success: function (data) {
                console.log(data);
            var dt =  JSON.parse(data);
                if (dt.success) {
                 Swal.fire(
                 'Sukses',
                 'Absen Berhasil',
                 'success',
                 CheckAbsen()
                         );
        } 
    }, 
        });
    
    });

    $("#KELUAR").click(function(){
        var id_karyawan = $("#id_karyawan").val();
        var id_posisi = $("#id_posisi").val();
        var longitude = longi;
        var latitude = lat;
        var masuk = 0;
        var keluar = 1;
        $.ajax({
            url: akarUrl+'presensi/absen',
            type: "POST",
            data: { id_karyawan : id_karyawan, id_posisi:id_posisi,longitude:longitude,latitude:latitude, masuk : masuk, keluar:keluar},
            async: false,
            success: function (data) {
                console.log(data);
            var dt =  JSON.parse(data);
                if (dt.success) {
                 Swal.fire(
                 'Sukses',
                 'Absen Keluar Berhasil',
                 'success',CheckAbsen() );
                   
        }
    } 

    });
});
//#endregion
    $("#SHIPMENT").click(function(){
        alert();
    });

    function CheckAbsen(){
        var id_karyawan = $("#id_karyawan").val();
        $.ajax({
            type: "POST",
            url:  akarUrl+'presensi/cekabsenmasuk',
            data: {id_karyawan : id_karyawan},
            async: false,
            success: function (data) {
            var dt =  JSON.parse(data);
                if (dt.masuk == 0){
                    $("#MASUK").prop("disabled",false);
                } else{
                    $("#MASUK").prop("disabled",true);
                }
                if(dt.keluar == 0){
                    $("#KELUAR").prop("disabled",false);
                }else{
                    $("#KELUAR").prop("disabled",true);
                }
            }
        });
    }
});