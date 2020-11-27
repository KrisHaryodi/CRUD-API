<?php
    session_start();
    $mysqli = new mysqli('localhost','root','','all_users');

    $id =0;
    $update = false;
    $namaRuangan = '';
    $deskripsiRuangan = '';
    $hargaRuangan = '';
    $lokasiRuangan = '';
    $kapasitasRuangan = '';
    $urlGambarRuangan = '';

    // Insert Post
    if (isset($_POST['save'])){
        $namaRuangan = $_POST['namaRuangan'];
        $deskripsiRuangan = $_POST['deskripsiRuangan'];
        $hargaRuangan = $_POST['hargaRuangan'];
        $lokasiRuangan = $_POST['lokasiRuangan'];
        $kapasitasRuangan = $_POST['kapasitasRuangan'];
        $urlGambarRuangan = $_POST['urlGambarRuangan'];
        
        $mysqli->query("INSERT INTO Ruangan (namaRuangan, deskripsiRuangan, hargaRuangan, lokasiRuangan, kapasitasRuangan, urlGambarRuangan) VALUES ('$namaRuangan', '$deskripsiRuangan', '$hargaRuangan', '$lokasiRuangan', '$kapasitasRuangan', '$urlGambarRuangan')");
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg-type'] ="success";

        header("location: index.php");
       }

       // Delete Post
       if (isset($_GET['delete'])){
           $id = $_GET['delete'];
           $mysqli->query("DELETE FROM Ruangan WHERE idRuangan=$id");

           $_SESSION['message'] = "Record has been deleted!";
           $_SESSION['msg-type'] ="danger";

           header("location: index.php");
       }

       // Edit Post
       if (isset($_GET['edit'])){
           $id = $_GET['edit'];
           $update = true;
           $result = $mysqli->query("SELECT * FROM Ruangan WHERE idRuangan=$id");
           if (count($result)==1){
               $row = $result->fetch_array();
               $namaRuangan = $row['namaRuangan'];
               $deskripsiRuangan = $row['deskripsiRuangan'];
               $hargaRuangan = $row['hargaRuangan'];
               $lokasiRuangan = $row['lokasiRuangan'];
               $kapasitasRuangan = $row['kapasitasRuangan'];
               $urlGambarRuangan = $row['urlGambarRuangan'];
           }
       }
       
       // Update Post
       if (isset($_POST['update'])){
        $id = $_POST['idRuangan'];
        $namaRuangan = $_POST['namaRuangan'];
        $deskripsiRuangan = $_POST['deskripsiRuangan'];
        $hargaRuangan = $_POST['hargaRuangan'];
        $lokasiRuangan = $_POST['lokasiRuangan'];
        $kapasitasRuangan = $_POST['kapasitasRuangan'];
        $urlGambarRuangan = $_POST['urlGambarRuangan'];
        $mysqli->query("UPDATE Ruangan SET namaRuangan='$namaRuangan', deskripsiRuangan='$deskripsiRuangan', hargaRuangan='$hargaRuangan', lokasiRuangan='$lokasiRuangan', kapasitasRuangan='$kapasitasRuangan', urlGambarRuangan='$urlGambarRuangan'  WHERE idRuangan=$id");

        header("location: index.php");
    }
       ?>