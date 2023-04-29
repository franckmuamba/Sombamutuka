<?php
$q = $bd->prepare("SELECT id FROM notifications
              WHERE subject_id = ? AND seen = '0'");

$q->execute([get_session('user_id')]);
$notifications_count = $q->rowCount();
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #1763AF;" id="navbar">
    <a class="navbar-brand" href="index.php"><img src="img/logo9.png" style="width:100%; height:60px; margin: -12px 25px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
         
        </ul>

        <ul class="navbar-nav mr-auto">                      
        <li class="nav-item">
                        <a class="nav-link <?= set_active('index') ?>" href="index.php ">Accueil</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('motos') ?>" href="motos.php ">Motos</a>
                    </li>
                    <li class="nav-item">
            
                        <a class="nav-link <?= set_active('vehicule') ?>" href="vehicule.php ">Véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('moteurs') ?>" href="moteur.php">Moteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('apropos') ?>" href="apropos.php ">A propos</a>
                    </li>

                <?php if (is_logged_in()):?>
                        <li class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item <?= set_active('profile') ?>"  href="profile.php?id=<?= get_session('user_id') ?>">Ajouter article</a>
                                <a class="dropdown-item <?= set_active('modifier_user') ?>" href="modifier_user.php" >Modifier profile</a>
                                <a class="dropdown-item <?= set_active('index') ?>" href="list_users.php" >Membres</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item <?= set_active('deconnexion') ?>" href="deconnexion.php" >Déconnexion</a>
                            </div>
                    </li>
                 <!-- MENU SIGN IN SIGN UP -->
                <?php elseif(!is_logged_in()): ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Signup/Login
                      </a>
                      <ul class="dropdown-menu">
                        
                        <li>
                            <a class="dropdown-item <?= set_active('connexion') ?>" href="connexion.php ">Connexion</a>
                        </li>
                        
                        <li>
                            <a class="dropdown-item <?= set_active('inscription') ?>" href="inscription.php ">Inscription</a>
                        </li>
                        
                      </ul>
                </li>
              
            <?php endif;?>
        </ul>

    </div>
</nav>
</br></br></br>
