<div class="container-fluid">
<div class="row mb-5">
<div class="card col-md-12">
    <div class="card-header">
    <div class="col-md-12 py-3 d-flex justify-content-between align-content-center">
            <label class="h3">Entri Data Pengiriman</label>
    </div>
    </div>
    <div class="card-body table-responsive">
    <div class="row col-md-3">
    <select id="bulan" class="form-control form-control-select">
    <option value="" class="text-center" selected disabled>- Silakan Pilih Bulan -</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    </div>
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
                        <th style="width:1%; text-align:center; vertical-align:middle;">Jumlah Masuk</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Sallary</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Shipment</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Pick Up</th>
                        <th style="width:1%; text-align:center; vertical-align:middle;">Insentif Shipment</th>
                        <th style="width: 2%; text-align:center; vertical-align:middle;">Insentif Pickup</th>
                        <th style="width: 2%; text-align:center; vertical-align:middle;">BPJS</th>
                        <th style="width: 2%; text-align:left; vertical-align:middle;">Lembur</th>
                        <th style="width: 2%; text-align:left; vertical-align:middle;">Kehadiran</th>
                        <th style="width: 2%; text-align:left; vertical-align:middle;">Sallary (Hold)</th>
                        <th style="width: 2%; text-align:left; vertical-align:middle;">THP</th>
                        <th style="width: 2%; text-align:left; vertical-align:middle;">Bulan</th>

                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <!-- <tr> -->
                            <th colspan="2" name="txtotal" style="text-align:right">Total Sallary:</th>
                            <th colspan="2" name="total"></th>
                            <th colspan="2" name="txtotals" style="text-align:left">Total Take Home Pay:</th>
                            <th colspan="8" name="totals"></th>
                        <!-- </tr> -->
                    </tfoot>

                </table>
    
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitleId">Entri Data Penggajian</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
              
            </div>
            <div class="modal-body">
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSimpan" class="btn btn-primary btnSimpan">Simpan</button>
            </div>
    </div>
</div>
</div>
<script src="<?php echo base_url(); ?>Lib/penggajian.js"></script>