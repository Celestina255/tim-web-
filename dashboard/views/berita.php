
<?php
include '../koneksi.php';

$limit = 6;
$page = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$offset = ($page - 1) * $limit;

$query = mysqli_query($con, "SELECT * FROM tb_berita ORDER BY id_berita DESC LIMIT $limit OFFSET $offset");
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
    .pagination .page-link {
        color: #006633;
        border: 1px solid #006633;
    }
    .pagination .page-link:hover {
        background-color: #006633;
        color: white;
    }
    .pagination .active .page-link {
        background-color: #006633;
        color: white;
        border-color: #006633;
    }
    .pagination-container {
        margin-bottom: 80px; /* jarak dari footer */
    }
</style>

<div class="container mt-4">
   <div class="row">
      <?php while($r = mysqli_fetch_array($query)) { ?>
         <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
               <img src="../img/berita/<?php echo $r['gambar']; ?>" class="bd-placeholder-img card-img-top" height="180">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $r['judul']; ?></h5>
                  <p class="card-text"><?php echo substr(strip_tags($r['isi']), 0, 100); ?>...</p>
                  <div class="d-flex justify-content-between align-items-center">
                     <a href="?page=detail_berita&slug=<?php echo $r['slug']; ?>" class="btn btn-sm btn-green">Read More</a>
                     <small class="text-muted"><?php echo $r['tgl_posting']; ?></small>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>

   <!-- Pagination -->
   <div class="row pagination-container">
      <div class="col-12 text-center">
         <nav>
            <ul class="pagination justify-content-center">
               <?php
               $result = mysqli_query($con, "SELECT COUNT(*) as total FROM tb_berita");
               $total_data = mysqli_fetch_assoc($result)['total'];
               $total_page = ceil($total_data / $limit);

               if ($page > 1) {
                  echo '<li class="page-item"><a class="page-link" href="?page=berita&hal=' . ($page - 1) . '">«</a></li>';
               }

               for ($i = 1; $i <= $total_page; $i++) {
                  $active = ($i == $page) ? 'active' : '';
                  echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=berita&hal=' . $i . '">' . $i . '</a></li>';
               }

               if ($page < $total_page) {
                  echo '<li class="page-item"><a class="page-link" href="?page=berita&hal=' . ($page + 1) . '">»</a></li>';
               }
               ?>
            </ul>
         </nav>
      </div>
   </div>
</div>
