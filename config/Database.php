<?php 
  class Database {
    // DB Params
    
    //DB 000WebHost
    /*
    private $host = 'localhost';
    private $db_name = 'paquetes_turisticos';
    private $username = 'root';
    private $password = 'admin';
    private $conn;
    */
    private $host = 'localhost';
    private $db_name = 'id10234820_travellers_db';
    private $username = 'id10234820_admin';
    private $password = '123456789Julio!';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
?>