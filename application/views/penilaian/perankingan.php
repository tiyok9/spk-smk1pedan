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
             <div class="card ">
               <div class="card-header bg-light ">
                 <h5 class="m-0">Hasil Perankingan</h5>
               </div>
               <div class="card-body">
                 <table class="table table-bordered">
                   <thead class="text-center">
                     <tr>
                       <th style="width: 100px">Rangking</th>
                       <th style="width: 150px;">Nama Guru</th>
                       <th style="width: 100px;">Nip</th>
                       <th style="width: 100px;">Total Nilai</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $no = 1;
                      foreach ($perankingan as $rank) : ?>
                       <tr>
                         <td style="text-align: center;"><?= $no++; ?></td>
                         <td><?= $rank['nama_alternatif']; ?></td>
                         <td><?= $rank['nip']; ?></td>
                         <td style="text-align: center;"><?= $rank['total_nilai']; ?></td>
                       </tr>
                     <?php endforeach; ?>
                   </tbody>
                 </table>
                 <div class="row float-right mt-3">
                   <div class="col">
                     <a href="<?= base_url('cetak/cetak_laporan'); ?>" class="btn btn-primary">Cetak data</a>
                   </div>
                 </div>
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