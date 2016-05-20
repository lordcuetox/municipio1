<?php
require_once '../clases/UtilDB.php';
require_once '../clases/ClasificacionTramite.php';
require_once '../clases/TipoTramite.php';
$sqL = "";
$rst = NULL;

$tipo_tramite = new TipoTramite((int) $_GET['xCveTipoTramite']);
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Elija una categoria de trámite</h4>
</div>
<div class="modal-body">
    <div class="te">
        <p>Clasificación del trámite: <strong><?php echo($tipo_tramite->getCveClasificacionTramite()->getNombre()); ?></strong></p>
        <p>Tipo trámite: <strong><?php echo($tipo_tramite->getNombre()); ?></strong></p><br/><br/>
        <form role="form" action="<?php echo($_SERVER['PHP_SELF']) ?>" name="frmCategoriaTramite" id="frmCategoriaTramite" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="cmbCategoriaTramite">Categoria trámite</label>
                    <select name="cmbCategoriaTramite" id="cmbCategoriaTramite" class="form-control" onchange="getTramites(this.value);">
                        <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                        <?php
                        $sql = "SELECT * FROM categorias_tramites WHERE cve_tipo_tramite = " . $tipo_tramite->getCveTipoTramite() . " AND activo = 1 ORDER BY nombre";
                        $rst = UtilDB::ejecutaConsulta($sql);
                        foreach ($rst as $row) {
                            echo("<option value='" . $row['cve_categoria_tramite'] . "' >" . $row['nombre'] . "</option>");
                        }
                        $rst->closeCursor();
                        ?>
                    </select>
                </div>
            </fieldset>
        </form><br/><br/>
        <div id="tramites_ajax">
            
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
</div>