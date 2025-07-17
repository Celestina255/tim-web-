<?php
include '../../koneksi.php';
$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$nika       = $_POST['nika'];
$namaa      = $_POST['namaa'];
$nmayaha    = $_POST['nmayaha'];
$jka        = $_POST['jka'];
$tmp_lahira = $_POST['tmp_lahira'];
$tgl_lahira = $_POST['tgl_lahira'];
$kwnga      = $_POST['kwnga'];
$agamaa     = $_POST['agamaa'];
$pkjna      = $_POST['pkjna'];
    $kelurahana           = $_POST['kelurahana'];
    $keca            = $_POST['keca'];
    $kaba            = $_POST['kaba'];
    $prova           = $_POST['prova'];
$almtca        = $_POST['almta'];
$statusa    = $_POST['statusa'];
$nna        = $_POST['statusna'];

$nikb       = $_POST['nikb'];
$namab      = $_POST['namab'];
$nmayahb    = $_POST['nmayahb'];
$jkb        = $_POST['jkb'];
$tmp_lahirb = $_POST['tmp_lahirb'];
$tgl_lahirb = $_POST['tgl_lahirb'];
$kwngb      = $_POST['kwngb'];
$agamab     = $_POST['agamab'];
$pkjnb      = $_POST['pkjnb'];
    $kelurahanb           = $_POST['kelurahanb'];
    $kecb            = $_POST['kecb'];
    $kabb           = $_POST['kabb'];
    $provb           = $_POST['provb'];
$almtcb        = $_POST['almtb'];
$statusb    = $_POST['statusb'];
$nnb        = $_POST['statusnb'];

$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$bin       = $_POST['bin'];
$jk 		= $_POST['jk'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$kwng       = $_POST['kwng'];
$agama 		= $_POST['agama'];
$pkjn       = $_POST['pkjn'];
$almtay 		= $_POST['almt'];
    $kelurahan           = $_POST['kelurahan'];
    $kec            = $_POST['kec'];
    $kab            = $_POST['kab'];
    $prov           = $_POST['prov'];
$status     = $_POST['status'];

$nik1       = $_POST['nik1'];
$nama1      = $_POST['nama1'];
$bin1      = $_POST['bin1'];
$jk1        = $_POST['jk1'];
$tmp_lahir1 = $_POST['tmp_lahir1'];
$tgl_lahir1 = $_POST['tgl_lahir1'];
$kwng1      = $_POST['kwng1'];
$agama1     = $_POST['agama1'];
$pkjn1      = $_POST['pkjn1'];
$almtibu        = $_POST['almt1'];
    $desa1           = $_POST['desa1'];
    $kec1            = $_POST['kec1'];
    $kab1            = $_POST['kab1'];
    $prov1           = $_POST['prov1'];
$status1    = $_POST['status1'];

$hari       = $_POST['hari'];
$tgl        = $_POST['tgl'];
$wkt        = $_POST['waktu'];
$tmpt       = $_POST['tmpt'];
$maskawin   = $_POST['maskawin'];

$blnr       = $_POST['blnr'];
$lurah      = $_POST['lurah'];
$thn        = date('Y');

$detail     =$nika.';'.$namaa.';'.$nmayaha.';'.$jka.';'.$tmp_lahira.';'.$tgl_lahira.';'.$kwnga.';'.$agamaa.';'.$pkjna.';'.$kelurahana.';'.$keca.';'.$kaba.';'.$prova.';'.$almtca.';'.$statusa.';'.$nna.';'.$nikb.';'.$namab.';'.$nmayahb.';'.$jkb.';'.$tmp_lahirb.';'.$tgl_lahirb.';'.$kwngb.';'.$agamab.';'.$pkjnb.';'.$kelurahanb.';'.$kecb.';'.$kabb.';'.$provb.';'.$almtcb.';'.$statusb.';'.$nnb.';'.$nik.';'.$nama.';'.$bin.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$kwng.';'.$agama.';'.$pkjn.';'.$kelurahan.';'.$kec.';'.$kab.';'.$prov.';'.$almtay.';'.$status.';'.$nik1.';'.$nama1.';'.$bin1.';'.$jk1.';'.$tmp_lahir1.';'.$tgl_lahir1.';'.$kwng1.';'.$agama1.';'.$pkjn1.';'.$desa1.';'.$kec1.';'.$kab1.';'.$prov1.';'.$almtibu.';'.$status1.';'.$hari.';'.$tgl.';'.$wkt.';'.$tmpt.';'.$maskawin;                                  
$slash      = '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){
mysqli_query($con, "INSERT INTO tb_buatsendiri (nik, nama, kode_surat, kode_jenis, no_surat, nmsurat, userid, status) VALUES ('$nik','$nama','$kode','$kodejenis','$nosur','$nmsurat','$idstf','onprocess')");

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','onprocess')");

    mysqli_query($con, "INSERT INTO tb_datacalon (kode, nik, nama, binbinti, jk, tmp_lahir, tgl_lahir, kwng, agama, pkjn, prov, kab, kec, kelurahan, alamat, status, status_na) values('$kode','$nika','$namaa','$nmayaha','$jka','$tmp_lahira','$tgl_lahira','$kwnga','$agamaa','$pkjna','$prova','$kaba','$keca','$kelurahana','$almtca', '$statusa','$nna')");
    mysqli_query($con, "INSERT INTO t_datacalon (kode, nik, nama, binbinti, jk, tmp_lahir, tgl_lahir, kwng, agama, pkjn, prov, kab, kec, kelurahan, alamat, status, status_na) values('$kode','$nikb','$namab','$nmayahb','$jkb','$tmp_lahirb','$tgl_lahirb','$kwngb','$agamab','$pkjnb', '$provb','$kabb','$kecb','$kelurahanb','$almtcb', '$statusb','$nnb')");

   mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd,  id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nika','$namaa', '$detail','$lurah','$idstf')");


echo "<script>alert('Surat Pengantar Nikah berhasil dibuat!'); window.location = '../index.php?page=tunggu_suratmandiri&kode=$kode'</script>"; 
}
?>


