<?php

include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");





   
       // $qr = $bd->prepare('select * from users where id=:user_id');
       // $qr->execute([
       //     'user_id'=>$_GET['id']
       // ]);
     //   $infoUtils = $qr-> fetch(PDO::FETCH_OBJ);
       // $_SESSION['avatar'] = $infoUtils->avatar;

        $q = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar,
                             M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.localisation, M.like_count, M.created_at, M.imagePost
                             FROM users U, microposts M
                             WHERE M.user_id = U.id
                           
                            
                             ORDER BY M.id DESC");

        $q->execute([
           'user_id'=>'U.id'
       ]);
       
        $microposts = $q-> fetchAll(PDO::FETCH_OBJ);
        //echo count($microposts) ;
        //redirect('profile.php?id='.get_session('user_id'));



        

?>

<?php
require ('vues/articles.vues.php');
