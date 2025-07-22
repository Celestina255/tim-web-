<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sejarah Kampung</title>

   <!-- LINK ke CSS lokal -->
   <link rel="stylesheet" href="../dashboard/css/sejarah.css">

   <!-- Font Awesome untuk ikon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

   <section class="sejarah-section">
      <div class="container text-center">
         <h2 class="sejarah-title">SEJARAH KAMPUNG BANJAR AUSOY</h2>

         <?php 
         include '../koneksi.php'; // jika diperlukan
         $query = mysqli_query ($con, "SELECT * FROM tb_profile LIMIT 1");
         $row = mysqli_fetch_array($query);
         if ($row && !empty($row['sejarah'])) {
         ?>
            <p class="sejarah-text"><?php echo nl2br($row['sejarah']); ?></p>
         <?php } else { ?>
            <div class="no-data-box">
               <i class="fas fa-info-circle"></i> Belum Ada Data
            </div>
         <?php } ?>
      </div>
   </section>

</body>
</html>
