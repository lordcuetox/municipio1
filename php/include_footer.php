<?php
$path = "";

if(isset($origin) && $origin != "")
{
    $path = "../";
}
?>
<div class="row top-buffer" id="contacto">
    <div class="col-md-12">
        <h1 class="visible-md visible-lg"> <img src="Recursos/titulo_mapa.png" alt="" class="img-responsive"/></h1>
        <h2 class="visible-xs visible-sm text-center"><img src="Recursos/titulo_mapa.png" alt="" class="img-responsive"/></h2>
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
    <div class="col-sm-12 col-md-5">
        <div id="google_maps">Cargando Google Maps ...</div>
    </div>
    <div class="clearfix visible-md-block"></div>
</div>
<footer>
    <div class="row top-buffer">
        <div class="col-md-12">
            <p class="text-center">Copyright <?php echo date("Y"); ?> &copy; H. Ayuntamiento de Macuspana</p>
        </div>
    </div>
</footer>