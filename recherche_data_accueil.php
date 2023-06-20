<style>
    .post_div {
        /* border: 1px solid red; */
        margin: 0 auto;
        margin-bottom: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        width: 370px;
    }

    .post_div .anchor_1 {
        color: gray;
    }

    .btn_dtls {
        /* border: 1px solid red; */
        transform: translateY(3.3rem);
        width: 100%;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        margin: 0 auto;
    }
    @media only screen and (min-width: 768px) {
        .post_div {
        width: 570px;
        height: 300px;
    }
        .d_c {
            display: flex;
            gap: 20px;
        }

        .d1 {
            width: 100%;
            height: 250px;
        }

        .d1 .cat {
            width: 100%;
            height: 70%;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        .btn_dtls {
            transform: translate(-5rem, 3.3rem);
        }
    }
    @media only screen and (min-width: 990px) {
        .post_div {
            width: 440px;
            height: auto;
            /* border: 1px solid red; */
    }
        .d_c {
            flex-direction: column;
            gap: 0;
        }

        .d1 {
            width: 100%;
            height: auto;
        }

        .d1 .cat {
            width: 100%;
            height: 300px;
            margin: 0 auto;
            /* margin-bottom: 0; */
            /* border: 1px solid red; */
        }
        .btn_dtls {
            transform: translate(-6rem, 3.3rem);
        }
    }
</style>
<?php
include ('includes/fonctions.php');
include ("config/database.php");
//include('parties/_carouselModal.php');
//include('parties/_carouselModal.php'); 

sleep(1);

    $requete = ("SELECT U.id, user_id, U.prenom, U.email, U.avatar, U.telephone,
     DATEDIFF( M.dateEnd, Now() ) AS nombreJour, M.id, M.marque, M.couleur, M.modele, M.annee, M.km, M.transmission, M.prix, M.description, M.province, M.ville, M.commune, M.reference, M.categorie, U.adresse, M.like_count, M.created_at, M.imagePost
    FROM users U, microposts M
    WHERE M.user_id = U.id 
    AND M.valide = '1' 
    AND  DATEDIFF(M.dateEnd, Now()) >0
   ORDER BY M.id DESC ");

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
            <div class="col-sm-4 col-lg-4 col-md-4 card bg-light post_div">
                <div class="d_c" style="border:1px solid #ccc; border-radius:5px; padding:10px; margin-bottom:16px; height:570px; margin-top: 25px;">
                    <div class="d1">
                        <div class="cat">
                            <img src="membres/imagePosts/'.$row['imagePost'].'" alt="photo manquante" class="img-responsive" style="width:100%; height:100%; object-fit: cover;"/>
                        </div>
                        <p class="card-text" align="center"><strong>
                        <a class="anchor_1" style="text-decoration:none;" href="#">'
                        .$row['marque'].' | '
                        .$row['modele'].' | '
                        .$row['prix'].'$ </a></strong></p>
                    </div>

                  
                    <div class="d1">    
                        <p class="card-text" style="color:darkgrey;">
                        <i class="bx bx-run" style="color:gray"></i> Kilométrage: '.$row['km'].' km<br/>
                        <i class="bx bxs-calendar"  style="color:gray"></i>  Année de fabrication : '.$row['annee'].' <br/>
                        <i class="bx bxs-happy" style="color:gray"></i> Vendeur: '.$row['prenom'].' <br/>
                        <i class="bx bxs-phone" style="color:gray"></i>  Téléphone: '.$row['telephone'].' <br/>
                        <i class="bx bx-calendar" style="color:gray"></i> Publié le : '.$row['created_at'].' 
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                        <!--     <button type="button" name="view2" class="btn btn-primary btn-sm view2" id="'. $row['id'].'">
                                    Aperçu
                                </button> -->
                            </div>
                            <div class="col-md-6">
                                <a href="detailMicropost.php?id='.$row['id'].'  type="button"  class="btn_dtls btn btn-primary btn-sm position-absolute bottom-0 end-0" target="_blank" >
                                Détails
                                </a>
                            </div>

                        </div>   
                    </div>            
                </div>
                </br> 
                
            </div>

<!-- Modal -->
<div id="post_modal2" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1763AF; color:beige;">
        <h1 class="modal-title fs-5" style="font-size:bold;" id="staticBackdropLabel">DETAILS ARTICLE </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="post_detail2" class="modal-body">
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

?>

<script>
    $(document).ready(function(){
        function fetch_postdata(id)
        {
            $.ajax({
                url: "fetch_details2.php",
                method: "POST",
                data: {id:id},
                success:function(data)
                {
                    $('#post_modal2').modal('show');
                    $('#post_detail2').html(data);
                }
            })
        }

        $(document).on('click', '.view2', function(){
            var id=$(this).attr("id");
            fetch_postdata(id);
        });
    });

</script>