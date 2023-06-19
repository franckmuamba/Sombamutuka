<?php
session_start();

include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");


if(!empty($_GET['id']))
{
    $user = find_user_by_id($_GET['id']);
    //var_dump($user);
    //die();

    if(!$user)
    {
        redirect('index.php');
    }
    else
    {
        $qr = $bd->prepare('select * from users where id=:user_id');
        $qr->execute([
            'user_id'=>$_GET['id']
        ]);
        $infoUtils = $qr-> fetch(PDO::FETCH_OBJ);
        $_SESSION['avatar'] = $infoUtils->avatar;

        $q = $bd->prepare("SELECT U.id, DATEDIFF( M.dateEnd, Now() ) AS nombreJour, U.prenom, U.email, U.avatar,
                             DATEDIFF(M.dateEnd, M.created_at ) AS nombre, M.user_id, M.id, M.marque, M.modele, M.couleur, M.km, M.transmission, M.description, M.prix, M.annee, M.categorie, M.like_count, M.created_at, M.imagePost
                             FROM users U, microposts M
                             WHERE M.user_id = U.id
                             AND M.user_id = :user_id
                            

                            
                             ORDER BY M.id DESC");

        $q->execute([
            'user_id'=>$_GET['id']
        ]);
        $microposts = $q-> fetchAll(PDO::FETCH_OBJ);

        //redirect('profile.php?id='.get_session('user_id'));
    }
}


if(isset($_POST['maj']))
{
    $error= [];
    if(pas_vide(['nom']))
    {
        $error = [];
        extract($_POST);
       $q = $bd->prepare('update users set nom= :nom, prenom= :prenom, telephone= :telephone, bio= :bio, sexe= :sexe, city= :city, adresse= :adresse
 where id= :id');
         $q->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'bio' => $bio,
            'sexe' => $sexe,
            'city' => $city,
            'adresse' => $adresse,
            'id' => get_session('user_id')]);
        set_flash('Félicitations, votre profil a été mis à jour','success');
        redirect('profile.php?id='.get_session('user_id'));
        redirect('profile.php?id='.get_session('user_id'));
    }
    else
        save_input_data();
        $error[]= "Veuillez remplir tous les champs marqués d' (*) ";
    {
        clear_input_data();
    }
}


require("vues/profile.vues.php");
?>
