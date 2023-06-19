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
<script>
    $(document).ready(function(){
        $('#province').on('change', function(){
                var provinceID= $(this).val();
              if(provinceID)
              {
                $.get(
                    "formarticle/ville.php",
                    {provinceID: provinceID },
                    function(data){
                        $('#ville').html(data);
                    }
                );
              } else
              {
                $('#ville').html('<option>Selectionner d abord la province</option>')
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
                                                
                                                <select class="form-select" name="marquevehicule" id="marquevehicule"   style="font-size:14px;">
                                                    <option  disabled="" selected="">Marque vehicule</option>
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
                                                <select class="form-select" name="modelevehicule" id="modelevehicule" style="font-size:14px;">
                                                    <option  disabled="" selected="">Modèle..</option>
                                                    <option  disabled="" >Selectionner d'abord la marque</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6" >
                                                <label for="couleur" class="sr-only">Couleur</label>
                                                <select class="form-select" name="couleurvehicule" id="couleurvehicule" style="font-size:14px;">
                                                    <option  disabled="" selected="">Couleur vehicule</option>
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
                                                <label for="km" class="sr-only" >Kilométrage</label>
                                                <input name="km" id="km" rows="3" class="form-control" placeholder="Kilométrage" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group col-md-6" >
                                                <label for="type" class="sr-only">Transmission </label>
                                                
                                                <select class="form-select" name="transmission" style="font-size:14px;" >
                                                    <option  disabled="" selected="">Transmission</option>
                                                    <option>Automatique</option>
                                                    <option>Manuel</option>
                                                </select>

                                            </div>
                           

                                            <div class="form-group  col-md-6">
                                                <label for="prix" class="sr-only">Prix</label>
                                                <input name="prix" id="prix" rows="3" class="form-control" placeholder="Prix véhicule" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="annee" class="sr-only">Année fabrication </label>
                                                  
                                                <select class="form-select" name="anneefabrication" style="font-size:14px;" >
                                                    <option  disabled="" selected="">Année fabrication</option>
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
                                                <label for="province" class="sr-only">Province</label>
       
                                                <select class="form-select" name="province" id="province"   style="font-size:14px;">
                                                    <option  disabled="" selected="">Province</option>
                                                    <?php
                                                        // $query = "SELECT * FROM marquevehicule";
                                                            
                                                            $q= $bd->query("SELECT * FROM province");
                                                            $provinces = $q->fetchAll(PDO::FETCH_OBJ);
                                                           //var_dump($marques);
                                                          // die();

                                                        if (count($provinces) !=0) {
                                                            foreach ($provinces as $province)
                                                            {
                                                    ?>
                                                               <option value="<?= $province->nomProv ?>"><?= $province->nomProv ?></option>;
                                                               
                                                    <?php
                                                             }
                                                        }
                                                    ?>  
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="ville" class="sr-only">Ville</label>
                                                <select class="form-select" name="ville" id="ville" style="font-size:14px;">
                                                    <option  disabled="" selected="">Ville</option>
                                                    <option  disabled="" >Selectionner d'abord Province</option>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="commune" class="sr-only">Commune</label>
                                                <input name="commune" id="commune" rows="3" class="form-control" placeholder="Commune" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group  col-md-12">
                                                <label for="reference" class="sr-only">Référence</label>
                                                <input name="reference" id="reference" rows="3" class="form-control" placeholder="Référence" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group">
                                                <h5 for="description" class="ml-3 mb-0 text-center" style="color: #424949 ">Description du vehicule </h5>
                                                    <hr>
                                                <textarea name="description" id="content" rows="3" class="form-control" placeholder="Donnez la description de votre article !" maxlength="500" minlength="3"></textarea>
                                            </div>
                                            <div class="form-group status-post-submit">
                                                    
                                                    <input type="submit" name="publier" value="Publier" class="btn btn-primary">
                                                    <div class="btn-group">
                                                        <span class="btn btn-file" style="background-color: orangered;"><p class="mb-1">Ajouter image  <i class='bx bx-image-add'></i></p>
                                                       <input type="file" class="btn btn-primary"  name="image[]"  id="image" multiple accept=".jpg, .png, .gif" accept="image/*" onchange="preview_image(event)">  
                                                            
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                  
                                    </div>
                                    <div class="status-post">
                                            <div class="form-group" >
                                                <label for="content" class="sr-only">Statut</label>
                                                <div class="media-body img-thumbnail">
                                                    <img src="img/images-regular-36.png" id="output_image" height="50px" width="50px" alt="no image"/>
                                                </div>
                                            </div>
                                    </div>
                                <br/>
<?php endif; ?>          
                               