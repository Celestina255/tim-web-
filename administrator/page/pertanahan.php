<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pertanahan</li>
  </ol>
</nav>
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
   <div class="row">
    <?php
    $query=mysqli_query($con, "SELECT * FROM tb_jenissurat WHERE kategori='Pertanahan' ORDER BY id ASC");
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

