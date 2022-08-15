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
                 <h5 class="m-0">Data Hasil Normalisasi</h5>
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
                         <th style="width: 150px;text-align: center;"><?= $k['nama_kriteria']; ?></th>
                       <?php endforeach; ?>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $no = 1;
                      foreach ($nilai as $rk) : ?>
                       <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $rk['nama_alternatif']; ?></td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria1 == 'Benefit') {
                              $normalisasiK1 = $rk['K1'] / $MaxC1['K1'];
                              echo round($normalisasiK1, 2);
                            } else {
                              $normalisasiK1 = $MinC1['K1'] / $rk['K1'];
                              echo round($normalisasiK1, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria2 == 'Benefit') {
                              $normalisasiK2 = $rk['K2'] / $MaxC2['K2'];
                              echo round($normalisasiK2, 2);
                            } else {
                              $normalisasiK2 = $MinC2['K2'] / $rk['K2'];
                              echo round($normalisasiK2, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria3 == 'Benefit') {
                              $normalisasiK3 = $rk['K3'] / $MaxC3['K3'];
                              echo round($normalisasiK3, 2);
                            } else {
                              $normalisasiK3 = $MinC3['K3'] / $rk['K3'];
                              echo round($normalisasiK3, 2);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria4 == 'Benefit') {
                              $normalisasiK4 = $rk['K4'] / $MaxC4['K4'];
                              echo round($normalisasiK4, 2);
                            } else {
                              $normalisasiK4 = $MinC4['K4'] / $rk['K4'];
                              echo round($normalisasiK4, 2);
                            }
                            ?>
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