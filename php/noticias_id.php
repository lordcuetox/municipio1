<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Noticia.php';
$noticia = "";
$sql = "";
$msg = "";

if (isset($_GET['id'])) {
    $noticia = new Noticia((int) $_GET['id']);
} else {
    $noticia = new Noticia();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}

if ($noticia->getCveNoticia() > 0) {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo($noticia->getTitulo()); ?></h4>
    </div>
    <div class="modal-body">
        <div class="te">
            <div id="carousel-noticias-msf" class="carousel slide" data-ride="carousel">


                <?php
                if ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "" && $noticia->getFoto2() != "" && $noticia->getFoto3() != "") {
                    ?>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-noticias-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-noticias-msf" data-slide-to="1"></li>
                        <li data-target="#carousel-noticias-msf" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($noticia->getFoto1()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($noticia->getFoto2()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($noticia->getFoto3()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 3">
                        </div>
                    </div>    
                    <?php
                } elseif ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "" && $noticia->getFoto2() != "" && $noticia->getFoto3() != "") {
                    ?>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-noticias-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-noticias-msf" data-slide-to="1"></li>
                        <li data-target="#carousel-noticias-msf" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($noticia->getFoto1()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($noticia->getFoto2()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($noticia->getFoto3()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 3">
                        </div>
                    </div>    
                    <?php
                } elseif ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "" && $noticia->getFoto2() != "") {
                    ?>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-noticias-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-noticias-msf" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($noticia->getFoto1()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($noticia->getFoto2()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 2">
                        </div>
                    </div>
                    <?php
                } elseif ($noticia->getFotoPortada() != "" && $noticia->getFoto1() != "") {
                    ?>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($noticia->getFoto1()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 1">
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($noticia->getFotoPortada()); ?>" alt="<?php echo($noticia->getTitulo()); ?> - Imagen 1">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- SI AL MENOS TIENE 2 IMAGENES QUE MUESTRE LOS CONTROLES DE NAVEGACION ATRAS Y ADELANTE -->
                <?php if ($noticia->getFoto1() != "" && $noticia->getFoto2() != "") { ?>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-noticias-msf" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-noticias-msf" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php } ?>
            </div>
            <br/>
            <p class="negritas">Descripción:</p>
            <?php echo($noticia->getNoticia()); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    <?php
} else {
    ?>    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Aviso importante</h4>
    </div>
    <div class="modal-body">
        <div class="te"><?php echo($msg); ?></div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    <?php
}
?>