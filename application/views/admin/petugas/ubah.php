<!doctype html>
<html lang="en">
  <head>
        <?php $this->load->view('admin/_partials/head'); ?>
  </head>
  <body>
  <?php $this->load->view('admin/_partials/menu'); ?>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-6 py-3 mx-auto">
                <div class="card">
            <div class="card-header">
                Ubah Data Petugas
            </div>
                <div class="card-body">
                <form action="<?= base_url('admin/petugas/subah'); ?>" method="POST">
                 <?php foreach($cari as $data): ?>   
                    <input type="hidden" name="kode" value="<?= $data->id_petugas; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data->nama_petugas; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $data->username; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div> 
        <?php $this->load->view('admin/_partials/footer'); ?>
    </div>
    <?php $this->load->view('admin/_partials/bottom'); ?>
  </body>
</html>