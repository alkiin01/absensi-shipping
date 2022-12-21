<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $title; ?></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/highlighter.css">
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-scroller/css/scroller.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/docs.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/js/sweetalert2.min.css">
<style>
  .login-box{
    background-position: "";
  }
  .login-img{
    padding: 30px 0;
    margin: 0 auto;
    background:url("<?= base_url()?>assets/sss.jpg") no-repeat;
        /*background-image: url('../images/meeting.png');*/
    background-size: cover;
    min-height: 100vh;
    min-width: 50px;
  }
  .login-page{
    background-color: transparent;
  }
  /* .absensi{
  -ms-flex-align: center;
    align-items: center;
  display: flex;
  justify-content: center;
  margin-top :100px;
  } */
  button{
    width: 150px;
    max-width: 150px;
  }
  .custom-map-control-button {
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  margin: 10px;
  padding: 0 0.5em;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
  height: 40px;
  cursor: pointer;
}
.custom-map-control-button:hover {
  background: rgb(235, 235, 235);
}

</style>
</head>
<body data-scrollbar-auto-hide="true" class=" login-img" >
  
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jquery/jquery.js"></script>
<script src="<?=base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.modal.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url() ?>assets/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/fontawesome-free-6.2.0-web/js/all.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/dataTables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>

<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>

<script>
  var akarUrl ="<?= base_url(); ?>/";

</script>
<div class="login-page">
<?php $username = $_SESSION['username']; $id = $_SESSION['id_karyawan']; $nama = $_SESSION['nama']; $posisi = $_SESSION['id_posisi']; ?>
<div class= "card shadow-lg px-0"> 
<div class="login-box">
    <div class="login-logo bg-outline-primary py-3 rounded my-0">
    <p class="h3 ">Absensi</p>
    <h1 class="text-center login-box-msg" id="waktu"></h1>
  </div>
  <div class="card-body login-card-body"> 
    <input type="hidden" id="longitude">
    <input type="hidden" id="latitude">
    <input type="hidden" id="id_karyawan" value="<?= $id;?>">
    <input type="hidden" id="id_posisi" value="<?= $posisi;?>">
    <input type="hidden" id="nama" value="<?= $nama;?>">
    <input type="hidden" id="username" value="<?= $username;?>">

      <div class="col-12 d-flex justify-content-center align-content-center mx-0">
      <button class="btn btn-outline-primary btn-lg" id="MASUK" value="1"><i class="fas fa-sign-in"></i> Masuk</button>
        <button class="btn btn-outline-primary btn-lg ml-3" id="KELUAR" value="1"><i class="fas fa-sign-out"></i> Keluar</button>
        </div>

        <div class="col-sm-12 d-flex justify-content-center align-content-center my-3 ">
      <button class="btn btn-outline-primary btn-lg" id="SHIPMENT"><i class="fas fa-boxes-packing"></i> Shipment</button>
        <button class="btn btn-outline-primary btn-lg ml-3" id="PICKUP"><i class="fas fa-dolly"></i> <br>Pickup</button>
        </div>
        <div class="col-sm-12 d-flex justify-content-center my-3">
        <button class="btn btn-outline-danger btn-lg" id="logout"><i class="fas fa-power-off"></i> Logout</button>
        </div>
        </div>

        </div>
      </div>
    </div>
    </div>
</div>
</body>

<script src="<?= base_url() ?>lib/absen.js"></script>
      
</html>