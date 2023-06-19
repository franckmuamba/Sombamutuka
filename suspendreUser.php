<?php
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

    if(isset($_POST["id"]))
    {
        $userID= $_POST["id"];

        $q = $bd->prepare("UPDATE users set quarantaine = '1'
        where id= :id");
         $q->execute([
         'id' => $userID]);
         //rediriger_vers_ou('validationPub.php');

        // header("url = http://localhost/sombamutuka/validationPub.php");
    }
 
?>