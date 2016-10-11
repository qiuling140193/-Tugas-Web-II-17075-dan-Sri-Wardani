<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Tugas I</title>
    <link rel="stylesheet" href="style.css">
	<style>
	body {
	background-image:url("uph.gif");
	background-position:center;
    background-color: #cccccc;
	background-repeat: no-repeat;
	background-attachment: fixed;
	width:100%;
	margin:0;
	font-family: Comic Sans MS;
	font-variant:small-caps;
	}
	</style>
</head>
<body>

<?php 
require_once"db.php";

if (! isset($_GET['nim']))
	die("Informasi tidak ditemukan");
$conn=konek_db();

$nim=$_GET['nim'];
$query = $conn->prepare("select*from mahasiswa where nim = ?");
$query->bind_param("i",$nim);
$result=$query->execute();

if(! $result)
	die("gagal Query");

$rows=$query->get_result();
if($rows->num_rows==0)
	die("<p>Informasi Mahasiswa tidak ditemukan</p>");

$data = $rows->fetch_object();
 ?>

 <form method="post" action="Tugas1-update.php?nim=<?php echo $data->nim; ?>" style="margin-left:100px;">
 <h1 style="margin-left:70px;">Edit Data Mahasiswa</h1>
 	<div>
 		<label>Nim :</label>
 		<span><?php echo $data->nim;?></span>
 	</div>
 	<div>
 		<label>Nama :</label>
 		<input type="text" name="nama" value="<?php echo $data->nama;?>">
 	</div>
 	<div>
 		<label>Tempat Lahir :</label>
 		<input type="text" name="tempat_lahir" value="<?php echo $data->tempat_lahir;?>">
 	</div>
 	<div>
 		<label>Tanggal Lahir :</label>
 		<input type="number" name="tanggal_lahir" value="<?php echo $data->tanggal_lahir;?>">
 	</div>
 	<div>
 		<label>Gender :</label>
 		<input type="text" name="gender" value="<?php echo $data->gender;?>">
 	</div>
 	<div>
 		<label>Alamat :</label>
 		<input type="text" name="alamat" value="<?php echo $data->alamat;?>">
 	</div>
 	<div>
 		<label>Fakultas :</label>
 		<input type="text" name="fakultas" value="<?php echo $data->fakultas;?>">
 	</div>
 	<div>
 		<label>Contact :</label>
 		<input type="number" name="contact" value="<?php echo $data->contact;?>">
 	</div>
 	<div>
 		<label>Email :</label>
 		<input type="text" name="email" value="<?php echo $data->email;?>">
 	</div>
 	<div><input type="submit" value="Update"></div>

 </form>

 <a href="Tugas1-read.php"><button style="margin-left:110px;">Cancel</button></a>
</body>
</html>