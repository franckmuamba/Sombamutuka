
<footer id="footer" class="footer-1">
   
      <div class="footer-copyright">
        
          <div class="row">
            <div class="col-md-12 text-center">
            <p>Copyright Sombamutuka © 2023. All rights reserved.</p>
            </div>
          </div>
      
      </div>
</footer>

  <script>
    $(function(){
      //smooth Scrolling

      $('a[href*="#"]:not([href="#"])').click(function(){
        if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'') && location.hostname==this.hostname){
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if(target.length){
            $('html, body').animate({
              scrollTop: target.offeset().top
            }, 1000);
            return false;
          }
        }
      });
    });
  </script>






<script src="assets/js/main.js"></script>
<!-- <script src="drag-drop-file-upload/js/jquery.min.js"></script>
<script src="drag-drop-file-upload/js/bootstrap.js"></script> -->
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>


    </body>
</html>