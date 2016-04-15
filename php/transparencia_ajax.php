<?php
require_once '../clases/UtilDB.php';

$html = "";
$table = "";
$cve_articulo = (isset($_GET['CVE_ARTICULO']) ? ((int) $_GET['CVE_ARTICULO']) : 0);
$cve_fraccion = (isset($_GET['CVE_FRACCION']) ? ((int) $_GET['CVE_FRACCION']) : 0);
$cve_inciso = (isset($_GET['CVE_INCISO']) ? ((int) $_GET['CVE_INCISO']) : 0);
$cve_apartado = (isset($_GET['CVE_APARTADO']) ? ((int) $_GET['CVE_APARTADO']) : 0);
$cve_clasificacion_apartado = (isset($_GET['CVE_CLASIFICACION_APARTADO']) ? ((int) $_GET['CVE_CLASIFICACION_APARTADO']) : 0);
$anio = (isset($_GET['ANIO']) ? ((int) $_GET['ANIO']) : 0);
$trimestre = (isset($_GET['TRIMESTRE']) ? ((int) $_GET['TRIMESTRE']) : 0);
$esSolicitud = (isset($_GET['SOLICITUD']) ? ((int) $_GET['SOLICITUD']) : 0);
$sql = "SELECT * FROM documentacion_transparencia WHERE cve_articulo = $cve_articulo AND cve_fraccion ".($cve_fraccion == 0 ? "IS NULL ":" = $cve_fraccion")." AND cve_inciso ".($cve_inciso == 0 ? "IS NULL ":" = $cve_inciso")." AND cve_apartado ".($cve_apartado == 0 ? "IS NULL ":" = $cve_apartado")." AND cve_clasificacion_apartado ".($cve_clasificacion_apartado == 0 ? " IS NULL":" = $cve_clasificacion_apartado")." AND anio = $anio AND trimestre = $trimestre AND solicitud = $esSolicitud";
$rst = UtilDB::ejecutaConsulta($sql);

if ($rst->rowCount() > 0) {
    $html .= "<ul>";
    
    $table.= "<table class=\"table table-bordered table-striped table-hover table-responsive text-center\">";
    $table .= "<thead>";
    $table .= "<tr>";
    $table .= "<th>Expediente</th>";
    $table .= "<th>Folio</th>";
    $table .= "<th>Solicitud</th>";
    $table .= "<th>Respuesta</th>";
    $table .= "<th>Anexo</th>";
    $table .= "</tr>"; 
    $table .= "</thead>";
    $table .= "<tbody>";
    
    foreach ($rst as $row) {
        $html .= "<li>";
        if($row['solicitud'] == 0 and $row['pdf'] != "")
        { $html .= "<a href=\"../".$row['pdf']."\" target=\"_blank\">".$row['descripcion']."</a>";}
        else if($row['solicitud'] == 1)
        { $table .= "<tr>";
          $table .= "<td>".$row['expediente']."</td>";
          $table .= "<td>".$row['folio']."</td>";
          $table .= "<td>".$row['descripcion']."</td>";
          if($row['respuesta'] == "")
          { $table .= "<td>Sin respuesta</td>";}
          else
          { $table .= "<td><a href=\"../".$row['respuesta']."\" target=\"_blank\"><span class=\"glyphicon glyphicon-envelope\"></span></a></td>";}

          if($row['anexo'] == "")
          { $table .= "<td>Sin anexo</td>";}
          else
          { $table .= "<td><a href=\"../".$row['anexo']."\" target=\"_blank\"><span class=\"glyphicon glyphicon-paperclip\"></span></a></td>";}
          $table .= "</tr>";        
        }
        else
        { $html .= $row['descripcion'];}
        $html .= "</li>";
        
    }
    $html .= "</ul>";
    $table .= "</tbody>";
    $table.= "</table>";
    $rst->closeCursor();
} else {
    $html .= "<p>No hay datos cargados por el momento ...</p>";
    $table .= "<p>No hay solicitudes por el momento ...</p>";
}
echo($esSolicitud ? $table:$html);