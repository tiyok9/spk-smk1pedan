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
                 <h5 class="m-0">Hasil Perhitungan SAW</h5>
               </div>
               <div class="card-body">
                 <?= $this->session->flashdata('message'); ?>

                 <table class="table table-bordered">
                   <!-- <caption>Keterangan
                     <ul>
                       <?php foreach ($kriteria as $k) : ?>
                         <li><?= $k['nama_kriteria']; ?> = <?= $k['keterangan']; ?></li>
                       <?php endforeach; ?>
                     </ul>
                   </caption> -->
                   <thead class="text-center">
                     <tr>
                       <th style="width: 15px">No</th>
                       <th>Nama Alternatif</th>
                       <?php foreach ($kriteria as $k) : ?>
                         <th style="width: 150px;text-align: center;"><?= $k['nama_kriteria']; ?></th>
                       <?php endforeach; ?>
                       <th>Nilai Akhir</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $no = 1;
                      if ($nilai)
                        foreach ($nilai as $rk) : ?>
                       <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $rk['nama_alternatif']; ?></td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria1 == 'Benefit') {
                              $normalisasiK1 = $rk['K1'] / $MaxC1['K1'];
                              $hasilK1 = $normalisasiK1 * $bobotC1['bobot'];
                              echo round($hasilK1, 2);
                            } else {
                              $normalisasiK1 = $MinC1['K1'] / $rk['K1'];
                              $hasilK1 = $normalisasiK1 * $bobotC1['bobot'];
                              echo round($hasilK1, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria2 == 'Benefit') {
                              $normalisasiK2 = $rk['K2'] / $MaxC2['K2'];
                              $hasilK2 = $normalisasiK2 * $bobotC2['bobot'];
                              echo round($hasilK2, 2);
                            } else {
                              $normalisasiK2 = $MinC2['K2'] / $rk['K2'];
                              $hasilK2 = $normalisasiK2 * $bobotC2['bobot'];
                              echo round($hasilK2, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria3 == 'Benefit') {
                              $normalisasiK3 = $rk['K3'] / $MaxC3['K3'];
                              $hasilK3 = $normalisasiK3 * $bobotC3['bobot'];
                              echo round($hasilK3, 2);
                            } else {
                              $normalisasiK3 = $MinC3['K3'] / $rk['K3'];
                              $hasilK3 = $normalisasiK3 * $bobotC3['bobot'];
                              echo round($hasilK3, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria4 == 'Benefit') {
                              $normalisasiK4 = round($rk['K4'], 2) / $MaxC4['K4'];
                              // $normK4 = round($normalisasiK4, 1);
                              $hasilK4 = round($normalisasiK4, 2) * $bobotC4['bobot'];
                              // check($hasilK4);
                              echo round($hasilK4, 2);
                            } else {
                              $normalisasiK4 = $MinC4['K4'] / $rk['K4'];
                              $hasilK4 = $normalisasiK4 * $bobotC4['bobot'];
                              echo round($hasilK4, 2);
                            }
                            ?>
                         </td>
                         
                         <?php
                          $total = [$hasilK1, $hasilK2, $hasilK3, $hasilK4];
                          $totalNilai = round(array_sum($total), 2);
                          // check($total);
                          ?>
                         <td style="text-align: center;"><?= $totalNilai; ?></td>
                       </tr>
                       <form action="<?= base_url('penilaian/aksi_perankingan'); ?>" method="POST">
                         <input type="hidden" name="id_alternatif[]" value="<?= $rk['id_alternatif']; ?>">
                         <input type="hidden" name="total_nilai[]" value="<?= $totalNilai; ?>">
                       <?php endforeach; ?>
                   </tbody>
                 </table>
                 <div class="row mt-3 ml-2">
                   <button type="submit" class="btn btn-primary">Proses Perankingan</button>
                 </div>
                 </form>
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