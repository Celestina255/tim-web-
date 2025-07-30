<?php
include '../koneksi.php';
$query = mysqli_query($con, "SELECT * FROM tb_sambutan LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>
<h3>Sambutan Kepala Kampung</h3>
<img src="../img/sambutan/<?php echo $data['foto']; ?>" width="150" class="rounded shadow-sm mb-3">
<p class="fw-bold text-uppercase mb-1"><?php echo $data['nama_kepala']; ?></p>
<p class="mb-3 fw-bold"><?php echo $data['jabatan']; ?></p>
<p><?php echo nl2br($data['isi_sambutan']); ?></p>
<a href="?page=sambutan_edit" class="btn btn-warning mt-3">Edit Sambutan</a>
