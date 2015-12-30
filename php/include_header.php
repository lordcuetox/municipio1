<?php
$path = "";

if(isset($origin) && $origin != "")
{
    $path = "../";
}
?>
<!--<div class="row">
    <div class="col-md-12 text-center">
        <div class="visible-xs">Extra small devices</div>
        <div class="visible-sm">Small devices</div>
        <div class="visible-md">Medium devices</div>
        <div class="visible-lg">Large devices</div>
    </div>
</div>-->
<div class="row">
    <div class="col-sm-2 col-md-2">
        <img src="<?php echo($path);?>img/Logo.gif" alt="Logo H. Ayuntamiento de Macuspana 2016-2018" class="img-responsive"/>
    </div>
    <div class="col-sm-10 col-md-10">
        <div class="row">
            <div class="col-md-12 visible-lg">&nbsp;</div>
            <div class="col-md-12 visible-lg">&nbsp;</div>
            <div class="col-md-12 text-right">
                <a href="#"><img src="<?php echo($path);?>img/rsociales/youtube.png" alt="Youtube"/></a>&nbsp;&nbsp;
                <a href="#"><img src="<?php echo($path);?>img/rsociales/facebook.png" alt="Facebook"/></a>&nbsp;&nbsp;
                <a href="#"><img src="<?php echo($path);?>img/rsociales/instagram.png" alt="Instagram"/></a>&nbsp;&nbsp;
                <a href="#"><img src="<?php echo($path);?>img/rsociales/twitter.png" alt="Twitter"/></a>
            </div>
            <div class="col-md-12 visible-lg">&nbsp;</div>
            <div class="col-md-12 visible-lg">&nbsp;</div>
            <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li <?php echo($origin == "" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "index.php":"../index.php");?>">Inicio</a></li>
                                <li <?php echo($origin == "presidencia" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>presidencia.php">Presidencia</a></li>
                                <li <?php echo($origin == "ayuntamiento" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>ayuntamiento.php">H. Ayuntamiento</a></li>
                                <li <?php echo($origin == "dependencias" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>dependencias.php">Dependencias</a></li>
                                <li <?php echo($origin == "tramites" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>tramites.php">Trámites</a></li>
                                <li <?php echo($origin == "sala_prensa" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>sala_prensa.php">Sala de prensa</a></li>
                                <li <?php echo($origin == "transparencia" ? "class=\"active\"":"");?>><a href="<?php echo($origin == "" ? "php/":"");?>transparencia.php">Transparencia</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--            
            <div class="row">
                <div class="col-md-2">
                    <img src="img/Logo.gif" alt="" class="img-responsive"/>
                </div>
                <div class="col-md-10 text-right ">
                    <a href="#"><img src="img/rsociales/youtube.png" alt="Youtube"/></a>
                    <a href="#"><img src="img/rsociales/facebook.png" alt="Facebook"/></a>
                    <a href="#"><img src="img/rsociales/instagram.png" alt="Instagram"/></a>
                    <a href="#"><img src="img/rsociales/twitter.png" alt="Twitter"/></a>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.php">Inicio</a></li>
                                    <li><a href="#">Presidencia</a></li>
                                    <li><a href="#">H. Ayuntamiento</a></li>
                                    <li><a href="#">Dependencias</a></li>
                                    <li><a href="#">Trámites</a></li>
                                    <li><a href="#">Sala de prensa</a></li>
                                    <li><a href="#">Transparencia</a></li>
                                </ul>
                            </div>
                            
                        </div>
                       
                    </nav>
                </div>
            </div>
-->