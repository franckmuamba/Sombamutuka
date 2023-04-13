<?php


include("includes/fonctions.php");
include ("config/database.php");
require ("includes/constants.php");
include('parties/_header.php'); 


//$sql = $bd->query("SELECT id FROM microposts WHERE like_count = '0' ");


/* gérer la pagination de nos différents utilisateurs*/
$sql = $bd->query("SELECT id FROM microposts WHERE like_count = '0' ");
$nbre_total_users = $sql->rowCount();
$nbre_user_par_page = 6;
$nbre_de_page_max_droite_et_gauche = 3;
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


$sql = $bd->query("SELECT id FROM microposts WHERE like_count = '0' ORDER BY id $limit");
$users = $sql->fetchAll();

$pagination = '<nav class="text-center">
<ul class="pagination">';
if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<li class="page-item"><a class="page-link" href="filtrearticles.php?page=' . $previous . '">Précedent</a></li>';
        for ($i = $page_num - $nbre_de_page_max_droite_et_gauche; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<li class="page-item"><a class="page-link" href="filtrearticles.php?page=' . $i . '">' . $i . '</a></li> &nbsp;';
            }
        }
    }
    $pagination .= '<li class="page-item active" aria-current="page" ><a class="page-link" href="#">' . $page_num . '</a></li>';
    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<li class="page-item"><a class="page-link" href="filtrearticles.php?page=' . $i . '">' . $i . '</a></li> ';
        if ($i >= $page_num + $nbre_de_page_max_droite_et_gauche) {
            break;
        }
    }

    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<li class="page-item"><a class="page-link" href="filtrearticles.php?page=' . $next . '">Suivant</a></li>';
    }
}

$pagination .= '</ul></nav>';

    
/* gérer la pagination de nos différents utilisateurs*/















require ('vues/filtrearticles.vues.php');



?>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> 
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  