var numItem;
$(document).ready(function() {
    $.ajax({
        dataType: "json",
        url: 'logic/getActivityList.php',
        async: false,
        success: function(array) {
            numItem = array.activity.length;
            $.each(array.activity, function(i, item) {
                $('#activityList tbody').append(
                       '<tr class=' + i + '>\n\
                        <td class=' + i + 'activity></td>\n\
                        <td><a href=# class=' + i + 'denyActivity>Obriši</a></td>\n\
                        </tr>');
            });

            $.each(array.activity, function(i, item) {
                $('.' + i + 'activity').text(item);
            }); 
            
            $.each(array.activityID, function(i, item) {
                $('.' + i + 'denyActivity').attr('id', item);
            });
        }   
    });
   
    if(numItem > 0){
        $('#activityList').paging({
            limit:10,
            rowDisplayStyle: 'block',
            activePage: 0,
            rows: []
        });
    }
});


