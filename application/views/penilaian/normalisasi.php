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
                 <h5 class="m-0">Data Rating Kecocokan</h5>
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
                     </tr>
                   </thead>
                   <tbody>
                     <?php $no = 1;
                      foreach ($kecocokan as $rk) : ?>
                       <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $rk['nama_alternatif']; ?></td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria1 == 'Benefit') {
                              $normalisasiK1 = $rk['C1'] / $MaxC1['C1'];
                              echo round($normalisasiK1, 1);
                            } else {
                              $normalisasiK1 = $MinC1['C1'] / $rk['C1'];
                              echo round($normalisasiK1, 1);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria2 == 'Benefit') {
                              $normalisasiK2 = $rk['C2'] / $MaxC2['C2'];
                              echo round($normalisasiK2, 1);
                            } else {
                              $normalisasiK2 = $MinC2['C2'] / $rk['C2'];
                              echo round($normalisasiK2, 1);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria3 == 'Benefit') {
                              $normalisasiK3 = $rk['C3'] / $MaxC3['C3'];
                              echo round($normalisasiK3, 1);
                            } else {
                              $normalisasiK3 = $MinC3['C3'] / $rk['C3'];
                              echo round($normalisasiK3, 1);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria4 == 'Benefit') {
                              $normalisasiK4 = $rk['C4'] / $MaxC4['C4'];
                              echo round($normalisasiK4, 1);
                            } else {
                              $normalisasiK4 = $MinC4['C4'] / $rk['C4'];
                              echo round($normalisasiK4, 1);
                            }
                            ?>
                         </td>
                         <td style="text-align: center;">
                           <?php
                            if ($jKriteria5 == 'Benefit') {
                              $normalisasiK5 = $rk['C5'] / $MaxC5['C5'];
                              echo round($normalisasiK5, 1);
                            } else {
                              $normalisasiK5 = $MinC5['C5'] / $rk['C5'];
                              echo round($normalisasiK5, 1);
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