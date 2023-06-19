$(document).ready(function(){
    $('.modalImage').click(function (event) {
        event.preventDefault();
        var data = this.dataset;
        $.ajax({
            url: "image.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(data) {
                data.filter(function (img) {
                    return img.substring(img.lastIndexOf('.')) === '.png';
                }).forEach(function (img, index) {
                    $('<div class="carousel-item"><img class="d-block img-fluid" src="' + img + '"></div>').appendTo('.carousel-inner');
                    $('<li data-target="#carousel" data-slide-to="' + index + '"></li>').appendTo('.carousel-indicators');
                })
                $('.modal-content').html();
                $('#myModal').modal({show:true});
                $('#carousel').carousel();
                $('.carousel-indicators > li').first().addClass('active');
                $('.carousel-item').first().addClass('active');
                $('<a href="#carousel" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>').appendTo('.carousel-control-prev'); 
                $('<a href="#carousel" data-slide="next"><span class="carousel-control-next-icon"></span></a>').appendTo('.carousel-control-next');
            } 
        });
    });
});