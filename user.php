<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1 charset=utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css.map">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/nav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
  <script src="js/croatian.js"></script>
</head>
<body>
    <?php 
    $status = 'user';
    require_once 'core/init.php';
    require_once 'logic/isloggedin.php';
    require_once 'logic/haspermission.php';
     
    ?>
    <div class="container-fluid">
        <?php 
            require_once 'layouts/headerUser.phtml';
            require_once 'layouts/userForm.phtml';
            //require_once 'layouts/about.phtml';
            //require_once 'layouts/directions.phtml';
        ?>    
    </div>
    <script src="js/activitypicker.js"></script>
    <script src="js/datetimepicker.js"></script>   
    <script src="js/nav.js"></script>
    <script src="js/scrollspy.js"></script>
</body>
</html>
