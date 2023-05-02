
    <article class="col-sm-4 col-lg-4 col-md-4 card bg-light media status-media" >
        <div class="pull-left">
            <img src="membres/avatar/<?= $micropost->avatar ? $micropost->avatar: get_avatar_url($micropost->email) ?>"
                alt="<?= $micropost->prenom ?>" class="media-object avart-xs">&nbsp;
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= echap($micropost->prenom); ?></h4>
            <i class="fa fa-clock-o"></i> <span class="timeago" title="<?= $micropost->created_at ?>"><?= $micropost->created_at ?></span>

            <hr>
              <div class="">
                    <div class="status-post">
                        <div class="form-group" style="margin-bottom: auto" >
                            <div class="media-body img-responsive img-thumbnail" style="background-color: white; border:none;">
                                <img src="membres/imagePosts/<?php echo ($micropost->imagePost) ?>"  class="img-responsive" style="width:100%; height:250px;"  alt="photo de pofile manquante" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light" id="apresimage2" >
                        <div class="card-body">
                        <p class="card-text text-center"><strong>
                            <a style="text-decoration:none;" href="#">
                            <?php echo ($micropost->marque) ?> |
                            <?php echo ($micropost->modele) ?> |
                            <?php echo ($micropost->couleur) ?></a></strong>
                            </p>
                            <h4 style="text-align:center;" class="text-danger"><?= nl2br(echap($micropost->prix)); ?>$</h4>
                            <p class="card-text">
                                <label>Marque : </label><?= nl2br(echap($micropost->marque)); ?><br>
                                <label>Couleur : </label> <?= nl2br(echap($micropost->couleur)); ?><br>
                                <i class="bx bx-run" style="color:gray"></i><label>Kilométrage : </label> <?= nl2br(echap($micropost->km)); ?><br>
                                <label>Type véhicule : </label> <?= nl2br(echap($micropost->transmission)); ?><br>
                                <label>Prix : </label> <?= nl2br(echap($micropost->prix)); ?><label> $ </label><br>
                                <label>Localisation : </label> <?= nl2br(echap($micropost->localisation)); ?><br>
                            </p>
                        </div>
                    </div>
           

        <div class="row"> 
        <div class="col-md-6">
            <button type="button" name="view" class="btn btn-primary btn-sm view mt-2" id=<?= nl2br(echap($micropost->id)); ?>>
                 Détails
            </button>
            </div>
            <div class="col-md-6">
                <a href="detail.php?id=<?= nl2br(echap($micropost->id)); ?>"  type="button"  class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 mx-3" target="_blank" >
                    Ouvrir
                </a>
        </div>


            <div class="col-md-4 col-sm-4">
                <?php if (user_has_liked_already_the_micropost($micropost->id)):?>
                    <a id="unlike<?=$micropost->id ?>" data-action="unlike" class="like btn btn-sm btn-primary mt-2 w-100" href="unlike_micropost.php?id=<?= $micropost->id ?>">Vendu</a>
                <?php else:?>
                    <a id="like<?=$micropost->id ?>" data-action="like" class="like btn-sm btn btn-primary mt-2 w-100" href="like_micropost.php?id=<?= $micropost->id ?>">Pas encore vendu</a>
                <?php endif; ?>
            </div>   
            <div class="col-md-4 col-sm-4 mx-auto">
                <button type="button" class="btn btn-warning btn-sm mt-2 w-100">
                    Jours <span class="badge rounded-pill bg-danger"><?= nl2br(echap($micropost->nombreJour)); ?></span>
                </button>
            </div> 
            <div class="col-md-4 col-sm-4 mx-auto">
                <?php if($micropost->user_id == get_session('user_id')): ?>
                    <a class="btn btn-danger btn-sm mt-2 w-100" onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')" href="delete_micropost.php?id=<?= $micropost->id ?>" style="color:white;">Supprimer<i class='bx bx-trash'></i></a></p>
                <?php endif; ?>
            </div> 
                   
        </div>
    </article>
    
<!-- Modal -->
<div id="post_modal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1763AF; color:beige;">
        <h1 class="modal-title fs-5" style="font-size:bold;" id="staticBackdropLabel">DETAILS ARTICLE </h1>
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