<?php $title = "Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('config/database.php'); ?>
<?php include('includes/fonctions.php'); ?>
<?php include('parties/_header.php'); ?>
<?php include('parties/_caroussel.php'); ?>

<style>
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

    .p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    font-size: 40px;
    font-weight: bold;
    padding: 10px;
    color: white;
    line-height: 5rem;
    }

    .p .span {
        color: #f5deb3c8;
    }
    .p .span span {
        color: white;
        font-size: 16px;
        font-weight: normal;
        text-decoration: underline;
    }

   .h3_nouv {
    color: gray;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
   }

   .card-text {
    color: gray;
    font-size: 16px;
    margin-top: 20px;
    margin-bottom: 20px;
   }

   .card-header {
    border: none;
   }
   .discover {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
        margin: 0 30px;
       }
        
    .line {
    display: flex;
    border: 1px solid #9f9f9e8a;
    width: 40%;
    margin: 40px auto 10px auto;
    }
    
    .discover div  {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .discover div img {
        width: 50%;
        height: 50%;
        object-fit: cover;
        margin: 0 auto;
       }
    .discover div h3 {
        color: black;
        font-size: 24px;
        font-weight: bold;
        
    }
    
       .discover div p {
        display: flex;
        color: gray;
        line-height: 2rem;
         align-items: center;
        padding: 14px;
        justify-content: center;
       }
    
       .discover div a {
        color: white;
        text-decoration: none;
        font-size: 14px;
        padding: 8px;
        background-color: orange;
        border-radius: 8px;
    
       } 

   
   @media only screen and (min-width: 920px) {
       .discover {
        flex-direction: row;
        justify-content: space-between;
        margin: 80px 90px;
       }
        
       .line {
        margin: 0 auto 70px auto;
        text-align: center;
        justify-self: center;
       }
    
       .discover div  {
        display: block;
        width: 50%;
        flex-direction: column;
        justify-content: start;
       }

       .discover div img {
        width: 100%;
        height: 100%;
       }
    
       .discover div h3 {
        font-size: 38px;
    
       }
       .discover div p {
        line-height: 1.5rem;
        margin-bottom: 20px;
        padding-left: 0;
       }
   }

   
</style>

    <br />
    <div class="index img-fluid">
        <div class=" flou"></div>
        <p class="p">ACHÈTEZ VOTRE VOITURE MAINTENANT AVEC
            <span class="span">SOMBAMUTUKA <br>
                <span>Profitez de nos services sûrs et exclusifs</span>
            </span>
        </p>
        <img src="img/car5.jpeg" alt="time home image">
        <div class="container" >
            <div class="row" id="showhome">
                    <div class="col-md-6 col-sm-6" id="tab">
                       
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="showcase-right">
                          
                      </div>
                    </div>

            </div>
 
        </div>
    </div>
</br></br>

      
<div class="discover">
    <div>
        <img src="img/temp.webp" alt="time home image">
    </div>
    <div>
        <h3>Avec nous?</h3>
        <p>
            Gagnez votre temps avec sombamutuka, nous avons tous ces dont vous avez besoin, nos services de ventes sont hors pair,
            n'hesitez pas de visiter notre page pour en savoir plus
        </p>
        <a class="lien_v"href="vehicule.php">Nos offres</a>
    </div>
</div>
<div class="line"></div>
<div class="container p-5 shadow p-3 mb-5 bg-light rounded" style="background-color: #AAAAAA;">
        <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h3 class="h3_nouv ">NOUVEAUTÉS</h3>
                            <div class="card" style="width: 100%;">
                                <img src="https://auto-moto.digidip.net/visit?url=https%3A%2F%2Fsf2.auto-moto.com%2Fwp-content%2Fuploads%2Fsites%2F9%2F2023%2F04%2Fjlr_reimagine_jaguar_tease_image_190423.jpg&ppref=https%3A%2F%2Fwww.auto-moto.com%2Fnouveautes&currurl=https%3A%2F%2Fwww.auto-moto.com%2Fnouveautes%2Fjaguar-land-rover-futur-seclaircit-420281.html" class="card-img-top" alt="Photo nouveauté">
                                <div class="card-body">
                                    <p class="card-text">
                                        La situation du groupe Jaguar Land Rover est assez préoccupante.
                                         Pour la première fois depuis bien longtemps toutefois, le soleil
                                          semble pointer le bout de son nez... 
                                        <a href="https://www.auto-moto.com/nouveautes" target="_blank">Lire plus </a>
                                    </p>
                                </div>
                            </div>
                            
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h3 class="h3_nouv ">ARTICLES RECENTS</h3>
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php echo make_slide_indicators($bd); ?>
                    </ol>

                    <div class="carousel-inner" >
                        <?php echo make_slides($bd); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div> 
                    </div>
                          
            </div>
</div>



    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3 card-header" id="titrearticle">
                <h3 class="h3_nouv">
                    FILTRE DES ARTICLES
                </h3>
            </div>

                <div class="col-md-3" id="bloquemarquegauche">
                    <div class="card shadow mt-3">
                    <div class="card-header">
                          <div class="list-group">
                              <div class="card-header">
                                    <h5>Rechercher</h5>
                                </div>
                          </div>
                         </div>
                      <div class="card-body">
                                    <div class="dropdown-divider"></div>
                                    <div class="form-group">
                                                <label for="name">Index à rechercher<span class="text-danger"></span></label>
                                                <input type="text" value="" name="index" id="index" class="form-control" required="required"/>
                                            </div>
                                    <form method="post">
                                        <input type="submit" class="btn btn-primary" name="chercheIndex" value="Rechercher" />
                                        <div class="form-group">
                                        <label>Date début</label>
                                            <input type="date" name="bday1" max="3000-12-31" min="1000-01-01" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                        <input type="date" name="bday2" min="1000-01-01" max="3000-12-31"  class="form-control">
                                        </div>
                                    </form>
                      </div>






                        <div class="card-header">
                                <div class="card-header">
                                    <h5>RANGE PRIX</h5>
                                </div>
                              <div class="list-group">
                                <input type="hidden" id="hidden_minimum_price" value="0"/>
                                <input type="hidden" id="hidden_maximum_price" value="200000"/>
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Min &nbsp;&nbsp;&nbsp;   | &nbsp;&nbsp;&nbsp;   Max</label>
                                <p id="price_show" class="text-center"> 1.000$ - 200.000$</p>
                                <div id="price_range"></div>
                            </div>
                        </div>
                        <?php
                                    $r_marque = "SELECT DISTINCT(nomv) FROM marquevehicule
                                    ORDER BY idv DESC";

                                    $statement = $bd->prepare($r_marque);
                                    $statement->execute();

                                    $result = $statement->fetchAll();
                                    $nbreMarque = count($result);

                        ?>

                        <div class="card-header">
                            <p class="mt-0 mb-0 mx-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    MARQUE <i class='bx bxs-down-arrow'></i>
                                    <span class=" badge rounded-pill bg-danger">
                                        <?= $nbreMarque ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </p>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <?php
                                    foreach($result as $row)
                                    {
                                ?>     
                                    <div class="list-group-item checkbox">
                                        <label><input type="checkbox" class="common_selector marque" value="<?php echo $row['nomv']; ?>"/>
                                            <?php echo $row['nomv'] ; ?>
                                        </label>
                                    </div>
                                <?php
                                    }

                                ?>
                            </div>
                        </div>
                        <?php
                            $r_modele = "SELECT DISTINCT(modele) FROM microposts WHERE  modele is not null
                            ORDER BY id DESC";

                            $statement = $bd->prepare($r_modele);
                            $statement->execute();

                            $result = $statement->fetchAll();
                             $nbreModele = count($result);
                        ?>

                        <div class="card-header">
                            <p class="mt-0 mb-0 mx-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                    MODELE &nbsp <i class='bx bxs-down-arrow'> </i>
                                    <span class=" badge rounded-pill bg-danger">
                                        <?= $nbreModele ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </p>
                        </div>
                        <div class="collapse" id="collapseExample1">
                            <div class="card card-body">        
                                    <?php           
                                        foreach($result as $row)
                                        {
                                    ?>     
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector modele" value="<?php echo $row['modele']; ?>"/>
                                                <?php echo $row['modele'] ; ?>
                                            </label>
                                        </div>
                                    <?php
                                        }

                                    ?>

                            </div>
                        </div>

                        <?php
                            $r_couleur = "SELECT DISTINCT(couleur) FROM microposts
                            ORDER BY id DESC";
                            $statement = $bd->prepare($r_couleur);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            $nbreColors = count($result);
                                           
                        ?>
                        <div class="card-header">
                            <p class="mt-0 mb-0 mx-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                    COULEUR &nbsp <i class='bx bxs-down-arrow'></i>
                                    <span class=" badge rounded-pill bg-danger">
                                        <?= $nbreColors ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </p>
                        </div>
                        <div class="collapse" id="collapseExample2">
                                <div class="card-body">
                                    <?php
                                        foreach($result as $row)
                                        {
                                    ?>     
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector couleur" value="<?php echo $row['couleur']; ?>"/>
                                                <?php echo $row['couleur'] ; ?> 
                                            </label>
                                        </div>
                                    <?php
                                        }

                                    ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <br />
                        <div class="row filter_data" id="seachArticle">

                        </div>
                    </div>
            
            </div>
        </div></br></br>


</div>  </br></br></br>

<script>
var url = 'ajax/searchArticle.php';

$('#index').on('keyup', function ()
{
    var query = $(this).val();
    
    if (query.length > 0)
    {
        $.ajax({
            type : 'POST',
            url: url,
            data: {
                query: query
            },

            success: function (data) {
                $("#seachArticle").html(data).show();
            }
        });
    }
    else
    {
                //("#display-results").hide();
                //$('.filter_data').html(data);

                
            $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading"></div>')
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var marque = get_filter('marque');
            var couleur = get_filter('couleur');
            var modele = get_filter('modele');

            $.ajax({
                url: "recherche_data_accueil.php",
                method: "POST",
                data:{action:action, minimum_price:minimum_price,maximum_price:
                maximum_price, marque:marque, couleur:couleur, modele:modele},
                success:function(data){
                    //var_dump(data);
                    //die();
                    $('.filter_data').html(data);
                }
            })

        }

        function get_filter(class_name)
        {
            var filter = [];

            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());

            });
            return filter;
        }
        $('.common_selector').click(function()
        {
            filter_data();
        });

        $('#price_range').slider({
            range:true,
            min:1000,
            max:65000,
            values:[1000, 65000],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();


            }
        });

        $( function() {
        $( "#slider" ).slider();
        } );


        });

                
    }
});
</script>


<style>
    #loading
    {
        margin-top: 25%;
        text-align: center;
        background: url('Loading.gif') no-repeat center;
        height: 150px;
    }

</style>



<script>
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading"></div>')
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var marque = get_filter('marque');
            var couleur = get_filter('couleur');
            var modele = get_filter('modele');

            $.ajax({
                url: "recherche_data_accueil.php",
                method: "POST",
                data:{action:action, minimum_price:minimum_price,maximum_price:
                maximum_price, marque:marque, couleur:couleur, modele:modele},
                success:function(data){
                    //var_dump(data);
                    //die();
                    $('.filter_data').html(data);
                }
            })

        }

        function get_filter(class_name)
        {
            var filter = [];

            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());

            });
            return filter;
        }
        $('.common_selector').click(function()
        {
            filter_data();
        });
        
        $('#price_range').slider({
            range:true,
            min:1000,
            max:200000,
            values:[1000, 200000],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();


            }
        });

        $( function() {
    $( "#slider" ).slider();
  } );


    });

</script>

<!-- ------------------------------------------------------ -->
<!--DEBUT  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->

<script>
      // START-  THIS ONE LOAD MY IMAGES FROM THE DATA BASE AND DISPLAY IT
      function charger_images()
      {
          $.ajax({
              url: "recherche_data_recents.php",
              success: function(data)
              {
                  $('#images_slide').html(data);
              }
          });
      }
      // END-  THIS ONE LOAD MY IMAGES FROM THE DATA BASE

    $(document).ready(function(){

          // START APPEL DE LA FONCTION QUI CHARGE LES IMAGES ET LES DISPLAY

                charger_images();


          //END APPEL DE LA FONCTION QUI CHARGE LES IMAGES ET LES DISPLAY

    });
</script>
<!-- ------------------------------------------------------ -->
<!--FIN  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->















<footer id="footer" class="footer-1">
   
      <div class="footer-copyright">
        
          <div class="row">
            <div class="col-md-12 text-center">
            <p>Copyright Sombamutuka © 2023. All rights reserved.</p>
            </div>
          </div>
      
      </div>
</footer>



</body>
</html>

    
<?php include ('parties/_animationsblock.php'); ?>
