var activityID = [], i = 0, selectedID,
startTime, endTime, lastTime, today = new Date(), 
tommorrow = today.setDate(today.getDate() + 2), 
date, timeBegin, timeEnd, disabledDates, pair = [[]], 
duration, workingDuration;

function getHour(time){
    return parseInt(time.substring(0, 2));
}

function getMinutes(time){
    return parseInt(time.substring(3, 5));
}

function getEndTime(timeBegin, duration){
    var endMinutes = getMinutes(timeBegin) + parseInt(duration);
    var endHour = getHour(timeBegin);
    if(Math.floor(endMinutes/60) == 1){
        endHour = getHour(timeBegin) + 1;
    }
    else if(Math.floor(endMinutes/60) == 2){
        endHour = getHour(timeBegin) + 2;
    }
    
    timeEnd = endHour + ':' + ('0' + endMinutes%60).slice(-2);
}

$.ajax({
    dataType: 'json',
    async: false,
    url: 'logic/getActivity.php',
    success: function(array) {
        $.each(array.activityName, function (id, item) {
            $('.activity').append($('<option>', {
                value: item,
                text : item
            }));
        });
        
        $.each(array.activityID, function (id, item) {
            activityID.push(item);
        });
        
        $('.activity').children().not(':first').each(function (id, item) {
            $(this).attr('id', activityID[id]);     
            i++;
        }); 
    }
});

$('.activity').on('change', function(){
    $('.datePicker').removeAttr('disabled');
    selectedID = $(this).children(':selected').attr('id');
    $.ajax({
        dataType: 'json',
        async: false,
        type: 'post',
        url: 'logic/getDisabledDates.php',
        data: {selectedID: selectedID, workingDuration: workingDuration},
        success: function(array) {
            disabledDates = array.dates;
        }
    });
    
    $('.timePicker').val('');
    $('.set').attr("disabled", true);
    ajax();
});

$('.set').click(function(){
    resetForm();
    alert(timeEnd);
    $.ajax({
        async: false,
        type:'post',
        url: 'logic/insertOrder.php',
        data: {activityID : selectedID, timeBegin: timeBegin, timeEnd: timeEnd, date: date},
        success: function() {
            $('.messageOptions').append('Termin je odabran! Sačekajte potvrdu admin-a.');
            $('.messageOptions').addClass('alert alert-success');
        }
    });
});

function resetForm(){
    $('.userForm')[0].reset();
    $('.clickTimePicker, .set, .duration, .datePicker').attr("disabled", true);
    $('.messageOptions').html('');
    $('.messageOptions').removeClass('alert alert-danger'); 
    $('.messageOptions').removeClass('alert alert-success'); 
}






