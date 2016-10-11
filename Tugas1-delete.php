<!DOCTYPE html>
<html lang="en">
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
require_once "db.php";
if (! isset($_GET["nim"]))
    die("<p>ID Mahasiswa tidak diketahui</p>");
$conn = konek_db();
$nim   = $_GET["nim"];

$query = $conn->prepare("delete from mahasiswa where nim=?");
$query->bind_param("i", $nim);
$result = $query->execute();
if ($result)
    echo "<p>Data Mahasiswa berhasil dihapus</p>";
else
    echo "<p>Gagal hapus Data Mahasiswa</p>";
?>
    <p><a href="Tugas1-read.php"><button style="margin-left:100px;">Back</button></a></p>
</body>
</html>