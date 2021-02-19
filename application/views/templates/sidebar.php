    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <center><a href="#" class="d-block ml-3"><?= $user['nama_guru']; ?></a></center>
            <center><span class="" style="color: gray;"><?= $user['role_id'] == 1 ? 'Guru' : 'Kepala Sekolah'; ?></span></center>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <?php
          $url1 = $this->uri->segment(1);
          $url2 = $this->uri->segment(2);
          // check($url1);
          ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Guru'); ?>" class="nav-link <?= $url1 == 'Guru' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard Guru
                </p>
              </a>
            </li>
            <li class="nav-header pl-3">Data Master</li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
              <a href="<?= base_url('Kriteria'); ?>" class="nav-link <?= $url1 == 'Kriteria' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Kriteria
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Alternatif'); ?>" class="nav-link <?= $url1 == 'Alternatif' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Alternatif
                </p>
              </a>
            </li>
            <li class="nav-header pl-3">Test</li>
            <div class="dropdown-divider"></div>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Starter Pages
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Active Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inactive Page</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Simple Link
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>