<div class="container-fluid">
<div class="row mb-5">
<div class="card col-md-12">
    <div class="card-header">
    <div class="col-md-12 py-3 d-flex justify-content-between align-content-center">
            <label class="h3">Entri Data Pengiriman</label>
            <button type="button" class="btn btn-primary pull-right" id="btnModal" data-toggle="modal" data-target="#myModal">
             <i class="fas fa-plus"></i> &nbsp;Tambah Data
        </button>         
    </div>
    </div>
    <div class="card-body table-responsive">
                <?php
                if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }?>
                <table id="data" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                        <th style="width:1%; text-align:center; vertical-align:middle;">No</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Nama Karyawan</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Posisi</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Shipment</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Pick Up</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Tanggal</th>
                        <th style="width: 2%; text-align:center; vertical-align:middle;">Aksi</th>
                        </tr>
                    </thead>
                </table>
    
</div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title" id="modalTitleId">Entri Data Pengiriman</h4>
                            <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="form-group row p-2">
                    <input type="hidden" id="id_pengiriman" value="0">
                    <div class="col-sm-12 my-2">
                        <label class="form-label">Nama karyawan</label>
                        <select id="karyawan" class="form-control"></select>
                    </div>
                    <div class="col-sm-12 my-2">
                        <label class="form-label">Posisi / Jabatan</label>
                        <input type="hidden" id="id_posisi" value="">
                        <input type="text" class="form-control" disabled id="posisi">
                    </div>
                    <div class="col-sm-6 ">
                        <label class="form-label">Shipment</label>
                        <input type="number" class="form-control" id="shipment" name="tlp">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Pickup</label>
                        <input type="number" class="form-control" id="pickup" name="tlp">

                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal">
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
<script src="<?= base_url(); ?>/lib/pengiriman.js"></script>