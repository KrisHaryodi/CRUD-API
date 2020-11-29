<?php 
$mysqli = new mysqli('localhost','root','','all_users');
$inputJSON = file_get_contents('php://input');
$data =json_decode($inputJSON);

$idBooking = $data->idBooking;
$idRuangan = $data->idRuangan;
$idUser = $data->idUser;
$waktuMulai = $data->waktuMulai;
$waktuSelesai = $data->waktuSelesai;
$tahunBooking = $data->tahunBooking;
$bulanBooking = $data->bulanBooking;
$tanggalBooking = $data->tanggalBooking;
$hargaTotal = $data->hargaTotal;

$mysqli->query("INSERT INTO infobooking VALUES ('$idRuangan','$idUser','$waktuMulai','$waktuSelesai','$tahunBooking','$bulanBooking','$tanggalBooking','$hargaTotal')");
if($query){
    echo json_encode(array('message'=>' data successfully added.'));
  }else{
    echo json_encode(array('message'=>' data failed to add.'));
  }
?>