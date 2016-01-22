<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Evento.php';
$evento = "";
$sql = "";
$msg = "";

if (isset($_GET['id'])) {
    $evento = new Evento((int) $_GET['id']);
} else {
    $evento = new Evento();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}

if ($evento->getCveEvento() > 0) {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo($evento->getNombre()); ?></h4>
    </div>
    <div class="modal-body">
        <div class="te">
            <div id="carousel-eventos-msf" class="carousel slide" data-ride="carousel">


                <?php
                if ($evento->getFotoPrincipal() != "" && $evento->getFoto1() != "" && $evento->getFoto2() != "" && $evento->getFoto3() != "" && $evento->getFoto4() != "") {
                    ?>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-eventos-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="1"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="2"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($evento->getFoto1()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto2()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto3()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 3">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto4()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 4">
                        </div>
                    </div>    
                    <?php
                } elseif ($evento->getFotoPrincipal() != "" && $evento->getFoto1() != "" && $evento->getFoto2() != "" && $evento->getFoto3() != "") {
                    ?>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-eventos-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="1"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($evento->getFoto1()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto2()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto3()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 3">
                        </div>
                    </div>    
                    <?php
                } elseif ($evento->getFotoPrincipal() != "" && $evento->getFoto1() != "" && $evento->getFoto2() != "") {
                    ?>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-eventos-msf" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-eventos-msf" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($evento->getFoto1()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                        <div class="item">
                            <img src="<?php echo($evento->getFoto2()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 2">
                        </div>
                    </div>
                    <?php
                } elseif ($evento->getFotoPrincipal() != "" && $evento->getFoto1() != "") {
                    ?>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($evento->getFoto1()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 1">
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo($evento->getFotoPrincipal()); ?>" alt="<?php echo($evento->getNombre()); ?> - Imagen 1">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- SI AL MENOS TIENE 2 IMAGENES QUE MUESTRE LOS CONTROLES DE NAVEGACION ATRAS Y ADELANTE -->
                <?php if ($evento->getFoto1() != "" && $evento->getFoto2() != "") { ?>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-eventos-msf" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-eventos-msf" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php } ?>
            </div>
            <br/>
            <p class="negritas">Descripción:</p>
            <p><?php echo($evento->getDescripcion()); ?></p>
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