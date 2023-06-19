
<!--
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="img/slideun.jpg" class="" style="width:100%; height:100%; background-size:cover;" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="img/slidedeux.jpg" class="" alt="..." style="width:100%; height:100%; background-size:cover;">
                    </div>
                    <div class="carousel-item">
                    <img src="img/slidequatre.jpg" class="" alt="..." style="width:100%; height:100%;background-size:cover;">
                    </div>
                </div>
        </div>
-->
<br/><br/><br/>
<div class="col-md-5 col-sm-5" id="tab">
                        <div class="showcase-left" id="home">
                              <div class="h-100 p-5 rounded-3" style="color:black; border:none;    box-shadow: 0 8px 24px rgba(0, 32, 63, .45), 0 8px 8px rgba(0, 32, 63, .45); background-color:#283d64;" >
                              <div class="bd-example">

                                        <nav>
                                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                        <button onclick="window.location. href='vehicule.php';" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Véhicule</button>
                                                        <button onclick="window.location. href='motos.php';" class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Motos</button>
                                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Moteurs</button>
                                                        <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Vélos</button>
                                                </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent" style="background-color: white; height:320px; padding:15px; margin: -16px auto;">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                        <p>
                                        <div class="row">
                                        <h3>Rechercher vehicule par </h3>
                                        
                                                                <div class="col-md-6 col-sm-6">
                                                                </br>
                                                                        <div id="filters">
                                        <form method="post" action="filtrepost.php">                                  
                                                                             <select class="form-select" aria-label="Default select example" name="fetchval" id="fetchval">
                                                                                        <option value="" disabled="" selected="">Selection marque..</option>
                                                                                        <option value="TOYOTA">TOYOTA</option>
                                                                                        <option value="IST">IST</option>
                                                                                        <option value="LAMBORGHINI">LAMBORGHINI</option>
                                                                                        <option value="NISSAN">NISSAN</option>
                                                                                        <option value="JEEP">JEEP</option>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                </br>
                                                                        <div id="filters">
                                                                                <select class="form-select" aria-label="Default select example" name="fetchcolor"  id="fetchcolor">
                                                                                <option value="" disabled="" selected="">Selection couleur..</option>
                                                                                <option value="BLANC">BLANC</option>
                                                                                <option value="NOIRE">NOIRE</option>
                                                                                <option value="BLEU">BLEU</option>
                                                                                <option value="JAUNE">JAUNE</option>
                                                                                <option value="GRISE">GRISE</option>
                                                                                </select>
                                                                        </div>
                                                                        
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                </br>
                                                                        <div id="filters">
                                                                                <select class="form-select" aria-label="Default select example" name="annee"  id="annee">
                                                                                        <option value="" disabled="" selected="">Annee de fabrication..</option>
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
                                                                        
                                                                </div>
                                                               
                                        </div>
                                        </br>
                                        <div class="d-grid gap-2">
                                             
                                                <input class="btn btn-primary"  type="submit" value="submit" id="submit" name="submit"/>
                                               
                                        </div>
                                        </form> 
                                        </p>
                                        </div>
                            

                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                                <p>
                                                       Pour le deuxième onglet<strong>Profile tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.
                                                </p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                                <p>Pour le troisième onglet <strong>Contact tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                                                <p>This is some placeholder content the <strong>Disabled tab's</strong> associated content.</p>
                                        </div>
                                        </div>
                </div>
                          
                            </div>
                        </div>
        </div>

