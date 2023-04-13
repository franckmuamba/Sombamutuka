<?php
session_start();
//var_dump($user);
//die();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

if(isset($_GET['id']))
{
    $user = find_user_by_id($_GET['id']);

    if(!$user)
    {
        redirect('index.php');
    }
}
else
{
    $rq = $bd->prepare('select * from users where id=:id');
    $rq->execute([
        'id' => get_session('user_id')
    ]);
    // $user = $rq->fetch();
    $user = $rq->fetch(PDO::FETCH_OBJ);
    redirect('modifier_user.php?id='.get_session('user_id'));

}

if(isset($_POST['maj']))
{
    //var_dump($_POST);
    //die();
    $error= [];
    if(pas_vide(['nom']))
    {
        $error = [];
        extract($_POST);
        $q = $bd->prepare('update users set nom= :nom, prenom= :prenom, email= :email, telephone= :telephone, bio= :bio, sexe= :sexe, ville= :ville, adresse= :adresse
 where id= :id');
        $q->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'bio' => $bio,
            'sexe' => $sexe,
            'ville' => $ville,
            'adresse' => $adresse,
            'id' => get_session('user_id'),]);
        //set_flash('Félicitations, votre profil a été mis à jour','succes');
        //redirect('profile.php?id='.get_session('user_id'));
    }
    else
        save_input_data();
    $error[]= "Veuillez remplir tous les champs marqués d' (*) ";
    {
        clear_input_data();
    }
    if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name']))
    {

        $taillemax = 2097152;
        $extensionValides = array('png','jpg', 'jpeg', 'gif');

        if ($_FILES['avatar']['size']<= $taillemax)
        {
            $extensionLoaded = strtolower(substr(strchr($_FILES['avatar']['name'], '.'), 1)) ;

            if (in_array($extensionLoaded, $extensionValides))
            {
                $chemin = "membres/avatar/".get_session('user_id').".".$extensionLoaded;

                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if ($resultat)
                {
                    echo $resultat;
                    $reqavat = $bd->prepare('update users set avatar =:avatar where id=:id');
                    $reqavat->execute([
                        'avatar'=>get_session('user_id').".".$extensionLoaded,
                        'id'=>get_session('user_id')
                    ]);

                    set_flash('Félicitations, votre profil a été mis à jour','succes');
                }
                else
                {
                    $error[] = "Erreur lors de l'importation du fichier";
                }
            }
            else
            {
                $error[] = "L'extension de votre photo est invalide";
            }
        }
        else
        {
            $error[] = "La taille du fichier ne doit pas dépasser 2 M";
        }
    }
    set_flash('Félicitations, votre profil a été mis à jour','success');
    redirect('profile.php?id='.get_session('user_id'));
    redirect('profile.php?id='.get_session('user_id'));
}



require("vues/modifier_user.vues.php");
?>