
<?php $title = "Rechcerche"; ?>
<!-- /container -->

<?php include('parties/_header.php'); ?>


<?php

    include ('parties/_flash.php')
?>


<section id="indexpub" >
<?php

    include ('parties/_pubentete.php')

?>
</section>


<div class="row">
<?php


include ('parties/_error.php')
?>

          
</div>

<br><br><br><br><br><br><br><br>

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>Vendeur</th>
                <th>Couleur</th>
                <th>Kilométrage</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Marque</th>
                <th>Année de fabrication</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
    <?php

    if(!isset($_POST['submit']))
    {
                    $q = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar,
                    M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.like_count, M.created_at, M.imagePost
                    FROM users U, microposts M
                    WHERE M.user_id = U.id
                    ORDER BY M.id DESC");

                        $q->execute([
                       
                        ]);
                    $posts =  $q->fetchAll(PDO::FETCH_OBJ);

                    if(count($posts)>0){

                    foreach($posts as $post){
                    ?>
                    <tr>
                        <td><?= $post->prenom ?></td>
                        <td><?= $post->couleur ?></td>
                        <td><?= $post->km ?></td>
                        <td><?= $post->transmission ?></td>
                        <td><?= $post->prix ?></td>
                        <td><?= $post->marque ?></td>
                        <td><?= $post->annee ?></td>
                        <td><img src="membres/imagePosts/<?= $post->imagePost ?>" class="media-body img-thumbnail" style="width:150px;"></td>
                    </tr>
                    <?php
                    } 
                }
                else
                {
                    echo "Pas de données";
                }

         }    
         else if(isset($_POST['submit']) )
         {
          
            $requete = ("SELECT U.id, user_id, U.prenom, U.email, U.avatar,
            M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.like_count, M.created_at, M.imagePost
            FROM users U, microposts M
            WHERE M.user_id = U.id
            
            ");
            
            if( isset($_POST['fetchval']))
            {
                //$marque_filter = implode("','", $_POST["fetchval"]);
                $marque = $_POST['fetchval'];
                $requete .="
                    AND M.marque IN('".$marque."')
                ";
            }
            if( isset($_POST['fetchcolor']))
            {
                $couleur = $_POST['fetchcolor'];
                $requete .="
                    AND M.couleur IN('".$couleur."')
                ";
            }
            if( isset($_POST['annee']))
            {
                $annee = $_POST['annee'];
                $requete .="
                    AND M.annee IN('".$annee."')
                ";
            }

            $q = $bd->prepare( $requete);

            $q->execute();
            $posts =  $q->fetchAll(PDO::FETCH_OBJ);

                    if(count($posts)>0){

                    foreach($posts as $post){
                    ?>
                    <tr>
                        <td><?= $post->prenom ?></td>
                        <td><?= $post->couleur ?></td>
                        <td><?= $post->km ?></td>
                        <td><?= $post->transmission ?></td>
                        <td><?= $post->prix ?></td>
                        <td><?= $post->marque ?></td>
                        <td><?= $post->annee ?></td>
                        <td><img src="membres/imagePosts/<?= $post->imagePost ?>" class="media-body img-thumbnail" style="width:150px;"></td>
                    </tr>
                    <?php
                    } 
                }
                else
                {
                    echo "Aucune donnée trouvée";
                }

         }
         ?>
        </tbody>
    </table> 
</div>



<?php include('parties/_footer.php'); ?>

  