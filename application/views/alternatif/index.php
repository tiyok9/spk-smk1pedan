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
                  <h5 class="m-0">Olah Data Alternatif</h5>
                </div>
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <div class="mb-3 mt-2">
                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahAlternatif"> Tambah Data Alternatif</button>
                  </div>
                  <table class="table table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th style="width: 15px">No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th style="width: 180px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($alternatif as $al) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $al['nama_alternatif']; ?></td>
                          <td><?= $al['jenkel'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                          <td><?= $al['kelas']; ?></td>
                          <td class="text-center">
                            <a href="" data-toggle="modal" data-target="#ubahAlternatif<?= $al['id_alternatif']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('Alternatif/delete/' . $al['id_alternatif']); ?>" class="badge badge-danger" onclick="return confirm('Hapus data siswa ini?');"><i class="fas fa-fw fa-trash"></i>Hapus</a>
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

    <!-- modal Tambah Alternatif -->
    <div class="modal fade" id="tambahAlternatif">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title">Tambah Data Alternatif</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="<?= base_url('Alternatif/add'); ?>" method="POST">
            <div class="modal-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Siswa</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_alternatif" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Siswa" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4">Jenis Kelamin</label>
                <div class="col-sm-8">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio1" value="L">
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio2" value="P">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Kelas</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Kelas Siswa" name="kelas" required>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal Ubah Alternatif -->
    <?php foreach ($alternatif as $al) : ?>
      <div class="modal fade" id="ubahAlternatif<?= $al['id_alternatif']; ?>">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Ubah Data Alternatif</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('Alternatif/update/' . $al['id_alternatif']); ?>" method="POST">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Siswa</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_alternatif" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Siswa" value="<?= $al['nama_alternatif']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <?php if ($al['jenkel'] == 'L') : ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio1" value="L" checked>
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio2" value="P">
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                      </div>
                    <?php else : ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio1" value="L">
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio2" value="P" checked>
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Kelas</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Kelas Siswa" name="kelas" value="<?= $al['kelas']; ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Ubah Data</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
    <!-- /.modal -->