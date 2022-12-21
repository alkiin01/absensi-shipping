<style>
    .hidden{
        display: none;
    }
</style>
<div class="container-fluid">
        <div class="row mb-5">
    <div class="card col-md-12">
        <div class="card-header">
        <div class="py-3 d-flex justify-content-between align-content-center">
            <label class="h3">Data Master Posisi / Jabatan</label>
            <button type="button" class="btn btn-primary pull-right" id="btnModal" data-toggle="modal" data-target="#myModal">
             <i class="fas fa-plus"></i> &nbsp;Tambah Data
        </button>         
</div>
        </div>
        <div class="card-body">
                <?php
                if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }?>
                <table id="data" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                         <th style="width:1%; text-align:center; vertical-align:middle;">No</th>
                         <th style="width:5%; text-align:center; vertical-align:middle;">Nama Posisi</th>
                         <th style="width:5%; text-align:center; vertical-align:middle;">Gaji Pokok </th>
                         <th style="width:1%; text-align:center; vertical-align:middle;">Aksi</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>
           

</div> 
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Data Posisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="ID_POSISI" value="0">
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Nama Posisi</label>
                    <input type="text" id="POSISI" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Gaji Pokok</label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" id="GAPOK">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSimpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>Lib/posisi.js"></script>