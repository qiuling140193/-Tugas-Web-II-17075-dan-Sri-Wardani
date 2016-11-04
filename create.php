<?php 
        require_once "db.php";
        require_once"Twig/Autoloader.php";
	Twig_Autoloader::register();
	 $loader = new Twig_Loader_Filesystem("templates/");
 	$twig = new Twig_Environment($loader);

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