<?php
if(! isset($_GET["nama"]))
	$nama="world";
else
	$nama=$_GET["nama"];
	sleep(5);
echo "Hello, $nama from PHP"
?>