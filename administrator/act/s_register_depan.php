<?php
include '../../koneksi.php';
	$un			    = $_POST['uname'];
	$email			= $_POST['email'];
	$hp 			= $_POST['hp'];
    $kelurahan           = $_POST['kelurahan'];
	$level 			= $_POST['level'];
	$pass           =md5($_POST['pass']);

        $lokasi_file    = $_FILES['foto']['tmp_name'];
        $nama_file      = $_FILES['foto']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;
        $vdir_upload = "../../file/foto/";
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
       
        $simpan=(isset($_POST['reg']));   
       
        if ($simpan){
            if (empty($lokasi_file)){
            //echo "<center><font color='#FF0000' size='+2'>Maaf Anda belum memilih Gambar<br></font></center>";
            ?><script language="javascript">alert('Maaf Anda belum memilih Foto')</script><?php
            ?><script>document.location.href="../../reg_staff.php";</script><?php
    }else{
        mysqli_query($con, "INSERT INTO tb_admin (uname, email, hp, kelurahan, pass, tgl, foto, level, last_login, token, status) VALUES ('$un','$email','$hp','$kelurahan','$pass','".date('Y-m-d')."','$nama_file_unik','$level','','','')")or die (Error.mysqli_error());
        //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
                ?><script language="javascript">alert('Registrasi Berhasil !')</script><?php
            ?><script>document.location.href="../../login.php";</script><?php
    }
        }
        ?>
