$(document).on('click', '[class$=accept]', function() {
    var bookID = $(this).attr('id');
    var rowClass = $(this).parent().parent().attr('class');
    var email = $(this).parent().parent().children('.' + rowClass + 'email').text();
    var name = $(this).parent().parent().children('.' + rowClass + 'name').text();
    var activity = $(this).parent().parent().children('.' + rowClass + 'activities').text();
    var date = $(this).parent().parent().children('.' + rowClass + 'date').text();
    var dateDatabase = date.split('.');
    dateDatabase = dateDatabase[2] + '-' + dateDatabase[1] + '-' + dateDatabase[0];
    var timeBegin = $(this).parent().parent().children('.' + rowClass + 'timeBegin').text();
    var timeEnd = $(this).parent().parent().children('.' + rowClass + 'timeEnd').text();
    
    $.ajax({
        type: 'post',
        data: {bookID : bookID, timeBegin: timeBegin, timeEnd: timeEnd, date: dateDatabase},
        url: 'logic/accept.php',
        success: function(data) {
            if(data != "overlap"){
               var parent = $('#' + data).parent().parent();
                parent.fadeOut("fast", function() {
                    $(this).remove();
                });  
            }
            else{
                $("#messageModal h4").html("Termin se preklapa s već potvrđenim terminom!");
                $("#messageModal").modal("show");
            }
        }    
    });
    
    $.ajax({
        type: 'post',
        data: {email: email, name: name, activity: activity, date: date, timeBegin: timeBegin, timeEnd: timeEnd},
        url: 'logic/acceptmail.php'
    });   
});


