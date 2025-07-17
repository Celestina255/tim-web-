<nav style="$breadcrumb-divider: quote('>')" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pernikahan</li>
  </ol>
</nav>
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
   <div class="row">
    <?php
    $query=mysqli_query($con, "SELECT * FROM tb_jenissurat WHERE kategori='Pernikahan' ORDER BY id ASC");
    while($rj=mysqli_fetch_array($query)){
        ?>

    <div class="card" style="width: 13rem; margin: 10px; padding: 0px; box-shadow: 1px 4px 6px;">
        <img src="../img/file.png" class="card-img-top" alt="..." style="align-items: center; padding:10% 20% 0%;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $rj['nmsurat']; ?></h5>
            <a href="?page=<?php echo $rj['page']; ?>" class="btn btn-primary d-md-block" type="button">Buat Surat</a>
        </div>
    </div>
<?php } ?>
</div>
</div>
</div>

