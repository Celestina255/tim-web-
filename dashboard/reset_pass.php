<?php
session_start();
error_reporting(0);
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = htmlspecialchars($_POST['email']);
$judul = 'Reset Password';
$pesan = 'Silahkan masukan Kode/Token dibawah untuk membuat password kamu';

$mail = new PHPMailer(true);


include('../koneksi.php');

$data_email = mysqli_query($con, "SELECT email FROM tb_admin WHERE email='$email'");
$row        = mysqli_fetch_array($data_email); 
$acak       = rand(000000,999999);

if (isset($_POST['reset'])){
if ($row['email']!=$email){
    echo "<script>alert('Email tidak terdaftar !'); window.location = '../dashboard/index.php?page=forgot'</script>";
} else{
  mysqli_query($con, "UPDATE tb_admin SET token='$acak' WHERE email='$email'");
  try {                       
    $mail->SMTPDebug = 2;  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sdccreator12@gmail.com';
    $mail->Password   = 'rurpveofsnvsyqby';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;  

    $mail->setFrom('sdccreator12@gmail.com', 'Reset password');
        $mail->addAddress($email); 

        $mail->isHTML(true);
        $mail->Subject = $judul;    
        $mail->Body = $pesan."<br><b>".$acak."</b>";
        $mail->send();
        echo "<script>alert('Token berhasil dikirim !'); window.location = '../dashboard/index.php?page=verifikasi_token'</script>";

    }catch (Exception $e) {
        echo "<script>alert('Kirim token gagal !'); window.location = '../dashboard/index.php?page=forgot'</script>";

    }
 
}
}elseif (isset($_POST['ver_tok'])){
$token      =  $_POST['token'];
$data_token = mysqli_query($con, "SELECT token FROM tb_admin WHERE token='$token'");
$roww      = mysqli_fetch_array($data_token);
 if ($roww['token']!=$token){
    echo "<script>alert('Token yang kamu masukan tidak sesuai !'); window.location = '../dashboard/index.php?page=verifikasi_token'</script>";
} else{
    $_SESSION['token']=$_POST['token'];
 header('location:../dashboard/index.php?page=password_baru');
}
}elseif (isset($_POST['ubah'])){
    $pass1 =  $_POST['pass1'];
    $pass2 =  $_POST['pass2'];
    $p1      = md5($pass1);
    $p2      = md5($pass2);
if($pass1==$pass2){
    if($pass1 != $pass2){
        echo "<script>alert('Password 1 dan 2 tidak cocok !'); window.location = '../dashboard/index.php?page=password_baru'</script>";
    }else{
        mysqli_query($con, "UPDATE tb_admin SET pass='$p2' WHERE token='$_SESSION[token]'");
                echo "<script>alert('Ubah Password berhasil !'); window.location = '../dashboard/index.php?page=login'</script>";
    }
}
}
?>
 
