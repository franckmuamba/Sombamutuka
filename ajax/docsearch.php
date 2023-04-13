<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';
extract($_POST);

//$q = $bd->prepare('select id, content, user_id, created_at, imagePost from microposts where (content like :query ) limit 3');

$q = $bd->prepare('select U.prenom, M.id, M.content, M.user_id, M.created_at, M.imagePost from microposts M, users U
                  where M.user_id=U.id and (content like :query )');


$q->execute([
    'query'=>$query.'%'
]);

$docs = $q->fetchAll(PDO::FETCH_OBJ);

if (count($docs)>0)
{

        foreach ($docs as $doc)
        {
            ?>
            <div class="display-box-docsearch">
                <a>
                    <strong><?= $doc->prenom ?></strong><br/><hr/>
                    <?= $doc->content?><br/>
                    <img src="membres/imagePosts/<?php echo ($doc->imagePost) ?>" class="doc-md"/>
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