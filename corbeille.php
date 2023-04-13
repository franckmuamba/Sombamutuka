
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
                                        