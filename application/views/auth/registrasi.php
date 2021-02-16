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
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?= base_url('auth/registrasi'); ?>" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_guru">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('nama_guru'); ?></small>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('nik'); ?></small>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password1">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('password1'); ?></small>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('password2'); ?></small>
          <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
            <div class="col-4">
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="text-center mt-2">
          <a href="<?= base_url('auth'); ?>" class="text-center">Sudah punya akun?</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>