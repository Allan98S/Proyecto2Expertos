<?php 
  class TravelPackage {
    // DB stuff
    private $conn;
    private $table = 'travelpackage';

    // Post Properties
    public $idTravelPackage;
    public $name;
    public $starDate;
    public $endDate;
    public $cost;
    public $duration;
    public $description;
    public $idHotel;
    public $idAirport;
    public $touristType;
    public $typeOfRoute;
    public $idTouristCompany;
    public $numberOfPersons;
    public $travelType;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT p.idTravelPackage, p.startDate, p.endDate, p.name,p.cost,p.duration,p.description,
      p.idHotel,p.idAirport,p.touristType,p.typeOfRoute,p.idTouristCompany,p.numberOfPersons,p.travelType FROM ' . $this->table . ' p';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {

      //Create query
      $query = 'SELECT p.idTravelPackage, p.startDate, p.endDate, p.name,p.cost,p.duration,p.description,
     p.idHotel,p.idAirport,p.touristType,p.typeOfRoute,p.idTouristCompany,p.numberOfPersons,p.travelType FROM ' . $this->table . ' p WHERE p.idTravelPackage = ? LIMIT 0,1';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->idTravelPackage);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->idTravelPackage = $row['idTravelPackage'];
      $this->startDate = $row['startDate'];
      $this->endDate = $row['endDate'];
      $this->duration = $row['duration'];
      $this->name = $row['name'];
      $this->cost = $row['cost'];
      $this->description = $row['description'];
      $this->idHotel = $row['idHotel'];
      $this->idAirport = $row['idAirport'];
      $this->touristType = $row['touristType'];
      $this->typeOfRoute = $row['typeOfRoute'];
      $this->idTouristCompany = $row['idTouristCompany'];
      $this->numberOfPersons = $row['numberOfPersons'];
      $this->travelType = $row['travelType'];


    }

     // Update Post
    public function update() {
        
    $query = 'UPDATE ' . $this->table . ' SET startDate = :startDate, endDate = :endDate, duration = :duration, name =:name,
    cost =:cost,description =:description,idHotel =:idHotel,idAirport =:idAirport,touristType =:touristType,typeOfRoute=:typeOfRoute,idTouristCompany=:idTouristCompany, numberOfPersons=:numberOfPersons,travelType=:travelType 
    WHERE idTravelPackage = :idTravelPackage';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
           $this->idTravelPackage = htmlspecialchars(strip_tags($this->idTravelPackage));
          $this->startDate = htmlspecialchars(strip_tags($this->startDate));
          $this->endDate = htmlspecialchars(strip_tags($this->endDate));
          $this->duration = htmlspecialchars(strip_tags($this->duration));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->cost = htmlspecialchars(strip_tags($this->cost));
          $this->description = htmlspecialchars(strip_tags($this->description));
          $this->idHotel = htmlspecialchars(strip_tags($this->idHotel));
          $this->idAirport = htmlspecialchars(strip_tags($this->idAirport));
          $this->touristType = htmlspecialchars(strip_tags($this->touristType));
          $this->typeOfRoute = htmlspecialchars(strip_tags($this->typeOfRoute));
          $this->numberOfPersons = htmlspecialchars(strip_tags($this->numberOfPersons));
          $this->idTouristCompany = htmlspecialchars(strip_tags($this->idTouristCompany));
          $this->travelType = htmlspecialchars(strip_tags($this->travelType));
          // Bind data
          $stmt->bindParam(':idTravelPackage', $this->idTravelPackage);
          $stmt->bindParam(':startDate', $this->startDate);
          $stmt->bindParam(':endDate', $this->endDate);
          $stmt->bindParam(':duration', $this->duration);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':cost', $this->cost);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':idHotel', $this->idHotel);
          $stmt->bindParam(':idAirport', $this->idAirport);
          $stmt->bindParam(':touristType', $this->touristType);
          $stmt->bindParam(':typeOfRoute', $this->typeOfRoute);
          $stmt->bindParam(':idTouristCompany', $this->idTouristCompany);
          $stmt->bindParam(':numberOfPersons', $this->numberOfPersons);
          $stmt->bindParam(':travelType', $this->travelType);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE idTravelPackage = :idTravelPackage';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':idTravelPackage', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

  

  }