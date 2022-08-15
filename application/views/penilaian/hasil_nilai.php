    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg">
              <div class="card">
                <div class="card-header bg-light">
                  <h5 class="m-0">Data Penilaian Alternatif</h5>
                </div>
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <table class="table table-bordered">
                    <caption>Keterangan
                  <div class="row">
                    <div class="col-4">
                      <ul>
                        <?php foreach ($kriteria as $k) : ?>
                          <li><?= $k['nama_kriteria']; ?> = <?= $k['keterangan']; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                      <div class="col-4">
                          <ul>
                            <li>1 = Tidak Terpenuhi</li>
                            <li>2 = Cukup Terpenuhi</li>
                            <li>3 = Terpenuhi</li>
                            <li>4 = Sangat Terpenuhi</li>
                          </ul>
                      </div>
                    </div>  
                  </caption>
                    <thead class="text-center">
                      <tr>
                        <th style="width: 15px">No</th>
                        <th>Nama Alternatif</th>
                        <?php foreach ($kriteria as $k) : ?>
                          <th style="width: 150px;"><?= $k['nama_kriteria']; ?></th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($penilaian as $nilai) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $nilai['nama_alternatif']; ?></td>
                          <td><?= $nilai['K1']; ?></td>
                          <td><?= $nilai['K2']; ?></td>
                          <td><?= $nilai['K3']; ?></td>
                          <td><?= $nilai['K4']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
