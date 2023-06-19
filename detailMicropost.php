<?php
// include('parties/_carouselModal.php'); 
//include('includes/constants.php'); 
session_start();
 include('config/database.php'); 
 include('includes/fonctions.php'); 
 include('parties/_header.php'); 

 ?>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


 <!-- Fancybox CSS library -->
<link rel="stylesheet" href="fancybox/jquery.fancybox.css">

<!-- jQuery library 
<script src="js/jquery.min.js"></script>
-->
<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<style>
  .cat img {
 height: 100%;
 width: 100%;
 object-fit: cover;
}
.cat {
 height:400px;
}

.gallery {
  
  
    box-shadow: 0 8px 24px rgba(0, 32, 63, .45),
                0 8px 8px rgba(0, 32, 63, .45);
}

.row .gal {
  
    box-shadow: 0 8px 24px rgba(0, 32, 63, .45),
                0 8px 8px rgba(0, 32, 63, .45);
}


.miniature img {
 height: 100%;
 width: 100%;
 padding : 5px;
 filter: grayscale(100%);
 transition : 1s;
 object-fit: cover;
}

.miniature img:hover {
 filter: grayscale(0);
 transform:scale(1.1);
}
.miniature {
 height:200px;
 margin : 2px 0px;
}

</style>

<div class="container gallery">
    <?php
    if(isset($_GET["id"]))
    {
        //var_dump($_SESSION);
        //die();
        $id= $_GET["id"];

        $requeteImage1 = $bd->prepare("SELECT I.imagePost, M.id
        FROM microposts M, images I
        WHERE I.micropost_id = M.id
        AND I.user_id = M.user_id
        AND
         M.id='".$_GET['id']."' LIMIT 1");

        $requeteImage1->execute([
        'micropost_id'=>$id]);


    $res1 =  $requeteImage1->fetchAll(PDO::FETCH_OBJ);
    // LES DEUX PREMIERES IMAGES
       

    // LES AUTRES IMAGES MINIATURES
    $requeteImage2 = $bd->prepare("SELECT I.imagePost, M.id, I.image_id
    FROM microposts M, images I
    WHERE I.micropost_id = M.id
    AND I.user_id = M.user_id
    AND
    M.id='".$_GET['id']."'");

    $requeteImage2->execute([
        'micropost_id'=>$id]);

    $res2 =  $requeteImage2->fetchAll(PDO::FETCH_OBJ);
    // LES AUTRES IMAGES MINIATURES

    // DETAILS DE L'IMAGE

    $requete = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
    M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.modele,M.description, M.province, M.ville, M.reference, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id
    AND
    M.id='".$_GET['id']."'");

    $requete->execute([
        'id'=>$id
        ]);

     $mics =  $requete->fetchAll(PDO::FETCH_OBJ);

    // DETAILS DE L'IMAGE
    ?>
    <div class="row gal mt-5">
    <div class="col-sm-6 col-md-6">     
        <?php
        foreach($mics as $mic){
        ?>
    <div class="container p-5 shadow p-3 mb-5 bg-light rounded" style="background-color: #AAAAAA;">
                <strong><h5 class="text-center" style="text-decoration:none; background-color:rgb(100 116 139)!important;color:white" >DETAILS DE L'ARTICLE  <?= $mic->modele ?> </h5></strong>
                    <div class="card-body card bg-light" style="color:darkgrey; background-color:rgb(240 249 255)!important;">
                        <div class="row">

                       
                        <div class="col-md-6 col-sm-6">
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
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="card-text" style="color:darkgrey;">
                                <i class="bx bxs-happy" style="color:gray"></i>  Vendeur nom : <?= $mic->prenom ?> <br/>
                            </p>
                            <p class="card-text" style="color:darkgrey;">
                            <i class="bx bxs-phone" style="color:gray"></i>  Téléphone : <?= $mic->telephone ?> <br/>
                            </p>
                            <p class="card-text" style="color:darkgrey;">
                            <i class="bx bx-current-location" style="color:gray"></i>  Description : <?= $mic->description ?> <br/>
                            </p>
                            <p class="card-text" style="color:darkgrey;">
                            <i class="bx bx-current-location" style="color:gray"></i>  Province : <?= $mic->province ?> <br/>
                            </p>
                            <p class="card-text" style="color:darkgrey;">
                            <i class="bx bx-current-location" style="color:gray"></i>  Ville : <?= $mic->ville ?> <br/>
                            </p>
                            <p class="card-text" style="color:darkgrey;">
                            <i class="bx bx-current-location" style="color:gray"></i>  Reference : <?= $mic->reference ?> <br/>
                            </p>
                        </div>
                    </div>
                    </div>
                    
            <?php
            }
            ?>
        </div>
    </div>
    <?php 
        foreach($res1 as $re1)
        {
        ?>
        <div class="col-sm-6 col-md-6">
        </br></br>
        <div class="cat">
            <img src="membres/imagePosts/<?php echo $re1->imagePost ?>"  class="img-responsive" style="width:100%; height:100%; object-fit: cover;"/>
        </div>
        </div> 
       
        <?php
        }
        
        ?>
        <hr class="col-sm-11 col-md-11 mx-auto">
        <div class="row">
        <?php
        foreach($res2 as $re)
        {
        ?>
        <div class="col-sm-2 col-md-2">
            <div class="miniature">
                <a href="membres/imagePosts/<?php echo $re->imagePost ?>" data-fancybox="gallery"  data-caption="membres/imagePosts/<?php echo $re->image_id ?>" style="width:100%; height:100%; object-fit: cover;" >
                    <img src="membres/imagePosts/<?php echo $re->imagePost ?>"  class="img-responsive img-thumbnail"  alt="" style="width:100%; height:100%; object-fit: cover;" />
                </a> 
            </div>
        </div> 
    
    
        <?php
        }
        ?>
    </div>   
    </div>
    <hr>


    <?php
    }
    ?>
    
</div>

<script>
    $("[data-fancybox]").fancybox();
</script>


<footer id="footer" class="footer-1">
   
      <div class="footer-copyright">
        
          <div class="row">
            <div class="col-md-12 text-center">
            <p>Copyright Sombamutuka © 2023. All rights reserved.</p>
            </div>
          </div>
      
      </div>
</footer>



</body>
</html>