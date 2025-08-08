<?php
include 'koneksi.php';
require '../pengunjung.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Website Kampung Banjar Ausoy</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/morris.css">
  <!-- MATIKAN FONT-AWESOME LOKAL (bentrok dengan CDN) -->
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="css/icon-font.css">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/colorbox.css">

  <!-- PAKAI CSS GLOBAL DARI DASHBOARD (BIAR KONSISTEN) -->
  <link rel="stylesheet" href="../dashboard/css/style.css">
  <link rel="stylesheet" href="../dashboard/css/responsive.css">

  <!-- PATCH DARURAT: cegah dropdown/side menu bocor saat file konten nyisipin CSS lain -->
  <style>
    /* Sidebar hidden by default */
    .sidebar{transform:translateX(100%);opacity:0;visibility:hidden;transition:.3s}
    .sidebar.active{transform:none;opacity:1;visibility:visible}

    /* Dropdown navbar (desktop) tidak bocor */
    .navbar .dropdown-menu{display:none !important; position:absolute; z-index:1000;}
    .navbar .dropdown:hover>.dropdown-menu{display:block !important;}

    /* Rapikan list sidebar */
    .sidebar-nav,.sidebar-submenu{list-style:none; padding-left:0; margin:0;}
    .sidebar-submenu{display:none;}
    .sidebar-dropdown.open>.sidebar-submenu{display:block;}
  </style>
</head>

<body>
<?php 
$q = mysqli_query($con, "SELECT * FROM tb_kelurahan LIMIT 1");
$r = mysqli_fetch_array($q);
?>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="navbar-container">
    <!-- KIRI: Logo dan Nama -->
    <div class="kampung-info" id="kampungInfo">
      <img src="../img/logo.png" alt="Logo" class="logo">
      <div class="text-info ml-2">
        <div class="text-bold">Kampung Banjar Ausoy</div>
        <div>Kabupaten Teluk Bintuni</div>
      </div>
    </div>

    <!-- TOMBOL HAMBURGER -->
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <i class="fa fa-bars"></i>
    </button>

    <!-- MENU UTAMA NAVBAR (Desktop) -->
    <div class="navbar-main-wrapper">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php?page=warga">Beranda</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=sejarah">Sejarah</a></li>
            <li><a class="dropdown-item" href="?page=struktur">Struktur</a></li>
            <li><a class="dropdown-item" href="?page=visimisi">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="?page=petadesa">Peta Desa</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="?page=galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=contact">Pengaduan</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Layanan</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=layanan">Permohonan Surat</a></li>
            <li><a class="dropdown-item" href="?page=layanan">Buat Surat Mandiri</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Lembaga Masyarakat</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=permohonan">BUMDes</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">Karang Taruna</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">RT/RW</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">PKK</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Transparansi</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=transparansi_penduduk">Data Penduduk</a></li>
            <li><a class="dropdown-item" href="?page=transparansi_apbdes">APBD</a></li>
            <li><a class="dropdown-item" href="?page=transparansi_idm">IDM</a></li>
          </ul>
        </li>
      </ul>

      <div class="logout-wrapper">
        <a href="logout.php" class="top-right-btn btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</nav>
<!-- /NAVBAR -->

<!-- SIDEBAR RESPONSIF -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="sidebar-header d-flex align-items-center mb-3">
    <img src="../img/logo.png" alt="Logo" style="height:55px;margin-right:10px;">
    <div>
      <div style="font-weight:bold;font-size:16px;">Kampung Banjar Ausoy</div>
      <div style="font-size:13px;">Kabupaten Teluk Bintuni</div>
    </div>
  </div>

  <button class="close-btn" id="closeSidebar" aria-label="Tutup">
    <i class="fa fa-times"></i>
  </button>

  <ul class="sidebar-nav">
    <li><a href="index.php?page=warga">Beranda</a></li>

    <li class="sidebar-dropdown">
      <a href="#">Profil <i class="fa fa-chevron-down toggle-icon"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="?page=sejarah">Sejarah</a></li>
        <li><a href="?page=struktur">Struktur</a></li>
        <li><a href="?page=visimisi">Visi & Misi</a></li>
        <li><a href="?page=petadesa">Peta Desa</a></li>
      </ul>
    </li>

    <li><a href="?page=galeri">Galeri</a></li>
    <li><a href="?page=berita">Berita</a></li>
    <li><a href="?page=contact">Pengaduan</a></li>

    <li class="sidebar-dropdown">
      <a href="#">Layanan <i class="fa fa-chevron-down toggle-icon"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="?page=layanan">Permohonan Surat</a></li>
        <li><a href="?page=layanan">Buat Surat Mandiri</a></li>
      </ul>
    </li>

    <li class="sidebar-dropdown">
      <a href="#">Lembaga Masyarakat <i class="fa fa-chevron-down toggle-icon"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="?page=permohonan">BUMDes</a></li>
        <li><a href="?page=mandiri">Karang Taruna</a></li>
        <li><a href="?page=mandiri">RT/RW</a></li>
        <li><a href="?page=mandiri">PKK</a></li>
      </ul>
    </li>

    <li class="sidebar-dropdown">
      <a href="#">Transparansi <i class="fa fa-chevron-down toggle-icon"></i></a>
      <ul class="sidebar-submenu">
        <li><a href="?page=transparansi_penduduk">Data Penduduk</a></li>
        <li><a href="?page=transparansi_apbdes">APBD</a></li>
        <li><a href="?page=transparansi_idm">IDM</a></li>
      </ul>
    </li>
  </ul>

  <div class="sidebar-login">
    <a href="logout.php" class="top-right-btn btn btn-primary">Logout</a>
  </div>
</div>
<!-- /SIDEBAR -->

<?php include 'load_file_warga.php'; ?>

<!-- FOOTER -->
<footer class="footer" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 footer-widget text-center">
        <img src="../img/logo.png" alt="Logo" class="footer-logo-img">
      </div>

      <div class="col-lg-4 col-md-8 footer-widget-kampung">
        <h3 class="footer-title">Pemerintah Kampung Banjar Ausoy</h3>
        <p>
          Jalan Poros Manimeri Bintuni SP IV<br>
          Kampung Banjar Ausoy, Kecamatan Manimeri,<br>
          Kabupaten Teluk Bintuni<br>
          Provinsi Papua Barat, 98364
        </p>
      </div>

      <?php
      $query = mysqli_query($con, "SELECT * FROM tb_hubungi LIMIT 1");
      $data  = mysqli_fetch_assoc($query);
      ?>

      <div class="col-lg-3 col-md-6 mb-3">
        <h5 style="color: white;"><strong>Hubungi Kami</strong></h5>
        <p><i class="fa fa-phone"></i> <?= $data['telepon'] ?></p>
        <p><i class="fa fa-envelope"></i> <?= $data['email'] ?></p>
        <div class="social-icons mt-2">
          <a href="<?= $data['instagram'] ?>" target="_blank" style="margin-right: 10px;"><i class="fa fa-instagram"></i></a>
          <a href="<?= $data['facebook']  ?>" target="_blank" style="margin-right: 10px;"><i class="fa fa-facebook"></i></a>
          <a href="<?= $data['whatsapp']  ?>" target="_blank" style="margin-right: 10px;"><i class="fa fa-whatsapp"></i></a>
          <a href="<?= $data['youtube']   ?>" target="_blank" style="margin-right: 10px;"><i class="fa fa-youtube"></i></a>
          <a href="<?= $data['tiktok']    ?>" target="_blank" style="margin-right: 10px;"><i class="fab fa-tiktok"></i></a>
          <a href="<?= $data['x']         ?>" target="_blank" style="margin-right: 10px;"><i class="fab fa-x-twitter"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 footer-widget-jelajahi">
        <h3 class="footer-title">Jelajahi</h3>
        <div class="footer-links-wrapper">
          <ul class="footer-links">
            <li><a href="?page=warga">Beranda</a></li>
            <li><a href="?page=berita">Berita</a></li>
            <li><a href="?page=contact">Pengaduan</a></li>
            <li><a href="?page=status">Status Surat</a></li>
          </ul>
          <ul class="footer-links">
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">Lembaga Masyarakat</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=lembaga_bumdes">BUMDes</a></li>
                <li><a class="dropdown-item" href="?page=lembaga_karangtaruna">Karang Taruna</a></li>
                <li><a class="dropdown-item" href="?page=lembaga_rtrw">RT/RW</a></li>
                <li><a class="dropdown-item" href="?page=lembaga_pkk">PKK</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">Profil</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=sejarah">Sejarah</a></li>
                <li><a class="dropdown-item" href="?page=struktur">Struktur</a></li>
                <li><a class="dropdown-item" href="?page=visimisi">Visi & Misi</a></li>
                <li><a class="dropdown-item" href="?page=petadesa">Peta Desa</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">Transparansi</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=transparansi_penduduk">Data Penduduk</a></li>
                <li><a class="dropdown-item" href="?page=transparansi_apbdes">APBD</a></li>
                <li><a class="dropdown-item" href="?page=transparansi_idm">IDM</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">Layanan</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=login">Permohonan Surat</a></li>
                <li><a class="dropdown-item" href="?page=login">Buat Surat Mandiri</a></li>
                <li><a class="dropdown-item" href="?page=pstatus">Status Surat</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container text-center">
      <p>© 2025 - Website Kampung Banjar Ausoy Powered by KKN Tematik Unipa 2025</p>
    </div>
  </div>

  <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
    <button class="btn btn-primary" title="Back to Top">
      <i class="fa fa-angle-double-up"></i>
    </button>
  </div>
</footer>
<!-- /FOOTER -->

<!-- JS (urutannya penting) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

<!-- SCRIPT NAVBAR -->
<script>
  const hamburger = document.getElementById('hamburger');
  const sidebar = document.getElementById('sidebar');
  const closeSidebar = document.getElementById('closeSidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const kampungInfo = document.getElementById('kampungInfo');

  hamburger.addEventListener('click', () => {
    sidebar.classList.add('active');
    overlay.classList.add('active');
    if (kampungInfo) kampungInfo.style.display = 'none';
  });

  if (closeSidebar) {
    closeSidebar.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      if (kampungInfo) kampungInfo.style.display = 'flex';
    });
  }

  if (overlay) {
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      if (kampungInfo) kampungInfo.style.display = 'flex';
    });
  }

  window.addEventListener('resize', () => {
    if (window.innerWidth > 1350) {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      if (kampungInfo) kampungInfo.style.display = 'flex';
    }
  });
</script>
</body>
</html>
