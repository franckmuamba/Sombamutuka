<?php
session_start();
require ('filtres/visiteur_filtre.php');
require ('config/database.php');
require ('includes/fonctions.php');
require ('includes/constants.php');


sleep(1);

if(isset($_POST['login']))
{
    if(pas_vide(['identifiant','mdp']))
    {
        

        $error=[];

        extract($_POST);
        //CONNEXION USERS 
        $q = $bd ->prepare("select id, prenom from users
        where (prenom = :identifiant or email = :identifiant ) and mdp = :mdp and active = '1' ");

        $q-> execute([
            'identifiant' => $identifiant,
            'mdp' => $mdp
        ]);

        $userTrouve = $q ->rowCount();

        if($userTrouve)
        {
            $user = $q->fetch(PDO::FETCH_OBJ);

            $_SESSION['user_id'] = $user->id;
            $_SESSION['prenom'] = $user->prenom;
            $_SESSION['email'] = $user->email;
            $_SESSION['avatar'] = $user->avatar;

            if($_SESSION['user_id']=='294')
            {
                rediriger_vers_ou('admin.php?id='.$user->id);
            }
            else
            {
                rediriger_vers_ou('profile.php?id='.$user->id);
            }

            
        }
        else
        {
            set_flash('Nom d utilisateur ou mot de passe incorrect','danger');
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
require ('vues/connexion.vues.php');