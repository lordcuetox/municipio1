<?php
require_once '../clases/UtilDB.php';

$html = "";
$cve_articulo = (isset($_GET['CVE_ARTICULO']) ? ((int) $_GET['CVE_ARTICULO']) : 0);
$cve_fraccion = (isset($_GET['CVE_FRACCION']) ? ((int) $_GET['CVE_FRACCION']) : 0);
$cve_inciso = (isset($_GET['CVE_INCISO']) ? ((int) $_GET['CVE_INCISO']) : 0);
$cve_apartado = (isset($_GET['CVE_APARTADO']) ? ((int) $_GET['CVE_APARTADO']) : 0);
$cve_clasificacion_apartado = (isset($_GET['CVE_CLASIFICACION_APARTADO']) ? ((int) $_GET['CVE_CLASIFICACION_APARTADO']) : 0);
$anio = (isset($_GET['ANIO']) ? ((int) $_GET['ANIO']) : 0);
$trimestre = (isset($_GET['TRIMESTRE']) ? ((int) $_GET['TRIMESTRE']) : 0);

$sql = "SELECT * FROM DOCUMENTACION_TRANSPARENCIA WHERE CVE_ARTICULO = $cve_articulo , CVE_FRACCION = $cve_fraccion,CVE_INCISO = $cve_inciso , CVE_APARTADO = $cve_apartado,CVE_CLASIFICACION_APARTADO = $cve_clasificacion_apartado,ANIO = $anio,TRIMESTRE = $trimestre";
$rst = UtilDB::ejecutaConsulta($sql);

if ($rst->columnCount() > 0) {

    $html .= "<ul>";
    foreach ($rst as $row) {
        $html .= "<li><a href=\"../".$row['pdf']."\" target=\"_blank\">".$row['descripcion']."</a></li>";
    }
    $html .= "</ul>";
    $rst->closeCursor();
} else {
    $html .= "<p>No hay datos cargados por el momento ...</p>";
}
echo($html);