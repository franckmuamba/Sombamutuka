<?php
if(isset($_SESSION['user_id']) && isset($_SESSION['prenom']))
{
    header('Location: index.php');
    exit();
}
?>