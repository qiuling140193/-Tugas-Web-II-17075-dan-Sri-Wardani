
	<?php 
	require_once "db.php";
        require_once"Twig/Autoloader.php";
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("templates/");
        $twig = new Twig_Environment($loader);
        //echo $twig->render("read.html");
        //return;

	$conn=konek_db();
	$query=$conn->prepare("select*from mahasiswa order by nim");
	$result=$query->execute();

		if(! $result)
	 		die("Gagal Query");
		;

	$rows=$query->get_result();
	$items = $rows->fetch_all(MYSQLI_ASSOC);

	echo $twig->render("read.html", array("items"=>$items));
	/*
	$items = array();
			while ($row = $rows->fetch_object()){
				array_push($items,array("nim"=>$row->nim,))
				/*$url_edit="Tugas1-edit.php?nim=" . $row['nim'];
				$url_delete="Tugas1-delete.php?nim=" . $row['nim'];
				echo"<tr>";
				echo"<td>" . $row['nim'] . "</td>";
				echo"<td>" . $row['nama'] . "</td>";
				echo"<td>" . $row['tempat_lahir'] . "</td>";
				echo"<td>" . $row['tanggal_lahir'] . "</td>";
				echo"<td>" . $row['gender'] . "</td>";
				echo"<td>" . $row['alamat'] . "</td>";
				echo"<td>" . $row['fakultas'] . "</td>";
				echo"<td>" . $row['contact'] . "</td>";
				echo"<td>" . $row['email'] . "</td>";
				echo"<td><a href='".$url_edit."'><button>Edit</button></a><a href='".$url_delete."'><button>Hapus</button></a></td>";
				echo"</tr>";
			}*/
		?>
 	</table>  
 	<p></p>
	 <a href='Tugas1-create.php' ><button style="margin-left:100px;">Add</button></a><a href='Tugas1-menu.html' ><button style="margin-left:200px;">Back</button></a>

