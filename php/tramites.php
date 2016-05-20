<?php
$origin = "tramites";
require_once '../clases/UtilDB.php';
require_once 'contador_visitas.php';
$sql = "";
$rst = NULL;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sitio oficial del H. Ayuntamiento de Macuspana 2016-2018 | Trámites y servicios al ciudadano</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="gobierno, macuspana, 2016,2018, ayuntamiento" />
        <meta name="description" content="Sitio oficial del H. Ayuntamiento de Macuspana, Tabasco. Trámites y servicios al ciudadano" />
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
        <link href="../twbs/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/twbscolor2.css" rel="stylesheet"/>
        <link href="../css/municipio1.css" rel="stylesheet"/>
        <link href="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <?php require_once 'include_header.php'; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 titulo_principal titulo_secundario">
                            <p class="to_uppercase">Trámites y servic<span>ios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            <h1>AL CIUDADANO</h1>
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
                    <div class="row">
                        <?php
                         $sql = "SELECT * FROM clasificaciones_tramites WHERE activo = 1";
                         $rst = UtilDB::ejecutaConsulta($sql);
                         foreach ($rst as $row) 
                         {
                            echo("<div class=\"col-md-4\"><span><a href=\"javascript:void(0);\" onclick=\"cargarTiposTramites(".$row['cve_clasificacion_tramite'].")\" \">".$row['nombre']."</a></span></div>"); 
                         }   
                         $rst->closeCursor();
                        ?>
                    </div>
                    <div class="row" id="tipos_tramite_ajax">&nbsp;</div>
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
                    <div class="col-sm-12">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            var url = "tramites_ajax.php";
            
            $(document).ready(function () {

                $("#datepicker").datepicker({yearRange: "-0:+10", changeMonth: true, changeYear: true});
                $.datepicker.setDefaults($.datepicker.regional[ "es-MX" ]);
                
                /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });
                
                cargarTiposTramites(1);

            });
            
            function cargarTiposTramites(xCveClasificacionTramite)
            {   $("#tipos_tramite_ajax").html("<img src=\"../img/ajax-loading.gif\" alt=\"Cargando\"/> Cargando ...");
                $("#tipos_tramite_ajax").load(url,{"xAccion":"getTiposTramites","xCveClasificacionTramite":xCveClasificacionTramite});                
            }
            
            function getTramites(xCveCategoriaTramite)
            {
                $("#tramites_ajax").html("<img src=\"../img/ajax-loading.gif\" alt=\"Cargando\"/> Cargando ...");
                $("#tramites_ajax").load(url,{"xAccion":"getTramites","xCveCategoriaTramite":xCveCategoriaTramite});  
            }
        </script>
    </body>
</html>