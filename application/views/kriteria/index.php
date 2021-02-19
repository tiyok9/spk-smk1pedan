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
                  <h5 class="m-0">Olah Data Kriteria</h5>
                </div>
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <div class="mb-3 mt-2">
                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahKriteria"> Tambah Data Kriteria</button>
                  </div>
                  <table class="table table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th style="width: 15px">No</th>
                        <th>Nama Kriteria</th>
                        <th>Jenis Kriteria</th>
                        <th>Bobot Kriteria</th>
                        <th style="width: 180px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($kriteria as $k) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $k['nama_kriteria']; ?></td>
                          <td><?= $k['jenis_kriteria']; ?></td>
                          <td><?= $k['bobot']; ?></td>
                          <td class="text-center">
                            <a href="" data-toggle="modal" data-target="#ubahKriteria<?= $k['id_kriteria']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('Kriteria/delete/' . $k['id_kriteria']); ?>" class="badge badge-danger" onclick="return confirm('Hapus data ini?');"><i class="fas fa-fw fa-trash"></i>Hapus</a>
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

    <!-- modal Tambah Kriteria -->
    <div class="modal fade" id="tambahKriteria">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title">Tambah Data Kriteria</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="<?= base_url('Kriteria/add'); ?>" method="POST">
            <div class="modal-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Jenis Kriteria</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenis_kriteria">
                    <option>-- Pilih Jenis Kriteria --</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Bobot Kriteria</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Bobot Kriteria" name="bobot" required>
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

    <!-- modal Ubah Kriteria -->
    <?php foreach ($kriteria as $kr) : ?>
      <div class="modal fade" id="ubahKriteria<?= $kr['id_kriteria']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Ubah Data Kriteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('Kriteria/update/' . $kr['id_kriteria']); ?>" method="POST">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kriteria</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required value="<?= $kr['nama_kriteria']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">Jenis Kriteria</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_kriteria">
                      <?php if ($kr['jenis_kriteria'] == "Benefit") : ?>
                        <option>-- Pilih Jenis Kriteria --</option>
                        <option value="Benefit" selected>Benefit</option>
                        <option value="Cost">Cost</option>
                      <?php else : ?>
                        <option>-- Pilih Jenis Kriteria --</option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost" selected>Cost</option>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Bobot Kriteria</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Bobot Kriteria" name="bobot" required value="<?= $kr['bobot']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
    <!-- /.modal -->