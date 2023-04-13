$(document).ready(function () {
    $('[data-confirm]').on('click', function (e) {
        e.preventDefault();

        var href = $(this).attr('href');
        var message = $(this).data('confirm');

        swal({
            title : "Etes-vous sur?",
            text : message,
            type : "warning",
            showCanceButton: true,
            cancelButtonText: "Annuler",
            confirmButtonText: "Oui",
            confirmButtonColor: "#DO6855"
        }, function (isConfirm) {
            if(isConfirm){
                window.location.href = href;
            }
        });
       
    });

});

var url = 'ajax/search.php';

    $('#searchbox').on('keyup', function ()
    {
        var query = $(this).val();
      
        
        if (query.length > 0)
        {
            $.ajax({
                type : 'POST',
                url: url,
                data: {
                    query: query
                },

                success: function (data) {
                    $("#display-results").html(data).show();
                }
            });
        }
        else
        {
            $("#display-results").hide();
        }
    });


    var url2 = 'ajax/recherche.php';

    $('#on').on('keyup', function ()
    {
        var query = $(this).val();
        
        if (query2.length > 0)
        {
            $.ajax({
                type : 'POST',
                url: url2,
                data: {
                    query: query2
                },

                success: function (data) {
                    //$("#display-results").html(data).show();
                    console.log(data);
                }
            });
        }
        else
        {
            $("#display-results").hide();
        }
    });