<?php
 if(isset($_GET['page']))
                {
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
		case 'home' :				
			if(!file_exists ("main.php")) die ("Sorry Empty Page!"); 
			include "main.php";						
		break;
		case 'tatausaha' :				
			if(!file_exists ("page/tatausaha.php")) die ("Sorry Empty Page!"); 
			include "page/tatausaha.php";						
		break;
		case 'umum' :				
			if(!file_exists ("page/umum.php")) die ("Sorry Empty Page!"); 
			include "page/umum.php";						
		break;
		case 'kependudukan' :				
			if(!file_exists ("page/kependudukan.php")) die ("Sorry Empty Page!"); 
			include "page/kependudukan.php";						
		break;
		case 'pernikahan' :				
			if(!file_exists ("page/pernikahan.php")) die ("Sorry Empty Page!"); 
			include "page/pernikahan.php";						
		break;
		case 'pertanahan' :				
			if(!file_exists ("page/pertanahan.php")) die ("Sorry Empty Page!"); 
			include "page/pertanahan.php";						
		break;
#LAINNYA
		case 'lainnya' :				
			if(!file_exists ("page/lainnya.php")) die ("Sorry Empty Page!"); 
			include "page/lainnya.php";						
		break;

		# SURAT
		case 'undangan' :				
			if(!file_exists ('adm/undangan.php')) die ("Sorry Empty Page!"); 
			include 'adm/undangan.php';	 break;	
		case 'pengantar' :				
			if(!file_exists ('adm/pengantar.php')) die ("Sorry Empty Page!"); 
			include 'adm/pengantar.php';	 break;	
		case 'pemberitahuan' :				
			if(!file_exists ('adm/pemberitahuan.php')) die ("Sorry Empty Page!"); 
			include 'adm/pemberitahuan.php';	 break;	
		case 'himbauan' :				
			if(!file_exists ('adm/himbauan.php')) die ("Sorry Empty Page!"); 
			include 'adm/himbauan.php';	 break;	
		case 'pdinas' :				
			if(!file_exists ('adm/pdinas.php')) die ("Sorry Empty Page!"); 
			include 'adm/pdinas.php';	 break;
		case 'jawaban' :				
			if(!file_exists ('adm/jawaban.php')) die ("Sorry Empty Page!"); 
			include 'adm/jawaban.php';	 break;
		case 'tugas' :				
			if(!file_exists ('adm/surattugas.php')) die ("Sorry Empty Page!"); 
			include 'adm/surattugas.php';	 break;		
//SURAT UMUM
		case 'suketusaha' :				
			if(!file_exists ('adm/suketusaha.php')) die ("Sorry Empty Page!"); 
			include 'adm/suketusaha.php';	 break;	
		case 'sukettmpusaha' :				
			if(!file_exists ('adm/sukettmpusaha.php')) die ("Sorry Empty Page!"); 
			include 'adm/sukettmpusaha.php';	 break;	
		case 'suketpbarang' :				
			if(!file_exists ("adm/suketbarang.php")) die ("Sorry Empty Page!"); 
			include "adm/suketbarang.php"; break;		
		case 'suketpternak' :				
			if(!file_exists ("adm/suketternak.php")) die ("Sorry Empty Page!"); 
			include "adm/suketternak.php"; break;	
		case 'sukettmampuv1' :				
			if(!file_exists ("adm/sukettmampu.php")) die ("Sorry Empty Page!"); 
			include "adm/sukettmampu.php"; break;	
		case 'sukettmampuv2' :				
			if(!file_exists ("adm/sukettmampuu.php")) die ("Sorry Empty Page!"); 
			include "adm/sukettmampuu.php"; break;	
		case 'suketrtm' :				
			if(!file_exists ("adm/suketrtms.php")) die ("Sorry Empty Page!"); 
			include "adm/suketrtms.php"; break;	
		case 'suketpenghasilan' :				
			if(!file_exists ("adm/suketpenghasilan.php")) die ("Sorry Empty Page!"); 
			include "adm/suketpenghasilan.php"; break;	
		case 'suketortu' :				
			if(!file_exists ("adm/suketortu.php")) die ("Sorry Empty Page!"); 
			include "adm/suketortu.php"; break;	
		case 'suketanak' :				
			if(!file_exists ("adm/suketanak.php")) die ("Sorry Empty Page!"); 
			include "adm/suketanak.php"; break;	
		case 'suketmenikah' :				
			if(!file_exists ("adm/suketmenikah.php")) die ("Sorry Empty Page!"); 
			include "adm/suketmenikah.php"; break;	
		case 'suketkematian' :				
			if(!file_exists ("adm/suketmati.php")) die ("Sorry Empty Page!"); 
			include "adm/suketmati.php"; break;	
		case 'suketbepergian' :				
			if(!file_exists ("adm/suketbepergian.php")) die ("Sorry Empty Page!"); 
			include "adm/suketbepergian.php"; break;	
		case 'suketbedaid' :				
			if(!file_exists ("adm/suketbedaid.php")) die ("Sorry Empty Page!"); 
			include "adm/suketbedaid.php"; break;	
		case 'suketdomisililbg' :				
			if(!file_exists ("adm/suketdomisililbg.php")) die ("Sorry Empty Page!"); 
			include "adm/suketdomisililbg.php"; break;	
		case 'suketaw' :				
			if(!file_exists ("adm/suketaw.php")) die ("Sorry Empty Page!"); 
			include "adm/suketaw.php"; break;
		case 'permohonanaw' :				
			if(!file_exists ("adm/permohonanaw.php")) die ("Sorry Empty Page!"); 
			include "adm/permohonanaw.php"; break;
		case 'skkb' :				
			if(!file_exists ("adm/skkb.php")) die ("Sorry Empty Page!"); 
			include "adm/skkb.php"; break;	
	#SURAT LAINNYA
		case 'suketlain2' :				
			if(!file_exists ("adm/suketlain2.php")) die ("Sorry Empty Page!"); 
			include "adm/suketlain2.php"; break;
		case 'assesment' :				
			if(!file_exists ("adm/assesment.php")) die ("Sorry Empty Page!"); 
			include "adm/assesment.php";						
		break;	
		case 'edit_assesment' :				
			if(!file_exists ("edit/edit_assesment.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_assesment.php";						
		break;

		case 'suketdomisili' :				
			if(!file_exists ("adm/suketdomisili.php")) die ("Sorry Empty Page!"); 
			include "adm/suketdomisili.php"; break;	
		case 'sutarpindah' :				
			if(!file_exists ("adm/sutarpindah.php")) die ("Sorry Empty Page!"); 
			include "adm/sutarpindah.php"; break;	
		case 'suketkelahiran' :				
			if(!file_exists ("adm/suketkelahiran.php")) die ("Sorry Empty Page!"); 
			include "adm/suketkelahiran.php"; break;	
		case 'suketpenguburan' :				
			if(!file_exists ("adm/suketpenguburan.php")) die ("Sorry Empty Page!"); 
			include "adm/suketpenguburan.php"; break;
		case 'f121' :				
			if(!file_exists ("adm/f121.php")) die ("Sorry Empty Page!"); 
			include "adm/f121.php"; break;
		case 'sig' :				
			if(!file_exists ("adm/sig.php")) die ("Sorry Empty Page!"); 
			include "adm/sig.php"; break;	
		case 'skck' :				
			if(!file_exists ("adm/skck.php")) die ("Sorry Empty Page!"); 
			include "adm/skck.php"; break;
		case 'simb' :				
			if(!file_exists ("adm/simb.php")) die ("Sorry Empty Page!"); 
			include "adm/simb.php"; break;
	//PERNIKAHAN
		case 'n1-n6' :				
			if(!file_exists ("adm/n1-n6.php")) die ("Sorry Empty Page!"); 
			include "adm/n1-n6.php"; break;	
		case 'pernahnikah' :				
			if(!file_exists ("adm/suketpernahnikah.php")) die ("Sorry Empty Page!"); 
			include "adm/suketpernahnikah.php"; break;
		case 'belumnikah' :				
			if(!file_exists ("adm/suketbelumnikah.php")) die ("Sorry Empty Page!"); 
			include "adm/suketbelumnikah.php"; break;
		case 'dudajanda' :				
			if(!file_exists ("adm/suketdudajanda.php")) die ("Sorry Empty Page!"); 
			include "adm/suketdudajanda.php"; break;
		case 'pstatus' :				
			if(!file_exists ("adm/pstatus.php")) die ("Sorry Empty Page!"); 
			include "adm/pstatus.php"; break;
		case 'suketcerai' :				
			if(!file_exists ("adm/suketcerai.php")) die ("Sorry Empty Page!"); 
			include "adm/suketcerai.php"; break;

//PERTANAHAN
		case 'sukettanah' :				
			if(!file_exists ("adm/sukettanah.php")) die ("Sorry Empty Page!"); 
			include "adm/sukettanah.php"; break;
		case 'pelepasantanah' :				
			if(!file_exists ("adm/pelepasantanah.php")) die ("Sorry Empty Page!"); 
			include "adm/pelepasantanah.php"; break;
		case 'sporadik' :				
			if(!file_exists ("adm/sporadik.php")) die ("Sorry Empty Page!"); 
			include "adm/sporadik.php"; break;
		case 'sewatanah' :				
			if(!file_exists ("adm/sewatanah.php")) die ("Sorry Empty Page!"); 
			include "adm/sewatanah.php"; break;
		case 'jualbelitanah' :				
			if(!file_exists ("adm/jualbelitanah.php")) die ("Sorry Empty Page!"); 
			include "adm/jualbelitanah.php"; break;
		case 'gadai' :				
			if(!file_exists ("adm/gadai.php")) die ("Sorry Empty Page!"); 
			include "adm/gadai.php"; break;


		case 'edit_pelepasantanah' :				
			if(!file_exists ("edit/edit_pelepasantanah.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_pelepasantanah.php"; break;

		case 'edit_sig' :				
			if(!file_exists ("edit/edit_sig.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_sig.php"; break;

		case 'edit_skck' :				
			if(!file_exists ("edit/edit_skck.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_skck.php"; break;

		case 'edit_simb' :				
			if(!file_exists ("edit/edit_simb.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_simb.php"; break;

		case 'edit_suketcerai' :				
			if(!file_exists ("edit/edit_suketcerai.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_suketcerai.php"; break;

//PAGEEEEEEEEEEEEEEEEEEEEEE
		case 'galeri' :				
			if(!file_exists ("page/galeri.php")) die ("Sorry Empty Page!"); 
			include "page/galeri.php"; break;
		case 'upload_galeri' :				
			if(!file_exists ("page/upload_galeri.php")) die ("Sorry Empty Page!"); 
			include "page/upload_galeri.php"; break;
		case 'edit_galeri' :				
			if(!file_exists ("page/edit_galeri.php")) die ("Sorry Empty Page!"); 
			include "page/edit_galeri.php"; break;
		case 'berita' :				
			if(!file_exists ("page/berita.php")) die ("Sorry Empty Page!"); 
			include "page/berita.php"; break;
		case 'post_berita' :				
			if(!file_exists ("page/post_berita.php")) die ("Sorry Empty Page!"); 
			include "page/post_berita.php"; break;
		case 'edit_berita' :				
			if(!file_exists ("page/edit_berita.php")) die ("Sorry Empty Page!"); 
			include "page/edit_berita.php"; break;	
		case 'slider' :				
			if(!file_exists ("page/slider.php")) die ("Sorry Empty Page!"); 
			include "page/slider.php"; break;
		case 'upload_slider' :				
			if(!file_exists ("page/upload_slider.php")) die ("Sorry Empty Page!"); 
			include "page/upload_slider.php"; break;
		case 'edit_slider' :				
			if(!file_exists ("page/edit_slider.php")) die ("Sorry Empty Page!"); 
			include "page/edit_slider.php"; break;
		case 'profil_desa' :				
			if(!file_exists ("page/profil_desa.php")) die ("Sorry Empty Page!"); 
			include "page/profil_desa.php"; break;
		case 'edit_profil_desa' :				
			if(!file_exists ("page/edit_profil_desa.php")) die ("Sorry Empty Page!"); 
			include "page/edit_profil_desa.php"; break;
			case 'transparansi' :				
				if(!file_exists ("page/transparansi.php")) die ("Sorry Empty Page!"); 
				include "page/transparansi.php"; break;
			case 'edit_transparansi' :				
				if(!file_exists ("page/edit_transparansi.php")) die ("Sorry Empty Page!"); 
				include "page/edit_transparansi.php"; break;
				case 'lembaga_masyarakat' :				
					if(!file_exists ("page/lembaga_masyarakat.php")) die ("Sorry Empty Page!"); 
					include "page/lembaga_masyarakat.php"; break;
				case 'edit_lembaga_masyarakat' :				
					if(!file_exists ("page/edit_lembaga_masyarakat.php")) die ("Sorry Empty Page!"); 
					include "page/edit_lembaga_masyarakat.php"; break;
			
			
				
//DATAAAAAAAAAAAAAAAAAAAAAAAAAAAA
		case 'master_desa' :				
			if(!file_exists ("data/master_desa.php")) die ("Sorry Empty Page!"); 
			include "data/master_desa.php"; break;
		case 'edit_master_desa' :				
			if(!file_exists ("data/edit_master_desa.php")) die ("Sorry Empty Page!"); 
			include "data/edit_master_desa.php"; break;
		case 'penduduk' :				
			if(!file_exists ("data/penduduk.php")) die ("Sorry Empty Page!"); 
			include "data/penduduk.php"; break;
		case 'cetak_penduduk' :				
			if(!file_exists ("../cetak/c_penduduk.php")) die ("Sorry Empty Page!"); 
			include "../cetak/c_penduduk.php"; break;
		case 'tambahpenduduk' :				
			if(!file_exists ("data/tambah_penduduk.php")) die ("Sorry Empty Page!"); 
			include "data/tambah_penduduk.php"; break;
		case 'importpenduduk' :				
			if(!file_exists ("../importxls/importpenduduk.php")) die ("Sorry Empty Page!"); 
			include "../importxls/importpenduduk.php"; break;
		case 'lihatpenduduk' :				
			if(!file_exists ("../importxls/lihatpenduduk.php")) die ("Sorry Empty Page!"); 
			include "../importxls/lihatpenduduk.php"; break;
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
		case 'adm' :				
			if(!file_exists ("data/adm.php")) die ("Sorry Empty Page!"); 
			include "data/adm.php"; break;
		case 'staff' :				
			if(!file_exists ("data/staff.php")) die ("Sorry Empty Page!"); 
			include "data/staff.php"; break;
		case 'tambah_staff' :				
			if(!file_exists ("data/tambah_staff.php")) die ("Sorry Empty Page!"); 
			include "data/tambah_staff.php"; break;
		case 'edit_staff' :				
			if(!file_exists ("data/edit_staff.php")) die ("Sorry Empty Page!"); 
			include "data/edit_staff.php"; break;
			case 'user' :				
				if(!file_exists ('data/user.php')) die ("Sorry Empty Page!"); 
				include 'data/user.php';	 break;
			case 'tambah_user' :				
				if(!file_exists ('data/tambah_user.php')) die ("Sorry Empty Page!"); 
				include 'data/tambah_user.php';	 break;
			case 'edit_user' :				
				if(!file_exists ('data/edit_user.php')) die ("Sorry Empty Page!"); 
				include 'data/edit_user.php';	 break;
	
			case 'pengaturan_surat' :				
				if(!file_exists ('page/pengaturan_surat.php')) die ("Sorry Empty Page!"); 
				include 'page/pengaturan_surat.php';	 break;
	
	
		case 'process_permohonan' :				
			if(!file_exists ("data/process_permohonan.php")) die ("Sorry Empty Page!"); 
			include "data/process_permohonan.php"; break;
		case 'daftar_permohonan' :				
			if(!file_exists ("data/daftar_permohonan.php")) die ("Sorry Empty Page!"); 
			include "data/daftar_permohonan.php"; break;
		case 'daftar_suratmandiri' :				
			if(!file_exists ("data/daftar_suratmandiri.php")) die ("Sorry Empty Page!"); 
			include "data/daftar_suratmandiri.php"; break;
		case 'acc' :				
			if(!file_exists ("data/acc_surat_mandiri.php")) die ("Sorry Empty Page!"); 
			include "data/acc_surat_mandiri.php"; break;
		case 'acc_permohonan' :				
			if(!file_exists ("data/acc_permohonan.php")) die ("Sorry Empty Page!"); 
			include "data/acc_permohonan.php"; break;

	# EDIT SURAT UMUM
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
			if(!file_exists ('../cetak/c_pdinas.php')) die ("Sorry Empty Page!"); 
			include '../cetak/c_pdinas.php';	 break;
		case 'edit_jawaban' :				
			if(!file_exists ('edit/edit_jawaban.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_jawaban.php';	 break;	
		case 'edit_stugas' :				
			if(!file_exists ('edit/edit_stugas.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_stugas.php';	 break;	
		case 'c_surattugas' :				
			if(!file_exists ('../cetak/c_surattugas.php')) die ("Sorry Empty Page!"); 
			include '../cetak/c_surattugas.php';	 break;
		case 'c_ahliwaris' :				
			if(!file_exists ('../cetak/c_ahliwaris.php')) die ("Sorry Empty Page!"); 
			include '../cetak/c_ahliwaris.php';	 break;

		case 'edit_suketusaha' :				
			if(!file_exists ('edit/edit_suketusaha.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_suketusaha.php';	 break;		
		case 'edit_sukettmpusaha' :				
			if(!file_exists ('edit/edit_sukettmpusaha.php')) die ("Sorry Empty Page!"); 
			include 'edit/edit_sukettmpusaha.php';	 break;		
		case 'edit_suketbarang' :				
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
		case 'edit_permohonanaw' :				
			if(!file_exists ("edit/edit_permohonanaw.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_permohonanaw.php"; break;
			
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
			if(!file_exists ("../cetak/c_n1-n6.php")) die ("Sorry Empty Page!"); 
			include "../cetak/c_n1-n6.php"; break;	
		case 'n6' :				
			if(!file_exists ("adm/n6.php")) die ("Sorry Empty Page!"); 
			include "adm/n6.php"; break;
		case 'edit_n6' :				
			if(!file_exists ("edit/edit_n6.php")) die ("Sorry Empty Page!"); 
			include "edit/edit_n6.php"; break;

		case 'edit_pernahnikah' :				
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
			case 'hapus_permohonan':
				include "page/hapus_permohonan.php";
				break;
				case 'process_permohonan':
					include "page/proses_permohonan.php";
					break;
					case 'daftar_permohonan':
						include "page/data_permohonan.php";
						break;
						case 'acc_permohonan':
							include "page/acc_permohonan.php";
							break;
							case 'acc_surat_mandiri':
								include "page/acc_surat_mandiri.php";
								break;
		case 'transparansi':
   			 include "page/transparansi.php";break;
		case 'edit_monografi_kampung':
   			 if(!file_exists("page/edit_monografi_kampung.php")) die("Sorry Empty Page!");
   			 include "page/edit_monografi_kampung.php"; break;
		case 'trans_monografi':
        	 	 include "page/trans_monografi.php"; break;
    		case 'trans_monografi_tambah':
        	 	 include "page/trans_monografi_tambah.php"; break;
    		case 'trans_monografi_edit':
        	 	 include "page/trans_monografi_edit.php"; break;
		case 'trans_apbdes':
   			 include "page/trans_apbdes.php"; break;
 		case 'trans_apbdes_tambah':
   			 include "page/trans_apbdes_tambah.php";break;
 		case 'trans_apbdes_edit':
    			 include "page/trans_apbdes_edit.php"; break;
		case 'aksi_edit_apbdes':
    			 include "page/aksi_edit_apbdes.php"; break;
 		case 'trans_idm':
    			 include 'page/trans_idm.php'; break;
		case 'trans_idm_tambah':
    			 include 'page/trans_idm_tambah.php'; break;
 		case 'trans_idm_edit':
    			 include 'page/trans_idm_edit.php'; break;
		case 'hapus_idm':
    			 include 'page/hapus_idm.php'; break;
 		case 'aksi_tambah_idm':
    			 include 'page/aksi_tambah_idm.php'; break;
 		case 'aksi_edit_idm':
    			 include 'page/aksi_edit_idm.php'; break;

		case 'sambutan':
        		include "page/sambutan.php"; break;
    		case 'sambutan_edit':
        		include "page/sambutan_edit.php"; break;
		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
	}
}
