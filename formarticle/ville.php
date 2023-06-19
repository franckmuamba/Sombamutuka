<?php
require ('../config/database.php');
//require ('includes/fonctions.php');
//require ('includes/constants.php');

    if(isset($_GET['provinceID']) && !empty($_GET['provinceID']))
    {

        $id = $_GET['provinceID'];
        //var_dump($id);
        //die();

        $q= $bd->query("SELECT * FROM ville WHERE cond_nomp='$id'");
        $villes = $q->fetchAll(PDO::FETCH_OBJ);
       //var_dump($modeles);
       //die();

        if (count($villes) !=0) 
        {
            foreach ($villes as $ville)
            {
               
                echo '<option>'.$ville->nom_ville. '</option>';

            }
         }
         else
         {
            echo '<option> Pas de ville disponible </option>';
         }
        }
    else
    {
        echo '<h1>Il y a erreur </h1>';
    }
?>