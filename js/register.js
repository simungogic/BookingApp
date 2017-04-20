$(document).ready(function(){
    $(".register").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
            $.ajax({
            type:"POST",
            url:"logic/register.php",
            data:$(".registerForm").serialize(),
            dataType: 'json',
            success:function(array)
            {
                resetForm();  
                for(var i=0;i<array.errorRegister.length;i++){
                    $('.message').append(array.errorRegister[i] + '<br>');
                    $('.message').addClass("alert alert-danger");
                }
                for(var i=0;i<array.inputNames.length;i++){
                    $('.' + array.inputNames[i]).addClass('has-error');
                }   

                if(array.errorRegister.length === 0 && array.inputNames.length === 0)
                    registerSuccess();
            }    
    });
});

    $('.modal').on('hidden.bs.modal', function(){
        resetForm();
        $('.form-group').children().not("[type='button']").and.val('');   
    });
    
    function resetForm(){
        $('.message').removeClass('alert alert-success');
        $('.message').removeClass('alert alert-danger');
        $('.form-group').removeClass('has-error');
        $('.message').html('');
    }

    function registerSuccess(){
        $('.message').addClass('alert alert-success');
        $('.message').append('Uspješno ste registrirani! Molimo vas potvrdite vašu E-mail adresu.');
        setTimeout(function() {$('.modal').modal('hide');}, 2000);
    }
});




