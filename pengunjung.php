<?php
// Menyisipkan file Koneksi ke database
// File ini diperlukan saat berinteraksi dengan database Seperti INSERT, UPDATE, DELETE dan SELECT
require 'koneksi.php';

   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $query = mysqli_query($con, "SELECT * FROM tb_statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  $s=mysqli_fetch_array($query);
  if($s == 0){
    mysqli_query($con, "INSERT INTO tb_statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysqli_query($con, "UPDATE tb_statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysqli_query($con, "SELECT * FROM tb_statistik WHERE tanggal='$tanggal' GROUP BY ip");
  $totalpengunjung  = mysqli_query($con, "SELECT COUNT(hits) FROM tb_statistik"); 
  $hits             = mysqli_query($con, "SELECT SUM(hits) as hitstoday FROM tb_statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal"); 
  $totalhits        = mysqli_query($con, "SELECT SUM(hits) FROM tb_statistik"); 
  $tothitsgbr       = mysqli_query($con, "SELECT SUM(hits) FROM tb_statistik"); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysqli_query($con, "SELECT * FROM tb_statistik WHERE online > '$bataswaktu'");


?>