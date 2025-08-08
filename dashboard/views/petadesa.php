<?php
include_once "../koneksi.php";

// Ambil profil (1 baris)
$q  = mysqli_query($con, "SELECT * FROM tb_profile LIMIT 1");
$pf = mysqli_fetch_assoc($q) ?: [];

$nama_kampung    = $pf['nama_kampung']    ?? 'Nama Kampung';
$batas_utara     = $pf['batas_utara']     ?? '-';
$batas_timur     = $pf['batas_timur']     ?? '-';
$batas_selatan   = $pf['batas_selatan']   ?? '-';
$batas_barat     = $pf['batas_barat']     ?? '-';
$luas_desa       = (int)($pf['luas_desa'] ?? 0);           // m²
$jumlah_penduduk = (int)($pf['jumlah_penduduk'] ?? 0);
$link_peta       = trim($pf['link_peta'] ?? '');
$gambar_peta     = $pf['gambar_peta'] ?? '';

// helper: m² -> Ha (untuk tampilan)
function m2_to_ha($m2){
  if(!$m2) return '0 Ha';
  $ha = $m2 / 10000;
  return rtrim(rtrim(number_format($ha, 2, ',', '.'), '0'), ',') . ' Ha';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta Lokasi Desa</title>
  <!-- Ikuti cara visimisi.php memanggil CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../dashboard/css/style.css">
</head>
<body>

<section class="section-peta">
  <div class="container">
    <h2 class="peta-title">Peta Lokasi Desa</h2>

    <div class="peta-grid">
      <div class="card-soft">
        <div class="card-soft__body">
          <div class="peta-group-title">Batas Desa:</div>

          <div class="peta-cols">
            <div>
              <div class="peta-item">
                <div class="peta-label">Utara</div>
                <div class="peta-value"><?= htmlspecialchars($batas_utara) ?></div>
              </div>
              <div class="peta-item">
                <div class="peta-label">Selatan</div>
                <div class="peta-value"><?= htmlspecialchars($batas_selatan) ?></div>
              </div>
            </div>
            <div>
              <div class="peta-item">
                <div class="peta-label">Timur</div>
                <div class="peta-value"><?= htmlspecialchars($batas_timur) ?></div>
              </div>
              <div class="peta-item">
                <div class="peta-label">Barat</div>
                <div class="peta-value"><?= htmlspecialchars($batas_barat) ?></div>
              </div>
            </div>
          </div>

          <hr class="peta-divider">

          <div class="peta-row">
            <div class="peta-label strong">Luas Desa:</div>
            <div class="peta-value">
              <?= number_format($luas_desa,0,',','.') ?> m<sup>2</sup> (≈ <?= m2_to_ha($luas_desa) ?>)
            </div>
          </div>

          <div class="peta-row">
            <div class="peta-label strong">Jumlah Penduduk:</div>
            <div class="peta-value"><?= number_format($jumlah_penduduk,0,',','.') ?> Jiwa</div>
          </div>
        </div>
      </div>

      <div class="card-soft peta-map-card">
        <?php if ($link_peta && stripos($link_peta, '/embed') !== false): ?>
          <iframe class="peta-map"
                  src="<?= htmlspecialchars($link_peta) ?>"
                  allowfullscreen
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php elseif ($gambar_peta): ?>
          <img src="<?= htmlspecialchars($gambar_peta) ?>" class="peta-map" alt="Peta Desa">
        <?php else: ?>
          <div class="peta-map placeholder">
            <p>Embed Google Maps atau gambar peta belum diisi.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


</body>
</html>
