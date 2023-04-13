<?php
/**
 * Created by PhpStorm.
 * User: Tolérant H
 * Date: 01/02/2018
 * Time: 19:02
 */
session_start();
require ("filtres/visiteur_filtre.php");
include "includes/fonctions.php";
require ('config/database.php');

if(!empty($_GET['p']) && is_already_in_use('prenom', $_GET['p'], 'users') && !empty($_GET['token']))
{
    $pseudo = $_GET['p'];
    $token = $_GET['token'];

    $q= $bd -> prepare('select id, email, mdp from users where prenom= ?');
    $q-> execute([$prenom]);

    $data = $q-> fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($prenom.$data->email.$data->mdp);

    if($token == $token_verif)
    {
        $q= $bd -> prepare("update users set active= '1' where prenom=?");
        $q-> execute([$pseudo]);

        $q= $bd -> prepare("insert into friends_relationships(user_id1, user_id2, status) values(?,?,?)");
        $q-> execute([$data->id, $data->id, '2']);

        set_flash('Votre compte a été bel et bien activé !','info');
        redirect('connexion.php');

    }
    else
    {
        set_flash('Paramètres invalides', 'danger');
        redirect('index.php');
    }
}
else
{
    redirect('index.php');
}