<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nmternak 	= $_POST['nmternak'];
$jnternak 	= $_POST['jnternak'];
$ciriternak     = $_POST['ciriternak'];
$asalternak     = $_POST['asalternak'];
$tujuanternak 	= $_POST['tujuanternak'];

$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$detail         = $nmternak.';'.$jnternak.';'.$ciriternak.';'.$nama.';'.$asalternak.';'.$tujuanternak;

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
                                                                     
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
        if(isset($_POST['cetak'])){
mysqli_query($con, "INSERT INTO tb_buatsendiri (nik, nama, kode_surat, kode_jenis, no_surat, nmsurat, userid, status) VALUES ('$nik','$nama','$kode','$kodejenis','$nosur','$nmsurat','$idstf','onprocess')");
mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','onprocess')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail', '$lurah', '$idstf')");

echo "<script>alert('Surat Keterangan Pengantar Ternak berhasil dibuat!'); window.location = '../index.php?page=tunggu_suratmandiri&kode=$kode'</script>"; 
}
?>

