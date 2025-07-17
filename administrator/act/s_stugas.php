<?php
include '../../koneksi.php';

$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$nama 		= $_POST['nama'];
$nip 		= $_POST['nip'];
$pang 	    = $_POST['pang'];
$jbt	    = $_POST['jabatan'];

$tugas 		= $_POST['tugas'];
$mnb 		= $_POST['menimbang'];
$dasar 		= $_POST['dasar'];
$nosk       = $_POST['nosk'];
$tentang    = $_POST['tentang'];
$salinan    = $_POST['salinan'];
$blnr	    = $_POST['blnr'];
$lurah	 	= $_POST['lurah'];

$detail=$nama.'|'.$nip.'|'.$pang.'|'.$jbt.'|'.$tugas.'|'.$mnb.'|'.$dasar.'|'.$nosk.'|'.$tentang.'|'.$salinan;

$thn = date('Y');
                                                               
   $slash	= '/';
   $nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

    mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nip','$nama', '$detail','$lurah','$idstf')");

if (isset($_POST['cetak'])){
$kodetgs	= $_POST['kodesurattugas'];
$nm	 		= $_POST['nm'];
$satker     = $_POST['satker'];
$jab 	    = $_POST['jab'];
$tgl	 	= $_POST['tgl'];

var_dump($kodetgs);
var_dump($nm);
var_dump($satker);
var_dump($jab);
var_dump($tgl);


$kodetgs	= array_filter($kodetgs);
$nm			= array_filter($nm);
$satker     = array_filter($satker);
$jab	    = array_filter($jab);
$tgl		= array_filter($tgl);

$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO tb_datastugas SET
        	kodetgs	= '$kodetgs[$i]',
            nm    	= '$nm[$i]',
            satker  = '$satker[$i]',
            jab     = '$jab[$i]',
            tgl  	= '$tgl[$i]'
        ");
	}
		
echo "<script>alert('Surat Tugas berhasil dibuat!'); window.location = '../index.php?page=c_surattugas&kode=$kode'</script>"; 
}

else {
	echo 'Gagal';
}
?>


