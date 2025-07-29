<?php
include '../koneksi.php';

if (isset($_POST['reg'])) {
    $uname     = $_POST['uname'];
    $email     = $_POST['email'];
    $hp        = $_POST['hp'];
    $kelurahan = $_POST['kelurahan'];
    $pass      = md5($_POST['pass']);
    $tgl       = date('Y-m-d');
    $status    = 'off';
    $token     = rand(100000, 999999); // untuk verifikasi jika dibutuhkan

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    $lokasi = "../img/user/";

    if ($foto != '') {
        move_uploaded_file($tmp, $lokasi . $foto);
    } else {
        $foto = ""; // jika kosong
    }

    // Cek email sudah terdaftar?
    $cek = mysqli_query($con, "SELECT * FROM tb_warga WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.'); window.location='../index.php?page=registrasi';</script>";
    } else {
        // Simpan data ke tabel tb_warga
        $query = mysqli_query($con, "INSERT INTO tb_warga 
            (uname, email, hp, kelurahan, pass, tgl, foto, status, token)
            VALUES 
            ('$uname', '$email', '$hp', '$kelurahan', '$pass', '$tgl', '$foto', '$status', '$token')");

        if ($query) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='../index.php?page=login';</script>";
        } else {
            echo "<script>alert('Registrasi gagal. Silakan coba lagi.'); window.location='../index.php?page=registrasi';</script>";
        }
    }
}
?>
