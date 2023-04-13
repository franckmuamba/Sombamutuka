
<?php $title = "Modification profile"; ?>
<?php include ("parties/_header.php");?>

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
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    </script>

    <style>
        .btn-file
        {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file]
        {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
<?php
//echo $user->nom;

//var_dump($user);
?>

    <div class="container">
        <div class="row">
            <?php if(!empty($_GET['id']) && $_GET['id']=== get_session('user_id')): ?>
                <div class="col-md-6 col-md-offset-3">
                    <div class="card">
                        <h4 class="card-header">Completer profil</h4>
                        <div class="card border-light">

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nom<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= echap($user->nom)?>" name="nom" id="name" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="prenom">Prenom</label>
                                                <input type="text" value="<?= echap($user->prenom)?>" name="prenom" id="prenom" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="avatar"><strong>Changer mon avatar</strong></label></br>

                                                <label>Profile de profile de <?= $user->prenom ?> </label></br>
                                                <?php
                                                if (!empty($_SESSION['avatar']))

                                                {
                                                    ?>
                                                    <img src="membres/avatar/<?=$_SESSION['avatar']?>" class="img-responsive img-thumbnail" width="150" height="100"  alt="photo de pofile manquante" id="output_image" />
                                                    <?php
                                                }
                                                ?>
                                                </br>
                                                <!-- <input type="file" name="avatar" id="avatar"/></br> -->

                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="btn btn-primary">
                                                    <span class="btn btn-file">Parcourir
                                                    <input type="file" name="avatar"  id="avatare" accept="image/*" onchange="preview_image(event)">
                                                </div>

                                                <!-- <input type="file" name="avatar" id="avatar"/> -->
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pays">Email<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= echap($user->email)?>" name="email" id="email" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sexe">Sexe<span class="text-danger">*</span></label>
                                                <select name="sexe" id="sexe" class="form-control">
                                                    <option value='HOMME' <?= $user->sexe == 'HOMME' ? "selected" : ""?>>
                                                        Homme
                                                    </option>
                                                    <option value='FEMME' <?= $user->sexe == 'FEMME' ? "selected" : ""?>>
                                                        Femme
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Ville<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= echap($user->ville)?>" name="ville" id="ville" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="git">Adresse<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= echap($user->adresse)?>" name="adresse" id="adresse" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="git">Téléphone<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= echap($user->telephone)?>" name="telephone" id="telephone" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                    </div>

                           
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bio">Biographie<span class="text-danger">*</span></label>
                                                <textarea type="text" name="bio" id="bio" class="form-control" cols="30" placeholder="Je suis un citoyen" required="required"><?= echap($user->bio)?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="dropdown-divider"></div>
                                    <input type="submit" class="btn btn-primary" name="maj" value="Valider" />
                                    <div class="form-group">
                                       <label>Beggin period</label>
                                        <input type="date" name="bday1" max="3000-12-31" min="1000-01-01" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Beggin period</label>
                                        <input type="date" name="bday2" min="1000-01-01" max="3000-12-31"  class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
<br/>
    <br/>
<?php include('parties/_footer.php'); ?>