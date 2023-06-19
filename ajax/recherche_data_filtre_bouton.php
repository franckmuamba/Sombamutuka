<?php
include ('../includes/fonctions.php');
include ("../config/database.php");
//include('../parties/_carouselModal.php');
//include('parties/_carouselModal.php'); 


//echo "YES";
//die();
sleep(1);

if((($_POST)))
{
    //echo $_POST;
    //die();
   // echo "Tres bien";
   // echo "Annee ", $_POST["anneefab"];
   // echo "Marque ", $_POST["marquevehicule"];
   // echo "Modele ", $_POST["modelevehicule"];

    //echo "La chose ", $_POST["element"];
    //die();
    $modeleall = $_POST["modelevehicule"];

 
   $annee = $_POST["anneefab"];
    $requete = ("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
     DATEDIFF( M.dateEnd, Now() ) AS nombreJour, M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.description, M.province, M.ville, M.commune, M.reference, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id 
    AND M.valide = '1' 
    AND  DATEDIFF(M.dateEnd, Now()) >0
   ");


    if(isset($_POST['element']) && !empty($_POST['element']))
    {
        $element = $_POST["element"];
        $requete .="
            AND (M.marque like '".$element."' or M.couleur like '".$element."' or M.modele like '".$element."' or M.annee like '".$element."') 
        ";
    
    }

    if(isset($_POST['anneefab']) && !empty($_POST['anneefab']))
    {
        $annee = $_POST["anneefab"];
        $requete .="
            AND annee IN('".$annee."')
        ";
    }
    if(isset($_POST['marquevehicule']) && !empty($_POST['marquevehicule']))
    {
            $marquevehicule = $_POST["marquevehicule"];

       
            $requete .="
            AND marque IN('".$marquevehicule."')
        ";
       

    }
    if(isset($_POST['modelevehicule']) && !empty($_POST['modelevehicule']))
    {
        $modelevehicule = $_POST["modelevehicule"];
       


        if($modelevehicule=="TOUS")
        {
            $requete .="
            AND M.valide = '1' ";
        }
        else
        {
            $requete .="
            AND modele IN('".$modelevehicule."')
        ";
        }


    }
    if(isset($_POST['kmMax'], $_POST['kmMin']) && !empty($_POST['kmMax']) && !empty($_POST['kmMin']))
    {
        //echo $_POST["kmMin"];
        //echo $_POST["kmMax"];
        //die();
        
        $requete .= "
            AND M.km BETWEEN '".$_POST['kmMin']."' AND
            '".$_POST['kmMax']."'
        ";
    }


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

        $total_row = $statement->rowCount();
        $output='';

// DEBUT -- RECHERCHE DE L'IMAGE DANS LA TABLE IMAGES //

    if($total_row>0)
    {
        foreach($result as $row)
        {
            $output .='
            <div class="col-sm-6 col-lg-6 col-md-6 card bg-light">
                <div style="border:1px solid #ccc; border-radius:5px; padding:10px; margin-bottom:16px; height:570px; margin-top: 25px;">
                    <div class="cat">
                        <img src="membres/imagePosts/'.$row['imagePost'].'" alt="photo manquante" class="img-responsive" style="width:100%; height:100%; object-fit: cover;"/>
                    </div>
                   <p class="card-text" align="center"><strong>
                   <a style="text-decoration:none;" href="#">'
                    .$row['marque'].' | '
                    .$row['modele'].' | '
                    .$row['prix'].'$ </a></strong></p>

                  
                    <p class="card-text" style="color:darkgrey;">
                        
                    <i class="bx bx-run" style="color:gray"></i> Kilométrage: '.$row['km'].' km<br/>
                    <i class="bx bxs-calendar"  style="color:gray"></i>  Année de fabrication : '.$row['annee'].' <br/>
                    <i class="bx bxs-happy" style="color:gray"></i> Vendeur: '.$row['prenom'].' <br/>
                    <i class="bx bxs-phone" style="color:gray"></i>  Téléphone: '.$row['telephone'].' <br/>
                    <i class="bx bx-calendar" style="color:gray"></i> Publié le : '.$row['created_at'].' 
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" name="view" class="btn btn-primary btn-sm view" id="'. $row['id'].'">
                                Aperçu
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="detailMicropost.php?id='.$row['id'].'  type="button"  class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 mx-3" target="_blank" >
                            Détails
                            </a>
                        </div>

                    </div>               
                </div>
                </br> 
                
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