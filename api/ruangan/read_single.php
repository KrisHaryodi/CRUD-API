<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../Database.php';
  include_once '../../models/ruangan.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Ruangan($db);

  // Get ID
  $post->idRuangan = isset($_GET['idRuangan']) ? $_GET['idRuangan'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'idRuangan' => $post->idRuangan,
    'namaRuangan' => $post->namaRuangan,
    'deskripsiRuangan' => $post->deskripsiRuangan,
    'hargaRuangan' => $post->hargaRuangan,
    'lokasiRuangan' => $post->lokasiRuangan,
    'urlGambarRuangan' => $post->urlGambarRuangan,
    'kapasitasRuangan' => $post->kapasitasRuangan,
    'idBooking' => $post->idBooking
  );

  // Make JSON
  print_r(json_encode($post_arr));