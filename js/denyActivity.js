$(document).on('click', '[class$=denyActivity]', function(e) {
    e.preventDefault();
    var activityID = $(this).attr('id');
    
    $.ajax({
        type: 'post',
        data: {activityID : activityID},
        url: 'logic/denyActivity.php',
        async: false,
        success: function(data) {
            var parent = $('#' + data).parent().parent();
            parent.fadeOut("fast", function() {
                $(this).remove();
            }); 
        }
    });
});


