$('.timePickerStart, .timePickerEnd').timepicker({
    timeFormat: 'H:i',
    step: 60
});

$('.clickTimePickerStart').on('click', function(){
    $('.timePickerStart').timepicker('show');
});

$('.clickTimePickerEnd').on('click', function(){
    $('.timePickerEnd').timepicker('show');
});

$('.timePickerStart').on('changeTime', function() {
    $('.clickTimePickerEnd').removeAttr('disabled'); 
});

$('.timePickerEnd').on('changeTime', function() {
    $('.setWorkingTime').removeAttr('disabled'); 
});


