
<div class="container-fluid">
<div class="row">
<div class="card my-3 col-md-12">
<div class="card-header">
    <div class="col-md-12 py-0 d-flex justify-content-between align-content-center">
            <label class="h3">Selamat Datang, <?= $_SESSION['nama'];?></label>
    </div>
    </div>
<div class="card-body">
<div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $kirim;?></h3>
                <p>Total Shipment</p>
              </div>
              <div class="icon">
                <i class="fa fa-box-open"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $absen?></h3>
                <p>Total Absent</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $emp?></h3>
                <p>Total Karyawan</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-boxes-packing"></i> Shipment & Pickup Bulanan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Shipment</th>
                        <th>Pick Up</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($dt as $dt) {?>
                    <tr>
                        <td><?= $dt->nama; ?></td>
                        <td><?= $dt->shipment; ?></td>
                        <td><?= $dt->pickup; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Absen Hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jam Masuk</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($dta as $dta) {?>
                    <tr>
                        <td><?= $no.'.'; ?></td>
                        <td><?= $dta->nama;; ?></td>
                        <td><?= $dta->jam_absen; ?></td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>
</div>
</div>
</div>
</div>