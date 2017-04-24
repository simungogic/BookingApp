var numItem;
$(document).ready(function() {
    $.ajax({
        dataType: "json",
        url: 'logic/getWaitingList.php',
        async: false,
        success: function(array) {
            numItem = array.userName.length;
            $.each(array.userName, function(i, item) {
                $('#waitingList tbody').append(
                       '<tr class=' + i + '>\n\
                        <td class=' + i + 'name></td>\n\
                        <td class=' + i + 'activities></td>\n\
                        <td class=' + i + 'date></td>\n\
                        <td class=' + i + 'timeBegin></td>\n\
                        <td class=' + i + 'timeEnd></td>\n\
                        <td class=' + i + 'email style=display:none></td>\n\
                        <td><a href=# class=' + i + 'accept><span class="glyphicon glyphicon-ok"></span></a></td>\n\
                        <td><a href=# class=' + i + 'deny><span class="glyphicon glyphicon-remove"></span></a></td>\n\
                        </tr>');
            });

            $.each(array.userName, function(i, item) {
                $('.' + i + 'name').text(item);
            });

            $.each(array.activityName, function(i, item) {
                $('.' + i + 'activities').text(item);
            });

            $.each(array.date, function(i, item) {
                $('.' + i + 'date').text(item);
            });

            $.each(array.timeBegin, function(i, item) {
                $('.' + i + 'timeBegin').text(item);
            });
            
            $.each(array.timeEnd, function(i, item) {
                $('.' + i + 'timeEnd').text(item);
            });

            $.each(array.bookID, function(i, item) {
                $('.' + i + 'accept').attr('id', item);
                $('.' + i + 'deny').attr('id', item);
            });
            
            $.each(array.email, function(i, item) {
                 $('.' + i + 'email').text(item);
            }); 
        }   
    });
   
    if(numItem > 0){
        $('#waitingList').paging({
            limit:10,
            rowDisplayStyle: 'block',
            activePage: 0,
            rows: []
        });
    }
});






