<?php
$path = "";

if(isset($origin) && $origin != "")
{
    $path = "../";
}
?>
<div class="row top-buffer" id="contacto" >
    <div class="col-md-12">
        <h1 class="visible-md visible-lg"> <img src="<?php echo($path);?>img/titulo_mapa.png" alt="" class="img-responsive"/></h1>
        <h2 class="visible-xs visible-sm text-center"><img src="<?php echo($path);?>Recursos/titulo_mapa.png" alt="" class="img-responsive"/></h2>
    </div>
    <div class="col-md-12">
        <div id="google_maps">Cargando Google Maps ...</div>
    </div>
    <div class="col-sm-2 col-md-2">
        <img src="<?php echo($path);?>img/logoEscudo.png" alt="Gobierno del Estado de Tabasco"/>
    </div>
    <div class="col-sm-10 col-md-5">
        <ul>
            <li style="list-style-image: url( <?php echo($path);?>img/direccion_ico.png)">Dirección: Plaza de La Constitución, Centro, C.P. 86706, Macuspana, Tabasco.</li>
            <li style="list-style-image: url( <?php echo($path);?>img/telefono_ico.png)">Teléfono: 01-936-362-0521</li>
        </ul>
    </div>
    
    <div class="clearfix visible-md-block"></div>
</div>
<footer>
    <div class="row top-buffer">
        <div class="col-md-12">
            <p class="text-center">Todos los derechos reservados H. Ayuntamiento de Macuspana, Tabasco, México. Administración 2016-2018</p>
        </div>
    </div>
</footer>