<?php
$path = "";

if (isset($origin) && $origin != "") {
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
<div class="row" id="menu_principal">
    <div class="col-sm-2 col-md-2">
        <div class="visible-lg"><a href="<?php echo($origin == "" ? "index.php" : "../index.php"); ?>"><img src="<?php echo($path); ?>img/Logo.png" alt="Logo H. Ayuntamiento de Macuspana 2016-2018" style="margin:40px 0px 20px 20px; width: 122px; height: 121px"/></a></div>
        <br class="visible-md visible-sm"/>
        <div class="visible-md visible-sm"><a href="<?php echo($origin == "" ? "index.php" : "../index.php"); ?>"><img src="<?php echo($path); ?>img/Logo.png" alt="Logo H. Ayuntamiento de Macuspana 2016-2018" style="margin:40px 0px 20px 20px; width: 122px; height: 121px"/></a></div>
        <div class="visible-xs"><a href="<?php echo($origin == "" ? "index.php" : "../index.php"); ?>"><img src="<?php echo($path); ?>img/Logo.png" alt="Logo H. Ayuntamiento de Macuspana 2016-2018" class="img-responsive" style="margin:40px auto;"/></a></div>
    </div>
    <div class="col-sm-10 col-md-10">
        <div class="row">
            <div class="col-md-12 text-right" style="margin-top: 100px ">
                <a href="https://www.youtube.com" target="_blank"><img src="<?php echo($path); ?>Recursos/youtube-icon.png" alt="Youtube"/></a>&nbsp;&nbsp;
                <a href="https://www.facebook.com/profile.php?id=100011023263491" target="_blank"><img src="<?php echo($path); ?>Recursos/facebook-icon.png" alt="Facebook"/></a>&nbsp;&nbsp;
                <a href="https://twitter.com/A_Macuspana?lang=es" target="_blank"><img src="<?php echo($path); ?>Recursos/twitter-icon.png" alt="Twitter"/></a>
            </div>
            <div class="col-md-12" >
                <nav class="navbar navbar-default" >
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav" >
                                <li  <?php echo($origin == "" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "index.php" : "../index.php"); ?>">Inicio</a></li>
                                <li <?php echo($origin == "presidencia" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>presidencia.php">Presidencia</a></li>
                                <li <?php echo($origin == "ayuntamiento" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>ayuntamiento.php">H. Ayuntamiento</a></li>
                                <li <?php echo($origin == "dependencias" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>dependencias.php">Dependencias</a></li>
                                <li <?php echo($origin == "tramites" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>tramites.php">Trámites</a></li>
                                <li <?php echo($origin == "sala_prensa" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>sala_prensa.php">Sala de prensa</a></li>
                                <li <?php echo($origin == "transparencia" ? "class=\"active\"" : ""); ?>><a href="<?php echo($origin == "" ? "php/" : ""); ?>transparencia.php">Transparencia</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>