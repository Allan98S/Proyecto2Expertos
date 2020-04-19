<?php
require("../datos/AdminData.php");
try{
    $adminData=new AdminData();
    $adminArray=$adminData->getAllAdmin();
    $numero_registros= count($adminArray);
    $userName=htmlentities(addslashes($_POST["userName"]));
    $password=htmlentities(addslashes($_POST["password"]));
    if($numero_registros!=0){
     foreach($adminArray as $elemento){
         if($elemento['userName']==$userName && $elemento['password']==$password){
            session_start(); // iniciamos sesion si el usuario existe
            $_SESSION["usuario"]=$_POST["userName"]; // se asigna  a la variable superGlobal sesion el usuario actual
            header("location:/Proyecto2Expertos/vistas/mantenimientoAdministrativo.php");
         }
     }
     
    }else{
         header("location:login.php"); //redirige a la pagina login.php
    }

        }catch(Exception $e){
        die ('Error: '. $e->getMessage());
       
        }
?>