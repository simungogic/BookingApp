$(document).ready(function(){
    $(".login").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $('.emailLogin, .passwordLogin').tooltip('destroy');
            $.ajax({
            type:"POST",
            url: "logic/login.php",
            data:$(".loginForm").serialize(),
            dataType: 'json',
            success:function(array)
            {   
                for(var i=0;i<array.inputNames.length;i++)
                    $('.' + array.inputNames[i]).css("box-shadow", "0 0 .2em red");
                
                if(array.inputNames.length == 0){
                    for(var i=0;i<array.errorLogin.length;i++){
                        if(array.errorLogin[i] == "Niste potvrdili e-mail adresu!"){
                            $('.emailLogin').css("box-shadow", "0 0 .2em red");
                            showTooltip('.emailLogin', "Niste potvrdili e-mail adresu!");
                        }
                        else if(array.errorLogin[i] == "Niste registrirani!"){
                            $('.emailLogin').css("box-shadow", "0 0 .2em red");
                            showTooltip('.emailLogin', "Niste registrirani!"); 
                        }
                        else if(array.errorLogin[i] == "Unijeli ste netočnu lozinku!"){
                            $('.passwordLogin').css("box-shadow", "0 0 .2em red");
                            showTooltip('.passwordLogin', "Unijeli ste netočnu lozinku!");
                        }
                    } 
                }
                
                if(array.passed == true && array.admin == true)
                    window.location = 'admin.php';
                else if(array.passed == true)
                    window.location = 'user.php';
            }
        });
    });
    
    function showTooltip(klasa, title){
        $(klasa).tooltip({
            title: "<h4>" + title + "</h4>", 
            html: true, 
            placement: "right"
        }).tooltip('show'); 
    }
    
    $(".input-group > .input-lg").focus(function(){
        if($(this).hasClass('emailLogin')){
            $('.emailLogin').css("box-shadow", "");
            $('.emailLogin').tooltip('destroy');
        }
        
        if($(this).hasClass('passwordLogin')){
            $('.passwordLogin').css("box-shadow", "");
            $('.passwordLogin').tooltip('destroy');
        }
    });
    
    $(".input-group > .input-lg").blur(function(){
        $(this).css("box-shadow", "");
    });
});


