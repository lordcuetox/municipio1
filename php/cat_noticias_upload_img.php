<?php
require_once '../clases/UtilDB.php';
$msg = "";
if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_noticia = isset($_POST['xCveNoticia']) ? $_POST['xCveNoticia'] : 0;
        $num_imagen = isset($_POST["xNumImagen"]) ? $_POST["xNumImagen"] : 0;

        $target_dir = "../img/boletin/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $size = $_FILES["fileToUpload"]["size"];

        /* RENOMBRADO DEL ARCHIVO CON LA CVE_NOTICIA */
        $file_name_new = ($num_imagen == 0) ? ("$cve_noticia.$fileType") : ($cve_noticia . "_" . $num_imagen . "." . $fileType);

        $target_file_new = $target_dir . $file_name_new;
        /* RENOMBRADO DEL ARCHIVO CON LA CVE_NOTICIA */


        if (file_exists($target_file_new)) {
            //$msg.= "Sorry, file already exists.\n";
            //$uploadOk = 0;
            unlink($target_file_new);
        }

        if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif") {
            $msg.= "Lo sentimos, solo archivos jpg, jpeg, png y gif son permitidos. su extensión de archivo es: $fileType";
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

                if ($num_imagen == 0) {
                    $sql = "UPDATE noticias SET foto_portada = '" . $valor . "' WHERE cve_noticia = $cve_noticia";
                } else {
                    $sql = "UPDATE noticias SET foto" . $num_imagen . " = '" . $valor . "' WHERE cve_noticia = $cve_noticia";
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
            header('Location:cat_noticias.php');
            return;
        }
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Noticias | Subir imagen <?php echo(($_GET["xNumImagen"] == "0") ? "portada" : "foto " . $_GET["xNumImagen"]); ?></h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" id="xCveNoticia" name="xCveNoticia" value="<?php echo($_GET["xCveNoticia"]); ?>" />
                <input type="hidden" id="xNumImagen" name="xNumImagen" value="<?php echo($_GET["xNumImagen"]); ?>" />
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