<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Tugas I</title>
    <link rel="stylesheet" href="style.css">
	<style>
    body {
    background-color: white;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: Comic Sans MS;
    font-variant:small-caps;
    margin-top: 100px;
    }
    form label{
        display: inline-block; 
        min-width: 200px;
        padding-top: 10px;
    }
    #header{
    background-color:black;
    color:Red;
    text-align:center;
    position:fixed;
    top: 0;
    overflow: hidden;
    width:1350px;
    height:70px;
    font-family:harrington;
    font-variant:small-caps;
    font-size:50px;
    position:fixed;
    }
    form{
        margin-left: 100px;
    }
    </style>
</head>

</head>
<body>
<div id="header"> Tugas I  </div>
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