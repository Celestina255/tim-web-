<?php
session_start();

 if(isset($_GET['page']))
                {
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("views/dashboard.php")) die ("Empty Main Page!"); 
			include "views/dashboard.php";						
		break;
		case 'home' :				
			if(!file_exists ("views/dashboard.php")) die ("Sorry Empty Page!"); 
			include "views/dashboard.php";						
		break;

		# MENU
		case 'login' :				
			if(!file_exists ('login.php')) die ("Sorry Empty Page!"); 
			include 'login.php';	 break;
		case 'registrasi' :				
			if(!file_exists ('registrasi.php')) die ("Sorry Empty Page!"); 
			include 'registrasi.php';	 break;
		case 'forgot' :				
			if(!file_exists ('forgot.php')) die ("Sorry Empty Page!"); 
			include 'forgot.php';	 break;
		case 'verifikasi_token' :				
			if(!file_exists ('verifikasi_token.php')) die ("Sorry Empty Page!"); 
			include 'verifikasi_token.php';	 break;
		case 'password_baru' :				
			if(!file_exists ('password_baru.php')) die ("Sorry Empty Page!"); 
			include 'password_baru.php';	 break;
		case 'contact':
			if (!isset($_SESSION['login_user'])) {
				echo "<script>window.location.href='?page=login';</script>";
				exit;
			}
			if (!file_exists('views/contact.php')) die("Sorry Empty Page!");
			include 'views/contact.php';
			break;
		case 'sejarah' :				
			if(!file_exists ('views/sejarah.php')) die ("Sorry Empty Page!"); 
			include 'views/sejarah.php';	 break;
		case 'struktur' :				
			if(!file_exists ('views/struktur.php')) die ("Sorry Empty Page!"); 
			include 'views/struktur.php';	 break;	
		case 'visimisi' :				
			if(!file_exists ('views/visimisi.php')) die ("Sorry Empty Page!"); 
			include 'views/visimisi.php';	 break;	
		case 'petadesa' :				
			if(!file_exists ('views/petadesa.php')) die ("Sorry Empty Page!"); 
			include 'views/petadesa.php';	 break;	


		case 'informasi_baru' :				
			if(!file_exists ('views/informasi_baru.php')) die ("Sorry Empty Page!"); 
			include 'views/informasi_baru.php';	 break;	
		case 'galeri' :				
			if(!file_exists ('views/galeri.php')) die ("Sorry Empty Page!"); 
			include 'views/galeri.php';	 break;	
		case 'administrasi' :				
			if(!file_exists ('views/administrasi.php')) die ("Sorry Empty Page!"); 
			include 'views/administrasi.php';	 break;
		case 'pelayanan' :				
			if(!file_exists ('views/pelayanan.php')) die ("Sorry Empty Page!"); 
			include 'views/pelayanan.php';	 break;		
		case 'readmore' :				
			if(!file_exists ('views/readmore_pelayanan.php')) die ("Sorry Empty Page!"); 
			include 'views/readmore_pelayanan.php';	 break;	
		case 'berita' :				
			if(!file_exists ('views/berita.php')) die ("Sorry Empty Page!"); 
			include 'views/berita.php';	 break;	
		case 'detail_berita' :				
			if(!file_exists ('views/detail_berita.php')) die ("Sorry Empty Page!"); 
			include 'views/detail_berita.php';	 break;	
		case 'layanan':
			if (!isset($_SESSION['login_user'])) {
				echo "<script>window.location.href='?page=login';</script>";
				exit;
			}
			if (!file_exists('views/layanan.php')) die("Sorry Empty Page!");
			include 'views/layanan.php';
			break;

	#LAPORAN
		case 'lap_pelayanan' :				
			if(!file_exists ("laporan/lap_pelayanan.php")) die ("Sorry Empty Page!"); 
			include "laporan/lap_pelayanan.php"; break;
		case 'lap_penduduk' :				
			if(!file_exists ("laporan/lap_penduduk.php")) die ("Sorry Empty Page!"); 
			include "laporan/lap_penduduk.php"; break;


		default:
			if(!file_exists ("views/dashboard.php")) die ("Empty Main Page!"); 
			include "views/dashboard.php";						
		break;
	}
}
?>
