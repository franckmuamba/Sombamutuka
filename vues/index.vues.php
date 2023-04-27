<?php $title = "Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('config/database.php'); ?>
<?php include('includes/fonctions.php'); ?>
<?php include('parties/_header.php'); ?>
<?php include('parties/_caroussel.php'); ?>

<style>
   .index 
   {
    background-image: url(assets/img/bannierevehicule.jpg);
    background-color: white;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    color: rgb(0, 0, 0);
    width: 100%;
    height: 465px;
    margin-top:-63px;
    padding-top: 0;
   }
   
</style>


    <br />
    <div class="index img-fluid">
       
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

      
<div class="container p-5 shadow p-3 mb-5 bg-light rounded" style="background-color: #AAAAAA;">
           
        <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <strong><a href="#"  style="text-decoration: none;"><h3 class="text-center ">NOUVEAUTES</h3></a></strong>
                            <div class="card" style="width: 100%;">
                                <img src="https://auto-moto.digidip.net/visit?url=https%3A%2F%2Fsf2.auto-moto.com%2Fwp-content%2Fuploads%2Fsites%2F9%2F2023%2F04%2Fjlr_reimagine_jaguar_tease_image_190423.jpg&ppref=https%3A%2F%2Fwww.auto-moto.com%2Fnouveautes&currurl=https%3A%2F%2Fwww.auto-moto.com%2Fnouveautes%2Fjaguar-land-rover-futur-seclaircit-420281.html" class="card-img-top" alt="Photo nouveauté">
                                <div class="card-body">
                                    <p class="card-text">
                                        La situation du groupe Jaguar Land Rover est assez préoccupante.
                                         Pour la première fois depuis bien longtemps toutefois, le soleil
                                          semble pointer le bout de son nez. 
                                        <a href="https://www.auto-moto.com/nouveautes" target="_blank">Lire plus </a>
                                    </p>
                                </div>
                            </div>
                            
                      
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <strong><a href="#"  style="text-decoration: none;"><h3 class="text-center ">LES ARTICLES RECENTS</h3></a></strong>
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
            <div class="card mt-3" id="titrearticle">
                <div class="card-header text-center">
                    <h3>
                        <strong><a style="text-decoration: none;"  href="#">FILTRE DES ARTICLES</a></strong>
                    </h3>
                </div>
            </div>

                <div class="col-md-3" id="bloquemarquegauche">
                    <div class="card shadow mt-3">
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
                        <div class="row filter_data">

                        </div>
                    </div>
            
            </div>
        </div></br></br>

        







</div>  </br></br></br>


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
