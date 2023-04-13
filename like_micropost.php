<?php
session_start();

include('filtres/auth_filtre.php');
include ("config/database.php");
include("includes/fonctions.php");

if(!empty($_GET['id']))
{
    if(!user_has_liked_already_the_micropost($_GET['id']))
    {
        like_micropost($_GET['id']);
    }
}
// A verifier vraiment vraiment stp
redirect('profile.php?id='.get_session('user_id').'#micropost'.$_GET['id']);