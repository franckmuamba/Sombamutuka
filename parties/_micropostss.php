<article class="media status-media" id="micropost<?= $micropost->m_id ?>">
    <div class="pull-left">
        <img src="membres/avatar/<?= $micropost->avatar ? $micropost->avatar: get_avatar_url($micropost->email) ?>"
             alt="<?= $micropost->prenom ?>" class="media-object avart-xs">&nbsp;
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= echap($micropost->prenom); ?></h4>
        <i class="fa fa-clock-o"></i> <span class="timeago" title="<?= $micropost->created_at ?>"><?= $micropost->created_at ?></span>

       

        <hr>
            <div class="status-post">
                <div class="form-group" style="margin-bottom: auto" >
                    <div class="media-body img-responsive img-thumbnail" style="background-color: white; border:none;">
                        <img src="membres/imagePosts/<?php echo ($micropost->imagePost) ?>"  class="media-body img-thumbnail"   alt="photo de pofile manquante"/>
                    </div>
                </div>
            </div>
    
        <div class="card bg-light mb-3" id="apresimage2">
            <div class="card-body">
                <p class="card-text">
                    <label>Marque : </label> <?= nl2br(echap($micropost->marque)); ?><br>
                    <label>Couleur : </label> <?= nl2br(echap($micropost->couleur)); ?><br>
                    <label>Kilométrage : </label> <?= nl2br(echap($micropost->km)); ?><br>
                    <label>Type véhicule : </label> <?= nl2br(echap($micropost->type)); ?><br>
                    <label>Prix : </label> <?= nl2br(echap($micropost->prix)); ?><br>
                    <label>Description : </label> <?= nl2br(echap($micropost->content)); ?><br>
                </p>
            </div>
        </div>
        <p>
            <?php if (user_has_liked_already_the_micropost($micropost->m_id)):?>
                <a id="unlike<?=$micropost->m_id ?>" data-action="unlike" class="like" href="unlike_micropost.php?id=<?= $micropost->m_id ?>">Je n'aime plus</a>
            <?php else:?>
                <a id="like<?=$micropost->m_id ?>" data-action="like" class="like" href="like_micropost.php?id=<?= $micropost->m_id ?>">J'aime</a>
            <?php endif; ?>

            <?php if($micropost->user_id == get_session('user_id')): ?>
                <a onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')" href="delete_micropost.php?id=<?= $micropost->m_id ?>" style="color: red;"><i class=""></i>Supprimer</a></p>
            <?php endif; ?>
        </p>

        <div id="likers_<?=$micropost->m_id ?>">
            <!-- <a href="#">Franck</a>, <a href="#">Dav</a> et <a href="#">Eric</a> aiment cette publication -->
            <?= get_likers_text($micropost->m_id) ?>
        </div>
    </div>
</article>