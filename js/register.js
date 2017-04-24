$(document).ready(function(){
    $(".register").click(function(e){
        $('.emailLogin, .passwordLogin').tooltip('destroy');
        e.preventDefault();
        e.stopImmediatePropagation();
            $.ajax({
            type:"POST",
            url:"logic/register.php",
            data:$(".registerForm").serialize(),
            dataType: 'json',
            success:function(array)
            {
                var email = array.email;
                var name = array.name;
                var emailCode = array.emailCode;
                resetForm();  
                for(var i=0;i<array.errorRegister.length;i++){                 
                    if(array.errorRegister[i] == "'Email' nije u valjanom formatu!"){
                        errorBorder('.email');
                        showTooltip('.email', "'Email' nije u valjanom formatu!");
                    }
                    
                    if(array.errorRegister[i] == "'Email' već postoji u bazi!"){
                        errorBorder('.email');
                        showTooltip('.email', "'Email' već postoji u bazi!") 
                    }
                    
                    if(array.errorRegister[i] == "'Lozinka' mora sadržavati minimalno 6 znakova!"){
                        errorBorder('.password');
                        showTooltip('.password', "'Lozinka' mora sadržavati minimalno 6 znakova!"); 
                    }
                    
                    if(array.errorRegister[i] == "'Lozinka' mora sadržavati maximalno 32 znakova!"){
                        errorBorder('.password');
                        showTooltip('.password', "'Lozinka' mora sadržavati maximalno 32 znakova!");
                    }
                    
                    if(array.errorRegister[i] == "'Ponovljena lozinka' se ne poklapa!"){
                        errorBorder('.passwordRepeat');
                        showTooltip('.passwordRepeat', "'Ponovljena lozinka' se ne poklapa!"); 
                    }
                    
                    if(array.errorRegister[i] == "'OIB' mora sadržavati samo znamenke!"){
                        errorBorder('.oib');
                        showTooltip('.oib', "'OIB' mora sadržavati samo znamenke!"); 
                    }
                    
                    if(array.errorRegister[i] == "'OIB' već postoji u bazi!"){
                        errorBorder('.oib');
                        showTooltip('.oib', "'OIB' već postoji u bazi!"); 
                    }
                    
                    if(array.errorRegister[i] == "'OIB' mora sadržavati točno 11 znakova!"){
                        errorBorder('.oib');
                        showTooltip('.oib', "'OIB' mora sadržavati točno 11 znakova!"); 
                    }
                }
                
                for(var i=0;i<array.inputNames.length;i++){
                    $('.' + array.inputNames[i]).css("box-shadow", "0 0 .2em red");
                }   

                if(array.errorRegister.length === 0 && array.inputNames.length === 0){
                    registerSuccess();
                    $.ajax({
                        type:"POST",
                        url:"logic/sendmail.php",
                        data:{ email: email, emailCode: emailCode, name: name },
                        success: function(data){
                            if(data == "error"){
                                alert("Došlo je do pogreške u slanju E-maila.");
                            }
                        }
                    });
                }
                    
            }    
    });
});

    function showTooltip(klasa, title){
        $(klasa).tooltip({
            title: "<h5>" + title + "</h5>", 
            html: true, 
            placement: "right"
        }).tooltip('show'); 
    }
    
    function errorBorder(klasa){
        $(klasa).css("box-shadow", "0 0 .2em red");
    }

    $('.modal').on('hidden.bs.modal', function(){
        resetForm();
        $('.form-group > .form-control').val('');   
        $('[data-toggle="tooltip"]').tooltip('destroy');
    });
    
    function resetForm(){
        $('.message').removeClass('alert alert-success');
        $('.message').text('');
        $(".modal-body > .form-group input").css("box-shadow", "");
    }
    
    $(".modal-body > .form-group input").blur(function(){
        $(this).css("box-shadow", "");
    });
    
    $(".modal-body > .form-group input").focus(function(){
        $(this).css("box-shadow", "");
        $(this).tooltip('destroy');
    });

    function registerSuccess(){
        $('.message').addClass('alert alert-success');
        $('.message').append('Uspješno ste registrirani! Molimo vas potvrdite vašu E-mail adresu.');
        setTimeout(function() {$('.modal').modal('hide');}, 2500);
    }
});




