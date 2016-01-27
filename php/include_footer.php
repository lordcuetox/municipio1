<?php
$path = "";

if(isset($origin) && $origin != "")
{
    $path = "../";
}
?>
<div class="row top-buffer" id="contacto">
    <div class="col-md-12">
        <span class="visible-md visible-lg"> <img src="<?php echo($path);?>img/titulo_mapa.png" alt="" class="img-responsive"/></span>
        <span class="visible-xs visible-sm text-center"><img src="<?php echo($path);?>Recursos/titulo_mapa.png" alt="" class="img-responsive"/></span>
    </div>
    <div class="clearfix visible-md-block"></div>
    <div class="col-md-12">
        <div id="google_maps">Cargando Google Maps ...</div>
    </div>
    <div class="clearfix visible-md-block"></div>
    <div class="col-md-12">
    <div class="row top-buffer" style="background-color:#3B3B3B">
        <div class="col-md-3 text-left" >
            <img src="<?php echo($path);?>Recursos/Archivo comprimido/logo_indferior.png" alt="H. Ayuntamiento de Macuspana 2016-2018"/>
        </div>
        <div class="col-md-3">
            <ul style=" list-style: none;text-transform: uppercase; color:#FFFEFF;">
                <li><a href="<?php echo($origin == "" ? "index.php" : "../index.php"); ?>">Inicio</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>presidencia.php">Presidencia</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>ayuntamiento.php">H. Ayuntamiento</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>dependencias.php">Dependencias</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>tramites.php">Trámites</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>sala_prensa.php">Sala de prensa</a></li>
                <li><a href="<?php echo($origin == "" ? "php/" : ""); ?>transparencia.php">Transparencia</a></li>
            </ul>
        </div>
        <div class="col-md-3" style="color:#FFFEFF">
            <p>Dirección: Plaza de La Constitución, Centro, C.P. 86706, Macuspana, Tabasco.</p>
            <p>Teléfono: 01-936-362-0521</p>
            <p>Correo electrónico: Por definir</p>
        </div>
        <div class="col-md-3 text-right">
            <img src="<?php echo($path);?>Recursos/Archivo comprimido 2 Macusp/logo_gobtab.png" alt="Gobierno del Estado de Tabasco" />
        </div>
        <div class="clearfix visible-md-block"></div>
    </div>
    </div>
</div>
<footer>
    <div class="row top-buffer" >
        <div class="col-md-12">
            <p class="text-center" style="background-color:#A6A4A5; color:#FFFEFF; height: 52px; padding-top: 15px;">Todos los derechos reservados H. Ayuntamiento de Macuspana, Tabasco, México. Administración 2016-2018</p>
        </div>
    </div>
</footer>