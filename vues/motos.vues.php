<?php $title = "Motos"; ?>
<!-- /container -->

<?php include('parties/_header.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php

include ('parties/_flash.php')
?>
<section class="index">
    <div class=" flou"></div>
    <p class="p">LA COURSE</p>
    <p class="span">ᄂЦXΣ</p>
    <img src="img/a.webp" alt=" moto image">
    <!-- <div class="container">
        <?php
        //include ('parties/_pubentetemotos.php')
        ?>
    </div> -->
</section>
<div class="row">
    <?php
    include ('parties/_error.php')
    ?>
    <div class="machin"></div>
</div>

<style>
    #post_detail
    {
       font-family: Arial, Helvetica, sans-serif;
       line-height: 5px;
       color: gray;
       font-size: 12px;
    }

    .lax {
        background-image: url("img/lax.jpeg");
        min-height: 300px; 
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    

    .index 
   {
    color: rgb(0, 0, 0);
    width: 100%;
    height: 700px;
    margin-top:-68px;
    position: relative;
    text-align: center;
    /* border: 3px solid red: */
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

    .p {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        font-size: 100px;
        font-weight: bold;
        padding: 10px;
        color: #ffffff67;
        line-height: 5rem;
    }

    .span {
        font-size: 70px;
      top: 60%;
      left: 40%;
      transform: translateX(-15%);
      color: #f5deb3c8;
      position: absolute;
      font-weight: bolder;
      
    }
    .moto_1 {
        height: 700px;
        background-color: black;
        margin-bottom: 90px;

    }
    .moto_1 h3 {
        color: #f5deb3c8;
        padding-top: 80px;
        text-align: center;
        font-size: 40px;
        font-weight: bold;
    }

    .moto_1 p {
        color: white;
        margin: 70px 40px 0 40px;
        text-align: center;
        font-size:16px;
    }

    .div_moto {
        display: flex;
        /* flex-wrap: wrap; */
        flex-direction: column;
        justify-content: space-around;
        margin-top: 30px;
        align-items: center;
    }

    .div_moto div {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .div_moto div img {
        width: 70%;
        height: 100%;
        object-fit: cover;
    }

    .h3_nouv {
    color: gray;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
   }

   @media only screen and (min-width: 920px) {

    .p {
        font-size: 300px;
    }

    .span {
      top: 65%;
      left: 45%;
      transform: translateX(100%);
      font-size: 100px;
      
    }

    .div_moto {
        flex-direction: row;
        justify-content: space-around;
        margin-top: 50px;
    }

    .div_moto div {
        display: flex;
        width: 50%;
    }
}
</style>

<div class="lax"></div>
<div class="moto_1">
    <h3>Top motos</h3>
    <p>Profitez de la vie avec nos nouvelles marques tel que les motos routières, les roadsters, les sportives, les cruisers, les motos tout-terrain et les duals sports (ou double usage)</p>
    <div class="div_moto">
        <div>
            <img src="img/r3.png">
        </div>
        <div>
            <img src="img/r2.png">
        </div>
    </div>
</div>

<!-- Button trigger modal -->

<div class="container">
    <div class="card mt-3">
        <div class="card-header text-center">
            <h3 class="h3_nouv">
                TOUS LES ARTICLES MOTOS
            </h3>
        </div>
    </div>
</div>
<br>
<!-- DEBUT TABLEAU ALL DATA WITH FILTER  -->
<?php

    include ('parties/_dataTableMotos.php')

?>
<!-- FIN TABLEAU ALL DATA WITH FILTER  -->
<br><br><br>


<div class="bg-dark text-secondary px-4 py-5 text-center" style="background-color: #F1F1F3;" id="black">
    <div class="py-5">
      <h1 class="display-5 fw-bold text-white">Les artciles motos plus récents </h1>
      <div class="row" >

        <div class="col-md-3 col-sm-3">
            <div class="info-right">
                        <div class="card" style="width: 100%; background-color: #F8F9FA; color: #706F6F;">
                            <img class="card-img-top" src="img/moto01.png" alt="Card image cap">
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
                      <img class="card-img-top" src="img/moto02.png" alt="Card image cap">
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
                        <img class="card-img-top" src="img/moto03.png" alt="Card image cap">
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
                            <img class="card-img-top" src="img/moto004.png" alt="Card image cap">
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

<?php include ('parties/_animationsblock.php'); ?>
<?php include ('parties/_footerp.php'); ?>