<style>
  .hidden{
    display: none;
  }
</style>
<div class="container-fluid">
<div class="row mb-5">
<div class="card col-md-12">
    <div class="card-header">
    <div class="col-md-12 py-3 d-flex justify-content-between align-content-center">
            <label class="h3">Data Karyawan</label>
            <button type="button" class="btn btn-primary pull-right" id="btnModal" data-toggle="modal" data-target="#modalId">
             <i class="fas fa-plus"></i> &nbsp;Tambah Data
        </button>         
    </div>
    </div>
                <?php
                if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }?>
    <div class="card-body table-responsive">
                <table id="dataKaryawan" class="table table-bordered table-striped table-hover ">
                    <thead>
                        <tr>
                        <th style="width:1%; text-align:center; vertical-align:middle;">No</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Nama</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Jenis Kelamin</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Handphone</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Alamat</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Jabatan</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Tanggal Masuk</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Tanggal Keluar</th>
                        <th style="width: 2%; text-align:center; vertical-align:middle;">Aksi</th>
                        </tr>
                    </thead>
                </table>
    
</div></div>
  
</div>
</div> 
<!-- Modal -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title" id="modalTitleId">Tambah Data Karyawan</h4>
                            <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="form-group row p-2">
                    <input type="hidden" id="ID_KARYAWAN" value="0">
                    <div class="col-sm-4">
                        <label class="form-label">Nama karyawan</label>
                        <input type="text" id="NAMA" class="form-control" name="nama">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="kelamin" id="JENIS_KELAMIN" class="form-control">
                            <option value="">--Pilih Jenis kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="TLP" name="tlp">
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="ALAMAT" class="form-control" cols="38" rows="5"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" id="TANGGAL_MASUK" class="form-control border-success"/>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Tanggal Keluar</label>
                        <input type="date" id="TANGGAL_KELUAR" class="form-control"/>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" id="USERNAME" name="username">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="PASSWORD" name="password">
                        <small class="text-danger hidden" id="pw" >* Untuk mengganti Password silakan masukan minimal 6 karakter</small>
                    </div>
                    <div class="col-md-12">
                        <label for="akses_level" class="form-label">Jabatan </label>
                        <select id="akses_level" class="form-control">
                        </select>
                    </div>
                 </div> 

                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSimpan" class="btn btn-primary btnSimpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?= base_url()?>Lib/karyawan.js">
</script>