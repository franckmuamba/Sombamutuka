<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';





//$q = $bd->prepare('select id, content, user_id, created_at, imagePost from microposts where (content like :query ) limit 3');

$q = $bd->prepare("SELECT * FROM users U, microposts M
                             WHERE M.marque = :marque and M.couleur= :couleur
                          
                             ORDER BY M.id DESC");

        $q->execute([
           'marque'=>$marque,
           'couleur'=>$couleur
       ]);
       
        $cars = $q-> fetchAll(PDO::FETCH_OBJ);



?>