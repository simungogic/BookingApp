$(document).on('click', '[class$=deny]', function(e) {
    e.preventDefault();
    var bookID = $(this).attr('id');
    
    $.ajax({
        type: 'post',
        data: {bookID : bookID},
        url: 'logic/deny.php',
        async: false,
        success: function(data) {
            var parent = $('#' + data).parent().parent();
            parent.fadeOut("fast", function() {
                $(this).remove();
            }); 
        }
    });
});


