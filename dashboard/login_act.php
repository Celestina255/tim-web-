<?php
session_start();
error_reporting(0);
include('../koneksi.php');
//protect dari mysql injection
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);
$query="SELECT * FROM tb_admin WHERE uname='$uname' and pass=md5('$pass')";
$sql= mysqli_query($con, $query);
$cek= mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql);
$last_login = gmdate("d-m-Y G:i", time()+60*60*7);
$_SESSION['level']=$row['level'];
$_SESSION['uname']=$row['uname'];
$_SESSION['userid']=$row['id'];

if ($_SESSION['level']=='admin'){
    mysqli_query($con, "UPDATE tb_admin SET last_login='$last_login', status='on' WHERE uname='$uname'");
 header('location:../administrator/index.php?page=home');
//ubah sesuai keinginan
} else if($_SESSION['level']=='staff'){
    mysqli_query($con, "UPDATE tb_admin SET last_login='$last_login', status='on' WHERE uname='$uname'");
 header('location:../staff/index.php?page=staff');
}else if($_SESSION['level']=='warga'){
    mysqli_query($con, "UPDATE tb_admin SET last_login='$last_login', status='on' WHERE uname='$uname'");
 header('location:../warga/index.php?page=warga');
} else{
 session_destroy();

 echo "<script>alert('Username atau Password salah !'); window.location = '../dashboard/index.php?page=home'</script>"; 
}
 ?>
 
