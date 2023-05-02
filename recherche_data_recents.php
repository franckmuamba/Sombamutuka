<?php

require ('config/database.php');

//$query = "SELECT * FROM images ORDER BY image_id DESC LIMIT 10";

$query = ("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
    M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.localisation, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id LIMIT 6");

$statement = $bd->prepare($query);

$output = '<div class=row>';

if($statement->execute())
{
    
        $result = $statement->fetchAll();

        foreach($result as $row)
        {
           // var_dump($row);
           // die();
            $output .='
            <div class="col-md-4" style="margin-bottom:16px; ">
                <img src="membres/imagePosts/'.($row["imagePost"]).'"
                class="img-thumbnail" />
            </div></br></br>
            ';
        }
}

$output .= '</div>';

echo $output;

?>