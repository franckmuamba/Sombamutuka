<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';
extract($_POST);
//var_dump($_POST);
//die();


$q = $bd->prepare('select id, nom, email, prenom, avatar from users where (nom like :query or prenom like :query or email like :query) 
                            limit 5');
$q->execute([
    'query'=>$query.'%'
]);

$users = $q->fetchAll(PDO::FETCH_OBJ);

if (count($users)>0)
{
    foreach ($users as $user)
    {
        ?>
        <div class="display-box-user">
            <a href="profile.php?id=<?= $user->id ?>">
                <?php if ($user->avatar):?>
                    <img src="membres/avatar/<?php echo ($user->avatar) ?>"  class="avart-xs"  alt="no pic"/>
                <?php else :?>
                    <img src="assets/img/default-user.png"  class="avart-xs"  alt="no pic"/>
                <?php endif; ?>
                &nbsp;
                <?= $user->nom ?>
                </br><?= $user->email ?>
            </a>
        </div>
        <?php
    }
}
else
{
    echo '<div class="display-box-user"><p>Aucun utilisateur trouvé</p></div>';
}


?>