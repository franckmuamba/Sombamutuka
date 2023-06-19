<style>
         .cat img {
                height: 100%;
                width: 100%;
                object-fit: cover;
               }
               .cat {
                height:100px;
                width:120px;
                background-color:white;
               }
</style>

<div class="container" id="filtre" style="background-color: #E8F0FE; padding:6px;">

<table id="example" class="display" style="width:100%; font-size:12px;">
        <thead style="color: white; background:#2d4879;">
            <tr>
                <th>ID</th>    
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date d'inscription</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Etat</th>
                <th>Quarantaine</th>
                <th>Valider</th>
                <th>Suspend</th>
            </tr>
        </thead>
        <tbody>
        <?php
              $q = $bd->prepare("SELECT *
              FROM users 
             
              ORDER BY id DESC");

                $q->execute([
               // 'user_id'=>'U.id'
                //'cat'=>'VEHICULE'
                ]);
         

            $users =  $q->fetchAll(PDO::FETCH_OBJ);

       

            //var_dump($posts);
           // die();

                //$query = "select * from microposts";
                 //$r = mysqli_query($bd, $query);
            if(count($users)>0){

               foreach($users as $user){
            ?>
            <tr id="ligne"  style="cursor:pointer" onclick="">
                <td><?= $user->id ?></td>
                <td><?= $user->prenom ?></td>
                <td><?= $user->nom ?></td>
                <td><?= $user->ucreated_at ?></td>
                <td><?= $user->telephone ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->active ?></td>
                <td><?= $user->quarantaine ?></td>
                <td>
                <button type="button" name="valide" class="btn btn-primary btn-sm valide" id="<?= $user->id ?>">
                  Activer
                </button>
                </td>
                <td>
                <button type="button" name="valide" class="btn btn-danger btn-sm valide" id="<?= $user->id ?>">
                  Quarantaine
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
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date d'inscription</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Etat</th>
                <th>Quarantaine</th>
                <th>Valider</th>
                <th>Suspend</th>
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

<script>
    $(document).ready(function(){
        function fetch_postdatavalide(id)
        {
            $.ajax({
                url: "activerUser.php",
                method: "POST",
                data: {id:id},
                success:function(data)
                {
                    
                   // $('#post_modal').modal('show');
                  //  $('#post_detail').html(data);
                }
            })
        }

        $(document).on('click', '.valide', function(){
            var id=$(this).attr("id");
            fetch_postdatavalide(id);
        });
    });

</script>
