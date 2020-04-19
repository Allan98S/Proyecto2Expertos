<?php 
  class ImageURL {
    // DB stuff
    private $conn;
    private $table = 'imagetouristdestination';

    // Post Properties
    public $idImageTouristDestination;
    public $idTouristDestination;
    public $imageURL;
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idImageTouristDestination, p.idTouristDestination, p.imageURL
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
      $query = 'SELECT p.idImageTouristDestination, p.idTouristDestination, p.imageURL
                                FROM ' . $this->table . ' p WHERE p.idImageTouristDestination = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idImageTouristDestination);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idImageTouristDestination = $row['idImageTouristDestination'];
      $this->idTouristDestination = $row['idTouristDestination'];
      $this->imageURL = $row['imageURL'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET idImageTouristDestination = :idImageTouristDestination, idTouristDestination = :idTouristDestination, imageURL = :imageURL';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data

          $this->idImageTouristDestination = htmlspecialchars(strip_tags($this->idImageTouristDestination));
          $this->idTouristDestination = htmlspecialchars(strip_tags($this->idTouristDestination));
          $this->imageURL = htmlspecialchars(strip_tags($this->imageURL));

          // Bind data
          $stmt->bindParam(':idImageTouristDestination', $this->idImageTouristDestination);
          $stmt->bindParam(':idTouristDestination', $this->idTouristDestination);
          $stmt->bindParam(':imageURL', $this->imageURL);
        

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