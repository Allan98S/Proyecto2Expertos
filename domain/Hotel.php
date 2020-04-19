<?php 
  class Hotel {
    // DB stuff
    private $conn;
    private $table = 'hotel';

    // Post Properties
    public $idHotel;
    public $name;
    public $email;
    public $phone;
    public $offers;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idHotel, p.name, p.email, p.offers,p.phone
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
      $query = 'SELECT  p.idHotel, p.name, p.email, p.offers,p.phone
                                FROM ' . $this->table . ' p WHERE p.idHotel = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idHotel);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idHotel = $row['idHotel'];
      $this->name = $row['name'];
      $this->email = $row['email'];
      $this->offers = $row['offers'];
      $this->phone = $row['phone'];


    }
  }
 ?>