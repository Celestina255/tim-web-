<?php
session_start();
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include('../koneksi.php');

$input = htmlspecialchars($_POST['email_or_hp']);
$judul = 'Reset Password';
$pesan = 'Gunakan kode/token berikut untuk mengatur ulang password Anda:';
$token = rand(100000,999999); // Token 6 digit

$mail = new PHPMailer(true);

if (isset($_POST['reset'])) {
    // Validasi email
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Silakan masukkan email yang valid!'); window.location = '../dashboard/index.php?page=forgot'</script>";
        exit;
    }

    $found = false;

    // Cek email di tb_admin
    $cek_admin = mysqli_query($con, "SELECT * FROM tb_admin WHERE email='$input'");
    if (mysqli_num_rows($cek_admin) > 0) {
        mysqli_query($con, "UPDATE tb_admin SET token='$token' WHERE email='$input'");
        $_SESSION['reset_table'] = 'tb_admin';
        $_SESSION['reset_field'] = 'email';
        $_SESSION['reset_target'] = $input;
        $found = true;
    }

    // Cek email di tb_warga
    if (!$found) {
        $cek_warga = mysqli_query($con, "SELECT * FROM tb_warga WHERE email='$input'");
        if (mysqli_num_rows($cek_warga) > 0) {
            mysqli_query($con, "UPDATE tb_warga SET token='$token' WHERE email='$input'");
            $_SESSION['reset_table'] = 'tb_warga';
            $_SESSION['reset_field'] = 'email';
            $_SESSION['reset_target'] = $input;
            $found = true;
        }
    }

    if (!$found) {
        echo "<script>alert('Email tidak terdaftar di sistem!'); window.location = '../dashboard/index.php?page=forgot'</script>";
        exit;
    }

    // Kirim token ke email
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sdccreator12@gmail.com';  // Ganti dengan email pengirim
        $mail->Password   = 'rurpveofsnvsyqby';         // Ganti dengan app password Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('sdccreator12@gmail.com', 'Reset Password');
        $mail->addAddress($input);
        $mail->isHTML(true);
        $mail->Subject = $judul;
        $mail->Body    = "$pesan <br><b>$token</b>";
        $mail->send();

        echo "<script>alert('Token berhasil dikirim ke email Anda!'); window.location = '../dashboard/index.php?page=verifikasi_token'</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gagal mengirim token ke email!'); window.location = '../dashboard/index.php?page=forgot'</script>";
    }
}

// === Verifikasi token
elseif (isset($_POST['ver_tok'])) {
    $token_input = $_POST['token'];
    $table  = $_SESSION['reset_table'];
    $field  = $_SESSION['reset_field'];
    $target = $_SESSION['reset_target'];

    $cek = mysqli_query($con, "SELECT * FROM $table WHERE $field='$target' AND token='$token_input'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['token'] = $token_input;
        header('Location: ../dashboard/index.php?page=password_baru');
    } else {
        echo "<script>alert('Token tidak sesuai!'); window.location = '../dashboard/index.php?page=verifikasi_token'</script>";
    }
}

// === Ubah password
elseif (isset($_POST['ubah'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $token = $_SESSION['token'];
    $table = $_SESSION['reset_table'];

    if ($pass1 != $pass2) {
        echo "<script>alert('Password tidak cocok!'); window.location = '../dashboard/index.php?page=password_baru'</script>";
    } else {
        $hash = md5($pass1);
        mysqli_query($con, "UPDATE $table SET pass='$hash', token='' WHERE token='$token'");
        echo "<script>alert('Password berhasil diubah!'); window.location = '../dashboard/index.php?page=login'</script>";
    }
}
?>
