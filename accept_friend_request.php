<?php
session_start();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id') )
{
    $id = $_GET['id'];
    $q = $bd ->prepare("UPDATE friends_relationships 
                SET status = '1'
                WHERE (user_id1 = :user_id1 and user_id2= :user_id2)
                OR (user_id1 = :user_id2 and user_id2= :user_id1)");
    $q->execute([
        'user_id1' => get_session('user_id'),
        'user_id2' => $id
    ]);

    // sauvegarde de la notification
    $q = $bd ->prepare('insert into notifications(subject_id, nom, user_id) 
        values(:subject_id, :nom, :user_id)');
    $q->execute([
        'subject_id' => $id,
        'nom' => 'friend_request_accepted',
        'user_id'=> get_session('user_id'),]);

    set_flash('Vous etes désormais ami avec cet utilisateur !','info');
    redirect('profile.php?id='.$id);
}
else
{
    redirect('profile.php?='.get_session('user_id'));
}