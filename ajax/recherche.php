<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';
extract($_POST);
//var_dump($_POST);
//die();

$q = $bd->prepare("SELECT * FROM users U, microposts M
                             WHERE M.marque = :query
                          
                             ORDER BY M.id DESC");

        $q->execute([
           'query'=>$query2
       ]);
       
        $cars = $q-> fetchAll(PDO::FETCH_OBJ);

        var_dump($cars);
        die();

if (count($cars)>0)
{
    foreach ($cars as $cars)
    {
        ?>
        <div class="display-box-user">
            <a href="profile.php?id=<?= $cars->id ?>">
                <?php if ($cars->avatar):?>
                    <img src="membres/avatar/<?php echo ($cars->avatar) ?>"  class="avart-xs"  alt="no pic"/>
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