<?php
include '../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];

$nama       = $_POST['nama'];
$nip        = $_POST['nip'];
$pang       = $_POST['pang'];
$jbt        = $_POST['jabatan'];

$tugas      = $_POST['tugas'];
$mnb        = $_POST['menimbang'];
$dasar      = $_POST['dasar'];
$nosk       = $_POST['nosk'];
$tentang    = $_POST['tentang'];
$salinan    = $_POST['salinan'];

$detail=$nama.'|'.$nip.'|'.$pang.'|'.$jbt.'|'.$tugas.'|'.$mnb.'|'.$dasar.'|'.$nosk.'|'.$tentang.'|'.$salinan;

mysqli_query($con, "DELETE FROM t_datastugas WHERE kodetgs='$kode'");

mysqli_query($con, "UPDATE t_detailsurat SET no='$no', nik='$nip', nama='$nama', detail='$detail' WHERE kode='$kode'");

if (isset($_POST['update'])){
$kodetgs    = $_POST['kodesurattugas'];
$nm         = $_POST['nm'];
$satker     = $_POST['satker'];
$jab        = $_POST['jab'];
$tgl        = $_POST['tgl'];

var_dump($kodetgs);
var_dump($nm);
var_dump($satker);
var_dump($jab);
var_dump($tgl);

$kodetgs    = array_filter($kodetgs);
$nm         = array_filter($nm);
$satker     = array_filter($satker);
$jab        = array_filter($jab);
$tgl        = array_filter($tgl);

$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO t_datastugas SET
            kodetgs = '$kodetgs[$i]',
            nm      = '$nm[$i]',
            satker  = '$satker[$i]',
            jab     = '$jab[$i]',
            tgl     = '$tgl[$i]'
        ");
    }
        

echo "<script>alert('Surat Tugas berhasil dibuat!'); window.location = '../../staff/index.php?page=c_surattugas&kode=$kode'</script>"; 		

}


else {
	echo 'Gagal';
}
?>


