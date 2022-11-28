<?php

	include 'koneksi.php';

	$name = $_POST['name'];
	$nim = $_POST['nim'];
	$judul = $_POST['judul'];

	$query = mysqli_query($conn, "INSERT INTO projek VALUES('','$name','$nim','$judul')") or die(mysqli_error($konek));

	if ($query) {
		header("Location: projek.php");
	}

	else {
		echo "Proses input gagal";
	}


?>