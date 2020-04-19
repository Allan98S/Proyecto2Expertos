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

  

  }
  ?>