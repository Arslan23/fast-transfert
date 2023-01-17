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
                if(response.code === 200)
                {
                    $('#alert').removeClass('d-none alert-danger alert-warning').addClass('alert-success').show(function(){
                        $(this).html("Transaction réussie");
                    });
                }
                $(form).trigger("reset");
            },
            error: function(response) {
                console.log(response.status);
                if(response.status === 500)
                {
                    $('#alert').removeClass('d-none alert-success alert-warning').addClass('alert-danger').show(function(){
                        $(this).html("Oops. Montant entré trop grand pour le système.");
                    });
                }
                else if (response.status === 406)
                {
                    $('#alert').removeClass('d-none alert-danger alert-success').addClass('alert-warning').show(function(){
                        $(this).html("Solde insuffisant pour cette opération.");
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