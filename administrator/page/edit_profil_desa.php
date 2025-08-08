<?php
include '../koneksi.php';
include "../assets/inc.php";
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
          $data  = mysqli_fetch_array($query);
          ?>

          <!-- FORM UTAMA: sejarah, visi, misi, struktur -->
          <form action="update/update_profile.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="id" value="<?= (int)$data['id_profil']; ?>">

            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="tab-sejarah" data-toggle="tab" href="#sejarah" role="tab">SEJARAH</a>
                <a class="nav-item nav-link" id="tab-visi" data-toggle="tab" href="#visi" role="tab">VISI</a>
                <a class="nav-item nav-link" id="tab-misi" data-toggle="tab" href="#misi" role="tab">MISI</a>
                <a class="nav-item nav-link" id="tab-peta" data-toggle="tab" href="#peta" role="tab">PETA DESA</a>
                <a class="nav-item nav-link" id="tab-struktur" data-toggle="tab" href="#struktur" role="tab">STRUKTUR ORGANISASI</a>
              </div>
            </nav>

            <br>

            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
              <!-- SEJARAH -->
              <div class="tab-pane fade show active" id="sejarah" role="tabpanel">
                <h6 class="label">SEJARAH DESA/KELURAHAN:</h6>
                <hr>
                <div class="row form-group">
                  <div class="col-12 col-md-9">
                    <textarea rows="5" name="sejarah" class="form-control"><?= htmlspecialchars($data['sejarah']); ?></textarea>
                  </div>
                </div>
              </div>

              <!-- VISI -->
              <div class="tab-pane fade" id="visi" role="tabpanel">
                <h6 class="label">VISI DESA/KELURAHAN:</h6>
                <hr>
                <div class="row form-group">
                  <div class="col-12 col-md-9">
                    <textarea rows="3" name="visi" class="form-control"><?= htmlspecialchars($data['visi']); ?></textarea>
                  </div>
                </div>
              </div>

              <!-- MISI -->
              <div class="tab-pane fade" id="misi" role="tabpanel">
                <h6 class="label">MISI DESA/KELURAHAN:</h6>
                <hr>
                <div class="row form-group">
                  <div class="col-12 col-md-9">
                    <textarea rows="6" name="misi" class="form-control"><?= htmlspecialchars($data['misi']); ?></textarea>
                  </div>
                </div>
              </div>

              <!-- PETA (INPUT2 diarahkan ke form terpisah: form-peta) -->
              <div class="tab-pane fade" id="peta" role="tabpanel">
                <h6 class="label">PETA WILAYAH DESA:</h6>
                <hr>

                <!-- hidden yang dikirim ke handler -->
                <input type="hidden" form="form-peta" name="sect" value="peta">
                <input type="hidden" form="form-peta" name="id_profil" value="<?= (int)$data['id_profil']; ?>">

                <!-- LINK EMBED MAPS -->
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class="form-control-label">Link Google Map (Embed)</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <textarea form="form-peta" name="link_peta" rows="3" class="form-control"
                      placeholder='Tempel URL dari "Sematkan peta" (harus ada /maps/embed?)'><?= htmlspecialchars($data['link_peta'] ?? '') ?></textarea>
                    <small class="form-text text-muted">
                      Google Maps → <b>Bagikan</b> → <b>Sematkan peta</b> → salin URL pada atribut <code>src</code>.
                    </small>
                  </div>
                </div>

                <!-- BATAS DESA -->
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class="form-control-label">Batas Desa</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Utara</label>
                        <input form="form-peta" type="text" name="batas_utara" class="form-control"
                               value="<?= htmlspecialchars($data['batas_utara'] ?? '') ?>">
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Timur</label>
                        <input form="form-peta" type="text" name="batas_timur" class="form-control"
                               value="<?= htmlspecialchars($data['batas_timur'] ?? '') ?>">
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Selatan</label>
                        <input form="form-peta" type="text" name="batas_selatan" class="form-control"
                               value="<?= htmlspecialchars($data['batas_selatan'] ?? '') ?>">
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Barat</label>
                        <input form="form-peta" type="text" name="batas_barat" class="form-control"
                               value="<?= htmlspecialchars($data['batas_barat'] ?? '') ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- LUAS & JUMLAH PENDUDUK -->
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class="form-control-label">Luas & Penduduk</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Luas Desa (meter persegi)</label>
                        <input form="form-peta" type="number" min="0" name="luas_desa_m2" id="luas_desa_m2"
                               class="form-control" value="<?= (int)($data['luas_desa'] ?? 0) ?>">
                        <small class="form-text text-muted">Disimpan di database sebagai <b>m²</b>.</small>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Atau dalam Hektare (opsional)</label>
                        <?php $luas_ha = !empty($data['luas_desa']) ? ((float)$data['luas_desa'] / 10000) : 0; ?>
                        <input form="form-peta" type="number" min="0" step="0.01" name="luas_desa_ha" id="luas_desa_ha"
                               class="form-control" value="<?= number_format($luas_ha, 2, '.', '') ?>">
                        <small class="form-text text-muted">Jika diisi, otomatis dikonversi ke m² saat disimpan.</small>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="mb-1">Jumlah Penduduk (jiwa)</label>
                        <input form="form-peta" type="number" min="0" name="jumlah_penduduk" class="form-control"
                               value="<?= (int)($data['jumlah_penduduk'] ?? 0) ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- PRATINJAU GAMBAR -->
                <div class="row form-group">
                  <div class="col col-md-3">Peta Saat Ini:</div>
                  <div class="col-12 col-md-9">
                    <?php if (!empty($data['gambar_peta'])): ?>
                      <img src="../dashboard/images/pages/<?= htmlspecialchars($data['gambar_peta']) ?>" width="250" style="border-radius:8px;border:1px solid #eee">
                    <?php else: ?>
                      <p><i>Belum ada gambar peta.</i></p>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- UPLOAD GAMBAR -->
                <div class="row form-group">
                  <div class="col col-md-3"><label>Upload Gambar Peta</label></div>
                  <div class="col-12 col-md-9">
                    <input form="form-peta" type="file" name="gambar_peta" class="form-control">
                    <small class="form-text text-muted">JPG/PNG/WebP. Jika diunggah, gambar lama akan diganti.</small>
                  </div>
                </div>

                <!-- TOMBOL SIMPAN KHUSUS PETA -->
                <div class="row form-group">
                  <div class="col-12 text-right">
                    <button form="form-peta" type="submit" class="btn btn-primary">Simpan Peta</button>
                  </div>
                </div>
              </div>

              <!-- STRUKTUR -->
              <div class="tab-pane fade" id="struktur" role="tabpanel">
                <h6 class="label">STRUKTUR ORGANISASI DESA/KELURAHAN:</h6>
                <hr>
                <div class="row form-group">
                  <div class="col col-md-12 text-center">
                    <?php if (!empty($data['gambar_struktur'])): ?>
                      <img src="../dashboard/images/pages/<?= htmlspecialchars($data['gambar_struktur']); ?>" width="300">
                    <?php else: ?>
                      <p><i>Belum ada gambar struktur organisasi.</i></p>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3"><label>Upload Gambar Struktur</label></div>
                  <div class="col-12 col-md-9">
                    <input type="file" name="gst" class="form-control">
                  </div>
                </div>
              </div>
            </div>

            <!-- TOMBOL FORM UTAMA -->
            <hr>
            <div class="row form-group">
              <div class="col col-md-6">
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
              <div class="col col-md-6 text-right">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
              </div>
            </div>

          </form>
          <!-- /FORM UTAMA -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FORM TERPISAH: KHUSUS TAB PETA (DI LUAR FORM UTAMA, AGAR TIDAK NESTED) -->
<form id="form-peta" action="../u_profile_desa.php" method="post" enctype="multipart/form-data"></form>

<!-- SCRIPTS -->
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
// sinkron input m2 <-> ha (berlaku ketika tab peta terbuka)
(function(){
  const initSync = function(){
    const m2 = document.getElementById('luas_desa_m2');
    const ha = document.getElementById('luas_desa_ha');
    if(!m2 || !ha) return;
    if(m2._bound) return; // cegah bind ganda
    let lock=false;
    m2.addEventListener('input', ()=>{ if(lock) return; lock=true; ha.value=(parseFloat(m2.value||0)/10000).toFixed(2); lock=false; });
    ha.addEventListener('input', ()=>{ if(lock) return; lock=true; m2.value=Math.round(parseFloat(ha.value||0)*10000); lock=false; });
    m2._bound = ha._bound = true;
  };

  $(function(){
    initSync();
    // kalau pakai bootstrap tabs, bind saat tab peta diklik
    $('a#tab-peta[data-toggle="tab"]').on('shown.bs.tab', initSync);
  });
})();
</script>

</body>
</html>
