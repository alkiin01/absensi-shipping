<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/highlighter.css">
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-scroller/css/scroller.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/docs.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/js/sweetalert2.min.css">
</head>
  <body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url()?>"></a>Form Login Karayawan
  </div>
  <?php 
echo validation_errors('<div class="alert alert-success fade show"> ','</div>');

//Notifikasi gagal login
  if($this->session->flashdata('salah')){
    echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">';
    echo $this->session->flashdata('salah');
    echo '</div>';
    $this->session->sess_destroy();
}

if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success alert-dismissable fade show" role="alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    $this->session->sess_destroy();
  }

  if($this->session->flashdata('warning')){
    echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">';
    echo $this->session->flashdata('warning');
    echo '</div>';
  }
?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <p class="login-box-msg">Silakan Masuk</p>
                    <div class="card-body"> 
                        <form action="<?= base_url('home/login'); ?> " method="POST">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="long" id="long">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
            </div></div>
   

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

</body>
</html>
    <script type="text/javascript">
        getLocation();

        function getLocation() {
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            }else{
                alert("Geolocation is not supported by this browser.");
            }
        
        }

        function showPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            document.getElementById('lat').value = lat;
            document.getElementById('long').value = long;
        }

    </script>