<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php base_url(); ?>" class="brand-link bg-primary">
      <span class="brand-text">Administrator </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url("admin")?>" class="nav-link <?php if($title == "Dashboard"){ echo "active";}?>">
              <i class="fas fa-dashboard nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($title =="Data Karyawan" || $title == "Data Petugas" || $title =="Data Item"){
                echo "active";
              } ?>">
              <i class="nav-icon fas fa-database"></i>
              <p> Master <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("admin/karyawan")?>" class="nav-link <?php if($title == "Data Karyawan"){ echo "active";}?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href=<?= base_url("admin/Posisi")?> class="nav-link  <?php if($title == "Data Posisi"){ echo "active";}?>">
                  <i class="fas fa-box nav-icon"></i>
                  <p>Data Posisi</p>
                </a>
              </li>
        </ul>
          </li>
        <!-- #region TRANSAKSI -->
          <li class="nav-item">
            <a href="#" class="nav-link \
            <?php 
            if($title =="Pengiriman" || $title == "Entry Data Penggajian"){
                echo "active";
              } 
              ?>">
              <i class="nav-icon fas fa-table-columns"></i>
              <p>Data Transaksi <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("admin/pengiriman")?>" class="nav-link <?php if($title == "Pengiriman"){ echo "active";}?>">
                  <i class="fas fa-boxes-packing nav-icon"></i>
                  <p>Entry Data Pengiriman</p>
                </a>
              </li>
              <!-- #endregion -->
        </ul>
          </li>
          <li class="nav-item">
          <a href="#" class="nav-link \
            <?php 
            if( $title == "Report Data"){
                echo "active";
              } 
              ?>">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>Data Report <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("admin/Report")?>" class="nav-link <?php if($title == "Report Data"){ echo "active";}?>">
                  <i class="fas fa-boxes-packing"></i>
                  <p>Laporan Data Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=<?= base_url("admin/penggajian")?> class="nav-link  <?php if($title == "Laporan Data Penggajian"){ echo "active";}?>">
                  <i class="fas fa-box nav-icon"></i>
                  <p>Laporan Data Penggajian</p>
                </a>
              </li>
            </ul>
          </li>
        

            </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>