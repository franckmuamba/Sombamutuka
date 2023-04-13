<?php $title = "Inscription"; ?>
<!-- /container -->

<?php include('parties/_header.php'); ?>



<br><br>
<?php
    include ('parties/_error.php')
?>
<?php
    include ('parties/_flash.php')
?>
<div class="container2" id="formulaire">
    <div class="title" style="color:#3C96F7; font-weight:bold;">Inscription</div>
        <form method="post">
            <div class="user-details">
                <div class="input-box form-group">
                    <span class="details">Prénom </span>
                    <input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom" required/>
                </div>
                <div class="input-box">
                    <span class="details">Nom </span>
                    <input type="text" name="nom" placeholder="Entrez votre nom" required/>
                </div>
                <div class="input-box">
                    <span class="details">Email </span>
                    <input type="email" name="email" placeholder="Entrez votre email" required/>
                </div>
                <div class="input-box">
                    <span class="details">Téléphone </span>
                    <input type="text" name="telephone" placeholder="Numéro de téléphone" required/>
                </div>
                <div class="input-box">
                    <span class="details">Mot de passe</span>
                    <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required/>
                </div>
                <div class="input-box">
                    <span class="details">Confirmer mot de passe</span>
                    <input type="password" name="mdp2" placeholder="Confirmez mot de passe" required/>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="sexe" value="Masculin" id="dot-1">
                <input type="radio" name="sexe" value="Feminin" id="dot-2">
                <span class="gender-title">Sexe</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Masculin</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Féminin</span>
                    </label>
                    
                </div>
            </div>
           
             <div class="button" id="showcase-btn">
                <input type="submit" name="inscrire"  value="S'inscrire">
             </div>
        </form>
</div>

<br><br>

    <?php include('parties/_footer.php'); ?>

    
    <script>
    window.sr = ScrollReveal();
            sr.reveal('.navbar', {
              duration :2000,
              origin : 'bottom'
            })
          
            sr.reveal('#connaitre', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('.index3', {
              duration :2000,
              origin : 'top',
              distance : '50px'
            });

            sr.reveal('#formulaire', {
              duration :2000,
              origin : 'top',
              viewFactor: 0.5,
              distance : '100px'
            });
            sr.reveal('#con-droite', {
              duration :2000,
              origin : 'right',
              distance : '300px'
            });

            sr.reveal('#fonction', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#cout', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#desc', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#black', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#showcase-btn', {
              duration :2000,
              delay :2000,
              origin : 'bottom',
            });

            sr.reveal('#testimonial div', {
              duration :2000,
              origin : 'bottom',
            });
    
            sr.reveal('.info-left', {
              duration :2000,
              origin : 'left',
              distance : '300px',
              viewFactor: 0.2
            });

            sr.reveal('.info-right', {
              duration :2000,
              origin : 'right',
              distance : '300px',
              viewFactor: 0.2
            });

            sr.reveal('.info-right-2', {
              duration :2000,
              origin : 'right',
              distance : '200px',
              viewFactor: 0.2
            });

             sr.reveal('.info-left-2', {
              duration :2000,
              origin : 'left',
              distance : '200px',
              viewFactor: 0.2
            });


            sr.reveal('#footer', {
              duration :2000,
              origin : 'bottom',
              distance : '100px',
              viewFactor: 0.2
            });
    
  </script>