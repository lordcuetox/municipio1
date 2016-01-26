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
        <link href="js/JQuery/plugins/layerslider/css/layerslider.css" rel="stylesheet"/>
        <link href="css/twbscolor2.css" rel="stylesheet"/>
        <link href="css/municipio1.css" rel="stylesheet"/>
        <style>
            .macuspana_home_slider {
                width: 1140px;
                height: 450px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            $origin = "";
            require_once 'php/include_header.php';
            ?>
            <div class="row top-buffer" >
                <div class="col-md-12">
                    <article class="macuspana_home_slider">
                        <figure class="ls-layer">
                            <img src="img/eventos/01/1.png" alt="H. Ayuntamiento de Macuspana 2016-2018" class="ls-bg"/>
                            <img src="img/eventos/01/2.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutQuad; slidedirection: top; delayin: 1100" class="ls-s2" />
                            <img src="img/eventos/01/3.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutQuad; slidedirection: left; delayin: 1100" class="ls-s3" />
                        </figure>
                        <figure class="ls-layer">
                            <img src="img/eventos/02/1.jpg" alt="H. Ayuntamiento de Macuspana 2016-2018" class="ls-bg"/>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12" >
                    <div class="row">
                        <div class="col-md-12" >
                            <h1 class="visible-md visible-lg" style="margin-top: 20px"></h1>
                            <h2 class="visible-xs visible-sm text-center">Último tweet</h2>
                        </div>
                        <div class="col-md-12">
                            <div id="ultimo_tweet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="boletines_informativos">
                <div class="col-md-12" style="margin-top: 20px">


                </div>
                <div class="col-sm-6 col-md-3" >
                    <img src="img/boletin/1.jpg" alt="Boletin1" class="img-responsive"/><br/>
                    <p class="text-justify">EL GOBIERNO MUNICIPAL DE MACUSPANA FOMENTA EL DEPORTE CIENCIA </p>
                    <div class="visible-md visible-lg"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_1.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <div class="visible-xs visible-sm text-center"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo1.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/2.png" alt="Boletin2" class="img-responsive"/><br/>
                    <p class="text-justify">15 DIAS DE ACTIVIDADES DEL PRESIDENTE MUNICIPAL JOSE EDUARDO “CUCO” ROVIROSA RAMIREZ</p>
                    <div class="visible-md visible-lg"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_2.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <div class="visible-xs visible-sm text-center"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo2.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/3.jpg" alt="Boletin3" class="img-responsive"/><br/>
                    <p class="text-justify">PROMUEVE GOBIERNO DE MACUSPANA REFORZAMIENTO DE LA CULTURA DE LA SEGURIDAD Y EL RESPETO A LA LEY DE TRANSITO Y VIALIDAD </p>
                    <div class="visible-md visible-lg"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_3.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <div class="visible-xs visible-sm text-center"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo3.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <br class="visible-xs visible-sm"/>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="img/boletin/4.jpg" alt="Boletin4" class="img-responsive"/><br/>
                    <p class="text-justify">RESTABLECIMIENTO DE SERVICIOS MUNICIPALES, BACHEO Y AGUA DE CALIDAD PARA LA POBLACIÓN</p>
                    <div class="visible-md visible-lg"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_4.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
                    <div class="visible-xs visible-sm text-center"><a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo4.php" data-target="#mDetalleBoletin" class="btn btn-success">Leer más</a></div>
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
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/SINHAMBRE.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/dif.png" alt="" class="img-responsive"/>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/PROTECCIONCIVILMASCUSPANA.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">

                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="clearfix visible-md-block"></div>
                <div class="clearfix visible-sm-block"></div>
            </div>
            <div class="row top-buffer" id="banners">
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/banner_transparencia.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/itaip.png" alt="" class="img-responsive"/>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/banner_encuesta.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <img src="Recursos/banner_infomex.png" alt="" class="img-responsive"/>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="clearfix visible-md-block"></div>
                <div class="clearfix visible-sm-block"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="mDetalleBoletin" tabindex="-1" role="dialog" aria-labelledby="mDetalleBoletinLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once 'php/include_footer.php'; ?>
        </div>
        <script src="js/jQuery/jquery-1.11.3.min.js"></script>
        <script src="twbs/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="js/JQuery/plugins/layerslider/js/layerslider.kreaturamedia.jquery.min.js"></script>
        <script src="js/JQuery/plugins/layerslider/JQuery/jquery-easing-1.3.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpdw9gyXrQvIvyLrVi9FneyumQOE8_9CA&sensor=true"></script>
        <script src="js/maps.js"></script>
        <script>
            $(document).ready(function () {

                $.getJSON('http://webxicoandcuetox.com/showTweets.php', function (data) {
                    $("#ultimo_tweet").html("<p>" + data[0].text + "</p>");
                });

                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

                $('.macuspana_home_slider').layerSlider({
                    slideDelay: 3000,
                    globalBGColor: '#FFFFFF',
                    navStartStop: false,
                    navButtons: false,
                    autoStart: true,
                    skin: 'minimal',
                    skinsPath: 'js/JQuery/plugins/layerslider/skins/'
                });

            });
        </script>
    </body>
</html>