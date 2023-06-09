<?php
session_start();
//var_dump($user);
//die();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

// Nous récupérons toutes les notifications de l'utilisateur connecté
// (Aussi bien les notifications lues que les notifications non lues).

$q = $bd->prepare("SELECT users.prenom, users.avatar, users.email, notifications.subject_id,
                notifications.nom, notifications.user_id, notifications.seen, notifications.created_at
                FROM notifications
                LEFT JOIN users ON users.id = user_id
                WHERE subject_id = ?
                ORDER BY notifications.created_at DESC
                ");
$q->execute([get_session('user_id')]);

// Nous les stockons au niveau de la variable $notifications
$notifications = $q->fetchAll(PDO::FETCH_OBJ);

// Après avoir récupéré les notifications de l'utilisateur connecté,
// nous modifions la valeur de leur attribut 'seen' afin d'indiquer que
// l'utilisateur vient de lire ces notifications.
$q = $bd->prepare("UPDATE notifications SET seen = '1' WHERE subject_id = ?");
$q->execute([get_session('user_id')]);

// Nous affichons ensuite le contenu de notre fichier notifications.view.php
require("vues/notifications.vues.php");