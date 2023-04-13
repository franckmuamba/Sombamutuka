<?php
session_start();
//var_dump($_SESSION);
//die();
require ("filtres/visiteur_filtre.php");
require ('config/database.php');
require ('includes/fonctions.php');
require ('includes/constants.php');


if(isset($_POST['inscrire']))
{

    if(pas_vide(['nom', 'prenom', 'email', 'telephone','mdp', 'mdp2']))
    {

        $error=[];
        extract($_POST);

        if(mb_strlen($nom)<3)
        {
            $error[]="Nom trop court (Minimum 3 caractères) ";
        }
        if(mb_strlen($prenom)<3)
        {
            $error[]="Prénom trop court (Minimum 3 caractères) ";
        }
        if(!filter_var($email, FILTER_SANITIZE_EMAIL))
        {
            $error[]="L'adresse email est invalide";
        }
        if(mb_strlen($mdp)<6)
        {
            $error[]="Mot de passe trop court (Minimum 6 caractères) ";
        }
        else
        {
            if($mdp!=$mdp2)
            {
                $error[]="Mots de passe non identiques";
                save_input_data();
            }
        }

        if(is_already_in_use('prenom', $prenom, 'users'))
        {
            $error[]="Prenom déjà utilisé ";

        }
        if(is_already_in_use('email', $email, 'users'))
        {
            $error[]="Mail déjà utilisé ";

        }

        if(count($error)==0)
        {
            //----------------------------------------------
            // DEBUT ------ Envoyer email d'activation
            //----------------------------------------------
                    $to = $email;
                    //CTRL + K, C 
                    //CTRL + K, U 
                    $bright = WEBSITE_NAME." - ACTIVATION DE COMPTE";
                    //$mdp = sha1($mdp);
                    $token = sha1($prenom.$email.$mdp);

                    ob_start();
                    require ('templates/emails/activation.tmpl.php');

                    $content = ob_get_clean();

                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    mail($to, $bright, $content, $headers);

                    set_flash('Message envoyé avec succès','succes');

            //----------------------------------------------
            // FIN ------ Envoyer email d'activation
            //----------------------------------------------

           
            // Enregistrement des informations de l'utilisateurs dans le BDD avant la redirection
            //
            //
            
            $q= $bd->prepare('insert into users(nom,prenom,email,telephone,sexe,mdp)
                 
                 values(:nom,:prenom,:email,:telephone,:sexe, :mdp)');

            $q->execute([
                'nom'=> $nom,
                'prenom'=> $prenom,
                'email'=> $email,
                'telephone'=> $telephone,
                'sexe'=> $sexe,
                'mdp'=> $mdp
            ]);

            set_flash('Votre compte a été créé avec succès','success');
            //set_flash('Votre compte a été créé avec succès','danger');
           // redirect('index.php');

            // Demander à l'utilisateur de vérifier son compte(boite de reception)

        }
        else
        {
            save_input_data();
        }
    }
    else
    {
        $error[]= "Veuillez compléter tous les champs svp";
        save_input_data();
    }
}
else
{
    clear_input_data();
}

?>

<?php
require ('vues/inscription.vues.php');
