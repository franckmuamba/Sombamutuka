
<?php

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
            $output .= '<div class="carousel-item active" data-bs-interval="5000">';
        }
        else
        {
             $output .= '<div class="carousel-item">';
        }
        $output .= '
        <img src="membres/imagePosts/'.$row["imagePost"].'" class="d-block w-100" style="height:360px; width:640px;" alt="'.$row["marque"].'"  />
        <div class="carousel-caption d-none d-md-block">
             <h3>'.$row["modele"].'</h3>
             <a href="detail.php?id='.$row['id'].'  type="button" name="view" class="btn btn-success btn-sm view" target="_blank" >
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