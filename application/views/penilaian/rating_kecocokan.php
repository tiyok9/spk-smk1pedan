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
                         <td style="text-align: center;"><?= $rk['C1']; ?></td>
                         <td style="text-align: center;"><?= $rk['C2']; ?></td>
                         <td style="text-align: center;"><?= $rk['C3']; ?></td>
                         <td style="text-align: center;"><?= $rk['C4']; ?></td>
                         <td style="text-align: center;"><?= $rk['C5']; ?></td>
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