<?php
include '../koneksi.php';
	$un			    = $_POST['uname'];
	$email			= $_POST['email'];
	$hp 			= $_POST['hp'];
    $kelurahan      = $_POST['kelurahan'];
	$pass           =md5($_POST['pass']);

        $lokasi_file    = $_FILES['foto']['tmp_name'];
        $nama_file      = $_FILES['foto']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;
        $vdir_upload = "../file/foto/";
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
       
        $simpan=(isset($_POST['reg']));   
       
        if ($simpan){
            if (empty($lokasi_file)){
           echo "<script>alert('Anda belum melampirkan foto, Pendaftaran user gagal !'); window.location = '../dashboard/index.php?page=home'</script>";
    }else{
        mysqli_query($con, "INSERT INTO tb_admin (uname, email, hp, kelurahan, pass, tgl, foto, level, last_login, token, status) VALUES ('$un','$email','$hp','$kelurahan','$pass','".date('Y-m-d')."','$nama_file_unik','warga','','','')")or die (Error.mysqli_error());
        echo "<script>alert('Pendaftaran user berhasil !'); window.location = '../dashboard/index.php?page=home'</script>";
    }
        }
        ?>
