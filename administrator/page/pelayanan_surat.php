<!-- Breadcrumb dan Searchbar sejajar -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <nav style="breadcrumb-divider: quote('>')" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Pelayanan Surat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua Surat</li>
        </ol>
    </nav>
    <div class="mt-2 mt-md-0">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari Surat..." style="width: 250px;">
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="suratContainer">
        <?php
        $kategori = ['Tata Usaha', 'Umum', 'Kependudukan', 'Pernikahan', 'Pertanahan', 'Lainnya'];
        foreach ($kategori as $kat) {
            $query = mysqli_query($con, "SELECT * FROM tb_jenissurat WHERE kategori='$kat' ORDER BY id ASC");
            while ($r = mysqli_fetch_array($query)) {
                ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 surat-item mb-5">
            <div class="card h-100" style="box-shadow: 1px 4px 10px rgba(0,0,0,0.1);">
                <img src="../img/file.png" class="card-img-top" alt="Surat"
                    style="align-items: center; padding:10% 20% 0%;">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $r['nmsurat']; ?></h5>
                    <a href="?page=<?php echo $r['page']; ?>" class="btn btn-primary d-block mt-2" type="button">Buat
                        Surat</a>
                </div>
            </div>
        </div>
        <?php }
        } ?>
    </div>
</div>

<!-- Script pencarian -->
<script>
const searchInput = document.getElementById("searchInput");
const suratItems = document.querySelectorAll(".surat-item");

searchInput.addEventListener("keyup", function() {
    const filter = searchInput.value.toLowerCase();
    suratItems.forEach(function(item) {
        const title = item.querySelector(".card-title").textContent.toLowerCase();
        if (title.includes(filter)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
});
</script>
