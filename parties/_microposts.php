
<style>

    body {
        background-color: #f8f9fa;
        overflow-x: hidden;
    }

    .media {
        display: flex;
        margin: 10px auto;
        flex-direction: column;
        width: 90%;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }

    .pull-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        margin: 20px 0 0 0;
        padding:8px;
        background-color: #22a5cd1a;
    }

    .pull-left .name_image {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .pull-left .name_image .div_1 {
        width: 80px;
        height: 90px;
        border-radius: 50%;
    }
    .pull-left .name_image .div_1 img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .pull-left .name_image .div_2 {
        /* border: 1px solid red; */

    }

    .pull-left .name_image .div_2 h4 {
        /* border: 1px solid red; */
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 0px;
    }

    .pull-left .name_image .div_2 div {
        /* border: 1px solid red; */
        font-size: 14px;
        color: #999;
    }
    
    .index 
   {
    color: rgb(0, 0, 0);
    width: 100%;
    height: 250px;
    margin-top: 10px;
    position: relative;
    text-align: center;
   }

   .index img {
    width: 100%;
    height: 100%;
    object-fit: cover;
   }

   
   .flou {
    width: 100%;
    height: 100%;
    background-color: #486c7594;
    position: absolute;
    text-align: center;
    }

    .p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    font-size: 40px;
    font-weight: bold;
    padding: 10px;
    color: white;
    line-height: 5rem;
    }

    .p .span {
        color: #f5deb3c8;
    }

    @media only screen and (min-width: 920px) {
        .media {
            display: flex; */
            flex-wrap: wrap;
            width: 350px;
        }   
    }
</style>
<!-- <section class="main_s"> -->
    <article class="col-sm-4 col-lg-4 col-md-4  bg-light media" >
        <div class="pull-left">
            <div class="name_image">
                <div class="div_1">
                    <img src="membres/avatar/<?= $micropost->avatar ? $micropost->avatar: get_avatar_url($micropost->email) ?>"
                    alt="<?= $micropost->prenom ?>" class="media-object avart-xs">&nbsp;
                </div>
                <div class="div_2">
                    <h4 class="media-heading"><?= echap($micropost->prenom); ?></h4>
                    <div>
                        <i class="fa fa-clock-o"></i>
                        <span class="timeago" title="<?= $micropost->created_at ?>"><?= $micropost->created_at ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="media-body">
            <div class=" index">
                <div class=" flou"></div>
                <p class="p"> <?php echo ($micropost->marque) ?>
                    <span class="span"><?php echo ($micropost->modele) ?></span>
                </p>
                <img src="membres/imagePosts/<?php echo ($micropost->imagePost) ?>"  alt="photo de pofile manquante" />
            </div>
        <!-- </div> -->
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
<!-- </section> -->
    
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