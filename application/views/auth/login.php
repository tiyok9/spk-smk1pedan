<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $tittle; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/style.css">
</head>

<body>
 
  <div class=" login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card border-pill shadow-sm border brdsz border-dark px-3">
        <div class="card-body login-card-body ">
          <div class="h4 text-center mt-4">SELAMAT DATANG</div>
          <div class="row">
            <div class="col text-center ">
              <p> Sistem Pendukung Keputusan Penilaian Kinerja Guru Terbaik </p>
              <p style="text-align: center;"> SMK N 1 PADAN </p>
            </div>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <p class="login-box-msg">Silahkan login terlebih dahulu</p>

          <form action="<?= base_url('auth'); ?>" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip">
              
            </div>
            <small class="text-danger"><?= form_error('nip'); ?></small>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password">
              
            </div>
            <small class="text-danger"><?= form_error('password'); ?></small>
            <div class="row">
              <div class="col-4">
              </div>
              <div class="col-4">
                <button type="submit" class="rounded-pill btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
              <div class="col-4">
              </div>
              <!-- /.col -->
            </div>
          </form>


          <p class="mb-1 mt-4 text-center">
            <a href="<?= base_url('auth/registrasi'); ?>">Registrasi</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
  </div>
  <!-- jQuery -->
  <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>