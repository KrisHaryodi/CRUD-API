<?php 
  class User {
    // DB stuff
    private $conn;
    private $table = 'User';

    // Post Properties
    public $idUser;
    public $namaUser;
    public $urlGambarUser;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
   public function read() {
      // Create query
      $query = 'SELECT u.namaUser, u.idUser, u.urlGambarUser
                                FROM ' . $this->table . ' u
                                ORDER BY
                                  idUser ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT u.namaUser, u.idUser, u.urlGambarUser
                                    FROM ' . $this->table . ' u
                                    WHERE
                                      idUser = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->idRuangan);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->namaUser = $row['namaUser'];
          $this->idUser = $row['idUser'];
          $this->urlGambarUser = $row['urlGambarUser'];
          
    }
  }