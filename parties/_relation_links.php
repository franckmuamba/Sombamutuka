<?php if(relation_link_to_display($_GET['id']) == CANCEL_RELATION_LINK):?>
    <p>Demande d'amitiée déjà envoyée.<a href="delete_friend.php?id=<?= $_GET['id'] ?> " class="btn btn-primary pull-right">Annuler demande</a></p>

<?php elseif(relation_link_to_display($_GET['id']) == ACCEPT_REJECT_RELATION_LINK):?>
    <a href="accept_friend_request.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right">Accepter</a>
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-danger pull-right">Décliner</a>

<?php elseif(relation_link_to_display($_GET['id']) == DELETE_RELATION_LINK): ?>
    Vous etes deja ami(e).
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right">Retirer de ma liste d'amis</a>

<?php elseif(relation_link_to_display($_GET['id']) == ADD_RELATION_LINK): ?>
    <a href="add_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right"><i class="oi oi-plus"></i> Ajouter comme ami</a>

<?php endif; ?>