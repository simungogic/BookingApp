$(document).ready(function(){
    $(".login").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
            $.ajax({
            type:"POST",
            url: "logic/login.php",
            data:$(".loginForm").serialize(),
            dataType: 'json',
            success:function(array)
            {    
                resetForm();
                for(var i=0;i<array.inputNames.length;i++)
                    $('.' + array.inputNames[i]).addClass('has-error');
                
                if(array.inputNames.length == 0){
                    for(var i=0;i<array.errorLogin.length;i++){
                        $('.messageLogin').append(array.errorLogin[i]);
                        $('.messageLogin').addClass("alert alert-danger");
                    } 
                }
                
                if(array.passed == true && array.admin == true)
                    window.location = 'admin.php';
                else if(array.passed == true)
                    window.location = 'user.php';
            }
        });
    });
    
    function resetForm(){
        $('.input-group').removeClass('has-error');
        $('.messageLogin').removeClass("alert alert-danger");
        $('.messageLogin').html('');
    }
});


