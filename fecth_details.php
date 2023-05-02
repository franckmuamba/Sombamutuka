<?php
include ("config/database.php");
include("includes/fonctions.php");
require ("includes/constants.php");

    if(isset($_POST["id"]))
    {
        $output= '';
        $id= $_POST["id"];

        $requeteImage = $bd->prepare("SELECT I.imagePost, M.id
        FROM microposts M, images I
        WHERE I.micropost_id = M.id
        AND I.user_id = M.user_id
        AND
         M.id='".$_POST['id']."'"  );

        $requeteImage->execute([
            'micropost_id'=>$id]);

        $res =  $requeteImage->fetchAll(PDO::FETCH_OBJ);
        //var_dump($res);
        //die();
     


        $requete = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
        M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.modele,M.localisation, M.like_count, M.created_at, M.imagePost
        FROM users U, microposts M
        WHERE M.user_id = U.id
        AND
         M.id='".$_POST['id']."'"  ); 

        $requete->execute([
            'id'=>$id
            ]);
     

        $mics =  $requete->fetchAll(PDO::FETCH_OBJ);
        //var_dump($mics);
        //die();
        foreach($mics as $mic){
           

           
            $output .='
                <div class="card-body card bg-light" style="color:darkgrey; background-color:rgb(240 249 255)!important;">
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-car"  style="color:gray;"></i>   Marque : '.$mic->marque.'
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-qr" style="color:gray"></i>    Modèle : '.$mic->modele.' 
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-calendar"  style="color:gray"></i>    Année de fabrication : '.$mic->annee.' 
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-run" style="color:gray"></i>    Kilometrage : '.$mic->km.' <br/>
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-palette" style="color:gray"></i>    Couleur : '.$mic->couleur.' 
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-purchase-tag-alt" style="color:gray" ></i>    Prix : '.$mic->prix.'$ 
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-happy" style="color:gray"></i> Vendeur nom : '.$mic->prenom.' <br/>
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-phone" style="color:gray"></i> Téléphone : '.$mic->telephone.' <br/>
                    </p>
                    <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-current-location" style="color:gray"></i>  Localisation : '.$mic->localisation.' <br/>
                    </p>
                </div>
                <hr>
                
                
            ';
        
        }
        foreach($res as $re)
        {
            $output.='<p><label><img src="membres/imagePosts/'.$re->imagePost.'" class="media-body img-thumbnail"/></label></p>';
        }
        echo $output;

    }
 
?>