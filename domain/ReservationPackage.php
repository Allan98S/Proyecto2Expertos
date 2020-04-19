<?php 
  class ReservationPackage {
    // DB stuff
    private $conn;
    private $table = 'reservationpackage';

    // Post Properties
    public $idReservacionPaquete;
    public $idUser;
    public $idTrip;
    public $reservationDate;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idReservacionPaquete, p.idUser, p.idTrip, p.reservationDate
                                FROM ' . $this->table . ' p';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {

      //Create query
      $query = 'SELECT p.idReservacionPaquete, p.idUser, p.idTrip, p.reservationDate
                                FROM ' . $this->table . ' p WHERE p.idReservacionPaquete = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idReservacionPaquete);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idReservacionPaquete = $row['idReservacionPaquete'];
      $this->idUser = $row['idUser'];
      $this->idTrip = $row['idTrip'];
      $this->reservationDate = $row['reservationDate'];
    

    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET idUser = :idUser, idTrip = :idTrip, reservationDate = :reservationDate';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data

          $this->idUser = htmlspecialchars(strip_tags($this->idUser));
          $this->idTrip = htmlspecialchars(strip_tags($this->idTrip));
          $this->reservationDate = htmlspecialchars(strip_tags($this->reservationDate));
       

          // Bind data
          $stmt->bindParam(':idUser', $this->idUser);
          $stmt->bindParam(':idTrip', $this->idTrip);
          $stmt->bindParam(':reservationDate', $this->reservationDate);
   

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

  

  }
?>