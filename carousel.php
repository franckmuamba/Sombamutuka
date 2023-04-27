
<?php

include ("config/database.php");


function make_slide_indicators($bd)
{
    $query2 = "SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
    M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.localisation, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id LIMIT 6"; 

    $statement2 = $bd->prepare($query2);
    $statement2->execute();

        $output = ''; 
    $count = 0;
    //$result = make_query($connect);
    $result2 = $statement2->fetchAll(PDO::FETCH_OBJ);

    //while($row = mysqli_fetch_array($result))
    foreach($result2 as $res)
    {
        if($count == 0)
        {
            $output .= '
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$count.'" class="active" aria-current="true" aria-label="Slide '.$count.'" ></button>
            ';
        }
        else
        {
            $output .= '
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$count.'" aria-label="Slide '.$count.'"></button>
            ';
        }
        $count = $count + 1;
    }

    return $output;
}

function make_slides($bd)
{
    //$query2 = "SELECT * FROM images WHERE user_id='273'"; 
    $query2= "SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
    M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.localisation, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id LIMIT 6";

    $statement2 = $bd->prepare($query2);
    $statement2->execute();

    $output = '';
    $count = 0;
    //$result = make_query($connect);
    $result= $statement2->fetchAll();

    //while($row = mysqli_fetch_array($result))
    foreach($result as $row)
    {
        if($count == 0)
        {
            $output .= '<div class="carousel-item active" data-bs-interval="10000">';
        }
        else
        {
             $output .= '<div class="carousel-item">';
        }
        $output .= '
        <img src="membres/imagePosts/'.$row["imagePost"].'" class="d-block w-100" style="height:360px; width:640px;" alt="'.$row["marque"].'"  />
        <div class="carousel-caption d-none d-md-block">
             <h3>'.$row["modele"].'</h3>
             <a href="detail.php?id='.$row['id'].'  type="button" name="view" class="btn btn-success btn-sm view" >
                Ouvrir
            </a>
        </div>
        </div>
        ';
        $count = $count + 1;
    }
    return $output;
}

?>
<style>
.carousel-inner > .item > img {
   width:640px;
   height:360px;
 }
</style>

<!DOCTYPE html>
<html>
 <head>
  <title>How to Make Dynamic Bootstrap Carousel with PHP</title>
 
  <?php require ('includes/fonctions.php'); ?>
  <?php include('parties/_header.php'); ?>


 <body>
    <br />
    <div class="container" >
        <div class="row">
            <div class="col-sm-4 col-md-4">

            </div>
            <div class="col-sm-6 col-md-6">
                <h2 text-align="center">Carousel Dynamique</h2>
                <br />
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php echo make_slide_indicators($bd); ?>
                    </ol>

                    <div class="carousel-inner" >
                        <?php echo make_slides($bd); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
        
        <br /> <br /> <br />
    </div>
 </body>
</html>