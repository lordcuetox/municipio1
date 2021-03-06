<?php
$origin = "sala_prensa";
require_once 'contador_visitas.php';
$mtz_meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$anio = (int) date("Y");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sitio oficial del H. Ayuntamiento de Macuspana 2016-2018 | Sala de prenssa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="gobierno, macuspana, 2016,2018, ayuntamiento" />
        <meta name="description" content="Sitio oficial del H. Ayuntamiento de Macuspana, Tabasco. Transparencia" />
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
        <link href="../twbs/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/twbscolor2.css" rel="stylesheet"/>
        <link href="../css/municipio1.css" rel="stylesheet"/>
        <link href="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet"/>
        <style>
            
            /* Smartphones*/
            @media (max-width:767px)
            {
                #boletines_informativos div div div figure figcaption { margin-bottom: 15px;}
            }
            
            /* Desktops Medium*/
            @media (min-width:992px)
            {
                #boletines_informativos div div div figure img { margin-top: 65px;}
            }
            /* Desktops Large*/
            @media (min-width:1200px)
            {
                #boletines_informativos div div div figure img { margin-top: 80px;}
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php require_once 'include_header.php'; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 titulo_principal titulo_secundario">
                            <p class="to_uppercase">Boletines inform<span>ativos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            <h1>AL CIUDADANO</h1>
                            <h1 class="mes_anio"><?php echo(($mtz_meses[(int) date("m") - 1]) . " " . $anio); ?></h1>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="row redes_sociales">
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <img src="../img/youtube_circular.jpg" alt="Youtube" />
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-8">
                                            <p>Youtube</p>
                                            <p>Observa nuestros vídeos</p>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="col-sm-4 col-md-4">                            
                                    <div class="row redes_sociales">
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <img src="../img/facebook_circular.jpg" alt="Facebook"/>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-8" >
                                            <p>Facebook</p>
                                            <p>Síguenos</p>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-4 col-md-4">                            
                                    <div class="row redes_sociales">
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <img src="../img/twitter_circular.jpg" alt="Twitter"/>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-8">
                                            <p>Twitter</p>
                                            <p>Escríbenos</p>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 border_top">
                    <div class="row" id="boletines_informativos">
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <figure>
                                        <img src="../img/boletin/5.jpg" alt="IMPLEMENTAN EN MACUSPANA OPERATIVO 'CONDUCE SIN ALCOHOL' BAJO LA COORDINACION DE LA POLICIA ESTATAL DE CAMINOS CON SEGURIDAD PUBLICA Y TRANSITO MUNICIPAL." class="img-responsive"/>
                                        <figcaption>06 Febrero 2016</figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">
                                    <p class="text-justify"><strong>IMPLEMENTAN EN MACUSPANA OPERATIVO "CONDUCE SIN ALCOHOL" BAJO LA COORDINACION DE LA POLICIA ESTATAL DE CAMINOS CON SEGURIDAD PUBLICA Y TRANSITO MUNICIPAL.</strong> </p>
                                    <p class="text-justify">A partir de las 6 de la tarde del viernes, enfrente del edificio del Palacio Municipal, arrancó el operativo "Conduce sin alcohol" dirigido por la Policía Estatal de Caminos en coordinación con las direcciones municipales de Seguridad Pública y Tránsito, como parte ...</p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_5.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5 ">
                                    <figure>
                                        <img src="../img/boletin/1.jpg" alt="EL GOBIERNO MUNICIPAL DE MACUSPANA FOMENTA EL DEPORTE CIENCIA" class="img-responsive"/>
                                        <figcaption>16 Enero 2016</figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">
                                    <p class="text-justify"><strong>EL GOBIERNO MUNICIPAL DE MACUSPANA FOMENTA EL DEPORTE CIENCIA</strong> </p>
                                    <p class="text-justify">Con la presencia de la señora Crystel Hernández de Rovirosa, presidenta del DIF municipal, hoy sábado se realizó el “Torneo Estatal de Invierno de Ajedrez “en diferentes categorías, donde se contó con la participación de sesenta ajedrecistas de toda la entidad, los cuales lograron demostrar sus conocimientos y destrezas en el también llamado deporte ciencia.</p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_1.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="clearfix visible-md-block visible-lg-block"></div>
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <figure>
                                        <img src="../img/boletin/2.png" alt="15 DIAS DE ACTIVIDADES DEL PRESIDENTE MUNICIPAL JOSE EDUARDO 'CUCO' ROVIROSA RAMIREZ" class="img-responsive"/>
                                        <figcaption>16 Enero 2016</figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">
                                    <p class="text-justify"><strong>15 DIAS DE ACTIVIDADES DEL PRESIDENTE MUNICIPAL JOSE EDUARDO “CUCO” ROVIROSA RAMIREZ</strong></p>
                                    <p class="text-justify"> “Estoy comprometido a que mi gobierno sea de intensa y estrecha comunicación con el pueblo, por lo cual estaré informando puntualmente de todas y cada una de las acciones emprendidas para cambiarle el rostro a Macuspana, para responder a esa confianza y apoyo que he encontrado en la sociedad, la cual se encontraba muy agraviada por...</p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_2.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <figure>
                                        <img src="../img/boletin/3.jpg" alt="PROMUEVE GOBIERNO DE MACUSPANA REFORZAMIENTO DE LA CULTURA DE LA SEGURIDAD Y EL RESPETO A LA LEY DE TRANSITO Y VIALIDAD" class="img-responsive"/>
                                        <figcaption>18 Enero 2016</figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">                                    
                                    <p class="text-justify"><strong>PROMUEVE GOBIERNO DE MACUSPANA REFORZAMIENTO DE LA CULTURA DE LA SEGURIDAD Y EL RESPETO A LA LEY DE TRANSITO Y VIALIDAD</strong></p>
                                    <p class="text-justify">Con el fin de brindar una mayor protección y seguridad a la ciudadanía, el Ayuntamiento de Macuspana, a través de la dirección de Tránsito Municipal, que dirige Felicito Cruz Jiménez, informa a la población en general que a partir del 1 de febrero del presente año, iniciarán los operativos de tránsito vial en... </p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_3.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="clearfix visible-md-block visible-lg-block"></div>
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <figure>
                                        <img src="../img/boletin/4.jpg" alt="RESTABLECIMIENTO DE SERVICIOS MUNICIPALES, BACHEO Y AGUA DE CALIDAD PARA LA POBLACIÓN" class="img-responsive"/>
                                        <figcaption>31 Diciembre 2015</figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">                                    
                                    <p class="text-justify"><strong>RESTABLECIMIENTO DE SERVICIOS MUNICIPALES, BACHEO Y AGUA DE CALIDAD PARA LA POBLACIÓN</strong></p>
                                    <p class="text-justify">Ante el colapso de los servicios municipales por el conflicto laboral de trabajadores del Ayuntamiento durante las últimas semanas, luego de tomar protesta como presidente municipal constitucional, José Eduardo “Cuco” Rovirosa Ramírez, se comprometió a reactivar en los inmediato el suministro de agua potable de calidad, la recolección de la basura...</p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_4.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>
                        </div>
                        <!--  Espacio para cuando haya otro boletin -->
                        <!--
                        <div class="col-md-6 col-lg-6 top-buffer">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <img src="../img/boletin/3.jpg" alt="Boletin3" class="img-responsive"/>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">                                    
                                    <p class="text-justify"><strong>PROMUEVE GOBIERNO DE MACUSPANA REFORZAMIENTO DE LA CULTURA DE LA SEGURIDAD Y EL RESPETO A LA LEY DE TRANSITO Y VIALIDAD </strong></p>
                                    <p class="text-justify">Con el fin de brindar una mayor protección y seguridad a la ciudadanía, el Ayuntamiento de Macuspana, a través de la dirección de Tránsito Municipal, que dirige Felicito Cruz Jiménez, informa a la población en general que a partir del 1 de febrero del presente año, iniciarán los operativos de tránsito vial en... </p>
                                    <a href="javascript:void(0);" data-toggle="modal" data-remote="../php/boletin_informativo_3.php?o=<?php echo($origin); ?>" data-target="#mDetalleBoletin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Leer más</a>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="clearfix visible-md-block visible-lg-block"></div>
                        -->
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="row banners">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 top-buffer">
                            <img src="../img/sala_prensa/btn_comunicados.jpg" alt="Comunicados" class="img-responsive"/>
                        </div>
                        <div class="clearfix visible-xs-block visible-lg-block"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 top-buffer">
                            <img src="../img/sala_prensa/btn_avisos_importantes.jpg" alt="Avisos importantes" class="img-responsive"/>
                        </div>
                        <div class="clearfix visible-xs-block visible-lg-block"></div>
                        <div class="clearfix visible-sm-block visible-md-block"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top-buffer datepicker">
                            <div id="datepicker"></div>
                        </div>
                        <div class="clearfix visible-xs-block visible-lg-block"></div>
                    </div>
                </div>
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
            <?php require_once 'include_footer.php'; ?>
        </div>
        <script src="../js/jQuery/jquery-1.11.3.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.4/ui/i18n/datepicker-es.js"></script>
        <script src="../twbs/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpdw9gyXrQvIvyLrVi9FneyumQOE8_9CA&sensor=true"></script>
        <script src="../js/maps.js" data-name="map" id="map"></script>
        <script>
            $(document).ready(function () {

                $("#datepicker").datepicker({yearRange: "-0:+10", changeMonth: true, changeYear: true});
                $.datepicker.setDefaults($.datepicker.regional[ "es-MX" ]);

                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
        </script>
    </body>
</html>