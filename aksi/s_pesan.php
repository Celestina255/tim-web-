<?php
include '../koneksi.php';

$name = $_POST['name'];
$telp = $_POST['telp'];
$message = $_POST['message'];

$name=stripslashes($name);
$telp=stripslashes($telp);
$message=stripslashes($message);
$message= "Name: $name, Message: $message";

$pesan=(isset($_POST['pesan']));
if($pesan){
//if no message entered and no telp entered print an error
	if (empty($message) && empty($telp)){
		print "No telp/hp dan pesan tidak boleh kosong !<br>Silahkan cantumkan no telp/hp dan pesan yang ingin disampaikan.";
	}
//if no message entered send print an error
	elseif (empty($message)){
		print "Pesan tidak boleh kosong !<br>Silahkan isi pesan yang ingin disampaikan.<br>";
	}
//if no telp entered send print an error
	elseif (empty($telp)){
		print "No telp/hp tidak boleh kosong !<br>Silahkan cantumkan no. telp/hp.<br>";
	} elseif (!empty($message) && !empty($telp) && !empty($name)){   
		mysqli_query($con, "INSERT INTO tb_contact(name, telp, message, status) VALUES ('$name','$telp','$message','Publish')")or die (Error.mysqli_error());

		echo "<script>alert('Pesan berhasil terkirim!'); window.location = '../warga/index.php?page=warga'</script>";

	} else {

		echo 'ERROR!';

	}
}
?>