<?php
session_start();
//var_dump($_SESSION);
//die();
require ('filtres/auth_filtre.php');
require ('config/database.php');
require ('includes/fonctions.php');

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
    //redirect('modifier_user.php?id='.get_session('user_id'));
}


if (isset($_POST['publier']))
{
    //var_dump($_FILES);
    //die();
    if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name']))
    {

        //$taillemax = 2097152;
        $taillemax = 52428805;
        $extensionValides = array('png','jpg', 'jpeg', 'gif', 'webp');

        if ($_FILES['avatar']['size']<= $taillemax)
        {
            $extensionLoaded = strtolower(substr(strchr($_FILES['avatar']['name'], '.'), 1)) ;
            $nomImage = $_FILES['avatar']['name'];


            if (in_array($extensionLoaded, $extensionValides))
            {
                $chemin = "membres/imagePosts/".$nomImage;
                $categorievehicule ='VEHICULE';

                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if ($resultat)
                {
                    if(!empty($_POST['marquevehicule']) and ($_POST['modelevehicule'])  and ($_POST['couleurvehicule']) and ($_POST['km']) and ($_POST['transmission']) )
                    {
                        //var_dump($_POST);
                       // die();
                        extract($_POST);

                        $rq = $bd->prepare('INSERT INTO microposts(marque,modele,couleur,km,transmission,prix,annee,localisation,user_id,imagePost,categorie)
                         values(:marque,:modele,:couleur,:km,:transmission,:prix,:annee,:localisation,:user_id,:imagePost,:categorie)');
                        $rq->execute([
                            'marque'=>$marquevehicule,
                            'modele'=>$modelevehicule,
                            'couleur'=>$couleurvehicule,
                            'km'=>$km,
                            'transmission'=>$transmission,
                            'prix'=>$prix,
                            'annee'=>$anneefabrication,
                            'localisation'=>$localisation,
                            'user_id'=>get_session('user_id'),
                            'imagePost'=>$nomImage,
                            'categorie'=>$categorievehicule     
                            
                        ]);



                        set_flash('Votre statut a été mis à jour','info');
                    }
                    else
                    {
                        set_flash('Aucun contenu n a été fourni','warning');
                    }

                    //set_flash('Félicitations, votre profil a été mis à jour','succes');
                }
                else
                {
                    //echo $error[] = "Erreur lors de l'importation du fichier";
                    set_flash('Erreur lors de l\'importation du fichier','warning');
                }
            }
            else
            {
                //echo $error[] = "L'extension de votre photo est invalide";
                set_flash('L\'extension de votre photo est invalide','warning');
            }
        }
        else
        {
           set_flash('La taille du fichier ne doit pas dépasser 5 M','warning');
        }
    }
    else
    {
        set_flash('Veuillez ajouter une image svp !','warning');
    }


}

//ajouter nouvelle moto

if (isset($_POST['publiermoto']))
{
    //var_dump($_FILES);
    //die();
    if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name']))
    {

        //$taillemax = 2097152;
        $taillemax = 52428805;
        $extensionValides = array('png','jpg', 'jpeg', 'gif', 'webp');

        if ($_FILES['avatar']['size']<= $taillemax)
        {
            $extensionLoaded = strtolower(substr(strchr($_FILES['avatar']['name'], '.'), 1)) ;
            $nomImage = $_FILES['avatar']['name'];


            if (in_array($extensionLoaded, $extensionValides))
            {
                $chemin = "membres/imagePosts/".$nomImage;
                $categorievehicule ='MOTO';

                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if ($resultat)
                {
                    if(!empty($_POST['marquemoto']) and ($_POST['modelemoto'])  and ($_POST['couleurmoto']) and ($_POST['km']) and ($_POST['prix']) and ($_POST['anneefabrication']) )
                    {
                        //var_dump($_POST);
                       // die();
                        extract($_POST);

                        $rq = $bd->prepare('INSERT INTO microposts(marque,modele,couleur,km,prix,annee,localisation,user_id,imagePost,categorie)
                         values(:marque,:modele,:couleur,:km,:prix,:annee,:localisation,:user_id,:imagePost,:categorie)');
                        $rq->execute([
                            'marque'=>$marquemoto,
                            'modele'=>$modelemoto,
                            'couleur'=>$couleurmoto,
                            'km'=>$km,
                            'prix'=>$prix,
                            'annee'=>$anneefabrication,
                            'localisation'=>$localisation,
                            'user_id'=>get_session('user_id'),
                            'imagePost'=>$nomImage,
                            'categorie'=>$categorievehicule     
                            
                        ]);



                        set_flash('Votre statut a été mis à jour','info');
                    }
                    else
                    {
                        set_flash('Aucun contenu n a été fourni','warning');
                    }

                    //set_flash('Félicitations, votre profil a été mis à jour','succes');
                }
                else
                {
                    //echo $error[] = "Erreur lors de l'importation du fichier";
                    set_flash('Erreur lors de l\'importation du fichier','warning');
                }
            }
            else
            {
                //echo $error[] = "L'extension de votre photo est invalide";
                set_flash('L\'extension de votre photo est invalide','warning');
            }
        }
        else
        {
           set_flash('La taille du fichier ne doit pas dépasser 5 M','warning');
        }
    }
    else
    {
        set_flash('Veuillez ajouter une image svp !','warning');
    }


}

redirect('profile.php?id='.get_session('user_id'));