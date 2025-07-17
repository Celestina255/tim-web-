<?php
include '../koneksi.php';
$urutan         = $_POST['urutan'];
$nik            = $_POST['nik'];
$nama           = $_POST['nama'];
$nms            = $_POST['nmsurat'];
$kode           = $_POST['kode'];
$page           = $_POST['page'];
$hp             = $_POST['hp'];
$userid         = $_POST['userid'];

$lokasi_berkas    = $_FILES['berkas']['tmp_name'];
$nama_berkas      = $_FILES['berkas']['name'];
$acakberkas       = rand(1,99);
$nama_berkas_unik = $acakberkas.$nama_berkas;
$vdir_upload      = "../file/berkas/";
$vberkas_upload   = $vdir_upload . $nama_berkas_unik;
move_uploaded_file($_FILES["berkas"]["tmp_name"], $vberkas_upload);

$lokasi_foto    = $_FILES['foto']['tmp_name'];
$nama_foto      = $_FILES['foto']['name'];
$acakfoto       = rand(1,99);
$nama_foto_unik = $acakfoto.$nama_foto;
$vdirfoto_upload = "../file/fotowarga/";
$vfoto_upload = $vdirfoto_upload . $nama_foto_unik;
move_uploaded_file($_FILES["foto"]["tmp_name"], $vfoto_upload);

$kirim=(isset($_POST['kirim']));   

if ($kirim){
    if (empty($lokasi_berkas)){
        echo "<script>alert('Pengajuan surat gagal ! anda belum melampirkan berkas persyaratan '); window.location = '../warga/index.php?page=warga'</script>";
    }else if (empty($lokasi_foto)){
        echo "<script>alert('Pengajuan surat gagal ! anda belum melampirkan foto '); window.location = '../warga/index.php?page=warga'</script>";
    }else{
        mysqli_query($con, "INSERT INTO tb_permohonan (id, nik, nama, kode_surat, nmsurat, page, hp, berkas, foto, userid, status) VALUES ('$urutan','$nik','$nama','$kode','$nms','$page','$hp','$nama_berkas_unik','$nama_foto_unik','$userid', 'onprocess')")or die (Error.mysqli_error());

        echo "<script>alert('Pengajuan surat berhasil !'); window.location = '../warga/index.php?page=tunggu_permohonan&userid=$userid&id=$urutan'</script>"; 
    }
}
?>
