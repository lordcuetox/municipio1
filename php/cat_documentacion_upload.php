<?php
require_once '../clases/UtilDB.php';
$msg = "";
//Tipo 0 = respuesta
//Tipo 1 = anexo
//Tipo 2 = pdf

if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_expediente = isset($_POST['xCveExpediente']) ? $_POST['xCveExpediente'] : 0;
        $tipo = isset($_POST["xTipo"]) ? $_POST["xTipo"] : 0;
        $target_dir = "../documentos/transparencia/";

        /* RENOMBRADO DEL ARCHIVO CON LA xCveExpediente */
        $name_file = basename($_FILES["fileToUpload"]["name"]);
        $extension = substr($name_file, strpos($name_file, "."), strlen($name_file));
        $new_name_file = ($tipo == 0) ? ($cve_expediente . "_respuesta" . $extension) : ($tipo == 1 ? ($cve_expediente . "_anexo" . $extension) : ($cve_expediente . $extension));
        $target_file = $target_dir . $new_name_file;
        /* RENOMBRADO DEL ARCHIVO CON LA xCveExpediente */

        if (file_exists($target_file)) {

            unlink($target_file);
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg.= "Lo sentimos, su archivo es demasiado grande.\n";
            $exito = false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg.= "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n";
                $sql = "";

                if ($tipo == 0) {
                    $sql = "UPDATE documentacion_transparencia SET respuesta = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_expediente = $cve_expediente";
                } elseif ($tipo == 1) {
                    $sql = "UPDATE documentacion_transparencia SET anexo  = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_expediente = $cve_expediente";
                } else {
                    $sql = "UPDATE documentacion_transparencia SET pdf = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_expediente = $cve_expediente";
                }

                $count = UtilDB::ejecutaSQL($sql);

                if ($count != 0) {
                    $msg.= "[OK] SQL UPDATE\n";
                    $exito = true;
                } else {
                    $msg.= "Lo sentimos, hubo un error SQL UPDATE.\n";
                    $exito = false;
                }
            } else {
                $msg.= "Lo sentimo, ha ocurrido un error al cargar su archivo al servidor.\n";
                $exito = false;
            }
        }
        if (!$exito) {
            echo($msg);
        } else {
            header('Location:cat_documentacion.php');
            return;
        }
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Transparencia | Subir <?php echo(($_GET["xTipo"] == "0") ? "respuesta" : ($_GET["xTipo"] == "1" ? "anexo" : "documento") ); ?></h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <input type="hidden" id="xCveExpediente" name="xCveExpediente" value="<?php echo($_GET["xCveExpediente"]); ?>" />
                <input type="hidden" id="xTipo" name="xTipo" value="<?php echo($_GET["xTipo"]); ?>" />
                <input type="hidden" id="xAccion2" name="xAccion2" value="0" />
                <label for="fileToUpload">Seleccione imagen para subir:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="Seleccione una imagen">
            </div>
            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="subir();">Subir</button>
        </form>
        <br/>
        <br/>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>