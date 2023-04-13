<?php if (!empty($_GET['id']) && $_GET['id']=== get_session('user_id')):?>
                                    <div class="status-post">
                                    <div class="card border">
                                    <h5 class="card-header text-center">Ajouter une moto </h5>
                                        <form action="microposts.php" method="post" enctype="multipart/form-data">
                                        </br>
                                            <div class="form-group col-md-6">
                                            <label for="type" class="sr-only">Marque</label>
                                                <select class="form-control" name="marquemoto" >
                                                    <option  disabled="" selected="">Selectionner marque..</option>
                                                    <option value="YAMAHA">YAMAHA</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputMarque" class="sr-only">Modele : </label>
                                                <select class="form-control" name="modelemoto" >
                                                    <option  disabled="" selected="">Selectionner modele..</option>
                                                    <option value="BOXER">BOXER</option>
                                                    <option value="BAJAJ">BAJAJ</option>
                                                    <option value="TVS">TVS</option>
                                                    <option value="DT125">DT 125</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6" >
                                            <label for="couleur" class="sr-only">Couleur</label>
                                                <select class="form-control" name="couleurmoto" id="couleur">
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
                                            <div class="form-group  col-md-12">
                                                <label for="localisation" class="sr-only">Localisation</label>
                                                <input name="localisation" id="localisation" rows="3" class="form-control" placeholder="Localisation" maxlength="500" minlength="3"></input>
                                            </div>
                                            <div class="form-group status-post-submit">
                                                    
                                                        <input type="submit" name="publiermoto" value="Publier" class="btn btn-primary">
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
                               