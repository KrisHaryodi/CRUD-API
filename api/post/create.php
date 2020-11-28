<?php 
$idBooking = '';
$idRuangan = '';
$idUser = '';
$waktuMulai = '';
$waktuSelesai = '';
$tahunBooking = '';
$bulanBooking = '';
$tanggalBooking = '';
$hargaTotal = '';

require_once('Database.php');
$idBooking = $_POST['idBooking'];
$idRuangan = $_POST['idRuangan'];
$idUser = $_POST['idUser'];
$waktuMulai = $_POST['waktuMulai'];
$waktuSelesai = $_POST['waktuSelesai'];
$tahunBooking = $_POST['tahunBooking'];
$bulanBooking = $_POST['bulanBooking'];
$tanggalBooking = $_POST['tanggalBooking'];
$hargaTotal = $_POST['hargaTotal'];

$query = mysqli_query($conn, "INSERT INTO infobooking VALUES ('$idBooking','$idRuangan','$idUser','$waktuMulai','$waktuSelesai','$tahunBooking','$bulanBooking','$tanggalBooking','$hargaTotal')");
if($query){
    echo json_encode(array('message'=>' data successfully added.'));
  }else{
    echo json_encode(array('message'=>' data failed to add.'));
  }
?>