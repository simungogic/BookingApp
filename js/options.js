$(document).ready(function(){
     $(".setWorkingTime").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type:"POST",
            url: "logic/setWorkingTime.php",
            data:{timePickerStart : $(".timePickerStart").val(), timePickerEnd : $(".timePickerEnd").val()},
            success:function()
            { 
                resetTimeForm();
                $(".messageWorkingTime").addClass('alert alert-success');
                $(".messageWorkingTime").append("Podešeno radno vrijeme.");
            }
        });
    });
    
    $(".addActivity").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type:"POST",
            url: "logic/addActivity.php",
            data:{activity: $('.activity').val()},
            success:function(data)
            { 
                resetActivityForm();
                if(data == true){
                    $(".messageActivity").addClass('alert alert-success');
                    $(".messageActivity").append("Dodali ste novu aktivnost.");
                }
                else{
                    $(".messageActivity").addClass('alert alert-danger');
                    $(".messageActivity").append("Aktivnost već postoji u bazi!");
                }  
            }
        });
    });

    function resetTimeForm(){
        $('.workingTimeForm')[0].reset();
        $('.clickTimePickerEnd, .setWorkingTime').attr("disabled", true);
        $('.messageWorkingTime').html('');
        $('.messageWorkingTime').removeClass('alert alert-success');
    }
    
    function resetActivityForm(){
        $('.addActivityForm')[0].reset();
        $('.addActivity').attr("disabled", true);
        $('.messageActivity').html('');
        $(".messageActivity").removeClass('alert alert-danger');
        $(".messageActivity").removeClass('alert alert-success');
    }
    
    $('.activity').keyup(function(){
        if($(this).val().length == 0)
            $(".addActivity").attr("disabled", true);
        else
            $(".addActivity").removeAttr("disabled");
    });
});

