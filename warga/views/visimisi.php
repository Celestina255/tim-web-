<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Visi & Misi Kampung</title>

   <!-- Link ke CSS -->
   <link rel="stylesheet" href="../dashboard/css/style.css">
</head>
<body>


<section class="visimisi-section">
   <div class="container">
      <?php 
         $query = mysqli_query($con, "SELECT * FROM tb_profile LIMIT 1");
         while($r = mysqli_fetch_array($query)){
         $misi = explode(';', $r['misi']); 
      ?>
      <div class="visimisi-wrapper">
   <div class="visimisi-wrapper">
   <!-- VISI -->
   <div class="card-box">
      <h3 class="title">VISI</h3>
      <p class="content">" <?php echo $r['visi']; ?> "</p>
   </div>

   <!-- MISI -->
   <div class="card-box">
      <h3 class="title">MISI</h3>
      <ul class="content">
         <?php 
            foreach ($misi as $item) {
               if (trim($item) != '') {
                  echo "<li>$item</li>";
               }
            }
         ?>
      </ul>
   </div>
</div>


      <?php } ?>
   </div>
</section>

</body>
</html>
