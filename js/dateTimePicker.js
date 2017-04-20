$.ajax({
  dataType: "json",
  url: 'logic/getWorkingTime.php',
  async: false,
  success: function(data) {
    startTime = data.startTime;
    endTime = data.endTime;
    var hour = getHour(endTime) - 1;
    lastTime = hour + ':30';
    workingDuration = getHour(endTime) - getHour(startTime);
    workingDuration = ('0' + workingDuration).slice(-2);
    workingDuration = workingDuration + ':00:00';
  }
});

$('.timePicker').timepicker({
    minTime: startTime,
    maxTime: lastTime,
    timeFormat: 'H:i',
    step: 30
});

$('.clickTimePicker').on('click', function(){
    $('.timePicker').timepicker('show');
});

$('.datePicker').datepicker({
    altField  : '.actualDate',
    altFormat : 'yy-mm-dd',
    minDate: 2,
    maxDate: 30,
    beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [ disabledDates.indexOf(string) == -1 ]
    },
    onSelect: function() {
        $('.timePicker').val('');
        $('.set').attr("disabled", true);
        $('.clickTimePicker').removeAttr('disabled'); 
        $('.duration').prop('selectedIndex', 0); 
        $('.duration').attr('disabled', true);
        date = $('.actualDate').val();
        selectedID = $('.activity').children(':selected').attr('id');
        
        ajax();      
    }
});

$('.duration').change(function(){
    $('.set').removeAttr('disabled'); 
    
    duration = $('.duration').val();
    getEndTime(timeBegin, duration);
});

function ajax(){
    $.ajax({
        dataType: "json",
        async: false,
        type: 'post',
        url: 'logic/getDisabledTimes.php',
        data: {date : date, selectedID : selectedID},
        success: function(array) {
            pair = [[]];
            var disabledTimeBegin = array.timeBegin;
            var disabledTimeEnd = array.timeEnd;

            for(var i = 0;i < disabledTimeBegin.length; i++){
                 pair[i] = [disabledTimeBegin[i], disabledTimeEnd[i]]; 
            }

            $('.timePicker').timepicker( 'option', {
                disableTimeRanges: pair
            });
        }
    });
}
     
$('.timePicker').on('changeTime', function() {
    $('.duration').prop('selectedIndex', 0);
    $('.set').attr('disabled', true);
    $('.duration').removeAttr('disabled');
    $('.activity').children(':first').attr('selected', 'selected');
    timeBegin = $('.timePicker').val();
    
    $.ajax({
        dataType: "json",
        async: false,
        type: 'post',
        url: 'logic/getDisabledDuration.php',
        data: {date : date, selectedID : selectedID, timeBegin: timeBegin},
        success: function(array) {
            $('.duration').children().attr('disabled', false);
            $.each(array.disabledDuration, function (id, item) {
                $('.duration .' + item).attr('disabled', 'disabled');
            });
        }
    });
});









