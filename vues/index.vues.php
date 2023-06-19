<?php $title = "Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('config/database.php'); ?>
<?php include('includes/fonctions.php'); ?>
<?php include('parties/_header.php'); ?>
<?php //include('parties/_carouselModal2.php');?>
<?php include('parties/_caroussel.php'); ?>


<style>
   .index 
   {
    color: rgb(0, 0, 0);
    width: 100%;
    height: 700px;
    margin-top:-72px;
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
    <div class="index img-fluid">
    <div class="flou"></div>
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

<!--<div class="line"></div> -->
<div class="container p-5 shadow p-3 mb-5 bg-light rounded" style="background-color: #AAAAAA;">
        <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h3 class="h3_nouv ">NOUVEAUTÉS</h3>
                            <div class="card" style="width: 100%;">
                                <img src="img/jeep1.jpg" class="card-img-top" alt="Photo nouveauté">
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

<style>
    .cat img {
 height: 100%;
 width: 100%;
 object-fit: cover;
}
.cat {
 height:300px;
 background-color:red;
}
</style>
<script>
    $(document).ready(function(){
        $('#marquevehicule').on('change', function(){
                //var marquevehiculeID= $(this).val();

                var marquevehiculeID = $("#marquevehicule").val();
                var modelevehiculeID = $("#modelevehicule").val();

              if(marquevehiculeID.selectedIndex !=0)
              {
                $.get(
                    "formarticle/modelevehicule.php",
                    {marquevehiculeID: marquevehiculeID, modelevehiculeID:modelevehiculeID },
                    function(data){
                        $('#modelevehicule').html(data);
                        $('#modelevehicule').html(data);
                    }
                );
              }
             
               else(marquevehiculeID.selectedIndex == 0)
              {
                //alert ("ELEMENT ZERO");
                $('#modelevehicule').html('<option>Selectionner d abord la marque</option>')
                //$('#modelevehicule').html('<option>Selectionner d abord la marque</option>')
                //modelevehiculeID.selectedIndex = 0;
                //$('#modelevehicule').remove;
                //var select = document.getElementById("DropList");
               
              } 
        });
    });
</script>


<div class="container">
    <div class="row shadow p-2" id="titrearticle">
    <div class="card mt-1 card-header" >
                <h3 class="h3_nouv">
                    FILTRE ET RECHERCHE
                </h3>
    </div>
            <div class="form-group border rounded-2">
                <h3 class="h3_nouv">
                    <div class="form-group">
                            <input type="text" value="" name="element" id="element" class="form-control" placeholder="Taper texte à rechercher.." required="required"/>
                    </div>

                </h3>
                <div class="form-group col-md-4">
                        <label for="type" class="">Marque vehicule :</label>
                                                        
                        <select class="form-select form-select-sm" name="marquevehicule" id="marquevehicule"   style="font-size:14px;">
                            <option  disabled="" selected="">Selectionner marque..</option>
                            <?php  
                                   $q= $bd->query("SELECT * FROM marquevehicule");
                                       $marques = $q->fetchAll(PDO::FETCH_OBJ);
                                   //var_dump($marques);
                                  // die();

                                   if (count($marques) !=0) {
                                     foreach ($marques as $marque)
                                    {
                            ?>
                                     <option value="<?= $marque->nomv ?>"><?= $marque->nomv ?></option>;
                                                                    
                               <?php
                                       }
                                  }
                            ?>  
                                                            
                        </select>
                </div>
                <div class="form-group col-md-4">
                        <label for="type" class="">Modèle :</label>
                        <select class="form-select form-select-sm" name="modelevehicule" id="modelevehicule" style="font-size:14px;">
                            <option  disabled="" selected="">Selectionner modèle..</option>
                            <option  disabled="" >Selectionner d'abord la marque</option>
                        </select>
                </div>
                <div class="form-group col-md-4">
                <label for="annee" class="">Année de fabrication </label>
                                                            
                                                            <select class="form-select form-select-sm" id="anneefabrication" name="anneefabrication" style="font-size:14px;" >
                                                                <option  disabled="" selected="">Selectionner année..</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                            </select>
                </div>
               
                <div class="form-group col-md-4 center">
                <label for="annee" class="">Range Kilométrage(km) </label>
                                                            
                                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" id="kmMin" name="kmMin" style="font-size:14px;" >
                                                                <option  disabled="" selected="">Km minimum..</option>
                                                                <option value="1000">1000</option>
                                                                <option value="6000">6000</option>
                                                                <option value="1200">12000</option>
                                                                <option value="22000">22000</option>
                                                                <option value="32000">32000</option>
                                                                <option value="52000">52000</option>
                                                                <option value="72000">72000</option>
                                                                <option value="100000">100000</option>
                                                                <option value="150000">150000</option>
                                                                <option value="200000">200000</option>
                                                            </select>
                                                            
                                                            <select class="form-select form-select-sm mt-1" aria-label=".form-select-sm example" id="kmMax" name="kmMax" style="font-size:14px;" >
                                                                <option  disabled="" selected="">Km maximum..</option>
                                                                <option value="5000">5000</option>
                                                                <option value="11000">11000</option>
                                                                <option value="21000">21000</option>
                                                                <option value="31000">31000</option>
                                                                <option value="51000">51000</option>
                                                                <option value="71000">71000</option>
                                                                <option value="100000">100000</option>
                                                                <option value="150000">150000</option>
                                                                <option value="200000">200000</option>
                                                                <option value="250000">250000</option>
                                                            </select>
                </div>
            </div>
            <div class="btn-group col-md-12">
                    <input type="submit" id="submit" name="submit" value="Rechercher" class="btn btn-primary col-12 mx-auto">
                    <input type="button" id="btnReset" class="btn btn-danger" value="Reset" onclick="Initialiser();" />

            </div>

    </div>
    ..
    <div class="card mt-3 card-header" id="titrearticle">
                <h3 class="h3_nouv">
                    TOUS LES ARTICLES
                </h3>
    </div>
    <div class="row">
        <div class="col-md-12">
                    <div class="col-md-12">
                        <br />
                        <div class="row filter_data" id="seachArticle">

                        </div>
                    </div>
            
        </div>
    </div></br></br>


</div>  </br></br></br>
<script>
    $(document).ready(function(){
        function fetch_postdata(id)
        {
            $.ajax({
                url: "fecth_details.php",
                method: "POST",
                data: {id:id},
                success:function(data)
                {
                    $('#post_modal').modal('show');
                    $('#post_detail').html(data);
                }
            })
        }

        $(document).on('click', '.view', function(){
            var id=$(this).attr("id");
            fetch_postdata(id);
        });
    });

</script>



<script type="text/javascript">
    function Initialiser() {
        //var champ = document.getElementById("element");
        var dropDown1 = document.getElementById("kmMax");
        var dropDown2 = document.getElementById("kmMin");
        var dropDown3 = document.getElementById("marquevehicule");
        //var dropDown4 = document.getElementById("modelevehicule");
        var dropDown5 = document.getElementById("anneefabrication");
        dropDown1.selectedIndex = 0;
        dropDown2.selectedIndex = 0;
        dropDown3.selectedIndex = 0;
        //dropDown4.selectedIndex = -1;
        dropDown5.selectedIndex = 0;
        
       // document.getElementById("valeur_id").Reset();
        document.getElementById("element").value="";

        $('#modelevehicule')
    .empty()
    .append('<option selected="selected" value="test">Selectionner modèle..</option>');

    }
</script>

<!-- SCRIPT RECHERCHE BOUTON  -->
<script>
var url2 = 'ajax/recherche_data_filtre_bouton.php';

$('#submit').on('click', function ()
{
    $('.filter_data').html('<div id="loading"></div>')
    
    //var query = $(this).val();
    var anneefab = $('#anneefabrication').val();
    var element = $('#element').val();
    var marquevehicule = $('#marquevehicule').val();
    var modelevehicule = $('#modelevehicule').val();
    var kmMin = $('#kmMin').val();
    var kmMax = $('#kmMax').val();
    
    //alert (anneefab);
   // die();
   // if (anneefab.length > 0 )
   // {
        $.ajax({
            type : 'POST',
            url: url2,
            data: {
                anneefab: anneefab,
                marquevehicule:marquevehicule,
                modelevehicule:modelevehicule,
                kmMin:kmMin,
                kmMax:kmMax,
                element:element

            },

            success: function (data) {
                //alert("OUI VALIDE");
                $("#seachArticle").html(data).show();
               
            }
        });
   // }
});
</script>

<!-- FIN RECHERCHE BOUTON -->





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
            var anneefabrication = get_filter('anneefabrication');

            $.ajax({
                url: "recherche_data_accueil.php",
                method: "POST",
                data:{action:action, minimum_price:minimum_price,maximum_price:
                maximum_price, marque:marque, couleur:couleur, modele:modele, anneefabrication:anneefabrication},
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
