<?php
if (isset($_POST['bien'])) {
    var_dump($_FILES);
    die();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Accueil</title>
    <link rel="stylesheet" href="brouilloncss.css">
    <link rel="stylesheet" href="preview.css">


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

</head>

<body>
</br></br>

    <div>

            <form method="post" enctype="multipart/form-data">
                <input type="file" name="avatar" id="avatar" accept="image/*" onchange="preview_image(event)">

                <input type="submit" value="Soumettre" name="bien" id="bien">
            </form>

        <div class="bloc_deux">

        </div>
    </div>

    <div class="card" style="width: 18rem; margin: auto" >
        <img id="output_image" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</body>