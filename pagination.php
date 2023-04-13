<?php
session_start();
//require("boostrap/locale.php"); //pour charger la langue
require("includes/functions.php");
require("includes/constants.php");
require("config/database.php");

/* gérer la pagination de nos différents utilisateurs*/
$sql = $bd->query("SELECT id FROM users WHERE active = '1' ");

$nbre_total_users = $sql->rowCount();
$nbre_user_par_page = 12;
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


$sql = $bd->query("SELECT id, prenom, email FROM users WHERE active = '1' ORDER BY prenom $limit");
$list_users = $sql->fetchAll(PDO::FETCH_OBJ);

$pagination = '';
if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<a href="list_users.php?page=' . $previous . '">Précedent</a> &nbsp; &nbsp; ';
        for ($i = $page_num - $nbre_de_page_max_droite_et_gauche; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<a href="list_users.php?page=' . $i . '">' . $i . '</a> &nbsp;';
            }
        }
    }

    $pagination .= '<span class="active">' . $page_num . '</span> &nbsp;';
    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<a href="list_users.php?page=' . $i . '">' . $i . '</a> ';
        if ($i >= $page_num + $nbre_de_page_max_droite_et_gauche) {
            break;
        }
    }

    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<a href="list_users.php?page=' . $next . '">Suivant</a>';
    }
}



require("views/list_users.view.php");

?>