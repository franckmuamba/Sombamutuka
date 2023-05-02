<?php
require ('config/database.php');
require ('includes/fonctions.php');
require ('includes/constants.php');

$query = "SELECT U.id, U.prenom, U.nom, U.email, U.avatar, U.telephone, U.ucreated_at,
                             M.dateEnd, M.id, M.marque, M.couleur, M.km, M.transmission, M.modele, M.localisation, M.prix, M.annee, M.categorie, M.like_count, M.created_at, M.imagePost
                             FROM users U, microposts M
                             WHERE M.user_id = U.id
                           
                            
                             ORDER BY M.id DESC";     
              
                             
$query2 = "SELECT * FROM users"; 
$statement = $bd->prepare($query2);


if($statement->execute()){
    $result = $statement->fetchAll();
    $nombreTotal = count($result);
}
    

$statement2 = $bd->prepare($query2);


if($statement2->execute()){
    $result2 = $statement2->fetchAll();
    $totalUsers= count($result2);
}
  
//USERS ACTIVES
$query3 = "SELECT * FROM users WHERE active='1'"; 
$statement3 = $bd->prepare($query3);
if($statement3->execute()){
    $result3 = $statement3->fetchAll();
    $usersActive = count($result3);
}
// USERS ACTIVES

//USERS INACTIVES
$query4 = "SELECT * FROM users WHERE active='0'"; 
$statement4 = $bd->prepare($query4);
if($statement4->execute()){
    $result4 = $statement4->fetchAll();
    $usersInActive = count($result4);
}
// USERS INACTIVES

// POSTS VALIDATED
$query5 = "SELECT * FROM microposts WHERE valide='1'"; 
$statement5 = $bd->prepare($query5);
if($statement5->execute()){
    $result5 = $statement5->fetchAll();
    $validPosts = count($result5);
}
// POSTS VALIDATED

// POSTS NOT YET VALIDATED
$query6 = "SELECT * FROM microposts WHERE valide='0'"; 
$statement6 = $bd->prepare($query6);
if($statement6->execute()){
    $result6 = $statement6->fetchAll();
    $notYetvalidPosts = count($result6);
}
// POSTS NOT YET VALIDATED


// POSTS ARCHIVED
$query7 = "SELECT * FROM microposts WHERE valide='1' AND DATEDIFF(dateEnd, Now())<0"; 
$statement7 = $bd->prepare($query7);
if($statement7->execute()){
    $result7 = $statement7->fetchAll();
    $postArchived = count($result7);
}
// POSTS ARCHIVED

?>

