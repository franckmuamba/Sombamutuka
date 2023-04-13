<?php
session_start();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id'))
{
    $id = $_GET['id'];
    if (!cheks_if_a_friend_request_has_been_sent(get_session('user_id'),$_GET['id']))
    {
        $q = $bd ->prepare('insert into friends_relationships(user_id1, user_id2) 
        values(:user_id1, :user_id2)');
        $q->execute([
            'user_id1' => get_session('user_id'),
            'user_id2' => $id
        ]);

        // sauvegarde de la notification
        $q = $bd ->prepare('insert into notifications(subject_id, nom, user_id) 
        values(:subject_id, :nom, :user_id)');
        $q->execute([
            'subject_id' => $id,
            'nom' => 'friend_request_sent',
            'user_id'=> get_session('user_id'),]);

        set_flash("Votre demande d'amité a été envoyéé avec succes !",'success');
        redirect('profile.php?id='.$id);

    }
    else
    {
        set_flash("Cet utilisateur vous a déjà envoyé une demande d'amitié !", 'success');
        redirect('profile.php?id='.$id);
    }
}
else
{
    redirect('profile.php?='.get_session('user_id'));
}