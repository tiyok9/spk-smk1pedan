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
  <!-- <div class="continer-fluid">
    <div class="full-bg-img bck">
      <img src="/gambar/bck.jpg" class="position-absolute bck">

    </div>
  </div> -->
  <div class="hold-transition register-page">
    <div class=" register-box">
      

      <div class="card border-pill shadow-sm border brdsz border-dark px-3">
        <div class="card-body register-card-body">
          <div class="register-logo">
            <p>Form Registrasi</p>
          </div>
          <form action="<?= base_url('auth/registrasi'); ?>" method="POST">
            <div class="input-group mb-3 mt-4">
              <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_user">
              
            </div>
            <small class="text-danger"><?= form_error('nama_user'); ?></small>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip">
              
            </div>
            <small class="text-danger"><?= form_error('nip'); ?></small>
            <small class="text-danger"><?= form_error('role_id'); ?></small>
            <div class="input-group mb-3">
              <select class="form-control" name="role_id" id="exampleFormControlSelect1" placeholder=" ">
                <option value="">Jabatan</option>
                <option value="2">guru</option>
                <option value="3">kepsek</option>
              </select>
            </div>
           
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password1">
              
            </div>
            <small class="text-danger"><?= form_error('password1'); ?></small>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Retype password" name="password2">
              
            </div>
            <small class="text-danger"><?= form_error('password2'); ?></small>
            <div class="row">
              <div class="col-4">
              </div>
              <div class="col-4">
                <button type="submit" class="rounded-pill  btn btn-primary btn-block">Register</button>
              </div>
              <!-- /.col -->
              <div class="col-4">
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <div class="mb-4 text-center mt-2">
          <a href="<?= base_url('auth'); ?>" class=" text-center">Sudah punya akun?</a>
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