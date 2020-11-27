<?php 
  class Ruangan {
    // DB stuff
    private $conn;
    private $table = 'Ruangan';

    // Post Properties
    public $idRuangan;
    public $deskripsiRuangan;
    public $idBooking;
    public $hargaRuangan;
    public $lokasiRuangan;
    public $urlGambarRuangan;
    public $kapasitasRuangan;
    public $namaRuangan;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
   public function read() {
      // Create query
      $query = 'SELECT r.namaRuangan, r.idRuangan, r.deskripsiRuangan, r.hargaRuangan, r.lokasiRuangan, r.urlGambarRuangan, r.kapasitasRuangan, i.idBooking
                                FROM ' . $this->table . ' r JOIN infobooking i ON r.idRuangan = i.idRuangan
                                ORDER BY
                                  idRuangan ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT r.namaRuangan,r.idRuangan, r.deskripsiRuangan, r.hargaRuangan, r.lokasiRuangan, r.urlGambarRuangan, r.kapasitasRuangan, i.idBooking
                                    FROM ' . $this->table . ' r JOIN infobooking i ON r.idRuangan = i.idRuangan
                                    WHERE
                                      r.idRuangan = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->idRuangan);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->namaRuangan = $row['namaRuangan'];
          $this->idRuangan = $row['idRuangan'];
          $this->deskripsiRuangan = $row['deskripsiRuangan'];
          $this->hargaRuangan = $row['hargaRuangan'];
          $this->lokasiRuangan = $row['lokasiRuangan'];
          $this->urlGambarRuangan = $row['urlGambarRuangan'];
          $this->kapasitasRuangan = $row['kapasitasRuangan'];
          $this->idBooking = $row['idBooking'];
          
    }
  }