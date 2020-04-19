<?php 
  class User {
    // DB stuff
    private $conn;
    private $table = 'user';

    // Post Properties
    public $idUser;
    public $userName;
    public $password;
    public $name;
    public $lastName;
    public $email;
    public $phone;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idUser, p.userName, p.password, p.name,p.lastName,p.email,p.phone
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
      $query = 'SELECT p.idUser, p.userName, p.password, p.name,p.lastName,p.email,p.phone
                                FROM ' . $this->table . ' p WHERE p.idUser = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idUser);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idUser = $row['idUser'];
      $this->userName = $row['userName'];
      $this->password = $row['password'];
      $this->name = $row['name'];
      $this->lastName = $row['lastName'];
      $this->email = $row['email'];
      $this->phone = $row['phone'];

    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET userName = :userName, password = :password, name = :name, lastName = :lastName,email = :email,phone = :phone';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data

          $this->userName = htmlspecialchars(strip_tags($this->userName));
          $this->password = htmlspecialchars(strip_tags($this->password));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->lastName = htmlspecialchars(strip_tags($this->lastName));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->phone = htmlspecialchars(strip_tags($this->phone));


          // Bind data
          $stmt->bindParam(':userName', $this->userName);
          $stmt->bindParam(':password', $this->password);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':lastName', $this->lastName);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':phone', $this->phone);

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