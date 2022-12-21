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
            <label label class="h3">Laporan Data Absensi</label>

            </div>

            <div class="row col-md-12 d-flex justify-content-between align-content-center">
                <div class="col-md-4">
                    <button class="btn btn-primary" id="getReport"><i class="fas fa-eye"></i> Lihat Data</button>
                    <!-- <label for="tanggal"> Jenis Laporan</label>
                    <select id="jenis" class="form-control">
                        <option value="">-Pilih Jenis Laporan-</option>
                        <option value="1">Bulanan</option>
                        <option value="2">Harian</option>
                    </select> -->
                </div>
            </div>

        </div>
            
        <div class="card-body">
        <div class="dt-responsive table-responsive">
          <table class="table table-striped table-bordered" id="data">
                    <thead>
                        <tr>
                        <th style="width:1%; text-align:center; vertical-align:middle;">No</th>
                        <th style="width:3%; text-align:center; vertical-align:middle;">Nama</th>
                        <th style="width:3%; text-align:center; vertical-align:middle;">Tanggal Absensi</th>
                        <th style="width:3%; text-align:center; vertical-align:middle;">Jam Masuk</th>
                        <th style="width:3%; text-align:center; vertical-align:middle;">Jam Keluar</th>
                        </tr>
                    </thead>
                    
                </table>
              </div>
              <button class="btn btn-info pull-right" id="print" target="blank"><i class="fa fa-print"></i> Cetak Laporan</button>
              </div>
              </div>
        </div> 
    </div>
    </div>
    <script src="<?= base_url()?>Lib/report_absen.js"></script>