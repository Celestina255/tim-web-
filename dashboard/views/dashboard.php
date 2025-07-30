<Head>
   <link rel="stylesheet" href="../dashboard/css/style.css">
</Head>
<body>

   <main class="hero-section">
      <div class="hero-content">
         <h2>SELAMAT DATANG</h2>
         <h1>KAMPUNG BANJAR AUSOY</h1>
         <p><span class="highlight">Perluas Jangkauan Dan Percepat Pelayanan Dengan Smart System Terintegrasi</span></p>
         <div class="menu-icons">
            <div class="icon-item">
               <img src="../img/profile.png" alt="profile">
               <p>Informasi</p>
            </div>
            <div class="icon-item">
               <img src="../img/surat.png" alt="surat">
               <p>Layanan Persuratan</p>
            </div>
            <div class="icon-item">
               <img src="../img/transparasi.png" alt="transparansi">
               <p>Transparansi</p>
            </div>
         </div>
      </div>
   </main>  
   </body> 
 <!-- Batas -->

<!-- Sambutan -->
  <section class="sambutan-section py-5">
    <div class="container">
      <div class="text-center">
        <h2 class="section-title text-success" style="color: #2caa50;">SAMBUTAN KEPALA KAMPUNG</h2>
      </div>
      <div class="row d-flex align-items-start mt-4">
        <div class="col-md-4 text-center mb-4 mb-md-0 d-flex justify-content-center align-items-start">
          <img src="../img/sambutan/<?php echo $data['foto']; ?>" alt="Kepala Kampung" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-8">
          <p class="fw-bold text-uppercase mb-1"><?php echo strtoupper($data['nama_kepala']); ?></p>
          <p class="mb-3 fw-bold"><?php echo $data['jabatan']; ?></p>
          <div class="scrollable-text" style="max-height: 200px; overflow-y: auto; padding-right: 10px;">
            <?php echo nl2br($data['isi_sambutan']); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Service Section end-->

   <!--Berita --->
  <section class="news" id="news">
   <div class="container">
      <div class="row text-center mb-4">
         <div class="col-md-12">
            <h2 class="section-title" style="color: #2caa50;">BERITA DESA</h2>
         </div>
      </div>
      <div class="row">
         <?php 
         $query = mysqli_query($con, "SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.id_kategori=tb_berita.kategori ORDER BY tb_berita.id_berita DESC LIMIT 3");
         while($r = mysqli_fetch_array($query)){
         ?> 
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
               <div class="post-body">
                  <a class="latest-post-img" href="../img/berita/<?php echo $r['gambar'];?>">
                     <img class="img-fluid" src="../img/berita/<?php echo $r['gambar'];?>" alt="img">
                  </a>
                  <h4 class="post-title">
                     <a href="?page=detail_berita&slug=<?php echo $r['slug']; ?>"><?php echo $r['judul'];?></a>
                  </h4>
                  <p class="post-item-date"><?php echo $r['tgl_posting'];?></p>
                  <p class="post-text">
                     <?php echo substr($r['isi'], 0, 100);?>...
                  </p>
                  <a class="btn-readmore" href="?page=detail_berita&slug=<?php echo $r['slug'];?>">Baca Selengkapnya</a>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
      <div class="text-center mt-4">
         <a class="btn-news-more" href="?page=berita" role="button">LIHAT BERITA LEBIH LENGKAP</a>
      </div>
   </div>
</section>
      <!-- News end-->

      <!-- Galeri Section -->
     <section id="main-container" class="main-container py-5" style="background-color: #fff;">
  <div class="container">
    <div class="row text-center mb-4">
      <div class="col-md-12">
        <h2 class="section-title" style="color: #2caa50; font-weight: 700;">GALERI DESA</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php 
      $query = mysqli_query ($con, "SELECT * FROM tb_galeri ORDER BY id ASC");
      while ($r = mysqli_fetch_array($query)){
        $path_kecil = "../img/galeri/kecil_" . $r['foto'];
        $path_asli = "../img/galeri/" . $r['foto'];
        $src = file_exists($path_kecil) ? $path_kecil : $path_asli;
      ?>
      <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
        <div class="gallery-img position-relative w-100">
          <a class="gallery-popup d-block" href="<?php echo $path_asli; ?>">
            <img class="img-fluid w-100 rounded shadow-sm" src="<?php echo $src; ?>" alt="Foto Galeri" style="height: 240px; object-fit: cover;">
            <span class="gallery-icon position-absolute top-50 start-50 translate-middle text-white fs-4"><i class="fa fa-search"></i></span>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- Tombol di tengah -->
    <div class="text-center mt-4">
      <a href="?page=galeri" class="btn-gallery-more">LIHAT FOTO LEBIH BANYAK</a>
    </div>
  </div>
</section>
<!-- Galeri End -->

 <!-- Tombol di tengah -->
      <div class="text-center mt-4">
         <a href="?page=galeri" class="btn-gallery-more">LIHAT FOTO LEBIH BANYAK</a>
      </div>
   </div>
</section>

      <!-- Galeri End -->


<section class="faq-testimoni-section py-5" id="faq-testimoni">
  <div class="container">
    <div class="row text-center mb-4">
      <div class="col-md-12">
        <h2 class="section-title" style="color: #2caa50;">PERTANYAAN UMUM</h2>
      </div>
    </div>

    <!-- Tambahkan ini -->
    <div class="row justify-content-center">
      <div class="col-md-10"> <!-- Bisa ubah ke col-md-8 kalau ingin lebih kecil -->

        <div id="accordion" class="accordion-area">

          <!-- FAQ Item 1 -->
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <a class="btn btn-link d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <span class="faq-icon"></span>
                  <span class="ml-3">Bagaimana cara mengajukan permohonan surat secara online di website ini?</span>
                </a>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Pastikan Anda sudah terdaftar di website ini. Setelah itu, buat akun dan login menggunakan menu yang tersedia dengan username dan password yang sudah dibuat. Terakhir, silahkan pilih menu Layanan, lalu klik "Permohonan Surat".
              </div>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <a class="btn btn-link collapsed d-flex align-items-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="faq-icon"></span>
                  <span class="ml-3">Bagaimana jika ingin membuat/mengisi dan mencetak surat secara mandiri?</span>
                </a>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Setelah masuk ke akun, pilih menu pelayanan, lalu klik "Buat Surat Mandiri" dan pilih jenis surat yang diinginkan.
              </div>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <a class="btn btn-link collapsed d-flex align-items-center" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <span class="faq-icon"></span>
                  <span class="ml-3">Bagaimana jika data diri belum terdaftar di Web Pelayanan Administrasi ini?</span>
                </a>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Jika membutuhkan bantuan atau mendapatkan kesulitan, silakan hubungi administrator atau staf desa/kelurahan yang mengelola website ini.
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>



<!-- Testimoni Section -->
<section class="testimoni-area py-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col text-center">
        <h3 class="section-title" style="color: #2caa50; font-weight: 700;">TESTIMONI PENGGUNA</h3>
      </div>
    </div>

    <div class="row align-items-start">
      <!-- Kiri: Form -->
      <div class="col-lg-4 mb-4">
        <div class="testimoni-form-wrapper p-4 shadow-sm rounded bg-white">
          <h5 class="mb-3 font-weight-bold">Berikan Testimoni Disini</h5>
          <form action="../aksi/s_testimoni_d.php" method="POST">
            <div class="form-group">
              <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="testimoni" name="testimoni" placeholder="Masukkan pendapatmu disini" rows="5" required></textarea>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-danger btn-block" type="submit" id="simpan" name="simpan" style="width:100%">Kirim</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Kanan: Carousel -->
      <!-- Kanan: Carousel Testimoni -->
<div class="col-lg-8">
  <div class="testimonial-wrapper">
    <div class="owl-carousel owl-theme testimonial-carousel" id="testimonial-carousel">
      <?php
      $bct = "SELECT * FROM tb_testimoni WHERE status='Publish' ORDER BY id DESC LIMIT 9";
      $hasil = mysqli_query($con, $bct);
      while ($rt = mysqli_fetch_array($hasil)) {
      ?>
        <div class="item">
          <div class="testimonial-card text-center p-4">
            <div class="testimonial-img mb-3">
              <img src="../file/foto/no_pic.png" alt="testimonial" class="rounded-circle">
            </div>
            <h5 class="testimonial-name"><?php echo $rt['nama']; ?></h5>
            <p class="testimonial-text"><?php echo $rt['testimoni']; ?></p>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Navigasi (Naikkan ke atas) -->
    <div class="testimonial-nav text-center mt-2" style="margin-top: -10px;">
      <button class="btn btn-outline-secondary mr-1" id="prev"><i class="fa fa-chevron-left"></i></button>
      <button class="btn btn-outline-secondary" id="next"><i class="fa fa-chevron-right"></i></button>
    </div>
  </div>
</div>
</section>



<!-- Quote area start -->
<section class="info-section">
  <div class="container-info">
    <!-- Card Jam Kerja + Hubungi Kami -->
    <div class="info-card">
      <h2 class="section-title">Silahkan datang pada hari dan jam kerja</h2>
      <img class="office-icon" src="../img/icon/kantor.png" alt="Kantor">
      <table class="worktime-table">
        <tr>
          <th>Hari</th>
          <th>Jam/Waktu</th>
        </tr>
        <tr>
          <td>Senin - Jum'at</td>
          <td>08.00 - 15.30 WIB</td>
        </tr>
        <tr>
          <td>Sabtu</td>
          <td>08.00 - 12.00 WIB</td>
        </tr>
        <tr class="holiday">
          <td>Minggu</td>
          <td>Libur</td>
        </tr>
      </table>
      <div class="cta-button">
        <a href="https://api.whatsapp.com/send?phone=6282238030337" 
           target="_blank" class="btn-contact">
          Hubungi kami 
        </a>
      </div>
    </div>
  </div>
</section>

   <!-- Call to action end -->
