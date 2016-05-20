<?php

require_once '../clases/UtilDB.php';
$sql = "";
$rst = NULL;
$html = "";
$count = 0;

if (isset($_POST['xAccion'])) {
    $xAccion = $_POST['xAccion']; //xCveClasificacionTramite
    $xCveClasificacionTramite = isset($_POST['xCveClasificacionTramite']) ? ((int) $_POST['xCveClasificacionTramite']) : 0;

    if ($xAccion == "getTiposTramites") {
        $sql = "SELECT * FROM tipos_tramites WHERE cve_clasificacion_tramite = $xCveClasificacionTramite AND activo = 1";
        $rst = UtilDB::ejecutaConsulta($sql);
        foreach ($rst as $row) {
            $html .="<div class=\"col-md-3 top-buffer\" >";
            $html .= "<img src=\"../" . $row['img'] . "\" alt=\"" . $row['nombre'] . "\"/>";
            $html .= "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"tramite_modal.php?xCveTipoTramite=" . $row['cve_tipo_tramite'] . "\" href=\"javascript:void(0);\">";
            $html .=$row['nombre'];
            $html .= "</a>";
            $html .= "</div> ";
            $count++;

            if ($count % 4) {
                $html .= "<div class=\"clearfix visible-md-block\"></div>";
            }
        }
        $rst->closeCursor();
        echo($html);
        return;
    } else if ($xAccion == "getTramites") {
        $xCveCategoriaTramite = isset($_POST['xCveCategoriaTramite']) ? ((int) $_POST['xCveCategoriaTramite']) : 0;

        $sql = "SELECT t.cve_tramite, t.nombre, t.pdf, t.activo, d.nombre AS dependencia FROM tramites AS t ";
        $sql .= "INNER JOIN dependencias AS d ON d.cve_dependencia = t.cve_dependencia ";
        $sql .= "WHERE t.cve_categoria_tramite = $xCveCategoriaTramite AND t.activo = 1";
        $rst = UtilDB::ejecutaConsulta($sql);

        if ($rst->rowCount() > 0) {
            $html .="<table class=\"table table-bordered table-striped table-hover table-responsive\">";
            $html .= "<thead>";
            $html .= "<tr><td>Nombre del trámites</td><td>Dependencia</td></tr>";
            $html .= "</thead>";
            $html .= "<tbody>";
            foreach ($rst as $row) {
                $html .= "<tr>";
                if($row['pdf'] != "")
                { $html .= "<td><a href=\"../".$row['pdf']."\" target=\"_blank\">" . $row['nombre'] . "</a></td>"; }
                else
                { $html .= "<td>".$row['nombre']."</td>"; }                
                $html .= "<td>" . $row['dependencia'] . "</td>";
                $html .= "</tr>";
            }
            $html .= "</tbody>";
            $html .="</table>";
            
        } else {
            $html .="<p>No hay trámites disponibles</p>";            
        }
        echo($html);
        $rst->closeCursor();
        return;
    }
}