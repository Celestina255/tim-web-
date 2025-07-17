<?php
include 'sesi_warga.php';
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
 <title> Web Pelayanan |Keldes|</title>
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
 <link rel="stylesheet" href="../dashboard/css/bootstrap.min.css">
 <!-- Animation-->
 <link rel="stylesheet" href="../dashboard/css/animate.css">
 <!-- Morris CSS -->
 <link rel="stylesheet" href="../dashboard/css/morris.css">
 <!-- FontAwesome-->
 <link rel="stylesheet" href="../dashboard/css/font-awesome.min.css">
 <!-- Icon font-->
 <link rel="stylesheet" href="../dashboard/css/icon-font.css">
 <!-- Owl Carousel-->
 <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <link rel="stylesheet" href="../dashboard/css/owl.carousel.min.css">
 <!-- Owl Theme -->
 <link rel="stylesheet" href="../dashboard/css/owl.theme.default.min.css">
 <!-- Colorbox-->
 <link rel="stylesheet" href="../dashboard/css/colorbox.css">
 <!-- Template styles-->
 <link rel="stylesheet" href="../dashboard/css/style.css">
 <!-- Responsive styles-->
 <link rel="stylesheet" href="../dashboard/css/responsive.css">

 

</head>

<body>
   <div class="trending-bar-dark hidden-xs">
      <div class="container">
       <div class="row">
         <div class="col-lg-11">
            <h3 class="trending-bar-title">Trending News</h3>
            <h3 class="tn-mobile">News</h3>
            <div class="trending-news-slider">
               <?php 
               $queryb = mysqli_query ($con, "SELECT * FROM tb_berita ORDER BY id_berita ASC LIMIT 1");
               while ($row = mysqli_fetch_array($queryb)){
                  ?>
                  <div class="item">
                    <div id="marquee" class="post-content">
                     <h2 class="post-title title-sm">
                        <a href="?page=home">Info : <?php echo $row['judul']; ?></a>
                     </h2>
                  </div>
               </div>
            <?php } ?>
         </div>
      </div>
    
              <div class="col-md-12 col-sm-12 col-xs-12 top-nav-social-lists text-lg-right col-lg-1 ml-lg-auto">
                  <ul class="list-unstyled mt-2 mt-lg-0">
                      <li>
                          <a href="#">
                           <span class="social-icon">
                             <i class="fa fa-facebook-f"></i>
                          </span>
                       </a>
                       <a href="#">
                        <span class="social-icon">
                          <i class="fa fa-youtube"></i>
                       </span>
                    </a>
                 </li>
              </ul>
           </div>

        </div>
     </div>
  </div>

  <div class="body-inner">
      <div class="site-top-2">
         <header class="header nav-down" id="header-2">
            <div class="container">
               <?php 
               $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
               while ($r = mysqli_fetch_array($query)){
               ?>
               <div class="row">
                  <div class="logo-area clearfix">
                     <div class="logo col-lg-6 col-md-12 pull-left">
                        <a href="?page=home">
                           <img src="../img/<?php echo $r['logo']; ?>" alt="" style="width: 35px;margin-top: -20px;"> <span class="logo-text1">Web-</span>
                           <span class="logo-text2"><?php echo $r['kelurahan']; ?></span>
                        </a>

                     </div>

                     <!-- logo end-->
                     <div class="col-lg-6 col-md-12 pull-right">
                        <ul class="top-info unstyled">
                           <li><span class="info-icon"><i class="icon icon-phone3"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">24/7 Response Time</p>
                                 <p class="info-subtitle"><?php echo $r['telp']; ?></p>
                              </div>
                           </li>
                           <li><span class="info-icon"><i class="icon icon-envelope"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">Send Your E-mail</p>
                                 <p class="info-subtitle"><?php echo $r['email']; ?></p>
                              </div>
                           </li>
                           
                        </ul>
                     </div>
                     <!-- Col End-->
                  </div>
                  <!-- Logo Area End-->
               </div>
               <div class="row">
                  <div class="logo-area clearfix">
                     <div class="logo col-lg-8 col-md-12" style="margin-top:-55px; margin-bottom: -50px; text-shadow: 1px 1px 2px;">
                        <a href="?page=home">
                           Website Pelayanan Administrasi Desa <?php echo $r['kelurahan']; ?> 
                        </a>
                     </div>
                  </div>
                  <!-- Logo Area End-->
               </div>
            </div>
         <?php } ?>
         <!-- Container end-->
         <div class="site-nav-inner site-navigation navigation navdown">
            <div class="container">
               <nav class="navbar navbar-expand-lg ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span></button>
                  <!-- End of Navbar toggler-->
                  <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="active"><a href="index.php?page=warga">Home</a>
                        </li>
                        <!-- li end-->
                        <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown">Profil<i class="fa fa-angle-down"></i></a>
                           <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=sejarah">Sejarah</a></li>
                              <li><a href="?page=struktur">Struktur</a></li>
                              <li><a href="?page=visimisi">Visi & Misi</a></li>
                              <li><a href="?page=petadesa">Peta Desa/Kelurahan</a></li>
                           </ul>
                        </li>
                        <!-- li end-->

                        <li class="nav-item dropdown">
                           <a href="?page=berita">Berita Desa</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a href="?page=galeri">Galeri</a>
                        </li>
                        <!-- li end-->
                        <li class="nav-item dropdown">
                           <a href="?page=contact">Contact</a>
                        </li>
                        <!-- li end -->
                        <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown">Pelayanan<i class="fa fa-angle-down"></i></a>
                           <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=pelayanan">Permohonan Surat</a></li>
                              <li><a href="?page=surat_mandiri">Buat Surat Mandiri</a></li>
                           </ul>
                        </li>
                        <!-- li end-->
                        <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown">Status Permohonan<i class="fa fa-angle-down"></i></a>
                           <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=daftar_permohonan">Permohonan Surat</a></li>
                              <li><a href="?page=daftar_suratmandiri">Surat Mandiri</a></li>
                           </ul>
                        </li>

                     </ul>
                     <!--Nav ul end-->
                  </div>
                  <a href="logout.php" class="top-right-btn btn btn-primary">Logout</a>
                  <!-- Top bar btn -->
               </nav>
               <!-- Collapse end-->



            </div>
         </div>
         <!-- Site nav inner end-->
      </header>
      <!-- Header end-->
   </div>

   <?php include 'load_file_warga.php'; ?>

   <?php 
      $queryy = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
      while ($rr = mysqli_fetch_array($queryy)){
   ?>
   <footer class="footer" id="footer">
      <div class="footer-main bg-overlay">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-12 footer-widget footer-about">
                  <div class="footer-logo">
                     <img src="../img/<?php echo $rr['logo']; ?>" style="width: 35px; margin-top: -20px;" alt="">
                     <span style="font-size: 40px; text-shadow: 2px 2px 6px; margin-top: 10px; color: green;">Web-</span>
                           <span style="font-size: 40px; text-shadow: 2px 2px 6px; margin-top: 10px; color: white;"><?php echo $rr['kelurahan']; ?></span>
                  </div>
                  <p>Desa Dagelan merupakan salah satu desa yang terletak di Kecamatan Way Asalan, dan merupakan desa yang unik dan menjadi bahan tertawaan warga setempat maupun warga sekitar Kecamatan Way Asalan.</p>

                  <h3 class="widget-title">Subscribe!</h3>
                  <form class="newsletter-form" id="newsletter-form" action="#" method="post">
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="newsletter-form-email" type="email" name="email" placeholder="Email "
                        autocomplete="off">
                        <button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                     </div>
                  </form>
               </div>
               <!-- About us end-->
               <div class="col-lg-4 col-md-6 footer-widget">
                  <h3 class="widget-title">Quick Links</h3>
                  <ul class="list-dash">
                    <li><a href="?page=sejarah">Sejarah</a></li>
                    <li><a href="?page=struktur">Struktur</a></li>
                    <li><a href="?page=visismisi">Visi & Misi</a></li>
                    <li><a href="?page=petadesa">Peta Desa</a></li>
                    <li><a href="?page=tupoksi">Tupoksi</a></li>
                    <li><a href="?page=aparat">Aparat Desa</a></li>
                    <li><a href="?page=layanan">Pelayanan</a></li>
                    <li><a href="?page=berita">Berita Desa Terbaru</a></li>
                    <li><a href="?page=galeri">Galeri</a></li>
                    <li><a href="?page=contact">Contact</a></li>
                 </ul>
              </div>
              <div class="col-lg-4 col-md-6 footer-widget">
               <h3 class="widget-title">Alamat</h3>
               <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-map-marker2"></i></span>
                  <div class="ts-contact-content">
                     <h3 class="ts-contact-title">Kantor </h3>
                     <p><?php echo $rr['kantor']; ?></p>
                  </div>
                  <!-- Contact content end-->
               </div>

               <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i class="icon icon-envelope"></i></span>
                  <div class="ts-contact-content">
                     <h3 class="ts-contact-title">Alamat E-mail</h3>
                     <p><?php echo $rr['email']; ?></p>
                  </div>
                  <!-- Contact content end-->
               </div>
               <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-phone3"></i></span>
                  <div class="ts-contact-content">
                     <h3 class="ts-contact-title">Telp/Hp.</h3>
                     <p><?php echo $rr['telp']; ?></p>
                  </div>
                  <!-- Contact content end-->
               </div>
            </div>
         </div>
         <!-- Content row end-->
      </div>
      <!-- Container end-->
   </div>
   <!-- Footer Main-->
   <div class="copyright">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-12">
               <div class="copyright-info"><span>Copyright by <b>sdc</b> © 2023 a theme by <a href="https://furioustheme.com">Furioustheme</a></span></div>
            </div>
            <div class="col-lg-6 col-md-12">
             <div class="footer-social text-right">
               <ul>
                  <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="https://github.com"><i class="fa fa-github"></i></a></li>
                  <li><a href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Row end-->
   </div>
   <!-- Container end-->
</div>
<!-- Copyright end-->
</footer>
<?php } ?>
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
      ==================================================
   -->
   <!-- initialize jQuery Library-->
   <script type="text/javascript" src="../dashboard/js/jquery.js"></script>
   <!-- Bootstrap jQuery-->
   <script type="text/javascript" src="../dashboard/js/bootstrap.min.js"></script>
   <!-- Owl Carousel-->
   <script type="text/javascript" src="../dashboard/js/owl.carousel.min.js"></script>
   <!-- Counter-->
   <script type="text/javascript" src="../dashboard/js/jquery.counterup.min.js"></script>
   <!-- Waypoints-->
   <script type="text/javascript" src="../dashboard/js/waypoints.min.js"></script>
   <!-- Color box-->
   <script type="text/javascript" src="../dashboard/js/jquery.colorbox.js"></script>

   <!-- Template custom-->
   <script type="text/javascript" src="../dashboard/js/custom.js"></script>
   <!-- Page level plugins -->

    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
</div>

<!--Body Inner end-->
<script type="text/javascript">
   !function(e){e.fn.marquee=function(t){return this.each(function(){var i,a,n,r,s,o=e.extend({},e.fn.marquee.defaults,t),u=e(this),d=3,p="animation-play-state",f=!1,l=function(e,t,i){for(var a=["webkit","moz","MS","o",""],n=0;n<a.length;n++)a[n]||(t=t.toLowerCase()),e.addEventListener(a[n]+t,i,!1)},c=function(e){var t,i=[];for(t in e)e.hasOwnProperty(t)&&i.push(t+":"+e[t]);return i.push(),"{"+i.join(",")+"}"},m={pause:function(){f&&o.allowCss3Support?i.css(p,"paused"):e.fn.pause&&i.pause(),u.data("runningStatus","paused"),u.trigger("paused")},resume:function(){f&&o.allowCss3Support?i.css(p,"running"):e.fn.resume&&i.resume(),u.data("runningStatus","resumed"),u.trigger("resumed")},toggle:function(){m["resumed"==u.data("runningStatus")?"pause":"resume"]()},destroy:function(){clearTimeout(u.timer),u.css("visibility","hidden").html(u.find(".js-marquee:first")),setTimeout(function(){u.css("visibility","visible")},0)}};if("string"==typeof t)e.isFunction(m[t])&&(i||(i=u.find(".js-marquee-wrapper")),!0===u.data("css3AnimationIsSupported")&&(f=!0),m[t]());else{var g;e.each(o,function(e){if(g=u.attr("data-"+e),"undefined"!=typeof g){switch(g){case"true":g=!0;break;case"false":g=!1}o[e]=g}}),o.duration=o.speed||o.duration,r="up"==o.direction||"down"==o.direction,o.gap=o.duplicated?o.gap:0,u.wrapInner('<div class="js-marquee"></div>');var h=u.find(".js-marquee").css({"margin-right":o.gap,"float":"left"});if(o.duplicated&&h.clone(!0).appendTo(u),u.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>'),i=u.find(".js-marquee-wrapper"),r){var v=u.height();i.removeAttr("style"),u.height(v),u.find(".js-marquee").css({"float":"none","margin-bottom":o.gap,"margin-right":0}),o.duplicated&&u.find(".js-marquee:last").css({"margin-bottom":0});var y=u.find(".js-marquee:first").height()+o.gap;o.duration*=(parseInt(y,10)+parseInt(v,10))/parseInt(v,10)}else s=u.find(".js-marquee:first").width()+o.gap,a=u.width(),o.duration*=(parseInt(s,10)+parseInt(a,10))/parseInt(a,10);if(o.duplicated&&(o.duration/=2),o.allowCss3Support){var h=document.body||document.createElement("div"),w="marqueeAnimation-"+Math.floor(1e7*Math.random()),S=["Webkit","Moz","O","ms","Khtml"],x="animation",b="",q="";if(h.style.animation&&(q="@keyframes "+w+" ",f=!0),!1===f)for(var j=0;j<S.length;j++)if(void 0!==h.style[S[j]+"AnimationName"]){h="-"+S[j].toLowerCase()+"-",x=h+x,p=h+p,q="@"+h+"keyframes "+w+" ",f=!0;break}f&&(b=w+" "+o.duration/1e3+"s "+o.delayBeforeStart/1e3+"s infinite "+o.css3easing,u.data("css3AnimationIsSupported",!0))}var I=function(){i.css("margin-top","up"==o.direction?v+"px":"-"+y+"px")},C=function(){i.css("margin-left","left"==o.direction?a+"px":"-"+s+"px")};o.duplicated?(r?i.css("margin-top","up"==o.direction?v:"-"+(2*y-o.gap)+"px"):i.css("margin-left","left"==o.direction?a+"px":"-"+(2*s-o.gap)+"px"),d=1):r?I():C();var A=function(){if(o.duplicated&&(1===d?(o._originalDuration=o.duration,o.duration=r?"up"==o.direction?o.duration+v/(y/o.duration):2*o.duration:"left"==o.direction?o.duration+a/(s/o.duration):2*o.duration,b&&(b=w+" "+o.duration/1e3+"s "+o.delayBeforeStart/1e3+"s "+o.css3easing),d++):2===d&&(o.duration=o._originalDuration,b&&(w+="0",q=e.trim(q)+"0 ",b=w+" "+o.duration/1e3+"s 0s infinite "+o.css3easing),d++)),r?o.duplicated?(d>2&&i.css("margin-top","up"==o.direction?0:"-"+y+"px"),n={"margin-top":"up"==o.direction?"-"+y+"px":0}):(I(),n={"margin-top":"up"==o.direction?"-"+i.height()+"px":v+"px"}):o.duplicated?(d>2&&i.css("margin-left","left"==o.direction?0:"-"+s+"px"),n={"margin-left":"left"==o.direction?"-"+s+"px":0}):(C(),n={"margin-left":"left"==o.direction?"-"+s+"px":a+"px"}),u.trigger("beforeStarting"),f){i.css(x,b);var t=q+" { 100%  "+c(n)+"}",p=e("style");0!==p.length?p.filter(":last").append(t):e("head").append("<style>"+t+"</style>"),l(i[0],"AnimationIteration",function(){u.trigger("finished")}),l(i[0],"AnimationEnd",function(){A(),u.trigger("finished")})}else i.animate(n,o.duration,o.easing,function(){u.trigger("finished"),o.pauseOnCycle?u.timer=setTimeout(A,o.delayBeforeStart):A()});u.data("runningStatus","resumed")};u.bind("pause",m.pause),u.bind("resume",m.resume),o.pauseOnHover&&u.bind("mouseenter mouseleave",m.toggle),f&&o.allowCss3Support?A():u.timer=setTimeout(A,o.delayBeforeStart)}})},e.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:1e3,direction:"left",duplicated:!1,duration:5e3,gap:20,pauseOnCycle:!1,pauseOnHover:!1}}(jQuery);
   $("#marquee").marquee({duration:1e4,gap:50,delayBeforeStart:10,direction:"left",duplicated:!0,pauseOnHover:!0});
</script>
</body>

</html>