<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css.map">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/paging.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
    <script src="js/paging.js"></script> 
    <script src="js/croatian.js"></script>
    <link rel='stylesheet' href='css/fullcalendar.css'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js'></script>
    <script src='js/fullcalendar.js'></script>
</head>
<body>
    <?php 
        $status = 'admin';
        require_once 'core/init.php';
        require_once 'logic/isLoggedIn.php';
        require_once 'logic/hasPermission.php';
    ?>
    <div class="container-fluid">
        <?php 
            require_once 'layouts/headerAdmin.phtml'; 
            require_once 'layouts/waitingList.phtml';
            require_once 'layouts/workingTimeForm.phtml';
            require_once 'layouts/activityForm.phtml';
            require_once 'layouts/weekCalendar.phtml';
            require_once 'layouts/modal.phtml';
            require_once 'layouts/footer.phtml';
        ?>
    </div>
    <script src="js/scrollspy.js"></script>
    <script src="js/waitingList.js"></script>
    <script src="js/activityList.js"></script>
    <script src="js/accept.js"></script>
    <script src="js/deny.js"></script>
    <script src="js/denyActivity.js"></script>
    <script src="js/timePicker.js"></script>
    <script src="js/options.js"></script>  
    <script src="js/weekCalendar.js"></script>
</body>
</html>

