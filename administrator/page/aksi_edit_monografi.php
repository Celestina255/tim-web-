<?php
include_once "../../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $fields = [
        'tahun', 'jumlah_kk', 'jumlah_penduduk', 'jumlah_laki', 'jumlah_perempuan',
        'umur_0_3', 'umur_4_6', 'umur_7_12', 'umur_13_15', 'umur_16_18', 'umur_19_59', 'umur_60_keatas',
        'usia_10_14', 'usia_15_19', 'usia_20_26', 'usia_27_59', 'usia_60_keatas',
        'agama_islam', 'agama_kristen', 'agama_katolik', 'agama_hindu', 'agama_buddha', 'agama_konghucu',
        'pendidikan_sd', 'pendidikan_smp', 'pendidikan_sma', 'pendidikan_diploma', 'pendidikan_sarjana',
        'pekerjaan_pns', 'pekerjaan_tni_polri', 'pekerjaan_swasta', 'pekerjaan_tani', 'pekerjaan_wiraswasta',
        'pekerjaan_petukangan', 'pekerjaan_nelayan', 'pekerjaan_pensiunan', 'pekerjaan_jasa_lain', 'pekerjaan_buruh',
        'pekerjaan_guru', 'pekerjaan_tenaga_kesehatan', 'pekerjaan_honorer', 'pekerjaan_mahasiswa', 'pekerjaan_irt',
        'lahir_l', 'lahir_p', 'mati_l', 'mati_p', 'datang_l', 'datang_p', 'keluar_l', 'keluar_p',
        'luas_kampung', 'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat',
        'lahan_jalan', 'lahan_ladang', 'lahan_bangunan', 'lahan_pemukiman', 'lahan_pemakaman',
        'guna_industri', 'guna_perkebunan', 'guna_pertanian', 'guna_pasar', 'guna_hutan_sagu',
        'guna_tanah_kering', 'guna_tanah_belum_dikelola',
        'sarana_masjid', 'sarana_pura', 'sarana_gereja_kristen', 'sarana_gereja_katolik', 'sarana_vihara', 'sarana_klenteng',
        'sarana_pauddll', 'sarana_sd', 'sarana_smp', 'sarana_sma', 'sarana_kesehatan',
        'lapangan_sepakbola', 'lapangan_voli', 'lapangan_bulutangkis',
        'kendaraan_motor', 'kendaraan_mobil', 'kendaraan_sampan', 'kendaraan_katinting', 'kendaraan_longboat', 'kendaraan_speedboat'
    ];

    $updateSet = [];
    foreach ($fields as $field) {
        $value = mysqli_real_escape_string($con, $_POST[$field]);
        $updateSet[] = "$field='$value'";
    }

    $sql = "UPDATE tb_monografi SET " . implode(', ', $updateSet) . " WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate'); window.location='../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data'); history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request'); history.back();</script>";
}
