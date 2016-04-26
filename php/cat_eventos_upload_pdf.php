<?php
require_once '../clases/UtilDB.php';
$msg = "";
if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_evento = isset($_POST['xCveEvento']) ? $_POST['xCveEvento'] : 0;

        $target_dir = "../documentos/eventos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $size = $_FILES["fileToUpload"]["size"];

        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */
        $file_name_new = ("$cve_evento.$fileType");

        $target_file_new = $target_dir . $file_name_new;
        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */

        if (file_exists($target_file_new)) {
            //$msg.= "Sorry, file already exists.\n";
            //$uploadOk = 0;
            unlink($target_file_new);
        }

        if ($fileType != "pdf") {
            $msg.= "Lo sentimos, solo archivos pdf son permitidos. su extensión de archivo es: $fileType";
            $exito = false;
            //20 * 1024 * 1024
        } else if ($_FILES["fileToUpload"]["size"] > 20971520) {
            $msg.= "Lo sentimos, su archivo es demasiado grande.\n El tamaño de su archivo es: " . $size;
            $exito = false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_new)) {
                $msg.= "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n";
                $sql = "";
                $valor = (substr($target_file_new, 3, strlen($target_file_new)));

                $sql = "UPDATE eventos SET pdf = '" . $valor . "' WHERE cve_evento = $cve_evento";

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
            header('Location:cat_eventos.php');
            return;
        }
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Evento(s) | Subir PDF</h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" id="xCveEvento" name="xCveEvento" value="<?php echo($_GET["xCveEvento"]); ?>" />
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