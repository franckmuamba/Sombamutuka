<?php
require ('../config/database.php');
//require ('includes/fonctions.php');
//require ('includes/constants.php');

    if(isset($_GET['marquevehiculeID']) && !empty($_GET['marquevehiculeID']))
    {

        $id = $_GET['marquevehiculeID'];
        //var_dump($id);
        //die();

        $q= $bd->query("SELECT * FROM modelevehicule WHERE cond_nom='$id'");
        $modeles = $q->fetchAll(PDO::FETCH_OBJ);
       //var_dump($modeles);
       //die();

        if (count($modeles) !=0) 
        {
            foreach ($modeles as $modele)
            {
               
                echo '<option>'.$modele->nommod. '</option>';

            }
         }
         else
         {
            echo '<option> Pas de modèle disponible </option>';
         }
        }
    else
    {
        echo '<h1>Il y a erreur </h1>';
    }
?>