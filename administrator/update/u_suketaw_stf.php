<?php
include '../koneksi.php';



$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];

$nik        = $_POST['nik'];
$nama       = $_POST['nama'];
$tglm       = $_POST['tglm'];
$tmpm       = $_POST['tmpm'];
$almta      = $_POST['almtakhir'];
$namasi     = $_POST['namasi'];
$jmla       = $_POST['jmlanak'];
$pemohon    = $_POST['pemohon'];
$detail     = $nik.';'.$nama.';'.$tglm.';'.$tmpm.';'.$almta.';'.$namasi.';'.$jmla.';'.$pemohon;

    mysqli_query($con, "DELETE FROM t_ahliwaris WHERE kodeaw='$kode'");

    mysqli_query($con, "UPDATE t_detailsurat SET no='$no', nik='$nik', nama='$nama', detail='$detail' WHERE kode='$kode'");
   
if (isset($_POST['update'])){

$kodeaw     = $_POST['kodesurataw'];
$nm         = $_POST['nm'];
$lp         = $_POST['lp'];
$ttl        = $_POST['ttl'];
$alamat     = $_POST['alamat'];
$agama      = $_POST['agama'];
$shdk       = $_POST['shdk'];
var_dump($kodeaw);
var_dump($nm);
var_dump($lp);
var_dump($ttl);
var_dump($alamat);
var_dump($agama);
var_dump($shdk);

$kodeaw     = array_filter($kodeaw);
$nm         = array_filter($nm);
$lp         = array_filter($lp);
$ttl        = array_filter($ttl);
$alamat     = array_filter($alamat);
$agama      = array_filter($agama);
$shdk       = array_filter($shdk);



$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO t_ahliwaris SET
            kodeaw  = '$kodeaw[$i]',
            nm      = '$nm[$i]',
            lp      = '$lp[$i]',
            ttl     = '$ttl[$i]',
            alamat  = '$alamat[$i]',
            agama   = '$agama[$i]',
            shdk    = '$shdk[$i]'
        ");
    }
        

echo "<script>alert('Surat Keterangan Ahli Waris berhasil diupdate !'); window.location = '../../staff/index.php?page=c_ahliwaris&kode=$kode'</script>"; 		

}



?>


