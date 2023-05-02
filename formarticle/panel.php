
<div class="col-md-12 col-sm-12" id="tab">
    <div class="showcase-left" id="home">
        <div class="h-100 p-5 rounded-3 shadow p-3 mb-5 rounded" style="color:black; border:none; background-color:rgba(0, 0, 0, 0.03);" >
            <div class="bd-example">

                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Véhicule</button>
                            <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Motos</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Moteurs</button>
                            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Vélos</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent" style="background-color: white; height:460px; padding:15px; margin: -16px auto; overflow:scroll;">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                <p>
                                     <?php
                                         require("formarticle/formVehicule.php");
                                     ?>     
                                </p>
                            </div>
                            

                            <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                <p>
                                    <?php
                                         require("formarticle/formMoto.php");
                                     ?> 
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