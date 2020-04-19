<?php 
  class Airport {
    // DB stuff
    private $conn;
    private $table = 'airport';

    // Post Properties
    public $idAirport;
    public $name;
    public $email;
    public $address;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idAirport, p.name, p.email, p.address
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
      $query = 'SELECT p.idAirport, p.name, p.email, p.address
                                FROM ' . $this->table . ' p WHERE p.idAirport = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idAirport);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idAirport = $row['idAirport'];
      $this->name = $row['name'];
      $this->email = $row['email'];
      $this->address = $row['address'];
     


    }

    

  

  }
?>