<?php


class Data
{
    public static $destinies;

    public function __construct() {

        self::$destinies = $this->loadDestinies();

    }

    function loadDestinies(){

        $server_url = "https://loaiza4ever.000webhostapp.com";

        $json = file_get_contents($server_url.'/TravellersApi/api/touristDestination/read.php');
    
        $destinies = json_decode($json, true);

        return $destinies;

    }


}


?>