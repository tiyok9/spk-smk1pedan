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
                <div class="card-header bg-success">
                  <h5 class="m-0">Olah Data Penilaian Alternatif</h5>
                </div>
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>

                  <table class="table table-bordered">
                    <caption>Keterangan
                      <ul>
                        <?php foreach ($kriteria as $k) : ?>
                          <li><?= $k['nama_kriteria']; ?> = <?= $k['keterangan']; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </caption>
                    <thead class="text-center">
                      <tr>
                        <th style="width: 15px">No</th>
                        <th>Nama Alternatif</th>
                        <?php foreach ($kriteria as $k) : ?>
                          <th style="width: 150px;"><?= $k['nama_kriteria']; ?></th>
                        <?php endforeach; ?>
                        <th style="width: 200px">Aksi</th>
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
                          <td><?= $nilai['K5']; ?></td>
                          <td class="text-center">
                            <a href="" data-toggle="modal" data-target="#Penilaian<?= $nilai['id_nilai']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i> Penilaian</a>
                          </td>
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

    <!-- modal Penilaian -->
    <?php foreach ($penilaian as $nilai) : ?>
      <div class="modal fade" id="Penilaian<?= $nilai['id_nilai']; ?>">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Penilaian Alternatif</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('Penilaian/aksi_penilaian_alternatif'); ?>" method="POST">
              <input type="hidden" name="id_nilai" value="<?= $nilai['id_nilai']; ?>">
              <input type="hidden" name="id_alternatif" value="<?= $nilai['id_alternatif']; ?>">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Nama Alternatif</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required value="<?= $nilai['nama_alternatif']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class=" col-form-label">Rata-rata Nilai Raport</label>
                  <div class="">
                    <input type="text" name="K1" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['K1']; ?>">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Absensi</label>
                  <div class="">
                    <input type="text" name="K2" class="form-control" id="inputEmail3" placeholder="Masukkan Jumlah Absensi" required value="<?= $nilai['K2']; ?>">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Piagam Penghargaan</label>
                  <div class="">
                    <input type="text" name="K3" class="form-control" id="inputEmail3" placeholder="Masukkan Jumlah Piagam Penghargaan" required value="<?= $nilai['K3']; ?>">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Keaktifan</label>
                  <div class="">
                    <input type="text" name="K4" class="form-control" id="inputEmail3" placeholder="Masukkan Jumlah ekstrakulikuler yang diikuti" required value="<?= $nilai['K4']; ?>">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Usia</label>
                  <div class="">
                    <input type="text" name="K5" class="form-control" id="inputEmail3" placeholder="Masukkan Umur ??" required value="<?= $nilai['K5']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Proses Penilaian</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
    <!-- /.modal -->