<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1 charset=utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/register.js" language="javascript"> </script>
  <script src="js/login.js" language="javascript"> </script>
</head>
<body>
    <div class="container-fluid">
    <?php 
        require_once 'layouts/loginForm.phtml'; 
        require_once 'layouts/registerForm.phtml';
    ?>
    </div>
</body>
</html>








