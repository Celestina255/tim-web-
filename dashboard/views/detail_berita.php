
<?php
include '../header.php';
include '../../koneksi.php';

$slug = $_GET['slug'];
$query = mysqli_query($con, "SELECT * FROM tb_berita WHERE slug='$slug' LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<style>
    .btn-green {
        background-color: #006633;
        color: #fff;
        border: none;
    }
    .btn-green:hover {
        background-color: #004d26;
        color: #fff;
    }
</style>

<section class="main-container" id="main-container">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="text-center mt-4 mb-2">
          <h2 class="font-weight-bold"><?php echo $data['judul']; ?></h2>
          <p class="text-muted"><?php echo date('d M Y', strtotime($data['tgl_posting'])); ?> | Ditulis oleh Administrator</p>
        </div>
        <div class="text-center mb-4">
          <img src="../img/berita/<?php echo $data['gambar']; ?>" class="img-fluid rounded" alt="Gambar Berita">
        </div>
        <div class="isi-berita mb-4" style="font-size: 16px; line-height: 1.7;">
          <?php echo $data['isi']; ?>
        </div>
        <div class="text-center">
          <a href="?page=berita" class="btn btn-green">← Kembali ke Daftar Berita</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../footer.php'; ?>
