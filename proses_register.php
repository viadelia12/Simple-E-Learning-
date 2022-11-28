<?php
    session_start();
    //Mengecek apakah sudah logi atau belum
    if(isset($_SESSION['username']))
        header("location: index.php");
    //Mengecek apakah data sudah dikirimkan atau belum
    else if(!isset($_POST['username']))
        header("location: register.php?error=username salah");
    //Jika lolos semua pengecekan
    else{
        include "koneksi.php";

        //Memindahkan data dari POST
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];

        //Mengecek apakah ada users dengan username yang sama atau tidak
        $sql = "SELECT `username` FROM `users`";
        $result = mysqli_query($conn, $sql);
        $found = false;

        while($user = mysqli_fetch_assoc($result)){
            if($user['username'] == $username)
                $found = true;
        }

        //Jika username sudah ada
        if($found)
            header("location: register.php?msg=username tidak tersedia");
        //Jika username tidak ada
        else{
            $sql = "INSERT INTO `users` VALUE('','$nama','$nim','$username','$password')";
            $result = mysqli_query($conn, $sql);
            if($result)
                header("location: login.php");
            else
                header("location: register.php?msg=registrasi gagal");
        }
    }

?>