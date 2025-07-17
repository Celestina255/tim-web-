-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 06:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_suratv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `level` varchar(15) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `token` varchar(6) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `uname`, `email`, `hp`, `kelurahan`, `pass`, `tgl`, `foto`, `level`, `last_login`, `token`, `status`) VALUES
(1, 'admin', 'umikalimah20@gmail.com', '082278183799', 'Wagom', '202cb962ac59075b964b07152d234b70', '2023-08-19', 'umi.jpg', 'admin', '15-07-2025 11:21', '', 'on'),
(2, 'warga', 'werika831@gmail.com', '085764458877', 'Wagom', '202cb962ac59075b964b07152d234b70', '2023-08-19', '5IMG20221220083250.jpg', 'warga', '14-03-2024 4:59', '558293', 'on'),
(4, 'Admnistrator', 'sdccreator12@gmail.com', '082278183799', 'Wagom', 'c33367701511b4f6020ec61ded352059', '2023-08-22', '22images.jpeg', 'warga', '01-09-2023 7:34', '', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ahliwaris`
--

CREATE TABLE `tb_ahliwaris` (
  `id` int(4) NOT NULL,
  `kodeaw` varchar(5) NOT NULL,
  `nm` varchar(100) NOT NULL,
  `lp` varchar(15) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `shdk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ahliwaris`
--

INSERT INTO `tb_ahliwaris` (`id`, `kodeaw`, `nm`, `lp`, `ttl`, `alamat`, `agama`, `shdk`) VALUES
(2, 'SR014', 'MUHSININ', 'L', 'Pamulihan, 19 Juli 1985', 'Dusun Sinar Jaya RT/RW. 001/001', 'Islam', 'Anak'),
(3, 'SR014', 'MARSIH', 'P', 'Nagamulya, 20 Juli 1992', 'Tegal Sari', 'Islam', 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(4) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tgl_posting` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` int(4) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `slug`, `isi`, `gambar`, `kategori`, `tgl_posting`, `user`, `status`) VALUES
(1, 'Sejarah Windows dari Awal Sampai Sekarang', 'sejarah-windows-dari-awal-sampai-sekarang', '<p>Sejak diluncurkan pertama kali pada tahun 1985, sistem operasi Windows telah menjadi bagian penting dari kehidupan digital kita. Sistem operasi Windows telah melalui sejumlah perubahan signifikan selama beberapa dekade terakhir, dari tampilan antarmuka pengguna hingga kemampuan teknisnya. Berikut adalah ringkasan dari 14 versi Windows yang telah dirilis sejak awal hingga sekarang:</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 1.0 (1985)</p>\r\n\r\n<p>Windows 1.0 adalah versi pertama dari sistem operasi Windows yang diluncurkan pada 20 November 1985. Sistem operasi ini memiliki antarmuka pengguna yang sederhana dan mampu menjalankan beberapa program aplikasi pada saat yang bersamaan.</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 2.0 (1987)</p>\r\n\r\n<p>Windows 2.0 diluncurkan pada bulan Desember 1987. Versi ini menambahkan dukungan untuk aplikasi baru dan kemampuan tampilan grafis yang lebih baik.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 3.0 (1990)</p>\r\n\r\n<p>Windows 3.0 diluncurkan pada bulan Mei 1990. Versi ini memiliki tampilan antarmuka pengguna yang baru dan menambahkan dukungan untuk program Windows yang lebih banyak. Windows 3.0 juga menjadi versi Windows yang paling populer dan digunakan pada saat itu.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 95 (1995)</p>\r\n\r\n<p>Windows 95 dirilis pada bulan Agustus 1995. Versi ini menampilkan banyak perubahan penting, termasuk antarmuka pengguna yang baru dan dukungan untuk Internet.</p>\r\n\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 98 (1998)</p>\r\n\r\n<p>Windows 98 dirilis pada bulan Juni 1998. Versi ini menambahkan fitur baru seperti dukungan untuk USB dan kemampuan plug-and-play yang lebih baik.</p>\r\n\r\n<p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 2000 (2000)</p>\r\n\r\n<p>Windows 2000 dirilis pada bulan Februari 2000. Versi ini menambahkan dukungan untuk teknologi baru seperti USB 2.0 dan FireWire.</p>\r\n\r\n<p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows XP (2001)</p>\r\n\r\n<p>Windows XP dirilis pada bulan Oktober 2001. Versi ini menampilkan antarmuka pengguna yang baru dan menjadi salah satu versi Windows yang paling populer dan banyak digunakan.</p>\r\n\r\n<p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows Vista (2006)</p>\r\n\r\n<p>Windows Vista dirilis pada bulan Januari 2007. Versi ini menampilkan tampilan antarmuka pengguna yang baru dan sejumlah fitur baru seperti dukungan untuk DirectX 10.</p>\r\n\r\n<p>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows 7 (2009)</p>\r\n\r\n<p>Windows 7 dirilis pada bulan Oktober 2009. Versi ini menampilkan antarmuka pengguna yang lebih sederhana dan banyak fitur baru seperti dukungan untuk multi-touch.</p>\r\n\r\n<p>10.&nbsp;&nbsp;Windows 8 (2012)</p>\r\n\r\n<p>Windows 8 dirilis pada bulan Oktober 2012. Versi ini menampilkan antarmuka pengguna yang baru yang dirancang khusus untuk perangkat layar sentuh dan banyak fitur baru seperti dukungan untuk NFC.</p>\r\n\r\n<p>11.&nbsp;&nbsp;Windows 8.1 (2013)</p>\r\n\r\n<p>Windows 8.1 dirilis pada bulan Oktober 2013. Versi ini menambahkan fitur baru seperti antarmuka pengguna yang diperbarui dan kemampuan multitasking yang lebih baik.</p>\r\n\r\n<p>12.&nbsp;&nbsp;Windows 10 (2015)</p>\r\n\r\n<p>Windows 10 dirilis pada bulan Windows 10 adalah salah satu sistem operasi terbaru dari Microsoft. Dirilis pada tahun 2015, Windows 10 memiliki berbagai fitur baru yang membuatnya lebih user-friendly dan memiliki performa yang lebih baik dibandingkan pendahulunya, Windows 8.</p>\r\n\r\n<p>13.&nbsp;&nbsp;Windows 11 (2021)</p>\r\n\r\n<p>Setelah Windows 10, Microsoft mengeluarkan versi terbaru Windows 11 pada tanggal 5 Oktober 2021. Windows 11 menyajikan inovasi pada menu Start yang diposisikan di tengah dan didesain untuk mempermudah kegiatan multitasking. Selain itu, pengguna juga dapat mengakses aplikasi Android pada PC dan laptop dengan Windows 11.</p>\r\n\r\n<p>Melalui perjalanan panjangnya dari awal hingga sekarang, Windows telah mengalami banyak perkembangan dan peningkatan untuk menghasilkan sistem operasi terkini yang canggih seperti Windows 11. Itulah mengapa mengembangkan sistem operasi yang mutakhir seperti Windows 11 memerlukan upaya yang besar, yang telah dimulai sejak peluncuran Windows 1 sebagai sistem operasi pertama oleh Microsoft.</p>\r\n', '279252windows11.jpeg', '7', '2023-09-05 21:00:24', 1, 'Publish'),
(2, 'Skripsi kini tidak lagi jadi syarat kelulusan', 'skripsi-kini-tidak-lagi-jadi-syarat-kelulusan', '<p>Universitas di Kabupaten Cianjur tidak akan menggunakan lagi skripsi sebagai syarat kelulusan. Sebagai gantinya mahasiswa tahap akhir baik untuk D3 ataupun S1 akan disyaratkan membuat karya ilmiah yang dipublikasikan dan proyek sesuai dengan kompetensi program pendidikannya.<br />\r\nKebijakan itu pun diambil menyusul keluarnya Permendikbudristek No 53 Tahun 2023 Tentang Penjaminan Mutu Pendidikan Tinggi. Di mana mahasiswa tak harus mengerjakan skripsi untuk syarat kelulusan.<br />\r\n<br />\r\nDalam aturan tersebut, standar kelulusan mahasiswa S1 dan D4 tak lagi terpaku pada skripsi. Bahkan Menteri Pendidikan Nadiem Makarim menyebut syarat kelulusan diserahkan kepada setiap kepala program studi (Kaprodi) pendidikan di perguruan tinggi tersebut.<br />\r\nRektor Universitas Putra Indonesia (UNPI) Astri Dwi Andriani, mengatakan Kepmendikbudristek nomor 53 tahun 2023 bukan hal baru bagi pengelola perguruan tinggi. Sebab jauh sebelumnya Mendikbud Nadiem sudah memperkenalkan konsep merdeka belajar kampus merdeka (MBKM).<br />\r\n<br />\r\n&quot;Pada MBKM, kami sudah jalankan 8 program mulai dari pertukaran pelajar dan dosen, pengabdian di sekolah, pelaksanaan riset, hingga KKM tematik,&quot; kata dia, Minggu (3/9/2023).<br />\r\n<br />\r\nNamun, lanjut dia, dengan adanya aturan baru tersebut, pihaknya juga akan melakukan penyesuaian kembali. Di antaranya terkait skripsi yang tidak lagi diwajibkan.<br />\r\n<br />\r\n&quot;Kami sepakat dengan tidak lagi diwajibkannya skripsi, karena untuk menilai kompentesi seseorang tidak harus melalui satu cara, tapi bisa dengan banyak cara. Contohnya untuk jurusan-jurusan vokasi yang menitik beratkan pada keterampilan teknis, lebih cocok untuk membuat sebuah project sesuai bidang ilmu dibanding sebuah karya ilmiah,&quot; kata dia.<br />\r\n<br />\r\nDia menjelaskan rencananya untuk mahasiswa D3 atau vokasi diminta untuk membuat proyek sesuai dengan bidang ilmu di program pendidikannya sedangkan untuk S1 difokuskan pada luaran jurnal atau karya ilmiah yang dipublikasikan.<br />\r\n<br />\r\nDia menambahkan skripsi juga biasanya mengendap di perpustakaan, sehingga kurang berdampak pada penyebarluasan ilmu pengetahuan.<br />\r\n<br />\r\n&quot;Selain itu kurang efisien karena base on paper dan jumlah halaman yang tebal. Sedangkan karya ilmiah yang di publikasikan itu lebih efektif dan efisien tanpa mengurangi kualitas keabsahan karya ilmiahnya. Jadi lebih paperless, temuan dan inovasi tersebar luas secara digital, hingga mendongkrak publikasi dosen, mahasiswa, dan perguruan tinggi yg merupakan bagian dari tridharma,&quot; tuturnya.<br />\r\nTetapi, bimbingan tetap dilakukan seperti halnya skripsi dengan waktu selama satu semester.<br />\r\n<br />\r\nAstri mengatakan rencana diubahnya skripsi menjadi karya ilmiah dan proyek segera disampaikan dan dikonsultasikan supaya bisa secepatnya diterapkan.<br />\r\n<br />\r\n&quot;Kami akan menghadap ke lembaga layanan pendidikan tinggi (LLDIKTI) wilayah 4 Jawa Barat untuk berkonsultasi lebih lanjut mengenai penerapan permendikbudristek no 53 tahun 2023 ini di Jawa Barat dan kemudian akan mengimpilementasikannya di kampus kami,&quot; kata dia.<br />\r\n<br />\r\nDi sisi lain, Wakil Rektor Universitas Suryakencana (Unsur) Mia Amalia, mengatakan pihaknya juga tengah membahas peraturan baru tersebut, terutama terkait tidak lagi diwajibkannya skripsi sebagai syarat kelulusan.<br />\r\n<br />\r\n&quot;Masih dalam pembahasan. Kami akan bahas dengan bagian akademik,&quot; pungkasnya.<br />\r\n<br />\r\nBaca artikel detikjabar, &quot;Bye Skripsi! Kampus di Cianjur Pilih Karya Ilmiah Jadi Syarat Lulus&quot; selengkapnya&nbsp;<a href=\"https://www.detik.com/jabar/berita/d-6911117/bye-skripsi-kampus-di-cianjur-pilih-karya-ilmiah-jadi-syarat-lulus\" style=\"box-sizing: border-box; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-decoration-line: none; color: rgb(0, 0, 0); transition: color 0.3s ease-in-out 0s, background 0.3s ease-in-out 0s, opacity 0.3s ease-in-out 0s; font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">https://www.detik.com/jabar/berita/d-6911117/bye-skripsi-kampus-di-cianjur-pilih-karya-ilmiah-jadi-syarat-lulus</a>.<br />\r\n&nbsp;</p>\r\n', '154306bgapp.jpg', '4', '2023-09-07 06:14:54', 1, 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buatsendiri`
--

CREATE TABLE `tb_buatsendiri` (
  `id` int(4) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `kode_jenis` varchar(25) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nmsurat` varchar(150) NOT NULL,
  `tgl` date NOT NULL,
  `userid` int(4) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buatsendiri`
--

INSERT INTO `tb_buatsendiri` (`id`, `nik`, `nama`, `kode_surat`, `kode_jenis`, `no_surat`, `nmsurat`, `tgl`, `userid`, `keterangan`, `status`) VALUES
(1, '1801080804380001', 'KHOTIM', 'SR001', 'JS022', '472.2/001/IX/2023', 'Surat Keterangan Duda / Janda', '2023-09-03', 2, '', 'acc'),
(2, '1801231907930003', 'AHMAD FAUZI RIDWAN', '0000', 'JS001', '475.43/002/IX/2023', 'Surat Keterangan Usaha', '2023-09-05', 2, '', 'ditolak'),
(3, '1801084812830001', 'SUNANI', 'SR003', 'JS001', '475.43/003/IX/2023', 'Surat Keterangan Usaha', '2023-09-05', 2, '', 'acc'),
(4, '1801231907930003', 'AHMAD FAUZI RIDWAN', 'SR004', 'JS013', '471.1/004/IX/2023', 'Surat Keterangan Bepergian', '2023-09-05', 2, '', 'acc'),
(5, '1801080804380001', 'KHOTIM', 'SR005', 'JS008', '500/005/IX/2023', 'Surat Keterangan Penghasilan', '2023-09-05', 2, '', 'acc'),
(6, '1801230808740004', 'MUHSININ', 'SR006', 'JS005', '401/006/IX/2023', 'Surat Keterangan Tidak Mampu', '2023-09-05', 2, '', 'acc'),
(7, '1801230808740004', 'MUHSININ', 'SR007', 'JS006', '401/007/IX/2023', 'Surat Keterangan Keluarga Tidak Mampu', '2023-09-05', 2, '', 'acc'),
(8, '1801084812830001', 'SUNANI', '0000', 'JS015', '470/015/IX/2023', 'Surat Keterangan Domisili', '2023-09-23', 2, 'Data yang kamu input tidak sesuai', 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataassesment`
--

CREATE TABLE `tb_dataassesment` (
  `id` int(4) NOT NULL,
  `kode_surat` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `shdk` varchar(15) NOT NULL,
  `umur` int(4) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_datacalon`
--

CREATE TABLE `tb_datacalon` (
  `id` int(4) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `binbinti` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(16) NOT NULL,
  `kwng` varchar(50) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pkjn` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kab` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `status_na` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datacalon`
--

INSERT INTO `tb_datacalon` (`id`, `kode`, `nik`, `nama`, `binbinti`, `jk`, `tmp_lahir`, `tgl_lahir`, `kwng`, `agama`, `pkjn`, `prov`, `kab`, `kec`, `kelurahan`, `alamat`, `status`, `status_na`) VALUES
(1, 'SR023', '1801232603050001', 'MUHAMMAD DARMA SAPUTRA', 'SARDI', 'Laki-laki', 'PAMULIHAN', '26/03/2005', 'Indonesia', 'Islam', 'Belum/Tidak bekerja', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', 'Belum Kawin', 'Numpang Nikah'),
(2, 'SR023', '1801236512060002', 'SITI NURHAYATI', 'TURIMAN', 'Perempuan', 'PEMULIHAN', '25/12/2006', 'Indonesia', 'Islam', 'Belum/Tidak bekerja', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', 'Belum Kawin', 'Tidak Numpang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datapdinas`
--

CREATE TABLE `tb_datapdinas` (
  `id` int(5) NOT NULL,
  `kodepd` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nm` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datapdinas`
--

INSERT INTO `tb_datapdinas` (`id`, `kodepd`, `nm`, `tgl_lahir`, `ket`) VALUES
(1, 'SR021', 'MARSIH', '21 Juli 1994', 'Kaur Keuangan'),
(2, 'SR021', 'WIDAYANTI', '14 Maret 1998', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datastugas`
--

CREATE TABLE `tb_datastugas` (
  `id` int(5) NOT NULL,
  `kodetgs` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nm` varchar(150) CHARACTER SET latin1 NOT NULL,
  `satker` varchar(150) NOT NULL,
  `jab` varchar(150) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datastugas`
--

INSERT INTO `tb_datastugas` (`id`, `kodetgs`, `nm`, `satker`, `jab`, `tgl`) VALUES
(2, 'SR022', 'TUKIMAN/12547665587899', 'Keamanan lingkungan', 'Kepala Hansip/IIa', '2023-09-24'),
(3, 'SR022', 'ADUNG/182457825455587', 'Keamanan lingkungan', 'Anggota Hansip/IIa', '2023-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datasurat`
--

CREATE TABLE `tb_datasurat` (
  `id` int(4) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `kodejenis` varchar(8) NOT NULL,
  `nmsurat` varchar(100) NOT NULL,
  `no` varchar(70) NOT NULL,
  `id_stf` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datasurat`
--

INSERT INTO `tb_datasurat` (`id`, `kode`, `kodejenis`, `nmsurat`, `no`, `id_stf`, `tanggal`, `status`) VALUES
(1, 'SR001', 'JS022', 'Surat Keterangan Duda / Janda', '472.2/001/IX/2023', '2', '2023-09-03', 'acc'),
(3, 'SR003', 'JS001', 'Surat Keterangan Usaha', '475.43/003/IX/2023', '2', '2023-09-05', 'acc'),
(4, 'SR004', 'JS013', 'Surat Keterangan Bepergian', '471.1/004/IX/2023', '2', '2023-09-05', 'acc'),
(6, 'SR006', 'JS005', 'Surat Keterangan Tidak Mampu', '401/006/IX/2023', '2', '2023-09-05', 'acc'),
(7, 'SR007', 'JS006', 'Surat Keterangan Keluarga Tidak Mampu', '401/007/IX/2023', '2', '2023-09-05', 'acc'),
(8, 'SR008', 'JS008', 'Surat Keterangan Penghasilan', '500/008/IX/2023', '', '2023-09-05', 'acc'),
(9, 'SR009', 'JS043', 'Surat Pengantar SKCK', '140/009/IX/2023', '1', '2023-09-05', 'acc'),
(10, 'SR010', 'JS042', 'Surat Keterangan Pelepasan Tanah', '140/010/IX/2023', '1', '2023-09-05', 'acc'),
(11, 'SR011', 'JS041', 'Surat Keterangan Cerai', '470/011/IX/2023', '1', '2023-09-05', 'acc'),
(14, 'SR012', 'JS045', 'Surat Izin Ganguan', '140/012/IX/2023', '1', '2023-09-05', 'acc'),
(15, 'SR013', 'JS044', 'Surat Pengantar Permohonan IMB', '1801082909730001', '1', '2023-09-05', 'acc'),
(19, 'SR014', 'JS023', 'Surat Keterangan Ahli Waris', '470/014/IX/2023', '1', '2023-09-24', 'acc'),
(20, 'SR015', 'JS032', 'Permohonan KTP', '470/015/IX/2023', '1', '2023-09-24', 'acc'),
(21, 'SR016', 'JS036', 'Pernyataan Kesepakatan Gadai Tanah', '-', '1', '2023-09-24', 'acc'),
(22, 'SR017', 'JS028', 'Surat Himbauan', '140/017/IX/2023', '1', '2023-09-24', 'acc'),
(23, 'SR018', 'JS028', 'Surat Himbauan', '/018/IX/2023', '1', '2023-09-24', 'acc'),
(24, 'SR019', 'JS030', 'Surat Jawaban', '140/019/IX/2023', '1', '2023-09-24', 'acc'),
(25, 'SR020', 'JS035', 'Pernyataan Kesepakatan Jual Beli Tanah', '-', '1', '2023-09-24', 'acc'),
(26, 'SR021', 'JS029', 'Surat Perintah Perjalan Dinas', '141/021/IX/2023', '1', '2023-09-24', 'acc'),
(27, 'SR022', 'JS039', 'Surat Tugas', '140/022/IX/2023', '1', '2023-09-24', 'acc'),
(28, 'SR023', 'JS019', 'Surat Pengantar Nikah', '472.2/023/IX/2023', '1', '2023-09-24', 'acc'),
(32, 'SR025', 'JS044', 'Surat Pengantar Permohonan IMB', '1801080107030047', '1', '2023-09-24', 'acc'),
(33, 'SR026', 'JS044', 'Surat Pengantar Permohonan IMB', '1801230808740004', '1', '2023-09-24', 'acc'),
(34, 'SR027', 'JS042', 'Surat Keterangan Pelepasan Tanah', '140/027/IX/2023', '1', '2023-09-24', 'acc'),
(35, 'SR028', 'JS027', 'Surat Pemberitahuan', '140/028/IX/2023', '1', '2023-09-24', 'acc'),
(36, 'SR029', 'JS026', 'Surat Pengantar', '140/029/IX/2023', '1', '2023-09-24', 'acc'),
(37, 'SR030', 'JS040', 'Permohonan Pencatatan Ahli Waris', '470/030/IX/2023', '1', '2023-09-24', 'acc'),
(38, 'SR031', 'JS098', 'Surat Pernyataan Status Perkawinan', '1801231907930003', '1', '2023-09-24', 'acc'),
(39, 'SR032', 'JS034', 'Pernyataan Kesepakatan Sewa Tanah', '-', '1', '2023-09-24', 'acc'),
(40, 'SR033', 'JS045', 'Surat Izin Ganguan', '140/033/IX/2023', '1', '2023-09-24', 'acc'),
(41, 'SR034', 'JS021', 'Surat Keterangan Belum Pernah Menikah', '472.2/034/IX/2023', '1', '2023-09-24', 'acc'),
(42, 'SR035', 'JS043', 'Surat Pengantar SKCK', '140/035/IX/2023', '1', '2023-09-24', 'acc'),
(43, 'SR036', 'JS037', 'Surat Keterangan Kelakuan Baik', '470/036/IX/2023', '1', '2023-09-24', 'acc'),
(44, 'SR037', 'JS033', 'Pernyataan Penguasaan Fisik Bidang Tanah (Sporadik)', '1801080804380001', '1', '2023-09-24', 'acc'),
(45, 'SR038', 'JS010', 'Surat Keterangan Anak', '471.1/038/IX/2023', '1', '2023-09-24', 'acc'),
(46, 'SR039', 'JS003', 'Surat Keterangan Pengantar Barang', '500/039/IX/2023', '1', '2023-09-24', 'acc'),
(47, 'SR040', 'JS014', 'Surat Keterangan Perbedaan Identitas', '471.1/040/IX/2023', '1', '2023-09-24', 'acc'),
(48, 'SR041', 'JS013', 'Surat Keterangan Bepergian', '471.1/041/IX/2023', '1', '2023-09-24', 'acc'),
(49, 'SR042', 'JS007', 'Surat Keterangan Rumah Tangga Miskin', '/042/IX/2023', '1', '2023-09-24', 'acc'),
(50, 'SR043', 'JS041', 'Surat Keterangan Cerai', '470/043/IX/2023', '1', '2023-09-24', 'acc'),
(51, 'SR044', 'JS015', 'Surat Keterangan Domisili', '470/044/IX/2023', '1', '2023-09-24', 'acc'),
(52, 'SR045', 'JS031', 'Surat Keterangan Domisili Lembaga', '470/045/IX/2023', '1', '2023-09-24', 'acc'),
(53, 'SR046', 'JS031', 'Surat Keterangan Domisili Lembaga', '/046/IX/2023', '1', '2023-09-24', 'acc'),
(54, 'SR047', 'JS017', 'Surat Keterangan Kelahiran', '472.11/047/IX/2023', '1', '2023-09-24', 'acc'),
(55, 'SR048', 'JS099', 'Surat Keterangan Lain', '470/048/IX/2023', '1', '2023-09-24', 'acc'),
(57, 'SR049', 'JS012', 'Surat Keterangan Kematian', '472.12/049/IX/2023', '1', '2023-09-24', 'acc'),
(58, 'SR050', 'JS011', 'Surat Keterangan Menikah', '472.2/050/IX/2023', '1', '2023-09-24', 'acc'),
(59, 'SR051', 'JS009', 'Surat Keterangan Orang Tua/Wali', '471.1/051/IX/2023', '1', '2023-09-24', 'acc'),
(60, 'SR052', 'JS008', 'Surat Keterangan Penghasilan', '500/052/IX/2023', '1', '2023-09-24', 'acc'),
(61, 'SR053', 'JS018', 'Surat Keterangan Penguburan', '469/053/IX/2023', '1', '2023-09-24', 'acc'),
(62, 'SR054', 'JS020', 'Surat Keterangan Pernah Menikah', '472.2/054/IX/2023', '1', '2023-09-24', 'acc'),
(63, 'SR055', 'JS002', 'Surat Keterangan Tempat Usaha', '475.43/055/IX/2023', '1', '2023-09-24', 'acc'),
(64, 'SR056', 'JS024', 'Surat Keterangan Kepemilikan Tanah', '593/056/IX/2023', '1', '2023-09-24', 'acc'),
(65, 'SR057', 'JS004', 'Surat Keterangan Pengantar Ternak', '500/057/IX/2023', '1', '2023-09-24', 'acc'),
(66, 'SR058', 'JS005', 'Surat Keterangan Tidak Mampu', '401/058/IX/2023', '1', '2023-09-24', 'acc'),
(67, 'SR059', 'JS006', 'Surat Keterangan Keluarga Tidak Mampu', '401/059/IX/2023', '1', '2023-09-24', 'acc'),
(68, 'SR060', 'JS016', 'Surat Pengantar Pindah WNI', '471.2/060/IX/2023', '1', '2023-09-24', 'acc'),
(69, 'SR061', 'JS025', 'Surat Undangan', '005/061/IX/2023', '1', '2023-09-24', 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataundangan`
--

CREATE TABLE `tb_dataundangan` (
  `id` int(5) NOT NULL,
  `kodeu` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nm` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dataundangan`
--

INSERT INTO `tb_dataundangan` (`id`, `kodeu`, `nm`) VALUES
(1, 'SR061', 'Ketua BPD dan Anggota'),
(2, 'SR061', 'Ketua LPM dan Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailsurat`
--

CREATE TABLE `tb_detailsurat` (
  `id` int(4) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `kodejenis` varchar(8) NOT NULL,
  `nmsurat` varchar(100) NOT NULL,
  `no` varchar(70) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `tanggal` date NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `id_ptg` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailsurat`
--

INSERT INTO `tb_detailsurat` (`id`, `kode`, `kodejenis`, `nmsurat`, `no`, `nik`, `nama`, `detail`, `tanggal`, `ttd`, `id_ptg`) VALUES
(1, 'SR001', 'JS022', 'Surat Keterangan Duda / Janda', '472.2/001/IX/2023', '1801080804380001', 'KHOTIM', 'Duda/janda', '2023-09-03', 'ABDURRASYID WADJO, SE', '2'),
(3, 'SR003', 'JS001', 'Surat Keterangan Usaha', '475.43/003/IX/2023', '1801084812830001', 'SUNANI', 'Barber Shop;2018;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan', '2023-09-05', 'ABDURRASYID WADJO, SE', '2'),
(4, 'SR004', 'JS013', 'Surat Keterangan Bepergian', '471.1/004/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'Jakarta Selatan;Mengikuti Bimtek;30 September 2023;Pakaian Ganti Sehari - hari', '2023-09-05', 'ABDURRASYID WADJO, SE', '2'),
(6, 'SR006', 'JS005', 'Surat Keterangan Tidak Mampu', '401/006/IX/2023', '1801230808740004', 'MUHSININ', '1801230808740004;MUHSININ;Mengajukan Bantuan BLT Dana Desa', '2023-09-05', 'ABDURRASYID WADJO, SE', '2'),
(7, 'SR007', 'JS006', 'Surat Keterangan Keluarga Tidak Mampu', '401/007/IX/2023', '1801230808740004', 'MUHSININ', '1801230808740004;MUHSININ;KALIREJO;08/08/1974;Islam;Dusun Sinar Jaya Rt./Rw. 005/001;1801234209800002;SITI AISAH;PEMULIHAN;02/09/1980;Islam;Dusun Mekar Sari Rt./Rw. 005/001', '2023-09-05', 'ABDURRASYID WADJO, SE', '2'),
(8, 'SR008', 'JS008', 'Surat Keterangan Penghasilan', '500/008/IX/2023', '1801232006670001', 'YATIMIN', 'Rp. 5.000.0000;Penjualan Jajanan Pasar', '2023-09-05', 'ABDURRASYID WADJO, SE', ''),
(9, 'SR009', 'JS043', 'Surat Pengantar SKCK', '140/009/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Laki-laki;PEMULIHAN;08/05/2003;Belum bekerja;Dusun Tegal Sari Rt./Rw. 005/002;Melamar Pekerjaan;Ka. POLRES Lampung Selatan;KALIANDA', '2023-09-05', 'ABDURRASYID WADJO, SE', '1'),
(10, 'SR010', 'JS042', 'Surat Keterangan Pelepasan Tanah', '140/010/IX/2023', '1801236203730001', 'SITI KOTIJAH', '1801236203730001;SITI KOTIJAH;Perempuan;JAWA TENGAH;22/03/1973;Dusun Sinar Jaya Rt./Rw. 003/001;1801230808740004;MUHSININ;Laki-laki;KALIREJO;08/08/1974;Dusun Sinar Jaya Rt./Rw. 005/002;7500;Rt. 005 Rw. 001 Dusun Sinar Jaya;78000000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;DULKARIM;YATIMIN;MUJIONO', '2023-09-05', 'ABDURRASYID WADJO, SE', '1'),
(11, 'SR011', 'JS041', 'Surat Keterangan Cerai', '470/011/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;Laki-laki;Pamulihan;19/07/1993;Islam;Dusun Sinar Jaya Rt/Rw. 002/001;Lampung;Lampung Selatan;Way Asalan;Dagelan;1801234209800002;SITI AISAH;Perempuan;Karang Pucung;02/09/1980;Islam;Dusun Sinar Jaya RT/RW. 001/001;Lampung;Lampung Selatan;Way Asalan;Dagelan;12 Maret 2023', '2023-09-05', 'ABDURRASYID WADJO, SE', '1'),
(14, 'SR012', 'JS045', 'Surat Izin Ganguan', '140/012/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Dusun Tegal Sari Rt./Rw. 005/002;Peternakan Ayam Potong;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan;25', '2023-09-05', 'ABDURRASYID WADJO, SE', '1'),
(15, 'SR013', 'JS044', 'Surat Pengantar Permohonan IMB', '1801082909730001', '1801082909730001', 'SARDI', '1801082909730001;SARDI;PETANI/PEKEBUN;Dusun Sinar Jaya Rt./Rw. 003/001;Renovasi;Hunian;1;6x9 M2;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan;Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Kabupaten Fakfak;KALIANDA', '2023-09-05', 'ABDURRASYID WADJO, SE', '1'),
(19, 'SR014', 'JS023', 'Surat Keterangan Ahli Waris', '470/014/IX/2023', '1801081509510001', 'SURIPTO', '1801081509510001;SURIPTO;2023-09-11;RS. BOB Bajar Lampung Selatan;Jl. Blok Pasar Sinar Banten No. 12 Desa Dagelan;PONIJAH;1', '2023-09-24', 'ABDURRASYID, SE', '1'),
(20, 'SR015', 'JS032', 'Permohonan KTP', '470/015/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'B', '2023-09-24', 'ABDURRASYID, SE', '1'),
(21, 'SR016', 'JS036', 'Pernyataan Kesepakatan Gadai Tanah', '-', '1801236203730001', 'SITI KOTIJAH', '1801236203730001;SITI KOTIJAH;Perempuan;JAWA TENGAH;22/03/1973;Dusun Sinar Jaya Rt./Rw. 003/001;1801230808740004;MUHSININ;Laki-laki;KALIREJO;08/08/1974;Dusun Sinar Jaya Rt./Rw. 005/002;10500;Rt. 005 Rw. 001 Dusun Sinar Jaya;15000000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;DULKARIM', '2023-09-24', 'ABDURRASYID, SE', '1'),
(22, 'SR017', 'JS028', 'Surat Himbauan', '140/017/IX/2023', '-', 'Pengaktifan Kegiatan Poskamling', 'Pengaktifan Kegiatan Poskamling;1 (satu) bundel;Ketu RT Se-Kelurahan Dagelan;TEMPAT;Mengingat semakin maraknya kasus pencurian di Kelurahan Dagelan, maka dihimbau kepada seluruh Ketua Rt di Kelurahan Dagelan agar kiranya dapat mengaktifkan kembali kegiatan gotong royong dilingkungan masing2', '2023-09-24', 'ABDURRASYID, SE', '1'),
(23, 'SR018', 'JS028', 'Surat Himbauan', '/018/IX/2023', '-', 'Pengaktifan Kegiatan Poskamling', 'Pengaktifan Kegiatan Poskamling;1 (satu) bundel;Ketu RT Se-Kelurahan Dagelan;TEMPAT;Mengingat semakin maraknya kasus pencurian di Kelurahan Dagelan, maka dihimbau kepada seluruh Ketua Rt di Kelurahan Dagelan agar kiranya dapat mengaktifkan kembali kegiatan Ronda dilingkungan masing2', '2023-09-24', 'ABDURRASYID, SE', '1'),
(24, 'SR019', 'JS030', 'Surat Jawaban', '140/019/IX/2023', '-', '-', 'Laporan Pencapaian Pembayaran Pajak Bumi dan Bangunan Tahun 2023;1 (satu) bundel;Surat Camat Way Sulan No. 15 tanggal 12 Juli 2023, Perihal pencapaian Pembayaran Pajak PBB tahun 2023;Camat Way Asalan;TEMPAT;Pencapaian Pembayaran Pajak Bumi dan Bangunan Kelurahan Dagelan sudah mencapai 80%', '2023-09-24', 'ABDURRASYID, SE', '1'),
(25, 'SR020', 'JS035', 'Pernyataan Kesepakatan Jual Beli Tanah', '-', '1801080707700006', 'YOYOK', '1801080707700006;YOYOK;Laki-laki;KENDAL;07/07/1970;Dusun Sinar Jaya Rt./Rw. 005/001;1801236512060002;SITI NURHAYATI;Perempuan;PEMULIHAN;25/12/2006;Dusun Sinar Jaya Rt./Rw. 004/001;7500;Dusun Sinar Jaya;75000000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;DULKARIM', '2023-09-24', 'ABDURRASYID, SE', '1'),
(26, 'SR021', 'JS029', 'Surat Perintah Perjalan Dinas', '141/021/IX/2023', '1973082620050210', 'ABDURRASYID, SE', 'ABDURRASYID, SE;197308262005021004;Pembina;Kepala Kelurahan Dagelan;SAMANI;19258797245587799;Penata IIa;Sekretaris Kelurahan;Mengikuti Bimtek Keuangan Desa;Hotel Horison Bandar Lampung;2023-09-26;2023-09-27;C;150000;250000;500000;750000;200000', '2023-09-24', 'ABDURRASYID, SE', '1'),
(27, 'SR022', 'JS039', 'Surat Tugas', '140/022/IX/2023', '1973082620050210', 'ABDURRASYID, SE', 'ABDURRASYID, SE|197308262005021004|Pembina|Kepala Kelurahan Dagelan|Melaksanakan Kegiatan Sosialisasi Bahaya Narkoba|a. bahwa pengedaran narkoba semakin marak;b. bahwa perlu pengetahuan lebih lanjut mengenai bahaya narkoba|1. Undang - undang nomor 12 tentang Narkoba; 2. Peraturan Pemerintah nomor 21 tentang pencegahan pengedaran narkoba|140/10/VIII/2023|Tim Pelaksana Sosialisasi Bahaya Narkoba|1. Ketua DK (Dewan Kelurahan) Dagelan;2. Arsip', '2023-09-24', 'ABDURRASYID, SE', '1'),
(28, 'SR023', 'JS019', 'Surat Pengantar Nikah', '472.2/023/IX/2023', '1801232603050001', 'MUHAMMAD DARMA SAPUTRA', '1801232603050001;MUHAMMAD DARMA SAPUTRA;SARDI;Laki-laki;PAMULIHAN;26/03/2005;Indonesia;Islam;Belum/Tidak bekerja;Pamulihan;Way Sulan;Lampung Selatan;Lampung;Dusun Sinar Jaya Rt./Rw. 003/001;Belum Kawin;Numpang Nikah;1801236512060002;SITI NURHAYATI;TURIMAN;Perempuan;PEMULIHAN;25/12/2006;Indonesia;Islam;Belum/Tidak bekerja;Pamulihan;Way Sulan;Lampung Selatan;Lampung;Dusun Sinar Jaya Rt./Rw. 004/001;Belum Kawin;Tidak Numpang;1801233010710001;TURIMAN;TURIMIN;Laki-laki;PADANG RATU;30/10/1971;Indonesia;Islam;Petani;Pamulihan;Way Sulan;Lampung Selatan;Lampung;Dusun Sinar Jaya Rt./Rw. 004/001;Kawin;1801236511790002;SITI MUSYAROFAH;PARNO;Perempuan;PRINGSEWEU;25/11/1979;Indonesia;Islam;Mengurus rumah tangga;Pamulihan;Way Sulan;Lampung Selatan;Lampung;Dusun Sinar Jaya Rt./Rw. 004/001;Kawin;Senin;2023-10-02;08:14;Kediaman Mempelai Wanita;Uang Rp. 1.000.000.000', '2023-09-24', 'ABDURRASYID, SE', '1'),
(29, 'SR024', 'JS038', 'Surat Keterangan Kematian Suami/Istri', '472.12/024/IX/2023', '1801084812830001', 'SUNANI', '1801084812830001;SUNANI;BASOR;Perempuan;LAMPUNG SELATAN;08/12/1983;Indonesia;Islam;Dusun Sinar Jaya Rt./Rw. 005/001;1801080707700006;YOYOK;PAIJAN;Laki-laki;KENDAL;07/07/1970;Indonesia;Islam;Dusun Sinar Jaya Rt./Rw. 005/001;Suami;Sakit Panas;Senin;2023-09-11;07:50;Rumah Sakit Airan Raya', '2023-09-24', 'ABDURRASYID, SE', '1'),
(32, 'SR025', 'JS044', 'Surat Pengantar Permohonan IMB', '1801080107030047', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Wiraswasta;Dusun Tegal Sari Rt./Rw. 005/002;Bangun baru;Hunian;1;6x9 M2;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan;Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Kabupaten Lampung Selatan;KALIANDA', '2023-09-24', 'ABDURRASYID, SE', '1'),
(33, 'SR026', 'JS044', 'Surat Pengantar Permohonan IMB', '1801230808740004', '1801230808740004', 'MUHSININ', '1801230808740004;MUHSININ;Petani/pekebun;Dusun Sinar Jaya Rt./Rw. 005/002;Bangun baru;Hunian;2;10x12M2;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan;Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Kabupaten Lampung Selatan;KALIANDA', '2023-09-24', 'ABDURRASYID, SE', '1'),
(34, 'SR027', 'JS042', 'Surat Keterangan Pelepasan Tanah', '140/027/IX/2023', '1801236203730001', 'SITI KOTIJAH', '1801236203730001;SITI KOTIJAH;Perempuan;JAWA TENGAH;22/03/1973;Dusun Sinar Jaya Rt./Rw. 003/001;1801230808740004;MUHSININ;Laki-laki;KALIREJO;08/08/1974;Dusun Sinar Jaya Rt./Rw. 005/002;1200;Dusun Sinar Jaya Rt. 005/001;65000000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;DULKARIM;YATIMIN;MUJIONO', '2023-09-24', 'ABDURRASYID, SE', '1'),
(35, 'SR028', 'JS027', 'Surat Pemberitahuan', '140/028/IX/2023', '-', 'Jadwal Pembagian BLT bulan Juli 2023', 'Jadwal Pembagian BLT bulan Juli 2023;1 (satu) bundel;Ketu RT Se-Kelurahan Dagelan;TEMPAT;Meneruskan Surat Camat Way Asalan Nomor 120, Tanggal 10 Juli 2023, Perihal Jadwal Pembagian BLT Dana Desa, perlu kami sampaikan bahwa Jadwal Pembagian BLT Dana Desa diralat sesuai Jadwal terlampir.', '2023-09-24', 'ABDURRASYID, SE', '1'),
(36, 'SR029', 'JS026', 'Surat Pengantar', '140/029/IX/2023', '-', 'Laporan Penduduk bulan Juli 2023', 'Laporan Penduduk bulan Juli 2023;1 (satu) bundel;Surat Camat Way Asalan nomor 123, tanggal 23 Juli 2023, Perihal Laporan Kependudukan bulan Juli 2023;Camat Way Asalan;Karang Pocong', '2023-09-24', 'ABDURRASYID, SE', '1'),
(37, 'SR030', 'JS040', 'Permohonan Pencatatan Ahli Waris', '470/030/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;470/014/IX/2023;SR014', '2023-09-24', 'ABDURRASYID, SE', '1'),
(38, 'SR031', 'JS098', 'Surat Pernyataan Status Perkawinan', '1801231907930003', '1801231907930003', 'AHMAD FAUZI RIDWAN', '-', '2023-09-24', 'ABDURRASYID, SE', '1'),
(39, 'SR032', 'JS034', 'Pernyataan Kesepakatan Sewa Tanah', '-', '1801234508600001', 'ANIYAH', '1801234508600001;ANIYAH;Perempuan;Pringsewu;05/08/1960;Dusun Sinar Jaya Rt./Rw. 003/001;1801230808740004;MUHSININ;Laki-laki;Kalirejo;08/08/1974;Dusun Sinar Jaya Rt./Rw. 005/002;5000;Dusun Sinar Jaya;12;15000000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;DULKARIM', '2023-09-24', 'ABDURRASYID, SE', '1'),
(40, 'SR033', 'JS045', 'Surat Izin Ganguan', '140/033/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Dusun Tegal Sari Rt./Rw. 005/002;Peternakan Ayam Potong;Dusun Sinar Jaya Rt. 002 Rw. 001 Desa Dagelan Kec. Way Asalan, Lampung Selatan;15', '2023-09-24', 'ABDURRASYID, SE', '1'),
(41, 'SR034', 'JS021', 'Surat Keterangan Belum Pernah Menikah', '472.2/034/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ', '2023-09-24', 'ABDURRASYID, SE', '1'),
(42, 'SR035', 'JS043', 'Surat Pengantar SKCK', '140/035/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;Laki-laki;PEMULIHAN;19/07/1993;Wiraswasta;Dusun Tegal Sari Rt./Rw. 005/002;Melamar Pekerjaan;Ka. POLRES Lampung Selatan;TEMPAT', '2023-09-24', 'ABDURRASYID, SE', '1'),
(43, 'SR036', 'JS037', 'Surat Keterangan Kelakuan Baik', '470/036/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;Laki-laki;PEMULIHAN;19/07/1993;Islam;Dusun Tegal Sari Rt./Rw. 005/002;Mengurus SKCK', '2023-09-24', 'ABDURRASYID, SE', '1'),
(44, 'SR037', 'JS033', 'Pernyataan Penguasaan Fisik Bidang Tanah (Sporadik)', '1801080804380001', '1801080804380001', 'KHOTIM', '1801080804380001;KHOTIM;1250;Dusun Sinar Jaya;RT. 004/Rw. 001;Wagom;Lampung Selatan;142;Hak Milik;Perkebunan Kelapa;Pembelian dari Bpk. ILHAM;14 Maret 2000;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi;MURJAN;65;Petani/Pekebun;Dusun Sinar Jaya RT/RW. 004/001;DULKARIM;56;Petani/Pekebun;Dusun Sinar Jaya RT/RW. 002/001', '2023-09-24', 'ABDURRASYID, SE', '1'),
(45, 'SR038', 'JS010', 'Surat Keterangan Anak', '471.1/038/IX/2023', '1801081509510001', 'SURIPTO', '1801081509510001;SURIPTO;Laki-laki;CILACAP;15/09/1951;Islam;Dusun Sinar Jaya Rt./Rw. 001/003;1801234508600001;ANIYAH;Perempuan;PRINGSEWU;05/08/1960;Islam;Dusun Sinar Jaya Rt./Rw. 003/001;1801236512060002;SITI NURHAYATI;Perempuan;PEMULIHAN;25/12/2006;Islam;Dusun Sinar Jaya Rt./Rw. 004/001', '2023-09-24', 'ABDURRASYID, SE', '1'),
(46, 'SR039', 'JS003', 'Surat Keterangan Pengantar Barang', '500/039/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'BAMBU ;Lanjaran;2000 Ikat;AHMAD FAUZI RIDWAN;Lampung Selatan;Bandung', '2023-09-24', 'ABDURRASYID, SE', '1'),
(47, 'SR040', 'JS014', 'Surat Keterangan Perbedaan Identitas', '471.1/040/IX/2023', '1801236203730001', 'SITI KOTIJAH', '1801236203730001;SITI KOTIJAH;Perempuan;Jawa Tengah;22/03/1973;Islam;Dusun Sinar Jaya Rt./Rw. 003/001;KTP;1801236203730001;SITI KOTIJAH;Perempuan;Jawa Barat;22/03/1973;Islam;Dusun Sinar Jaya Rt./Rw. 003/001;KARTU KELUARGA', '2023-09-24', 'ABDURRASYID, SE', '1'),
(48, 'SR041', 'JS013', 'Surat Keterangan Bepergian', '471.1/041/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'Jakarta Pusat;Mengikuti Bimtek;30 Oktober 2023;Pakaian Ganti Sehari - hari', '2023-09-24', 'ABDURRASYID, SE', '1'),
(49, 'SR042', 'JS007', 'Surat Keterangan Rumah Tangga Miskin', '170/042/IX/2023', '1801081509510001', 'SURIPTO', '1801081509510001;SURIPTO;CILACAP;15/09/1951;Islam;Dusun Sinar Jaya Rt./Rw. 001/003;1801236512060002;SITI NURHAYATI;PEMULIHAN;25/12/2006;Islam;Dusun Sinar Jaya Rt./Rw. 004/001', '2023-09-24', 'ABDURRASYID, SE', '1'),
(50, 'SR043', 'JS041', 'Surat Keterangan Cerai', '470/043/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;Laki-laki;PEMULIHAN;19/07/1993;Islam;Dusun Sinar Jaya RT/RW. 001/005;Lampung;Lampung Selatan;Way Asalan;Dagelan;1801236512060002;SITI NURHAYATI;Perempuan;PEMULIHAN;25/12/2006;Islam;Dusun Sinar Jaya RT/RW. 001/004;Lampung;Lampung Selatan;Way Asalan;Dagelan;12 Maret 2022', '2023-09-24', 'ABDURRASYID, SE', '1'),
(51, 'SR044', 'JS015', 'Surat Keterangan Domisili', '470/044/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;14 Maret 1993;Melamar pekerjaan di PT. Astra Motor', '2023-09-24', 'ABDURRASYID, SE', '1'),
(52, 'SR045', 'JS031', 'Surat Keterangan Domisili Lembaga', '470/045/IX/2023', '-', 'Kyai. SUKADI, S.Sos.I', 'PONPES MINHAJUT THULLAB;Pendidikan Agama;Kyai. SUKADI, S.Sos.I;Jl. Blok Pasar Sinar Banten No. 12 Desa Dagelan;14 Maret 2000', '2023-09-24', 'ABDURRASYID, SE', '1'),
(53, 'SR046', 'JS031', 'Surat Keterangan Domisili Lembaga', '/046/IX/2023', '-', 'Kyai. SUKADI, S.Sos.I', 'PONPES MINHAJUT THULLAB;Pendidikan Agama;Kyai. SUKADI, S.Sos.I;Jl. Blok Pasar Sinar Banten No. 12 Desa Dagelan;14 Maret 1995', '2023-09-24', 'ABDURRASYID, SE', '1'),
(54, 'SR047', 'JS017', 'Surat Keterangan Kelahiran', '472.11/047/IX/2023', '1801080804380001', 'KHOTIM', '1801080804380001;KHOTIM;Laki-laki;Kebumen;08/04/1938;Islam;Dusun Tegal Sari Rt./Rw. 005/002;1801236511790002;SITI MUSYAROFAH;Perempuan;Pringsewu;25/11/1979;Islam;Dusun Sinar Jaya Rt./Rw. 004/001;1801236203730001;SITI KOTIJAH;Perempuan;Jawa Tengah;22/03/1973;Islam;Dusun Sinar Jaya Rt./Rw. 003/001;2', '2023-09-24', 'ABDURRASYID, SE', '1'),
(55, 'SR048', 'JS099', 'Surat Keterangan Lain', '470/048/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'SURAT KETERANGAN GANTENG DARI LAHIR;1801231907930003;AHMAD FAUZI RIDWAN;Laki-laki;PEMULIHAN;19/07/1993;Islam;Dusun Tegal Sari Rt./Rw. 005/002;Warga yang tersebut diatas adalah benar warga Desa Dagelan yang telahir dalam keadaan ganthenxxx', '2023-09-24', 'ABDURRASYID, SE', '1'),
(57, 'SR049', 'JS012', 'Surat Keterangan Kematian', '472.12/049/IX/2023', '1801080707700006', 'YOYOK', '1801080804380001;KHOTIM;KHATAM;Laki-laki;Kebumen;08/04/1938;Indonesia;Islam;Petani/Pekebun;Dusun Tegal Sari Rt./Rw. 005/002;1801080707700006;YOYOK;Laki-laki;KENDAL;07/07/1970;Islam;Petani/pekebun;Dusun Sinar Jaya Rt./Rw. 005/001;Anak;Sakit Tua;Senin;2023-09-11;19:50;Rumah Sakit Airan Raya', '2023-09-24', 'ABDURRASYID, SE', '1'),
(58, 'SR050', 'JS011', 'Surat Keterangan Menikah', '472.2/050/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Laki-laki;Pamulihan;08/05/2003;Islam;Dusun Tegal Sari Rt./Rw. 005/002;Lampung;Lampung Selatan;Way Sulan;Pamulihan;1801234209800002;SITI AISAH;Perempuan;Pamulihan;02/09/1980;Islam;Dusun Mekar Sari Rt./Rw. 005/002;Lampung;Lampung Selatan;Way Sulan;Pamulihan;12 Maret 2023;Menikah Siri;Uang Rp. 12.000.000.000;MUHSININ;MURJAN;Buku Nikah sedang dalam proses di Kantor Urusan Agama', '2023-09-24', 'ABDURRASYID, SE', '1'),
(59, 'SR051', 'JS009', 'Surat Keterangan Orang Tua/Wali', '471.1/051/IX/2023', '1801081509510001', 'SURIPTO', '1801081509510001;SURIPTO;Laki-laki;Cilacap;15/09/1951;Islam;Dusun Sinar Jaya Rt./Rw. 001/003;1801236203730001;SITI KOTIJAH;Perempuan;Jawa Tengah;22/03/1973;Islam;Dusun Sinar Jaya Rt./Rw. 003/005;1801236512060002;SITI NURHAYATI;Perempuan;PEMULIHAN;25/12/2006;Islam;Dusun Sinar Jaya Rt./Rw. 004/005', '2023-09-24', 'ABDURRASYID, SE', '1'),
(60, 'SR052', 'JS008', 'Surat Keterangan Penghasilan', '500/052/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', 'Rp. 5.000.000;Dari Pekerjaan sebagai Petani Melon', '2023-09-24', 'ABDURRASYID, SE', '1'),
(61, 'SR053', 'JS018', 'Surat Keterangan Penguburan', '469/053/IX/2023', '1801080804380001', 'KHOTIM', '1801080804380001;KHOTIM;Laki-laki;KEBUMEN;08/04/1938;Islam;Dusun Tegal Sari Rt./Rw. 005/002;30 Agustus 2023;Kenanga Dusun 1 Sinar Jaya', '2023-09-24', 'ABDURRASYID, SE', '1'),
(62, 'SR054', 'JS020', 'Surat Keterangan Pernah Menikah', '472.2/054/IX/2023', '1801080107030047', 'MUHAMAD ABDUL AZIZ', '1801080107030047;MUHAMAD ABDUL AZIZ;Laki-laki;PEMULIHAN;08/05/2003;Indonesia;Islam;Wiraswasta;Dusun Tegal Sari Rt./Rw. 005/002;Lampung;Lampung Selatan;Way Sulan;Pamulihan;1801236512060002;SITI NURHAYATI;Perempuan;PEMULIHAN;25/12/2006;Indonesia;Islam;Belum/Tidak Bekerja;Dusun Sinar Jaya Rt./Rw. 004/001;Lampung;Lampung Selatan;Way Sulan;Pamulihan;2023-09-04;Siri', '2023-09-24', 'ABDURRASYID, SE', '1'),
(63, 'SR055', 'JS002', 'Surat Keterangan Tempat Usaha', '475.43/055/IX/2023', '1801800707000003', 'AHMAD FAISAL', 'Aruna Laundry ;Rumah Tangga;2020;AHMAD FAISAL;2;SIUP dan SITU;Jl. Blok Pasar Sinar Banten No. 12 Desa Dagelan', '2023-09-24', 'ABDURRASYID, SE', '1'),
(64, 'SR056', 'JS024', 'Surat Keterangan Kepemilikan Tanah', '593/056/IX/2023', '1801080804380001', 'KHOTIM', '1801080804380001;KHOTIM;2750;Dusun Sinar Jaya Rt. 005/001;Pembelian dari Bpk. ILHAM;Ahmad Muzani;Ahmad Dullah;Jalan Desa;Ahmad Suryadi', '2023-09-24', 'ABDURRASYID, SE', '1'),
(65, 'SR057', 'JS004', 'Surat Keterangan Pengantar Ternak', '500/057/IX/2023', '1801081509510001', 'SURIPTO', 'SAPI;Simental;Kulit Berwarna Hitam dan Putih, Tanduk 3cm;SURIPTO;Lampung Selatan;Palembang', '2023-09-24', 'ABDURRASYID, SE', '1'),
(66, 'SR058', 'JS005', 'Surat Keterangan Tidak Mampu', '401/058/IX/2023', '1801080804380001', 'KHOTIM', '1801080804380001;KHOTIM;Mengajukan Bantuan BLT', '2023-09-24', 'ABDURRASYID, SE', '1'),
(67, 'SR059', 'JS006', 'Surat Keterangan Keluarga Tidak Mampu', '401/059/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;PEMULIHAN;19/07/1993;Islam;Dusun Tegal Sari Rt./Rw. 005/002;1801236512060002;SITI NURHAYATI;PEMULIHAN;25/12/2006;Islam;Dusun Sinar Jaya Rt./Rw. 004/001', '2023-09-24', 'ABDURRASYID, SE', '1'),
(68, 'SR060', 'JS016', 'Surat Pengantar Pindah WNI', '471.2/060/IX/2023', '1801231907930003', 'AHMAD FAUZI RIDWAN', '1801231907930003;AHMAD FAUZI RIDWAN;Jakarta Selatan;2', '2023-09-24', 'ABDURRASYID, SE', '1'),
(69, 'SR061', 'JS025', 'Surat Undangan', '005/061/IX/2023', '-', 'Musyawarah Penyusunan RKPDesa Tahun 2024', 'Musyawarah Penyusunan RKPDesa Tahun 2024;Selasa;2023-09-26;20:05;Balai Desa Dagelan', '2023-09-24', 'ABDURRASYID, SE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(4) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `des` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `tgl`, `nama`, `foto`, `des`) VALUES
(1, '2023-09-05 16:21:47', 'Penyerahan Insentif Kader PKK', '971938IMG-20211208-WA0017.jpg', 'Tahun 2020'),
(2, '2023-09-05 15:59:40', 'Penyerahan Insentif Linmas', '24871750IMG-20211209-WA0027.jpg', 'Tahun 2020'),
(3, '2023-09-05 16:18:52', 'Penyerahan Insentif Kader PKK', '51749565IMG-20210813-WA0001.jpg', 'Tahun 2020'),
(4, '2023-09-05 16:00:45', 'Musyawarah persiapan Pilkades', '19876089IMG-20210818-WA0011.jpg', 'Tahun 2021'),
(5, '2023-09-05 16:08:39', 'Pembangunan Jembatan Desa', '5814262915732365_124438424722631_3922842034223915037_o.jpg', 'Kegiatan Pembangunan Jembatan ini dilakukan pada Tahun 2016'),
(6, '2023-09-07 08:41:48', 'Pembangunan Jalan Hotmix ', '2965025073315_315674448932360_309135519350718042_o.jpg', 'Tahun 2016'),
(7, '2023-09-05 16:02:19', 'Pembangunan Jalan Lapen', '3676748615775068_124433681389772_8596336821718244367_o.jpg', 'Pembangunan Jalan Lapen Dusun III Mekar Sari Tahun 2017'),
(8, '2023-09-06 13:06:37', 'Struktur Pembesian Jembatan ', '2584515732645_124436554722818_3033190124146440319_o.jpg', 'Pembangunan  jembatan tahun 2016'),
(9, '2023-09-07 06:33:42', '', '546904bg1.jpg', 'Terwujudnya Desa yang Maju, Aman, Damai dan Sejahtera');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenissurat`
--

CREATE TABLE `tb_jenissurat` (
  `id` int(4) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `kode_klasi` varchar(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nmsurat` varchar(100) NOT NULL,
  `persyaratan` text NOT NULL,
  `page` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenissurat`
--

INSERT INTO `tb_jenissurat` (`id`, `kode`, `kode_klasi`, `jenis`, `kategori`, `nmsurat`, `persyaratan`, `page`, `keterangan`) VALUES
(1, 'JS001', '475.43', 'Keterangan', 'Umum', 'Surat Keterangan Usaha', '', 'suketusaha', ''),
(2, 'JS002', '475.43', 'Keterangan', 'Umum', 'Surat Keterangan Tempat Usaha', '', 'sukettmpusaha', ''),
(3, 'JS003', '500', 'Keterangan', 'Umum', 'Surat Keterangan Pengantar Barang', '', 'suketpbarang', ''),
(4, 'JS004', '500', 'Keterangan', 'Umum', 'Surat Keterangan Pengantar Ternak', '', 'suketpternak', ''),
(5, 'JS005', '401', 'Keterangan', 'Umum', 'Surat Keterangan Tidak Mampu', 'Surat pengantar dari RT;Foto copy KTP/KK 1 rangkap', 'sukettmampuv1', ''),
(6, 'JS006', '401', 'Keterangan', 'Umum', 'Surat Keterangan Keluarga Tidak Mampu', 'Surat pengantar dari RT;Foto copy KTP/KK 1 rangkap', 'sukettmampuv2', ''),
(7, 'JS007', '401', 'Keterangan', 'Umum', 'Surat Keterangan Rumah Tangga Miskin', '', 'suketrtm', ''),
(8, 'JS008', '500', 'Keterangan', 'Umum', 'Surat Keterangan Penghasilan', '', 'suketpenghasilan', ''),
(9, 'JS009', '471.1', 'Keterangan', 'Umum', 'Surat Keterangan Orang Tua/Wali', '', 'suketortu', ''),
(10, 'JS010', '471.1', 'Keterangan', 'Umum', 'Surat Keterangan Anak', '', 'suketanak', ''),
(11, 'JS011', '472.2', 'Keterangan', 'Pernikahan', 'Surat Keterangan Menikah', 'Surat pengantar dari RT;Foto copy KK ke-dua calon mempelai 1 rangkap;Foto copy KTP kedua calon mempelai 1 rangkap;Foto warna kedua calon mempelai ukuran 4x3 cm, 1 rangkap ', 'suketmenikah', ''),
(12, 'JS012', '472.12', 'Keterangan', 'Umum', 'Surat Keterangan Kematian', 'Surat pengantar dari RT;Foto copy KK 1 rangkap;Foto copy KTP 1 rangkap;Keterangan kematian dari rumah sakit', 'suketkematian', ''),
(13, 'JS013', '471.1', 'Keterangan', 'Umum', 'Surat Keterangan Bepergian', '', 'suketbepergian', ''),
(14, 'JS014', '471.1', 'Keterangan', 'Kependudukan', 'Surat Keterangan Perbedaan Identitas', '', 'suketbedaid', ''),
(15, 'JS015', '470', 'Keterangan', 'Kependudukan', 'Surat Keterangan Domisili', 'Surat pengantar dari RT;Foto copy KTP/KK 1 rangkap', 'suketdomisili', ''),
(16, 'JS016', '471.2', 'Pengantar', 'Kependudukan', 'Surat Pengantar Pindah WNI', 'Surat pengantar dari RT;Foto copy KK 1 rangkap;Foto copy KTP 1 rangkap;Alamat lengkap daerah tujuan', 'sutarpindah', ''),
(17, 'JS017', '472.11', 'Keterangan', 'Kependudukan', 'Surat Keterangan Kelahiran', 'Surat pengantar dari RT;Foto copy KTP (ayah & ibu) 1 rangkap;Foto copy KK 1 rangkap;Foto copy keterangan kelahiran dari RS 1 rangkap ', 'suketkelahiran', ''),
(18, 'JS018', '469', 'Keterangan', 'Kependudukan', 'Surat Keterangan Penguburan', '', 'suketpenguburan', ''),
(19, 'JS019', '472.2', 'Pengantar', 'Pernikahan', 'Surat Pengantar Nikah', 'Surat pengantar dari RT;Foto copy KK ke-dua calon mempelai 1 rangkap;Foto copy KTP kedua calon mempelai 1 rangkap;Foto warna kedua calon mempelai ukuran 4x3 cm, 1 rangkap ', 'n1-n6', ''),
(20, 'JS020', '472.2', 'Keterangan', 'Pernikahan', 'Surat Keterangan Pernah Menikah', 'Surat pengantar dari RT;Foto copy KK ke-dua calon mempelai 1 rangkap;Foto copy KTP kedua calon mempelai 1 rangkap;Foto warna kedua calon mempelai ukuran 4x3 cm, 1 rangkap ', 'pernahnikah', ''),
(21, 'JS021', '472.2', 'Keterangan', 'Pernikahan', 'Surat Keterangan Belum Pernah Menikah', 'Surat pengantar dari RT;Foto copy KTP/KK 1 rangkap', 'belumnikah', ''),
(22, 'JS022', '472.2', 'Keterangan', 'Pernikahan', 'Surat Keterangan Duda / Janda', '', 'dudajanda', ''),
(23, 'JS023', '470', 'Keterangan', 'Umum', 'Surat Keterangan Ahli Waris', 'Surat pengantar dari RT;Foto copy KK 1 rangkap;Foto copy KTP (seluruh angota keluarga) 1 rangkap;Keterangan kematian dari rumah sakit;Foto copy Akta kematian', 'suketaw', ''),
(24, 'JS024', '593', 'Keterangan', 'Pertanahan', 'Surat Keterangan Kepemilikan Tanah', '', 'sukettanah', ''),
(25, 'JS025', '005', 'Undangan', 'Tata Usaha', 'Surat Undangan', '', 'undangan', ''),
(26, 'JS026', '140', 'Pengantar', 'Tata Usaha', 'Surat Pengantar', '', 'pengantar', ''),
(27, 'JS027', '140', 'Pemberitahuan', 'Tata Usaha', 'Surat Pemberitahuan', '', 'pemberitahuan', ''),
(28, 'JS028', '140', 'Himbauan', 'Tata Usaha', 'Surat Himbauan', '', 'himbauan', ''),
(29, 'JS029', '141', 'Perjalan Dinas', 'Tata Usaha', 'Surat Perintah Perjalan Dinas', '', 'pdinas', ''),
(30, 'JS030', '140', 'Jawaban', 'Tata Usaha', 'Surat Jawaban', '', 'jawaban', ''),
(31, 'JS031', '470', 'Keterangan', 'Umum', 'Surat Keterangan Domisili Lembaga', 'Surat pengantar dari RT;Foto copy Akta notaris 1 rangkap (PT/CV);Foto copy KK 1 rangkap;Foto copy suami & istri 1 rangkap;Foto lokasi tempat usaha 1 rangkap', 'suketdomisililbg', ''),
(32, 'JS032', '470', 'Permohonan', 'Kependudukan', 'Permohonan KTP', '', 'f121', ''),
(33, 'JS033', '470', 'Pernyataan', 'Pertanahan', 'Pernyataan Penguasaan Fisik Bidang Tanah (Sporadik)', '', 'sporadik', ''),
(34, 'JS034', '470', 'Pernyataan', 'Pertanahan', 'Pernyataan Kesepakatan Sewa Tanah', '', 'sewatanah', ''),
(35, 'JS035', '470', 'Pernyataan', 'Pertanahan', 'Pernyataan Kesepakatan Jual Beli Tanah', '', 'jualbelitanah', ''),
(36, 'JS036', '470', 'Pernyataan', 'Pertanahan', 'Pernyataan Kesepakatan Gadai Tanah', '', 'gadai', ''),
(37, 'JS037', '470', 'Keterangan', 'Umum', 'Surat Keterangan Kelakuan Baik', '', 'skkb', ''),
(38, 'JS038', '472.12', 'Keterangan', 'Pernikahan', 'Surat Keterangan Kematian Suami/Istri', '', 'n6', ''),
(39, 'JS039', '140', 'Surat Tugas', 'Tata usaha', 'Surat Tugas', '', 'tugas', ''),
(40, 'JS040', '470', 'Permohonan', 'Umum', 'Permohonan Pencatatan Ahli Waris', '', 'permohonanaw', ''),
(41, 'JS041', '470', 'Keterangan', 'Pernikahan', 'Surat Keterangan Cerai', '', 'suketcerai', ''),
(42, 'JS042', '140', 'Keterangan', 'Pertanahan', 'Surat Keterangan Pelepasan Tanah', '', 'pelepasantanah', ''),
(43, 'JS043', '140', 'Pengantar', 'Umum', 'Surat Pengantar SKCK', '', 'skck', ''),
(44, 'JS044', '140', 'Pengantar', 'Umum', 'Surat Pengantar Permohonan IMB', '', 'simb', ''),
(45, 'JS045', '140', 'Izin', 'Umum', 'Surat Izin Ganguan', '', 'sig', ''),
(46, 'JS046', '140', 'Pengantar', 'Lainnya', 'Instrument Assesment', '', 'assesment', ''),
(98, 'JS098', '000', 'Pernyataan', 'Pernikahan', 'Surat Pernyataan Status Perkawinan', '', 'pstatus', ''),
(99, 'JS099', '470', 'Keterangan', 'Lainnya', 'Surat Keterangan Lain', '', 'suketlain2', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(4) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Politik'),
(2, 'Ekonomi'),
(3, 'Pariwisata'),
(4, 'Pendidikan'),
(5, 'Pembangunan'),
(6, 'Hiburan'),
(7, 'Teknologi'),
(8, 'Software'),
(9, 'Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id` int(4) NOT NULL,
  `kodekecamatan` varchar(4) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `nama_camat` varchar(100) NOT NULL,
  `nip_camat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id`, `kodekecamatan`, `kecamatan`, `nama_camat`, `nip_camat`) VALUES
(1, '23', 'Way Asalan', 'BADRUZ ZAMAN, SE', '197708272004021005');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id` int(4) NOT NULL,
  `kodekelurahan` varchar(4) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kodekec` varchar(6) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kodekab` varchar(4) NOT NULL,
  `kab` varchar(100) NOT NULL,
  `kodeprov` varchar(4) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kantor` varchar(150) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `lurah` varchar(100) NOT NULL,
  `niplurah` varchar(30) NOT NULL,
  `seklur` varchar(50) NOT NULL,
  `nipseklur` varchar(30) NOT NULL,
  `bendahara` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `jnp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='jangan dihapus';

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id`, `kodekelurahan`, `kelurahan`, `kodekec`, `kec`, `kodekab`, `kab`, `kodeprov`, `prov`, `kantor`, `telp`, `lurah`, `niplurah`, `seklur`, `nipseklur`, `bendahara`, `email`, `logo`, `jnp`) VALUES
(1, '2004', 'Dagelan', '23', 'Way Asalan', '01', 'Lampung Selatan', '18', 'Lampung', 'Jl. Cut Mutia No. 01 Kelurahan Dagelan Kec. Way Asalan Kab. Lampung Selatan, POS : 98013', '0822-7818-3799', 'ABDURRASYID, SE', '197308262005021004', 'SAMANI, S.Kom', '197804202010041006', 'MARSIH', 'desadagelan@gmail.com', '29logo.png', 'Desa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id` int(4) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `klasifikasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id`, `kode`, `klasifikasi`) VALUES
(1, '00', 'UMUM'),
(2, '001', 'Lambang'),
(3, '001.1', 'Garuda'),
(4, '001.2', 'Bendera Kebangsaan'),
(5, '001.3', 'Lagu Kebangsaan'),
(6, '001.4', 'Daerah'),
(7, '001.31', 'Provinsi'),
(8, '001.32', 'Kabupaten/Kota'),
(9, '002', 'Tanda Kehormatan/Penghargaan untuk pegawai lihat 861.1'),
(10, '002.1', 'Bintang'),
(11, '002.2', 'Satyalencana'),
(12, '002.3', 'Samkarya Nugraha'),
(13, '002.4', 'Monumen'),
(14, '002.5', 'Penghargaan Secara Adat'),
(15, '002.6', 'Penghargaan lainnya'),
(16, '003', 'Hari Raya/Besar'),
(17, '003.1', 'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya'),
(18, '003.2', 'Hari Raya Keagamaan'),
(19, '003.3', 'Hari Ulang Tahun'),
(20, '003.4', 'Hari-hari Besar Internasional'),
(21, '004', 'Ucapan'),
(22, '004.1', 'Ucapan Terima Kasih'),
(23, '004.2', 'Ucapan Selamat'),
(24, '004.3', 'Ucapan Belasungkawa'),
(25, '004.4', 'Ucapan Lainnya'),
(26, '005', 'Undangan'),
(27, '006', 'Tanda Jabatan'),
(28, '006.1', 'Pamong Praja'),
(29, '006.2', 'Tanda Pengenal'),
(30, '006.3', 'Pejabat lainnya'),
(31, '010', 'URUSAN DALAM'),
(32, '011', 'Gedung Kantor/Termasuk Instalasi Prasarana Fisik Pamong/Kantor Dinas'),
(33, '012', 'Rumah Dinas'),
(34, '012.1', 'Tanah Untuk Rumah Dinas'),
(35, '012.2', 'Perabot Rumah Dinas'),
(36, '012.3', 'Rumah Dinas Golongan 1'),
(37, '012.4', 'Rumah Dinas Golongan 2'),
(38, '012.5', 'Rumah Dinas Golongan 3'),
(39, '012.6', 'Rumah/Bangunan Lainnya'),
(40, '012.7', 'Rumah Pejabat Negara'),
(41, '013', 'Mess/Guest House'),
(42, '014', 'Rumah Susun/Apartemen'),
(43, '015', 'Penerangan Listrik/Jasa Listrik'),
(44, '016', 'Telepon/Faximile/Internet'),
(45, '017', 'Keamanan/Ketertiban Kantor'),
(46, '018', 'Kebersihan Kantor'),
(47, '019', 'Protokol'),
(48, '019.1', 'Upacara Bendera'),
(49, '019.2', 'Tata Tempat'),
(50, '019.21', 'Pemasangan Gambar Presiden/Wakil Presiden'),
(51, '019.3', 'Audiensi / Menghadap Pimpinan'),
(52, '019.4', 'Alamat-Alamat Kantor Pejabat'),
(53, '019.5', 'Bandir/Umbul-Umbul/Spanduk'),
(54, '020', 'PERALATAN'),
(55, '020.1', 'Penawaran'),
(56, '021', 'Alat Tulis'),
(57, '022', 'Mesin Kantor'),
(58, '023', 'Perabot Kantor'),
(59, '024', 'Alat Angkutan'),
(60, '025', 'Pakaian Dinas'),
(61, '026', 'Senjata'),
(62, '027', 'Pengadaan'),
(63, '028', 'Inventaris'),
(64, '030', 'KEKAYAAN DAERAH'),
(65, '031', 'Sumber Daya Alam'),
(66, '032', 'Asset Daerah'),
(67, '040', 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI'),
(68, '041', 'Perpustakaan'),
(69, '041.1', 'Umum'),
(70, '041.2', 'Khusus'),
(71, '041.3', 'Perguruan Tinggi'),
(72, '041.4', 'Sekolah'),
(73, '041.5', 'Keliling'),
(74, '042', 'Dokumentasi'),
(75, '045', 'Kearsipan'),
(76, '045.1', 'Pola Klasifikasi'),
(77, '045.2', 'Penataan Berkas'),
(78, '045.3', 'Penyusutan Arsip'),
(79, '045.31', 'Jadwal Retensi Arsip'),
(80, '045.32', 'Pemindahan Arsip'),
(81, '045.33', 'Penilaian Arsip'),
(82, '045.34', 'Pemusnahan Arsip'),
(83, '045.35', 'Penyerahan Arsip'),
(84, '045.36', 'Berita Acara Penyusutan Arsip'),
(85, '045.37', 'Daftar Pencarian Arsip'),
(86, '045.4', 'Pembinaan Kearsipan'),
(87, '045.41', 'Bimbingan Teknis'),
(88, '045.5', 'Pemeliharaan /Perawatan Arsip'),
(89, '045.6', 'Pengawetan/Fumigasi'),
(90, '046', 'Sandi'),
(91, '047', 'Website'),
(92, '048', 'Pengelolaan Data'),
(93, '049', 'Jaringan Komunikasi Data'),
(94, '050', 'PERENCANAAN'),
(95, '050.1', 'Repelita/8 Sukses'),
(96, '050.11', 'Pelita Daerah'),
(97, '050.12', 'Bantuan Pembangunan Daerah'),
(98, '050.13', 'Bappeda'),
(99, '051', 'Proyek Bidang Pemerintahan, Klasifikasikan Disini :'),
(100, '052', 'Bidang Politik'),
(101, '053', 'Bidang Keamanan Dan Ketertiban Tambhkan Perincian 300'),
(102, '054', 'Bidang Kesejahteraan Rakyat Tambahkan Peincian 400 pada 054'),
(103, '055', 'Bidang Perekonomian Tambahkan Perincian 500 Pada 055'),
(104, '056', 'Bidang Pekerjaan Umum Tambahkan Perincian 600 pada 056'),
(105, '057', 'Bidang Pengawasan'),
(106, '058', 'Bidang Kepegawaian'),
(107, '059', 'Bidang Keuangan'),
(108, '060', 'ORGANISASI / KETATALAKSANAAN'),
(109, '060.1', 'Program Kerja'),
(110, '061', 'Organisasi Instansi Pemerintah (struktur organisasi)'),
(111, '061.1', 'Susunan dan Tata Kerja'),
(112, '061.2', 'Tata Tertib Kantor, Jam Kerja di Bulan Puasa'),
(113, '062', 'Organisasi Badan Non Pemerintah'),
(114, '063', 'Organisasi Badan Internasional'),
(115, '064', 'Organisasi Semi Pemerintah, BKS-AKSI'),
(116, '065', 'Ketatalaksanaan / Tata Naskah / Sistem'),
(117, '066', 'Stempel Dinas'),
(118, '067', 'Pelayanan Umum / Pelayanan Publik / Analisis'),
(119, '068', 'Komputerisasi / Siskomdagri'),
(120, '069', 'Standar Pelayanan Minimal'),
(121, '070', 'PENELITIAN'),
(122, '071', 'Riset'),
(123, '072', 'Survey'),
(124, '073', 'Kajian'),
(125, '074', 'Kerjasama Penelitian Dengan Perguruan Tinggi'),
(126, '075', 'Kementerian Lainnya'),
(127, '076', 'Non Kementerian'),
(128, '077', 'Provinsi'),
(129, '078', 'Kabupaten/Kota'),
(130, '079', 'Kecamatan /Desa'),
(131, '080', 'KONFERENSI / RAPAT / SEMINAR'),
(132, '081', 'Gubernur'),
(133, '082', 'Bupati / Walikota'),
(134, '083', 'Komponen, Eselon Lainnya'),
(135, '084', 'Instansi Lainnya'),
(136, '085', 'Internasional Di Dalam Negeri'),
(137, '086', 'Internasional Di Luar Negeri'),
(138, '090', 'PERJALANAN DINAS'),
(139, '091', 'Perjalanan Presiden/Wakil Presiden Ke Daerah'),
(140, '092', 'Perjalanan Menteri Ke Daerah'),
(141, '093', 'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)'),
(142, '094', 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai'),
(143, '095', 'Perjalanan Tamu Asing Ke Daerah'),
(144, '096', 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri'),
(145, '097', 'Perjalanan Menteri Ke Luar Negeri'),
(146, '098', 'Perjalanan Pejabat Tinggi Ke Luar Negeri'),
(147, '099', 'Perjalanan Pegawai ke Luar Negeri'),
(148, '100', 'PEMERINTAHAN'),
(149, '101', 'Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan luar negeri'),
(150, '102', 'GDN'),
(151, '110', 'PEMERINTAHAN PUSAT'),
(152, '111', 'Presiden'),
(153, '111.1', 'Pertanggung jawaban presiden kpd MPR'),
(154, '111.2', 'Amanat Presiden/Amanat Kenegaraan/Pidato'),
(155, '112', 'Wakil Presiden'),
(156, '112.1', 'Pertanggung jawaban wakil presiden kepada MPR'),
(157, '112.2', 'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato'),
(158, '113', 'Susunan Kabinet'),
(159, '113.1', 'Reshuffle'),
(160, '113.2', 'Penunjukan Menteri ad interim'),
(161, '113.3', 'Sidang Kabinet'),
(162, '114', 'Kementerian Dalam Negeri'),
(163, '114.1', 'Amanat Menteri Dalam Negeri/Sambutan'),
(164, '115', 'Kementerian lainnya'),
(165, '116', 'Lembaga Tinggi Negara'),
(166, '117', 'Lembaga Non Kementerian'),
(167, '118', 'Otonomi/Desentralisasi/Dekonsentrasi'),
(168, '119', 'Kerjasama Antar Kementerian'),
(169, '120', 'PEMERINTAH PROVINSI'),
(170, '120.4', 'Laporan daerah'),
(171, '120.042', 'Monografi tambahkan kode wilayah'),
(172, '120.1', 'Koordinasi'),
(173, '120.2', 'Instansi Tingkat Provinsi'),
(174, '120.21', 'Dinas Otonomi'),
(175, '120.22', 'Instansi Vertikal'),
(176, '120.23', 'Kerjasama antar Provinsi/Daerah'),
(177, '121', 'Gubernur tambahkan kode wilayah, meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.'),
(178, '122', 'Wakil Gubernur meliputi:  tambahkan kode wilayah pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan  dan sebagainya.'),
(179, '123', 'Sekretaris Wilayah tambahkan kode wilayah, meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.'),
(180, '124', 'Pembentukan/Pemekaran Wilayah'),
(181, '124.1', 'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya'),
(182, '124.2', 'Pemekaran  Wilayah'),
(183, '124.3', 'Forum Koordinasi lainnya'),
(184, '125', 'Pembentukan Pemekaran Wilayah'),
(185, '125.2', 'Pembentukan Wialayah'),
(186, '125.3', 'Pemindahan Ibukota'),
(187, '125.4', 'Perubahan batas Wilayah'),
(188, '125.5', 'Pemekaran Wialayah'),
(189, '126', 'Pembagian Wilayah'),
(190, '127', 'Penyerahan Urusan'),
(191, '128', 'Swaparaja/Penataan Wilayah/Daerah'),
(193, '130', 'PEMERINTAH KABUPATEN / KOTA'),
(194, '130', 'Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan,Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan, dsb'),
(195, '132', 'Wakil Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan'),
(196, '133', 'Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah, Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan'),
(197, '134', 'Forum Koordinasi Pemerintah Di Daerah'),
(198, '134.1', 'Muspida'),
(199, '134.2', 'Forum PAN (Panitian Anggaran Nasional)'),
(200, '134.3', 'Forum Koordinasi Lainnya'),
(201, '134.4', 'Kerjasama antar Kabupaten/Kota'),
(202, '135', 'Pembentukan / Pemekaran Wilayah'),
(203, '135.1', 'Pemindahan Ibukota'),
(204, '135.2', 'Pembentukan Wilayah Pembantu Bupati/Walikota'),
(205, '135.3', 'Pemabagian Wilayah Kabupaten/Kota'),
(206, '135.4', 'Perubahan Batas Wilayah'),
(207, '135.5', 'Pemekaran Wilayah'),
(208, '135.6', 'Permasalahan Batas Wilayah'),
(209, '135.7', 'Pembentukan Ibukota Kabupaten/Kota'),
(210, '135.8', 'Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah, Jalan'),
(211, '136', 'Pembagian Wilayah'),
(212, '137', 'Penyerahan Urusan'),
(213, '138', 'Pemerintah Wilayah Kecamatan'),
(214, '138.1', 'Sambutan / Pengarahan / Amanat'),
(215, '138.2', 'Pembentukan Kecamatan'),
(216, '138.3', 'Pemekaran Kecamatan'),
(217, '138.4', 'Perluasan/Perubahan Batas Wilayah Kecamatan'),
(218, '138.5', 'Pembentukan Perwakilan Kecamatan/Kemantren'),
(219, '140', 'PEMERINTAHAN DESA / KELURAHAN'),
(220, '141', 'Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal, Pengangkatan, Pemberhenian, dan sebagainya'),
(221, '142', 'Penghasilan Pamong Desa'),
(222, '143', 'Kekayaan Desa'),
(223, '144', 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa'),
(224, '145', 'Administrasi Desa'),
(225, '146', 'Kewilayahan'),
(226, '146.1', 'Pembentukan Desa/Kelurahan'),
(227, '146.2', 'Pemekaran Desa/Kelurahan'),
(228, '146.3', 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan'),
(229, '146.4', 'Perubahan Nama Desa / Kelurahan'),
(230, '146.5', 'Kerjasama Antar Desa / Kelurahan'),
(231, '147', 'Lembaga-lembaga Tingkat Desa'),
(232, '148', 'Perangkat Kelurahan'),
(233, '148.1', 'Kepala Kelurahan'),
(234, '148.2', 'Sekretaris Kelurahan'),
(235, '148.3', 'Staf Kelurahan'),
(236, '149', 'Dewan Kelurahan'),
(237, '149.1', 'Rukun Tetangga'),
(238, '149.2', 'Rukun Warga'),
(239, '149.3', 'Rukun Kampung'),
(240, '150', 'LEGISLATIF MPR / DPR / DPD'),
(241, '151', 'Keanggotaan MPR'),
(242, '151.1', 'Pencalonan'),
(243, '151.2', 'Pemberhentian'),
(244, '151.3', 'Recall'),
(245, '151.4', 'Pelanggaran'),
(246, '152', 'Persidangan'),
(247, '153', 'Kesejahteraan'),
(248, '153.1', 'Keuangan'),
(249, '153.2', 'Penghargaan'),
(250, '154', 'Hak'),
(251, '155', 'Keanggotaan DPR Pencalonan Pengangkatan'),
(252, '156', 'Persidangan Sidang Pleno Dengar Pendapat/Rapat Komisi Reses'),
(253, '157', 'Kesejahteraan'),
(254, '157.1', 'Keuangan'),
(255, '157.2', 'Penghargaan'),
(256, '158', 'Jawaban Pemerintah'),
(257, '159', 'Hak'),
(258, '160', 'DPRD PROVINSI TAMBAHKAN KODE WILAYAH'),
(259, '161', 'Keanggotaan'),
(260, '161.1', 'Pencalonan'),
(261, '161.2', 'Pengangkatan'),
(262, '161.3', 'Pemberhentian'),
(263, '161.4', 'Recall'),
(264, '161.5', 'Meninggal'),
(265, '161.6', 'Pelanggaran'),
(266, '162', 'Persidangan'),
(267, '162.1', 'Reses'),
(268, '163', 'Kesejahteraan'),
(269, '163.1', 'Keuangan'),
(270, '163.2', 'Penghargaan'),
(271, '164', 'Hak'),
(272, '165', 'Sekretaris DPRD Provinsi'),
(273, '170', 'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH'),
(274, '171', 'Keanggotaan'),
(275, '171.1', 'Pencalonan'),
(276, '171.2', 'Pengangkatan'),
(277, '171.3', 'Pemberhentian'),
(278, '171.4', 'Recall'),
(279, '171.5', 'Pelanggaran'),
(280, '172', 'Persidangan'),
(281, '173', 'Kesejahteraan'),
(282, '173.1', 'Keuangan'),
(283, '173.2', 'Penghargaan'),
(284, '174', 'Hak'),
(285, '175', 'Sekretaris DPRD Kabupaten/Kota'),
(286, '180', 'HUKUM'),
(287, '180.1', 'Kontitusi'),
(288, '180.11', 'Dasar Hukum'),
(289, '180.12', 'Undang-Undang Dasar'),
(290, '180.2', 'GBHN'),
(291, '180.3', 'Amnesti, Abolisi dan Grasi'),
(292, '181', 'Perdata'),
(293, '181.1', 'Tanah'),
(294, '181.2', 'Rumah'),
(295, '181.3', 'Utang/Piutang'),
(296, '181.31', 'Gadai'),
(297, '181.32', 'Hipotik'),
(298, '181.4', 'Notariat'),
(299, '182', 'Pidana'),
(300, '182.1', 'Penyidik Pegawai Negeri Sipil (PPNS)'),
(301, '183', 'Peradilan'),
(302, '183.1', 'Bantuan Hukum'),
(303, '184', 'Hukum Internasional'),
(304, '185', 'Imigrasi'),
(305, '185.1', 'Visa'),
(306, '185.2', 'Pasport'),
(307, '185.3', 'Exit'),
(308, '185.4', 'Reentry'),
(309, '185.5', 'Lintas Batas/Batas Antar Negara'),
(310, '186', 'Kepenjaraan'),
(311, '187', 'Kejaksaan'),
(312, '188', 'Peraturan Perundang-Undangan'),
(313, '188.1', 'TAP MPR'),
(314, '188.2', 'Undang-Undang Dasar'),
(315, '188.3', 'Peraturan'),
(316, '188.31', 'Peraturan Pemerintah'),
(317, '188.32', 'Peraturan Menteri'),
(318, '188.33', 'Peraturan Lembaga Non Departemen'),
(319, '188.34', 'Peraturan Daerah'),
(320, '188.341', 'Peraturan Provinsi'),
(321, '188.342', 'Peraturan Kabupaten/Kota'),
(322, '188.4', 'Keputusan'),
(323, '188.41', 'Presiden'),
(324, '188.42', 'Menteri'),
(325, '188.43', 'Lembaga Non Departemen'),
(326, '188.44', 'Gubernur'),
(327, '188.45', 'Bupati/Walikota'),
(328, '188.5', 'Instruksi'),
(329, '188.51', 'Presiden'),
(330, '188.52', 'Menteri'),
(331, '188.53', 'Lembaga Non Departemen'),
(332, '188.54', 'Gubernur'),
(333, '188.55', 'Bupati/Walikota'),
(334, '189', 'Hukum Adat'),
(335, '189.1', 'Tokoh Adat/Masyarakat'),
(336, '190', 'HUBUNGAN LUAR NEGERI'),
(337, '191', 'Perwakilan Asing'),
(338, '192', 'Tamu Negara'),
(339, '193', 'Kerjasama Dengan Negara Asing'),
(340, '193.1', 'Asean'),
(341, '193.2', 'Bantuan Luar Negeri/Hibah'),
(342, '194', 'Perwakilan RI Di Luar Negeri/Hibah'),
(343, '195', 'PBB'),
(344, '196', 'Laporan Luar Negeri'),
(345, '197', 'Hutang Luar Negeri PHLN/LOAN'),
(346, '200', 'POLITIK'),
(347, '201', 'Kebijaksanaan umum'),
(348, '202', 'Orde baru'),
(349, '203', 'Reformasi'),
(350, '210', 'KEPARTAIAN'),
(351, '211', 'Lambang partai'),
(352, '212', 'Kartu tanda anggota'),
(353, '213', 'Bantuan keuangan parpol'),
(354, '220', 'ORGANISASI KEMASYARAKATAN'),
(355, '221', 'Berdasarkan perjuangan'),
(356, '221.1', 'Perintis kemerdekaan'),
(357, '221.2', 'angkatan 45'),
(358, '221.3', 'Veteran'),
(359, '222', 'Berdasarkan Kekaryaan'),
(360, '222.1', 'PEPABRI'),
(361, '222.2', 'Wredatama'),
(362, '223', 'Berdasarkan kerohanian'),
(363, '224', 'Lembaga adat'),
(364, '225', 'Lembaga Swadaya Masyarakat'),
(365, '230', 'ORGANISASI PROFESI DAN FUNGSIONAL'),
(366, '231', 'Ikatan Dokter Indonesia'),
(367, '232', 'Persatuan Guru Republik Indonesia'),
(368, '233', 'PERSATUAN SARJANA HUKUM INDONESIA'),
(369, '234', 'Persatuan Advokat Indonesia'),
(370, '235', 'Lembaga Bantuan Hukum Indonesia'),
(371, '236', 'Korps Pegawai Republik Indonesia'),
(372, '237', 'Persatuan Wartawan Indonesia'),
(373, '238', 'Ikatan Cendikiawan Muslim Indonesia'),
(374, '239', 'Organisasi Profesi Dan Fungsional Lainnya'),
(375, '240', 'ORGANISASI PEMUDA'),
(376, '241', 'Komite Nasional Pemuda Indonesia'),
(377, '242', 'Organisasi Mahasiswa'),
(378, '243', 'Organisasi Pelajar'),
(379, '244', 'Gerakan Pemuda Ansor'),
(380, '245', 'Gerakan Pemuda Islam Indonesia'),
(381, '246', 'Gerakan Pemuda Marhaenis'),
(382, '250', 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN'),
(383, '251', 'Federasi Buruh Seluruh Indonesia'),
(384, '252', 'Organisasi Buruh Internasional'),
(385, '253', 'Himpunan Kerukunan Tani'),
(386, '254', 'Himpunan Nelayan Seluruh Indonesia'),
(387, '255', 'Keluarga Sopir Proporsional Indonesia'),
(388, '260', 'ORGANISASI WANITA'),
(389, '261', 'Dharma Wanita'),
(390, '262', 'Persatuan Wanita Indonesia'),
(391, '263', 'Pemberdayaan Perempuan (wanita)'),
(392, '264', 'Kongres Wanita'),
(393, '270', 'PEMILIHAN UMUM'),
(394, '271', 'Pencalonan'),
(395, '272', 'Nomor Urut Partai / Tanda Gambar'),
(396, '273', 'Kampanye'),
(397, '274', 'Petugas Pemilu'),
(398, '275', 'Pemilih / Daftar Pemilih'),
(399, '276', 'Sarana'),
(400, '276.1', 'TPS'),
(401, '276.2', 'Kendaraan'),
(402, '276.3', 'Surat Suara'),
(403, '276.4', 'Kotak Suara'),
(404, '276.5', 'Dana'),
(405, '277', 'Pemungutan Suara / Perhitungan Suara'),
(406, '278', 'Penetapan Hasil Pemilu'),
(407, '279', 'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih'),
(408, '280', 'Pengucapan Sumpah Janji MPR,DPR,DPD'),
(409, '300', 'KEAMANAN / KETERTIBAN'),
(410, '301', 'Keamanan'),
(411, '302', 'Ketertiban'),
(412, '310', 'PERTAHANAN'),
(413, '311', 'Darat'),
(414, '312', 'Laut'),
(415, '313', 'Udara'),
(416, '314', 'Perbatasan'),
(417, '320', 'KEMILITERAN'),
(418, '321', 'Latihan Militer'),
(419, '322', 'Wajib Militer'),
(420, '323', 'Operasi Militer'),
(421, '324', 'Kekaryaan TNI Pejabat Sipil dari TNI'),
(422, '324.1', 'TMD'),
(423, '330', 'KEAMANAN'),
(424, '331', 'Kepolisian'),
(425, '331.1', 'Polisi Pamong Praja'),
(426, '331.2', 'Kamra'),
(427, '331.3', 'Kamling'),
(428, '331.4', 'Jaga Wana'),
(429, '332', 'Huru-Hara / Demonstrasi'),
(430, '333', 'Senjata Api Tajam'),
(431, '334', 'Bahan Peledak'),
(432, '335', 'Perjudian'),
(433, '336', 'Surat-Surat Kaleng'),
(434, '337', 'Pengaduan'),
(435, '338', 'Himbauan / Larangan'),
(436, '339', 'Teroris'),
(437, '340', 'PERTAHANAN SIPIL'),
(438, '341', 'Perlindungan Sipil'),
(439, '350', 'KEJAHATAN'),
(440, '351', 'Makar / Pemberontak'),
(441, '352', 'Pembunuhan'),
(442, '353', 'Penganiayaan, Pencurian'),
(443, '354', 'Subversi / Penyelundupan / Narkotika'),
(444, '355', 'Pemalsuan'),
(445, '356', 'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN'),
(446, '357', 'Pemerkosaan / Perbuatan Cabul'),
(447, '358', 'Kenakalan'),
(448, '359', 'Kejahatan Lainnya'),
(449, '360', 'BENCANA'),
(450, '361', 'Gunung Berapi / Gempa'),
(451, '362', 'Banjir / Tanah Longsor'),
(452, '363', 'Angin Topan'),
(453, '364', 'Kebakaran'),
(454, '364.1', 'Pemadam Kebakaran'),
(455, '365', 'Kekeringan'),
(456, '366', 'Tsunami'),
(457, '370', 'KECELAKAAN / SAR'),
(458, '371', 'Darat'),
(459, '372', 'Udara'),
(460, '373', 'Laut'),
(461, '374', 'Sungai / Danau'),
(462, '400', 'KESEJAHTERAAN RAKYAT'),
(463, '401', 'Keluarga Miskin'),
(464, '402', 'PNPM Mandiri Pedesaan'),
(465, '410', 'PEMBANGUNAN DESA'),
(466, '411', 'Pembinaan Usaha Gotong Royong'),
(467, '411.1', 'Swadaya Gotong Royong'),
(468, '411.11', 'Penataan Gotong Royong'),
(469, '411.12', 'Gotong Royong Dinamis'),
(470, '411.13', 'Gotong Royong Statis'),
(471, '411.14', 'Pungutan'),
(472, '411.2', 'Lembaga Sosial Desa (LSD)'),
(473, '411.21', 'Pembinaan'),
(474, '411.22', 'Klasifikasi'),
(475, '411.23', 'Proyek'),
(476, '411.24', 'Musyawarah'),
(477, '411.3', 'Latihan Kerja Masyarakat'),
(478, '411.31', 'Kader Masyarakat'),
(479, '411.32', 'Kuliah Kerja Nyata (KKN)'),
(480, '411.33', 'Pusat Latihan'),
(481, '411.34', 'Kursus-Kursus'),
(482, '411.35', 'Kurikulum / Sylabus'),
(483, '411.36', 'Ketrampilan'),
(484, '411.37', 'Pramuka'),
(485, '411.4', 'Pembinaan Kesejahteraan Keluarga (PKK)'),
(486, '411.41', 'Program'),
(487, '411.42', 'Pembinaan Organisasi'),
(488, '411.43', 'Kegiatan'),
(489, '411.5', 'Penyuluhan'),
(490, '411.51', 'Publikasi'),
(491, '411.52', 'Peragaan'),
(492, '411.53', 'Sosio Drama'),
(493, '411.54', 'Siaran Pedesaan'),
(494, '411.55', 'Penyuluhan Lapangan'),
(495, '411.6', 'Kelembagaan Desa'),
(496, '411.61', 'Kelompok Tani'),
(497, '411.62', 'Rukun Tani'),
(498, '411.63', 'Subak'),
(499, '411.64', 'Dharma Tirta'),
(500, '412', 'Perekonomian Desa'),
(501, '412.1', 'Produksi Desa'),
(502, '412.11', 'Pengolahan'),
(503, '412.12', 'Pemasaran'),
(504, '412.2', 'Keuangan Desa'),
(505, '412.21', 'Perkreditan Desa'),
(506, '412.22', 'Inventarisasi Data'),
(507, '412.23', 'Perkembangan / Pelaksanaan'),
(508, '412.24', 'Bantuan / Stimulans'),
(509, '412.25', 'Petunjuk / Pembinaan Pelaksanaan'),
(510, '412.3', 'Koperasi Desa'),
(511, '412.31', 'Badan Usaha Unit Desa (BUUD)'),
(512, '412.32', 'Koperasi Usaha Desa'),
(513, '412.4', 'Penataan Bantuan Pembangunan Desa'),
(514, '412.41', 'Jumlah Desa Yang Diberi Bantuan'),
(515, '412.42', 'Pengarahan'),
(516, '412.43', 'Pusat'),
(517, '412.44', 'Daerah'),
(518, '412.5', 'Alokasi Bantuan Pembangunan Desa'),
(519, '412.51', 'Pusat'),
(520, '412.52', 'Daerah'),
(521, '412.6', 'Pelaksanaan Bantuan Pembangunan Desa'),
(522, '412.61', 'Bantuan Langsung'),
(523, '412.62', 'Bantuan Keserasian'),
(524, '412.63', 'Bantuan Juara Lomba Desa'),
(525, '413', 'Prasarana Desa'),
(526, '413.1', 'Prasarana Desa'),
(527, '413.11', 'Pembinaan'),
(528, '413.12', 'Bimbingan Teknis'),
(529, '413.2', 'Pemukiman Kembali Penduduk'),
(530, '413.21', 'Lokasi'),
(531, '413.22', 'Diskusi'),
(532, '413.23', 'Pelaksanaan'),
(533, '413.3', 'Masyarakat Pradesa'),
(534, '413.31', 'Pembinaan'),
(535, '413.32', 'Penyuluhan'),
(536, '413.4', 'Pemugaran Perumahan Dan Lingkungan Desa'),
(537, '413.41', 'Rumah Sehat'),
(538, '413.42', 'Proyek Perintis'),
(539, '413.43', 'Pelaksanaan'),
(540, '413.44', 'Pengembangan'),
(541, '413.45', 'Perbaikan Kampung'),
(542, '414', 'Pengembangan Desa'),
(543, '414.1', 'Tingkat Perkembangan Desa'),
(544, '414.11', 'Jumlah Desa'),
(545, '414.12', 'Pemekaran Desa'),
(546, '414.13', 'Pembentukan Desa Baru'),
(547, '414.14', 'Evaluasi'),
(548, '414.15', 'Bagan'),
(549, '414.2', 'Unit Desa Kerja Pembangunan (UDKP)'),
(550, '414.21', 'Penyuluhan Program'),
(551, '414.22', 'Lokasi UDKP'),
(552, '414.23', 'Pelaksanaan'),
(553, '414.24', 'Bimbingan/Pembinaan'),
(554, '414.25', 'Evaluasi'),
(555, '414.3', 'Tata Desa'),
(556, '414.31', 'Inventarisasi'),
(557, '414.32', 'Penyusunan Pola Tata Desa'),
(558, '414.33', 'Aplikasi Tata Desa'),
(559, '414.34', 'Pemetaan'),
(560, '414.35', 'Pedoman Pelaksanaan'),
(561, '414.36', 'Evaluasi'),
(562, '414.4', 'Perlombaan Desa'),
(563, '414.41', 'Pedoman'),
(564, '414.42', 'Penilaian'),
(565, '414.43', 'Kejuaraan'),
(566, '414.44', 'Piagam'),
(567, '415', 'Koordinasi'),
(568, '415.1', 'Sektor Khusus'),
(569, '415.2', 'Rapat Koordinasi Horizontal (RKH)'),
(570, '415.3', 'Tim Koordinasi Pusat (TKP)'),
(571, '415.4', 'Kerjasama'),
(572, '415.41', 'Luar Negeri (UNICEF)'),
(573, '415.42', 'Perguruan Tinggi'),
(574, '415.43', 'Kementerian / Lembaga Non Kementerian'),
(575, '420', 'PENDIDIKAN'),
(576, '420.1', 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja'),
(577, '421', 'Sekolah'),
(578, '421.1', 'Pra Sekolah'),
(579, '421.2', 'Sekolah Dasar'),
(580, '421.3', 'Sekolah Menengah'),
(581, '421.4', 'Sekolah Tinggi'),
(582, '421.5', 'Sekolah Kejuruan'),
(583, '421.6', 'Kegiatan Sekolah, Dies Natalis Lustrum'),
(584, '421.7', 'Kegiatan Pelajar'),
(585, '421.71', 'Reuni Darmawisata'),
(586, '421.72', 'Pelajar Teladan'),
(587, '421.73', 'Resimen Mahasiswa'),
(588, '421.8', 'Sekolah Pendidikan Luar Biasa'),
(589, '421.9', 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf'),
(590, '422', 'Administrasi Sekolah'),
(591, '422.1', 'Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran, Mapras, Perpeloncoan'),
(592, '422.2', 'Tahun Pelajaran'),
(593, '422.3', 'Hari Libur'),
(594, '422.4', 'Uang Sekolah, Klasifikasi Disini SPP'),
(595, '422.5', 'Beasiswa'),
(596, '423', 'Metode Belajar'),
(597, '423.1', 'Kuliah'),
(598, '423.2', 'Ceramah, Simposium'),
(599, '423.3', 'Diskusi'),
(600, '423.4', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur'),
(601, '423.5', 'Kurikulum'),
(602, '423.6', 'Karya Tulis'),
(603, '423.7', 'Ujian'),
(604, '424', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor'),
(605, '425', 'Sarana Pendidikan'),
(606, '425.1', 'Gedung'),
(607, '425.11', 'Gedung Sekolah'),
(608, '425.12', 'Kampus'),
(609, '425.13', 'Pusat Kegiatan Mahasiswa'),
(610, '425.2', 'Buku'),
(611, '425.3', 'Perlengkapan Sekolah'),
(612, '426', 'Keolahragaan'),
(613, '426.1', 'Cabang Olah Raga'),
(614, '426.2', 'Sarana'),
(615, '426.21', 'Gedung Olah Raga'),
(616, '426.22', 'Stadion'),
(617, '426.23', 'Lapangan'),
(618, '426.24', 'Kolam renang'),
(619, '426.3', 'Pesta Olah Raga, Klasifikasi Disini: PON, Porsade, Olimpiade, dsb'),
(620, '426.4', 'KONI'),
(621, '427', 'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja'),
(622, '428', 'Kepramukaan'),
(623, '429', 'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890'),
(624, '430', 'KEBUDAYAAN'),
(625, '431', 'Kesenian'),
(626, '431.1', 'Cabang Kesenian'),
(627, '431.2', 'Sarana'),
(628, '431.21', 'Gedung Kesenian'),
(629, '432', 'Kepurbakalaan'),
(630, '432.1', 'Museum'),
(631, '432.2', 'Peninggalan Kuno'),
(632, '432.21', 'Candi Termasuk Pemugaran'),
(633, '432.22', 'Benda'),
(634, '433', 'Sejarah'),
(635, '434', 'Bahasa'),
(636, '435', 'Usaha Pertunjukan, Hiburan, Kesenangan'),
(637, '436', 'Kepercayaan'),
(638, '440', 'KESEHATAN'),
(639, '441', 'Pembinaan Kesehatan'),
(640, '441.1', 'Gizi'),
(641, '441.2', 'Mata'),
(642, '441.3', 'Jiwa'),
(643, '441.4', 'Kanker'),
(644, '441.5', 'Usaha Kegiatan Sekolah (UKS)'),
(645, '441.6', 'Perawatan'),
(646, '441.7', 'Penyuluhan Kesehatan Masyarakat (PKM)'),
(647, '441.8', 'Pekan Imunisasi Nasional'),
(648, '442', 'Obat-obatan'),
(649, '442.1', 'Pengadaan'),
(650, '442.2', 'Penyimpanan'),
(651, '443', 'Penyakit Menular'),
(652, '443.1', 'Pencegahan'),
(653, '443.2', 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)'),
(654, '443.21', 'Kusta'),
(655, '443.22', 'Kelamin'),
(656, '443.23', 'Frambosia'),
(657, '443.24', 'TBC / AIDS / HIV'),
(658, '443.3', 'Epidemiologi dan Karantina (Epidka)'),
(659, '443.31', 'Kholera'),
(660, '443.32', 'Imunisasi'),
(661, '443.33', 'Survailense'),
(662, '443.34', 'Rabies (Anjing Gila) Antraks'),
(663, '443.4', 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)'),
(664, '443.41', 'Malaria'),
(665, '443.42', 'Dengue Faemorrhagic Fever (Demam Berdarah HDF)'),
(666, '443.43', 'Filaria'),
(667, '443.44', 'Serangga'),
(668, '443.5', 'Hygiene Sanitasi'),
(669, '443.51', 'Tempat-tempat Pembuatan Dan Penjualan Makanan dan Minuman (TPPMM)'),
(670, '443.52', 'Sarana Air Minum Dan Jamban Keluarga (Samijaga)'),
(671, '443.53', 'Pestisida'),
(672, '444', 'Gizi'),
(673, '444.1', 'Kekurangan Makanan Bahaya Kelaparan, Busung Lapar'),
(674, '444.2', 'Keracunan Makanan'),
(675, '444.3', 'Menu Makanan Rakyat'),
(676, '444.4', 'Badan Perbaikan Gizi Daerah (BPGD)'),
(677, '444.5', 'Program Makanan Tambahn Anak Sekolah (PMT-AS)'),
(678, '445', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS Keliling, Poliklinik'),
(679, '446', 'Tenaga Medis'),
(680, '448', 'Pengobatan Tadisional'),
(681, '448.1', 'Pijat'),
(682, '448.2', 'Tusuk Jarum'),
(683, '448.3', 'Jamu Tradisional'),
(684, '448.4', 'Dukun / Paranormal'),
(685, '450', 'AGAMA'),
(686, '451', 'Islam'),
(687, '451.1', 'Peribadatan'),
(688, '451.11', 'Sholat'),
(689, '451.12', 'Zakat Fitrah'),
(690, '451.13', 'Puasa'),
(691, '451.14', 'MTQ'),
(692, '451.2', 'Rumah Ibadah'),
(693, '451.3', 'Tokoh Agama'),
(694, '451.4', 'Pendidikan'),
(695, '451.41', 'Tinggi'),
(696, '451.42', 'Menengah'),
(697, '451.43', 'Dasar'),
(698, '451.44', 'Pondok Pesantren'),
(699, '451.45', 'Gedung Sekolah'),
(700, '451.46', 'Tenaga Pengajar'),
(701, '451.47', 'Buku'),
(702, '451.48', 'Dakwah'),
(703, '451.49', 'Organisasi / Lembaga Pendidikan'),
(704, '451.5', 'Harta Agama Wakaf, Baitulmal, dsb'),
(705, '451.6', 'Peradilan'),
(706, '451.7', 'Organisasi Keagamaan Bukan Politik Majelis Ulama'),
(707, '451.8', 'Mazhab'),
(708, '452', 'Protestan'),
(709, '452.1', 'Peribadatan'),
(710, '452.2', 'Rumah Ibadah'),
(711, '452.2', 'Tokoh Agama, Rohaniawan, Pendeta, Domine'),
(712, '452.4', 'Mazhab'),
(713, '452.5', 'Organisasi Gerejani'),
(714, '453', 'Katolik'),
(715, '453.1', 'Peribadatan'),
(716, '453.2', 'Rumah Ibadah'),
(717, '453.3', 'Tokoh Agama, Rohaniawan, Pendeta, Pastor'),
(718, '453.4', 'Mazhab'),
(719, '453.5', 'Organisasi Gerejani'),
(720, '454', 'Hindu'),
(721, '454.1', 'Peribadatan'),
(722, '454.2', 'Rumah Ibadah'),
(723, '454.3', 'Tokoh Agama, Rohaniawan'),
(724, '454.4', 'Mazhab'),
(725, '454.5', 'Organisasi Keagamaan'),
(726, '455', 'Budha'),
(727, '455.1', 'Peribadatan'),
(728, '455.2', 'Rumah Ibadah'),
(729, '455.3', 'Tokoh Agama, Rohaniawan'),
(730, '455.4', 'Mazhab'),
(731, '455.5', 'Organisasi Keagamaan'),
(732, '456', 'Urusan Haji'),
(733, '456.1', 'ONH'),
(734, '456.2', 'Manasik'),
(735, '457', '-'),
(736, '458', '-'),
(737, '458', '-'),
(738, '460', 'SOSIAL'),
(739, '461', 'Rehabilitasi Penderita Cacat'),
(740, '461.1', 'Cacat Maat'),
(741, '461.2', 'Cacat Tubuh'),
(742, '461.3', 'Cacat Mental'),
(743, '461.4', 'Bisul/Tuli'),
(744, '462', 'Tuna Sosial'),
(745, '462.1', 'Gelandangan'),
(746, '462.2', 'Pengemis'),
(747, '462.3', 'Tuna Susila'),
(748, '462.4', 'Anak Nakal'),
(749, '463', 'Kesejahteraan Anak / Keluarga'),
(750, '463.1', 'Anak Putus Sekolah'),
(751, '463.2', 'Ibu Teladan'),
(752, '463.3', 'Anak Asuh'),
(753, '464', 'Pembinaan Pahlawan'),
(754, '464.1', 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kepada Pahlawan Dan Jandanya'),
(755, '464.2', 'Perintis Kemerdekaan Meliputi: Pembinaan, Penghargaan Dan Tunjangan Kepada Perintis'),
(756, '464.3', 'Cacat Veteran'),
(757, '465', 'Kesejahteraan Sosial'),
(758, '465.1', 'Lanjut Usia'),
(759, '465.2', 'Korban Kekacauan, Pengungsi, Repatriasi'),
(760, '466', 'Sumbangan Sosial'),
(761, '466.1', 'Korban Bencana'),
(762, '466.2', 'Pencarian Dana Untuk Sumbangan'),
(763, '466.3', 'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb'),
(764, '466.4', 'Panti Asuhan'),
(765, '466.5', 'Panti Jompo'),
(766, '467', 'Bimbingan Sosial'),
(767, '467.1', 'Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman'),
(768, '468', 'PMI'),
(769, '469', 'Makam'),
(770, '469.1', 'Umum'),
(771, '469.2', 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kpd Pahlawan Dan Jandanya'),
(772, '469.3', 'Khusus Keluarga Raja'),
(773, '469.4', 'Krematorium'),
(774, '470', 'KEPENDUDUKAN'),
(775, '471', 'Pendaftaran Penduduk'),
(776, '471.1', 'Identitas Penduduk'),
(777, '471.11', 'Biodata'),
(778, '471.12', 'Nomor Induk Kependudukan'),
(779, '471.13', 'Kartu Tanda Penduduk'),
(780, '471.14', 'Kartu Keluarga'),
(781, '471.15', 'Advokasi Indentitas Penduduk'),
(782, '471.2', 'Perpindahan Penduduk Dalam Wilayah Indonesia'),
(783, '471.21', 'Perpindahan Penduduk WNI'),
(784, '471.22', 'Perpindahan Penduduk WNA Dalam Wilayah Indonesia'),
(785, '471.23', 'Perpindahan Penduduk WNA dan WNI Tinggal Sementara'),
(786, '471.24', 'Daerah Terbelakan'),
(787, '471.25', 'Bedol Desa'),
(788, '471.3', 'Perpindahan Penduduk Antar Negara'),
(789, '471.31', 'Penduduk Indonesia Ke Luar Negeri'),
(790, '471.32', 'Orang Asing Tinggal Sementara'),
(791, '471.33', 'Orang Asing Tinggal Tetap'),
(792, '471.34', 'Perpindahan Penduduk Antar Negara Di Wilayah Pembatasan Antar Negara (Pelintas Batas Tradisional)'),
(793, '471.4', 'Pendaftaran Pengungsi Dan Penduduk Rentan'),
(794, '471.41', 'Akibat Bencana Alam'),
(795, '471.42', 'Akibat Kerusuhan Sosial'),
(796, '471.43', 'Pendaftaran Penduduk Daerah Terbelakang'),
(797, '471.44', 'Pendaftaran Penduduk Rentan'),
(798, '472', 'Pencatatan Sipil'),
(799, '472.1', 'Kelahiran, Kematian Dan Advokasi'),
(800, '472.11', 'Kelahiran'),
(801, '472.12', 'Kematian'),
(802, '472.13', 'Advokasi Kelahiran Dan Kematian'),
(803, '472.2', 'Perkawinan, Peceraian Dan Advokasi'),
(804, '472.21', 'Perkawinan Agama Islam'),
(805, '472.22', 'Perkawinan Agama Non Islam'),
(806, '472.23', 'Perceraian Agama Islam'),
(807, '472.24', 'Perceraian Agama Non Islam'),
(808, '472.25', 'Advokasi Perkawinan Dan Perceraian'),
(809, '472.3', 'Pengangkatan, Pengakuan, Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta Dan Advokasi Pengangkatan Anak'),
(810, '472.31', 'Pengangkatan Anak'),
(811, '472.32', 'Pengakuan Anak'),
(812, '472.33', 'Pengesahan Anak'),
(813, '472.34', 'Perubahan Anak'),
(814, '472.35', 'Pembatalan Anak'),
(815, '472.36', 'Advokasi Pengurusan Pengangkatan, Pengakuan Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta'),
(816, '472.4', 'Pencatatan Kewarganegaraan'),
(817, '472.41', 'Akibat Perkawinan'),
(818, '472.42', 'Akibat Kelahiran'),
(819, '472.43', 'Non Perkawinan'),
(820, '472.44', 'Non Kelahiran'),
(821, '472.45', 'Perubahan WNI ke WNA'),
(822, '473', 'Informasi Kependudukan'),
(823, '473.1', 'Teknologi Informasi'),
(824, '473.11', 'Perangkat Keras'),
(825, '473.12', 'Perangkat Lunak'),
(826, '473.13', 'Jaringan Komunikasi Data'),
(827, '473.2', 'Kelembagaan Dan Sumber Daya Informasi'),
(828, '473.21', 'Daerah Maju'),
(829, '473.22', 'Daerah Berkembang'),
(830, '473.23', 'Daerah Terbelakang'),
(831, '473.3', 'Pengolahan Data Kependudukan'),
(832, '473.31', 'Pendaftaran Penduduk'),
(833, '473.32', 'Kejadian Vital Penduduk'),
(834, '473.33', 'Penduduk Non Registrasi'),
(835, '473.4', 'Pelayanan Informasi Kependudukan'),
(836, '473.41', 'Media Elektronik'),
(837, '473.42', 'Media Cetak'),
(838, '473.43', 'Outlet'),
(839, '474', 'Perkembangan Penduduk'),
(840, '474.1', 'Pengarahan Kuantitas Penduduk'),
(841, '474.11', 'Struktur Jumlah'),
(842, '474.12', 'Komposisi'),
(843, '474.13', 'Fertilitas'),
(844, '474.14', 'Kesehatan Reproduksi'),
(845, '474.15', 'Morbiditas Penduduk'),
(846, '474.16', 'Mortalitas Penduduk'),
(847, '474.2', 'Pengembangan Kuantitas Penduduk'),
(848, '474.21', 'Anak dan Remaja'),
(849, '474.22', 'Penduduk Usia Produktif'),
(850, '474.23', 'Penduduk Lanjut Usia'),
(851, '474.24', 'Gender'),
(852, '474.3', 'Penataan Persebaran Penduduk'),
(853, '474.31', 'Migrasi Antar Wilayah'),
(854, '474.32', 'Migrasi Internasional'),
(855, '474.33', 'Urbanisasi'),
(856, '474.34', 'Sementara'),
(857, '474.35', 'Migrasi Non Permanen'),
(858, '474.4', 'Perlindungan Pemberdayaan Penduduk'),
(859, '474.41', 'Pengembangan Sistem Pelindungan Penduduk'),
(860, '474.42', 'Pelayanan Kelembagaan Ekonomi'),
(861, '474.43', 'Pelayanan Kelembagaan Sosial Budaya'),
(862, '474.44', 'Partisipasi Masyarakat'),
(863, '474.5', 'Pengembangan Wawasan Kependudukan'),
(864, '474.51', 'Pendidikan Jalur Sekolah'),
(865, '474.52', 'Pendidikan Jalur Luar Sekolah'),
(866, '474.53', 'Pendidikan Jalur Masyarakat'),
(867, '474.54', 'Pembangunan Berwawasan Kependudukan'),
(868, '475', 'Proyeksi Dan Penyerasian Kebijakan Kependudukan'),
(869, '475.1', 'Indikator Kependudukan'),
(870, '475.11', 'Perumusan Penetapan Dan Pengembangan Indikator Kependudukan'),
(871, '475.12', 'Pemanfaatan Indikator Kependudukan'),
(872, '475.13', 'Sosialisasi Indikator Kependudukan'),
(873, '475.2', 'Proyeksi Kependudukan'),
(874, '475.21', 'Penyusunan Dan Pengembangan Proyeksi Kependudukan'),
(875, '475.22', 'Pemanfaatan Proyeksi Kependudukan'),
(876, '475.3', 'Analisis Dampak Kependudukan'),
(877, '475.31', 'Penyusunan Dan Pengembangan'),
(878, '475.32', 'Pemanfaatan Analisis Dampak Kependudukan'),
(879, '475.4', 'Penyerasian Kebijakan Lembaga Non Pemerintah'),
(880, '475.41', 'Lembaga Internasioanal'),
(881, '475.42', 'Lembaga Masyarakat Dan Nirlaba'),
(882, '475.43', 'Lembaga Usaha Swasta'),
(883, '475.5', 'Penyerasian Kebijakan Lembaga Pemerintah'),
(884, '475.51', 'Lembaga Pemerintah'),
(885, '475.52', 'Pemerintah Provinsidan Kota'),
(886, '475.53', 'Pemerintah Kabupaten'),
(887, '475.6', 'Analisis'),
(888, '476', 'Monitoring'),
(889, '477', 'Evaluasi'),
(890, '478', 'Dokumentasi'),
(891, '480', 'MEDIA MASSA'),
(892, '481', 'Penerbitan'),
(893, '481.1', 'Surat Kabar'),
(894, '481.2', 'Majalah'),
(895, '481.3', 'Buku'),
(896, '481.4', 'Penerjemahan'),
(897, '482', 'Radio'),
(898, '482.1', 'RRI'),
(899, '482.11', 'Siaran Pedesaan Jgn Diklasifikasikan Disini'),
(900, '482.2', 'Non RRI'),
(901, '482.3', 'Luar Negeri'),
(902, '483', 'Televisi'),
(903, '484', 'Film'),
(904, '485', 'Pers'),
(905, '485.1', 'Kewartawanan'),
(906, '485.2', 'Wawancara'),
(907, '485.3', 'Informasi Nasional'),
(908, '486', 'Grafika'),
(909, '487', 'Penerangan'),
(910, '487.1', 'Pameran Non Komersil'),
(911, '488', 'Operation Room'),
(912, '489', 'Hubungan Masyarakat'),
(913, '490', 'Pengaduan Masyarakat'),
(914, '500', 'PEREKONOMIAN'),
(915, '500.1', 'Dewan Stabilisasi'),
(916, '501', 'Pengadaan Pangan'),
(917, '502', 'Pengadaan Sandang'),
(918, '503', 'Perizinan Pada Umumnya Untuk Perizinan Suatu Bidang, Kalsifikasikan Masalahnya'),
(919, '510', 'PERDAGANGAN'),
(920, '510.1', 'Promosi Perdagangan'),
(921, '510.11', 'Pekan Raya'),
(922, '510.12', 'Iklan'),
(923, '510.13', 'Pameran Non Komersil'),
(924, '510.2', 'Pelelangan'),
(925, '510.3', 'Tera'),
(926, '511', 'Pemasaran'),
(927, '511.1', 'Sembilan Bahan Pokok, Tambahkan Kode Wilayah : Beras, Garam, Tanah, Minyak Goreng'),
(928, '511.2', 'Pasar'),
(929, '511.3', 'Pertokoan, Kaki Lima, Kios'),
(930, '512', 'Ekspor'),
(931, '513', 'Impor'),
(932, '514', 'Perdagangan Antar Pulau'),
(933, '515', 'Perdagangan Luar Negeri'),
(934, '516', 'Pergudangan'),
(935, '517', 'Aneka Usaha Perdagangan'),
(936, '518', 'Koperasi untuk BUUD, KUD lihat ( 412.31-412.32)'),
(937, '520', 'PERTANIAN'),
(938, '521', 'Tanaman Pangan'),
(939, '521.1', 'Program'),
(940, '521.11', 'Bimas / Inmas Termasuk Kredit'),
(941, '521.12', 'Penyuluhan'),
(942, '521.2', 'Produksi'),
(943, '521.21', 'Padi / Panen'),
(944, '521.22', 'Palawija'),
(945, '521.23', 'Jagung'),
(946, '521.24', 'Ketela Pohon / Ubi-Ubian'),
(947, '521.25', 'Hortikultura'),
(948, '521.26', 'Sayuran / Buah-Buahan'),
(949, '521.27', 'Tanaman Hias'),
(950, '521.28', 'Pembudidayaan Rumput Laut'),
(951, '521.3', 'Saran Usaha Pertanian'),
(952, '521.31', 'Peralatan Meliputi: Traktor Dan Peralatan Lainya'),
(953, '521.33', 'Pembibitan'),
(954, '521.34', 'Pupuk'),
(955, '521.4', 'Perlindungan Tanaman'),
(956, '521.41', 'Penyakit, Penyakit Daun, Penyakit Batang'),
(957, '521.42', 'Hama, Serangga, Wereng, Walang Sangit, Tungru, Tikus Dan Sejenisnya'),
(958, '521.43', 'Pemberantasan Hama Meliputi: Penyemprotan, Penyiangan, Geropyokan, Sparayer, Pemberantasan Melalui Udara'),
(959, '521.44', 'Pestisida'),
(960, '521.5', 'Tanah Pertanian Pangan'),
(961, '521.51', 'Persawahan'),
(962, '521.52', 'Perladangan'),
(963, '521.53', 'Kebun'),
(964, '521.54', 'Rumpun Ikan Laut'),
(965, '521.55', 'KTA/Lahan Kritis'),
(966, '521.6', 'Pengusaha Petani'),
(967, '521.7', 'Bina Usaha'),
(968, '521.71', 'Pasca Panen'),
(969, '521.72', 'Pemasaran Hasil'),
(970, '522', 'Kehutanan'),
(971, '522.1', 'Program'),
(972, '522.11', 'Hak Pengusahaan Hutan'),
(973, '522.12', 'Tata Guna Hutan'),
(974, '522.13', 'Perpetaan Hutan'),
(975, '522.14', 'Tumpangsari'),
(976, '522.2', 'Produksi'),
(977, '522.21', 'Kayu'),
(978, '522.22', 'Non Kayu'),
(979, '522.3', 'Sarana  Usaha  Kehutanan'),
(980, '522.4', 'Penghijauan, Reboisasi'),
(981, '522.5', 'Kelestarian'),
(982, '522.51', 'Cagar Alam, Marga Satwa, Suaka Marga Satwa'),
(983, '522.52', 'Berburu Meliputi Larangan Dan Ijin Berburu'),
(984, '522.53', 'Kebun Binatang'),
(985, '522.54', 'Konservasi Lahan'),
(986, '522.6', 'Penyakit/Hama'),
(987, '522.7', 'Jenis-jenis Hutan'),
(988, '522.71', 'Hutan Hidup'),
(989, '522.72', 'Hutan Wisata'),
(990, '522.73', 'Hutan Produksi'),
(991, '522.74', 'Hutan Lindung'),
(992, '523', 'Perikanan'),
(993, '523.1', 'Program'),
(994, '523.11', 'Penyuluhan'),
(995, '523.12', 'Teknologi'),
(996, '523.2', 'Produksi'),
(997, '523.21', 'Pelelangan'),
(998, '523.3', 'Usaha Perikanan'),
(999, '523.31', 'Pembibitan'),
(1000, '523.32', 'Daerah Penagkapan'),
(1001, '523.33', 'Pertambakan Meliputi: ( Tambak Ikan Air Deras, Tambak Udang dll )'),
(1002, '523.34', 'Jaring Terapung'),
(1003, '523.4', 'Sarana'),
(1004, '523.41', 'Peralatan'),
(1005, '523.42', 'Kapal'),
(1006, '523.43', 'Pelabuhan'),
(1007, '523.5', 'Pengusaha'),
(1008, '523.6', 'Nelayan'),
(1009, '524', 'Peternakan'),
(1010, '524.1', 'Produksi'),
(1011, '524.11', 'Susu Ternak Rakyat'),
(1012, '524.12', 'Telur'),
(1013, '524.13', 'Daging'),
(1014, '524.14', 'Kulit'),
(1015, '524.2', 'Sarana Usaha Ternak'),
(1016, '524.21', 'Pembibitan'),
(1017, '524.22', 'Kandang Ternak'),
(1018, '524.3', 'Kesehatan Hewan'),
(1019, '524.31', 'Penyakit Hewan'),
(1020, '524.32', 'Pos Kesehatan Hewan'),
(1021, '524.33', 'Tesi Pullorum'),
(1022, '524.34', 'Karantina'),
(1023, '524.35', 'Pemberantasan Penyakit Hewan Termasuk Usaha Pencegahannya'),
(1024, '524.4', 'Perunggasan'),
(1025, '524.5', 'Pengembangan Ternak'),
(1026, '524.51', 'Inseminasi Buatan'),
(1027, '524.52', 'Pembibitan / Bibit Unggul'),
(1028, '524.53', 'Penyebaran Ternak'),
(1029, '524.6', 'Makanan Ternak'),
(1030, '524.7', 'Tempat Pemotongan Hewan'),
(1031, '524.8', 'Data Peternakan'),
(1032, '524', 'Perkebunan'),
(1033, '524.1', 'Program'),
(1034, '524.2', 'Produksi'),
(1035, '524.21', 'Karet'),
(1036, '524.22', 'The'),
(1037, '524.23', 'Tembakau'),
(1038, '524.24', 'Tebu'),
(1039, '524.25', 'Cengkeh'),
(1040, '524.26', 'Kopra'),
(1041, '524.27', 'Kopi'),
(1042, '524.28', 'Coklat'),
(1043, '524.29', 'Aneka Tanaman'),
(1044, '530', 'PERINDUSTRIAN'),
(1045, '530.08', 'Undang-Undang Gangguan'),
(1046, '531', 'Industri Logam'),
(1047, '532', 'Industri Mesin/Elektronik'),
(1048, '533', 'Industri Kimia/Farmasi'),
(1049, '534', 'Industri Tekstil'),
(1050, '535', 'Industri Makanan / Minuman'),
(1051, '536', 'Aneka Industri / Perusahaan'),
(1052, '537', 'Aneka Kerajinan'),
(1053, '538', 'Usaha Negara / BUMN'),
(1054, '538.1', 'Perjan'),
(1055, '538.2', 'Perum'),
(1056, '538.3', 'Persero / PT, CV'),
(1057, '539', 'Perusahaan Daerah / BUMD/BULD'),
(1058, '540', 'PERTAMBANGAN / KESAMUDRAAN'),
(1059, '541', 'Minyak Bumi / Bensin'),
(1060, '541.1', 'Pengusahaan'),
(1061, '542', 'Gas bumi'),
(1062, '542.1', 'Eksploitasi / Pengeboran'),
(1063, '542.11', 'Kontrak Kerja'),
(1064, '542.2', 'Penogolahan,Meliputi :Tangki, Pompa, Tanker'),
(1065, '543', 'Aneka Tambang'),
(1066, '543.1', 'Timah'),
(1067, '543.2', 'Alumunium, Boxit'),
(1068, '543.3', 'Besi Termasuk Besi Tua'),
(1069, '543.4', 'Tembaga'),
(1070, '543.5', 'Batu Bara'),
(1071, '544', 'Logam Mulia,Emas,Intan,Perak'),
(1072, '545', 'Logam'),
(1073, '546', 'Geologi'),
(1074, '546.1', 'Vulkanologi'),
(1075, '546.11', 'Pengawasan Gunung Berapi'),
(1076, '546.2', 'Sumur Artesis, Air Bawah Tanah'),
(1077, '547', 'Hidrologi'),
(1078, '548', 'Kesamudraan'),
(1079, '549', 'Pesisir Pantai'),
(1080, '550', 'PERHUBUNGAN'),
(1081, '551', 'Perhubungan Darat'),
(1082, '551.1', 'Lalu Lintas Jalan Raya, Sungai, Danau'),
(1083, '551.11', 'Keamanan Lalu Lintas, Rambu-Rambu'),
(1084, '551.2', 'Angkutan Jalan Raya'),
(1085, '551.21', 'Perizinan'),
(1086, '551.22', 'Terminal'),
(1087, '551.23', 'Alat Angkutan'),
(1088, '551.3', 'Angkutan Sungai'),
(1089, '551.31', 'Perizinan'),
(1090, '551.32', 'Terminal'),
(1091, '551.33', 'Pelabuhan'),
(1092, '551.4', 'Angkutan Danau'),
(1093, '551.41', 'Perizinan'),
(1094, '551.42', 'Terminal'),
(1095, '551.43', 'Pelabuhan'),
(1096, '551.5', 'Feri'),
(1097, '551.51', 'Perizinan'),
(1098, '551.52', 'Terminal'),
(1099, '551.53', 'Pelabuhan'),
(1100, '551.6', 'Perkereta-Apian'),
(1101, '552', 'Perhubungan Laut'),
(1102, '552.1', 'Lalu Lintas Angkutan Laut, Pelayanan Umum'),
(1103, '552.11', 'Keamanan Lalu Lintas, Rambu-Rambu'),
(1104, '552.12', 'Pelayaran Dalam Negeri'),
(1105, '552.13', 'Pelayaran Luar Negeri'),
(1106, '552.2', 'Perkapalan Alat Angkutan'),
(1107, '552.3', 'Pelabuhan'),
(1108, '552.4', 'Pengerukan'),
(1109, '552.5', 'Penjagaan Pantai'),
(1110, '553', 'Perhubungan Udara'),
(1111, '553.1', 'Lalu Lintas Udara / Keamanan Lalu Lintas Udara'),
(1112, '553.2', 'Pelabuhan Udara'),
(1113, '553.3', 'Alat Angkutan'),
(1114, '554', 'Pos'),
(1115, '555', 'Telekomunikasi'),
(1116, '555.1', 'Telepon'),
(1117, '555.2', 'Telegram'),
(1118, '555.3', 'Telex / SSB, Faximile'),
(1119, '555.4', 'Satelit, Internet'),
(1120, '555.5', 'Stasiun Bumi, Parabola'),
(1121, '556', 'Pariwisata dan Rekreasi'),
(1122, '556.1', 'Obyek Kepariwisataan Taman Mini Indonesia Indah'),
(1123, '556.2', 'Perhotelan'),
(1124, '556.3', 'Travel service'),
(1125, '556.4', 'Tempat Rekreasi'),
(1126, '557', 'Meteorologi'),
(1127, '557.1', 'Ramalan Cuaca'),
(1128, '557.2', 'Curah Hujan'),
(1129, '557.3', 'Kemarau Panjang'),
(1130, '560', 'TENAGA KERJA'),
(1131, '560.1', 'Pengangguran'),
(1132, '561', 'Upah'),
(1133, '562', 'Penempatan Tenaga Kerja, TKI'),
(1134, '563', 'Latihan Kerja'),
(1135, '564', 'Tenaga Kerja'),
(1136, '564.1', 'Butsi'),
(1137, '564.2', 'Padat Karya'),
(1138, '565', 'Perselisihan Perburuhan'),
(1139, '566', 'Keselamatan Kerja'),
(1140, '567', 'Pemutusan Hubungan Kerja'),
(1141, '568', 'kesejahteraan Buruh'),
(1142, '569', 'Tenaga Orang Asing'),
(1143, '570', 'PERMODALAN'),
(1144, '571', 'Modal Domestik'),
(1145, '572', 'Modal Asing'),
(1146, '573', 'Modal Patungan (Joint Venture) / Penyertaan Modal'),
(1147, '574', 'Pasar Uang Dan Modal'),
(1148, '575', 'Saham'),
(1149, '576', 'Belanja Modal'),
(1150, '577', 'Modal Daerah'),
(1151, '580', 'PERBANKAN / MONETER'),
(1152, '581', 'Kredit'),
(1153, '582', 'Investasi'),
(1154, '583', 'Pembukaan ,Perubahan,Penutupan Rekening, Deposito'),
(1155, '584', 'Bank Pembangunan Daerah'),
(1156, '585', 'Asuransi Dana Kecelakaan Lalu Lintas'),
(1157, '586', 'Alat Pembayaran, Cek, Giro, Wesel, Transfer'),
(1158, '587', 'Fiskal'),
(1159, '588', 'Hutang Negara'),
(1160, '589', 'Moneter'),
(1161, '590', 'AGRARIA'),
(1162, '591', 'Tataguna Tanah'),
(1163, '591.1', 'Pemetaan dan Pengukuran'),
(1164, '591.2', 'Perpetaan'),
(1165, '591.3', 'penyediaan Data'),
(1166, '591.4', 'Fatwa Tata Guna Tanah'),
(1167, '591.5', 'Tanah Kritis'),
(1168, '592', 'Landreform'),
(1169, '592.1', 'Redistribusi'),
(1170, '592.11', 'Pendaftaran Pemilikan Dan Pengurusan'),
(1171, '592.12', 'Penentuan Tanah Obyek Landreform'),
(1172, '592.13', 'Pembagian Tanah Obyek Landreform'),
(1173, '592.14', 'Sengketa Redistribusi Tanah Obyek Landreform'),
(1174, '592.2', 'Ganti Rugi'),
(1175, '592.21', 'Ganti Rugi Tanah Kelebihan'),
(1176, '592.22', 'Ganti Rugi Tanah Absentee'),
(1177, '592.23', 'Ganti Rugi Tanah Partikelir'),
(1178, '592.3', 'Bagi Hasil'),
(1179, '592.31', 'Penetapan Imbangan Bagi Hasil'),
(1180, '592.32', 'Pelaksanaan Perjanjian Bagi Hasil'),
(1181, '592.33', 'Sengketa Perjanjian Bagi Hasil'),
(1182, '592.4', 'Gadai Tanah'),
(1183, '592.41', 'Pendaftaran Pemilikan Dan Pengurusan'),
(1184, '592.42', 'Pelaksanaan Gadai Tanah'),
(1185, '592.43', 'Sengketa Gadai Tanah'),
(1186, '592.5', 'Bimbingan dan Penyuluhan'),
(1187, '592.6', 'Pengembangan'),
(1188, '592.7', 'Yayasan Dana Landreform'),
(1189, '593', 'Pengurusan Hak-Hak Tanah'),
(1190, '593.01', 'Penyusunan Program Dan Bimbingan Teknis'),
(1191, '593.1', 'Sewa Tanah'),
(1192, '593.11', 'Sewa Tanah Untuk Tanaman Tertentu, Tebu, Tembakau, Rosela, Chorcorus'),
(1193, '593.2', 'Hak Milik'),
(1194, '593.21', 'Perorangan'),
(1195, '593.22', 'Badan Hukum'),
(1196, '593.3', 'Hak Pakai'),
(1197, '593.31', 'Perorangan'),
(1198, '593.311', 'Warga Negara Indonesia'),
(1199, '593.312', 'Warga Negara Asing'),
(1200, '593.32', 'Badan Hukum'),
(1201, '593.321', 'Badan Hukum Indonesia'),
(1202, '593.322', 'Badan Hukum Asing, Kedutaan, Konsulat Kantor Dagang Asing'),
(1203, '593.33', 'Tanah Gedung-Gedung Negara'),
(1204, '593.4', 'Guna Usaha'),
(1205, '593.41', 'Perkebunan Besar'),
(1206, '593.42', 'Perkebunan Rakyat'),
(1207, '593.43', 'Peternakan'),
(1208, '593.44', 'Perikanan'),
(1209, '593.45', 'Kehutanan'),
(1210, '593.5', 'Hak Guna Bangunan'),
(1211, '593.51', 'Perorangan'),
(1212, '593.52', 'Badan Hukum'),
(1213, '593.53', 'P3MB (Panitia Pelaksana Penguasaan Milik Belanda)'),
(1214, '593.54', 'Badan Hukum Asing Belanda-Prrk No 5165'),
(1215, '593.55', 'Pemulihan Hak (Pen Pres 4/1960)'),
(1216, '593.6', 'Hak Pengelolaan'),
(1217, '593.61', 'PN Perumnas, Bonded Ware House, Industrial Estate, Real Estate'),
(1218, '593.62', 'Perusahaan Daerah Pembangunan Perumahan'),
(1219, '593.7', 'Sengketa Tanah'),
(1220, '593.71', 'Peradilan Perkara Tanah'),
(1221, '593.8', 'Pencabutan dan Pembebasan Tanah'),
(1222, '593.81', 'Pencabutan Hak'),
(1223, '593.82', 'Pembebasan Tanah'),
(1224, '593.83', 'Ganti Rugi Tanah'),
(1225, '594', 'Pendaftaran Tanah'),
(1226, '594.1', 'Pengukuran / Pemetaan'),
(1227, '594.11', 'Fotogrametri'),
(1228, '594.12', 'Terristris'),
(1229, '594.13', 'Triangulasi'),
(1230, '594.14', 'Peralatan'),
(1231, '594.2', 'Dana Pengukuran (Permen Agraria No. 61/1965)'),
(1232, '594.3', 'Sertifikat'),
(1233, '594.4', 'Pejabat Pembuat Akta Tanah (PPAT)'),
(1234, '595', 'Lahan Transmigrasi'),
(1235, '595.1', 'Tataguna Tanah'),
(1236, '595.2', 'Landreform'),
(1237, '595.3', 'Pengurusan Hak-Hak Tanah'),
(1238, '595.4', 'Pendaftaran Tanah'),
(1239, '600', 'PEKERJAAN UMUM DAN KETENAGAKERJAAN'),
(1240, '601', 'Tata Bangunan Konstruksi Dan Industri Konstruksi'),
(1241, '602', 'Kontraktor Pemborong'),
(1242, '602.1', 'Tender'),
(1243, '602.2', 'Pennunjukan'),
(1244, '602.3', 'Prakualifikasi'),
(1245, '602.31', 'Daftar Rekanan Mampu (DRM)'),
(1246, '602.32', 'Tanda Daftar Rekanan'),
(1247, '603', 'Arsitektur'),
(1248, '604', 'Bahan Bangunan'),
(1249, '604.1', 'Tanah Dan Batu Seperti: Batu Belah, Steen Slaag, Split dsb'),
(1250, '604.2', 'Aspal, Aspal Buatan, Aspal Alam (butas)'),
(1251, '604.3', 'Besi Dan Logam Lainnya'),
(1252, '604.31', 'Besi Beton'),
(1253, '604.32', 'Besi Profil'),
(1254, '604.33', 'Paku'),
(1255, '604.34', 'Alumunium, Profil'),
(1256, '604.4', 'Bahan-Bahan Pelindung Dan Pengawet (Cat, Tech Til, Pengawet Kayu)'),
(1257, '604.5', 'Semen'),
(1258, '604.6', 'Kayu'),
(1259, '604.7', 'Bahan Penutup Atap ( Genting, Asbes Gelombang, Seng Dan Sebagainya)'),
(1260, '604.8', 'Alat-Alat Penggantung Dan Pengunci'),
(1261, '604.9', 'Bahan-Bahan Bangunan Lainnya'),
(1262, '605', 'Instalasi'),
(1263, '605.1', 'Instalasi Bangunan'),
(1264, '605.2', 'Instalasi Listrik'),
(1265, '605.3', 'Instalasi Air Sanitasi'),
(1266, '605.4', 'Instalasi Pengatur Udara'),
(1267, '605.5', 'Instalasi Akustik'),
(1268, '605.6', 'Instalasi Cahaya / Penerangan'),
(1269, '606', 'Konstruksi Pencegahan'),
(1270, '606.1', 'Konstruksi Pencegahan Terhadap Kebakaran'),
(1271, '606.2', 'Konstruksi Pencegahan Terhadap Gempa'),
(1272, '606.3', 'Konstruksi Penegahan Terhadap Angin Udara/Panas'),
(1273, '606.4', 'Konstruksi Pencegahan Terhadap Kegaduhan'),
(1274, '606.5', 'Konstruksi Pencegahan Terhadap Gas/Explosive'),
(1275, '606.6', 'Konstruksi Pencegahan Terhadap Serangga'),
(1276, '606.7', 'Konstruksi Pencegahan Terhadap Radiasi Atom'),
(1277, '610', 'PENGAIRAN'),
(1278, '611', 'Irigasi'),
(1279, '611.1', 'Bangunan Waduk'),
(1280, '611.11', 'Bendungan'),
(1281, '611.12', 'Tanggul'),
(1282, '611.13', 'Pelimpahan Banjir'),
(1283, '611.14', 'Menara Pengambilan'),
(1284, '611.2', 'Bangunan Pengambilan'),
(1285, '611.21', 'Bendungan'),
(1286, '611.22', 'Bendungan Dengan Pintu Bilas'),
(1287, '611.23', 'Bendungan Dengan Pompa'),
(1288, '611.24', 'Pengambilan Bebas'),
(1289, '611.25', 'Pengambilan Bebas Dengan Pompa'),
(1290, '611.26', 'Sumur Dengan Pompa'),
(1291, '611.27', 'Kantung Lumpur'),
(1292, '611.28', 'Slit Ekstrator'),
(1293, '611.29', 'Escope Channel'),
(1294, '611.3', 'Bangunan Pembawa'),
(1295, '611.31', 'Saluran'),
(1296, '611.311', 'Saluran Induk'),
(1297, '611.312', 'Saluran Sekunder'),
(1298, '611.313', 'Suplesi'),
(1299, '611.314', 'Tersier'),
(1300, '611.315', 'Saluran Kwarter'),
(1301, '611.316', 'Saluran Pasangan'),
(1302, '611.317', 'Saluran Tertutup / Terowongan'),
(1303, '611.32', 'Bangunan'),
(1304, '611.321', 'Bangunan Bagi'),
(1305, '611.322', 'Bangunan Bagi Dan Sadap'),
(1306, '611.323', 'Bangunan Sadap'),
(1307, '611.324', 'Bangunan Check'),
(1308, '611.325', 'Bangunan Terjun'),
(1309, '611.33', 'Box Tersier'),
(1310, '611.34', 'Got Miring'),
(1311, '611.35', 'Talang'),
(1312, '611.36', 'Syphon'),
(1313, '611.37', 'Gorong-Gorong'),
(1314, '611.38', 'Pelimpah Samping'),
(1315, '611.4', 'Bangunan Pembuang'),
(1316, '611.41', 'Saluran'),
(1317, '611.411', 'Saluran Pembuang Induk'),
(1318, '611.412', 'Saluran Pembuang Sekunder'),
(1319, '611.413', 'Saluran Tersier'),
(1320, '611.42', 'Bangunan'),
(1321, '611.421', 'Bangunan Outlet'),
(1322, '611.422', 'Bangunan Terjun'),
(1323, '611.423', 'Bangunan Penahan Banjir'),
(1324, '611.43', 'Gorong-Gorong Pembuang'),
(1325, '611.44', 'Talang Pembuang'),
(1326, '611.45', 'Syphon Pembuang'),
(1327, '611.5', 'Bangunan Lainnya'),
(1328, '611.51', 'Jalan'),
(1329, '611.511', 'Jalan Inspeksi'),
(1330, '611.512', 'Jalan Logistik Waduk Lapangan'),
(1331, '611.52', 'Jembatan'),
(1332, '611.521', 'Jembatan Inspeksi'),
(1333, '611.522', 'Jembatan Hewan');
INSERT INTO `tb_klasifikasi` (`id`, `kode`, `klasifikasi`) VALUES
(1334, '611.53', 'Tangga Cuci'),
(1335, '611.54', 'Kubangan Kerbau'),
(1336, '611.55', 'Waduk Lapangan'),
(1337, '611.56', 'Bangunan Penunjang'),
(1338, '611.57', 'Jaringan Telepon'),
(1339, '611.58', 'Stasiun Agro'),
(1340, '612', 'Folder'),
(1341, '612.1', 'Tanggul Keliling'),
(1342, '612.11', 'Tanggul'),
(1343, '612.12', 'Bangunan Penutup Sungai'),
(1344, '612.13', 'Jembatan'),
(1345, '612.2', 'Bangunan Pembawa'),
(1346, '612.21', 'Saluran'),
(1347, '612.211', 'Saluran Muka'),
(1348, '612.212', 'Saluran Pembawa Waduk'),
(1349, '612.213', 'Saluran Pembawa Sekunder'),
(1350, '612.22', 'Stasiun Pompa Pemasukan'),
(1351, '612.23', 'Bangunan Bagi'),
(1352, '612.24', 'Gorong-Gorong'),
(1353, '612.25', 'Syphon'),
(1354, '612.3', 'Bangunan Pembuang'),
(1355, '612.31', 'Stasiun Pompa Pembuang'),
(1356, '612.32', 'Saluran'),
(1357, '612.321', 'Saluran Pembuang Induk'),
(1358, '612.322', 'Saluran Pembuang Sekunder'),
(1359, '612.33', 'Pintu Air Pembuangan'),
(1360, '612.34', 'Gorong-Gorong Pembuangan'),
(1361, '612.35', 'Syphon Pembuangan'),
(1362, '612.4', 'Bangunan Lainnya'),
(1363, '612.41', 'Bangunan'),
(1364, '612.411', 'Bangunan Pengukur Air'),
(1365, '612.412', 'Bangunan Pengukur Curah Hujan'),
(1366, '612.413', 'Bangunan Gudang Stasiun Pompa'),
(1367, '612.414', 'Bangunan Listrik Stasiun Pompa'),
(1368, '612.42', 'Rumah Petugas Aksploitasi'),
(1369, '613', 'Pasang Surut'),
(1370, '613.1', 'Bangunan Pembawa'),
(1371, '613.11', 'Saluran'),
(1372, '613.111', 'Saluran Pembawa Induk'),
(1373, '613.112', 'Saluran Pembawa Sekunder'),
(1374, '613.113', 'Saluran Pembawa Tersier'),
(1375, '613.114', 'Saluran penyimpanan air'),
(1376, '613.12', 'Bangunan Pintu Pemasukan'),
(1377, '613.2', 'Bangunan Pembuang'),
(1378, '613.21', 'Saluran'),
(1379, '613.211', 'Saluran Pembuang Induk'),
(1380, '613.212', 'Saluran Pembuang Sekunder'),
(1381, '613.213', 'Saluran Pembuang Tersier'),
(1382, '613.214', 'Saluran Pengumpul Air'),
(1383, '613.22', 'Bangunan Pintu Pembuang'),
(1384, '613.3', 'Bangunan Lainnya'),
(1385, '613.31', 'Kolam Pasang'),
(1386, '613.32', 'Saluran'),
(1387, '613.321', 'Saluran Lalu Lintas'),
(1388, '613.322', 'Saluran Muka'),
(1389, '613.33', 'Bangunan'),
(1390, '613.331', 'Bangunan Penangkis Kotoran'),
(1391, '613.332', 'Bangunan Pengukur Muka Air'),
(1392, '613.333', 'Bangunan Pengukur Curah Hujan'),
(1393, '613.34', 'Jalan'),
(1394, '613.35', 'Jembatan'),
(1395, '614', 'Pengendalian Sungai'),
(1396, '614.1', 'Bangunan Pengaman'),
(1397, '614.11', 'Tanggul Banjir'),
(1398, '614.12', 'Pintu Pengatur Banjir'),
(1399, '614.13', 'Klep Pengatur Banjir'),
(1400, '614.14', 'Tembok Pengaman Talud'),
(1401, '614.15', 'Krib'),
(1402, '614.16', 'Kantung Lumpur'),
(1403, '614.17', 'Check-Dam'),
(1404, '614.18', 'Syphon'),
(1405, '614.2', 'Saluran Pengaman'),
(1406, '614.21', 'Saluran Banjir'),
(1407, '614.22', 'Saluran Drainage'),
(1408, '614.23', 'Corepure'),
(1409, '614.3', 'Bangunan Lainnya'),
(1410, '614.31', 'Warning System'),
(1411, '614.32', 'Stasiun'),
(1412, '614.321', 'Stasiun Pengukur Curah Hujan'),
(1413, '614.322', 'Stasiun Pengukur Air'),
(1414, '614.323', 'Stasiun Pengukur Cuaca'),
(1415, '614.324', 'Stasiun Pos Penjagaan'),
(1416, '615', 'Pengamanan Pantai'),
(1417, '615.1', 'Tanggul'),
(1418, '615.2', 'Krib'),
(1419, '615.3', 'Bangunan Lainnya'),
(1420, '616', 'Air Tanah'),
(1421, '616.1', 'Stasiun Pompa\\'),
(1422, '616.2', 'Bangunan Pembawa'),
(1423, '616.3', 'Bangunan Pembuang'),
(1424, '616.4', 'Bangunan Lainnya'),
(1425, '620', 'JALAN'),
(1426, '621', 'Jalan Kota'),
(1427, '621.1', 'Daerah Penguasaan'),
(1428, '621.11', 'Tanah'),
(1429, '621.12', 'Tanaman'),
(1430, '621.13', 'Bangunan'),
(1431, '621.2', 'Bangunan Sementara'),
(1432, '621.21', 'Jalan Sementara'),
(1433, '621.22', 'Jembatan Sementara'),
(1434, '621.23', 'Kantor Proyek'),
(1435, '621.24', 'Gedung Proyek'),
(1436, '621.25', 'Barak Kerja'),
(1437, '621.26', 'Laboratorium Lapangan'),
(1438, '621.27', 'Rumah'),
(1439, '621.3', 'Badan Jalan'),
(1440, '621.31', 'Pekerjaan Tanah (Earth Work)'),
(1441, '621.32', 'Stabilisasi'),
(1442, '621.4', 'Perkerasan'),
(1443, '621.41', 'Lapis Pondasi Bawah'),
(1444, '621.42', 'Lapis Pondasi'),
(1445, '621.43', 'Lapis Permukaan'),
(1446, '621.5', 'Drainage'),
(1447, '621.51', 'Parit Tanah'),
(1448, '621.52', 'Gorong-Gorong (Culvert)'),
(1449, '621.6', 'Buku Trotuir'),
(1450, '621.61', 'Tanah'),
(1451, '621.62', 'Perkerasan'),
(1452, '621.63', 'Pasangan'),
(1453, '621.7', 'Median'),
(1454, '621.71', 'Tanah'),
(1455, '621.72', 'Tanaman'),
(1456, '621.73', 'Perkerasan'),
(1457, '621.74', 'Pasangan'),
(1458, '621.8', 'Daerah Samping'),
(1459, '621.82', 'Tanaman'),
(1460, '621.83', 'Pagar'),
(1461, '621.9', 'Bangunan Pelengkap Dan Pengamanan'),
(1462, '621.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas'),
(1463, '621.92', 'Lampu Penerangan'),
(1464, '621.93', 'Lampu Pengatur Lalu Lintas'),
(1465, '621.94', 'Patok-Patok KM'),
(1466, '621.95', 'Patok-Patok ROW (Sempadan)'),
(1467, '621.96', 'Rel Pengamanan'),
(1468, '621.97', 'Pagar'),
(1469, '621.98', 'Turap Penahan'),
(1470, '621.99', 'Bronjong'),
(1471, '622', 'Jalan Luar Kota'),
(1472, '622.1', 'Daerah Penguasaan'),
(1473, '622.11', 'Tanah'),
(1474, '622.12', 'Tanaman'),
(1475, '622.13', 'Bangunan'),
(1476, '622.2', 'Bangunan Sementara'),
(1477, '622.21', 'Jalan Sementara'),
(1478, '622.22', 'Jembatan Sementara'),
(1479, '622.23', 'Kantor Proyek'),
(1480, '622.24', 'Gudang Proyek'),
(1481, '622.25', 'Barak Kerja'),
(1482, '622.26', 'Laboratorium Lapangan'),
(1483, '622.27', 'Rumah'),
(1484, '622.3', 'Badan Jalan'),
(1485, '622.31', 'Pekerjaan Tanah (Earth Work)'),
(1486, '622.32', 'Stabilisasi'),
(1487, '622.4', 'Perkerasan'),
(1488, '622.41', 'Lapis Pondasi Bawah'),
(1489, '622.42', 'Lapis Pondasi'),
(1490, '622.43', 'Lapis Permukaan'),
(1491, '622.5', 'Drainage'),
(1492, '622.51', 'Parit'),
(1493, '622.52', 'Gorong-Gorong (Culvert)'),
(1494, '622.53', 'Sub Drainage'),
(1495, '622.6', 'Trotoar'),
(1496, '622.61', 'Tanah'),
(1497, '622.62', 'Perkerasan'),
(1498, '622.7', 'Median'),
(1499, '622.71', 'Tanah'),
(1500, '622.72', 'Tanaman'),
(1501, '622.73', 'Perkerasan'),
(1502, '622.74', 'Pasangan'),
(1503, '622.8', 'Daerah Samping'),
(1504, '622.81', 'Tanaman'),
(1505, '622.82', 'Pagar'),
(1506, '622.9', 'Bangunan Pelengkap Dan Pengamanan'),
(1507, '622.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas'),
(1508, '622.92', 'Lampu Penerangan'),
(1509, '622.93', 'Lampu Pengatur Lalu Lintas'),
(1510, '622.94', 'Patok-Patok KM'),
(1511, '622.95', 'Patok-Patok ROW (Sempadan)'),
(1512, '622.96', 'Rel Pengamanan'),
(1513, '622.97', 'Pagar'),
(1514, '622.98', 'Turap Penahan'),
(1515, '622.99', 'Bronjong'),
(1516, '630', 'JEMBATAN'),
(1517, '631', 'Jembatan Pada Jalan Kota'),
(1518, '631.1', 'Daerah Penguasaan'),
(1519, '631.11', 'Tanah'),
(1520, '631.12', 'Tanaman'),
(1521, '631.13', 'Bangunan'),
(1522, '631.2', 'Bangunan Sementara'),
(1523, '631.21', 'Jalan Sementara'),
(1524, '631.22', 'Jembatan Sementara'),
(1525, '631.23', 'Kantor Proyek'),
(1526, '631.24', 'Gudang Proyek'),
(1527, '631.25', 'Barak Kerja'),
(1528, '631.26', 'Laboratorium Lapangan'),
(1529, '631.27', 'Rumah'),
(1530, '631.3', 'Pekerjaan Tanah (Earth Work)'),
(1531, '631.31', 'Galian Tanah'),
(1532, '631.32', 'Timbunan Tanah'),
(1533, '631.4', 'Pondasi'),
(1534, '631.41', 'Pondasi Kepala Jalan'),
(1535, '631.42', 'Pondasi Pilar'),
(1536, '631.43', 'Angker'),
(1537, '631.5', 'Bangunan Bawah'),
(1538, '631.51', 'Kepala Jembatan'),
(1539, '631.52', 'Pilar'),
(1540, '631.53', 'Piloon'),
(1541, '631.54', 'Landasan'),
(1542, '631.6', 'Bangunan'),
(1543, '631.61', 'Gelagar'),
(1544, '631.62', 'Lantai'),
(1545, '631.63', 'Perkerasan'),
(1546, '631.64', 'Jalan Orang / Trotoar'),
(1547, '631.65', 'Sandaran'),
(1548, '631.66', 'Talang air'),
(1549, '631.7', 'Bangunan / Pengaman'),
(1550, '631.71', 'Turap Penahan'),
(1551, '631.72', 'Bronjong'),
(1552, '631.74', 'Kist Dam'),
(1553, '631.75', 'Corepure'),
(1554, '631.76', 'Krib'),
(1555, '631.8', 'Bangunan Pelengkap'),
(1556, '631.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas'),
(1557, '631.82', 'Lampu Penerangan'),
(1558, '631.83', 'Lampu Pengatur Lalu Lintas'),
(1559, '631.84', 'Patok Pengaman'),
(1560, '631.85', 'Patok ROW (Sempadan)'),
(1561, '631.86', 'Pagar'),
(1562, '631.9', 'Oprit'),
(1563, '631.91', 'Badan'),
(1564, '631.92', 'Perkerasan'),
(1565, '631.93', 'Drainage'),
(1566, '631.94', 'Baku'),
(1567, '631.95', 'Median'),
(1568, '632', 'Jembatan Pada Jalan Luar Kota'),
(1569, '632.1', 'Daerah Penguasaan'),
(1570, '632.11', 'Tanah'),
(1571, '632.12', 'Tanaman'),
(1572, '632.13', 'Bangunan'),
(1573, '632.2', 'Bangunan Sementara'),
(1574, '632.21', 'Jalan Sementara'),
(1575, '632.22', 'Jembatan Sementara'),
(1576, '632.23', 'Kantor Proyek'),
(1577, '632.24', 'Gudang Proyek'),
(1578, '632.25', 'Barak Kerja'),
(1579, '632.26', 'Laboratorium Lapangan'),
(1580, '632.27', 'Rumah'),
(1581, '632.3', 'Pekerjaan Tanah (Earth Work)'),
(1582, '632.31', 'Galian Tanah'),
(1583, '632.32', 'Timnunan Tanah'),
(1584, '632.4', 'Pondasi'),
(1585, '632.41', 'Pondasi Kepala Jembatan'),
(1586, '632.42', 'Pondasi Pilar'),
(1587, '632.43', 'Pondasi Angker'),
(1588, '632.5', 'Bangunan Bawah'),
(1589, '632.51', 'Kepala Jembatan'),
(1590, '632.52', 'Pilar'),
(1591, '632.53', 'Piloon'),
(1592, '632.54', 'Landasan'),
(1593, '632.6', 'Bangunan Atas'),
(1594, '632.61', 'Gelagar'),
(1595, '632.62', 'Lantai'),
(1596, '632.63', 'Perkerasan'),
(1597, '632.64', 'Jalan Orang / Trotoar'),
(1598, '632.65', 'Sandaran'),
(1599, '632.66', 'Talang Air'),
(1600, '632.7', 'Bangunan Pengaman'),
(1601, '632.71', 'Turap / Penahan'),
(1602, '632.72', 'Bronjong'),
(1603, '632.73', 'Stek Dam'),
(1604, '632.74', 'Kist Dam'),
(1605, '632.75', 'Corepure'),
(1606, '632.76', 'Krib'),
(1607, '632.8', 'Bangunan Pelengkap'),
(1608, '632.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas'),
(1609, '632.82', 'Lampu Penerangan'),
(1610, '632.83', 'Lampu Pengatur Lalu Lintas'),
(1611, '632.84', 'Patok Pengaman'),
(1612, '632.85', 'Patok ROW (Sempadan)'),
(1613, '632.86', 'Pagar'),
(1614, '632.9', 'Oprit'),
(1615, '632.91', 'Badan'),
(1616, '632.92', 'Perkerasan'),
(1617, '632.93', 'Drainage'),
(1618, '632.94', 'Baku'),
(1619, '632.95', 'Median'),
(1620, '640', 'BANGUNAN'),
(1621, '640.1', 'Gedung Pengadilan'),
(1622, '640.2', 'Rumah Pejabat Negara'),
(1623, '640.3', 'Gedung DPR'),
(1624, '640.4', 'Gedung Balai Kota'),
(1625, '640.5', 'Penjara'),
(1626, '640.6', 'Perkantoran'),
(1627, '642', 'Bangunan Pendidikan'),
(1628, '642.1', 'Taman Kanak-Kanak'),
(1629, '642.2', 'SD & SEKOLAH MENENGAH'),
(1630, '642.3', 'Perguruan Tinggi'),
(1631, '643', 'Bangunan Rekreasi'),
(1632, '643.1', 'BANGUNAN OLAH RAGA'),
(1633, '643.2', 'Gedung Kesenian'),
(1634, '643.3', 'Gedung Pemancar'),
(1635, '644', 'Bangunan Perdagangan'),
(1636, '644.1', 'Pusat Perbelanjaan'),
(1637, '644.2', 'Gedung Perdagangan'),
(1638, '644.3', 'Bank'),
(1639, '644.4', 'Pekantoran'),
(1640, '645', 'Bangunan Pelayanan Umum'),
(1641, '645.1', 'MCK'),
(1642, '645.2', 'Gedung Parkir'),
(1643, '645.3', 'Rumah Sakit'),
(1644, '645.4', 'Gedung Telkom'),
(1645, '645.5', 'Terminal Angkutan udara'),
(1646, '645.6', 'Terminal Angkutan udara'),
(1647, '645.7', 'Terminal Angkutan Darat'),
(1648, '645.8', 'Bangunan Keagamaan'),
(1649, '646', 'Bangunan Peninggalan Sejarah'),
(1650, '646.1', 'Monumen'),
(1651, '646.2', 'Candi'),
(1652, '646.3', 'Keraton'),
(1653, '646.4', 'Rumah Tradisional'),
(1654, '647', 'Bangunan Industri'),
(1655, '648', 'Bangunan Tempat Tinggal'),
(1656, '648.1', 'Rumah Perkotaan'),
(1657, '648.11', 'Inti / Sederhana'),
(1658, '648.12', 'Sedang / Mewah'),
(1659, '648.2', 'Rumah Pedesaan'),
(1660, '648.21', 'Rumah Contoh'),
(1661, '648.3', 'Real Estate'),
(1662, '648.4', 'Bapetarum'),
(1663, '649', 'Elemen Bangunan'),
(1664, '649.1', 'Pondasi'),
(1665, '649.11', 'Di Atas Tiang'),
(1666, '649.2', 'Dinding'),
(1667, '649.21', 'Penahan Beban'),
(1668, '649.22', 'Tidak Menahan Beban'),
(1669, '649.3', 'Atap'),
(1670, '649.4', 'Lantai / Langit-Langit'),
(1671, '649.41', 'Supended'),
(1672, '649.42', 'Solit'),
(1673, '649.5', 'Pintu / Jendela'),
(1674, '649.51', 'Pintu Harmonik'),
(1675, '649.52', 'Pintu Biasa'),
(1676, '649.53', 'Pintu Sorong'),
(1677, '649.54', 'Pintu Kayu'),
(1678, '649.55', 'Jendela Sorong'),
(1679, '649.56', 'Jendela Vertikal'),
(1680, '650', 'TATA KOTA'),
(1681, '651', 'Daerah Perdagangan / Pelabuhan'),
(1682, '651.1', 'Daerah Pusat Perbelanjaan'),
(1683, '651.2', 'Daerah Perkotaan'),
(1684, '652', 'Daerah Pemerintah'),
(1685, '653', 'Daerah Perumahan'),
(1686, '653.1', 'Kepadatan Rendah'),
(1687, '653.2', 'Kepadatan Tinggi'),
(1688, '654', 'Daerah Industri'),
(1689, '654.1', 'Industri Berat'),
(1690, '654.2', 'Industri Ringan'),
(1691, '654.3', 'Industri Ringan (Home Industry)'),
(1692, '655', 'Daerah Rekreasi'),
(1693, '655.1', 'Public Garden'),
(1694, '655.2', 'Sport & Playing Fields'),
(1695, '655.3', 'Open Space'),
(1696, '656', 'Transportasi (Tata Letak)'),
(1697, '656.1', 'Jaringan Jalan'),
(1698, '656.11', 'Penerangan Jalan'),
(1699, '656.2', 'Jaringan Kereta Api'),
(1700, '656.3', 'Jaringan Sungai'),
(1701, '657', 'Assaineering'),
(1702, '657.1', 'Saluran Pengumpulan'),
(1703, '657.2', 'Instalasi Pengolahan'),
(1704, '657.21', 'Bangunan'),
(1705, '657.211', 'Bangunan Penyaringan'),
(1706, '657.212', 'Bangunan Penghancur Kotoran / Sampah'),
(1707, '657.213', 'Bangunan Pengendap'),
(1708, '657.214', 'Bangunan Pengering Lumpur'),
(1709, '657.22', 'Unit Densifektan'),
(1710, '657.23', 'Unit Perpompaan'),
(1711, '658', 'Kesehatan Lingkungan'),
(1712, '658.1', 'Persampahan'),
(1713, '658.11', 'Bangunan Pengumpul'),
(1714, '658.12', 'Bangunan Pemusnahan'),
(1715, '658.2', 'Pengotoran Udara'),
(1716, '658.3', 'pengotoran Air'),
(1717, '658.31', 'Air Buangan Industri Limbah'),
(1718, '658.4', 'Kegaduhan'),
(1719, '658.5', 'Kebersihan Kota'),
(1720, '660', 'TATA LINGKUNGAN'),
(1721, '660.1', 'Persampahan'),
(1722, '660.2', 'Kebersihan Lingkungan'),
(1723, '660.3', 'Pencemaran'),
(1724, '660.31', 'Pecemaran Air'),
(1725, '660.32', 'Pencemaran Udara'),
(1726, '661', 'Daerah Hutan'),
(1727, '662', 'Daerah Pertanian'),
(1728, '663', 'Daerah Pemikiman'),
(1729, '664', 'Pusat Pertumbuhan'),
(1730, '665', 'Transportasi'),
(1731, '665.1', 'Jaringan Jalan'),
(1732, '665.2', 'Jaringan Kereta Api'),
(1733, '665.3', 'Jaringan Sungai'),
(1734, '670', 'KETENAGAAN'),
(1735, '671', 'Listrik'),
(1736, '671.1', 'Kelistrikan'),
(1737, '671.11', 'Kelisrikan PLN'),
(1738, '671.12', 'Kelistrikan Non PLN'),
(1739, '671.2', 'Pembangkit Tenaga Listrik'),
(1740, '671.21', 'PLTA  (Pembangkit  Listrik Tenaga Air)'),
(1741, '671.22', 'PLTD  (Pembangkit Listrik Tenaga Diesel)'),
(1742, '671.23', 'PLTG P (Pembangkit Listrik Tenaga Gas)'),
(1743, '671.24', 'PLTM (Pembangkit  Listrik Tenaga Matahari)'),
(1744, '671.25', 'PLTN (Pembangkit Listrik Tenaga Nuklir)'),
(1745, '671.26', 'PLTPB (Pembangkit Listrik Tenaga Uap)'),
(1746, '671.3', 'Transmisi Tenaga Listrik'),
(1747, '671.31', 'Gardu Induk/Gardu Penghubung/Gardu Trafo'),
(1748, '671.32', 'Saluran Udara Tegangan Tinggi'),
(1749, '671.33', 'Kabel Bawah Tanah'),
(1750, '671.4', 'Distribusi Tenaga Listrik'),
(1751, '671.41', 'Gardu Distribusi'),
(1752, '671.42', 'Tegangan Rendah'),
(1753, '671.43', 'Tegangan Menengah'),
(1754, '671.44', 'Jaringan Bawah Tanah'),
(1755, '671.5', 'Pengusahaan Listrik'),
(1756, '671.51', 'Sambungan Listrik'),
(1757, '671.52', 'Penjualan Tenaga Listrik'),
(1758, '671.53', 'Tarif Listrik'),
(1759, '672', 'Tenaga Air'),
(1760, '673', 'Tenaga Minyak'),
(1761, '674', 'Tenaga Gas'),
(1762, '675', 'Tenaga Matahari'),
(1763, '676', 'Tenaga Nuklir'),
(1764, '677', 'Tenaga Panas Bumi'),
(1765, '678', 'Tenaga Uap'),
(1766, '679', 'Tenaga Lainya'),
(1767, '680', 'PERALATAN'),
(1768, '690', 'AIR MINUM'),
(1769, '691', 'Intake'),
(1770, '691.1', 'Broncaptering'),
(1771, '691.2', 'Sumur'),
(1772, '691.3', 'Bendungan'),
(1773, '691.4', 'Saringan (screen)'),
(1774, '691.5', 'Pintu air'),
(1775, '691.6', 'Saluran Pembawa'),
(1776, '691.7', 'Alat Ukur'),
(1777, '691.8', 'Perpompaan'),
(1778, '692', 'Transmisi Air Baku'),
(1779, '692.1', 'Perpipaan'),
(1780, '692.2', 'Katup Udara (Air Relief)'),
(1781, '692.3', 'Katup Penguras (Blow Off)'),
(1782, '692.4', 'Bak Pelepas Tekanan'),
(1783, '692.5', 'Jembatan Pipa'),
(1784, '692.6', 'Syphon'),
(1785, '693', 'Instalasi Pengelolaan'),
(1786, '693.1', 'Bangunan Ukur'),
(1787, '693.2', 'Bangunan Aerasi'),
(1788, '693.3', 'Bangunan Pengendapan'),
(1789, '693.4', 'Bangunan Pembubuh Bahan Kimia'),
(1790, '693.5', 'Bangunan Pengaduk'),
(1791, '693.6', 'Bangunan Saringan'),
(1792, '693.7', 'Perpompaan'),
(1793, '693.8', 'Clear Hell'),
(1794, '694', 'Distribusi'),
(1795, '694.1', 'Reservoir Menara Bawah Tanah'),
(1796, '694.11', 'Menara'),
(1797, '694.12', 'reservoir di Bawah Tanah'),
(1798, '694.2', 'Perpipaan'),
(1799, '694.3', 'Perpompaan'),
(1800, '694.4', 'Jembatan Pipa'),
(1801, '694.5', 'Syphon'),
(1802, '694.6', 'Hydran'),
(1803, '694.61', 'Hydran Umum'),
(1804, '694.62', 'Hydran Kebakaran'),
(1805, '694.7', 'Katup'),
(1806, '694.71', 'Katup Udara (Air Relief)'),
(1807, '694.72', 'Katup Pelepas (Blow Off)'),
(1808, '694.8', 'Bak Pelepas Tekanan'),
(1809, '700', 'PENGAWASAN'),
(1810, '701', 'Bidang Urusan Dalam'),
(1811, '702', 'Bidang Peralatan'),
(1812, '703', 'Bidang Kekayaan Daerah'),
(1813, '704', 'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi'),
(1814, '705', 'Bidang Perencanaan'),
(1815, '706', 'Bidang Organisasi / Ketatalaksanaan'),
(1816, '707', 'Bidang Penelitian'),
(1817, '708', 'Bidang Konferensi'),
(1818, '709', 'Bidang Perjalanan Dinas'),
(1819, '710', 'BIDANG PEMERINTAHAN'),
(1820, '711', 'Bidang Pemerintahan Pusat'),
(1821, '712', 'Bidang Pemerintahan Provinsi'),
(1822, '713', 'Bidang Pemerintahan Kabupaten / Kota'),
(1823, '714', 'Bidang Pemerintahan Desa'),
(1824, '715', 'Bidang MPR / DPR'),
(1825, '716', 'Bidang DPRD Provinsi'),
(1826, '717', 'Bidang DPRD Kabupaten / Kota'),
(1827, '718', 'Bidang Hukum'),
(1828, '719', 'Bidang Hubungan Luar Negeri'),
(1829, '720', 'BIDANG POLITIK'),
(1830, '721', 'Bidang Kepartaian'),
(1831, '722', 'Bidang Organisasi Kemasyarakatan'),
(1832, '723', 'Bidang Organisasi Profesi Dan Fungsional'),
(1833, '724', 'Bidang Organisasi Pemuda'),
(1834, '725', 'Bidang Organisasi Buruh, Tani, Dan Nelayan'),
(1835, '726', 'Bidang Organisasi Wanita'),
(1836, '727', 'Bidang Pemilihan Umum'),
(1837, '730', 'BIDANG KEAMANAN/KETERTIBAN'),
(1838, '731', 'Bidang Pertahanan'),
(1839, '732', 'Bidang Kemiliteran'),
(1840, '733', 'Bidang Perlindungan Masyarakat'),
(1841, '734', 'Bidang Kemanan'),
(1842, '735', 'bidang Kejahatan'),
(1843, '736', 'Bidang Bencana'),
(1844, '737', 'Bidang Kecelakaan'),
(1845, '740', 'BIDANG KESEJAHTERAAN RAKYAT'),
(1846, '741', 'Bidang Pembagunan Desa'),
(1847, '742', 'Bidang Pendidikan'),
(1848, '743', 'Bidang Kebudayaan'),
(1849, '744', 'Bidang Kesehatan'),
(1850, '745', 'Bidang Agama'),
(1851, '746', 'Bidang Sosial'),
(1852, '747', 'Bidang Kependudukan'),
(1853, '748', 'Bidang Media Massa'),
(1854, '750', 'BIDANG PEREKONOMIAN'),
(1855, '751', 'Bidang Perdagangan'),
(1856, '752', 'Bidang Pertanian'),
(1857, '753', 'Bidang Perindustrian'),
(1858, '754', 'Bidang Pertambangan / Kesamudraan'),
(1859, '755', 'Bidang Perhubungan'),
(1860, '756', 'Bidang Tenaga Kerja'),
(1861, '757', 'Bidang Permodalan'),
(1862, '758', 'Bidang Perbankan / Moneter'),
(1863, '759', 'Bidang Agraria'),
(1864, '760', 'BIDANG PEKERJAAN UMUM'),
(1865, '761', 'Bidang Pengairan'),
(1866, '762', 'Bidang Jalan'),
(1867, '763', 'Bidang Jembatan'),
(1868, '764', 'Bidang Bangunan'),
(1869, '765', 'Bidang Tata Kota'),
(1870, '766', 'Bidang Lingkungan'),
(1871, '767', 'Bidang Ketenagaan'),
(1872, '768', 'Bidang Peralatan'),
(1873, '769', 'Bidang Air Minum'),
(1874, '780', 'BIDANG KEPEGAWAIAN'),
(1875, '781', 'Bidang Pengadaan Pegawai'),
(1876, '782', 'Bidang Mutasi Pegawai'),
(1877, '783', 'Bidang Kedudukan Pegawai'),
(1878, '784', 'Bidang Kesejahteran Pegawai'),
(1879, '785', 'Bidang Cuti'),
(1880, '786', 'Bidang Penilaian'),
(1881, '787', 'Bidang Tata Usaha Kepegawaian'),
(1882, '788', 'Bidang Pemberhentian Pegawai'),
(1883, '789', 'Bidang Pendidikan Pegawai'),
(1884, '790', 'BIDANG KEUANGAN'),
(1885, '791', 'Bidang Anggaran'),
(1886, '792', 'Bidang Otorisasi'),
(1887, '793', 'Bidang Verifikasi'),
(1888, '794', 'Bidang Pembukuan'),
(1889, '795', 'Bidang Perbendaharaan'),
(1890, '796', 'Bidang Pembina Kebendaharaan'),
(1891, '797', 'Bidang Pendapatan'),
(1892, '799', 'Bidang Bendaharaan'),
(1893, '800', 'KEPEGAWAIAN'),
(1894, '800.1', 'Perencanaan'),
(1895, '800.2', 'Penelitian'),
(1896, '800.043', 'Pengaduan'),
(1897, '800.05', 'Tim'),
(1898, '800.07', 'Statistik'),
(1899, '800.08', 'Peraturan Perundang-Undangan'),
(1900, '810', 'PENGADAAN'),
(1901, '811', 'Lamaran'),
(1902, '811.1', 'Testing'),
(1903, '811.2', 'Screening'),
(1904, '811.3', 'Panggilan'),
(1905, '812', 'Pengujian Kesehatan'),
(1906, '813', 'Pengangkatan Calon Pegawai'),
(1907, '813.1', 'Pengangkatan Calon Pegawai Golongan 1'),
(1908, '813.2', 'Pengangkatan Calon Pegawai Golongan II'),
(1909, '813.3', 'Pengangkatan Calon Pegawai Golongan III'),
(1910, '813.4', 'Pengangkatan Calon Pegawai Golongan IV'),
(1911, '813.5', 'Pengangkatan Calon Guru Inpres'),
(1912, '814', 'Pengangkatan Tenaga Lepas'),
(1913, '814.1', 'Pengangkatan Tenaga Bulanan / Tenaga Kontrak'),
(1914, '814.2', 'Pengangkatan Tenaga Harian'),
(1915, '814.3', 'Pengangkatan Tenaga Pensiunan'),
(1916, '820', 'MUTASI'),
(1917, '821', 'Pengangkatan'),
(1918, '821.1', 'Pengangkatan Menjadi Pegawai Negeri Tetap'),
(1919, '821.11', 'Pengangkatan Menjadi Pegawai Negeri Golongan 1'),
(1920, '821.12', 'Pengangkatan Menjadi Pegawai Negeri Golongan 2'),
(1921, '821.13', 'Pengangkatan Menjadi Pegawai Negeri Golongan 3'),
(1922, '821.14', 'Pengangkatan Menjadi Pegawai Negeri Golongan 4'),
(1923, '821.15', 'Pengangkatan Menjadi Pegawai Negeri Sipil Yang Cuti Di Luar Tanggungan Negara'),
(1924, '821.2', 'Pengangkatan Dalam Jabatan, Pembebasan Dari Jabatan, Berita Acara Serah Terima Jabatan'),
(1925, '821.21', 'Sekjen/Dirjen/Irjen/Kabag'),
(1926, '821.22', 'Kepala Biro/Direktur/Inspektur/Kepala Pusat/Sekretaris/Kepala Dinas/Asisten Sekwilda'),
(1927, '821.23', 'Kepala Bagian/Kepala Sub Direktorat/Kepala Bidang/Inspektur Pembantu'),
(1928, '821.24', 'Kepala Subbagian/Kepala Seksi/Kepala Sub Bidang/Pemeriksa'),
(1929, '821.25', 'Residen/Pembantu Gubernur'),
(1930, '821.26', 'Wedana/Pembantu Bupati'),
(1931, '821.27', 'Camat'),
(1932, '821.28', 'Lurah Administratif (Lurah Desa)'),
(1933, '821.29', 'Jabatan Lainnya'),
(1934, '822', 'Kenaikan Gaji Berkala'),
(1935, '822.1', 'Pegawai Golongan 1'),
(1936, '822.2', 'Pegawai Golongan 2'),
(1937, '822.3', 'Pegawai Golongan 3'),
(1938, '822.4', 'Pegawai Golongan 4'),
(1939, '823', 'Kenaikan Pangkat / Pengangkatan'),
(1940, '823.1', 'Pegawai Golongan 1'),
(1941, '823.2', 'Pegawai Golongan 2'),
(1942, '823.3', 'Pegawai Golongan 3'),
(1943, '823.4', 'Pegawai Golongan 4'),
(1944, '824', 'Pemindahan / Pelimpahan / Perbantuan'),
(1945, '824.1', 'Pegawai Golongan 1'),
(1946, '824.2', 'Pegawai Golongan 2'),
(1947, '824.3', 'Pegawai Golongan 3'),
(1948, '824.4', 'Pegawai Golongan 4'),
(1949, '824.5', 'Lolos Butuh'),
(1950, '824.6', 'Kurikulum dan Silabi'),
(1951, '824.7', 'Proposal (TOR)'),
(1952, '825', 'Datasering dan Penempatan Kembali'),
(1953, '826', 'Penunjukan Tugas Belajar'),
(1954, '826.1', 'Dalam Negeri'),
(1955, '826.2', 'Luar Negeri'),
(1956, '826.3', 'Tunjangan Belajar'),
(1957, '826.4', 'Penempatan Kembali'),
(1958, '827', 'Wajib Militer'),
(1959, '828', 'Mutasi Dengan Instansi Lain'),
(1960, '829', '-'),
(1961, '830', 'KEDUDUKAN'),
(1962, '831', 'Perhitungan Masa Kerja'),
(1963, '832', 'Penyesuaian Pangkat / Gaji'),
(1964, '832.1', 'Pegawai Golongan 1'),
(1965, '832.2', 'Pegawai Golongan 2'),
(1966, '832.3', 'Pegawai Golongan 3'),
(1967, '832.4', 'Pegawai Golongan 4'),
(1968, '833', 'Penghargaan Ijazah / Penyesuaian'),
(1969, '834', 'Jenjang Pangkat / Eselonering'),
(1970, '840', 'KESEJAHTERAAN PEGAWAI'),
(1971, '841', 'Tunjangan'),
(1972, '841.1', 'Jabatan'),
(1973, '841.2', 'Kehormatan'),
(1974, '841.3', 'Kematian/Uang Duka'),
(1975, '841.4', 'Tunjangan Hari Raya'),
(1976, '841.5', 'Perjalanan Dinas Tetap/Cuti/Pindah'),
(1977, '841.6', 'Keluarga'),
(1978, '841.7', 'Sandang, Pangan, Papan (Bapertarum)'),
(1979, '842', 'Dana'),
(1980, '842.1', 'Taspen'),
(1981, '842.2', 'Kesehatan'),
(1982, '842.3', 'Asuransi'),
(1983, '843', 'Perawatan Kesehatan'),
(1984, '843.1', 'Poliklinik'),
(1985, '843.2', 'Perawatan Dokter'),
(1986, '843.3', 'Obat-Obatan'),
(1987, '843.4', 'Keluarga Berencana'),
(1988, '844', 'Koperasi / Distribusi'),
(1989, '844.1', 'Distribusi Pangan'),
(1990, '844.2', 'Distribusi Sandang'),
(1991, '844.3', 'Distribusi Papan'),
(1992, '845', 'Perumahan/Tanah'),
(1993, '845.1', 'Perumahan Pegawai'),
(1994, '845.2', 'Tanah Kapling'),
(1995, '845.3', 'Losmen/Hotel'),
(1996, '846', 'Bantuan Sosial'),
(1997, '846.1', 'Bantuan Kebakaran'),
(1998, '846.2', 'Bantuan Kebanjiran'),
(1999, '850', 'CUTI Meliputi Cuti Tahunan, Cuti Besar, Cuti Sakit, Cuti Hamil, Cuti Naik Haji, Cuti'),
(2000, '851', 'Cuti Tahunan'),
(2001, '852', 'Cuti Besar'),
(2002, '853', 'Cuti Sakit'),
(2003, '854', 'Cuti Hamil'),
(2004, '855', 'Cuti Naik Haji/Umroh'),
(2005, '856', 'Cuti Di Luar Tangungan Neagara'),
(2006, '857', 'Cuti Alasan Lain/Alasan Penting'),
(2007, '860', 'PENILAIAN'),
(2008, '861', 'Penghargaan'),
(2009, '861.1', 'Bintang/Satyalencana'),
(2010, '861.2', 'Kenaikan Pangkat Anumerta'),
(2011, '861.3', 'Kenaikan Gaji Istimewa'),
(2012, '861.4', 'Hadiah Berupa Uang'),
(2013, '861.5', 'Pegawai Teladan'),
(2014, '862', 'Hukuman'),
(2015, '862.1', 'Teguran Peringatan'),
(2016, '862.2', 'Penundaan Kenaikan Gaji'),
(2017, '862.3', 'Penurunan Pangkat'),
(2018, '862.4', 'Pemindahan'),
(2019, '863', 'Konduite, DP3, Disiplin Pegawai'),
(2020, '864', 'Ujian Dinas'),
(2021, '864.1', 'Tingkat 1'),
(2022, '864.2', 'Tingkat 2'),
(2023, '864.3', 'Tingkat 3'),
(2024, '865', 'Penilaian Kehidupan Pegawai Negeri'),
(2025, '866', 'Rehabilitasi / Pengaktifan Kembali'),
(2026, '870', 'TATA USAHA KEPEGAWAIAN'),
(2027, '871', 'Formasi'),
(2028, '872', 'Bezetting/Daftar Urut Kepegawaian'),
(2029, '873', 'Registrasi'),
(2030, '873.1', 'NIP'),
(2031, '873.2', 'KARPEG'),
(2032, '873.3', 'Legitiminasi/Tanda Pengenal'),
(2033, '873.4', 'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu'),
(2034, '874', 'Daftar Riwayat Pekerjaan'),
(2035, '874.1', 'Tanggal Lahir'),
(2036, '874.2', 'Penggantian Nama'),
(2037, '874.3', 'Izin kepartaian Organisasi'),
(2038, '875', 'Kewenangan Mutasi Pegawai'),
(2039, '875.1', 'Pelimpahan Wewenang'),
(2040, '875.2', 'Specimen Tanda Tangan'),
(2041, '876', 'Penggajian'),
(2042, '876.1', 'SKPP'),
(2043, '877', 'Sumpah/Janji'),
(2044, '878', 'Korps Pegawai'),
(2045, '880', 'PEMBERHENTIAN PEGAWAI'),
(2046, '881', 'Permintaan Sendiri'),
(2047, '882', 'Dengan Hak Pensiun'),
(2048, '882.1', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 1'),
(2049, '882.2', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 2'),
(2050, '882.3', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 3'),
(2051, '882.4', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 4'),
(2052, '882.5', 'Pensiun Janda / Duda'),
(2053, '882.6', 'Pensiun Yatim Piatu'),
(2054, '882.7', 'Uang Muka Pensiun'),
(2055, '883', 'Karena Meninggal'),
(2056, '883.1', 'Karena Meninggal Dalam Tugas'),
(2057, '884', 'Alasan Lain'),
(2058, '885', 'Uang Pesangon'),
(2059, '886', 'Uang Tunggu'),
(2060, '887', 'Untuk Sementara Waktu'),
(2061, '888', 'Tidak Dengan Hormat'),
(2062, '890', 'PENDIDIKAN PEGAWAI'),
(2063, '891', 'Perencanaan'),
(2064, '891.1', 'Program'),
(2065, '891.2', 'Kurikulum dan Silabi'),
(2066, '891.3', 'Proposal ( TOR )'),
(2067, '892', 'Pendidikan _Egular / Kader'),
(2068, '892.1', 'IPDN / APDN'),
(2069, '892.2', 'Kursus-Kursus Reguler'),
(2070, '893', 'Pendidikan dan Pelatihan / Non Reguler'),
(2071, '893.1', 'LEMHANAS'),
(2072, '893.2', 'Pendidikan dan Pelatihan Struktural, SPATI, SPAMEN, SPAMA, ADUMLA, ADUM'),
(2073, '893.3', 'Kursus-Kursus / Penataran'),
(2074, '893.4', 'Diklat Tehnik, Fungsional Dan Manajemen Pemerintahan'),
(2075, '893.5', 'Diklat Lainnya'),
(2076, '894', 'Pendidikan Luar Negeri'),
(2077, '894.1', 'Berkesinambungan / Berkala / Bergelar'),
(2078, '894.2', 'Non Gelar / Diploma'),
(2079, '895', 'Metode'),
(2080, '895.1', 'Kuliah'),
(2081, '895.2', 'Ceramah, Simposium'),
(2082, '895.3', 'Diskusi, Raker, Seminar, Lokakarya, Orientasi'),
(2083, '895.4', 'Studi Lapangan, Kkn, Widyawisata'),
(2084, '895.5', 'Tanya Jawab / Sylabi / Modul / Kursil'),
(2085, '895.7', 'Penugasan'),
(2086, '895.8', 'Gladi'),
(2087, '896', 'Tenaga Pengajar / Widyaiswara/Narasumber'),
(2088, '896.1', 'Moderator'),
(2089, '897', 'Administrasi Pendidikan'),
(2090, '897.1', 'Tahun Pelajaran'),
(2091, '897.2', 'Persyaratan, Pendaftaran, Testing, Ujian'),
(2092, '897.3', 'STTP'),
(2093, '897.4', 'Penilaian Angka Kredit'),
(2094, '897.5', 'Laporan Pendidikan Dan Pelatihan'),
(2095, '898', 'Fasilitas Belajar'),
(2096, '898.1', 'Tunjangan Belajar'),
(2097, '898.2', 'Asrama'),
(2098, '898.3', 'Uang Makan'),
(2099, '898.4', 'Uang Transport'),
(2100, '898.5', 'Uang Buku'),
(2101, '898.6', 'Uang Ujian'),
(2102, '898.7', 'Uang Semester / Uang Kuliah'),
(2103, '898.8', 'Uang Saku'),
(2104, '899', 'Sarana'),
(2105, '899.1', 'Bantuan Sarana Belajar'),
(2106, '899.2', 'Bantuan Alat-Alat Tulis'),
(2107, '899.3', 'Bantuan Sarana Belajar Lainnya'),
(2108, '900', 'KEUANGAN'),
(2109, '901', 'Nota Keuangan'),
(2110, '902', 'APBN'),
(2111, '903', 'APBD'),
(2112, '904', 'APBN-P'),
(2113, '905', 'Dana Alokasi Umum'),
(2114, '906', 'Dana Alokasi Khusus'),
(2115, '907', 'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)'),
(2116, '910', 'ANGGARAN'),
(2117, '911', 'Rutin'),
(2118, '912', 'Pembangunan'),
(2119, '913', 'Anggaran Belanja Tambahan'),
(2120, '914', 'Daftar Isian Kegiatan (DIK)'),
(2121, '914.1', 'Daftar Usulan Kegiatan (DUK)'),
(2122, '915', 'Daftar Isian Poyek (DIP)'),
(2123, '915.1', 'Daftar Usulan Proyek (DUP)'),
(2124, '915.2', 'Daftar Isian Pengguna Anggaran (DIPA)'),
(2125, '916', 'Revisi Anggaran'),
(2126, '920', 'OTORISASI / SKO'),
(2127, '921', 'Rutin'),
(2128, '922', 'Pembangunan'),
(2129, '923', 'SIAP'),
(2130, '924', 'Ralat SKO'),
(2131, '930', 'VERIFIKASI'),
(2132, '931', 'SPM Rutin (daftar p8)'),
(2133, '932', 'SPM Pembangunan (daftar p8)'),
(2134, '933', 'Penerimaan (daftar p6. p7'),
(2135, '934', 'SPJ Rutin'),
(2136, '935', 'SPJ Pembangunan'),
(2137, '936', 'Nota Pemeriksaan'),
(2138, '937', 'SP Pemindahan Pembukuan'),
(2139, '940', 'PEMBUKUAN'),
(2140, '941', 'Penyusunan Perhitungan Anggaran'),
(2141, '942', 'Permintaan  Data Anggaran Laporan Fisik Pembangunan'),
(2142, '943', 'Laporan Fisik Pembangunan'),
(2143, '950', 'PERBENDAHARAAN'),
(2144, '951', 'Tuntutan Ganti Rugi (ICW Pasal 74)'),
(2145, '952', 'Tuntutan Bendaharawan'),
(2146, '953', 'Penghapusan Kekayaan Negara'),
(2147, '954', 'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan'),
(2148, '955', 'Spesimen Tanda Tangan'),
(2149, '956', 'Surat Tagihan Piutang, Ikhtisar Bulanan'),
(2150, '960', 'PEMBINAAN KEBENDAHARAAN'),
(2151, '961', 'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas'),
(2152, '962', 'Pemeriksaan Administrasi Bendaharawan'),
(2153, '963', 'Laporan Keuangan Bendaharawan'),
(2154, '970', 'PENDAPATAN'),
(2155, '971', 'Perimbangan Keuangan'),
(2156, '972', 'Subsidi'),
(2157, '973', 'Pajak,Ipeda, IHH,IHPH'),
(2158, '974', 'Retribusi'),
(2159, '975', 'Bea'),
(2160, '976', 'Cukai'),
(2161, '977', 'Pungutan / PNBP'),
(2162, '978', 'Bantuan Presiden, Menteri Dan Bantuan Lainnya'),
(2163, '990', 'BENDAHARAWAN'),
(2164, '991', 'SKPP / SPP'),
(2165, '992', 'Teguran SPJ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kua`
--

CREATE TABLE `tb_kua` (
  `id` int(4) NOT NULL,
  `nm_kepala` varchar(50) NOT NULL,
  `nip_kepala` varchar(22) NOT NULL,
  `pangjab_kepala` varchar(50) NOT NULL,
  `almt_kua` varchar(150) NOT NULL,
  `telp_kua` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='jangan dihapus';

--
-- Dumping data for table `tb_kua`
--

INSERT INTO `tb_kua` (`id`, `nm_kepala`, `nip_kepala`, `pangjab_kepala`, `almt_kua`, `telp_kua`) VALUES
(1, 'SUHAEMI, S.Sos.I', '198514665578899', 'Pembina IIIa', 'Jl. Pangeran Diponegoro No. 12 Umbul Geger Desa Sumber Agung ', '1721-245588');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tmp_lahir` varchar(150) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `gol` varchar(100) NOT NULL,
  `jab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `tmp_lahir`, `tgl_lahir`, `gol`, `jab`) VALUES
(1, 'ABDURRASYID WADJO, SE', '197308262005021004', 'Fakfak', '1973-08-28', 'Penata (III/c)', 'Kepala Lurah'),
(2, 'NUR SAMSUL HARLAN LA HOLU, S.Sos', '197804202010041006', 'Fakfak', '1978-04-20', 'Penata Tk. I (III/d)', 'Sekretaris Lurah'),
(3, 'AMINA SAGARA S.Ap', '198505202006052002', 'Fakfak', '1985-05-20', 'Penata Muda Tk.I (III/b)', 'Kepala Seksi Pemerintahan'),
(4, 'LILI SELVIA FUFUARE MANIWAR, SE', '196106151980031020', 'Jaya Pura', '1968-02-24', 'Penata Tk.I (III/b)', 'Kepala Seksi Ketentraman dan Ketertiban');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id` int(2) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Jangan dikosongkan';

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Petani/Pekebun'),
(2, 'Pedagang'),
(3, 'Nelayan'),
(4, 'Honorer'),
(5, 'Wiraswasta'),
(6, 'Karyawan swasta'),
(7, 'ASN'),
(8, 'Mengurus rumah tangga'),
(9, 'Tidak bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int(4) NOT NULL,
  `nkk` varchar(17) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(16) NOT NULL,
  `kwng` varchar(25) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `pend` varchar(25) NOT NULL,
  `kerjaan` varchar(50) NOT NULL,
  `prov` varchar(100) NOT NULL,
  `kab` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `shdk` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `nkk`, `nik`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `kwng`, `agama`, `status`, `pend`, `kerjaan`, `prov`, `kab`, `kec`, `kelurahan`, `alamat`, `hp`, `shdk`, `foto`, `ket`) VALUES
(1502, '1801082303085260', '1801084812830001', 'SUNANI', 'Perempuan', 'LAMPUNG SELATAN', '08/12/1983', 'Indonesia', 'Islam', 'Kawin', 'SLTP', 'Mengurus Rumah Tangga', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/001', '085377540602', 'Istri', '51369366361_205735895827401_6949010627777349959_n.jpg', ''),
(1503, '1801082303085260', '1801080707700006', 'YOYOK', 'Laki-laki', 'KENDAL', '07/07/1970', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/001', '085377540602', '-', '-', ''),
(1504, '1801082303085259', '1801236506650001', 'MARKANAH', 'Perempuan', 'BLITAR', '25/06/1965', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/001', '0', '-', '-', ''),
(1505, '1801082303085259', '1801081509510001', 'SURIPTO', 'Laki-laki', 'CILACAP', '15/09/1951', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/003', '00', '-', '-', ''),
(1506, '1801082303085257', '1801086407750002', 'BAIKUNIAH', 'Perempuan', 'TULUNG AGUNG', '24/07/1975', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1507, '1801082303085257', '1801081103690003', 'ZAINAL ARIFIN', 'Laki-laki', 'JEMBER', '11/03/1969', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1508, '1801082303085257', '1801231907930003', 'AHMAD FAUZI RIDWAN', 'Laki-laki', 'PEMULIHAN', '19/07/1993', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1509, '1801082303085257', '1801080107030047', 'MUHAMAD ABDUL AZIZ', 'Laki-laki', 'PEMULIHAN', '08/05/2003', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1511, '1801082303085256', '1801800707000003', 'AHMAD FAISAL', 'Laki-laki', 'PEMULIHAN', '08/06/2000', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/002', '085740024133', '-', '-', ''),
(1512, '1801082303085256', '1801230808740004', 'MUHSININ', 'Laki-laki', 'KALIREJO', '08/08/1974', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/002', '083160329588', '-', '-', ''),
(1513, '1801082303085256', '1801080804380001', 'KHOTIM', 'Laki-laki', 'KEBUMEN', '08/04/1938', 'Indonesia', 'Islam', 'Cerai Mati', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1514, '1801082303085256', '1801234209800002', 'SITI AISAH', 'Perempuan', 'PEMULIHAN', '02/09/1980', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1515, '1801082303085254', '1801080812540001', 'SUPYAN HADI', 'Laki-laki', 'TANGGAMUS', '08/12/1954', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1516, '1801082303085254', '1801085703630001', 'HAMIDAH', 'Perempuan', 'TANGGAMUS', '17/03/1963', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1517, '1801082303085248', '1801080303450003', 'ABDUL RISYID', 'Laki-laki', 'KEBUMEN', '03/03/1945', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1518, '1801082303085248', '1801234508600001', 'ANIYAH', 'Perempuan', 'PRINGSEWU', '05/08/1960', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1519, '1801082303085247', '1801233010710001', 'TURIMAN', 'Laki-laki', 'PADANG RATU', '30/10/1971', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1520, '1801082303085247', '1801236511790002', 'SITI MUSYAROFAH', 'Perempuan', 'PRINGSEWEU', '25/11/1979', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1521, '1801082303085247', '1801231811990002', 'SARIF HIDAYAT', 'Laki-laki', 'PEMULIHAN', '18/11/1999', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1522, '1801082303085247', '1801236512060002', 'SITI NURHAYATI', 'Perempuan', 'PEMULIHAN', '25/12/2006', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1523, '1801082303085246', '1801082909730001', 'SARDI', 'Laki-laki', 'PALAS', '29/09/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1524, '1801082303085246', '1801236203730001', 'SITI KOTIJAH', 'Perempuan', 'JAWA TENGAH', '22/03/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1525, '1801082303085246', '1801232603050001', 'MUHAMMAD DARMA SAPUTRA', 'Laki-laki', 'PAMULIHAN', '26/03/2005', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1526, '1801082303085244', '1801232006670001', 'YATIMIN', 'Laki-laki', 'JAWA TIMUR', '20/06/1967', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '081311374761', '-', '-', ''),
(1527, '1801082303085244', '1801235508730001', 'KATIYEM', 'Perempuan', 'JAWA TIMUR', '15/08/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 003/001', '081311374761', '-', '-', ''),
(1528, '1801082303085240', '1801086008650002', 'DASIMAH', 'Perempuan', 'CIREBON', '12/08/1969', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 002/001', '0', '-', '-', ''),
(1529, '1801082303085240', '1801081503570001', 'SUROTO', 'Laki-laki', 'BLITAR', '12/06/1957', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 002/001', '0', '-', '-', ''),
(1530, '1801082303085240', '1801236106050002', 'SOPIYAH', 'Perempuan', 'PAMULIHAN', '21/06/2005', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 002/001', '0', '-', '-', ''),
(1531, '1801082303085238', '1801235706450001', 'KATIN', 'Perempuan', 'JAWA Timur', '17/06/1945', 'Indonesia', 'Islam', 'Cerai Mati', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 002/001', '0', '-', '-', ''),
(1532, '1801082303085238', '1801231802870001', 'TOHIRIN', 'Laki-laki', 'PAMULIHAN', '18/02/1987', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 002/001', '081367955190', '-', '-', ''),
(1533, '1801082303085237', '1801231706430001', 'TUKIMAN', 'Laki-laki', 'BANYUWANGI', '17/06/1943', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 002/001', '0', '-', '-', ''),
(1534, '1801082303085237', '1801235204650003', 'SULBIYAH', 'Perempuan', 'PRINGSEWU', '12/04/1965', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 002/001', '0', '-', '-', ''),
(1535, '1801082303085237', '1801234811900002', 'MUSRIPIN', 'Laki-laki', 'PAMULIHAN', '08/11/1990', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 002/001', '081316689312', '-', '-', ''),
(1536, '1801082303085237', '1801231801050001', 'LANGGENG SAPUTRA', 'Laki-laki', 'PAMULIHAN', '18/01/2005', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 002/001', '0', '-', '-', ''),
(1537, '1801082303085234', '1801230204720001', 'TARSUN', 'Laki-laki', 'CILACAP', '02/04/1972', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/001', '00', '-', '-', ''),
(1538, '1801082303085232', '1801080204430001', 'TULUS', 'Laki-laki', 'KENDAL', '02/04/1943', 'Indonesia', 'Islam', 'Cerai Mati', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 003/001', '0', '-', '-', ''),
(1539, '1801082303085227', '1801235601920001', 'SUKATI', 'Perempuan', 'PAMULIHAN', '16/01/1992', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 003/001', '0', '-', '-', ''),
(1540, '1801082303085227', '1801230803500001', 'RATIJO', 'Laki-laki', 'PRINGSEWU', '08/03/1950', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1541, '1801082303085227', '1801236805670001', 'YATINI', 'Perempuan', 'BANYUWANGI', '28/05/1967', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 003/001', '0', '-', '-', ''),
(1542, '1801082303085227', '1801234505030001', 'MIRANTI', 'Perempuan', 'PAMULIHAN', '05/05/2003', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 003/001', '0', '-', '-', ''),
(1543, '1801082303085224', '1801085009560002', 'SUMINI', 'Perempuan', 'MEDAN', '10/09/1956', 'Indonesia', 'Islam', 'Cerai Mati', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 003/001', '00', '-', '-', ''),
(1544, '1801082303085223', '1801230808770002', 'MUHAMAD ARISUN', 'Laki-laki', 'PRINGSEWU', '08/08/1977', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1545, '1801082303085223', '1801234106780001', 'DARIYATI', 'Perempuan', 'GEDUNG TATAAN', '01/06/1978', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1546, '1801082303085223', '1801232908090001', 'RAHMAT PRASSETIO', 'Laki-laki', 'PEMULIHAN', '29/08/2009', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 004/001', '0', '-', '-', ''),
(1547, '1801082303085220', '1801230303710001', 'RIDAN', 'Laki-laki', 'TALANG PADANG', '03/03/1971', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1548, '1801082303085220', '1801232202030002', 'RIYAN HIDAYAT', 'Laki-laki', 'PAMULIHAN', '22/02/2003', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1549, '1801082303085220', '1801234410040001', 'RINI RAHMAWATI', 'Perempuan', 'PAMULIHAN', '04/10/2009', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1550, '1801082303085213', '1801081401650001', 'SUMARMUN', 'Laki-laki', 'METRO', '14/01/1965', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1551, '1801082303085213', '1801234406760002', 'SOLIHATUN', 'Perempuan', 'PEMULIHAN', '04/06/1976', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1552, '1801082303085213', '1801230903050003', 'RIZKI ARDIANSYAH', 'Laki-laki', 'SERDANG', '09/03/2005', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1553, '1801082303085213', '1801230709680002', 'SALIMAN', 'Laki-laki', 'LAMPUNG TENGAH', '07/09/1968', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1554, '1801082303085213', '1801084612730002', 'SARNI', 'Perempuan', 'KOTA DALEM', '06/12/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1555, '1801082303085213', '1801084105010003', 'DEWI PARWATI', 'Perempuan', 'PEMULIHAN', '01/05/2001', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1556, '1801082303085213', '1801230501070001', 'CHAIRIL ANASRULLAH', 'Laki-laki', 'PEMULIHAN', '05/01/2007', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1557, '1801082303085208', '1801081701690003', 'NURJEN', 'Laki-laki', 'TALANG PADANG', '17/01/1969', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1558, '1801082303085208', '1801236108730001', 'ARNIMAH', 'Perempuan', 'TELUK BETUNG', '21/08/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1559, '1801082303085208', '1801232010050001', 'HAMDAN', 'Laki-laki', 'PAMULIHAN', '20/10/2005', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1560, '1801082303085206', '1801084211730001', 'FATIMAH', 'Perempuan', 'TALANG PADANG', '02/11/1973', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1561, '1801082303085206', '1801084202010002', 'NUR BAETI', 'Perempuan', 'PAMULIHAN', '02/02/2001', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1562, '1801082303085206', '1801082601960002', 'AHMAD FAUZI', 'Laki-laki', 'PAMULIHAN', '26/01/1996', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 001/001', '0', '-', '-', ''),
(1563, '1801082303085206', '1801230808690002', 'BADIYANTO', 'Laki-laki', 'BANYUWANGI', '08/08/1969', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1566, '1801082303085195', '1801081003620002', 'MARYONO', 'Laki-laki', 'BANYUWANGI', '10/03/1962', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/003', '00', '-', '-', ''),
(1567, '1801082303083712', '1801230609640001', 'M.ALI MUKHTAR', 'Laki-laki', 'LAMPUNG SELATAN', '06/09/1964', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1568, '1801082303083712', '1801235605640002', 'RUSMINI', 'Perempuan', 'LAMPUNG SELATAN', '16/05/1964', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 004/001', '0', '-', '-', ''),
(1569, '1801082303083712', '1801231612900001', 'MUNIR', 'Laki-laki', 'LAMPUNG SELATAN', '16/12/1990', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 004/001', '0', '-', '-', ''),
(1570, '180108230308', '1801235103720001', 'SITIAEMUNAH', 'Perempuan', 'PEINGSEWU', '11/03/1972', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/002', '00', '-', '-', ''),
(1571, '180108230305522', '1801231501800001', 'JAMAR', 'Laki-laki', 'PAMULIHAN', '15/01/1980', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 003/003', '0', '-', '-', ''),
(1572, '1801082209140002', '1801086005150003', 'SALSABILA NADHIFA', 'Perempuan', 'SUMBER JAYA', '20/05/2015', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1573, '1801082209140002', '1801082006840003', 'MUHAMAD MASYANTO', 'Laki-laki', 'TALANG WAYSULAN', '20/06/1984', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1574, '1801082209140002', '1801086004910011', 'SUMIRAH', 'Perempuan', 'SUMBER JAYA', '20/04/1991', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 005/002', '0', '-', '-', ''),
(1575, '1801081808160011', '1801082507900006', 'TRI SUTRISNO', 'Laki-laki', 'PARDASUKA', '25/06/1990', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1576, '1801081808160011', '1801235402170001', 'INDRA CAHYANI ATHIFAH', 'Perempuan', 'LAMPUNG SELATAN', '14/02/2017', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1577, '1801081808160011', '1801235009930001', 'SITI NUR JAMILAH', 'Perempuan', 'PEMULIHAN', '10/09/1993', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '0', '-', '-', ''),
(1578, '1801080706180004', '1801232410170002', 'MUHAMMAD RIFQI PRATAMA', 'Laki-laki', 'PEMULIHAN', '24/10/2017', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/001', '0', '-', '-', ''),
(1579, '1801080706180004', '1801235901990001', 'SITI JARMAYA', 'Perempuan', 'PEMULIHAN', '19/01/1999', 'Indonesia', 'Islam', 'Cerai Hidup', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 005/001', '0', '-', '-', ''),
(1580, '1801062303085183', '1801065501770005', 'SUMIYATI', 'Perempuan', 'PEMULIHAN', '15/01/1977', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1581, '1801062303085183', '1801232406990002', 'DONI WANDIKA', 'Laki-laki', 'KALIANDA', '24/06/1999', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1582, '1801062303085183', '1801230809060004', 'INDRI DAMAYANTI', 'Perempuan', 'PAMULIHAN', '28/09/2006', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1583, '1801061701130004', '1801063112850003', 'HERWANSYAH', 'Laki-laki', 'PARDASUKA', '31/12/1985', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/002', '081274444478', '-', '-', ''),
(1584, '1801061701130004', '1801084404960003', 'BI ISMI NURHIKMAH', 'Perempuan', 'LAMPUNG SELATAN', '04/04/1996', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/002', '081394034722', '-', '-', ''),
(1585, '1801061701130004', '1801231902190001', 'RADEN HESMU LAMUJA', 'Laki-laki', 'PAMULIHAN', '19/02/2019', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/002', '00', '-', '-', ''),
(1586, '1801060602170012', '1801236505910002', 'SITI JULAIKAH', 'Perempuan', 'PAMULIHAN', '25/05/1991', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/002', '082281448214', '-', '-', ''),
(1587, '1801060602170012', '1801060409920001', 'ANGGA SAPUTRA', 'Laki-laki', 'NEGERI PANDAN', '09/09/1992', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Mekar Sari Rt./Rw. 001/002', '081369517036', '-', '-', ''),
(1588, '1801050506170001', '1801231901920002', 'ADE WAHIDIN', 'Laki-laki', 'PAMULIHAN', '19/01/1992', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1589, '1801050506170001', '1801055510920005', 'OKTA VIANA', 'Perempuan', 'JATI BARU', '15/10/1992', 'Indonesia', 'Islam', 'Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Sinar Jaya Rt./Rw. 001/001', '00', '-', '-', ''),
(1590, '1801050506170001', '1801055507140005', 'NURIN NAJWA RAMADHANI', 'Perempuan', 'JATI BARU', '15/07/2014', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1591, '1801050506170001', '1801055405170001', 'ERLYTA ARSYA SALSABILA', 'Perempuan', 'TANJUNG BINTANG', '14/05/2017', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', ''),
(1592, '1801050506170001', '1801235002210001', 'AISYAH SHANUM HUMAIRA', 'Perempuan', 'PAMULIHAN', '10/02/2021', 'Indonesia', 'Islam', 'Belum Kawin', '-', '-', 'Lampung', 'Lampung Selatan', 'Way Sulan', 'Pamulihan', 'Dusun Tegal Sari Rt./Rw. 001/001', '00', '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id` int(4) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `nmsurat` varchar(150) NOT NULL,
  `page` varchar(25) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(4) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id`, `nik`, `nama`, `kode_surat`, `nmsurat`, `page`, `hp`, `berkas`, `foto`, `tgl`, `userid`, `keterangan`, `status`) VALUES
(1, '1801231907930003', 'AHMAD FAUZI RIDWAN', 'JS005', 'Surat Keterangan Tidak Mampu', 'sukettmampuv1', '087855788444', '72bgapp.jpg', '87369366361_205735895827401_6949010627777349959_n.jpg', '2023-09-04 01:24:03', 2, 'Foto yang anda lampirkan buram', 'ditolak'),
(2, '1801233010710001', 'TURIMAN', 'JS008', 'Surat Keterangan Penghasilan', 'suketpenghasilan', '087855788444', '99CamScanner 07-30-2021 11.28.jpg', '83team-8.jpg', '2023-09-05 10:31:42', 2, '', 'onprocess'),
(3, '1801232006670001', 'YATIMIN', 'JS008', 'Surat Keterangan Penghasilan', 'suketpenghasilan', '082278183799', '32IMG-20221001-WA0003.jpg', '98IMG-20221026-WA0009.jpg', '2023-09-05 10:43:54', 2, '', 'acc'),
(4, '1801080510950002', 'SUNANI', 'JS002', 'Surat Keterangan Tempat Usaha', 'sukettmpusaha', '087855788444', '28Umi.jpg', '40IMG_20201223_101403.jpg', '2023-09-23 09:50:44', 2, '', 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id_profil` int(4) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `peta` text NOT NULL,
  `gambar_sejarah` varchar(150) NOT NULL,
  `gambar_visi` varchar(150) NOT NULL,
  `gambar_peta` varchar(150) NOT NULL,
  `gambar_struktur` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id_profil`, `sejarah`, `visi`, `misi`, `peta`, `gambar_sejarah`, `gambar_visi`, `gambar_peta`, `gambar_struktur`) VALUES
(1, 'Pada tahun 1970 awalnya desa Pemulihan bernama blok Sinar Banten. Pada 1972 tanahnya di desa Pemulihan akui oleh PT. Singa Laga, sehingga warga dipaksa untuk keluar (bubar) dari blok sinar banten atau desa Pemulihan sekarang. \r\n\r\nPada tahun 1973 Direktur PT. Singa Laga diganti karena  mengalami kebangkrutan. Direktur Pt. Singa Laga berpihak kepada masyarakat karena beliau seorang pejuang (ABRI) bernama Jenderal Herman Saren. Selanjutnya masyarakat diberitahu oleh tokoh penebang bernama Masri Brata Kusuma untuk kembali ke lokasi tebangan masing – masing terutama orang banten. Kemudian salah satu tokoh bernama Dudung Abdul Fatah memberikan masukan untuk memberikan nama Dusun Sinar jaya dan nama  Dudung Abdul Fatah sekaligus dipilih menjadi Kepala Dusun Tahun 1980 sampai tahun 1987. Kemudian dusun sinar jaya menjadi dan diberi nama Desa Pemulihan. \r\n\r\nNama Pemulihan diambil dari riwayat tanah yang awalnya di akui PT. Singa Laga, kembali kepada masyarakat. Maka dalam bahasa sunda balik (mulih) dan pengagasnya Dudung Abdul Fatah sekaligus mulai menjadi kepala dusun pada tahun 1980 sampai dengan tahun 1987. Dudung Abdul Fatah juga kemudian terpilih menjadi Kepala Desa Kembali tahun 1987 sampai dengan tahun 2008. Berikut adalah table Kepala Desa yang pernah menjabat di Desa Pemulihan\r\n', 'Terwujudnya Desa yang Maju, Aman, Damai dan Sejahtera', 'tes1;weee;hgggg.', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7330.305509219159!2d105.53923955069611!3d-5.499392814696883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1695082811655!5m2!1sid!2sid', '51936windows11.jpeg', '861048a3b1c662-86f0-40d5-a6ea-30ce55f1e5be_169.jpg', '816064peta_desa.jpg', '226bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(4) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `class` varchar(10) NOT NULL,
  `des` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `gambar`, `class`, `des`) VALUES
(1, '977093bg1.jpg', 'active', 'Terwujudnya Desa yang Maju, Aman, Damai dan Sejahtera'),
(2, '999184bg2.jpg', '', 'Meningkatkan upaya pengamalan Ibadah untuk meningkatkan ke-Imanan dan ke-Taqwaan terhadap Tuhan yang Maha Esa'),
(3, '506801bg3.jpg', '', 'Meningkatkan keterampilan bagi masyarakat melalui Pembinaan dan Pelatihan'),
(4, '526633bg4.jpg', '', 'Meningkatkan partisipasi masyarakat dalam penggunaan teknologi secara positif'),
(5, '928579bg5.jpg', '', 'Meningkatkan kesadaran masyarakat mengenai pentingnya menjaga keamanan lingkungan melalui Siskamling');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statistik`
--

CREATE TABLE `tb_statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT 1,
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_statistik`
--

INSERT INTO `tb_statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2023-09-09', 93, '1694265752'),
('::1', '2023-09-10', 8, '1694307986'),
('::1', '2023-09-14', 24, '1694670772'),
('::1', '2023-09-16', 2, '1694829889'),
('::1', '2023-09-17', 1, '1694948289'),
('::1', '2023-09-18', 119, '1695046115'),
('::1', '2023-09-19', 208, '1695088856'),
('::1', '2023-09-20', 124, '1695220879'),
('::1', '2023-09-21', 117, '1695254357'),
('::1', '2023-09-22', 156, '1695369399'),
('::1', '2023-09-23', 116, '1695486281'),
('::1', '2023-09-24', 65, '1695554267'),
('::1', '2023-10-21', 1, '1697924822'),
('::1', '2023-10-22', 2, '1697951197'),
('::1', '2024-03-13', 171, '1710368148'),
('::1', '2024-03-14', 3, '1710381103'),
('::1', '2025-07-04', 6, '1751580137'),
('::1', '2025-07-15', 9, '1752553293');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `testimoni` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id`, `nama`, `telp`, `testimoni`, `status`) VALUES
(1, 'Siti Rahayu', '082278183799', 'Aplikasinya sudah bagus, jadi mudah kalo mau bikin surat - sudart di Desa..', 'Publish'),
(2, 'Marsih', '082278184788', 'Aplikasinya bagus', 'Publish'),
(3, 'Sopiah', '082278183799', 'Aplikasinya mempermudah kalo mau bikin surat di desa', 'Publish'),
(4, 'UMI KALIMAH', '0838191232154', 'Stelah pake website ini untuk bikin surat skarng tidak perlu ngantre lagi dikantor desa', 'Publish'),
(5, 'SITI SENI WATI', '083854123215', 'Aplikasi surat ini mempermudah warga dalam pembuatan surat di desa', 'Publish'),
(6, 'SITI RAHAYU', '082278184788', 'Web pelayanan administrasi desa ini sangat mempermudah warga kalo mau bikin surat, jadi gk perlu ngantri dikantor', 'Publish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `tb_ahliwaris`
--
ALTER TABLE `tb_ahliwaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_buatsendiri`
--
ALTER TABLE `tb_buatsendiri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dataassesment`
--
ALTER TABLE `tb_dataassesment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `tb_datacalon`
--
ALTER TABLE `tb_datacalon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_datapdinas`
--
ALTER TABLE `tb_datapdinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_datastugas`
--
ALTER TABLE `tb_datastugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_datasurat`
--
ALTER TABLE `tb_datasurat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `tb_dataundangan`
--
ALTER TABLE `tb_dataundangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailsurat`
--
ALTER TABLE `tb_detailsurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenissurat`
--
ALTER TABLE `tb_jenissurat`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kua`
--
ALTER TABLE `tb_kua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ahliwaris`
--
ALTER TABLE `tb_ahliwaris`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_buatsendiri`
--
ALTER TABLE `tb_buatsendiri`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dataassesment`
--
ALTER TABLE `tb_dataassesment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_datacalon`
--
ALTER TABLE `tb_datacalon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_datapdinas`
--
ALTER TABLE `tb_datapdinas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_datastugas`
--
ALTER TABLE `tb_datastugas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_datasurat`
--
ALTER TABLE `tb_datasurat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_dataundangan`
--
ALTER TABLE `tb_dataundangan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_detailsurat`
--
ALTER TABLE `tb_detailsurat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jenissurat`
--
ALTER TABLE `tb_jenissurat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2166;

--
-- AUTO_INCREMENT for table `tb_kua`
--
ALTER TABLE `tb_kua`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id_profil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
