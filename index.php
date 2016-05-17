<?php
$origin = "";
require_once 'clases/UtilDB.php';
require_once 'php/contador_visitas.php';
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
            <?php require_once 'php/include_header.php';?>
            <div class="row top-buffer" >
                <div class="col-md-12">
                    <div id="macuspana_layerslider">
                        <?php
                        $sql = "SELECT * FROM eventos WHERE foto1 IS NOT NULL AND activo = 1 ORDER BY cve_evento DESC";
                        $rst = UtilDB::ejecutaConsulta($sql);
                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                                $html .="<div class = \"ls-slide\">";
                                if($row['foto1'] != "") { $html .="<img src =\"".$row['foto1']."\" alt =\"".$row['nombre']."\" class = \"ls-bg\"/>"; }
                                if($row['foto2'] != "") { $html .="<img src =\"".$row['foto2']."\" alt =\"sublayer 1\" class = \"ls-l\" data-ls = \"".$row['data_ls1']."\"/>";}
                                if($row['foto3'] != "") { $html .="<img src =\"".$row['foto3']."\" alt = \"sublayer 2\" class =\"ls-l\" data-ls = \"".$row['data_ls2']."\"  ".($row['pdf'] != "" ? "onclick=\"window.open('".$row['pdf']."', '_blank')\" style=\"cursor: pointer;\" ":($row['link'] != "" ? ("onclick=\"window.open('".$row['link']."', '_blank')\" style=\"cursor: pointer;\" "):""))."/>";}
                                if($row['foto4'] != "") { $html .="<img src =\"".$row['foto4']."\" alt = \"sublayer 3\" class =\"ls-l\" data-ls = \"".$row['data_ls3']."\" ".($row['pdf'] != "" ? "onclick=\"window.open('".$row['pdf']."', '_blank')\" style=\"cursor: pointer;\" ":($row['link'] != "" ? ("onclick=\"window.open('".$row['link']."', '_blank')\" style=\"cursor: pointer;\" "):""))."/>";}
                                $html .="</div>";
                            }

                            $rst->closeCursor();
                            echo($html);
                            $html = "";
                        } else {
                            echo("No hay eventos publicados");
                        }
                        ?>
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
                        $html .= "<img src = \"" . $row['foto_portada'] . "\" alt = \"" . $row['titulo'] . "\" class = \"img-responsive\"/><br/>";
                        $html .= "<p class = \"text-justify\"><strong>" . $row['titulo'] . "</strong> </p>";
                        $html .= "<p class = \"text-justify\">" . $row['noticia_corta'] . "</p>";
                        //$html .= "<a href = \"javascript:void(0);\" data-toggle = \"modal\" data-remote = \"php/noticias_id.php?id=".$row['cve_noticia']."\" data-target = \"#mDetalleBoletin\" class = \"btn btn-success\"><span class = \"glyphicon glyphicon-plus\"></span> Leer más</a>";
                        $html .= "<a href = \"php/boletin_informativo.php?id=" . $row['cve_noticia'] . "\" class = \"btn btn-success\"><span class = \"glyphicon glyphicon-plus\"></span> Leer más</a>";
                        $html .= "</div>";

                        if ($count % 2 == 0) {
                            $html .= "<div class=\"clearfix visible-sm-block\"></div>";
                        } else if ($count % 3 == 0) {
                            $html .= "<div class=\"clearfix visible-md-block\"></div>";
                        } else if ($count % 4 == 0) {
                            $html .= "<div class=\"clearfix visible-lg-block\"></div>";
                        }

                        $count++;
                    }
                } else {
                    $html .= "<div class=\"col-md-12 top-buffer text-center\"><h1>No hay noticias cargadas por el momento</h1></div>";
                }
                $rst->closeCursor();
                $count = 0;
                echo($html);
                ?>                
            </div>
            <div class="row top-buffer" id="banners">
                <div class="col-sm-12 col-md-12" style="margin-bottom:20px;">
                    <div class="col-sm-6 col-md-6"><img src="img/videoteca.gif"  alt="" class="img-responsive"/></div>
                    <div class="col-sm-6 col-md-6"><img src="img/galeria.gif" alt="" class="img-responsive"/></div>
                </div>
                <div class="clearfix visible-md-block"></div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-xs-6 col-sm-3 col-md-3 ">
                    <!--<img src="Recursos/SINHAMBRE.png" alt="" class="img-responsive"/>-->
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