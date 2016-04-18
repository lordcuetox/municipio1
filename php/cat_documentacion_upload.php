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
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $size = $_FILES["fileToUpload"]["size"];

        /* RENOMBRADO DEL ARCHIVO CON LA xCveExpediente */
        $file_name_new = ($tipo == 0) ? ($cve_expediente . "_respuesta." . $fileType) : ($tipo == 1 ? ($cve_expediente . "_anexo." . $fileType) : ("$cve_expediente.$fileType" ));

        $target_file_new = $target_dir . $file_name_new;
        /* RENOMBRADO DEL ARCHIVO CON LA xCveExpediente */

        if (file_exists($target_file_new)) {

            unlink($target_file_new);
        }

        if ($fileType != "pdf" && $fileType != "zip" && $fileType != "doc" && $fileType != "docx") {
            $msg.= "Lo sentimos, solo archivos PDF, DOC, DOCX y ZIP son permitidos. su extensión de archivo es: $fileType";
            $exito = false;
            //20 * 1024 * 1024
        } else if ($size > 20971520) {
            $msg.= "Lo sentimos, su archivo es demasiado grande.\n El tamaño de su archivo es: " . $size;
            $exito = false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_new)) {
                $msg.= "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n";
                $sql = "";
                $valor = (substr($target_file_new, 3, strlen($target_file_new)));

                if ($tipo == 0) {
                    $sql = "UPDATE documentacion_transparencia SET respuesta = '" . $valor . "' WHERE cve_expediente = $cve_expediente";
                } elseif ($tipo == 1) {
                    $sql = "UPDATE documentacion_transparencia SET anexo  = '" . $valor . "' WHERE cve_expediente = $cve_expediente";
                } else {
                    $sql = "UPDATE documentacion_transparencia SET pdf = '" . $valor . "' WHERE cve_expediente = $cve_expediente";
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
            return;
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
                <input type="hidden" id="xCveExpediente" name="xCveExpediente" value="<?php echo($_GET["xCveExpediente"]); ?>" />
                <input type="hidden" id="xTipo" name="xTipo" value="<?php echo($_GET["xTipo"]); ?>" />
                <input type="hidden" id="xAccion2" name="xAccion2" value="0" />
                <label for="fileToUpload">Seleccione imagen para subir:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="Seleccione una imagen">
            </div>
            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="subir();">Subir</button>
        </form>
        <br/>
        <br/>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
</div>