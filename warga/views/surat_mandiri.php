<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page']) && $_POST['page'] != '') {
   $target = $_POST['page'];
   echo "<script>window.location.href='index.php?page=$target';</script>";
}
?>

<section class="main-container contact-area" id="main-container">
   <div class="gap-10"></div>
   <div class="ts-form form-boxed" id="ts-form">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
               <h3 class="column-title text-center mb-4" style="color: green;">Silahkan Pilih Nama Surat yang akan kamu buat</h3>
               <div class="contact-submit-box contact-box form-box p-4 shadow-sm rounded bg-white">
                  <form class="contact-form" action="" method="POST">
                     <div class="form-group">
                        <select class="form-control form-name" name="page" id="page" onchange="this.form.submit()" style="font-size: 16px;">
                           <option value="" selected>-- Pilih Nama Surat--</option>
                           <?php 
                           $qry = $con->query("SELECT * FROM tb_jenissurat WHERE kategori!='Tata Usaha' ORDER BY nmsurat ASC");

                           $surat_terpakai = [];
                           while($data = $qry->fetch_assoc()) {
                              if (!in_array($data['nmsurat'], $surat_terpakai)) {
                                 $surat_terpakai[] = $data['nmsurat'];
                           ?>
                              <option value="<?= $data['page'];?>" 
                                 <?php if(isset($_POST['page']) && $_POST['page'] == $data['page']) echo "selected"; ?>>
                                 <?= $data['nmsurat'];?>
                              </option>
                           <?php 
                              }
                           } 
                           ?>
                        </select>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
