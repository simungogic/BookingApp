$(document).on('click', '[class$=accept]', function() {
    var bookID = $(this).attr('id');
    var rowClass = $(this).parent().parent().attr('class');
    var email = $(this).parent().parent().children('.' + rowClass + 'email').text();
    var name = $(this).parent().parent().children('.' + rowClass + 'name').text();
    var activity = $(this).parent().parent().children('.' + rowClass + 'activities').text();
    var date = $(this).parent().parent().children('.' + rowClass + 'date').text();
    var time = $(this).parent().parent().children('.' + rowClass + 'time').text();
    
    $.ajax({
        dataType: "json",
        type: 'post',
        data: {bookID : bookID, email: email, name: name, activity: activity, date: date, time: time},
        url: 'logic/accept.php',
        async: false,
        success: function(data) {
            var parent = $('#' + data).parent().parent();
            parent.fadeOut("fast", function() {
                $(this).remove();
            }); 
        }
    });
});


