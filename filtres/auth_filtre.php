<?php
if(!isset($_SESSION['user_id']) && !isset($_SESSION['prenom']))
{
    $_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
    $_SESSION['notification']['message'] = "Vous devriez d abord etre connecté pour acceder à cette page";
    $_SESSION['notification']['type'] = "danger";
    //set_flash("Vous devriez d abord etre connecté pour acceder à cette page","danger");
    header('Location: connexion.php');
    exit();
}
?>