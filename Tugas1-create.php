<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
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

    // bangun query yang akan dieksekusi menggunakan prepared statement
    // simbol ? pada statement query akan diisikan dengan parameter query
    // sesuai dengan parameter pada pemanggilan method bind_param
    $query = $conn->prepare("insert into mahasiswa(nim, nama, tempat_lahir, tanggal_lahir, gender, alamat, fakultas, contact, email) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // pasangkan parameter query dengan method bind_param
    // parameter pertama adalah string yang berisikan format data 
    // masing-masing parameter query
    // s -- string
    // i -- integer
    // d -- double
    // b -- blob/binary
    // parameter ke-dua dan seterusnya adalah parameter query
    // yang akan dipasangkan pada statement query
    $query->bind_param("ississsis",$nim, $nama, $tempatl, $tanggall, $gender, $alamat, $fakultas, $contact, $email);

    // jalankan query
    $result = $query->execute();
    if (! $result)
        die("<p>Proses query gagal.</p>");

    echo "<p>Data Mahasiswa berhasil ditambahkan.</p>";
} else {
    echo "<p>Data Mahasiswa belum diisi!</p>";
}
    ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contoh menambah data ke database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once "db.php";
if (isset($_POST["nama"]) && isset($_POST["harga"])) {
    $nama  = $_POST["nama"];
    $harga = $_POST["harga"];
    // buka koneksi ke db -- db.php
    $conn = konek_db();
    // bangun query yang akan dieksekusi menggunakan prepared statement
    // simbol ? pada statement query akan diisikan dengan parameter query
    // sesuai dengan parameter pada pemanggilan method bind_param
    $query = $conn->prepare("insert into produk(nama, harga) values(?, ?)");
    // pasangkan parameter query dengan method bind_param
    // parameter pertama adalah string yang berisikan format data 
    // masing-masing parameter query
    // s -- string
    // i -- integer
    // d -- double
    // b -- blob/binary
    // parameter ke-dua dan seterusnya adalah parameter query
    // yang akan dipasangkan pada statement query
    $query->bind_param("si", $nama, $harga);
    // jalankan query
    $result = $query->execute();
    if (! $result)
        die("<p>Proses query gagal.</p>");
    echo "<p>Data produk berhasil ditambahkan.</p>";
} else {
    echo "<p>Data produk belum diisi!</p>";
}
?>
<p><a href="read.php">Kembali ke Data Mahasiswa</a></p>
</body>
>>>>>>> 6614a2da81c49f39e8542212b622b805a9867a2c
</html>