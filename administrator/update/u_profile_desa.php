<?php
include '../../koneksi.php';

// === PROSES UPDATE FOTO PEGAWAI (KHUSUS SATU ORANG, JIKA ADA) ===
if (isset($_POST['id_pegawai']) && !is_array($_POST['id_pegawai'])) {
    $id_pegawai = $_POST['id_pegawai'];

    $query = mysqli_query($con, "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'");
    $data = mysqli_fetch_array($query);
    $foto_lama = $data['foto'];

    $nama_file = $_FILES['foto']['name'];
    $tmp_file  = $_FILES['foto']['tmp_name'];
    $folder    = "../../dashboard/images/pages/";
    $acak      = rand(1000, 9999);
    $nama_baru = $acak . "_" . $nama_file;

    if ($foto_lama && file_exists($folder . $foto_lama) && $foto_lama != 'default.png') {
        unlink($folder . $foto_lama);
    }

    move_uploaded_file($tmp_file, $folder . $nama_baru);

    $update = mysqli_query($con, "UPDATE tb_pegawai SET foto='$nama_baru' WHERE id_pegawai='$id_pegawai'");

    if ($update) {
        echo "<script>alert('Foto pegawai berhasil diperbarui'); window.location.href='../index.php?page=lem_pegawai';</script>";
    } else {
        echo "<script>alert('Gagal update foto pegawai'); window.history.back();</script>";
    }

    exit;
}

// === PROSES UPDATE SEMUA DATA PEGAWAI (EDIT MASSAL) ===
if (isset($_POST['id_pegawai']) && is_array($_POST['id_pegawai'])) {
    foreach ($_POST['id_pegawai'] as $idp) {
        $nama    = $_POST['nama_pegawai_' . $idp];
        $jabatan = $_POST['jabatan_pegawai_' . $idp];

        if (!empty($_FILES['foto_pegawai_' . $idp]['name'])) {
            $nama_file = $_FILES['foto_pegawai_' . $idp]['name'];
            $tmp_file  = $_FILES['foto_pegawai_' . $idp]['tmp_name'];
            $folder    = "../../dashboard/images/pages/";
            $acak      = rand(1000, 9999);
            $nama_baru = $acak . "_" . $nama_file;

            move_uploaded_file($tmp_file, $folder . $nama_baru);
            $foto_sql = ", foto='$nama_baru'";
        } else {
            $foto_sql = "";
        }

        mysqli_query($con, "UPDATE tb_pegawai SET nama='$nama', jabatan='$jabatan' $foto_sql WHERE id_pegawai='$idp'");
    }

    echo "<script>alert('Data perangkat kampung berhasil diperbarui'); window.location.href='../index.php?page=profil_desa';</script>";
    exit;
}
// === PROSES UPDATE SECTION PETA DESA (link embed + batas + luas + penduduk + gambar) ===
if (isset($_POST['sect']) && $_POST['sect'] === 'peta') {

    $id_profil        = (int)($_POST['id_profil'] ?? 1);
    $link_peta        = trim($_POST['link_peta'] ?? '');      // URL embed Google Maps
    $batas_utara      = trim($_POST['batas_utara'] ?? '');
    $batas_timur      = trim($_POST['batas_timur'] ?? '');
    $batas_selatan    = trim($_POST['batas_selatan'] ?? '');
    $batas_barat      = trim($_POST['batas_barat'] ?? '');
    $jumlah_penduduk  = (int)($_POST['jumlah_penduduk'] ?? 0);

    // Luas disimpan sebagai m2; admin boleh isi m2 atau Ha (opsional)
    $luas_desa_m2 = (int)($_POST['luas_desa_m2'] ?? 0);
    $luas_desa_ha = (float)($_POST['luas_desa_ha'] ?? 0);
    $luas_desa    = $luas_desa_m2 > 0 ? $luas_desa_m2 : (int)round($luas_desa_ha * 10000);

    // Ambil data lama (untuk hapus gambar lama jika upload baru)
    $df = mysqli_query($con, "SELECT gambar_peta FROM tb_profile WHERE id_profil='$id_profil' LIMIT 1");
    $d  = mysqli_fetch_array($df);
    $gambar_lama = $d['gambar_peta'] ?? '';

    // Upload gambar peta (opsional) — simpan hanya NAMA FILE (bukan full path), seperti handler lain
    $folderUpload = "../../dashboard/images/pages/"; // sama seperti handler kamu
    $gambar_peta  = $gambar_lama;

    if (!empty($_FILES['gambar_peta']['name'])) {
        $nama_file = $_FILES['gambar_peta']['name'];
        $tmp_file  = $_FILES['gambar_peta']['tmp_name'];
        $acak      = rand(100000, 999999);
        $nama_baru = $acak . $nama_file; // konsisten dg handler yang lain

        // Pindahkan file
        if (move_uploaded_file($tmp_file, $folderUpload . $nama_baru)) {
            // Hapus lama kalau ada & bukan default
            if ($gambar_lama && file_exists($folderUpload . $gambar_lama) && $gambar_lama != 'default.png') {
                @unlink($folderUpload . $gambar_lama);
            }
            $gambar_peta = $nama_baru; // simpan NAMA FILE saja (bukan path)
        }
    }

    // Simpan ke DB (pakai kolom baru yang sudah kita tambahkan)
    $query = "UPDATE tb_profile SET 
                link_peta        = '$link_peta',
                batas_utara      = '$batas_utara',
                batas_timur      = '$batas_timur',
                batas_selatan    = '$batas_selatan',
                batas_barat      = '$batas_barat',
                jumlah_penduduk  = '$jumlah_penduduk',
                luas_desa        = '$luas_desa',
                gambar_peta      = '$gambar_peta'
              WHERE id_profil='$id_profil'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Peta desa berhasil diperbarui'); window.location.href='../index.php?page=edit_profile_desa&tab=peta';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui peta desa'); window.history.back();</script>";
    }
    exit;
}

// === PROSES UPDATE PROFIL DESA (TEKS + PETA + STRUKTUR) ===
if (isset($_POST['id'])) {
    $id       = $_POST['id'];
    $sejarah  = $_POST['sejarah'];
    $visi     = $_POST['visi'];
    $misi     = $_POST['misi'];
    $peta     = $_POST['peta'];

    $lf_gpeta   = $_FILES['gpeta']['tmp_name'];
    $nf_gpeta   = $_FILES['gpeta']['name'];
    $acak_gpeta = rand(100000,999999);
    $nfu_gpeta  = $acak_gpeta . $nf_gpeta;

    $lf_gst   = $_FILES['gst']['tmp_name'];
    $nf_gst   = $_FILES['gst']['name'];
    $acak_gst = rand(100000,999999);
    $nfu_gst  = $acak_gst . $nf_gst;

    include "../../include/fungsi_thumb.php";

    $df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
    $d = mysqli_fetch_array($df);

    // Jika gambar peta diunggah
    if (!empty($lf_gpeta)) {
        UploadGpeta($nfu_gpeta);
        @unlink('../../dashboard/images/pages/' . $d['gambar_peta']);

        $query = "UPDATE tb_profile SET 
            sejarah='$sejarah',
            visi='$visi',
            misi='$misi',
            peta='$peta',
            gambar_peta='$nfu_gpeta'
            WHERE id_profil='$id'";
    }
    // Jika gambar struktur diunggah
    elseif (!empty($lf_gst)) {
        UploadGst($nfu_gst);
        @unlink('../../dashboard/images/pages/' . $d['gambar_struktur']);

        $query = "UPDATE tb_profile SET 
            sejarah='$sejarah',
            visi='$visi',
            misi='$misi',
            peta='$peta',
            gambar_struktur='$nfu_gst'
            WHERE id_profil='$id'";
    }
    // Jika hanya teks
    else {
        $query = "UPDATE tb_profile SET 
            sejarah='$sejarah',
            visi='$visi',
            misi='$misi',
            peta='$peta'
            WHERE id_profil='$id'";
    }

    // Eksekusi query
    $update = mysqli_query($con, $query);

    if ($update) {
        echo "<script>alert('Update profil kampung berhasil!'); window.location.href='../index.php?page=profil_desa';</script>";
    } else {
        echo "<script>alert('Gagal update profil kampung!'); window.history.back();</script>";
    }

    exit;
}

// === PERMINTAAN TIDAK DIKENALI ===
echo "<script>alert('Permintaan tidak dikenali'); window.history.back();</script>";
exit;
?>
