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
                        <!-- PERULANGAN KRITERIA DARI KONTROLER -->
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
                        <th style="width: 200px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- PERULANGAN NILAI DARI CONTROLER PENILAIAN -->
                      <?php $no = 1;
                      foreach ($penilaian as $nilai) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $nilai['nama_alternatif']; ?></td>
                          <td><?= $nilai['K1']; ?></td>
                          <td><?= $nilai['K2']; ?></td>
                          <td><?= $nilai['K3']; ?></td>
                          <td><?= $nilai['K4']; ?></td>
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
    <!-- PERULANGAN DATA NILAI DARI CONTROLER -->
    <?php foreach ($datanilai as $nilai) : ?>
      <div class="modal fade" id="Penilaian<?= $nilai['id_data']; ?>">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Penilaian Alternatif</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('Penilaian/aksi_penilaian_alternatif'); ?>" method="POST">
              <input type="hidden" name="id_data" value="<?= $nilai['id_data']; ?>">
              <input type="hidden" name="id_alternatif" value="<?= $nilai['id_alternatif']; ?>">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Nama Alternatif</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required value="<?= $nilai['nama_alternatif']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class=" col-form-label">Pendagogik</label>
                  <div class="mb-1 ">
                    <div class="row">
                      <div class="col-10">
                        <div class="p">Menguasai Karakteristik Peserta Didik</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P1" class="form-control" id="inputEmail3" placeholder="Masukkan Nilai " required value="<?= $nilai['P1']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Menguasai Teori Belajar Dan Prinsip Pembelajaran</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P2" class="form-control" id="inputEmail3" placeholder="Masukkan Nilai" required value="<?= $nilai['P2']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Pengembangan Kurikulum</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P3" class="form-control" id="inputEmail3" placeholder="Masukkan Nilai Raport" required value="<?= $nilai['P3']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Kegiatan Pembelajaran Yang Mendidik</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P4" class="form-control" id="inputEmail3" placeholder="Masukkan Nilai Raport" required value="<?= $nilai['P4']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Pengembangan Potensi Peserta Didik</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P5" class="form-control" id="inputEmail3" placeholder="Masukkan Nilai Raport" required value="<?= $nilai['P5']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Komunikasi Dengan Peserta Didik</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P6" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['P6']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Penilaian Dan Evaluasi</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="P7" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['P7']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Kepribadian</label>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Bertindak Sesuai Dengan Norma Agama,Hukum,Sosial dan kebudayaan</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="K1" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['K1']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Menunjukkan Pribadi Yang Dewasa dan Teladan</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="K2" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['K2']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Etos Kerja, Tanggung Jawab Yang Tinggi dan Rasa Bangga Menjadi Guru</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="K3" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['K3']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Sosial</label>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Bersikap Inklusif,Bertindak Objektif,Serta Tidak Diskriminatif</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="S1" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['S1']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Komunikasi dengan Sesama Guru,Orang tua ,dan Masyarakt</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="S2" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['S2']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputEmail3" class=" col-form-label">Profesional</label>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Penguasaan Materi,Struktur,Konsep dan Pola Keilmuan </div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="G1" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['G1']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="mb-1">
                  <div class="row">
                      <div class="col-10">
                        <div class="p">Mengembangkan Keprofesionalan Melalui Tindakan Reflektif</div>
                      </div>
                      <div class="col-2">
                        <input type="text" name="G2" class="form-control" id="inputEmail3" placeholder="Masukkan Rata-rata Nilai Raport" required value="<?= $nilai['G2']; ?>">
                      </div>
                    </div>
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