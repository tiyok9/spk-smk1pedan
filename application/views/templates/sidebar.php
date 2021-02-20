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
            <?php if ($user['role_id'] == 1) : ?>
              <li class="nav-item">
                <a href="<?= base_url('Guru'); ?>" class="nav-link <?= $url1 == 'Guru' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard Guru
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/tampil_ranking'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'tampil_ranking'  ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-sort-numeric-down"></i>
                  <p>
                    Hasil Perankingan
                  </p>
                </a>
              </li>
              <li class="nav-header text-center">Data Master</li>
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
              <li class="nav-header text-center">Perhitungan SAW</li>
              <div class="dropdown-divider"></div>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == ''  ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Penilaian Alternatif
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/Rating_kecocokan'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'Rating_kecocokan' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Hasil Rating Kecocokan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/Normalisasi'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'Normalisasi' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Hasil Normalisasi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/Hasil_saw'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'Hasil_saw' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Hasil Perhitungan SAW
                  </p>
                </a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a href="<?= base_url('Kepsek'); ?>" class="nav-link <?= $url1 == 'Kepsek' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard Kepala Sekolah
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/tampil_ranking'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'tampil_ranking'  ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-sort-numeric-down"></i>
                  <p>
                    Hasil Perankingan
                  </p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>