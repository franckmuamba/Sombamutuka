<?php
session_start();
//var_dump($user);
//die();
sleep(1);
include ("config/database.php");

if(isset($_POST['marque'])){

    $marque= $_POST['marque'];
    $couleur= $_POST['couleur'];
    //var_dump($couleur);
    //die();
  

    $q = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar,
    M.id, M.marque, M.couleur, M.km, M.type, M.prix, M.content, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id
    AND M.marque =:marque
    AND M.couleur =:couleur
   
   
    ORDER BY M.id DESC");

      $q->execute([
      //'user_id'=>'U.id',
      'marque'=>$marque,
      'couleur'=>$couleur
      ]);

      $datas = $q->fetchAll(PDO::FETCH_OBJ);

      $count = count($datas);
        //var_dump($posts);
        //die();


?>
<table class="table">
    <?php
        if($datas){

       
    ?>
        <thead>
            <tr>
                <th>Vendeur</th>
                <th>Couleur</th>
                <th>Kilométrage</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Marque</th>
                <th>Image</th>
            </tr>
    <?php
        }else{
            echo "Sorry! Pas de données disponibles pour cette recherche";
        }
    ?>
        </thead>
        <tbody>
            <?php
               foreach($datas as $data){
            ?>
            <tr>
                <td><?= $data->prenom ?></td>
                <td><?= $data->couleur ?></td>
                <td><?= $data->km ?></td>
                <td><?= $data->type ?></td>
                <td><?= $data->prix ?></td>
                <td><?= $data->marque ?></td>
                <td><img src="membres/imagePosts/<?= $data->imagePost ?>" class="media-body img-thumbnail" style="width:150px;"></td>
            </tr>
            <?php
            } die();
            
            ?>
        </tbody>
    </table> 
<?php 
}
?>

