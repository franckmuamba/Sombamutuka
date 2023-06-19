
<form method="post" enctype="multipart/form-data">
    <div class="row">


            <div class="col-md-6">
                <div id="drag-and-drop-zone" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted">Drag and drop files here</h3>
                    <div class="btn btn-primary btn-block mb-5">
                        <span>Open the file browser</span>
                        <input type="file" title="Click to add files" name="file_img" />
                    </div>
                </div>
            </div>


        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
File list
                </div>
                <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                    <li class="text-muted text-center empty">No files uploaded</li>
                </ul>
            </div>
        </div>
    </div>
    </form>



------------------------------


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<form id="form1" runat="server" method="post" enctype="multipart/form-data">
    <input type='file' onchange="readURL(this);" />
    <div style="background-color: whitesmoke; border: #0c5460 8px solid; width: 250px; height: 250px; alignment: center; padding: 6px;">
        <img id="blah" src="#" alt="your image" width="200px" height="200px" />
    </div>
    <input type="submit" name="bien" id="bien" value="Envoyer"/>
</form>




<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5 image Upload with Preview</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Bootstrap 5 image Upload with Preview</label>
                <input class="form-control" type="file" id="formFile" onchange="preview()">
                <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button>
            </div>
            <img id="frame" src="" class="img-fluid" />
        </div>

        <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>
    </body>
</html>  
<script>
    $(document).ready(function(){
        $('#butsave').on('click', function(){
            $("#butsave").attr("disabled", "disabled")
            var marque=$('#marque').val();
            var couleur=$('#couleur').val();

            if(marque!="" && couleur!="")
            {
                $.ajax({
                    url: "recherche.php",
                    type: "POST",
                    data: {
                        marque: marque,
                        couleur: couleur
                    },
                    cache: false,
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);

                        if(dataResult.statuscode==200)
                        {
                            $("#butsave").removeAttr("disabled");
                            $("success").show();
                            $("success").html('Data added successfully !');

                        }
                        else if(dataResult.statuscode==201){
                            alert("Erreur manifeste");
                        }
                        console.log(data);
                    }
                })
            }
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#fetchcolor").on('change', function(){
            var value = $(this).val();
            //alert(value);

            $.ajax({
                url:"fetch.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend:function(){
                    $(".container").html("<span>Working....</span>");
                },
                success:function(data){
                    $(".container").html(data);
                }
            })
        });
    });
</script>

color: #fff;

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

	

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>




    <div class="row">
                <div class="col-md-6 col-ms-6">
                                                                        <div id="filters">
                                                                                <select class="form-select" aria-label="Default select example" name="fetchval" id="fetchval">
                                                                                        <option value="" disabled="" selected="">Selection marque..</option>
                                                                                        <option value="TOYOTA">TOYOTA</option>
                                                                                        <option value="IST">IST</option>
                                                                                        <option value="LAMBORGHINI">LAMBORGHINI</option>
                                                                                        <option value="JEEP">JEEP</option>
                                                                                </select>
                                                                        </div>
                </div>
                <div class="col-md-6 col-ms-6">
                                                                        <div id="filters">
                                                                                <select class="form-select" aria-label="Default select example" name="fetchcolor"  id="fetchcolor">
                                                                                <option value="" disabled="" selected="">Selection couleur..</option>
                                                                                <option value="BLANCHE">BLANCHE</option>
                                                                                <option value="NOIRE">NOIRE</option>
                                                                                <option value="BLEU">BLEU</option>
                                                                                <option value="JAUNE">JAUNE</option>
                                                                                <option value="GRISE">GRISE</option>
                                                                                </select>
                                                                        </div>
                                                                        
                </div>
                                                               
    </div>
                                        </br>
                                        <div class="d-grid gap-2">
                                                <input class="btn btn-primary" type="submit" value="Rechercher" id="fetchvaleur" name="fetchvaleur"/>
                                        </div>
                                


                                        
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



//

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #00a5bf;" id="navbar">
    <a class="navbar-brand" href="index.php"><img src="img/logo9.png" style="width:100%; height:60px; margin: -12px 25px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
         
        </ul>

        <ul class="navbar-nav mr-auto">                      
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('index') ?>" href="index.php ">Accueil</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('motos') ?>" href="motos.php ">Motos</a>
                    </li>
                    <li class="nav-item">
            
                        <a class="nav-link <?= set_active('vehicule') ?>" href="vehicule.php">Véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('moteur') ?>" href="moteur.php">Moteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= set_active('apropos') ?>" href="apropos.php ">A propos</a>
                    </li>

                <?php if (is_logged_in()):?>
                        <li class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item <?= set_active('profile') ?>"  href="profile.php?id=<?= get_session('user_id') ?>">Ajouter article</a>
                                <a class="dropdown-item <?= set_active('modifier_user') ?>" href="modifier_user.php" >Modifier profile</a>
                                <a class="dropdown-item <?= set_active('index') ?>" href="list_users.php" >Membres</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item <?= set_active('deconnexion') ?>" href="deconnexion.php" >Déconnexion</a>
                            </div>
                    </li>
                 <!-- MENU SIGN IN SIGN UP -->
                <?php elseif(!is_logged_in()): ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Signup/Login
                      </a>
                      <ul class="dropdown-menu">
                        
                        <li>
                            <a class="dropdown-item <?= set_active('connexion') ?>" href="connexion.php ">Connexion</a>
                        </li>
                        
                        <li>
                            <a class="dropdown-item <?= set_active('inscription') ?>" href="inscription.php ">Inscription</a>
                        </li>
                        
                      </ul>
                </li>
              
            <?php endif;?>
        </ul>

    </div>
</nav>
</br></br></br>
