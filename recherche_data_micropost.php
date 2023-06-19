<?php
session_start();
include ("filtres/auth_filtre.php");
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

$user_id = get_session('user_id');
//var_dump($id);
  //  die();
if(!empty($user_id))
{
    $user = get_session('user_id');
    

    
        $qr = $bd->prepare('select * from users where id=:user_id');
        $qr->execute([
            'user_id'=>$user_id
        ]);
        $infoUtils = $qr-> fetch(PDO::FETCH_OBJ);
        $_SESSION['avatar'] = $infoUtils->avatar;


$query = "SELECT U.id, U.prenom, U.email, U.avatar, U.telephone,
                             DATEDIFF( M.dateEnd, Now() ) AS nombreJour, M.id, M.user_id, M.marque, M.couleur, M.km, M.transmission, M.modele, M.description, M.prix, M.annee, M.categorie, M.like_count, M.created_at, M.imagePost
                             FROM users U, microposts M
                             WHERE M.user_id = U.id
                             AND M.user_id = :user_id
                            
                             ORDER BY M.id DESC";                        

$statement = $bd->prepare($query);


$output='';

if($statement->execute(['user_id'=>$user_id]))
{
    
        $result = $statement->fetchAll();
//var_dump($result);
//die();
        foreach($result as $row)
        {
           // var_dump($row);
           // die();
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
                            <a href="detailMicropost.php?id='.$row['id'].'  type="button"  class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 mx-3" target="_blank" >
                                Ouvrir
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                        
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="button" class="btn btn-primary btn-sm mt-2 w-100">
                                Jours <span class="badge rounded-pill bg-danger">'. $row['nombreJour'].'</span>
                            </button>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <?php if('.$row['user_id'].' =='. get_session('user_id').'): ?>
                                <a class="btn btn-danger btn-sm mt-2 w-100" onclick="return confirm(\'Voulez-vous vraiment supprimer cette publication ?\')" href="delete_micropost.php?id=<?= $micropost->id ?>" style="color:white;">Supprimer<i class=\'bx bx-trash\'></i></a></p>
                            <?php endif; ?>
                        </div>
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

//$output .= '</div>';

echo $output;
}
?>

