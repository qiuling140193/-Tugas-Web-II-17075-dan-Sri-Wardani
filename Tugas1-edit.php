<?php 
        require_once "db.php";
        require_once"Twig/Autoloader.php";
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("templates/");
        $twig = new Twig_Environment($loader);
       
        

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
 echo $twig->render("edit.html", array("data"=>$data));
 ?>

 
