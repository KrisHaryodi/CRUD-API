<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'infobooking';

    // Post Properties
    public $idRuangan;
    public $idUser;
    public $idBooking;
    public $waktuMulai;
    public $waktuSelesai;
    public $tahunBooking;
    public $bulanBooking;
    public $tanggalBooking;
    public $hargaTotal;
    public $namaUser;
    public $namaRuangan;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
   public function read() {
      // Create query
      $query = 'SELECT i.idBooking, i.waktuMulai, i.waktuSelesai, i.tahunBooking, i.bulanBooking, i.tanggalBooking, u.idUser, i.hargaTotal, r.idRuangan
                                FROM ' . $this->table . ' i JOIN User u ON i.idUser = u.idUser JOIN Ruangan r on i.idRuangan = r.idRuangan
                                ORDER BY
                                  idbooking ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT i.idBooking, i.waktuMulai, i.waktuSelesai, i.tahunBooking, i.bulanBooking, i.tanggalBooking, u.idUser, i.hargaTotal, r.idRuangan
                                    FROM ' . $this->table . ' i JOIN User u ON i.idUser = u.idUser JOIN Ruangan r on i.idRuangan = r.idRuangan
                                    WHERE
                                      idBooking = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->idBooking);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->waktuMulai = $row['waktuMulai'];
          $this->waktuSelesai = $row['waktuSelesai'];
          $this->tahunBooking = $row['tahunBooking'];
          $this->bulanBooking = $row['bulanBooking'];
          $this->tanggalBooking = $row['tanggalBooking'];
          $this->namaRuangan = $row['namaRuangan'];
          $this->idUser = $row['idUser'];
          $this->idBooking = $row['idBooking'];
          
    }


    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET idRuangan = :idRuangan, idUser = :idUser, waktuMulai = :waktuMulai, waktuSelesai = :waktuSelesai,
      tahunBooking = :tahunBooking, bulanBooking = :bulanBooking, tanggalBooking = :tanggalBooking, hargaTotal = :hargaTotal';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->idRuangan = htmlspecialchars(strip_tags($this->idRuangan));
      $this->idUser = htmlspecialchars(strip_tags($this->idUser));
      $this->waktuMulai = htmlspecialchars(strip_tags($this->waktuMulai));
      $this->waktuSelesai = htmlspecialchars(strip_tags($this->waktuSelesai));
      $this->tahunBooking = htmlspecialchars(strip_tags($this->tahunBooking));
      $this->bulanBooking = htmlspecialchars(strip_tags($this->bulanBooking));
      $this->tanggalBooking = htmlspecialchars(strip_tags($this->tanggalBooking));
      $this->hargaTotal = htmlspecialchars(strip_tags($this->hargaTotal));

      // Bind data
      $stmt->bindParam(':idRuangan', $this->idRuangan);
      $stmt->bindParam(':idUser', $this->idUser);
      $stmt->bindParam(':waktuMulai', $this->waktuMulai);
      $stmt->bindParam(':waktuSelesai', $this->waktuSelesai);
      $stmt->bindParam(':tahunBooking', $this->tahunBooking);
      $stmt->bindParam(':bulanBooking', $this->bulanBooking);
      $stmt->bindParam(':tanggalBooking', $this->tanggalBooking);
      $stmt->bindParam(':hargaTotal', $this->hargaTotal);

      // Execute query
      if($stmt->execute()) {
        return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}

    
  }