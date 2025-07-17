<?php
include '../../koneksi.php';
include "../../include/fungsi_thumb.php";
$id			= $_POST['id'];
$sejarah	= $_POST['sejarah'];
$visi 		= $_POST['visi'];
$misi 		= $_POST['misi'];
$peta		= $_POST['peta'];

$lf_gsj    		= $_FILES['gsj']['tmp_name'];
$tf_gsj      	= $_FILES['gsj']['type'];
$nf_gsj      	= $_FILES['gsj']['name'];
$acak_gsj       = rand(000000,999999);
$nfu_gsj   		= $acak_gsj.$nf_gsj; 

$lf_gvisi  		= $_FILES['gvisi']['tmp_name'];
$tf_gvisi      	= $_FILES['gvisi']['type'];
$nf_gvisi      	= $_FILES['gvisi']['name'];
$acak_gvisi     = rand(000000,999999);
$nfu_gvisi   	= $acak_gvisi.$nf_gvisi; 

$lf_gpeta    	= $_FILES['gpeta']['tmp_name'];
$tf_gpeta      	= $_FILES['gpeta']['type'];
$nf_gpeta      	= $_FILES['gpeta']['name'];
$acak_gpeta     = rand(000000,999999);
$nfu_gpeta   	= $acak_gpeta.$nf_gpeta; 

$lf_gst    		= $_FILES['gst']['tmp_name'];
$tf_gst      	= $_FILES['gst']['type'];
$nf_gst      	= $_FILES['gst']['name'];
$acak_gst       = rand(000000,999999);
$nfu_gst   		= $acak_gst.$nf_gst; 
if (isset($_POST['update'])){
	if (!empty($lf_gsj)){
		UploadGsj($nfu_gsj);
		$df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
		$d      = mysqli_fetch_array($df); 
		@unlink('../../dashboard/images/pages/'.$d['gambar_sejarah']);

		$qu=mysqli_query($con, "UPDATE tb_profile SET sejarah='$sejarah', visi='$visi', misi='$misi', peta='$peta', gambar_sejarah ='$nfu_gsj' WHERE id_profil='$id'")or die (mysqli_error($qu));

		echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>"; 
	}elseif(!empty($lf_gvisi)){
		UploadGvisi($nfu_gvisi);
		$df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
		$d      = mysqli_fetch_array($df); 
		@unlink('../../dashboard/images/pages/'.$d['gambar_visi']);

		$qu=mysqli_query($con, "UPDATE tb_profile SET sejarah='$sejarah', visi='$visi', misi='$misi', peta='$peta', gambar_visi='$nfu_gvisi' WHERE id_profil='$id'")or die (mysqli_error($qu));

		echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>"; 
	}elseif(!empty($lf_gpeta)){
		UploadGpeta($nfu_gpeta);

		$df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
		$d      = mysqli_fetch_array($df); 
		@unlink('../../dashboard/images/pages/'.$d['gambar_peta']);
		@unlink('../../dashboard/images/pages/'.$d['gambar_struktur']);

		$qu=mysqli_query($con, "UPDATE tb_profile SET sejarah='$sejarah', visi='$visi', misi='$misi', peta='$peta', gambar_peta='$nfu_gpeta' WHERE id_profil='$id'")or die (mysqli_error($qu));

		echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>"; 
	}elseif(!empty($lf_gst)){
		UploadGst($nfu_gst);
		$df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
		$d      = mysqli_fetch_array($df); 
		@unlink('../../dashboard/images/pages/'.$d['gambar_struktur']);
		$qu=mysqli_query($con, "UPDATE tb_profile SET sejarah='$sejarah', visi='$visi', misi='$misi', peta='$peta', gambar_struktur='$nfu_gst' WHERE id_profil='$id'")or die (mysqli_error($qu));

		echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>"; 
	}elseif(!empty($lf_gsj) AND !empty($lf_gvisi) AND !empty($lf_gpeta) AND !empty($lf_gst)){
		UploadGsj($nfu_gsj);
		UploadGvisi($nfu_gvisi);
		UploadGpeta($nfu_gpeta);
		UploadGst($nfu_gst);
		$df = mysqli_query($con, "SELECT * FROM tb_profile WHERE id_profil='$id'");
		$d      = mysqli_fetch_array($df); 
		@unlink('../../dashboard/images/pages/'.$d['gambar_sejarah']);
		@unlink('../../dashboard/images/pages/'.$d['gambar_visi']);
		@unlink('../../dashboard/images/pages/'.$d['gambar_peta']);
		@unlink('../../dashboard/images/pages/'.$d['gambar_struktur']);

		$qu=mysqli_query($con, "UPDATE tb_profile SET sejarah='$sejarah', visi='$visi', misi='$misi', peta='$peta', gambar_sejarah ='$nfu_gsj', gambar_visi='$nfu_gvisi', gambar_peta='$nfu_gpeta', gambar_struktur='$nfu_gst' WHERE id_profil='$id'")or die (mysqli_error($qu));

		echo "<script>alert('Update Profil berhasil !'); window.location = '../index.php?page=profil_desa'</script>"; 

	}else{
		echo "<script>alert('Update Profile gagal !'); window.location = '../index.php?page=profil_desa'</script>"; 
	}
}
?>

