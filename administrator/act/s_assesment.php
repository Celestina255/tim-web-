<?php
error_reporting(0);
include '../../koneksi.php';

$kodejenis      = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
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

$detail         = $nik.'#'.$nama.'#'.$tmpl.'#'.$tgll.'#'.$status.'#'.$kerjaan.'#'.$penghasilan.'#'.$almt.'#'.$keluarga.'#'.$program.'#'.$dtks.'#'.$msl.'#'.$klh.'#'.$fas.'#'.$pus.'#'.$sup;
//$blnr           = $_POST['blnr'];
$lurah          = $_POST['lurah'];
//$thn            = date('Y');
                                                                  
//$slash      = '/';
//$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','-','$nik','$nama', '$detail','$lurah','$idstf')");

$kodesrt	= $_POST['kodesrt'];
$nm	        = $_POST['nm'];
$shdk		= $_POST['shdk'];
$umur           = $_POST['umur'];
$pekerjaan      = $_POST['pekerjaan'];
$gaji	        = $_POST['gaji'];
var_dump($kodesrt);
var_dump($nm);
var_dump($shdk);
var_dump($umur);
var_dump($pekerjaan);
var_dump($gaji);

$kodesrt	= array_filter($kodesrt);
$nm		= array_filter($nm);
$shdk		= array_filter($shdk);
$umur           = array_filter($umur);
$pekerjaan      = array_filter($pekerjaan);
$gaji	        = array_filter($gaji);


$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO tb_dataassesment SET
                kode_surat 	= '$kodesrt[$i]',
                nama    	= '$nm[$i]',
                shdk            = '$shdk[$i]',
                umur            = '$umur[$i]',
                pekerjaan       = '$pekerjaan[$i]',
                gaji 	        = '$gaji[$i]'
        ");
	}
		
echo "<script>alert('Instrument Assesment berhasil dibuat!'); window.location = '../../cetak/c_assesment.php?kode=$kode'</script>"; 
}


else {
	echo 'Instrument Assesment Gagal dibuat !';
}
?>


