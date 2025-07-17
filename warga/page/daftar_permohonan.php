<?php
include_once "../assets/inc.php";
?>

<div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5" align="left">STATUS PERMOHONAN SURAT
                        </h3>
                        <hr class="line-seprate">
                    </div>

                </div>
</div>
<div class="container mt-2">
        <div class="card ">
            <div class="card-body animated zoomIn" style="overflow-x: scroll;">
                <table id="bootstrap-data-table-export0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Nama Surat</th>
                            <th>No. Hp</th>
                            <th>Tanggal</th>
                            <th>Foto KTP/KK</th>
                            <th>Pas Photo</th>
                            <th>Status Pengajuan</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $userid = $_SESSION['userid'];
                        $query = mysqli_query ($con, "SELECT * FROM tb_permohonan WHERE userid='$userid' ORDER BY id DESC");
                        $no=1;
                        while ($data = mysqli_fetch_assoc($query)){
                           ?>
                           <tr>
                            <td align="center"><?php echo $no++;?></td>
                            <td><?php echo $data['nama'];?></td>
                            <td><?php echo $data['nmsurat'];?></td>
                            <td><?php echo $data['hp'];?></td>
                            <td><?php echo IndonesiaTgl($data['tgl']);?></td>
                            <td><a href="../file/berkas/<?php echo $data['berkas'];?>" target="_BLANK"><img src="../file/berkas/<?php echo $data['berkas'];?>" style=" width: 40px; height:  auto; border-color: white; box-shadow: 2px 1px 4px ;"></a></td>
                            <td><a href="../file/fotowarga/<?php echo $data['foto'];?>" target="_BLANK"><img src="../file/fotowarga/<?php echo $data['foto'];?>" style=" width: 40px; height:  auto; border-color: white; box-shadow: 2px 1px 4px ;"></a></td>
                            <td align="center"><a href="?page=tunggu_permohonan&id=<?php echo $data['id'];?>&userid=<?php echo $_SESSION['userid']; ?>"><?php if ($data['status']=='onprocess') : ?> <p style='background:blue;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>On Process</p><?php elseif($data['status']=='ditolak') : ?> <p style='background:red;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>Permohonan ditolak</p>  <?php elseif ($data['status']=='acc') : ?> <p style='background:grey;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>Sudah acc</p><?php endif; ?></a>
                            </td>

                        </tr>

                    <?php }?>    

                </tbody>
            </table>
        </div>      
    </div>

</div>
<br>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export0').DataTable();
    } );
</script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 50,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>


</body>

</html>