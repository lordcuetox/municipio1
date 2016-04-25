<?php
require_once 'clases/UtilDB.php';
$sql = "";
$html = "";
$rst = NULL;
?>
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
        <link href="js/LayerSlider-5.3.0/layerslider/css/layerslider.css" rel="stylesheet"/>
        <link href="css/twbscolor2.css" rel="stylesheet"/>
        <link href="css/municipio1.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <?php
            $origin = "";
            require_once 'php/include_header.php';
            ?>
            <div class="row top-buffer" >
                <div class="col-md-12">
                    <div id="macuspana_layerslider">
                        <div class="ls-slide">
                            <img src="img/eventos/2_1.png" alt="H. Ayuntamiento de Macuspana 2016-2018" class="ls-bg"/>
                            <img src="img/eventos/2_3.png" alt="sublayer" class="ls-l" data-ls="
                                 offsetxin: left;
                                 offsetxout: right;
                                 offsetyin: 150;
                                 offsetyout: -250;
                                 fadein: false;
                                 fadeout: false;
                                 easingin: easeoutquart;
                                 easingout: easeinquart;
                                 durationin: 2500;
                                 durationout: 2500;
                                 delayin: 500;
                                 showuntil: 1;
                                 "/>
                            <img src="img/eventos/2_2.png" alt="sublayer" class="ls-l" data-ls="
                                 offsetxin: left;
                                 offsetxout: right;
                                 offsetyin: 150;
                                 offsetyout: -250;
                                 fadein: false;
                                 fadeout: false;
                                 easingin: easeoutquart;
                                 easingout: easeinquart;
                                 durationin: 2500;
                                 durationout: 2500;
                                 delayin: 500;
                                 showuntil: 1;
                                 "/>
                        </div>
                        <div class="ls-slide">
                            <img src="img/eventos/1_1.png" alt="H. Ayuntamiento de Macuspana 2016-2018" class="ls-bg"/>
                            <img src="img/eventos/1_2.png" alt="sublayer" class="ls-l" data-ls="
                                 offsetxin: left;
                                 offsetxout: right;
                                 offsetyin: 150;
                                 offsetyout: -250;
                                 fadein: false;
                                 fadeout: false;
                                 easingin: easeoutquart;
                                 easingout: easeinquart;
                                 durationin: 2500;
                                 durationout: 2500;
                                 delayin: 500;
                                 showuntil: 1;
                                 "/>
                            <img src="img/eventos/1_3.png" alt="sublayer" class="ls-l" data-ls="
                                 offsetxin: left;
                                 offsetxout: right;
                                 offsetyin: 150;
                                 offsetyout: -250;
                                 fadein: false;
                                 fadeout: false;
                                 easingin: easeoutquart;
                                 easingout: easeinquart;
                                 durationin: 2500;
                                 durationout: 2500;
                                 delayin: 500;
                                 showuntil: 1;
                                 "/>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12" style="margin-top: 20px">
                    <!--<div class="row">
                        <div class="col-md-12" >
                            <h1 class="visible-md visible-lg">Último tweet</h1>
                            <h2 class="visible-xs visible-sm text-center">Último tweet</h2>
                        </div>
                        <div class="col-md-12">
                            <div id="ultimo_tweet"></div>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12">
                            <img src="img/banner_numeros_emergencia.jpeg" alt="Números de emergencia" class="img-responsive"/>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row" id="boletines_informativos">
                <?php
                $sql = "SELECT * FROM noticias WHERE foto_portada IS NOT NULL AND activo = 1 ORDER BY cve_noticia DESC ";
                $rst = UtilDB::ejecutaConsulta($sql);
                $count = 1;
                if ($rst->rowCount() > 0) {
                    foreach ($rst as $row) {

                        $html .= "<div class = \"col-sm-6 col-md-4 col-lg-3 top-buffer\">";
                        $html .= "<img src = \"".$row['foto_portada']."\" alt = \"".$row['titulo']."\" class = \"img-responsive\"/><br/>";
                        $html .= "<p class = \"text-justify\"><strong>".$row['titulo']."</strong> </p>";
                        $html .= "<p class = \"text-justify\">".$row['noticia_corta']."</p>";
                        //$html .= "<a href = \"javascript:void(0);\" data-toggle = \"modal\" data-remote = \"php/noticias_id.php?id=".$row['cve_noticia']."\" data-target = \"#mDetalleBoletin\" class = \"btn btn-success\"><span class = \"glyphicon glyphicon-plus\"></span> Leer más</a>";
                        $html .= "<a href = \"php/boletin_informativo.php?id=".$row['cve_noticia']."\" class = \"btn btn-success\"><span class = \"glyphicon glyphicon-plus\"></span> Leer más</a>";
                        $html .= "</div>";
                        
                        if($count % 2 == 0)
                        { $html .= "<div class=\"clearfix visible-sm-block\"></div>";}
                        else if($count % 3 == 0)
                        { $html .= "<div class=\"clearfix visible-md-block\"></div>";}
                        else if($count % 4 == 0)
                        { $html .= "<div class=\"clearfix visible-lg-block\"></div>";}
                        
                        $count++;
                    }
                } else {
                    $html .= "<div class=\"col-md-12 top-buffer text-center\"><h1>No hay noticias cargadas por el momento</h1></div>";
                }
                $rst->closeCursor();
                $count = 0;
                echo($html);
                ?>
                <!--
                <div class="col-sm-6 col-md-4 col-lg-3 top-buffer">
                    <img src="img/boletin/5.jpg" alt="IMPLEMENTAN EN MACUSPANA OPERATIVO 'CONDUCE SIN ALCOHOL' BAJO LA COORDINACION DE LA POLICIA ESTATAL DE CAMINOS CON SEGURIDAD PUBLICA Y TRANSITO MUNICIPAL." class="img-responsive"/><br/>
                    <p class="text-justify"><strong>IMPLEMENTAN EN MACUSPANA OPERATIVO "CONDUCE SIN ALCOHOL" BAJO LA COORDINACION DE LA POLICIA ESTATAL DE CAMINOS CON SEGURIDAD PUBLICA Y TRANSITO MUNICIPAL.</strong> </p>
                    <p class="text-justify">A partir de las 6 de la tarde del viernes, enfrente del edificio del Palacio Municipal, arrancó el operativo "Conduce sin alcohol" dirigido por la Policía Estatal de Caminos en coordinación con las direcciones municipales de Seguridad Pública y Tránsito, como parte ...</p>
                    <a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_5.php" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 top-buffer" >
                    <img src="img/boletin/1.jpg" alt="Boletin1" class="img-responsive"/><br/>
                    <p class="text-justify"><strong>EL GOBIERNO MUNICIPAL DE MACUSPANA FOMENTA EL DEPORTE CIENCIA</strong> </p>
                    <p class="text-justify">Con la presencia de la señora Crystel Hernández de Rovirosa, presidenta del DIF municipal, hoy sábado se realizó el “Torneo Estatal de Invierno de Ajedrez “en diferentes categorías, donde se contó con la participación de sesenta ajedrecistas de toda la entidad, los cuales lograron demostrar sus conocimientos y destrezas en el también llamado deporte ciencia.</p>
                    <a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_1.php" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 top-buffer">
                    <img src="img/boletin/2.png" alt="Boletin2" class="img-responsive"/><br/>
                    <p class="text-justify"><strong>15 DIAS DE ACTIVIDADES DEL PRESIDENTE MUNICIPAL JOSE EDUARDO “CUCO” ROVIROSA RAMIREZ</strong></p>
                    <p class="text-justify"> “Estoy comprometido a que mi gobierno sea de intensa y estrecha comunicación con el pueblo, por lo cual estaré informando puntualmente de todas y cada una de las acciones emprendidas para cambiarle el rostro a Macuspana, para responder a esa confianza y apoyo que he encontrado en la sociedad, la cual se encontraba muy agraviada por...</p>
                    <a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_2.php" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                </div>
                <div class="clearfix visible-md-block"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 top-buffer">
                    <img src="img/boletin/3.jpg" alt="Boletin3" class="img-responsive"/><br/>
                    <p class="text-justify"><strong>PROMUEVE GOBIERNO DE MACUSPANA REFORZAMIENTO DE LA CULTURA DE LA SEGURIDAD Y EL RESPETO A LA LEY DE TRANSITO Y VIALIDAD </strong></p>
                    <p class="text-justify">Con el fin de brindar una mayor protección y seguridad a la ciudadanía, el Ayuntamiento de Macuspana, a través de la dirección de Tránsito Municipal, que dirige Felicito Cruz Jiménez, informa a la población en general que a partir del 1 de febrero del presente año, iniciarán los operativos de tránsito vial en... </p>
                    <a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_3.php" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                </div>
                <div class="clearfix visible-lg-block"></div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 top-buffer">
                    <img src="img/boletin/4.jpg" alt="Boletin4" class="img-responsive"/><br/>
                    <p class="text-justify"><strong>RESTABLECIMIENTO DE SERVICIOS MUNICIPALES, BACHEO Y AGUA DE CALIDAD PARA LA POBLACIÓN</strong></p>
                    <p class="text-justify">Ante el colapso de los servicios municipales por el conflicto laboral de trabajadores del Ayuntamiento durante las últimas semanas, luego de tomar protesta como presidente municipal constitucional, José Eduardo “Cuco” Rovirosa Ramírez, se comprometió a reactivar en los inmediato el suministro de agua potable de calidad, la recolección de la basura...</p>
                    <a href="javascript:void(0);" data-toggle="modal" data-remote="php/boletin_informativo_4.php" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                </div>-->
            </div>
            <div class="row top-buffer" id="banners">
                <div class="col-sm-12 col-md-12" style="margin-bottom:20px;">
                    <div class="col-sm-6 col-md-6"><img src="img/videoteca.gif"  alt="" class="img-responsive"/></div>
                    <div class="col-sm-6 col-md-6"><img src="img/galeria.gif" alt="" class="img-responsive"/></div>
                </div>
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
        <script src="js/LayerSlider-5.3.0/layerslider/js/greensock.js"></script>
        <script src="js/LayerSlider-5.3.0/layerslider/js/layerslider.transitions.js"></script>
        <script src="js/LayerSlider-5.3.0/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
        <script src="twbs/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpdw9gyXrQvIvyLrVi9FneyumQOE8_9CA&sensor=true"></script>
        <script src="js/maps.js"></script>
        <script>
            $(document).ready(function () {

                /*$.getJSON('http://webxicoandcuetox.com/showTweets.php', function (data) {
                 $("#ultimo_tweet").html("<p>" + data[0].text + "</p>");
                 });*/

                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

                $('#macuspana_layerslider').layerSlider({
                    navStartStop: false,
                    navButtons: false,
                    autoStart: true,
                    skin: 'borderlessdark3d',
                    skinsPath: 'js/LayerSlider-5.3.0/layerslider/skins/'
                });
            });
        </script>
    </body>
</html>