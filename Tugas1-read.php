<!DOCTYPE html>
<html>
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
<body >
	<?php 
	require_once "db.php";
	$conn=konek_db();
	$query=$conn->prepare("select*from mahasiswa");
	$result=$query->execute();

		if(! $result)
	 		die("Gagal Query");
		;

	$rows=$query->get_result();
	 ?>
	 <table style="margin-left:100px;">
 		<tr>
 			<th>Nim</th>
 			<th>Nama</th>
 			<th>Tempat Lahir</th>
 			<th>Tanggal Lahir</th>
 			<th>Gender</th>
 			<th>Alamat</th>
 			<th>Fakultas</th>
 			<th>Contact</th>
 			<th>Email</th>
 			<th>Action</th>
 		</tr>
		<?php
			while ($row = $rows->fetch_array()){
				$url_edit="Tugas1-edit.php?nim=" . $row['nim'];
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
			}
		?>
 	</table>  
	 <a href='Tugas1-create.html' ><button style="margin-left:100px;">Add</button></a>
</body>
</html>