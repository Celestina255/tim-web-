<?php
 if(isset($_GET['page']))
                {
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("views/dashboard.php")) die ("<br><br><h3 align='center'>Halaman tidak tersedia !</h3>"); 
			include "views/dashboard.php";						
		break;
		case 'warga' :				
			if(!file_exists ("views/dashboard.php")) die ("Sorry Empty Page!"); 
			include "views/dashboard.php";						
		break;


		# MENU
		case 'logout' :				
			if(!file_exists ('logout.php')) die ("Sorry Empty Page!"); 
			include 'logout.php';	 break;
		case 'contact' :				
			if(!file_exists ('views/contact.php')) die ("Sorry Empty Page!"); 
			include 'views/contact.php';	 break;
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
		case 'surat_mandiri' :				
			if(!file_exists ('views/surat_mandiri.php')) die ("Sorry Empty Page!"); 
			include 'views/surat_mandiri.php';	 break;
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

		# SURAT KETERANGAN UMUM
		
		case 'suketusaha' :				
			if(!file_exists ('surat/suketusaha.php')) die ("Sorry Empty Page!"); 
			include 'surat/suketusaha.php';	 break;	
		case 'sukettmpusaha' :				
			if(!file_exists ('surat/sukettmpusaha.php')) die ("Sorry Empty Page!"); 
			include 'surat/sukettmpusaha.php';	 break;	
		case 'suketpbarang' :				
			if(!file_exists ("surat/suketbarang.php")) die ("Sorry Empty Page!"); 
			include "surat/suketbarang.php"; break;		
		case 'suketpternak' :				
			if(!file_exists ("surat/suketternak.php")) die ("Sorry Empty Page!"); 
			include "surat/suketternak.php"; break;	
		case 'sukettmampuv1' :				
			if(!file_exists ("surat/sukettmampu.php")) die ("Sorry Empty Page!"); 
			include "surat/sukettmampu.php"; break;	
		case 'sukettmampuv2' :				
			if(!file_exists ("surat/sukettmampuu.php")) die ("Sorry Empty Page!"); 
			include "surat/sukettmampuu.php"; break;	
		case 'suketrtm' :				
			if(!file_exists ("surat/suketrtms.php")) die ("Sorry Empty Page!"); 
			include "surat/suketrtms.php"; break;	
		case 'suketpenghasilan' :				
			if(!file_exists ("surat/suketpenghasilan.php")) die ("Sorry Empty Page!"); 
			include "surat/suketpenghasilan.php"; break;	
		case 'suketortu' :				
			if(!file_exists ("surat/suketortu.php")) die ("Sorry Empty Page!"); 
			include "surat/suketortu.php"; break;	
		case 'suketanak' :				
			if(!file_exists ("surat/suketanak.php")) die ("Sorry Empty Page!"); 
			include "surat/suketanak.php"; break;	
		case 'suketmenikah' :				
			if(!file_exists ("surat/suketmenikah.php")) die ("Sorry Empty Page!"); 
			include "surat/suketmenikah.php"; break;	
		case 'suketkematian' :				
			if(!file_exists ("surat/suketmati.php")) die ("Sorry Empty Page!"); 
			include "surat/suketmati.php"; break;	
		case 'suketbepergian' :				
			if(!file_exists ("surat/suketbepergian.php")) die ("Sorry Empty Page!"); 
			include "surat/suketbepergian.php"; break;	
		case 'suketbedaid' :				
			if(!file_exists ("surat/suketbedaid.php")) die ("Sorry Empty Page!"); 
			include "surat/suketbedaid.php"; break;	
		case 'suketdomisililbg' :				
			if(!file_exists ("surat/suketdomisililbg.php")) die ("Sorry Empty Page!"); 
			include "surat/suketdomisililbg.php"; break;	
		case 'suketaw' :				
			if(!file_exists ("surat/suketaw.php")) die ("Sorry Empty Page!"); 
			include "surat/suketaw.php"; break;
		case 'permohonanaw' :				
			if(!file_exists ("surat/permohonanaw.php")) die ("Sorry Empty Page!"); 
			include "surat/permohonanaw.php"; break;
			
		case 'skkb' :				
			if(!file_exists ("surat/skkb.php")) die ("Sorry Empty Page!"); 
			include "surat/skkb.php"; break;	
		case 'suketlain2' :				
			if(!file_exists ("surat/suketlain2.php")) die ("Sorry Empty Page!"); 
			include "surat/suketlain2.php"; break;	
		case 'assesment' :				
			if(!file_exists ("surat/assesment.php")) die ("Sorry Empty Page!"); 
			include "surat/assesment.php";						
		break;	
		
		case 'suketdomisili' :				
			if(!file_exists ("surat/suketdomisili.php")) die ("Sorry Empty Page!"); 
			include "surat/suketdomisili.php"; break;	
		case 'sutarpindah' :				
			if(!file_exists ("surat/sutarpindah.php")) die ("Sorry Empty Page!"); 
			include "surat/sutarpindah.php"; break;	
		case 'suketkelahiran' :				
			if(!file_exists ("surat/suketkelahiran.php")) die ("Sorry Empty Page!"); 
			include "surat/suketkelahiran.php"; break;	
		case 'suketpenguburan' :				
			if(!file_exists ("surat/suketpenguburan.php")) die ("Sorry Empty Page!"); 
			include "surat/suketpenguburan.php"; break;
		case 'f121' :				
			if(!file_exists ("surat/f121.php")) die ("Sorry Empty Page!"); 
			include "surat/f121.php"; break;	
		case 'n1-n6' :				
			if(!file_exists ("surat/n1-n6.php")) die ("Sorry Empty Page!"); 
			include "surat/n1-n6.php"; break;	
		case 'pernahnikah' :				
			if(!file_exists ("surat/suketpernahnikah.php")) die ("Sorry Empty Page!"); 
			include "surat/suketpernahnikah.php"; break;
		case 'belumnikah' :				
			if(!file_exists ("surat/suketbelumnikah.php")) die ("Sorry Empty Page!"); 
			include "surat/suketbelumnikah.php"; break;
		case 'dudajanda' :				
			if(!file_exists ("surat/suketdudajanda.php")) die ("Sorry Empty Page!"); 
			include "surat/suketdudajanda.php"; break;
		case 'pstatus' :				
			if(!file_exists ("surat/pstatus.php")) die ("Sorry Empty Page!"); 
			include "surat/pstatus.php"; break;
		case 'sukettanah' :				
			if(!file_exists ("surat/sukettanah.php")) die ("Sorry Empty Page!"); 
			include "surat/sukettanah.php"; break;															
		case 'sporadik' :				
			if(!file_exists ("surat/sporadik.php")) die ("Sorry Empty Page!"); 
			include "surat/sporadik.php"; break;
		case 'sewatanah' :				
			if(!file_exists ("surat/sewatanah.php")) die ("Sorry Empty Page!"); 
			include "surat/sewatanah.php"; break;
		case 'jualbelitanah' :				
			if(!file_exists ("surat/jualbelitanah.php")) die ("Sorry Empty Page!"); 
			include "surat/jualbelitanah.php"; break;
		case 'gadai' :				
			if(!file_exists ("surat/gadai.php")) die ("Sorry Empty Page!"); 
			include "surat/gadai.php"; break;
		case 'profile' :				
			if(!file_exists ("data/profile.php")) die ("Sorry Empty Page!"); 
			include "data/profile.php"; break;
		case 'edit_profile' :				
			if(!file_exists ("data/edit_profile.php")) die ("Sorry Empty Page!"); 
			include "data/edit_profile.php"; break;
		case 'penduduk' :				
			if(!file_exists ("data/penduduk.php")) die ("Sorry Empty Page!"); 
			include "data/penduduk.php"; break;
		case 'cetak_penduduk' :				
			if(!file_exists ("cetak/c_penduduk.php")) die ("Sorry Empty Page!"); 
			include "cetak/c_penduduk.php"; break;
		case 'tambahpenduduk' :				
			if(!file_exists ("data/tambah_penduduk.php")) die ("Sorry Empty Page!"); 
			include "data/tambah_penduduk.php"; break;
		case 'importpenduduk' :				
			if(!file_exists ("import_phpspreadsheet/importpenduduk_ptg.php")) die ("Sorry Empty Page!"); 
			include "import_phpspreadsheet/importpenduduk_ptg.php"; break;
		case 'lihatpenduduk' :				
			if(!file_exists ("import_phpspreadsheet/lihatpenduduk_ptg.php")) die ("Sorry Empty Page!"); 
			include "import_phpspreadsheet/lihatpenduduk_ptg.php"; break;
		case 'edit_penduduk' :				
			if(!file_exists ("data/edit_penduduk.php")) die ("Sorry Empty Page!"); 
			include "data/edit_penduduk.php"; break;

		case 'jenissurat' :				
			if(!file_exists ("data/jenis-surat.php")) die ("Sorry Empty Page!"); 
			include "data/jenis-surat.php"; break;
		case 'tambahjenissurat' :				
			if(!file_exists ("data/tambahjenis-surat.php")) die ("Sorry Empty Page!"); 
			include "data/tambahjenis-surat.php"; break;
		case 'edit_jsurat' :				
			if(!file_exists ("data/edit_jsurat.php")) die ("Sorry Empty Page!"); 
			include "data/edit_jsurat.php"; break;
			
			
		case 'klasifikasi' :				
			if(!file_exists ("data/klasifikasi.php")) die ("Sorry Empty Page!"); 
			include "data/klasifikasi.php"; break;
		case 'stafff' :				
			if(!file_exists ("data/stafff.php")) die ("Sorry Empty Page!"); 
			include "data/stafff.php"; break;
		case 'buat_sendiri' :				
			if(!file_exists ("data/surat.php")) die ("Sorry Empty Page!"); 
			include "data/surat.php"; break;
		case 'tambah_staff' :				
			if(!file_exists ("data/tambah_staff.php")) die ("Sorry Empty Page!"); 
			include "data/tambah_staff.php"; break;
		case 'edit_staff' :				
			if(!file_exists ("data/edit_staff.php")) die ("Sorry Empty Page!"); 
			include "data/edit_staff.php"; break;
		case 'process_permohonan' :				
			if(!file_exists ("data/process_permohonan.php")) die ("Sorry Empty Page!"); 
			include "data/process_permohonan.php"; break;
		case 'process_permohonan_all' :				
			if(!file_exists ("data/process_permohonan_all.php")) die ("Sorry Empty Page!"); 
			include "data/process_permohonan_all.php"; break;

		case 'acc' :				
			if(!file_exists ("data/acc_surat.php")) die ("Sorry Empty Page!"); 
			include "data/acc_surat.php"; break;

	# EDIT SURAT KETERANGAN UMUM
		case 'edit_undangan' :				
			if(!file_exists ('edit/edit_undangan.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_undangan.php';	 break;	
		case 'edit_pengantar' :				
			if(!file_exists ('edit/edit_pengantar.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_pengantar.php';	 break;	
		case 'edit_pemberitahuan' :				
			if(!file_exists ('edit/edit_pemberitahuan.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_pemberitahuan.php';	 break;	
		case 'edit_himbauan' :				
			if(!file_exists ('edit/edit_himbauan.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_himbauan.php';	 break;	
		case 'edit_pdinas' :				
			if(!file_exists ('edit/edit_pd.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_pd.php';	 break;
		case 'c_pdinas' :				
			if(!file_exists ('cetak/c_pdinas.php')) die ("Sorry Empty Page!"); 
			include 'cetak/c_pdinas.php';	 break;
		case 'edit_jawaban' :				
			if(!file_exists ('edit/edit_jawaban.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_jawaban.php';	 break;	

		case 'edit_suketusaha' :				
			if(!file_exists ('edit/edit_suketusaha.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_suketusaha.php';	 break;		
		case 'edit_sukettmpusaha' :				
			if(!file_exists ('edit/edit_sukettmpusaha.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_sukettmpusaha.php';	 break;		
		case 'edit_suketpbarang' :				
			if(!file_exists ("edit/edit_suketbarang.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketbarang.php"; break;		
		case 'edit_suketpternak' :				
			if(!file_exists ("edit/edit_suketternak.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketternak.php"; break;	
		case 'edit_sukettmampuv1' :				
			if(!file_exists ("edit/edit_sukettmampu.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sukettmampu.php"; break;	
		case 'edit_sukettmampuv2' :				
			if(!file_exists ("edit/edit_sukettmampuu.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sukettmampuu.php"; break;	
		case 'edit_suketrtm' :				
			if(!file_exists ("edit/edit_suketrtms.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketrtms.php"; break;	
		case 'edit_suketpenghasilan' :				
			if(!file_exists ("edit/edit_suketpenghasilan.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketpenghasilan.php"; break;	
		case 'edit_suketortu' :				
			if(!file_exists ("edit/edit_suketortu.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketortu.php"; break;	
		case 'edit_suketanak' :				
			if(!file_exists ("edit/edit_suketanak.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketanak.php"; break;	
		case 'edit_suketmenikah' :				
			if(!file_exists ("edit/edit_suketmenikah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketmenikah.php"; break;	
		case 'edit_suketkematian' :				
			if(!file_exists ("edit/edit_suketmati.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketmati.php"; break;	
		case 'edit_suketbepergian' :				
			if(!file_exists ("edit/edit_suketbepergian.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketbepergian.php"; break;	
		case 'edit_suketbedaid' :				
			if(!file_exists ("edit/edit_suketbedaid.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketbedaid.php"; break;	
		case 'edit_suketdomisililbg' :				
			if(!file_exists ("edit/edit_suketdomisililbg.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketdomisililbg.php"; break;	
		case 'edit_suketaw' :				
			if(!file_exists ("edit/edit_suketaw.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketaw.php"; break;
		case 'edit_suketlain2' :	
			if(!file_exists ("edit/edit_suketlain.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketlain.php"; break;
		case 'edit_skkb' :	
			if(!file_exists ("edit/edit_skkb.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_skkb.php"; break;	
		case 'edit_suketdomisili' :				
			if(!file_exists ("edit/edit_suketdomisili.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketdomisili.php"; break;	
		case 'edit_sutarpindah' :				
			if(!file_exists ("edit/edit_sutarpindah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sutarpindah.php"; break;	
		case 'edit_suketkelahiran' :				
			if(!file_exists ("edit/edit_suketlahir.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketlahir.php"; break;	
		case 'edit_suketpenguburan' :				
			if(!file_exists ("edit/edit_suketpenguburan.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketpenguburan.php"; break;
		case 'edit_f121' :				
			if(!file_exists ("edit/edit_f121.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_f121.php"; break;	

		case 'edit_n1-n6' :				
			if(!file_exists ("edit/edit_n1-n6.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_n1-n6.php"; break;
		case 'c_n1-n6' :				
			if(!file_exists ("cetak/c_n1-n6_warga.php")) die ("Sorry Empty Page!"); 
			include "cetak/c_n1-n6_warga.php"; break;	
		case 'n6' :				
			if(!file_exists ("surat/n6.php")) die ("Sorry Empty Page!"); 
			include "surat/n6.php"; break;
		case 'edit_n6' :				
			if(!file_exists ("edit/edit_n6.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_n6.php"; break;

		case 'edit_suketpmenikah' :				
			if(!file_exists ("edit/edit_suketpmenikah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketpmenikah.php"; break;
		case 'edit_belumnikah' :				
			if(!file_exists ("edit/edit_suketbmenikah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketbmenikah.php"; break;
		case 'edit_dudajanda' :				
			if(!file_exists ("edit/edit_dudajanda.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_dudajanda.php"; break;
		case 'edit_pstatus' :				
			if(!file_exists ("edit/edit_pstatus.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_pstatus.php"; break;
			
		case 'c_ahliwaris' :				
			if(!file_exists ("cetak/c_ahliwaris_warga.php")) die ("Sorry Empty Page!"); 
			include "cetak/c_ahliwaris_warga.php"; break;
			
		case 'edit_sukettanah' :				
			if(!file_exists ("edit/edit_sukettanah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sukettanah.php"; break;													
		case 'edit_sporadik' :				
			if(!file_exists ("edit/edit_sporadik.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sporadik.php"; break;
		case 'edit_sewatanah' :				
			if(!file_exists ("edit/edit_sewatanah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sewatanah.php"; break;
		case 'edit_jualbelitanah' :				
			if(!file_exists ("edit/edit_jualbelitanah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_jualbelitanah.php"; break;
		case 'edit_gadai' :				
			if(!file_exists ("edit/edit_gadai.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_gadai.php"; break;
		case 'edit_pass' :				
			if(!file_exists ("data/edit_password.php")) die ("Sorry Empty Page!"); 
			include "data/edit_password.php"; break;
		case 'tunggu_suratmandiri' :				
			if(!file_exists ("page/tunggu_suratmandiri.php")) die ("Sorry Empty Page!"); 
			include "page/tunggu_suratmandiri.php"; break;
		case 'tunggu_permohonan' :				
			if(!file_exists ("page/tunggu_permohonan.php")) die ("Sorry Empty Page!"); 
			include "page/tunggu_permohonan.php"; break;
		case 'daftar_permohonan' :				
			if(!file_exists ("page/daftar_permohonan.php")) die ("Sorry Empty Page!"); 
			include "page/daftar_permohonan.php"; break;
		case 'daftar_suratmandiri' :				
			if(!file_exists ("page/daftar_suratmandiri.php")) die ("Sorry Empty Page!"); 
			include "page/daftar_suratmandiri.php"; break;
#LAPORAN
		case 'lap_pelayanan' :				
			if(!file_exists ("laporan/lap_pelayanan.php")) die ("Sorry Empty Page!"); 
			include "laporan/lap_pelayanan.php"; break;
		case 'lap_penduduk' :				
			if(!file_exists ("laporan/lap_penduduk.php")) die ("Sorry Empty Page!"); 
			include "laporan/lap_penduduk.php"; break;
#TESTIMONI
		case 'testimoni' :				
			if(!file_exists ("views/testimoni.php")) die ("Sorry Empty Page!"); 
			include "views/testimoni.php"; break;

		default:
			if(!file_exists ("utama.php")) die ("<br><br><h3 align='center'>Halaman tidak tersedia !</h3>"); 
			include "utama.php";						
		break;
	}
}
?>