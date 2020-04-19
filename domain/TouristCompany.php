<?php 
  class TouristCompany {
    // DB stuff
    private $conn;
    private $table = 'touristcompany';

    // Post Properties
    public $idTouristCompany;
    public $name;
    public $email;
    public $phone;
 

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idTouristCompany, p.name, p.email,p.phone
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
      $query = 'SELECT  p.idTouristCompany, p.name, p.email,p.phone
                                FROM ' . $this->table . ' p WHERE p.idTouristCompany = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idTouristCompany);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idTouristCompany = $row['idTouristCompany'];
      $this->name = $row['name'];
      $this->email = $row['email'];
      $this->phone = $row['phone'];


    }

    

  

  }
?>