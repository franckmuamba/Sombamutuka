<!DOCTYPE html >
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?=
        isset($title) ? $title. ' | Sombamutuka' : 'Sombamutuka - Simple, Rapide, Efficace ';
        ?>
    </title>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Accueil</title>
    <link rel="stylesheet" href="main.css">
   
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <link rel="stylesheet" href="brouilloncss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/4a9560a5d2.js" crossorigin="anonymous"></script>

   
  
    <script>
$(document).ready(function () {
	$('#example').DataTable({
        "language": {
          
            //"lengthMenu": "Afficher _MENU_ articles par page",
            "lengthMenu": "...",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "Afficher page _PAGE_ sur _PAGES_",
            "infoEmpty": "Pas d'articles disponibles",
            "infoFiltered": "(filter à partir de _MAX_ total artciles)",
            "search": "Rechercher..",
            
            "paginate": {
            "first":      "Premier",
            "last":       "Dernier",
            "next":       "Suivant",
            "previous":   "Précédent"
             },
            
          
        }
    });
});


</script>

</head>
<body>
<?php include('parties/_nav.php'); ?>
<?php include('parties/_flash.php'); ?>


