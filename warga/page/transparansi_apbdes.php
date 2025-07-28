<?php
include '../../koneksi.php';

// Ambil semua data APBDes
$query = mysqli_query($con, "SELECT * FROM tb_apbdes ORDER BY tahun DESC");
$data_apbdes = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data_apbdes[] = $row;
}

// Ambil tahun yang dipilih (jika ada), default tahun terbaru
$tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : ($data_apbdes[0]['tahun'] ?? null);

// Ambil data APBDes untuk tahun yang dipilih
$data_tahun_ini = null;
foreach ($data_apbdes as $data) {
    if ($data['tahun'] == $tahun_terpilih) {
        $data_tahun_ini = $data;
        break;
    }
}

// Siapkan data grafik (tetap full semua tahun)
$tahun = array_column($data_apbdes, 'tahun');
$pendapatan = array_column($data_apbdes, 'pendapatan');
$belanja = array_column($data_apbdes, 'belanja');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transparansi APBDes</title>
    <link rel="stylesheet" href="../../dashboard/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .apbdes-container {
            padding: 40px;
            max-width: 1100px;
            margin: auto;
        }
        .apbdes-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .apbdes-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        .apbdes-box h4 {
            margin-bottom: 15px;
            color: #333;
        }
        .apbdes-box .item {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
            font-weight: bold;
        }
        .label-hijau {
            color: green;
        }
        .label-merah {
            color: red;
        }
        .dropdown-form {
            text-align: center;
            margin-bottom: 20px;
        }
        select {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        canvas {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="apbdes-container">
    <div class="apbdes-header">
        <h2>TRANSPARANSI APBDES</h2>
        <p>Kami Siap Melayani Dengan Sepenuh Hati</p>
    </div>

    <?php if (!empty($data_apbdes)): ?>
        <!-- Dropdown pilih tahun -->
        <div class="dropdown-form">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="transparansi_apbdes">
                <label for="tahun">Tahun: </label>
                <select name="tahun" id="tahun" onchange="this.form.submit()">
                    <?php foreach ($data_apbdes as $row): ?>
                        <option value="<?= $row['tahun'] ?>" <?= ($row['tahun'] == $tahun_terpilih) ? 'selected' : '' ?>>
                            <?= $row['tahun'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <?php if ($data_tahun_ini): ?>
            <!-- Box Data APBDes -->
            <div class="apbdes-box">
                <h4>APB KAMPUNG BANJAR AUSOY TAHUN <?= $data_tahun_ini['tahun'] ?></h4>
                <p>Kampung Banjar Ausoy, Kecamatan Manimeri, Kabupaten Teluk Bintuni<br>Provinsi Papua Barat</p>
                <div class="item label-hijau">Pendapatan: Rp<?= number_format($data_tahun_ini['pendapatan'], 2, ',', '.') ?></div>
                <div class="item label-merah">Belanja: Rp<?= number_format($data_tahun_ini['belanja'], 2, ',', '.') ?></div>
                <div class="item label-hijau">Penerimaan: Rp<?= number_format($data_tahun_ini['penerimaan'], 2, ',', '.') ?></div>
                <div class="item">Pengeluaran: Rp<?= number_format($data_tahun_ini['pengeluaran'], 2, ',', '.') ?></div>
                <div class="item"><strong>Surplus/Defisit:</strong> Rp<?= number_format($data_tahun_ini['surplus'], 2, ',', '.') ?></div>
            </div>
        <?php else: ?>
            <p style="text-align:center;">Data untuk tahun <?= htmlspecialchars($tahun_terpilih) ?> tidak ditemukan.</p>
        <?php endif; ?>

        <!-- Grafik tetap semua tahun -->
        <h4 style="margin-top: 40px; text-align:center;">APB KAMPUNG BANJAR AUSOY DARI TAHUN KE TAHUN</h4>
        <canvas id="apbdesChart"></canvas>

        <script>
        const ctx = document.getElementById('apbdesChart').getContext('2d');
        const apbdesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tahun) ?>,
                datasets: [
                    {
                        label: 'Pendapatan',
                        data: <?= json_encode($pendapatan) ?>,
                        backgroundColor: 'rgba(40, 167, 69, 0.8)'
                    },
                    {
                        label: 'Belanja',
                        data: <?= json_encode($belanja) ?>,
                        backgroundColor: 'rgba(220, 53, 69, 0.8)'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            callback: function(value) {
                                return 'Rp' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
        </script>
    <?php else: ?>
        <p>Belum ada data APBDes yang tersedia.</p>
    <?php endif; ?>
</div>

</body>
</html>
