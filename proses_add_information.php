<?php
    include "koneksi.php";

    //Memindahkan data dari POST
    $date = $_POST['date'];
    $notes = base64_encode(str_rot13($_POST['notes']));

    //Menginputkan informasi ke dalam database
    $query = mysqli_query($conn, "INSERT INTO information VALUES('$date','$notes')") or die(mysqli_error($konek));
    
    //Cek apakah data berhasil diinputkan ke dalam database
    if ($query) {
		header("Location: index_admin.php");
	}
	else {
		echo "Proses input gagal";
	}
?>




