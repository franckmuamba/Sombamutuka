<?php
session_start();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id') )
{
    $id = $_GET['id'];
    $q = $bd ->prepare('delete from friends_relationships 
              WHERE (user_id1 = :user_id1 and user_id2= :user_id2)
                OR (user_id1 = :user_id2 and user_id2= :user_id1)');
    $q->execute([
        'user_id1' => get_session('user_id'),
        'user_id2' => $id
    ]);
    set_flash("Votre demande d'amité a été supprimée avec succes !");
    redirect('profile.php?id='.$id);
}
else
{
    redirect('profile.php?='.get_session('user_id'));
}