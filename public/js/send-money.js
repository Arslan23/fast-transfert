$(document).ready(function(){
    var form = '#send-money-form';

    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $('#spinner').addClass('spinner-border spinner-border-sm');
            },
            success:function(response)
            {
                console.log(response.code);
                if(response.code === 200)
                {
                    $('#alert').removeClass('d-none').addClass('alert-success').show(function(){
                        $(this).html("Transaction réussie");
                    });
                }
                else
                {
                    $('#alert').removeClass('d-none').addClass('alert-warning').show(function(){
                        $(this).html("Fonds insuffisants !");
                    });
                }
                $(form).trigger("reset");
            },
            error: function(response) {
                if(response.code === 500)
                {
                    $('#alert').removeClass('d-none').addClass('alert-danger').show(function(){
                        $(this).html("Oops. Une erreur est survenue !");
                    });
                }
            },
            complete: function()
            {
                $('#spinner').removeClass('spinner-border spinner-border-sm');
            }
        });
    });

});