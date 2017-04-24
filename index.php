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
  <script src="js/scrollspy.js" language="javascript"> </script>
</head>
<body data-spy="scroll">
    <div class="container-fluid">
        <div class="row header">
            <div class="col-lg-1 menu" data-spy="affix" data-offset-top="197">
                <a type="button" href="#loginpage" class="btn-lg btn btn-default prijavi">Login</a>
                <a type="button" href="#aboutapp" class="btn-lg btn btn-default omeni">O aplikaciji</a>
                <a type="button" href="#aboutme" class="btn-lg btn btn-default zivotopis">O meni</a>
            </div>
            <div class="col-lg-6 col-lg-offset-2">
                <h2 class="descr">Booking App</h2>
                <h3 class="descr"><q>Rezervirajte termin za vašu omiljenu aktivnost iz udobnosti fotelje.</q></h3>
            </div>
        </div>
        <div class="row" id="loginpage">
            <div class="col-lg-4 col-lg-offset-4">
                <?php 
                    require_once 'layouts/loginForm.phtml'; 
                    require_once 'layouts/registerForm.phtml';
                ?>
            </div>
        </div>
        <hr>
        <div class="row" id="aboutapp">
            <div class="col-lg-6 col-lg-offset-3">
                <h2 class="title">O aplikaciji</h2>
                <h4 id="about">
                    <blockquote>
                        <cite>
                            Aplikacija omogućuje registriranim korisnicima rezerviranje termina za usluge koje nudi pružatelj usluga. 
                            Korisnik može odabrati vremenski termin i uslugu koju želi koristiti. 
                            Pružatelj usluge nakon toga potvrđuje vremenski termin i uslugu ako je dostupna. 
                            Korisniku se šalje mail potvrde rezervacije, a pružatelju usluge se rezervira termin u kalendaru.
                        </cite>
                    </blockquote>
                </h4>
            </div>
        </div>
        <hr>
        <div class="row" id="aboutme">
            <div class="col-lg-6 col-lg-offset-3">
                <div id="image-wrapper">
                    <img src="images/photo.jpg" id="photo">
                </div>               
                <div id="cv">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Mjesto rođenja</h4>
                                </td>
                                <td>
                                    <h4>Osijek</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Datum rođenja</h4>
                                </td>
                                <td>
                                    <h4>27.02.1993.</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Obrazovanje</h4>
                                </td>
                                <td>
                                    <h4>Prvostupnik računarstva</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Jezici</h4>
                                </td>
                                <td>
                                    <h4>Engleski(odlična), njemački(osnovna)</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tehničke vještine</h4>
                                </td>
                                <td>
                                    <h4>MS Office, PHP(srednja), HTML, CSS(srednja), Javascript(srednja), Java(osnovna)</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>>
            </div>
        </div>
            <?php                
                require_once 'layouts/footer.phtml';
            ?>
    </div>     
</body>
</html>








