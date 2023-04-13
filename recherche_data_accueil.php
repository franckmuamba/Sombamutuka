<?php

include ("config/database.php");

sleep(1);

if(isset($_POST["action"]))
{
    $requete = ("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
    M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.localisation, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id 
    
   ");

    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $requete .= "
            AND prix BETWEEN '".$_POST["minimum_price"]."' AND
            '".$_POST["maximum_price"]."'
        ";
    }
    if(isset($_POST['marque']))
    {
        $marque_filter = implode("','", $_POST["marque"] );
        $requete .="
            AND marque IN('".$marque_filter."')
        ";
    }
    if(isset($_POST['modele']))
    {
        $modele_filter = implode("','", $_POST["modele"] );
        $requete .="
            AND modele IN('".$modele_filter."')
        ";
    }
    if(isset($_POST['couleur']))
    {
        $couleur_filter = implode("','", $_POST["couleur"] );
        $requete .="
            AND couleur IN('".$couleur_filter."')
        ";
    }

    $statement = $bd->prepare($requete);
    $statement ->execute();

    $result = $statement->fetchAll();

    //var_dump($result);
    //die();

    $total_row = $statement->rowCount();
    $output='';

    if($total_row>0)
    {
        foreach($result as $row)
        {
            $output .='
            <div class="col-sm-4 col-lg-4 col-md-4 card bg-light">
                <div style="border:1px solid #ccc; border-radius:5px; padding:10px; margin-bottom:16px; height:450px; margin-top: 25px;"/>
                    <img src="membres/imagePosts/'.$row['imagePost'].'" alt="photo manquante" class="img-responsive" style="width:230px; height:200px;"/>

                   <p class="card-text" align="center"><strong><a style="text-decoration:none;" href="#">'
                    .$row['marque'].' | '
                    .$row['modele'].' | '
                   .$row['couleur'].'</a></strong></p>

                    <h4 style="text-align:center;" class="text-danger">'.$row['prix'].'$</h4>
                    <p class="card-text" style="color:darkgrey;">
                        
                        | Kilométrage: '.$row['km'].' km<br/>
                        | Année de fabrication : '.$row['annee'].' <br/>
                        | Vendeur: '.$row['prenom'].' <br/>
                        | Téléphone: '.$row['telephone'].' <br/>
                        | Publié le : '.$row['created_at'].' 
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                        <button type="button" name="view" class="btn btn-info btn-sm view" id="'. $row['id'].'">
                            Voir plus
                        </button>
                        </div>
                        <div class="col-md-6">
                       
                        </div>
                    
                    </div>
                   
                </div>
                
                
            </div>

<!-- Modal -->
<div id="post_modal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1763AF; color:beige;">
        <h1 class="modal-title fs-5" style="font-size:bold;" id="staticBackdropLabel">DETAILS ARTICLE </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="post_detail" class="modal-body">
        view
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
            ';
        }
    }
    else
    {
        $output = '<h3>Pas de données </h3>';
    }

    echo $output;
}




?>
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