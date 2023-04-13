
<?php $title = "vehicule"; ?>
<!-- /container -->

<?php include('parties/_header.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

	

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php

include ('parties/_flash.php')
?>



<section id="indexpub" >
<div class="container">
    <?php

    //include ('parties/_pubentete.php')

    ?>
</div>
</section>


<div class="row">
    <?php


    include ('parties/_error.php')

    ?>
    <div class="machin">
  
            
    </div>
          
</div>

<style>
    #post_detail
    {
       font-family: Arial, Helvetica, sans-serif;
       line-height: 5px;
       color: gray;
       font-size: 12px;
    }
</style>

<br><br><br><br><br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-4 col-sm-4">
                <p><img src="img/sell.avif" style="width: 200px; height:200px;"></p>
                <h3><a style="text-decoration:none;" class="fs-4" href="inscription.php">Vendre véhicule</a></h3>
        </div>
        <div class="col-md-4 col-sm-4">
            <p><img src="img/moto3.png" style="width: 200px; height:200px;"></p>
            <h3><a style="text-decoration:none;" class="fs-4" href="inscription.php">Vendre moto</a></h3>
        </div>
        <div class="col-md-4 col-sm-4">
            <p><img src="img/ap.png" style="width: 200px; height:200px;"></p>
            <h3><a style="text-decoration:none;" class="fs-4" href="inscription.php">Créer compte</a></h3>
        </div>
    </div>
</div>

<br><br><br>
<!-- Button trigger modal -->
<div class="container">
    
    <div class="card mt-3">
                    <div class="card-header text-center">
                        <h3>
                            <strong><a style="text-decoration: none;" href="#">TOUS LES ARTICLES VEHICULES</a></strong>
                        </h3>
                    </div>
    </div>

</div>
<br>
<!-- DEBUT TABLEAU ALL DATA WITH FILTER  -->
<?php

    include ('parties/_dataTable.php')

?>
<!-- FIN TABLEAU ALL DATA WITH FILTER  -->
<br><br><br>


<div class="bg-dark text-secondary px-4 py-5 text-center" style="background-color: #F1F1F3;" id="black">
    <div class="py-5">
      <h1 class="display-5 fw-bold text-white">Les plus récents </h1>
      <div class="row" >
        <div class="col-md-3 col-sm-3">
            <div class="info-right">
                        <div class="card" style="width: 100%; background-color: #F8F9FA; color: #706F6F;">
                            <img class="card-img-top" src="img/voiturehome2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">EXPOSTION</h5>
                                <p class="card-text">Nouveautés</p>
                                <a href="#" class="btn btn-primary">Lire plus..</a>
                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
        <div class="info-left">
                    <div class="card" style="width: 100%; background-color: #F8F9FA; color: #706F6F;">
                      <img class="card-img-top" src="img/voiturehome.jpg" alt="Card image cap">
                      <div class="card-body">
                                 <h5 class="card-title">EXPOSTION</h5>
                                <p class="card-text">Nouveautés</p>
                                <a href="#" class="btn btn-primary">Lire plus..</a>
                      </div>
                    </div>
                </div>
        </div>
       
        <div class="col-md-3 col-sm-3">
            <div class="info-left-2">
                        <div class="card" style="width: 100%; background-color: #F8F9FA; color: #706F6F;">
                        <img class="card-img-top" src="img/car.jpg" alt="Card image cap">
                        <div class="card-body">
                                <h5 class="card-title">EXPOSTION</h5>
                                <p class="card-text">Nouveautés</p>
                                <a href="#" class="btn btn-primary">Lire plus..</a>
                        </div>
                        </div>
                    </div>
            </div>
        <div class="col-md-3 col-sm-3">
            <div class="info-right-2">
                        <div class="card" style="width: 100%; background-color: #F8F9FA; color: #706F6F;">
                            <img class="card-img-top" src="img/faces.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">EXPOSTION</h5>
                                <p class="card-text">Nouveautés</p>
                                <a href="#" class="btn btn-primary">Lire plus..</a>
                            </div>
                        </div>
            </div>
        </div>

      </div>
    </div>
  </div>

<br><br>
<?php include ('parties/_animationsblock.php'); ?>
<?php include ('parties/_footerp.php'); ?>
<!-- Animations des blocks -->

<script>
    window.sr = ScrollReveal();
            sr.reveal('.navbar', {
              duration :2000,
              origin : 'bottom'
            })
          
            sr.reveal('#example', {
              duration :2000,
              origin : 'top',
              distance : '50px',
              viewFactor: 0.1
            });
           
            sr.reveal('.index', {
              duration :2000,
              origin : 'top',
              distance : '50px'
            });

            sr.reveal('.showcase-right', {
              duration :2000,
              origin : 'right',
              distance : '300px'
            });

            sr.reveal('.showcase-btn', {
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