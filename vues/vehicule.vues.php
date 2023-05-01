
<?php $title = "vehicule"; ?>
<!-- /container -->
<?php include('parties/_header.php'); ?>

<!-- <style>
  .index 
   {
    color: rgb(0, 0, 0);
    width: 100%;
    height: 700px;
    margin-top:-68px;
    position: relative;
    text-align: center;
   }

   .index img {
    width: 100%;
    height: 100%;
    object-fit: cover;
   }
   
   .flou {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background-color: #486c7594;
    position: absolute;
    text-align: center;
    }
</style> -->


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php include ('parties/_flash.php'); ?>

<style>
    #post_detail
    {
       font-family: Arial, Helvetica, sans-serif;
       line-height: 5px;
       color: gray;
       font-size: 12px;
    }

   .row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    margin-top: 20px;
   }

   .row h2 {
    color: gray;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
   }

   .row .card {
    width: 300px;
    height: auto;
    align-items: center;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.4) 0 2px 4px, rgba(0, 0, 0, 0.3) 0 7px 13px -3px, rgba(0, 0, 0, 0.2) 0 -3px 0 inset;
   }

   .row .card h3 {
    color: gray;
    font-size: 20px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 20px;
   }

   .row .card p {
    color: gray;
    font-size: 14px;
    padding: 14px;
   }

   .card-header {
    background-color: #F1F1F3;
   }

   .card-header  h3{
    color: gray;
    font-size: 24px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 20px;
    padding: 14px;
   }

   .index 
   {
    color: rgb(0, 0, 0);
    width: 100%;
    height: 700px;
    margin-top:-68px;
    position: relative;
    text-align: center;
   }

   .index img {
    width: 100%;
    height: 100%;
    object-fit: cover;
   }
   
   /* .flou {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background-color: #486c7594;
    position: absolute;
    text-align: center;
    } */
</style>


<section class="index" >
  <div class=" flou"></div>
  <p class="p">ACHÈTEZ VOTRE VOITURE MAINTENANT AVEC
      <span class="span">SOMBAMUTUKA <br>
          <span>Profitez de nos services sûrs et exclusifs</span>
      </span>
  </p>
  <img src="img/car5.jpeg" alt="time home image">
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


<br><br><br><br><br>
<div class="container text-center">
    <div class="row">
        <h2>Nos services</h2>
        <div class="col-md-4 col-sm-4 card">
                <img src="img/3.jpeg" style="width: 200px; height:200px;">
                <h3>Vente véhicules</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum non molestiae incidunt voluptas dicta ullam repellat veritatis ab, beatae esse harum eveniet.</p>
        </div>
        <div class="col-md-4 col-sm-4 card">
            <img src="img/5.jpeg" style="width: 200px; height:200px;">
            <h3>Vente motos</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum non molestiae incidunt voluptas dicta ullam repellat veritatis ab, beatae esse harum eveniet.</p>
        </div>
        <div class="col-md-4 col-sm-4 card">
              <img src="img/6.jpeg" style="width: 200px; height:200px;">
              <h3>Vente accessoirs </h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum non molestiae incidunt voluptas dicta ullam repellat veritatis ab, beatae esse harum eveniet.</p>
        </div>
    </div>
</div>

<br><br><br>
<!-- Button trigger modal -->
<div class="container">
  <div class="card-header text-center">
      <h3>TOUS LES ARTICLES VEHICULES</h3>
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
