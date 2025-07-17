<?php
// Load file autoload.php
require '../importxls/vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
?>         
           <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p5">
                    <div class="container-fluid">
                            <div class="col-lg-12">
                                <div class="au-card recent-report">
                <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5">LIHAT DATA PENDUDUK YANG AKAN DI IMPORT
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
    <?php
    // Jika user telah mengklik tombol Preview
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
        $nama_file_baru = 'data' . $tgl_sekarang . '.xls';

        // Cek apakah terdapat file data.xls pada folder tmp
        if (is_file('../importxls/tmp/' . $nama_file_baru)) // Jika file tersebut ada
            unlink('../importxls/tmp/' . $nama_file_baru); // Hapus file tersebut

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file']['tmp_name'];

        // Cek apakah file yang diupload adalah file Excel (.xls)
        if ($ext == "xls") {
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{tglsekarang}.xls
            // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
            // Contoh nama file setelah di rename : data20210814192500.xls
            move_uploaded_file($tmp_file, '../importxls/tmp/' . $nama_file_baru);

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $spreadsheet = $reader->load('../importxls/tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='../importxls/import.php'>";

            // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
            // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";



            echo "<div class='table-responsive'>
                                <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>

                    <tr>
                        <th>Nkk</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Jk</th>
                        <th>Tmp. Lahir</th>
                        <th>Tgl. Lahir</th>
                        <th>Warga negara</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Pend</th>
                        <th>Kerjaan</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Kec</th>
                        <th>Kab</th>
                        <th>Prov</th>
                        <th>HP</th>
                        <th>SHDK</th>
                        <th>Foto</th>
                    </tr>";

            $numrow = 1;
            $kosong = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $nkk = $row['A']; // Ambil data nkk
                $nik = $row['B']; // Ambil data nik
                $nama = $row['C']; // Ambil data nama
                $jk = $row['D']; // Ambil data jk
                $tmp_lahir = $row['E']; // Ambil data tmp lahir
                $tgl_lahir = $row['F']; // Ambil data tgl lahir
                $kwng = $row['G']; // Ambil data kwng
                $agama = $row['H']; // Ambil data agama
                $status = $row['I']; // Ambil data status
                $pend = $row['J']; // Ambil data alamat
                $kerjaan = $row['K']; // Ambil data kerjaan
                $alamat = $row['L']; // Ambil data alamat
                $kelurahan = $row['M']; // Ambil data kelurahan
                $kec = $row['N']; // Ambil data kec
                $kab = $row['O']; // Ambil data kab
                $prov = $row['P']; // Ambil data prov
                $hp = $row['Q']; // Ambil data hp
                $shdk = $row['R']; // Ambil data shdk
                $foto = $row['S']; // Ambil data foto
                $ket = $row['T']; // Ambil data ket

                // Cek jika semua data tidak diisi
                if ($nkk != "" && $nik != "" && $nama != "" && $jk != "" && $tmp_lahir != "" && $tgl_lahir != "" 
    && $kwng != "" && $agama != "" && $status != "" && $pend != "" && $kerjaan != "" && $alamat != "" && $kelurahan != "" && $kec != ""&& $kab != ""&& $prov != "" && $hp != "" && $shdk != "" && $foto != "" && $ket != "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow = 1) {
                    // Validasi apakah semua data telah diisi
                    $nkk_td = (!empty($nkk)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $nik_td = (!empty($nik)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $jk_td = (!empty($jk)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $tmp_lahir_td = (!empty($tmp_lahir)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $tgl_lahir_td = (!empty($tgl_lahir)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $kwng_td = (!empty($kwng)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $agama_td = (!empty($agama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $status_td = (!empty($status)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $pend_td = (!empty($pend)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $kerjaan_td = (!empty($kerjaan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $desa_td = (!empty($kelurahan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $kec_td = (!empty($kec)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $kab_td = (!empty($kab)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $prov_td = (!empty($prov)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $hp_td = (!empty($hp)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $shdk_td = (!empty($shdk)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $foto_td = (!empty($foto)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                   


                    // Jika salah satu data ada yang kosong
                    if ($nkk == "" or $nik == "" or $nama == "" or $jk == "" or $tmp_lahir == "" or $tgl_lahir == ""  or $kwng == "" or $agama == "" or $status == "" or $pend == "" or $kerjaan == "" or $alamat == "" or $kelurahan == ""or $kec == ""or $kab == ""or $prov == "" or $hp == ""  or $shdk == "" or $foto == "" ) {
                        $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td" . $nkk_td . ">" . $nkk . "</td>";
                    echo "<td" . $nik_td . ">" . $nik . "</td>";
                    echo "<td" . $nama_td . ">" . $nama . "</td>";
                    echo "<td" . $jk_td . ">" . $jk . "</td>";
                    echo "<td" . $tmp_lahir_td . ">" . $tmp_lahir . "</td>";
                    echo "<td" . $tgl_lahir_td . ">" . $tgl_lahir . "</td>";
                    echo "<td" . $kwng_td . ">" . $kwng . "</td>";
                    echo "<td" . $agama_td . ">" . $agama . "</td>";
                    echo "<td" . $status_td . ">" . $status . "</td>";
                    echo "<td" . $pend_td . ">" . $pend . "</td>";
                    echo "<td" . $kerjaan_td . ">" . $kerjaan . "</td>";
                    echo "<td" . $alamat_td . ">" . $alamat . "</td>";
                    echo "<td" . $desa_td . ">" . $kelurahan . "</td>";
                    echo "<td" . $kec_td . ">" . $kec . "</td>";
                    echo "<td" . $kab_td . ">" . $kab . "</td>";
                    echo "<td" . $prov_td . ">" . $prov . "</td>";
                    echo "<td" . $hp_td . ">" . $hp . "</td>";
                    echo "<td" . $shdk_td . ">" . $shdk . "</td>";
                    echo "<td" . $foto_td . ">" . $foto . "</td>";

                    echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
            }

            echo "</table></div>";
            // Buat sebuah div untuk alert validasi kosong
            echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
                    Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";
            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            if ($kosong > 0) {
    ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
    <?php
            } else { // Jika semua data sudah diisi
                echo "<hr>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import' class='btn btn-primary'>Import Data</button>";
            }

            echo "</form>";
        } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div style='color: red;margin-bottom: 10px;'>
                    Hanya File Excel (.xls) yang diperbolehkan
                </div>";
        }
    }
    ?>		