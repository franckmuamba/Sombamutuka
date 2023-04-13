<?php
session_start();
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");
// Pas la peine d'utiliser une requete préparée car aucune information ne pourra provenir de
// c'est entre nous, donc aucune injection SQL à éviter

/* gérer la pagination de nos différents utilisateurs*/
$sql = $bd->query("SELECT id FROM users WHERE active = '1' ");


$nbre_total_users = $sql->rowCount();
$nbre_user_par_page = 4;
$nbre_de_page_max_droite_et_gauche = 4;
$last_page = ceil($nbre_total_users / $nbre_user_par_page);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page_num = $_GET['page'];
} else {
    $page_num = 1;
}

if ($page_num < 1) {
    $page_num = 1;
} elseif ($page_num > $last_page) {
    $page_num = $last_page;
}

$limit = 'LIMIT ' . ($page_num - 1) * $nbre_user_par_page . ',' . $nbre_user_par_page;


$sql = $bd->query("SELECT id, prenom, avatar, email FROM users WHERE active = '1' ORDER BY prenom $limit");
$users = $sql->fetchAll();

$pagination = '<nav class="text-center">
<ul class="pagination">';
if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<li class="page-item"><a class="page-link" href="list_users.php?page=' . $previous . '">Précedent</a></li>';
        for ($i = $page_num - $nbre_de_page_max_droite_et_gauche; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<li class="page-item"><a class="page-link" href="list_users.php?page=' . $i . '">' . $i . '</a></li> &nbsp;';
            }
        }
    }

    $pagination .= '<li class="page-item active" aria-current="page" ><a class="page-link" href="#">' . $page_num . '</a></li>';
    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<li class="page-item"><a class="page-link" href="list_users.php?page=' . $i . '">' . $i . '</a></li> ';
        if ($i >= $page_num + $nbre_de_page_max_droite_et_gauche) {
            break;
        }
    }

    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<li class="page-item"><a class="page-link" href="list_users.php?page=' . $next . '">Suivant</a></li>';
    }
}

$pagination .= '</ul></nav>';

//$q= $bd->query("select id, prenom, email, avatar from users where active='1' order by prenom desc");
//$users = $q->fetchAll();


require ("vues/list_users.vues.php");