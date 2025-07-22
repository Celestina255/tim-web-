<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Struktur Organisasi Kampung</title>

   <!-- Link CSS Struktur -->
   <link rel="stylesheet" href="../dashboard/css/struktur.css">

   <!-- Font Awesome (untuk ikon jika diperlukan) -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>



<section class="struktur-section">
   <div class="container text-center">
      <h2 class="judul-bagan">BAGAN & PROFIL <br> PERANGKAT KAMPUNG</h2>


      <!-- Gambar Struktur Organisasi -->
      <?php 
      $struktur = mysqli_query($con, "SELECT gambar_struktur FROM tb_profile LIMIT 1");
      $data = mysqli_fetch_array($struktur);
      if (!empty($data['gambar_struktur'])) {
         echo '<img src="../dashboard/images/pages/'.$data['gambar_struktur'].'" class="struktur-img" alt="Struktur Organisasi Kampung">';
      } else {
         echo '<p><i>Belum ada gambar struktur organisasi.</i></p>';
      }
      ?>


      <div class="profil-grid">
         <?php 
         $pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY id_pegawai ASC");
         while($p = mysqli_fetch_array($pegawai)) {
            $foto = !empty($p['foto']) ? "../dashboard/images/pages/".$p['foto'] : "../dashboard/images/pages/default.png";
         ?>
         <div class="profil-card">
            <div class="foto-wrapper">
               <img src="<?php echo $foto; ?>" class="profil-foto" alt="Foto <?php echo $p['nama']; ?>">
            </div>
            <div class="profil-info">
               <h5 class="profil-nama"><?php echo strtoupper($p['nama']); ?></h5>
               <p class="profil-jabatan"><?php echo $p['jabatan']; ?></p>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</section>

</body>
</html>
