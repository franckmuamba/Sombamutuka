<?php
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

    if(isset($_POST["id"]))
    {
        $output= '';
        $id= $_POST["id"];
        $requete = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
        M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.modele,M.localisation, M.like_count, M.created_at, M.imagePost
        FROM users U, microposts M
        WHERE M.user_id = U.id
        AND
         M.id='".$_POST['id']."'"  ); 

        $requete->execute([
            'id'=>$id
            ]);
     

        $mics =  $requete->fetchAll(PDO::FETCH_OBJ);
          
        foreach($mics as $mic){
            $output .='
            <p class="card-text" style="color:darkgrey;">
       
            |   Marque : '.$mic->marque.'
            </p>
            <p class="card-text" style="color:darkgrey;">
            |    Modèle : '.$mic->modele.' 
            </p>
            <p class="card-text" style="color:darkgrey;">
            |    Kilometrage : '.$mic->km.' <br/>
            </p>
            <p class="card-text" style="color:darkgrey;">
            |    Couleur : '.$mic->couleur.' 
            </p>
            <p class="card-text" style="color:darkgrey;">
            |    Prix : '.$mic->prix.'$ 
            </p>
                <hr>
                <div class="card-body card bg-light" style="color:darkgrey;">
                <p class="card-text" style="color:darkgrey;">
                    | Vendeur nom : '.$mic->prenom.' <br/>
                </p>
                <p class="card-text" style="color:darkgrey;">
                    | Téléphone : '.$mic->telephone.' <br/>
                </p>
                <p class="card-text" style="color:darkgrey;">
                    | Localisation : '.$mic->localisation.' <br/>
                </p>
                </div>
                <hr>
            
                <p><label><img src="membres/imagePosts/'.$mic->imagePost.'" class="media-body img-thumbnail"/></label></p>
            ';
        }
        echo $output;

    }
 
?>