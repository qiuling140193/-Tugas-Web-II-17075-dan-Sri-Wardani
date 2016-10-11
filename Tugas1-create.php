<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Mahasiswa</title>
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

if (isset($_POST["nim"]) && isset($_POST["nama"])  && isset($_POST["tempat_lahir"])&& isset($_POST["tanggal_lahir"]) && isset($_POST["gender"]) && isset($_POST["alamat"])&& isset($_POST["fakultas"])&& isset($_POST["contact"])&& isset($_POST["email"])) {
    $nim  = $_POST["nim"];
    $nama = $_POST["nama"];
    $tempatl = $_POST["tempat_lahir"];
    $tanggall = $_POST["tanggal_lahir"];
    $gender = $_POST["gender"];
    $alamat = $_POST["alamat"];
    $fakultas = $_POST["fakultas"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];

    $conn = konek_db();


    $query = $conn->prepare("insert into mahasiswa(nim, nama, tempat_lahir, tanggal_lahir, gender, alamat, fakultas, contact, email) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("ississsis",$nim, $nama, $tempatl, $tanggall, $gender, $alamat, $fakultas, $contact, $email);


    $result = $query->execute();
    if (! $result)
        die("<p>Proses query gagal.</p>");

    echo "<p style="margin-left:100px;">Data Mahasiswa berhasil ditambahkan.</p>";
} else {
    echo "<p style="margin-left:100px;">Data Mahasiswa belum diisi!</p>";
}
 	?>
</body>
</html>