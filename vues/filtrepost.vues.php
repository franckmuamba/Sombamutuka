
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
        <div class="machin">
           
           
            
            
        </div>
          
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
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $q = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar,
              M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.annee, M.like_count, M.created_at, M.imagePost
              FROM users U, microposts M
              WHERE M.user_id = U.id
            
             
              ORDER BY M.id DESC");

                $q->execute([
                'user_id'=>'U.id'
                ]);
         

            $posts =  $q->fetchAll(PDO::FETCH_OBJ);



            //var_dump($posts);
           // die();

                //$query = "select * from microposts";
                 //$r = mysqli_query($bd, $query);
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
                <td><img src="membres/imagePosts/<?= $post->imagePost ?>" class="media-body img-thumbnail" style="width:150px;"></td>
            </tr>
            <?php
            } 
        }
        else
        {
            echo "Pas de données";
        }
            ?>
        </tbody>
    </table> 

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#fetchvaleur").on('click', function(){
            var marque = $("#fetchval").val();
            var couleur = $("#fetchcolor").val();
            //alert(value);

            $.ajax({
                url:"fetch.php",
                type: "POST",
                //data: 'request=' + value,
                data:{marque : marque,
                    couleur : couleur
                },
               
                beforeSend:function(){
                    $(".container").html("<span>Working....</span>");
                },
                success:function(data){
                    $(".container").html(data);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#fetchcolorr").on('change', function(){
            var value = $(this).val();
            //alert(value);

            $.ajax({
                url:"fetch.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend:function(){
                    $(".container").html("<span>Working....</span>");
                },
                success:function(data){
                    $(".container").html(data);
                }
            })
        });
    });
</script>

<?php include('parties/_footer.php'); ?>

  