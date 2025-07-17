<?php
error_reporting(0);
include '../../koneksi.php';

$kode		    = $_POST['kodesurat'];
$nmsurat	    = $_POST['nmsurat'];

$nik           = $_POST['nik'];
$nama           = $_POST['nama'];
$tmpl           = $_POST['tmp_lahir'];
$tgll           = $_POST['tgl_lahir'];
$status         = $_POST['status'];
$kerjaan        = $_POST['kerjaan'];
$penghasilan    = $_POST['penghasilan'];
$almt           = $_POST['almt'];
$keluarga       = $_POST['keluarga'];
$program        = $_POST['program'];
$dtks           = $_POST['dtks'];
$msl            = $_POST['masalah'];
$klh            = $_POST['keluhan'];
$fas            = $_POST['fasilitator'];
$pus            = $_POST['puskesos'];
$sup            = $_POST['supervisor'];
//$pemohon    = $_POST['pemohon'];
$detail         = $nik.'#'.$nama.'#'.$tmpl.'#'.$tgll.'#'.$status.'#'.$kerjaan.'#'.$penghasilan.'#'.$almt.'#'.$keluarga.'#'.$program.'#'.$dtks.'#'.$msl.'#'.$klh.'#'.$fas.'#'.$pus.'#'.$sup;

mysqli_query($con, "DELETE FROM tb_dataassesment WHERE kode_surat='$kode'");

mysqli_query($con, "UPDATE tb_detailsurat SET nik='$nik', nama='$nama', detail='$detail' WHERE kode='$kode'");
   
if (isset($_POST['update'])){

$kodesrt    = $_POST['kodesrt'];
$nm         = $_POST['nm'];
$shdk       = $_POST['shdk'];
$umur           = $_POST['umur'];
$pekerjaan      = $_POST['pekerjaan'];
$gaji           = $_POST['gaji'];
var_dump($kodesrt);
var_dump($nm);
var_dump($shdk);
var_dump($umur);
var_dump($pekerjaan);
var_dump($gaji);

$kodesrt    = array_filter($kodesrt);
$nm     = array_filter($nm);
$shdk       = array_filter($shdk);
$umur           = array_filter($umur);
$pekerjaan      = array_filter($pekerjaan);
$gaji           = array_filter($gaji);

$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO tb_dataassesment SET
                kode_surat  = '$kodesrt[$i]',
                nama        = '$nm[$i]',
                shdk            = '$shdk[$i]',
                umur            = '$umur[$i]',
                pekerjaan       = '$pekerjaan[$i]',
                gaji            = '$gaji[$i]'
        ");
    }

echo "<script>alert('Instrument Assesment berhasil diupdate !'); window.location = '../../cetak/c_assesment.php?kode=$kode'</script>"; 		

}



?>


