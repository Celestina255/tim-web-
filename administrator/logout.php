<?php 
session_start();
include('../koneksi.php');
session_destroy();
$id=$_SESSION['id'];
mysqli_query($con, "UPDATE tb_admin SET status='off' WHERE id='$id'");
header("location:../index.php");
?>