
<?php $title = "Articles"; ?>
<!-- /container -->

<?php include('parties/_header.php'); ?>

<?php


include ('parties/_error.php')
?>
<?php

include ('parties/_flash.php')
?>

<section id="indexpub" >
<?php

    include ('parties/_pubentete.php')

?>
</section>


<br><br><br><br>

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
    </style>


    <div class="container">
          <h3 class="text-center">Uploader plusieurs images</h3>
      </br>
          <form method="post" id="charger_plusieurs_images" enctype="multipart/form-data">

              <input type="file" name="image[]" id="image" multiple accept=".jpg, .png, .gif" />
              </br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

              <input type="submit" name="insert" id="insert" class="btn btn-info" value="Inserer">



          </form>

      </br>
      </br>

      <div id="images_list"></div>













            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                    
                    <?php if (count($microposts) !=0) :?>
                        <?php foreach ($microposts as $micropost):?>
                            <?php include('parties/_microposts.php') ?>
                        <?php endforeach;?>
                    <?php else :?>
                        <p>Cet utilisateur n'a pas de statut pour l'instant... </p>
                    <?php endif; ?>

                </div>
                <div class="col-md-3">
                    
                    </div>
            </div>

    </div>

<script>
  const triggerTabList = document.querySelectorAll('#myTab button')
triggerTabList.forEach(triggerEl => {
  const tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', event => {
    event.preventDefault()
    tabTrigger.show()
  })
})
</script>

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
                        $("#" + id).html("Je n'aime plus").data('action','unlike');
                    }else
                    {
                        $("#" + id).html("J'aime").data('action','like');
                    }
                }
            });
        });
    });


</script>

<script>
    var sectionn = document.querySelector('sectionn')
    var images= [
        "url('img/banniere-vehicule.jpg')",
        "url('img/voiturehome.jpg')",
        "url('img/voiturehome2.jpg')",
        "url('img/voiture3.jpg')"
    ]

    setInterval (function () {
        var bg = images[Math.floor(Math.random()*images.length)]

        sectionn.style.background = bg
    }, 1000);
   
</script>


<br><br>

    <?php include('parties/_footer.php'); ?>

    <script>
    window.sr = ScrollReveal();
            sr.reveal('.navbar', {
              duration :2000,
              origin : 'bottom'
            })
          
            sr.reveal('#connaitre', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#indexpub', {
              duration :2000,
              origin : 'top',
              distance : '50px'
            });

            sr.reveal('#con-gauche', {
              duration :2000,
              origin : 'left',
              distance : '300px'
            });
            sr.reveal('#con-droite', {
              duration :2000,
              origin : 'right',
              distance : '300px'
            });

            sr.reveal('#fonction', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#cout', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#desc', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('#black', {
              duration :2000,
              origin : 'top',
              distance : '100px',
              viewFactor: 0.5
            });

            sr.reveal('.showcase-btn', {
              duration :2000,
              delay :2000,
              origin : 'bottom',
            });

            sr.reveal('#testimonial div', {
              duration :2000,
              origin : 'bottom',
            });
    
            sr.reveal('.info-left', {
              duration :2000,
              origin : 'left',
              distance : '300px',
              viewFactor: 0.2
            });

            sr.reveal('.info-right', {
              duration :2000,
              origin : 'right',
              distance : '300px',
              viewFactor: 0.2
            });

            sr.reveal('.info-right-2', {
              duration :2000,
              origin : 'right',
              distance : '200px',
              viewFactor: 0.2
            });

             sr.reveal('.info-left-2', {
              duration :2000,
              origin : 'left',
              distance : '200px',
              viewFactor: 0.2
            });


            sr.reveal('#footer', {
              duration :2000,
              origin : 'bottom',
              distance : '100px',
              viewFactor: 0.2
            });
    
  </script>

<!-- ------------------------------------------------------ -->
<!--DEBUT  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->

<script>

      // START-  THIS ONE LOAD MY IMAGES FROM THE DATA BASE AND DISPLAY IT
      function charger_images()
      {
          $.ajax({
              url: "rechercherDesImages.php",
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


          //END APPEL DE LA FONCTION QUI CHARGE LES IMAGES ET LES DISPLAY


        $('#charger_plusieurs_images').on('submit', function(event){
            event.preventDefault();

            var image_name = $('#image').val();
             
            if(image_name== '')
            {
              alert("Merci de selectionner une image");
              return false;

            }else{
                $.ajax({
                    url: "insererImage.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        $('#image').val('');

                        charger_images();
                    }
                });
            }

        });
    });
</script>
<!-- ------------------------------------------------------ -->
<!--FIN  INSERTION DE PLUSIEURS IMAGES DANS LA BD AVEC AJAX     -->
<!-- --------------------------------------------------------->
