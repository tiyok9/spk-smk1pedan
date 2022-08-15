<!DOCTYPE html>
<html>
<head>
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!-- tampilan cetak rangking guru-->
<body>
  <div class="container">
    <div class="text-center mt-4">
      <h6><a href="<?= base_url('dashbord'); ?>"><img src="<?= base_url('assets/gambar/lg.png'); ?>" width="150px"></a></h6>
      <h4>LAPORAN HASIL PENILAIAN GURU SMK N 1 PEDAN  </h4>
    </div>
    <br />
    <!-- content -->
    <!-- <label for="">Lokasi Prakerin : <?= $lokasi['nama_lokasi']; ?></label> -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Guru</th>
          <th scope="col">Total Nilai</th>
          <th scope="col">Ranking</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        $j = 1; ?>
        <?php foreach ($hasil_rank as $hr) : ?>
          <tr>
            <th><?= $i++; ?></th>
            <th><?= $hr['nama_alternatif']; ?></th>
            <th><?= $hr['total_nilai']; ?></th>
            <th><?= $j++; ?></th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <footer class="text-center mb-auto">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020-2021 SMK N 1 PEDAN.</strong> All rights reserved.
    </footer>
    <!-- end Content -->
  </div>
  <script>
    window.print();
  </script>
</body>
</html>