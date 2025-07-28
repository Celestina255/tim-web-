<?php include_once "../assets/inc.php"; ?>
<div class="container mt-4">
  <h3 class="text-center mb-4">TAMBAH DATA APBDES KAMPUNG</h3>
  <form action="page/aksi_tambah_apbdes.php" method="POST">
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <label for="tahun">Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
      </div>
    </div>

    <h5 class="mt-4">Rincian APBDes</h5>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="pendapatan">Pendapatan</label>
        <input type="number" name="pendapatan" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="belanja">Belanja</label>
        <input type="number" name="belanja" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="penerimaan">Penerimaan Pembiayaan</label>
        <input type="number" name="penerimaan" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="pengeluaran">Pengeluaran Pembiayaan</label>
        <input type="number" name="pengeluaran" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="surplus">Surplus / Defisit</label>
        <input type="number" name="surplus" class="form-control" required>
      </div>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success">Simpan Data</button>
      <a href="index.php?page=transparansi" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
