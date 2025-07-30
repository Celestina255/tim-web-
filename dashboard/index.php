<?php
session_start();
include '../koneksi.php';
require '../pengunjung.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!--
    Basic Page Needs
    ==================================================
    -->
   <meta charset="utf-8">
   <title>Website Kampung Banjar Ausoy</title>
   <!--
    Mobile Specific Metas
    ==================================================
    -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <!--
    CSS
    ==================================================
    -->
   <!-- Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Animation-->
   <link rel="stylesheet" href="css/animate.css">
   <!-- Morris CSS -->
   <link rel="stylesheet" href="css/morris.css">
   <!-- FontAwesome-->
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <!-- Icon font-->
   <link rel="stylesheet" href="css/icon-font.css">
   <!-- Owl Carousel-->
   <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
   <!-- Owl Theme -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
   <!-- Colorbox-->
   <link rel="stylesheet" href="css/colorbox.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="../dashboard/css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.-->
   <!--if lt IE 9
    script(src='js/html5shiv.js')
    script(src='js/respond.min.js')
    -->
</head>

<body>
               <?php 
               $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
               while ($r = mysqli_fetch_array($query)){
               ?>
              
         <?php } ?>

<!-- ini adalah tempat dimana file cssnya harus diupdate, jangan ditambah jika sudah ada -->

<!-- Letakkan navbar setelah div class="body-inner yang ada isi file php -->

<!-- NAVBAR AWAL -->
<nav class="navbar">
  <div class="navbar-container">
    <!-- KIRI -->
    <div class="kampung-info">
      <img src="../img/logo.png" alt="Logo" class="logo">
      <div class="text-info ml-2">
        <div class="text-bold">Kampung Banjar Ausoy</div>
        <div>Kabupaten Teluk Bintuni</div>
      </div>
    </div>

    <!-- TENGAH -->
    <div class="navbar-main-wrapper">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php?page=warga">Beranda</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=sejarah">Sejarah</a></li>
            <li><a class="dropdown-item" href="?page=struktur">Struktur</a></li>
            <li><a class="dropdown-item" href="?page=visimisi">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="?page=petadesa">Peta Desa</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="?page=galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=contact">PENGADUAN</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Layanan</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=layanan">Permohonan Surat</a></li>
            <li><a class="dropdown-item" href="?page=layanan">Buat Surat Mandiri</a></li>
          </ul>
        </li>

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">LEMBAGA MASYARAKAT</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=permohonan">BUMDes</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">KARANG TARUNA</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">RT/RW</a></li>
            <li><a class="dropdown-item" href="?page=mandiri">PKK</a></li>
          </ul>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">TRANSPARANSI</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=transparansi_penduduk">DATA PENDUDUK</a></li>
            <li><a class="dropdown-item" href="?page=transparansi_apbdes">APBD</a></li>
            <li><a class="dropdown-item" href="?page=transparansi_idm">IDM</a></li>
          </ul>
        </li>
        
      </ul>
    </div>

    <!-- KANAN -->
    <div class="logout-wrapper">
<a href="?page=login" class="top-right-btn btn btn-primary">Login</a>
  </div>
</nav>


         </div>
         <!-- AKHIR NAVBAR -->


<!-- Letakkan di akhir body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'load_file.php'; ?>

   <!-- Footer start-->

   <?php 
      $queryy = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
      while ($rr = mysqli_fetch_array($queryy)){
   ?>
   <!-- Footer start-->
<footer class="footer" id="footer">
  <div class="container">
    <div class="row">

      <!-- Kolom 1: Logo -->
      <div class="col-lg-2 col-md-3 footer-widget text-center">
        <img src="./img/<?php echo $rr['logo']; ?>" alt="Logo" class="footer-logo-img">
      </div>

      <!-- Kolom 2: Teks dan alamat -->
      <div class="col-lg-4 col-md-9 footer-widget-kampung">
        <h3 class="footer-title">Pemerintah Kampung Banjar Ausoy</h3>
        <p>Jalan Poros Manimeri Bintuni SP IV<br>
          Kampung Banjar Ausoy, Kecamatan Manimeri,<br>
          Kabupaten Teluk Bintuni<br>
          Provinsi Papua Barat, 98364
        </p>
      </div>

      <!-- Kolom 3: Hubungi Kami -->
      <div class="col-lg-3 col-md-6 footer-widget-hubungi text-left">
        <h3 class="footer-title">Hubungi Kami</h3>
        <p><i class="fa fa-phone"></i> 082199656081</p>
        <p><i class="fa fa-envelope"></i> banjarausoysp4@gmail.co.id</p>
        <div class="social-icons">
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-whatsapp"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
          <a href="#"><i class="fa fa-tiktok"></i></a>
        </div>
      </div>

      <!-- Kolom 4: Nomor penting -->
      <div class="col-lg-2 col-md-6 footer-widget-tlp">
        <h3 class="footer-title-tlp">Nomor Telepon Penting</h3>
        <p>
          <li><a href="?page=home">Sudirman/ Kades Banjar Ausoy</a></li>
          <li><a href="?page=sejarah">Agus/ Sekdes Banjar Ausoy</a></li>
          </p>
      </div>

      <!-- Kolom 5: Navigasi -->
      <div class="col-lg-1 col-md-6 footer-widget-jelajahi">
        <h3 class="footer-title">Jelajahi</h3>
        <ul class="footer-links">
          <li><a href="?page=home">Beranda</a></li>
          <li><a href="?page=sejarah">Profil</a></li>
          <li><a href="?page=layanan">Layanan</a></li>
          <li><a href="?page=berita">Berita</a></li>
          <li><a href="?page=bumdes">BUMDes</a></li>
          <li><a href="?page=transparansi">Transparansi</a></li>
        </ul>
      </div>

    </div>
  </div>

  <!-- Copyright -->
  <div class="footer-bottom">
    <div class="container text-center">
      <p>© 2025 - Website Kampung Banjar Ausoy Powered by KKN Tematik Unipa 2025</p>
    </div>
  </div>

  <?php } ?>
  <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
    <button class="btn btn-primary" title="Back to Top">
      <i class="fa fa-angle-double-up"></i>
    </button>
  </div>
</footer>

<!-- Footer end-->

      <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
         <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i>
            <!-- icon end-->
         </button>
         <!-- button end-->
      </div>
      <!-- End Back to Top-->

      <!--
      Javascript Files
      ======================================================
      -->
      <!-- initialize jQuery Library-->
      <script type="text/javascript" src="js/jquery.js"></script>
       
       
      <!-- Bootstrap jQuery-->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- Owl Carousel-->
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <!-- Counter-->
      <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
      <!-- Waypoints-->
      <script type="text/javascript" src="js/waypoints.min.js"></script>
      <!-- Color box-->
      <script type="text/javascript" src="js/jquery.colorbox.js"></script>
       
        
      <!-- Template custom-->
      <script type="text/javascript" src="js/custom.js"></script>
   </div>
   <!--Body Inner end-->
   <script type="text/javascript">
   !function(e){e.fn.marquee=function(t){return this.each(function(){var i,a,n,r,s,o=e.extend({},e.fn.marquee.defaults,t),u=e(this),d=3,p="animation-play-state",f=!1,l=function(e,t,i){for(var a=["webkit","moz","MS","o",""],n=0;n<a.length;n++)a[n]||(t=t.toLowerCase()),e.addEventListener(a[n]+t,i,!1)},c=function(e){var t,i=[];for(t in e)e.hasOwnProperty(t)&&i.push(t+":"+e[t]);return i.push(),"{"+i.join(",")+"}"},m={pause:function(){f&&o.allowCss3Support?i.css(p,"paused"):e.fn.pause&&i.pause(),u.data("runningStatus","paused"),u.trigger("paused")},resume:function(){f&&o.allowCss3Support?i.css(p,"running"):e.fn.resume&&i.resume(),u.data("runningStatus","resumed"),u.trigger("resumed")},toggle:function(){m["resumed"==u.data("runningStatus")?"pause":"resume"]()},destroy:function(){clearTimeout(u.timer),u.css("visibility","hidden").html(u.find(".js-marquee:first")),setTimeout(function(){u.css("visibility","visible")},0)}};if("string"==typeof t)e.isFunction(m[t])&&(i||(i=u.find(".js-marquee-wrapper")),!0===u.data("css3AnimationIsSupported")&&(f=!0),m[t]());else{var g;e.each(o,function(e){if(g=u.attr("data-"+e),"undefined"!=typeof g){switch(g){case"true":g=!0;break;case"false":g=!1}o[e]=g}}),o.duration=o.speed||o.duration,r="up"==o.direction||"down"==o.direction,o.gap=o.duplicated?o.gap:0,u.wrapInner('<div class="js-marquee"></div>');var h=u.find(".js-marquee").css({"margin-right":o.gap,"float":"left"});if(o.duplicated&&h.clone(!0).appendTo(u),u.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>'),i=u.find(".js-marquee-wrapper"),r){var v=u.height();i.removeAttr("style"),u.height(v),u.find(".js-marquee").css({"float":"none","margin-bottom":o.gap,"margin-right":0}),o.duplicated&&u.find(".js-marquee:last").css({"margin-bottom":0});var y=u.find(".js-marquee:first").height()+o.gap;o.duration*=(parseInt(y,10)+parseInt(v,10))/parseInt(v,10)}else s=u.find(".js-marquee:first").width()+o.gap,a=u.width(),o.duration*=(parseInt(s,10)+parseInt(a,10))/parseInt(a,10);if(o.duplicated&&(o.duration/=2),o.allowCss3Support){var h=document.body||document.createElement("div"),w="marqueeAnimation-"+Math.floor(1e7*Math.random()),S=["Webkit","Moz","O","ms","Khtml"],x="animation",b="",q="";if(h.style.animation&&(q="@keyframes "+w+" ",f=!0),!1===f)for(var j=0;j<S.length;j++)if(void 0!==h.style[S[j]+"AnimationName"]){h="-"+S[j].toLowerCase()+"-",x=h+x,p=h+p,q="@"+h+"keyframes "+w+" ",f=!0;break}f&&(b=w+" "+o.duration/1e3+"s "+o.delayBeforeStart/1e3+"s infinite "+o.css3easing,u.data("css3AnimationIsSupported",!0))}var I=function(){i.css("margin-top","up"==o.direction?v+"px":"-"+y+"px")},C=function(){i.css("margin-left","left"==o.direction?a+"px":"-"+s+"px")};o.duplicated?(r?i.css("margin-top","up"==o.direction?v:"-"+(2*y-o.gap)+"px"):i.css("margin-left","left"==o.direction?a+"px":"-"+(2*s-o.gap)+"px"),d=1):r?I():C();var A=function(){if(o.duplicated&&(1===d?(o._originalDuration=o.duration,o.duration=r?"up"==o.direction?o.duration+v/(y/o.duration):2*o.duration:"left"==o.direction?o.duration+a/(s/o.duration):2*o.duration,b&&(b=w+" "+o.duration/1e3+"s "+o.delayBeforeStart/1e3+"s "+o.css3easing),d++):2===d&&(o.duration=o._originalDuration,b&&(w+="0",q=e.trim(q)+"0 ",b=w+" "+o.duration/1e3+"s 0s infinite "+o.css3easing),d++)),r?o.duplicated?(d>2&&i.css("margin-top","up"==o.direction?0:"-"+y+"px"),n={"margin-top":"up"==o.direction?"-"+y+"px":0}):(I(),n={"margin-top":"up"==o.direction?"-"+i.height()+"px":v+"px"}):o.duplicated?(d>2&&i.css("margin-left","left"==o.direction?0:"-"+s+"px"),n={"margin-left":"left"==o.direction?"-"+s+"px":0}):(C(),n={"margin-left":"left"==o.direction?"-"+s+"px":a+"px"}),u.trigger("beforeStarting"),f){i.css(x,b);var t=q+" { 100%  "+c(n)+"}",p=e("style");0!==p.length?p.filter(":last").append(t):e("head").append("<style>"+t+"</style>"),l(i[0],"AnimationIteration",function(){u.trigger("finished")}),l(i[0],"AnimationEnd",function(){A(),u.trigger("finished")})}else i.animate(n,o.duration,o.easing,function(){u.trigger("finished"),o.pauseOnCycle?u.timer=setTimeout(A,o.delayBeforeStart):A()});u.data("runningStatus","resumed")};u.bind("pause",m.pause),u.bind("resume",m.resume),o.pauseOnHover&&u.bind("mouseenter mouseleave",m.toggle),f&&o.allowCss3Support?A():u.timer=setTimeout(A,o.delayBeforeStart)}})},e.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:1e3,direction:"left",duplicated:!1,duration:5e3,gap:20,pauseOnCycle:!1,pauseOnHover:!1}}(jQuery);
$("#marquee").marquee({duration:1e4,gap:50,delayBeforeStart:10,direction:"left",duplicated:!0,pauseOnHover:!0});
</script>
<!-- Owl Carousel (di akhir sebelum </body>) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">

<script>
$('#testimonial-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  autoplayTimeout: 5000,
  responsive: {
    0: { items: 1 },
    576: { items: 2 },
    992: { items: 3 }
  }
});


  $('#prev').click(function() {
    $('#testimonial-carousel').trigger('prev.owl.carousel');
  });
  $('#next').click(function() {
    $('#testimonial-carousel').trigger('next.owl.carousel');
  });
</script>




</body>

</html>
