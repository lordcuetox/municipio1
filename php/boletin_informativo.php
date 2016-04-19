<?php
require_once '../clases/Noticia.php';
$noticia = "";
$msg = "";
$origin = "sala_prensa";

if (isset($_GET['id'])) {
    $noticia = new Noticia((int) $_GET['id']);
} else {
    $noticia = new Noticia();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sitio oficial del H. Ayuntamiento de Macuspana 2016-2018 | Boletín informativo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="gobierno, macuspana, 2016,2018, ayuntamiento" />
        <meta name="description" content="Sitio oficial del H. Ayuntamiento de Macuspana, Tabasco. Boletín informativo" />
        <!-- IE --> 
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
        <link href="../twbs/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/twbscolor2.css" rel="stylesheet"/>
        <link href="../css/municipio1.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <?php require_once 'include_header.php'; ?>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                    <?php
                    if ($noticia->getCveNoticia() > 0) {
                        ?>
                        <h1 class="text-center"><?php echo($noticia->getTitulo()); ?></h1>
                        <div id="carousel-noticias-macuspana" class="carousel slide" data-ride="carousel">
                            <?php
                            if ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "" && $noticia->getFoto2() != "" && $noticia->getFoto3() != "") {
                                ?>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="1"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="2"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../<?php echo($noticia->getFotoPortada()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Foto de portada">
                                    </div>
                                    <div class="item">
                                        <img src="../<?php echo($noticia->getFoto1()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 1">
                                    </div>
                                    <div class="item">
                                        <img src="../<?php echo($noticia->getFoto2()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 2">
                                    </div>
                                    <div class="item">
                                        <img src="../<?php echo($noticia->getFoto3()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 3">
                                    </div>
                                </div>    
                                <?php
                            } elseif ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "" && $noticia->getFoto2() != "") {
                                ?>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="1"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../<?php echo($noticia->getFotoPortada()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Foto de portada">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo($noticia->getFoto1()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 2">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo($noticia->getFoto2()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 2">
                                    </div>
                                </div>
                                <?php
                            } elseif ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "") {
                                ?>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-noticias-macuspana" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../<?php echo($noticia->getFotoPortada()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Foto de portada">
                                    </div>
                                    <div class="item">
                                        <img src="../<?php echo($noticia->getFoto1()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Imagen 1">
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../<?php echo($noticia->getFotoPortada()); ?>" alt="<?php echo(str_replace('"', "'", $noticia->getTitulo())); ?> - Foto portada">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- SI AL MENOS TIENE 2 IMAGENES QUE MUESTRE LOS CONTROLES DE NAVEGACION ATRAS Y ADELANTE -->
                            <?php if ($noticia->getFoto1() != "" && $noticia->getFoto2() != "") { ?>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-noticias-macuspana" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-noticias-macuspana" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            <?php } ?>
                        </div><br/>
                        <?php echo($noticia->getNoticia()); ?>
                        <?php
                    } else {
                        ?>
                        <h1 class="text-center">No hay datos para el boletín informativo</h1>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php require_once 'include_footer.php'; ?>
        </div>
        <script src="../js/jQuery/jquery-1.11.3.min.js"></script>
        <script src="../twbs/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpdw9gyXrQvIvyLrVi9FneyumQOE8_9CA&sensor=true"></script>
        <script src="../js/maps.js" data-name="map" id="map"></script>
    </body>
</html>