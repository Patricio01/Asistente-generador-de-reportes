$(function(){
    $('#form-data').submit(function(e){
        var route = $('#form-data').data('route');
        var form_data = $(this);
        $.ajax({
            type: "POST",
            url: route,
            data: form_data.serialize(),
            //dataType: "dataType",
            success: function (response) {
                console.log(response);
                for (let i = 0; i < response.success.length; i++) {
                    $('#messages').append('<p class="alert">'+response.success[i]+'</p>')    
                    
                }
                
            }
        });

        e.preventDefault();

    })
})