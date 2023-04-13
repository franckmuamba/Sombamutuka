<script>
    $(document).ready(function(){
        $('#marquevehicule').on('change', function(){
                var marquevehiculeID= $(this).val();
              if(marquevehiculeID)
              {
                $.get(
                    "formarticle/modelevehicule.php",
                    {marquevehiculeID: marquevehiculeID },
                    function(data){
                        $('#modelevehicule').html(data);
                    }
                );
              } else
              {
                $('#modelevehicule').html('<option>Selectionner d abord la marque</option>')
              } 
        });
    });
</script>

<?php if (!empty($_GET['id']) && $_GET['id']=== get_session('user_id')):?>
                                    <div class="status-post">
                                    <div class="card border">
                                    <h5 class="card-header text-center">Ajouter un véhicule </h5>
                                        <form action="microposts.php" method="post" enctype="multipart/form-data">
                                        </br>
                                            <div class="form-group col-md-6" >
                                                <label for="type" class="sr-only">Marque vehicule :</label>
                                                
                                                <select class="form-control" name="marquevehicule" id="marquevehicule" >
                                                    <option  disabled="" selected="">Selectionner marque..</option>
                                                    <?php
                                                        // $query = "SELECT * FROM marquevehicule";
                                                            
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
                                            <div class="form-group col-md-6" >
                                                <label for="type" class="sr-only">Modèle :</label>
                                                <select class="form-control" name="modelevehicule" id="modelevehicule">
                                                    <option  disabled="" selected="">Selectionner modèle..</option>
                                                    <option  disabled="" >Selectionner d'abord la marque</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6" >
                                                <label for="couleur" class="sr-only">Couleur</label>
                                                <select class="form-control" name="couleurvehicule" id="couleurvehicule">
                                                    <option  disabled="" selected="">Selectionner couleur..</option>
                                                    <option >BLANC</option>
                                                    <option >BLEU</option>
                                                    <option >GRIS</option>
                                                    <option >JAUNE</option>
                                                    <option >MARRON</option>
                                                    <option >NOIR</option>
                                                    <option >ORANGE</option>
                                                    <option >ROSE</option>
                                                    <option >ROUGE</option>
                                                    <option >VERT</option>
                                                    <option >VIOLET</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="km" class="sr-only">Kilométrage</label>
                                                <input name="km" id="km" rows="3" class="form-control" placeholder="Kilométrage" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group col-md-6" >
                                                <label for="type" class="sr-only">Transmission </label>
                                                
                                                <select class="form-control" name="transmission" >
                                                    <option  disabled="" selected="">Transmission..</option>
                                                    <option>Automatique</option>
                                                    <option>Manuel</option>
                                                </select>

                                            </div>
                           

                                            <div class="form-group  col-md-6">
                                                <label for="prix" class="sr-only">Prix</label>
                                                <input name="prix" id="prix" rows="3" class="form-control" placeholder="Prix véhicule" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="annee" class="sr-only">Année de fabrication </label>
                                                  
                                                <select class="form-control" name="anneefabrication" >
                                                    <option  disabled="" selected="">Année de fabrication..</option>
                                                    <option>2000</option>
                                                    <option>2001</option>
                                                    <option>2002</option>
                                                    <option>2003</option>
                                                    <option>2004</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>

                                             
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="localisation" class="sr-only">Localisation</label>
                                                <input name="localisation" id="localisation" rows="3" class="form-control" placeholder="Localisation" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group status-post-submit">
                                                    
                                                        <input type="submit" name="publier" value="Publier" class="btn btn-primary">
                                                    <div class="btn-group">
                                                        <span class="btn btn-file" style="background-color: orangered;">Ajouter image
                                                            <input type="file" multiple="multiple" class="btn btn-primary"  name="avatar"  id="avatare" accept="image/*" onchange="preview_image(event)">  
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                  
                                    </div>
                                    <div class="status-post">
                                            <div class="form-group" >
                                                <label for="content" class="sr-only">Statut</label>
                                                <div class="media-body img-thumbnail">
                                                    <img id="output_image" height="150px" width="250px" alt="."/>
                                                </div>
                                            </div>
                                    </div>
                                <br/>
<?php endif; ?>          
                               