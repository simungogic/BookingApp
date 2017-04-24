$(document).ready(function(){
     $(".setWorkingTime").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type:"POST",
            url: "logic/setWorkingTime.php",
            data:{timePickerStart : $(".timePickerStart").val(), timePickerEnd : $(".timePickerEnd").val()},
            success:function(data)
            { 
                resetTimeForm();
                if(data == "ok"){
                    $("#messageModal h4").html("Podešeno radno vrijeme!");
                    $("#messageModal").modal("show");
                }else{
                    $("#messageModal h4").html("Postoje neriješene narudžbe koje su izvan radnog vremena. \n\
                        Obratite se admin-u baze.");
                    $("#messageModal").modal("show");
                }
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
                    $("#messageModal h4").html("Dodali ste novu uslugu!");
                    $("#messageModal").modal("show");
                }
                else{
                    $("#messageModal h4").html("Usluga već postoji u bazi!");
                    $("#messageModal").modal("show");
                }  
            }
        });
    });

    function resetTimeForm(){
        $('.workingTimeForm')[0].reset();
        $('.clickTimePickerEnd, .setWorkingTime').attr("disabled", true);
    }
    
    function resetActivityForm(){
        $('.addActivityForm')[0].reset();
        $('.addActivity').attr("disabled", true);
    }
    
    $('.activity').keyup(function(){
        if($(this).val().length == 0)
            $(".addActivity").attr("disabled", true);
        else
            $(".addActivity").removeAttr("disabled");
    });
});

