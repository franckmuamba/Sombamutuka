<?php
    if (isset($_POST['bien']))
    {
        $extensionValides = array('png','jpg', 'jpeg', 'gif', 'webp');

        for($count = 0; $count< count($_FILES["file_img"]["tmp_name"]);$count++)
        {
        
        $filetmp = $_FILES["file_img"]["tmp_name"];

       
        var_dump($filetmp);
        //die();
       
       // $nomImage = $_FILES["file_img"]["name"];
        //$filetype = $_FILES["file_img"]["type"];
       // $chemin = "membres/images/".$nomImage[$count];
        
        

            //$extensionLoaded = strtolower(substr(strchr($_FILES['file_img']['name'], '.'), 1)) ;
            //$nomImage = implode($_FILES['file_img']['name']); 

            //echo $extensionLoaded;
           

          // $resultat = move_uploaded_file($filetmp, $chemin);

           
       


    }
    die();
















        move_uploaded_file($filetmp,$filepath);

        $q= $bd->prepare('insert into images(nomPhoto,pathPhoto)
                 
                 values(:nomPhoto,:pathPhoto)');

        $q->execute([
            'nomPhoto'=> $filename,
            'pathPhoto'=> $filepath
        ]);

        if ($q)
        {
            echo "Inserée avec succès";
        }
        else
        {
            echo "Insertion échouée";
        }
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>

    <link rel="stylesheet" href="brouilloncss.css">


    <link href="drag-drop-file-upload/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link rel="stylesheet" href="drag-drop-file-upload/css/styles.css">



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

        #wrapper
        {
            text-align:center;
            margin:0 auto;
            padding:0px;
            width:995px;
        }
        #output_image
        {
            max-width:300px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <br />

    <div id="wrapper">
        <form method="post" enctype="multipart/form-data">
            <input name="file_img[]" type="file" multiple accept="image/*" onchange="preview_image(event)">
            <img id="output_image"/>
            <input type="submit" value="Envoyer" name="bien"/>
        </form>
    </div>

</div>

    <!-- Latest compiled and minified JavaScript -->


    <script src="drag-drop-file-upload/js/jquery.min.js"></script>
    <script src="drag-drop-file-upload/js/bootstrap.min.js"></script>
    <script src="drag-drop-file-upload/js/jquery.dm-uploader.min.js"></script>
    <script src="drag-drop-file-upload/js/demo-ui.js"></script>
    <script src="drag-drop-file-upload/js/demo-config.js"></script>

    <!-- File item template -->
    <script type="text/html" id="files-template">
        <li class="media">
            <img class="mr-3 mb-2 preview-img" src="https://danielmg.org/assets/image/noimage.jpg?v=v10 alt="Generic placeholder image"/>

            <div class="media-body mb-1">
                <p class="mb-2">
                    <strong>%%filename%%</strong> - Status : <span class="text-muted">Waiting</span>
                </p>
                <div class="progress mb-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>

            </div>
        </li>

    </script>

</body>
</html>