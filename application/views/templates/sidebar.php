    <!-- Main Sidebar Container -->
    <aside class="main-sidebar tara elevation-4">
      <!-- Sidebar -->
      <div class="col-12">
        <div class="row">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel ml-3 mt-4 pb-3 d-flex ">
            <div class="col-6">
            <img src="<?= base_url('assets'); ?>/gambar/lg.png" class="brand-image img-circle elevation-3" style="width:40px;" alt="User Image">
            </div>
            <div class="col-6 brand-text">
             <span><a href="#" style="color:black;" class="d-block ml-3"><?= $user['nama_user']; ?> </a></span>
              <span><?php  if ($user['role_id'] == 1) :?><span class="pngkt" >admin</span> <?php  elseif ($user['role_id'] == 2) :?><span class="pngkt" >guru</span> <?php  else:?><span class="pngkt" >kepsek</span><?php  endif?></span>
            </div>
          </div>
        </div>
  
        <div class="dropdown-divider"></div>
      <!-- Sidebar -->
      <div class="sidebar tara text-dark">
      
        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
          <?php
          $url1 = $this->uri->segment(1);
          $url2 = $this->uri->segment(2);
         
          // check($url1);
          ?>
          <ul class="nav nav-pills nav-sidebar flex-column costum-color-side " data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php if ($user['role_id'] == 1) : ?>
              <li class="nav-item " >
                <a href="<?= base_url('Admin'); ?>" class="nav-link <?= $url1 == 'Admin' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-home" ></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/tampil_ranking'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'tampil_ranking'  ? 'active' : ''; ?>">
                  <i class="primarynav-icon fas fa-sort-numeric-down" style="color: black;"></i>
                  <p>
                    Hasil Perankingan
                  </p>
                </a>
              </li>
              
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
              
              <li class="nav-item">
             
                <a href="<?= base_url('guru/reset_data'); ?>" class="nav-link " onclick="return confirm('Seluruh data akan dikosongkan, yakin akan reset data ?');">
                  <i class="nav-icon fas fa-sort-numeric-down"></i>
                  <p>
                  Reset Data
                  </p>
                </a>
              </li>
              
            <?php elseif($user['role_id'] == 2): ?>
              <li class="nav-item">
                <a href="<?= base_url('guru'); ?>" class="nav-link <?= $url1 == 'guru' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
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
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/Hasil'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'Hasil'  ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Hasil Nilai
                  </p>
                </a>
              </li>  
            
            <?php else : ?>
              <li class="nav-item">
                <a href="<?= base_url('Kepsek'); ?>" class="nav-link <?= $url1 == 'Kepsek' ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
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
              <li class="nav-item">
                <a href="<?= base_url('Penilaian/Hasil'); ?>" class="nav-link <?= $url1 == 'Penilaian' && $url2 == 'Hasil'  ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Hasil Nilai
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