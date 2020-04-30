<?php

    require_once('Data.php');

    $data = new Data();

    $destinies = $data::$destinies;
    
    echo(count($destinies));

?>
