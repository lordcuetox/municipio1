<?php
require_once '../clases/Documentacion.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

$documentacion = new Documentacion();

if (isset($_POST['id'])) {
    $documentacion = new Documentacion((int) $_POST['id']);
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Transparencia | opciones </h4>
</div>
<div class="modal-body">
    <div class="te">
        <p><strong>ID:</strong> <?php echo($documentacion->getCveExpediente()); ?></p>
        <p><strong>Descripción:</strong> <?php echo($documentacion->getDescripcion()); ?></p>
        <p><strong>Expediente:</strong> <?php echo($documentacion->getExpediente()); ?></p>
        <p><strong>Folio:</strong> <?php echo($documentacion->getFolio()); ?></p>
        <p><strong>¿Es una solicitud?:</strong> <?php echo($documentacion->getSolicitud() ? "Si" : "No"); ?></p>
        <p><strong>¿Infomex?</strong> <?php echo($documentacion->getInfomex() ? "Si" : "No"); ?></p>        			
        <table class="table table-bordered table-striped table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>Respuesta</th>
                    <th>Anexo</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if ($documentacion->getSolicitud() == 1) {
                        ?>
                        <th><?php echo($documentacion->getRespuesta() != NULL ? "<a href=\"../" . $documentacion->getRespuesta() . "\" target=\"_blank\"><i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\" style=\"font-size: 2em;\"></i></a><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=0\" href=\"javascript:void(0);\">Cambiar respuesta</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=0\" href=\"javascript:void(0);\">Subir respuesta</a>"); ?></th>
                        <th><?php echo($documentacion->getAnexo() != NULL ? "<a href=\"../" . $documentacion->getAnexo() . "\" target=\"_blank\"><i class=\"fa fa-file-archive-o\" aria-hidden=\"true\" style=\"font-size: 2em;\"></i></a><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=1\" href=\"javascript:void(0);\">Cambiar anexo</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=1\" href=\"javascript:void(0);\">Subir anexo</a>"); ?></th>
                        <th>No aplica</th>
                        <?php
                    } else {
                        ?>
                        <th>No aplica</th>
                        <th>No aplica</th>
                        <th><?php echo($documentacion->getPdf() != NULL ? "<a href=\"../" . $documentacion->getPdf() . "\" target=\"_blank\"><i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\" style=\"font-size: 2em;\"></i></a><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=2\" href=\"javascript:void(0);\">Cambiar documento</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $documentacion->getCveExpediente() . "&xTipo=2\" href=\"javascript:void(0);\">Subir documento</a>"); ?></th>
                        <?php
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
</div>