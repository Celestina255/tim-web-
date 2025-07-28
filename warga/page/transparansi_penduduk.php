<?php
include '../../koneksi.php';


// Ambil daftar tahun
$tahunQuery = mysqli_query($con, "SELECT DISTINCT tahun FROM tb_monografi ORDER BY tahun DESC");
$tahunList = [];
while ($t = mysqli_fetch_assoc($tahunQuery)) {
    $tahunList[] = $t['tahun'];
}

// Ambil tahun terpilih dari GET, dipaksa jadi integer
$tahun_terpilih = isset($_GET['tahun']) ? (int)$_GET['tahun'] : 0;

// Jika tidak ada tahun yang dipilih, ambil tahun terbaru
if ($tahun_terpilih == 0 && count($tahunList) > 0) {
    $tahun_terpilih = $tahunList[0];
}

// Query data tahun terpilih
$query = mysqli_query($con, "SELECT * FROM tb_monografi WHERE tahun = $tahun_terpilih LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Monografi Kampung <?= $tahun_terpilih ?></title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h2.title {
      text-align: center;
      margin-top: 40px;
      margin-bottom: 10px;
      font-weight: bold;
      color: #2c3e50;
    }
    .subhead {
      text-align: center;
      font-size: 18px;
      margin-bottom: 30px;
    }
    .chart-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      width: 90%;
      margin: auto;
    }
    .chart-container {
      text-align: center;
    }
    .chart-container h4 {
      margin-bottom: 10px;
      color: #34495e;
    }
    .chart-container canvas {
  width: 100% !important;
  height: 300px !important; /* Atur tinggi chart di sini */
  max-height: 300px;
}

    .data-tabel {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
    }
    .data-tabel th, .data-tabel td {
      border: 1px solid #ccc;
      padding: 8px 10px;
      text-align: left;
    }
    .data-tabel th {
      background-color: #f5f5f5;
    }
    .tahun-form {
      text-align: center;
      margin-top: 20px;
    }
    .tahun-form select {
      padding: 5px 10px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <!-- PILIH TAHUN -->
  <div class="tahun-form">
    <form method="GET" action="index.php">
  <input type="hidden" name="page" value="transparansi_penduduk">
  <label for="tahun">Pilih Tahun:</label>
  <select name="tahun" id="tahun" onchange="this.form.submit()">
        <?php foreach ($tahunList as $tahun): ?>
          <option value="<?= $tahun ?>" <?= $tahun == $tahun_terpilih ? 'selected' : '' ?>><?= $tahun ?></option>
        <?php endforeach; ?>
      </select>
    </form>
  </div>

  <!-- HEADER -->
  <h2 class="title">DATA MONOGRAFI KAMPUNG BANJAR AUSOY<br>TAHUN <?= $tahun_terpilih ?></h2>
  <p class="subhead">Jumlah Kepala Keluarga: <strong><?= $data['jumlah_kk'] ?></strong> | Jumlah Penduduk: <strong><?= $data['jumlah_penduduk'] ?></strong></p>

  <!-- CHART SECTION -->
  <div class="chart-grid">
    <!-- Umur -->
    <div class="chart-container">
      <h4>Berdasarkan Kelompok Umur</h4>
      <canvas id="umurChart"></canvas>
    </div>

    <!-- Tenaga Kerja -->
    <div class="chart-container">
      <h4>Berdasarkan Kelompok Tenaga Kerja</h4>
      <canvas id="tenagaChart"></canvas>
    </div>

    <!-- Agama -->
    <div class="chart-container">
      <h4>Berdasarkan Agama</h4>
      <canvas id="agamaChart"></canvas>
    </div>

    <!-- Pendidikan -->
    <div class="chart-container">
      <h4>Berdasarkan Pendidikan</h4>
      <canvas id="pendidikanChart"></canvas>
    </div>

    <!-- Pekerjaan -->
    <div class="chart-container" style="grid-column: span 2;">
      <h4>Berdasarkan Pekerjaan</h4>
      <canvas id="pekerjaanChart"></canvas>
    </div>

    <!-- Mobilitas -->
    <div class="chart-container" style="grid-column: span 2;">
      <h4>Berdasarkan Mobilitas</h4>
      <canvas id="mobilitasChart"></canvas>
    </div>

    <!-- Sarana Ibadah -->
    <div class="chart-container">
      <h4>Sarana Ibadah</h4>
      <canvas id="ibadahChart"></canvas>
    </div>

    <!-- Sarana Pendidikan -->
    <div class="chart-container">
      <h4>Sarana Pendidikan</h4>
      <canvas id="pendFasChart"></canvas>
    </div>

    <!-- Kesehatan & Olahraga -->
    <div class="chart-container">
      <h4>Sarana Kesehatan & Olahraga</h4>
      <canvas id="kesehatanChart"></canvas>
    </div>

    <!-- Transportasi -->
    <div class="chart-container">
      <h4>Transportasi</h4>
      <canvas id="transportChart"></canvas>
    </div>
  </div>

  <!-- TABEL: Batas Wilayah -->
  <h3 style="text-align:center; margin-top:50px;">Luas & Batas Wilayah</h3>
  <table class="data-tabel">
    <tr><th>Luas Kampung</th><td><?= $data['luas_kampung'] ?></td></tr>
    <tr><th>Batas Utara</th><td><?= $data['batas_utara'] ?></td></tr>
    <tr><th>Batas Selatan</th><td><?= $data['batas_selatan'] ?></td></tr>
    <tr><th>Batas Timur</th><td><?= $data['batas_timur'] ?></td></tr>
    <tr><th>Batas Barat</th><td><?= $data['batas_barat'] ?></td></tr>
  </table>

  <!-- TABEL: Peruntukan Lahan -->
  <h3 style="text-align:center; margin-top:40px;">Peruntukan Lahan</h3>
  <table class="data-tabel">
    <tr><th>Jalan</th><td><?= $data['lahan_jalan'] ?></td></tr>
    <tr><th>Ladang</th><td><?= $data['lahan_ladang'] ?></td></tr>
    <tr><th>Bangunan</th><td><?= $data['lahan_bangunan'] ?></td></tr>
    <tr><th>Pemukiman</th><td><?= $data['lahan_pemukiman'] ?></td></tr>
    <tr><th>Pemakaman</th><td><?= $data['lahan_pemakaman'] ?></td></tr>
  </table>

  <!-- TABEL: Penggunaan Lahan -->
  <h3 style="text-align:center; margin-top:40px;">Penggunaan Lahan</h3>
  <table class="data-tabel">
    <tr><th>Industri</th><td><?= $data['guna_industri'] ?></td></tr>
    <tr><th>Perkebunan</th><td><?= $data['guna_perkebunan'] ?></td></tr>
    <tr><th>Pertanian</th><td><?= $data['guna_pertanian'] ?></td></tr>
    <tr><th>Pasar</th><td><?= $data['guna_pasar'] ?></td></tr>
    <tr><th>Hutan Sagu</th><td><?= $data['guna_hutan_sagu'] ?></td></tr>
    <tr><th>Tanah Kering</th><td><?= $data['guna_tanah_kering'] ?></td></tr>
    <tr><th>Tanah Belum Dikelola</th><td><?= $data['guna_tanah_belum_dikelola'] ?></td></tr>
  </table>

  <!-- SCRIPT CHART -->
  <script>
    function renderChart(id, labels, data, color) {
      new Chart(document.getElementById(id), {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Jumlah',
            data: data,
            backgroundColor: color
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      });
    }

    renderChart('umurChart', ['0-3', '4-6', '7-12', '13-15', '16-18', '19-59', '60+'], [
      <?= $data['umur_0_3'] ?>, <?= $data['umur_4_6'] ?>, <?= $data['umur_7_12'] ?>,
      <?= $data['umur_13_15'] ?>, <?= $data['umur_16_18'] ?>, <?= $data['umur_19_59'] ?>,
      <?= $data['umur_60_keatas'] ?>
    ], '#2c7be5');

    renderChart('tenagaChart', ['10-14', '15-19', '20-26', '27-59', '60+'], [
      <?= $data['usia_10_14'] ?>, <?= $data['usia_15_19'] ?>, <?= $data['usia_20_26'] ?>,
      <?= $data['usia_27_59'] ?>, <?= $data['usia_60_keatas'] ?>
    ], '#27ae60');

    renderChart('agamaChart', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'], [
      <?= $data['agama_islam'] ?>, <?= $data['agama_kristen'] ?>,
      <?= $data['agama_katolik'] ?>, <?= $data['agama_hindu'] ?>,
      <?= $data['agama_buddha'] ?>, <?= $data['agama_konghucu'] ?>
    ], '#8e44ad');

    renderChart('pendidikanChart', ['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana'], [
      <?= $data['pendidikan_sd'] ?>, <?= $data['pendidikan_smp'] ?>,
      <?= $data['pendidikan_sma'] ?>, <?= $data['pendidikan_diploma'] ?>,
      <?= $data['pendidikan_sarjana'] ?>
    ], '#f39c12');

    renderChart('pekerjaanChart', ['PNS','TNI/Polri','Swasta','Tani','Wiraswasta','Petukangan','Nelayan','Pensiunan','Jasa Lain','Buruh','Guru','Nakes','Honorer','Mahasiswa','IRT'], [
      <?= $data['pekerjaan_pns'] ?>, <?= $data['pekerjaan_tni_polri'] ?>, <?= $data['pekerjaan_swasta'] ?>,
      <?= $data['pekerjaan_tani'] ?>, <?= $data['pekerjaan_wiraswasta'] ?>, <?= $data['pekerjaan_petukangan'] ?>,
      <?= $data['pekerjaan_nelayan'] ?>, <?= $data['pekerjaan_pensiunan'] ?>, <?= $data['pekerjaan_jasa_lain'] ?>,
      <?= $data['pekerjaan_buruh'] ?>, <?= $data['pekerjaan_guru'] ?>, <?= $data['pekerjaan_tenaga_kesehatan'] ?>,
      <?= $data['pekerjaan_honorer'] ?>, <?= $data['pekerjaan_mahasiswa'] ?>, <?= $data['pekerjaan_irt'] ?>
    ], '#e67e22');

    renderChart('mobilitasChart', ['Lahir L', 'Lahir P', 'Mati L', 'Mati P', 'Datang L', 'Datang P', 'Keluar L', 'Keluar P'], [
      <?= $data['lahir_l'] ?>, <?= $data['lahir_p'] ?>, <?= $data['mati_l'] ?>, <?= $data['mati_p'] ?>,
      <?= $data['datang_l'] ?>, <?= $data['datang_p'] ?>, <?= $data['keluar_l'] ?>, <?= $data['keluar_p'] ?>
    ], '#95a5a6');

    renderChart('ibadahChart', ['Masjid','Pura','Gereja Kristen','Gereja Katolik','Vihara','Klenteng'], [
      <?= $data['sarana_masjid'] ?>, <?= $data['sarana_pura'] ?>,
      <?= $data['sarana_gereja_kristen'] ?>, <?= $data['sarana_gereja_katolik'] ?>,
      <?= $data['sarana_vihara'] ?>, <?= $data['sarana_klenteng'] ?>
    ], '#2980b9');

    renderChart('pendFasChart', ['PAUD','SD','SMP','SMA'], [
      <?= $data['sarana_pauddll'] ?>, <?= $data['sarana_sd'] ?>,
      <?= $data['sarana_smp'] ?>, <?= $data['sarana_sma'] ?>
    ], '#d35400');

    renderChart('kesehatanChart', ['Kesehatan', 'Sepakbola', 'Voli', 'Bulutangkis'], [
      <?= $data['sarana_kesehatan'] ?>, <?= $data['lapangan_sepakbola'] ?>,
      <?= $data['lapangan_voli'] ?>, <?= $data['lapangan_bulutangkis'] ?>
    ], '#c0392b');

    renderChart('transportChart', ['Motor','Mobil','Sampan','Katinting','Longboat','Speedboat'], [
      <?= $data['kendaraan_motor'] ?>, <?= $data['kendaraan_mobil'] ?>,
      <?= $data['kendaraan_sampan'] ?>, <?= $data['kendaraan_katinting'] ?>,
      <?= $data['kendaraan_longboat'] ?>, <?= $data['kendaraan_speedboat'] ?>
    ], '#16a085');
  </script>
</body>
</html>
