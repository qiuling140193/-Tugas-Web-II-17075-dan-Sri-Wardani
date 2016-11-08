<?php
require_once"Twig/Autoloader.php";
Twig_Autoloader::register();

 $loader = new Twig_Loader_Filesystem("templates/");
 $twig = new Twig_Environment($loader);

 if (! isset($_GET["nama"]))
 	//echo $twig->render("form.html");
 	$output = $twig->render("form.html");
 else {
 	//$output = $twig->render("hello.html", array("nama"=>$_GET["nama"]));
 	$placeholders = array("nama"=>$_GET["nama"]);
 	$output = $twig->render("hello.html", $placeholders);
}
 echo $output;
?>