<!doctype html>
<html lang="en">
  <head>
        <?php $this->load->view('admin/_partials/head'); ?>
  </head>
  <body>
  <?php $this->load->view('admin/_partials/menu'); ?>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12 py-3">
                <h3>Data Petugas Absensi</h3>
                <?php
                if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }
                ?><table class="table">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>username</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($petugas as $data) : ?>
                            <tr>
                                <th><?= $no; ?></th>
                                <td><?= $data->nama_petugas; ?></td>
                                <td><?= $data->username; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/petugas/ubah/'. $data->id_petugas ); ?>"
                                    class="btn btn-small btn-info">ubah</a>
                                    <a href="<?= base_url('admin/petugas/hapus/'. $data->id_petugas ); ?>"
                                    class="btn btn-small btn-danger">hapus</a>
                            </td>
                        </tr>
                        <?php $no++;
                         endforeach; ?>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/petugas/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div> 
        <?php $this->load->view('admin/_partials/footer'); ?>
    </div>
    <?php $this->load->view('admin/_partials/bottom'); ?>
  </body>
</html>