<?php
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

    if(isset($_POST["id"]))
    {
        //$output= '';
        $micropostID= $_POST["id"];

        $q = $bd->prepare('UPDATE microposts set valide= '1'
        where id= :id');
         $q->execute([
         //'nomImage' => $image_name,
         'id' => $micropostID]);

    }
 
?>