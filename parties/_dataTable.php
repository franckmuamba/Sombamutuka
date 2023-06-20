
<div class="container" id="filtre" style="background-color: #E8F0FE; padding:6px;">
<table id="example" class="display" style="width:100%; font-size:12px;" >
        <thead style="color: white; background:#2d4879;">
            <tr>
                <th>Vendeur</th>
                <th>Publié le</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Couleur</th>
                <th>Kilométrage</th>
                <th>Type</th>
                <th>Marque</th>
                <th>Image</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
        <?php
              $q = $bd->prepare("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
              M.id, M.marque, M.couleur, M.km, M.transmission, M.prix, M.description, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
              FROM users U, microposts M
              WHERE M.user_id = U.id
              AND M.categorie = :cat
            
             
              ORDER BY M.id DESC");

                $q->execute([
               // 'user_id'=>'U.id'
                'cat'=>'VEHICULE'
                ]);
         

            $posts =  $q->fetchAll(PDO::FETCH_OBJ);



            //var_dump($posts);
           // die();

                //$query = "select * from microposts";
                 //$r = mysqli_query($bd, $query);
            if(count($posts)>0){

               foreach($posts as $post){
            ?>
            <tr id="ligne"  style="cursor:pointer" onclick="">
                <td><?= $post->prenom ?></td>
                <td><?= $post->created_at ?></td>
                <td><?= $post->telephone ?></td>
                <td><?= $post->adresse ?></td>
                <td><?= $post->couleur ?></td>
                <td><?= $post->km ?></td>
                <td><?= $post->transmission ?></td>
                <td><?= $post->marque ?></td>
                <td><img src="membres/imagePosts/<?= $post->imagePost ?>" class="media-body img-thumbnail" style="width:150px; height:100px;"></td>
                <td>
                <button type="button" name="view" class="btn btn-info view" id="<?= $post->id ?>">
                  Voir plus
                </button>
                </td>
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
        <tfoot>
            <tr>
                 <th>Vendeur</th>
                 <th>Publié le</th>
                 <th>Téléphone</th>
                 <th>Adresse</th>
                <th>Couleur</th>
                <th>Kilométrage</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Marque</th>
                <th>Image</th>
            </tr>
        </tfoot>
    </table>

</div>
<!-- Modal -->
<div id="post_modal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0B5ED7; color:beige;">
        <h1 class="modal-title fs-5" style="text-align:center;" id="staticBackdropLabel">Details de l'article </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="post_detail" class="modal-body">
        view
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<script>
    $(document).ready(function(){
        function fetch_postdata(id)
        {
            $.ajax({
                url: "fecth_details.php",
                method: "POST",
                data: {id:id},
                success:function(data)
                {
                    $('#post_modal').modal('show');
                    $('#post_detail').html(data);
                }
            })
        }

        $(document).on('click', '.view', function(){
            var id=$(this).attr("id");
            fetch_postdata(id);
        });
    });

</script>
