<?php

//membuat koneksi ke database
include '../koneksi.php';
//variabel nim yang dikirimkan form.php
$nmsurat = $_GET['nmsurat'];

//mengambil data
$query = mysqli_query($con, "SELECT * FROM tb_jenissurat where nmsurat='$nmsurat'");
$w = mysqli_fetch_array($query);
$data = array(
            'kode'          =>  $w['kode'],
            'page'          =>  $w['page'],
			'kode_klasi'    =>  $w['kode_klasi'],
            'syarat'        =>  $w['persyaratan'],);


//tampil data
echo json_encode($data);
?>
