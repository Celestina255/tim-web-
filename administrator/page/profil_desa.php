<?php
include '../koneksi.php';
?>

<body>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>PROFILE DESA/KELURAHAN</h4>
        </div>
        <div class="card-body">
            <div class="custom-tab">
                <div class="card-body card-block">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM tb_profile LIMIT 1");
                    $d = mysqli_fetch_array($query);
                    ?>

                    <form action="update/u_profile_desa.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $d['id_profil']; ?>">

                        <nav>
                            <div class="nav nav-tabs" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#sejarah" role="tab">SEJARAH</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#visi" role="tab">VISI & MISI</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#struktur" role="tab">STRUKTUR ORGANISASI</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#peta" role="tab">PETA DESA</a>
                            </div>
                        </nav>

                        <br>

                        <div class="tab-content pl-3 pt-2">

                            <!-- SEJARAH -->
                            <div class="tab-pane fade show active" id="sejarah">
                                <h6>SEJARAH DESA/KELURAHAN:</h6>
                                <hr>
                                <textarea rows="12" name="sejarah" class="form-control"><?= $d['sejarah']; ?></textarea>
                            </div>

                            <!-- VISI & MISI -->
                            <div class="tab-pane fade" id="visi">
                                <h6>VISI:</h6>
                                <hr>
                                <textarea rows="3" name="visi" class="form-control"><?= $d['visi']; ?></textarea>

                                <h6 class="mt-4">MISI:</h6>
                                <hr>
                                <textarea rows="10" name="misi" class="form-control"><?= $d['misi']; ?></textarea>
                            </div>

                            <!-- STRUKTUR ORGANISASI -->
                            <div class="tab-pane fade" id="struktur">
                                <h6>STRUKTUR ORGANISASI DESA/KELURAHAN:</h6>
                                <hr>
                                <div class="mb-3">
                                    <?php if (!empty($d['gambar_struktur'])): ?>
                                        <img src="../dashboard/images/pages/<?= $d['gambar_struktur']; ?>" width="300">
                                    <?php else: ?>
                                        <i>Belum ada gambar struktur organisasi.</i>
                                    <?php endif; ?>
                                </div>
                                <input type="file" name="gst" class="form-control">

                                <hr>
                                <h6 class="mt-4">DAFTAR PERANGKAT KAMPUNG:</h6>
                                <?php
                                $pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY id_pegawai ASC");
                                while ($p = mysqli_fetch_array($pegawai)) {
                                    $foto = !empty($p['foto']) ? "../dashboard/images/pages/".$p['foto'] : "../dashboard/images/pages/default.png";
                                ?>
                                    <div class="card mb-3 p-3 shadow-sm">
                                        <div class="row">
                                            <input type="hidden" name="id_pegawai[]" value="<?= $p['id_pegawai']; ?>">
                                            <div class="col-md-2 text-center">
                                                <img src="<?= $foto; ?>" width="100" class="rounded mb-2">
                                                <input type="file" name="foto_pegawai_<?= $p['id_pegawai']; ?>" class="form-control form-control-sm mt-2">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Nama Pegawai</label>
                                                    <input type="text" name="nama_pegawai_<?= $p['id_pegawai']; ?>" class="form-control" value="<?= $p['nama']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_pegawai_<?= $p['id_pegawai']; ?>" class="form-control" value="<?= $p['jabatan']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- PETA DESA -->
                            <div class="tab-pane fade" id="peta">
                                <h6>PETA WILAYAH DESA:</h6>
                                <hr>
                                <label>Link Google Map (Embed)</label>
                                <textarea name="peta" rows="4" class="form-control"><?= $d['peta']; ?></textarea>
                                <small class="form-text text-muted">Google Maps → Bagikan → Sematkan peta → salin URL di atribut src.</small>

                                <hr>
                                <h6>Batas Desa</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Utara</label>
                                        <input type="text" name="batas_utara" class="form-control" value="<?= $d['batas_utara']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Timur</label>
                                        <input type="text" name="batas_timur" class="form-control" value="<?= $d['batas_timur']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Selatan</label>
                                        <input type="text" name="batas_selatan" class="form-control" value="<?= $d['batas_selatan']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Barat</label>
                                        <input type="text" name="batas_barat" class="form-control" value="<?= $d['batas_barat']; ?>">
                                    </div>
                                </div>

                                <hr>
                                <h6>Luas & Jumlah Penduduk</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Luas Desa (m²)</label>
                                        <input type="number" name="luas_desa" class="form-control" value="<?= $d['luas_desa']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Jumlah Penduduk (jiwa)</label>
                                        <input type="number" name="jumlah_penduduk" class="form-control" value="<?= $d['jumlah_penduduk']; ?>">
                                    </div>
                                </div>

                                <hr>
                                <div class="mb-3">
                                    <label>Peta Saat Ini:</label><br>
                                    <?php if (!empty($d['gambar_peta'])): ?>
                                        <img src="../dashboard/images/pages/<?= $d['gambar_peta']; ?>" width="300">
                                    <?php else: ?>
                                        <i>Belum ada gambar peta.</i>
                                    <?php endif; ?>
                                </div>
                                <input type="file" name="gpeta" class="form-control">
                            </div>
                        </div>

                        <hr>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
