<?php
//$q = $bd->prepare("SELECT id FROM notifications
  //            WHERE subject_id = ? AND seen = '0'");

//$q->execute([get_session('user_id')]);
//$notifications_count = $q->rowCount();
?>

<style>
    .navbar-nav {
        font-weight: bold;
    }

    .dropdown-menu {
        background-color: #00a5bf;
        border: none;
    }

    .btn {
        border: none;
    }

</style>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #00a5bf;" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand"  href="index.php"><img src="img/logo9.png" style="width:100%; height:60px;"></a>
    <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon hamburger"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>  
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
            <li class="nav-item">
                        <a class="nav-link <?= set_active('index') ?>" href="index.php ">Accueil</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('motos') ?>" href="motos.php ">Motos</a>
                    </li>
                    <li class="nav-item">
            
                        <a class="nav-link <?= set_active('vehicule') ?>" href="vehicule.php">Véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('moteur') ?>" href="moteur.php">Moteurs</a>
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
  </div>
</nav>
</br></br></br>