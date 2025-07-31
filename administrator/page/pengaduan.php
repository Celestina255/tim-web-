\<?php include '../koneksi.php'; ?>

<div class="container mt-4">
    <h3 class="text-center mb-4">DAFTAR PENGADUAN WARGA</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>No. Telp/HP</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($con, "SELECT * FROM tb_contact ORDER BY id DESC");
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$data['name']}</td>
                        <td>{$data['telp']}</td>
                        <td>{$data['message']}</td>
                        <td>{$data['tanggal']}</td>
                        <td>
                           <a href='hapus_pengaduan.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
