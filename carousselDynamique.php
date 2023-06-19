<?php
// include('parties/_carouselModal.php'); 
//include('includes/constants.php'); 
session_start();
 include('config/database.php'); 
 include('includes/fonctions.php'); 
 include('parties/_header.php'); 

 ?>

 <!-- Fancybox CSS library -->
<link rel="stylesheet" href="fancybox/jquery.fancybox.css">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>
<style>
    .gallery img {
    width: 50%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
</style>

<div class="container">
    <?php
    // Include database configuration file
    //require 'dbConfig.php';
    
    // Retrieve images from the database
    //$query = $db->query("SELECT * FROM images WHERE micropost_id = 110 ORDER BY image_id DESC");
    $requeteImage1 = $bd->prepare("SELECT *
    FROM images 
    WHERE micropost_id = 110 LIMIT 2"  );

    $requeteImage1->execute([]);

    $res1 =  $requeteImage1->fetchAll(PDO::FETCH_OBJ);


    $requeteImage = $bd->prepare("SELECT *
    FROM images 
    WHERE micropost_id = 110"  );

    $requeteImage->execute([]);

    $res =  $requeteImage->fetchAll(PDO::FETCH_OBJ);
  
       
        foreach($res1 as $re1)
        {
        ?>
        <div class="col-sm-6 col-md-6">
        </br></br>
            <img src="membres/imagePosts/<?php echo $re1->imagePost ?>" style="height:50%; width:100%;" class="media-body img-thumbnail"/>
        
        </div> 
        
    <?php
    }
    
    ?>

   <?php
    foreach($res as $re)
    {
    ?>
  
    <div class="col-sm-2 col-md-2">
        <a href="membres/imagePosts/<?php echo $re->imagePost ?>" data-fancybox="gallery"  data-caption="membres/imagePosts/<?php echo $re->image_id ?>" >
            <img src="membres/imagePosts/<?php echo $re->imagePost ?>" class="media-body img-thumbnail"  alt="" />
        </a> 
       
    </div>       
    <?php
    }
    ?>
<!-- DETAILS DU POST --> 
<?php
$requete = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
         M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.modele,M.description, M.like_count, M.created_at, M.imagePost
         FROM users U, microposts M
         WHERE M.user_id = U.id
         AND
          M.id= 110"); 
 
         $requete->execute([
             ]);
      
 
         $mics =  $requete->fetchAll(PDO::FETCH_OBJ);

?>
<?php
foreach($mics as $mic){
    ?>
            <div class="container col-md-12 col-sm-12 p-5 shadow p-3 mb-5 bg-light rounded" style="background-color: #AAAAAA;">
             <strong><h1 class="text-center" style="text-decoration:none; background-color:rgb(100 116 139)!important;color:white" >DETAILS DE L'ARTICLE  <?= $mic->modele ?> </h1></strong>
                 <div class="card-body card bg-light" style="color:darkgrey; background-color:rgb(240 249 255)!important;">
                    <p class="card-text" style="color:darkgrey;">
         
                        <i class="bx bxs-car"  style="color:gray;"></i>   Marque : <?= $mic->marque ?>
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-qr" style="color:gray"></i>   Modèle : <?= $mic->modele ?>
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-calendar"  style="color:gray"></i>  Année de fabrication : <?= $mic->annee ?>
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-run" style="color:gray"></i>  Kilometrage : <?= $mic->km ?> km
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-palette" style="color:gray"></i>  Couleur : <?= $mic->couleur ?> 
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-purchase-tag-alt" style="color:gray" ></i>  Prix : <?= $mic->prix ?> $ 
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                        <i class="bx bxs-happy" style="color:gray"></i>  Vendeur nom : <?= $mic->prenom ?> <br/>
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                       <i class="bx bxs-phone" style="color:gray"></i>  Téléphone : <?= $mic->telephone ?> <br/>
                     </p>
                     <p class="card-text" style="color:darkgrey;">
                      <i class="bx bx-current-location" style="color:gray"></i>  Localisation : <?= $mic->description ?> <br/>
                     </p>
                 </div>
                 <hr>
         <?php
         }
         ?>


</div>

<script>
$("[data-fancybox]").fancybox();
</script>


