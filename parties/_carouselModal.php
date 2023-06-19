<?php
//session_start();
 //include('includes/constants.php'); 
 //include('config/database.php'); 
 include('includes/fonctions.php'); 
 //include('parties/_header.php'); 

 $idi = $_POST['id'];

function make_slide_indicators($bd)
{
    global $idi;
    //echo $idi;
    //die();
   // echo $_GET['id'];
   
    $query2 = "SELECT I.imagePost, M.id, M.marque, M.modele
    FROM microposts M, images I
    WHERE I.micropost_id = M.id
    AND I.user_id = M.user_id
    AND
    M.id='".$idi."'
    "; 

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
    global $idi;
   // echo $idi;
    //$query2 = "SELECT * FROM images WHERE user_id='273'"; 
    $query2= "SELECT I.imagePost, M.id, M.marque, M.modele
    FROM microposts M, images I
    WHERE I.micropost_id = M.id
    AND I.user_id = M.user_id
    AND
    M.id='".$idi."'";


    $statement2 = $bd->prepare($query2);
    $statement2->execute();

    $output = '';
    $count = 0;
    //$result = make_query($connect);
    $result= $statement2->fetchAll();
    //var_dump($result);
    //die();
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
        <img src="membres/imagePosts/'.$row["imagePost"].'" class="d-block w-100" style="max-height:360px; max-width:640px; object-fit: cover;" alt="'.$row["marque"].'"  />
        <div class="carousel-caption d-none d-md-block">
             <h3>'.$row["modele"].'</h3>
             <a href="detailMicropost.php?id='.$row['id'].'  type="button" name="view" class="btn btn-success btn-sm view" target="_blank" >
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