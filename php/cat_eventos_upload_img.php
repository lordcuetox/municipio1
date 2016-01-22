<?php
require_once '../clases/UtilDB.php';
$msg = "";
if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_evento = isset($_POST['xCveEvento']) ? $_POST['xCveEvento'] : 0;
        $num_imagen = isset($_POST["xNumImagen"]) ? $_POST["xNumImagen"] : 0;
        $target_dir = "../img/eventos/";

        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */
        $name_file = basename($_FILES["fileToUpload"]["name"]);
        $extension = substr($name_file, strpos($name_file, "."), strlen($name_file));
        $new_name_file = ($num_imagen == 0) ? ($cve_evento . $extension) : ($cve_evento . "_" . $num_imagen . $extension);
        $target_file = $target_dir . $new_name_file;
        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */

        //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $msg.= "El archivo es una imagen - " . $check["mime"] . ".\n";
            $exito = true;
        } else {
            $msg.= "El archivo no es una imagen.\n";
            $exito = false;
        }

        if (file_exists($target_file)) {
            //$msg.= "Sorry, file already exists.\n";
            //$uploadOk = 0;
            unlink($target_file);
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg.= "Lo sentimos, su archivo es demasiado grande.\n";
            $exito = false;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $msg.= "Lo sentimos, solo archivos JPG, JPEG, PNG y GIF son permitidos.\n";
            $exito = false;
        }
        if ($uploadOk == 0) {
            $msg.= "Lo sentimos, su archivos no fue cargado al servidor.\n";
            $exito = false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg.= "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n";
                $sql = "";

                if ($num_imagen == 0) {
                    $sql = "UPDATE eventos SET foto_principal = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_evento = $cve_evento";
                } else {
                    $sql = "UPDATE eventos SET foto" . $num_imagen . " = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_evento = $cve_evento";
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
        header('Location:cat_eventos.php');
        return;
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Evento(s) | Subir imagen <?php echo(($_GET["xNumImagen"] == "0") ? "principal" : "foto " . $_GET["xNumImagen"]); ?></h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" id="xCveEvento" name="xCveEvento" value="<?php echo($_GET["xCveEvento"]); ?>" />
                <input type="hidden" id="xNumImagen" name="xNumImagen" value="<?php echo($_GET["xNumImagen"]); ?>" />
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