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
    </style>


    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border">
                        <h5 class="card-header">Profile de <?= echap($user->prenom)?> ( <?= friends_count() ?> ami<?= friends_count() <=1 ? '' : 's' ?>)</h5>
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
                            <div class="row">
                                <div class="col-sm-6" >

                                    <div class="card mb-3" style="max-width: 33rem; border: none;">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <strong><?= echap($user->prenom) ?></strong>&ensp;<strong><?= echap($user->nom) ?></strong><br/>
                                                <a href="mailto:<?= echap($user->email)?>"><?= echap($user->email)?></a><br/>
                                                <?=
                                                $user->bio ? echap($user->adresse)  : '';
                                                ?>
                                                -
                                                <?=
                                                $user->bio? echap($user->sexe) : '' ;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-3" style="max-width: 33rem; border: none;">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <?= echap($user->telephone) ?>
                                                <br/>
                                                <?= ($user->ville)?>
                                                <br/>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4 class="card-title">Menu biographie de <?= echap($user->nom)?></h4>
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php if (count($microposts) !=0) :?>
                            <?php foreach ($microposts as $micropost):?>
                                    <?php include('parties/_microposts.php') ?>
                                    <?php endforeach;?>
                    <?php else :?>
                            <p>Cet utilisateur n'a pas de statut pour l'instant... </p>
                    <?php endif; ?>
                </div>
                <div class="col-md-2"></div>
            </div>

            

    </div>
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
