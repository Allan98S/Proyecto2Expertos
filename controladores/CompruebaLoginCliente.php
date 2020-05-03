<?php
require("../datos/UsuarioData.php");
try{
    $usuarioData=new UsuarioData();
    $userName=htmlentities(addslashes($_POST["userName"]));
    $password=htmlentities(addslashes($_POST["password"]));
    $userArray=$usuarioData->getLogin($userName,$password);
    $numero_registros= count($userArray);
    if($userArray['userName']==$userName && $userArray['password']==$password){
    session_start(); // iniciamos sesion si el usuario existe
    $_SESSION["usuarioCliente"]=$_POST["userName"]; // se asigna  a la variable superGlobal sesion el usuario actual
     header("location:/Proyecto2Expertos/vistas/indexLogueado.php");
        
     }
     
    else{
         header("location:../vistas/login.php"); //redirige a la pagina login.php
    }

        }catch(Exception $e){
        die ('Error: '. $e->getMessage());
       
        }
?>