
<?php $title = "Accueil"; ?>

<?php include('includes/constants.php'); ?>
<?php include('config/database.php'); ?>
<?php include('includes/fonctions.php'); ?>
<?php include('parties/_header.php'); ?>


<?php include('parties/_header.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

	

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php

include ('parties/_flash.php')
?>
<section id="indexpub" >
    <?php

    include ('parties/_pubentete.php')

    ?>
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

<br><br><br><br><br><br><br><br>
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

<h2 class="text-center display-4" style="font-family: Verdana, sans-serif;">Tous les articles véhicules </h2>

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
<?php include ('parties/_footerp.php'); ?>
<?php include ('parties/_animationsblock.php'); ?>

