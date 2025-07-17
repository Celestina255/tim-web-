<?php
include '../../koneksi.php';
    $id             = $_POST['id'];
	$kodekelurahan	= $_POST['kodekelurahan'];
	$kelurahan		= $_POST['kelurahan'];
	$kodekec		= $_POST['kodekec'];
	$kec 			= $_POST['kec'];
	$kodekab		= $_POST['kodekab'];
	$kab 			= $_POST['kab'];
    $kodeprov       = $_POST['kodeprov'];
    $prov           = $_POST['prov'];
	$kantor	 		= $_POST['kantor'];
	$telp			= $_POST['telp'];
	$lurah			= $_POST['lurah'];
	$niplurah		= $_POST['niplurah'];
	$seklur 		= $_POST['seklur'];
	$nipseklur		= $_POST['nipseklur'];
	$keu 			= $_POST['keu'];
	$email 			= $_POST['email'];
    $nmc            = $_POST['camat'];
    $nipc           = $_POST['nipcamat'];

    $nmk            = $_POST['nm_kepala'];
    $nipk           = $_POST['nip_kepala'];
    $pangk          = $_POST['pang_kepala'];
    $almtk          = $_POST['almt_kua'];
    $telpk          = $_POST['telp_kua'];
    $jnpem          = $_POST['jnpem'];

    $x				=$_POST['x'];
    $foto         	=$_FILES['logo']['tmp_name'];
    $foto_name     	=$_FILES['logo']['name'];
    $acak        	= rand(1,99);
    $tujuan_foto 	= $acak.$foto_name;
    $tempat_foto 	= '../../img/'.$tujuan_foto;
           
    if (isset($_POST['update'])){
    if (!$foto==""){
        $buat_foto=$tujuan_foto;
        $d = '../../img/'.$x;
        @unlink ("$d");
        copy ($foto,$tempat_foto);
    }else{
        $buat_foto=$x;
    }
    $qu=mysqli_query($con, "UPDATE tb_kelurahan SET
                kodekelurahan  ='$kodekelurahan',
                kelurahan      ='$kelurahan',
                kodekec        ='$kodekec',
                kec            ='$kec',
                kodekab        ='$kodekab',
                kab            ='$kab',
                kodeprov       ='$kodeprov',
                prov           ='$prov',
                kantor         ='$kantor',
                telp           ='$telp',
                lurah          ='$lurah',
                niplurah       ='$niplurah',
                seklur         ='$seklur',
                nipseklur      ='$nipseklur',
                bendahara      ='$keu',
                email          ='$email',
                logo 		   ='$buat_foto',
                jnp            ='$jnpem'
        WHERE id='$id'")or die (mysqli_error());
        $qu=mysqli_query($con, "UPDATE tb_kecamatan SET
                kodekecamatan  ='$kodekec',
                kecamatan      ='$kec',
                nama_camat     ='$nmc',
                nip_camat      ='$nipc'
        WHERE id='$id'")or die (mysqli_error());
         $qu=mysqli_query($con, "UPDATE tb_kua SET
                nm_kepala       ='$nmk',
                nip_kepala      ='$nipk',
                pangjab_kepala  ='$pangk',
                almt_kua        ='$almtk',
                telp_kua        ='$telpk'
        WHERE id='$id'")or die (mysqli_error());
       echo "<script>alert('Data berhasil diupdate!'); window.location = '../index.php?page=master_desa'</script>";
        }
    ?>