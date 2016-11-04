<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Tugas I</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
require_once"db.php";
$conn=konek_db();
if(!isset($_GET["nim"]))
	die("<p>Nim tidak ditemukan</p>");

$nim=$_GET["nim"];
$query = $conn->prepare("select*from mahasiswa where nim = ?");
$query->bind_param("i",$nim);
$result=$query->execute();

if(! $result)
	die("Gagal Query");

$rows=$query->get_result();
	if($rows->num_rows==0)
	die("Data Tidak lengkap");

if( ! isset($_POST["nama"])  || 
	! isset($_POST["tempat_lahir"])|| 
	! isset($_POST["tanggal_lahir"]) || 
	! isset($_POST["gender"]) || 
	! isset($_POST["alamat"])|| 
	! isset($_POST["fakultas"])|| 
	! isset($_POST["contact"])|| 
	! isset($_POST["email"]))
		die("Data tidak lengkap");

			$nama = $_POST["nama"];
   			$tempatl = $_POST["tempat_lahir"];
    		$tanggall = $_POST["tanggal_lahir"];
    		$gender = $_POST["gender"];
    		$alamat = $_POST["alamat"];
    		$fakultas = $_POST["fakultas"];
    		$contact = $_POST["contact"];
    		$email = $_POST["email"];


$query=$conn->prepare("update mahasiswa set nama=?, tempat_lahir=?, tanggal_lahir=?, gender=?, alamat=?, fakultas=?, contact=?, email=? where nim=?");
$query->bind_param("ssisssisi", $nama, $tempatl, $tanggall, $gender, $alamat, $fakultas, $contact, $email, $nim);
$result=$query->execute();

if( $result)
	echo "<p>Data mahasiswa berhasil diupdate</p>";
else
	echo "<p>Gagal update Data Mahasiswa</p>";
 ?>
 <p><a href="Tugas1-read.php"><button style="margin-left:100px;">Back</button></a></p>
</body>
</html>