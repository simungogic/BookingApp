$(document).on('click', '[class$=denyActivity]', function(e) {
    e.preventDefault();
    var activityID = $(this).attr('id');
    
    $.ajax({
        type: 'post',
        data: {activityID : activityID},
        url: 'logic/denyActivity.php',
        async: false,
        success: function(data) {
            if(data != "key"){
                var parent = $('#' + data).parent().parent();
                parent.fadeOut("fast", function() {
                    $(this).remove();
                }); 
            }
            else{
                $("#messageModal h4").html("Za ovu uslugu postoje narudžbe! Obratite se adminu baze.");
                $("#messageModal").modal("show");
            }      
        }
    });
});


