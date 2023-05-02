<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';
extract($_POST);
//var_dump($_POST);
//die();


   // FROM users U, microposts M
    //WHERE M.user_id = U.id 
    //AND M.valide = '1' 
    //AND  DATEDIFF(M.dateEnd, Now()) >0

$q = $bd->prepare('SELECT U.id, M.user_id, U.prenom, U.email, U.avatar, U.telephone,
DATEDIFF( M.dateEnd, Now() ) AS nombreJour, M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.localisation, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
 FROM users U, microposts M
 WHERE M.user_id = U.id 
 AND M.valide = 1
 AND DATEDIFF(M.dateEnd, Now()) >0
 AND (M.marque like :query or M.couleur like :query or M.modele like :query) 
                            limit 5');
$q->execute([
    'query'=>$query.'%'
]);

//$users = $q->fetchAll(PDO::FETCH_OBJ);
$users = $q->fetchAll();
$output='';

if (count($users)>0)
{
    foreach ($users as $row)
    {
       // var_dump($users);
        //die();
        $output .='
            <div class="col-sm-4 col-lg-4 col-md-4 card bg-light">
                <div style="border:1px solid #ccc; border-radius:5px; padding:10px; margin-bottom:16px; height:550px; margin-top: 25px;">
                    <img src="membres/imagePosts/'.$row['imagePost'].'" alt="photo manquante" class="img-responsive" style="width:100%; height:250px;"/>

                   <p class="card-text" align="center"><strong>
                   <a style="text-decoration:none;" href="#">'
                    .$row['marque'].' | '
                    .$row['modele'].'  </a></strong></p>

                    <h4 style="text-align:center;" class="text-danger">'.$row['prix'].'$</h4>
                    <p class="card-text" style="color:darkgrey;">
                        
                    <i class="bx bx-run" style="color:gray"></i> Kilométrage: '.$row['km'].' km<br/>
                    <i class="bx bxs-calendar"  style="color:gray"></i>  Année de fabrication : '.$row['annee'].' <br/>
                    <i class="bx bxs-happy" style="color:gray"></i> Vendeur: '.$row['prenom'].' <br/>
                    <i class="bx bxs-phone" style="color:gray"></i>  Téléphone: '.$row['telephone'].' <br/>
                    <i class="bx bx-calendar" style="color:gray"></i> Publié le : '.$row['created_at'].' 
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" name="view" class="btn btn-primary btn-sm view" id="'. $row['id'].'">
                                Détails
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="detail.php?id='.$row['id'].'  type="button"  class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 mx-3" target="_blank" >
                                Ouvrir
                            </a>
                        </div>

                    </div>               
                </div>
                </br> 
                
            </div>

<!-- Modal -->
<div id="post_modal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1763AF; color:beige;">
        <h1 class="modal-title fs-5" style="font-size:bold;" id="staticBackdropLabel">DETAILS ARTICLE </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="post_detail" class="modal-body">
        view
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
            ';
    }
}
else
{
    echo '<div class="display-box-user"><p>Aucun utilisateur trouvé</p></div>';
}

echo $output;
?>