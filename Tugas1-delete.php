<?php 
        require_once "db.php";
        require_once"Twig/Autoloader.php";
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("templates/");
        $twig = new Twig_Environment($loader);

if (! isset($_GET["nim"]))
    die("<p>ID Mahasiswa tidak diketahui</p>");
$conn = konek_db();
$nim   = $_GET["nim"];

$query = $conn->prepare("delete from mahasiswa where nim=?");
$query->bind_param("i", $nim);
$result = $query->execute();
if ($result)
    echo $twig->render("delete.html", array("pesan"=>"Data Mahasiswa berhasil dihapus"));
else
    echo $twig->render("delete.html", array("pesan"=>"Data Mahasiswa gagal dihapus"));
?>
    <p><a href="Tugas1-read.php"><button style="margin-left:100px;">Back</button></a></p>