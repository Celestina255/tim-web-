<?php
session_start();
error_reporting(0);
include('../koneksi.php');

// Ambil input
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$pass  = mysqli_real_escape_string($con, $_POST['pass']);
$pass_md5 = md5($pass);
$last_login = gmdate("d-m-Y G:i", time() + 60 * 60 * 7);

// Cek di tb_admin dulu
$admin = mysqli_query($con, "SELECT * FROM tb_admin WHERE uname='$uname' AND pass='$pass_md5'");
if (mysqli_num_rows($admin) > 0) {
    $row = mysqli_fetch_array($admin);
    $_SESSION['level'] = $row['level'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['userid'] = $row['id'];
    $_SESSION['login_user'] = $row['uname'];

    mysqli_query($con, "UPDATE tb_admin SET last_login='$last_login', status='on' WHERE uname='$uname'");

    if ($row['level'] == 'admin') {
        header('location:../administrator/index.php?page=home');
    } elseif ($row['level'] == 'staff') {
        header('location:../staff/index.php?page=staff');
    } else {
        // fallback jika level tak dikenali
        echo "<script>alert('Level tidak dikenali.'); window.location = '../dashboard/index.php?page=login'</script>";
    }

} else {
    // Jika tidak ditemukan di tb_admin, cek di tb_warga
    $warga = mysqli_query($con, "SELECT * FROM tb_warga WHERE uname='$uname' AND pass='$pass_md5'");
    if (mysqli_num_rows($warga) > 0) {
        $row = mysqli_fetch_array($warga);
        $_SESSION['level'] = 'warga';
        $_SESSION['uname'] = $row['uname'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['login_user'] = $row['uname'];

        mysqli_query($con, "UPDATE tb_warga SET status='on' WHERE uname='$uname'");
        header('location:../warga/index.php?page=warga');
    } else {
        // Jika tidak ditemukan di keduanya
        session_destroy();
        echo "<script>alert('Username atau Password salah !'); window.location = '../dashboard/index.php?page=login'</script>";
    }
}
?>
