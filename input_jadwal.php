<?php
    include "koneksi.php";
    include "vigenere.php";
    //Memindahkan data dari POST
    $pertemuan = $_POST['pertemuan'];
    $topik = $_POST['topik'];
    $tanggal = $_POST['tanggal'];
    $tempat = base64_encode(encrypt('novia', $_POST['tempat']));

    //Menginputkan informasi ke dalam database
    $query = mysqli_query($conn, "INSERT INTO jadwal VALUES('','$pertemuan','$topik','$tanggal','$tempat')") or die(mysqli_error($konek));
    
    //Cek apakah data berhasil diinputkan ke dalam database
    if ($query) {
		header("Location: index_admin.php");
	}
	else {
		echo "Proses input gagal";
	}
?>


