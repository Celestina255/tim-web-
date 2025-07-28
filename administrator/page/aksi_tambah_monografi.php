<?php
include "../../koneksi.php"; // pastikan path ini sesuai dengan struktur kamu

// Tangkap semua data POST
$tahun = $_POST['tahun'];
$jumlah_kk = $_POST['jumlah_kk'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];
$jumlah_laki = $_POST['jumlah_laki'];
$jumlah_perempuan = $_POST['jumlah_perempuan'];

// Umur
$umur = ['0_3', '4_6', '7_12', '13_15', '16_18', '19_59', '60_keatas'];
foreach ($umur as $u) {
    ${"umur_$u"} = $_POST["umur_$u"];
}

// Tenaga kerja
$kerja = ['10_14', '15_19', '20_26', '27_59', '60_keatas'];
foreach ($kerja as $k) {
    ${"usia_$k"} = $_POST["usia_$k"];
}

// Agama
$agama = ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'];
foreach ($agama as $a) {
    ${"agama_$a"} = $_POST["agama_$a"];
}

// Pendidikan
$pendidikan = ['sd', 'smp', 'sma', 'diploma', 'sarjana'];
foreach ($pendidikan as $p) {
    ${"pendidikan_$p"} = $_POST["pendidikan_$p"];
}

// Pekerjaan
$pekerjaan = ['pns', 'tni_polri', 'swasta', 'tani', 'wiraswasta', 'petukangan', 'nelayan', 'pensiunan', 'jasa_lain', 'buruh', 'guru', 'tenaga_kesehatan', 'honorer', 'mahasiswa', 'irt'];
foreach ($pekerjaan as $p) {
    ${"pekerjaan_$p"} = $_POST["pekerjaan_$p"];
}

// Mobilitas
$mobilitas = ['lahir_l', 'lahir_p', 'mati_l', 'mati_p', 'datang_l', 'datang_p', 'keluar_l', 'keluar_p'];
foreach ($mobilitas as $m) {
    ${$m} = $_POST[$m];
}

// Wilayah
$luas_kampung = $_POST['luas_kampung'];
$batas = ['utara', 'selatan', 'timur', 'barat'];
foreach ($batas as $b) {
    ${"batas_$b"} = $_POST["batas_$b"];
}

// Peruntukan Lahan
$lahan = ['jalan', 'ladang', 'bangunan', 'pemukiman', 'pemakaman'];
foreach ($lahan as $l) {
    ${"lahan_$l"} = $_POST["lahan_$l"];
}

// Penggunaan Lahan
$guna = ['industri', 'perkebunan', 'pertanian', 'pasar', 'hutan_sagu', 'tanah_kering', 'tanah_belum_dikelola'];
foreach ($guna as $g) {
    ${"guna_$g"} = $_POST["guna_$g"];
}

// Sarana Ibadah
$ibadah = ['masjid', 'pura', 'gereja_kristen', 'gereja_katolik', 'vihara', 'klenteng'];
foreach ($ibadah as $i) {
    ${"sarana_$i"} = $_POST["sarana_$i"];
}

// Sarana Pendidikan
$sarana_pendidikan = ['pauddll', 'sd', 'smp', 'sma'];
foreach ($sarana_pendidikan as $s) {
    ${"sarana_$s"} = $_POST["sarana_$s"];
}

// Sarana Kesehatan
$sarana_kesehatan = $_POST['sarana_kesehatan'];

// Sarana Olahraga
$olahraga = ['sepakbola', 'voli', 'bulutangkis'];
foreach ($olahraga as $o) {
    ${"lapangan_$o"} = $_POST["lapangan_$o"];
}

// Transportasi
$transport = ['motor', 'mobil', 'sampan', 'katinting', 'longboat', 'speedboat'];
foreach ($transport as $t) {
    ${"kendaraan_$t"} = $_POST["kendaraan_$t"];
}

// INSERT ke database
$query = "INSERT INTO tb_monografi (
    tahun, jumlah_kk, jumlah_penduduk, jumlah_laki, jumlah_perempuan,
    umur_0_3, umur_4_6, umur_7_12, umur_13_15, umur_16_18, umur_19_59, umur_60_keatas,
    usia_10_14, usia_15_19, usia_20_26, usia_27_59, usia_60_keatas,
    agama_islam, agama_kristen, agama_katolik, agama_hindu, agama_buddha, agama_konghucu,
    pendidikan_sd, pendidikan_smp, pendidikan_sma, pendidikan_diploma, pendidikan_sarjana,
    pekerjaan_pns, pekerjaan_tni_polri, pekerjaan_swasta, pekerjaan_tani, pekerjaan_wiraswasta,
    pekerjaan_petukangan, pekerjaan_nelayan, pekerjaan_pensiunan, pekerjaan_jasa_lain, pekerjaan_buruh,
    pekerjaan_guru, pekerjaan_tenaga_kesehatan, pekerjaan_honorer, pekerjaan_mahasiswa, pekerjaan_irt,
    lahir_l, lahir_p, mati_l, mati_p, datang_l, datang_p, keluar_l, keluar_p,
    luas_kampung, batas_utara, batas_selatan, batas_timur, batas_barat,
    lahan_jalan, lahan_ladang, lahan_bangunan, lahan_pemukiman, lahan_pemakaman,
    guna_industri, guna_perkebunan, guna_pertanian, guna_pasar, guna_hutan_sagu,
    guna_tanah_kering, guna_tanah_belum_dikelola,
    sarana_masjid, sarana_pura, sarana_gereja_kristen, sarana_gereja_katolik, sarana_vihara, sarana_klenteng,
    sarana_pauddll, sarana_sd, sarana_smp, sarana_sma,
    sarana_kesehatan,
    lapangan_sepakbola, lapangan_voli, lapangan_bulutangkis,
    kendaraan_motor, kendaraan_mobil, kendaraan_sampan, kendaraan_katinting, kendaraan_longboat, kendaraan_speedboat
) VALUES (
    '$tahun', '$jumlah_kk', '$jumlah_penduduk', '$jumlah_laki', '$jumlah_perempuan',
    '$umur_0_3', '$umur_4_6', '$umur_7_12', '$umur_13_15', '$umur_16_18', '$umur_19_59', '$umur_60_keatas',
    '$usia_10_14', '$usia_15_19', '$usia_20_26', '$usia_27_59', '$usia_60_keatas',
    '$agama_islam', '$agama_kristen', '$agama_katolik', '$agama_hindu', '$agama_buddha', '$agama_konghucu',
    '$pendidikan_sd', '$pendidikan_smp', '$pendidikan_sma', '$pendidikan_diploma', '$pendidikan_sarjana',
    '$pekerjaan_pns', '$pekerjaan_tni_polri', '$pekerjaan_swasta', '$pekerjaan_tani', '$pekerjaan_wiraswasta',
    '$pekerjaan_petukangan', '$pekerjaan_nelayan', '$pekerjaan_pensiunan', '$pekerjaan_jasa_lain', '$pekerjaan_buruh',
    '$pekerjaan_guru', '$pekerjaan_tenaga_kesehatan', '$pekerjaan_honorer', '$pekerjaan_mahasiswa', '$pekerjaan_irt',
    '$lahir_l', '$lahir_p', '$mati_l', '$mati_p', '$datang_l', '$datang_p', '$keluar_l', '$keluar_p',
    '$luas_kampung', '$batas_utara', '$batas_selatan', '$batas_timur', '$batas_barat',
    '$lahan_jalan', '$lahan_ladang', '$lahan_bangunan', '$lahan_pemukiman', '$lahan_pemakaman',
    '$guna_industri', '$guna_perkebunan', '$guna_pertanian', '$guna_pasar', '$guna_hutan_sagu',
    '$guna_tanah_kering', '$guna_tanah_belum_dikelola',
    '$sarana_masjid', '$sarana_pura', '$sarana_gereja_kristen', '$sarana_gereja_katolik', '$sarana_vihara', '$sarana_klenteng',
    '$sarana_pauddll', '$sarana_sd', '$sarana_smp', '$sarana_sma',
    '$sarana_kesehatan',
    '$lapangan_sepakbola', '$lapangan_voli', '$lapangan_bulutangkis',
    '$kendaraan_motor', '$kendaraan_mobil', '$kendaraan_sampan', '$kendaraan_katinting', '$kendaraan_longboat', '$kendaraan_speedboat'
)";

// Eksekusi
if (mysqli_query($con, $query)) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href='../../administrator/index.php?page=transparansi';</script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($con);
}
?>
