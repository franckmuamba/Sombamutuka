<?php $title = "Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('config/database.php'); ?>
<?php include('includes/fonctions.php'); ?>
<?php include('parties/_header.php'); ?>



    <br />
    <div class="index">
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
                                <input type="hidden" id="hidden_maximum_price" value="65000"/>
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Min &nbsp;&nbsp;&nbsp;   | &nbsp;&nbsp;&nbsp;   Max</label>
                                <p id="price_show" class="text-center"> 1.000$ - 65.000$</p>
                                <div id="price_range"></div>
                            </div>
                        </div>
                        <div class="card-header">
                        </br>
                            <h5>MARQUE</h5>
                        </div>
                        <div class="card-body">
                            <?php
                                $r_marque = "SELECT DISTINCT(nomv) FROM marquevehicule
                                ORDER BY idv DESC";

                                $statement = $bd->prepare($r_marque);
                                $statement->execute();

                                $result = $statement->fetchAll();
                                
                                //var_dump($result);
                                //die();

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
                        


                        <div class="card-header">
                            <h5>
                                MODELE
                            </h5>
                        </div>
                        <div class="card-body">
                                <?php
                                        $r_modele = "SELECT DISTINCT(modele) FROM microposts WHERE  modele is not null
                                        ORDER BY id DESC";

                                        $statement = $bd->prepare($r_modele);
                                        $statement->execute();

                                        $result = $statement->fetchAll();
                                        
                                        
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


                        <div class="card-header">
                            <h5>
                                COULEUR
                            </h5>
                        </div>
                        <div class="card-body">
                                <?php
                                        $r_couleur = "SELECT DISTINCT(couleur) FROM microposts
                                        ORDER BY id DESC";

                                        $statement = $bd->prepare($r_couleur);
                                        $statement->execute();

                                        $result = $statement->fetchAll();
                                        
                                        
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

</script>

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
