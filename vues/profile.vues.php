<?php $title = "Profile"; ?>
<?php include('parties/_header.php'); ?>
    <!--   Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" media="all">

<?php $avat =$user->avatar ?>

<script type='text/javascript'>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
         
        }
</script>


<style>

        .btn-file {
            position: relative;
            overflow: hidden;
            width: 150px;
            height: 34px;
            background: lightgrey;
            color: white;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;

            cursor: inherit;
            display: block;
        }


            output{
            width: 100%;
            min-height: 150px;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 15px;
            position: relative;
            border-radius: 5px;
            }

            output .image{
            height: 150px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
            }

            output .image img{
            height: 100%;
            width: 100%;
            }

            output .image span {
            position: absolute;
            top: -4px;
            right: 4px;
            cursor: pointer;
            font-size: 22px;
            color: white;
            }

            output .image span:hover {
            opacity: 0.8;
            }

            output .span--hidden{
            visibility: hidden;
            }

            .panel-body {
                height: 100%;
                margin: 40px 0 0 0;
            }

            .card_body {
                display: flex;
                gap: 20px;
                align-items: center;

            }

            .Ul {
                display: flex;
                flex-direction: column;
                margin: 0 0 0 20px;
                padding: 0 20px 0 0;
                border-right: 1px solid gray;
                
            }

            .Ul .names {
                display: flex;
                gap: 10px;
                font-weight: bold;
                font-size: 20px;
                margin: 14px 0 0 0;
                /* align-items: center; */
                /* justify-content: center; */
            }

            .Ul .names p {
                margin: 0;
            }

            .Ul a {
                text-decoration: none;
                font-size: 14px;
                margin: 0;
            }

            .Ul p {
                margin: 0;
                color: black;
                margin: 0;
                font-weight: 500;
            }

            .ul_n {
                display: flex;
                flex-direction: column;
                margin: 30px 0 0 0;
                padding: 0;
                justify-content: center;
                /* border-top: 1px solid gray; */

            }

            .ul_n p {
                margin: 0;
                color: black;
                margin: 0;
                font-weight: 500;
            }
    </style>


    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php if (!empty($_GET['id'])):?>
                                            <?php if ($user->avatar):?>
                                                <img src="membres/avatar/<?php echo ($user->avatar) ?>"  class="avart-md"  id="avatar" alt="photo de pofile manquante"/>
                                            <?php else :?>
                                                <img src="assets/img/default-user.png"  class="avart-md"  alt="photo de pofile manquantE"/>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-7">
                                        <?php if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')):?>

                                            <?php include ('parties/_relation_links.php');?>

                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="card mb-3" style= "border: none;">
                                    <div class="card_body">
                                        <ul class="Ul">
                                            <li class="names">
                                                <p class=""> <?= echap($user->prenom) ?></p>
                                                <p><?= echap($user->nom) ?></p>        
                                            </li>
                                            <a href="mailto:<?= echap($user->email)?>"><?= echap($user->email)?></a>
                                            <p> <?= $user->bio ? echap($user->adresse)  : ''; ?> </p>
                                            <p>Sexe: <?= $user->bio? echap($user->sexe) : '' ; ?> </p>
                                        </ul>
                                        <ul class="ul_n">
                                            <h5 class="ami">Amis: <?= friends_count() ?> ami<?= friends_count() <=1 ? '' : 's' ?></h5>
                                            <p class="">Contact: <?= echap($user->telephone) ?> </p>
                                            <p> Ville: <?= ($user->ville)?> </p>
                                        </ul>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <h4 class="card-title">Biographie</h4>
                                <div class="card bg-light mb-3" style="max-width: 33rem;">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?=  $user->bio ? nl2br(echap($user->bio)) : "Aucune biographie disponible "?>;
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                         <?php
                         //formulaire panel //
                            include("formarticle/panel.php");
                        ?>
                    </div>
                  
                </div>
            
            </div>
</br></br>
<div class="card mt-3">
    <div class="card-header text-center">
                        <h3>
                            <strong><a style="text-decoration: none;" href="#">MES PUBLICATIONS</a></strong>
                        </h3>
    </div>
</div>

</br>
            <div class="row">
            <div class="col-md-12">
                            <br />
                            <div class="row">
                            <?php if (count($microposts) !=0) :?>
                            <?php foreach ($microposts as $micropost):?>
                                    <?php include('parties/_microposts.php') ?>
                                    <?php endforeach;?>
                            <?php else :?>
                                    <p>Cet utilisateur n'a pas de statut pour l'instant... </p>
                            <?php endif; ?>
                            </div>
                </div>
                   
            </div>
            </div>
            

    </div>
                    </br>  </br>  </br>
               
               
              
            
<?php include('parties/_footer.php'); ?>
<script type="text/javascript">

    $(document).ready(function ()
    {
        $(".timeago").timeago();


        $(".like").on("click", function (e) {
            
            e.preventDefault();

            var id= $(this).attr("id");
            var url ='ajax/micropost_like.php';
            var action = $(this).data("action");
            var micropost_id = id.split("like")[1];
            //var data = 'micropost_id=' + micropostId + '&action=' + action;

            $.ajax({
                type : 'POST',
                url: url,
                data: {
                    micropost_id: micropost_id,
                    action: action
                },

                success: function (likers) {
                    $("#likers_" + micropost_id).html(likers);
                    if(action=='like') {
                        $("#" + id).html("Vendu").data('action','unlike');
                    }else
                    {
                        $("#" + id).html("Pas encore vendu").data('action','like');
                    }
                }
            });
        });
    });


</script>

<!--DEBUT  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->

<script>

      // START-  THIS ONE LOAD MY IMAGES FROM THE DATA BASE AND DISPLAY IT
      function charger_images()
      {
          $.ajax({
              url: "recherche_data_micropost.php",
              success: function(data)
              {
                  $('#images_list').html(data);
              }
          });
      }
      // END-  THIS ONE LOAD MY IMAGES FROM THE DATA BASE

    $(document).ready(function(){

          // START APPEL DE LA FONCTION QUI CHARGE LES IMAGES ET LES DISPLAY

                charger_images();
    
    });
</script>
<!-- ------------------------------------------------------ -->
<!--FIN  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->
