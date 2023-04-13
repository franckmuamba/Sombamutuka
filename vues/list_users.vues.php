<?php $title = "Liste des utilisateurs"; ?>
<?php include('parties/_header.php'); ?>
</br>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Liste des utilisateurs</h3>
        </div>
    </div>
</br></br>
            <?php foreach ($users as $user): ?>
                
                            <div class="col-md-3">
                                <a href="profile.php?id=<?= $user['id'] ?>">
                                    <?php if ($user['avatar']>0):?>
                                        <img src="membres/avatar/<?php echo ($user['avatar']) ?>"  class="avart-xs" style="width:90px; height:90px" alt="photo manquante " />
                                    <?php else :?>
                                        <img src="assets/img/default-user.png"  class="avart-xs" alt="No picturE" style="width:90px; height:90px"/>
                                    <?php endif; ?>
                                </a>
                                    <h4 class="mt-0">
                                        <a href="profile.php?id=<?= $user['id'] ?>">
                                            <?= ($user['prenom']) ?>
                                        </a>
                                    </h4>
                            </div>
                
            <?php endforeach ?>
            </br> </br> </br></br> </br> </br>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <?= $pagination ?>
                </div>
                <div class="col-md-4">
                    
                </div>
                


            </div>
  
</div>
   
  