$(document).ready(function() {
    var startTime, endTime, events = [];
    $.ajax({
      dataType: "json",
      url: 'logic/getWorkingTime.php',
      async: false,
      success: function(data) {
        startTime = data.startTime;
        endTime = data.endTime;
      }
    });

    $.ajax({
      dataType: "json",
      url: 'logic/getAcceptedOrders.php',
      async: false,
      success: function(array) {
        var event = {};
        for(var i = 0; i < array.start.length; i++){
            event = {title: 'Aktivnost:' + array.activity[i] + 
                    '\nKorisnik:' + array.username[i] + '\nOIB:' 
                    + array.oib[i], start: array.start[i], end: array.end[i]};
            events.push(event);
        }     
      }
    });

    $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        columnFormat: 'ddd DD.MM.Y',
        firstDay: 1,
        locale: 'hr',
        slotLabelFormat:'HH:mm',
        allDaySlot: false,
        minTime: startTime,
        maxTime: endTime,
        eventColor: '#bc2f2f',
        contentHeight: 'auto',
        chart: { 
            type: 'column',
            backgroundColor: 'transparent'
        },
        header: { right: 'prev, next' },
        events: events,
        eventClick: function(calEvent) {
            $("#messageModal h4").html(calEvent.title);
            $("#messageModal").modal("show");
        }
    })
    
    $('.fc-left h2').css('display', 'none');
});





