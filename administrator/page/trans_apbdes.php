<?php include_once "../assets/inc.php"; ?>
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title-5">DATA APBDES KAMPUNG</h1>
        <hr class="line-seprate">
        <a href="index.php?page=trans_apbdes_tambah" class="btn btn-primary mb-3">Tambah Data</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Pendapatan</th>
                <th>Belanja</th>
                <th>Penerimaan</th>
                <th>Pengeluaran</th>
                <th>Surplus</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $data = mysqli_query($con, "SELECT * FROM tb_apbdes ORDER BY tahun DESC");
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr class="text-center">
                  <td><?= $no++ ?></td>
                  <td><?= $d['tahun'] ?></td>
                  <td>Rp<?= number_format($d['pendapatan'], 2, ',', '.') ?></td>
                  <td>Rp<?= number_format($d['belanja'], 2, ',', '.') ?></td>
                  <td>Rp<?= number_format($d['penerimaan'], 2, ',', '.') ?></td>
                  <td>Rp<?= number_format($d['pengeluaran'], 2, ',', '.') ?></td>
                  <td>Rp<?= number_format($d['surplus'], 2, ',', '.') ?></td>
                  <td>
                    <a href="index.php?page=trans_apbdes_edit&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="page/hapus_apbdes.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
