<?php
session_start();
//import file koneksi.php dan AES.php
include "koneksi.php";  
include "AES.php"; 

$idfile    = mysqli_escape_string($conn, $_POST['fileid']);
$pwdfile   = mysqli_escape_string($conn, substr(md5($_POST["pwdfile"]), 0,16));
$query     = "SELECT password FROM modul WHERE id_file='$idfile' AND password='$pwdfile'";
$sql       = mysqli_query($conn,$query);
if(mysqli_num_rows($sql)>0){
    $query1     = "SELECT * FROM modul WHERE id_file='$idfile'";
    $sql1       = mysqli_query($conn,$query1);
    $data       = mysqli_fetch_assoc($sql1);

    $file_path  = $data["file_url"];
    $key        = $data["password"];
    $file_name  = $data["file_name_source"];
    $size       = $data["file_size"];

    $file_size  = filesize($file_path);

    $query2     = "UPDATE modul SET status='2' WHERE id_file='$idfile'";
    $sql2       = mysqli_query($conn,$query2);

    $mod        = $file_size%16;

    $aes        = new AES($key);
    $fopen1     = fopen($file_path, "rb");
    $plain      = "";
    $cache      = "fileDekripsi/$file_name";
    $fopen2     = fopen($cache, "wb");

    if($mod==0){
    $banyak = $file_size / 16;
     }else{
    $banyak = ($file_size - $mod) / 16;
    $banyak = $banyak+1;
    }

    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);
    for($bawah=0;$bawah<$banyak;$bawah++){

      $filedata    = fread($fopen1, 16);
      $plain       = $aes->decrypt($filedata);
      fwrite($fopen2, $plain);
   }
   $_SESSION["download"] = $cache;

   echo("<script language='javascript'>
       window.location.href='show_modul.php';
       window.alert('Berhasil mendekripsi file.');
       </script>
       ");
}else{
 echo("<script language='javascript'>
    window.location.href='dekripsi_file.php?id_file=$idfile';
    window.alert('Maaf, Password tidak sesuai.');
    </script>");
}
?>