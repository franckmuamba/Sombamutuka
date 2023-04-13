<?php

require ('config/database.php');

$query = "SELECT * FROM images ORDER BY image_id DESC";

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
            <div class="col-md-3" style="margin-bottom:16px; ">
                <img src="membres/images/'.($row["imagePost"]).'"
                class="img-thumbnail" />
            </div></br></br>
            ';
        }
}

$output .= '</div>';

echo $output;

?>