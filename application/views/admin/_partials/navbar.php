<nav class="main-header navbar navbar-expand navbar-dark bg-indigo">
  <ul class="navbar-nav ">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item center">
    <a href="<?= base_url("presensi")?>" class="btn btn-info" id="btnAbsen"><i class="fas fa-user-plus"></i> Absensi</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
    </li>
    <li class="nav-item">
      <div class="theme-switch-wrapper nav-link">
        <label class="theme-switch" for="checkbox">
          <input type="checkbox" id="checkbox" />
          <span class="slider round"></span>
        </label>
      </div>
    </li>
    <li class="nav-item">
      <em class="nav-link"><i class="fa fa-moon" aria-hidden="true"></i> Dark mode</em>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <button class="btn btn-danger" id="logout"><i class="fas fa-sign-out"></i> Keluar</button>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <!-- <form class="form-check-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </form> -->
</nav>
