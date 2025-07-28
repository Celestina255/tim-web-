<?php include_once "../assets/inc.php"; ?>
<div class="container mt-4">
    <h3 class="text-center mb-4">TAMBAH DATA MONOGRAFI KAMPUNG</h3>
    <form action="page/aksi_tambah_monografi.php" method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jumlah KK</label>
                <input type="number" name="jumlah_kk" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Jumlah Penduduk</label>
                <input type="number" name="jumlah_penduduk" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Laki-laki</label>
                <input type="number" name="jumlah_laki" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Perempuan</label>
                <input type="number" name="jumlah_perempuan" class="form-control">
            </div>
        </div>

        <hr><h5>Kelompok Umur</h5>
        <div class="row">
            <?php
            $umur = ['0_3', '4_6', '7_12', '13_15', '16_18', '19_59', '60_keatas'];
            foreach ($umur as $u) {
                echo '<div class="col-md-3 mb-3">
                        <label>Umur '.$u.'</label>
                        <input type="number" name="umur_'.$u.'" class="form-control">
                    </div>';
            }
            ?>
        </div>

        <hr><h5>Kelompok Tenaga Kerja</h5>
        <div class="row">
            <?php
            $kerja = ['10_14', '15_19', '20_26', '27_59', '60_keatas'];
            foreach ($kerja as $k) {
                echo '<div class="col-md-3 mb-3">
                        <label>Usia '.$k.'</label>
                        <input type="number" name="usia_'.$k.'" class="form-control">
                    </div>';
            }
            ?>
        </div>

        <hr><h5>Agama</h5>
        <div class="row">
        <?php
        $agama = ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'];
        foreach ($agama as $a) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.ucfirst($a).'</label>
                    <input type="number" name="agama_'.$a.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Pendidikan</h5>
        <div class="row">
        <?php
        $pendidikan = ['sd', 'smp', 'sma', 'diploma', 'sarjana'];
        foreach ($pendidikan as $p) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.strtoupper($p).'</label>
                    <input type="number" name="pendidikan_'.$p.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Pekerjaan</h5>
        <div class="row">
        <?php
        $pekerjaan = ['pns', 'tni_polri', 'swasta', 'tani', 'wiraswasta', 'petukangan', 'nelayan', 'pensiunan', 'jasa_lain', 'buruh', 'guru', 'tenaga_kesehatan', 'honorer', 'mahasiswa', 'irt'];
        foreach ($pekerjaan as $p) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.ucwords(str_replace('_', ' ', $p)).'</label>
                    <input type="number" name="pekerjaan_'.$p.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Mobilitas</h5>
        <div class="row">
        <?php
        $mobilitas = ['lahir_l', 'lahir_p', 'mati_l', 'mati_p', 'datang_l', 'datang_p', 'keluar_l', 'keluar_p'];
        foreach ($mobilitas as $m) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.strtoupper(str_replace('_', ' ', $m)).'</label>
                    <input type="number" name="'.$m.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Luas & Batas Wilayah</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Luas Kampung</label>
                <input type="text" name="luas_kampung" class="form-control">
            </div>
            <?php
            $batas = ['utara', 'selatan', 'timur', 'barat'];
            foreach ($batas as $b) {
                echo '<div class="col-md-6 mb-3">
                        <label>Batas '.ucfirst($b).'</label>
                        <input type="text" name="batas_'.$b.'" class="form-control">
                    </div>';
            }
            ?>
        </div>

        <hr><h5>Peruntukan Lahan</h5>
        <div class="row">
        <?php
        $peruntukan = ['jalan', 'ladang', 'bangunan', 'pemukiman', 'pemakaman'];
        foreach ($peruntukan as $p) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.ucwords($p).'</label>
                    <input type="text" name="lahan_'.$p.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Penggunaan Lahan</h5>
        <div class="row">
        <?php
        $penggunaan = ['industri', 'perkebunan', 'pertanian', 'pasar', 'hutan_sagu', 'tanah_kering', 'tanah_belum_dikelola'];
        foreach ($penggunaan as $p) {
            $input = in_array($p, ['tanah_kering', 'tanah_belum_dikelola']) ? 'textarea' : 'input';
            echo '<div class="col-md-6 mb-3">
                    <label>'.ucwords(str_replace('_', ' ', $p)).'</label>';
            if ($input == 'textarea') {
                echo '<textarea name="guna_'.$p.'" class="form-control" rows="2"></textarea>';
            } else {
                echo '<input type="text" name="guna_'.$p.'" class="form-control">';
            }
            echo '</div>';
        }
        ?>
        </div>

        <hr><h5>Sarana Ibadah</h5>
        <div class="row">
        <?php
        $ibadah = ['masjid', 'pura', 'gereja_kristen', 'gereja_katolik', 'vihara', 'klenteng'];
        foreach ($ibadah as $i) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.ucwords(str_replace('_', ' ', $i)).'</label>
                    <input type="number" name="sarana_'.$i.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Sarana Pendidikan</h5>
        <div class="row">
        <?php
        $pendidikan = ['pauddll', 'sd', 'smp', 'sma'];
        foreach ($pendidikan as $p) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.strtoupper($p).'</label>
                    <input type="number" name="sarana_'.$p.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Sarana Kesehatan</h5>
        <div class="col-md-3 mb-3">
            <label>Jumlah Sarana Kesehatan</label>
            <input type="number" name="sarana_kesehatan" class="form-control">
        </div>

        <hr><h5>Sarana Olahraga</h5>
        <div class="row">
        <?php
        $olahraga = ['sepakbola', 'voli', 'bulutangkis'];
        foreach ($olahraga as $o) {
            echo '<div class="col-md-3 mb-3">
                    <label>Lapangan '.ucfirst($o).'</label>
                    <input type="number" name="lapangan_'.$o.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <hr><h5>Transportasi</h5>
        <div class="row">
        <?php
        $transport = ['motor', 'mobil', 'sampan', 'katinting', 'longboat', 'speedboat'];
        foreach ($transport as $t) {
            echo '<div class="col-md-3 mb-3">
                    <label>'.ucfirst($t).'</label>
                    <input type="number" name="kendaraan_'.$t.'" class="form-control">
                </div>';
        }
        ?>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="index.php?page=transparansi" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
