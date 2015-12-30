<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sitio oficial del H. Ayuntamiento de Macuspana 2016-2018 | Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="gobierno, macuspana, 2016,2018, ayuntamiento" />
        <meta name="description" content="Sitio oficial del H. Ayuntamiento de Macuspana, Tabasco" />
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <link href="twbs/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/twbscolor.css" rel="stylesheet"/>
        <link href="css/municipio1.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="container">
            <?php $origin = ""; require_once 'php/include_header.php'; ?>
            <div class="row" >
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="item active">
                                <img src="img/slider/imagen1slide.png" alt="Macuspana1"/>
                                <div class="carousel-caption">
                                    <h3>Macuspana</h3>
                                    <p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an.</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/slider/imagenslide2.png" alt="Macuspana2">
                                <div class="carousel-caption">
                                    <h3>Macuspana</h3>
                                    <p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12" >
                    <div class="row">
                        <div class="col-md-12" >
                            <h1 class="visible-md visible-lg">Último tweet</h1>
                            <h2 class="visible-xs visible-sm text-center">Último tweet</h2>
                        </div>
                        <div class="col-md-12">
                            <div id="ultimo_tweet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="boletines_informativos">
                <div class="col-md-12">
                    <h1 class="visible-md visible-lg">Boletines informativos</h1>
                    <h2 class="visible-xs visible-sm text-center">Boletines informativos</h2>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/boletin1.png" alt="Boletin1" class="img-responsive"/>
                    <p class="text-justify">Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. </p>
                    <div class="visible-md visible-lg"><button type="button" class="btn btn-success">Leer más</button></div>
                    <div class="visible-xs visible-sm text-center"><button type="button" class="btn btn-success">Leer más</button></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/boletin2.png" alt="Boletin2" class="img-responsive"/>
                    <p class="text-justify">Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. </p>
                    <div class="visible-md visible-lg"><button type="button" class="btn btn-success">Leer más</button></div>
                    <div class="visible-xs visible-sm text-center"><button type="button" class="btn btn-success">Leer más</button></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/boletin3.png" alt="Boletin3" class="img-responsive"/>
                    <p class="text-justify">Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. </p>
                    <div class="visible-md visible-lg"><button type="button" class="btn btn-success">Leer más</button></div>
                    <div class="visible-xs visible-sm text-center"><button type="button" class="btn btn-success">Leer más</button></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/boletin4.png" alt="Boletin4" class="img-responsive"/>
                    <p class="text-justify">Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. </p>
                    <div class="visible-md visible-lg"><button type="button" class="btn btn-success">Leer más</button></div>
                    <div class="visible-xs visible-sm text-center"><button type="button" class="btn btn-success">Leer más</button></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="clearfix visible-md-block"></div>
            </div>
            <div class="row top-buffer" id="banners">
                <div class="col-sm-6 col-md-6"><img src="Recursos/logo_videoteca.png" alt="" class="img-responsive"/></div>
                <div class="col-sm-6 col-md-6"><img src="Recursos/GALERIA.png" alt="" class="img-responsive"/></div>
                <div class="clearfix visible-md-block"></div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-xs-6 col-sm-3 col-md-3 marco">
                    <img src="Recursos/itaip.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 marco">
                    <img src="Recursos/SINHAMBRE.png" alt="" class="img-responsive"/>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-3 col-md-3 marco">
                    <img src="Recursos/dif.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 marco">
                    <img src="Recursos/PROTECCIONCIVILMASCUSPANA.png" alt="" class="img-responsive"/>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="clearfix visible-md-block"></div>
                <div class="clearfix visible-sm-block"></div>
            </div>
            <?php require_once 'php/include_footer.php'; ?>
        </div>
        <script src="js/jQuery/jquery-1.11.3.min.js"></script>
        <script src="twbs/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpdw9gyXrQvIvyLrVi9FneyumQOE8_9CA&sensor=true"></script>
        <script src="js/maps.js"></script>
        <script>
            $.getJSON('http://webxicoandcuetox.com/showTweets.php', function (data) {
                $("#ultimo_tweet").html("<p>" + data[0].text + "</p>");
            });
        </script>
    </body>
</html>
