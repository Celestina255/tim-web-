<?php
include '../../koneksi.php';

$id         = $_POST['id'];
$sejarah    = $_POST['sejarah'];
$visi       = $_POST['visi'];
$misi       = $_POST['misi'];
$peta       = $_POST['peta'];

$lf_gpeta   = $_FILES['gpeta']['tmp_name'];
$nf_gpeta   = $_FILES['gpeta']['name'];
$acak_gpeta = rand(000000,999999);
$nfu_gpeta  = $acak_gpeta.$nf_gpeta;

$lf_gst     = $_FILES['gst']['tmp_name'];
$nf_gst     = $_FILES['gst']['name'];
$acak_gst   = rand(000000,999999);
$nfu_gst    = $acak_gst.$nf_gst;

if (isset($_POST['update'])) {
    // Jika gambar peta diunggah
    if (!empty($lf_gpeta)) {
        include "../../include/fungsi_thumb.php";
        UploadGpeta($nfu_gpeta);

        $df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
        $d = mysqli_fetch_array($df); 
        @unlink('../../dashboard/images/pages/' . $d['gambar_struktur']);

        $qu = mysqli_query($con, "UPDATE tb_profile SET 
            sejarah='$sejarah', 
            visi='$visi', 
            misi='$misi', 
            peta='$peta', 
            gambar_peta='$nfu_gpeta' 
            WHERE id_profil='$id'") or die(mysqli_error($qu));

        echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>";

    // Jika gambar struktur organisasi diunggah
    } elseif (!empty($lf_gst)) {
        include "../../include/fungsi_thumb.php";
        UploadGst($nfu_gst);

        $df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
        $d = mysqli_fetch_array($df); 
        @unlink('../../dashboard/images/pages/' . $d['gambar_struktur']);

        $qu = mysqli_query($con, "UPDATE tb_profile SET 
            sejarah='$sejarah', 
            visi='$visi', 
            misi='$misi', 
            peta='$peta', 
            gambar_struktur='$nfu_gst' 
            WHERE id_profil='$id'") or die(mysqli_error($qu));

        echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>";

    // Jika hanya teks yang diubah (tanpa upload file apapun)
    } else {
        $qu = mysqli_query($con, "UPDATE tb_profile SET 
            sejarah='$sejarah', 
            visi='$visi', 
            misi='$misi', 
            peta='$peta' 
            WHERE id_profil='$id'") or die(mysqli_error($qu));

        echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>";
    }
}
?>
