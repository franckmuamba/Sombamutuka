<?php

require ('config/database.php');

$r=$bd->query("SELECT MAX(id) FROM microposts");
$micopost_lastID = $r->fetchColumn();

//echo $micopost_lastID;
//var_dump($micopost_lastID);


//die();



if(count($_FILES["image"]["tmp_name"])>0){
    for($count = 0; $count< count($_FILES["image"]["tmp_name"]);$count++)
    {
       // $image_file= addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
        
       //$data = json_encode($micopost_lastID);
       //$data = array_map('intval', $micopost_lastID);
       //var_dump($micopost_lastID['id']);
       //die();
      


       $image_file= (($_FILES["image"]["tmp_name"][$count]));
        $image_name = (($_FILES["image"]["name"][$count]));

        $chemin = "membres/images/".$image_name;
       
       
        //var_dump($m_id);
        //die();



       move_uploaded_file($image_file, $chemin);


      // var_dump($image_file);
       // var_dump($image_name);
       // die();

        $query = "INSERT INTO images(imagePost,micropost_id) VALUES ('$image_name','$micopost_lastID')";
        $statement = $bd->prepare($query);
        //var_dump($statement);
        //die();
        $statement->execute();

       // $query= $bd->prepare('insert into images(imagePost)
        //VALUES (:nomImage)');
                 
       // values(:nom,:prenom,:email,:telephone,:sexe, :mdp)');

   //$q->execute([
    //   'nomImage'=> $image_file
  // ]);


    }
}

?>