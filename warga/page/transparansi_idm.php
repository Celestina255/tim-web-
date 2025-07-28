<?php
include '../../koneksi.php';

// Ambil semua tahun yang tersedia
$tahunList = mysqli_query($con, "SELECT DISTINCT tahun FROM tb_idm ORDER BY tahun DESC");

// Ambil tahun yang dipilih dari URL atau default ke tahun terbaru
$tahunDipilih = isset($_GET['tahun']) ? $_GET['tahun'] : null;

if (!$tahunDipilih) {
    $getLatest = mysqli_query($con, "SELECT tahun FROM tb_idm ORDER BY tahun DESC LIMIT 1");
    $latest = mysqli_fetch_assoc($getLatest);
    $tahunDipilih = $latest['tahun'];
}

// Ambil data IDM berdasarkan tahun yang dipilih
$query = mysqli_query($con, "SELECT * FROM tb_idm WHERE tahun = '$tahunDipilih' LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transparansi IDM</title>
    <link rel="stylesheet" href="../../dashboard/css/style.css">
    <style>
        .container-idm {
            max-width: 960px;
            margin: auto;
            padding: 40px 20px;
        }
        .judul-idm {
            text-align: center;
            color: #2caa50;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .deskripsi-idm {
            text-align: center;
            margin-bottom: 40px;
        }
        .tahun-form {
            text-align: center;
            margin-bottom: 30px;
        }
        .tahun-form select {
            padding: 8px 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .grid-idm {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .box-idm {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }
        .nilai-idm {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .label-idm {
            font-weight: 500;
            margin-bottom: 8px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container-idm">
    <h2 class="judul-idm">TRANSPARANSI</h2>
    <p class="deskripsi-idm">Kami Siap Melayani Dengan Sepenuh Hati</p>

    <h3 class="text-center" style="text-align:center; margin-bottom: 15px;">IDM</h3>
    <p class="deskripsi-idm">
        Indeks Desa Membangun (IDM) merupakan indeks komposit yang dibentuk dari tiga indeks,
        yaitu Indeks Ketahanan Sosial, Indeks Ketahanan Ekonomi, dan Indeks Ketahanan Ekologi/Lingkungan.
    </p>

    <!-- Form Pilih Tahun -->
    <div class="tahun-form">
        <form method="get" action="">
            <input type="hidden" name="page" value="transparansi_idm">
            <label for="tahun">Pilih Tahun:</label>
            <select name="tahun" id="tahun" onchange="this.form.submit()">
                <?php while ($t = mysqli_fetch_assoc($tahunList)) { ?>
                    <option value="<?= $t['tahun'] ?>" <?= ($t['tahun'] == $tahunDipilih) ? 'selected' : '' ?>>
                        <?= $t['tahun'] ?>
                    </option>
                <?php } ?>
            </select>
        </form>
    </div>

    <?php if ($data): ?>
    <div class="grid-idm">
        <div class="box-idm">
            <div class="label-idm">SKOR IDM <?= $data['tahun']; ?></div>
            <div class="nilai-idm"><?= number_format($data['skor_idm'], 4) ?></div>
        </div>
        <div class="box-idm">
            <div class="label-idm">STATUS IDM <?= $data['tahun']; ?></div>
            <div class="nilai-idm"><?= strtoupper($data['status_idm']) ?></div>
        </div>
        <div class="box-idm">
            <div class="label-idm">SKOR IKS</div>
            <div class="nilai-idm"><?= number_format($data['skor_iks'], 4) ?></div>
        </div>
        <div class="box-idm">
            <div class="label-idm">SKOR IKL</div>
            <div class="nilai-idm"><?= number_format($data['skor_ikl'], 4) ?></div>
        </div>
        <div class="box-idm">
            <div class="label-idm">SKOR IKE</div>
            <div class="nilai-idm"><?= number_format($data['skor_ike'], 4) ?></div>
        </div>
        <div class="box-idm">
            <div class="label-idm">TARGET STATUS</div>
            <div class="nilai-idm"><?= strtoupper($data['target_status']) ?></div>
        </div>
    </div>
    <?php else: ?>
        <p style="text-align: center;">Belum ada data IDM untuk tahun <?= $tahunDipilih ?>.</p>
    <?php endif; ?>
</div>

</body>
</html>
