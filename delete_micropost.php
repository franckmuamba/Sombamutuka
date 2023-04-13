<?php
session_start();

include('filtres/auth_filtre.php');
include ("config/database.php");
include("includes/fonctions.php");

if(!empty($_GET['id']))
{
    $q = $bd->prepare('SELECT user_id FROM microposts WHERE id = :id');
    $q->execute(['id' => $_GET['id']]);

    $data = $q->fetch(PDO::FETCH_OBJ);
    $user_id = $data->user_id;

    if($user_id == get_session('user_id'))
    {
        $q = $bd->prepare('DELETE FROM micropost_like WHERE micropost_id = :id');
        $q->execute(['id' => $_GET['id']]);

        $q = $bd->prepare('DELETE FROM microposts WHERE id = :id');
        $q->execute(['id' => $_GET['id']]);
    }

    set_flash("Votre publication a été supprimée avec succès!",'info');
}

redirect('profile.php?id='.get_session('user_id'));