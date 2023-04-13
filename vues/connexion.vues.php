<?php include('parties/_header.php'); ?>
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }


    

.form-signin {
  max-width: 330px;
  padding: 15px;
  box-shadow: 0 8px 24px rgba(0, 32, 63, .45),
                0 8px 8px rgba(0, 32, 63, .45);

}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>

<style>
    #loading
    {
        margin-top: 25%;
        text-align: center;
        background: url('Loading.gif') no-repeat center;
        height: 150px;
    }

</style>




<div class="container filter_data">
        <br /><br /><br />
        <?php
                        include ('parties/_error.php')
        ?>
<main class="form-signin w-100 m-auto text-center rounded-top" id="form">
  <form method="post">
    <img class="mb-4" src="img/FOND BLANC 1.jpg" alt="" width="82" height="67">
    <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

    <div class="form-floating">
      <input type="email" name="identifiant" class="form-control" id="floatingInput" placeholder="nom@example.com">
      <label for="floatingInput">Adresse email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="Mot de passe">
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <hr class="my-4">
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Se connecter</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
  </form>
</main>
















        
    </div>
</div>
<br /><br /><br />
<?php include ('parties/_footer.php'); ?>

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

            sr.reveal('#form', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.1
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

<script>
    $(document).ready(function(){

  

        function filter_data()
        {
            $('.filter_data').html('<div id="loading"></div>')
          
           

        }
      })

</script>