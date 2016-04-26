<?php
$origen = $_GET['q'];
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="cat_noticias.php">H. Ayuntamiento de Macuspana 2016-2018 | Usuario en sesión: <span class="fa fa-user"></span>&nbsp;&nbsp;<?php echo(isset($_SESSION['nombre']) ? $_SESSION['nombre']:"");?></a>
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <!--<a href="cat_noticias.php" <?php echo(($origen == "noticias") ? "class=\"active\"" : ""); ?>><i class="fa fa-newspaper-o"></i> Boletines</a>-->
                    <!--<a href="cat_eventos.php" <?php echo(($origen == "eventos") ? "class=\"active\"" : ""); ?>><i class="fa fa-thumb-tack"></i> Eventos</a>-->
                    <a href="cat_documentacion.php" <?php echo(($origen == "transparencia") ? "class=\"active\"" : ""); ?>><i class="fa fa-eye"></i> Transparencia</a>
                    <a href="cat_reaton.php" <?php echo(($origen == "reaton") ? "class=\"active\"" : ""); ?>><i class="fa fa-key"></i> Usuario y Contraseña</a>
                    <a href="javascript:void(0);" onclick="logout();"><i class="fa fa-sign-out"></i> CERRAR SESIÓN</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>