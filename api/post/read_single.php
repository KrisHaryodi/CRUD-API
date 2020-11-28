<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get ID
  $post->idBooking = isset($_GET['idBooking']) ? $_GET['idBooking'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'idBooking' => $post->idBooking,
    'idUser' => $post->idUser,
    'waktuMulai' => $post->waktuMulai,
    'waktuSelesai' => $post->waktuSelesai,
    'tahunBooking' => $post->tahunBooking,
    'bulanBooking' => $post->bulanBooking,
    'tanggalBooking' => $post->tanggalBooking,
    'idRuangan' => $post->idRuangan,
    'hargaTotal' => $post->hargaTotal
  );

  // Make JSON
  print_r(json_encode($post_arr));