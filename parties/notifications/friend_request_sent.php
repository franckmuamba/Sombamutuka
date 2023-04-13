<a href="profile.php?id=<?= $notification->user_id ?>">
    <img src="membres/avatar/<?php echo ($notification->avatar) ?>" alt="Image de profil de <?= echap($notification->prenom) ?>" class="avart-xs">
    <?= echap($notification->prenom) ?>
</a> vous a envoyé une demande d'amitié <span class="timeago" title="<?= $notification->created_at ?>">
    <?= $notification->created_at ?></span>.
<a class="btn btn-primary" href="accept_friend_request.php?id=<?= $notification->user_id ?>">Accepter</a>
<a class="btn btn-danger" href="delete_friend.php?id=<?= $notification->user_id ?>">Decliner</a>