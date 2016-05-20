<?php

require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

$sql = "";
$rst = NULL;

if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == "getComboTipoTramite") {

        $xCveClasificacionTramite = (int) $_POST['xCveClasificacionTramite'];
        $xCveTipoTramite = isset($_POST['xCveTipoTramite']) ? ((int) $_POST['xCveTipoTramite']) : 0;

        $sql = "SELECT * FROM tipos_tramites WHERE cve_clasificacion_tramite =  $xCveClasificacionTramite";
        $rst = UtilDB::ejecutaConsulta($sql);

        if ($rst->rowCount() > 0) {

            echo("<option value=\"0\">--------- SELECCIONE UNA OPCIÓN ---------</option>");

            foreach ($rst as $row) {
                echo("<option value='" . $row['cve_tipo_tramite'] . "' " . ($xCveTipoTramite != 0 ? ($xCveTipoTramite == $row['cve_tipo_tramite'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
            }
            $rst2->closeCursor();
        } else {
            echo("<option value=\"-1\">--------- NO TIENE ---------</option>");
        }
        return;
    }
}