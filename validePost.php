<?php
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

    if(isset($_POST["id"]))
    {
        $micropostID= $_POST["id"];

        $q = $bd->prepare("UPDATE microposts set valide = '1'
        where id= :id");
         $q->execute([
         'id' => $micropostID]);
         //rediriger_vers_ou('validationPub.php');

         header("refresh: 1; url = http://localhost/sombamutuka/validationPub.php");
    }
 
?>