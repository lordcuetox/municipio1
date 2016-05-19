<?php
require_once '../clases/CategoriaTramite.php';
require_once '../clases/ClasificacionTramite.php';
require_once '../clases/TipoTramite.php';
require_once '../clases/TipoDependencia.php';
require_once '../clases/Dependencia.php';
require_once '../clases/Tramite.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
} else {
    $idPrincipal = $_SESSION['cve_usuario'];
}

$tramite = new Tramite();
$count = NULL;
$sql = "";
$rst = NULL;

if (isset($_POST['txtCveTramite'])) {
    if ($_POST['txtCveTramite'] != 0) {
        $tramite = new Tramite((int) $_POST['txtCveTramite']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $tramite->setCveTipoTramite(new TipoTramite((int) $_POST['cmbTipoTramite']));
        $tramite->setCveCategoriaTramite(new CategoriaTramite((int) $_POST['cmbCategoriaTramite']));
        $tramite->setCveDependencia(new Dependencia((int) $_POST['cmbDependencia']));
        $tramite->setNombre($_POST['txtNombre']);
        $tramite->setActivo(isset($_POST['cbxActivo']) ? 1 : 0);
        echo($tramite->getCveTipoTramite()->getNombre());
        echo("");
        echo($tramite->getCveCategoriaTramite()->getNombre());
        echo("");
        echo($tramite->getCveDependencia()->getNombre());
        $count = $tramite->grabar();
    }

    if ($_POST['xAccion'] == 'eliminar') {
        $tramite->borrar();
        $tramite = new Tramite();
    }

    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        unset($_SESSION['nombre']);
        header('Location:login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018 | Trámites</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018">
        <meta name="keywords" content="ayuntamiento, Macuspana">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- Bootstrap Core CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- MetisMenu CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/css/sb-admin-2.css" rel="stylesheet"/>
        <!-- Custom Fonts -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">
            <?php
            $_GET['q'] = "reaton";
            include './includeMenuAdmin.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Trámites</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmTramite" id="frmTramite" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" />
                                <input type="hidden" class="form-control" id="txtCveTramite" name="txtCveTramite" value="<?php echo($tramite->getCveTramite()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbTipoTramite">Tipo trámite</label>
                                <select name="cmbTipoTramite" id="cmbTipoTramite" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM tipos_tramites where activo=1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_tipo_tramite'] . "' " . ($tramite->getCveTipoTramite() != NULL ? ($tramite->getCveTipoTramite()->getCveTipoTramite() == $row['cve_tipo_tramite'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmbCategoriaTramite">Categoria trámite</label>
                                <select name="cmbCategoriaTramite" id="cmbCategoriaTramite" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM categorias_tramites where activo=1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_categoria_tramite'] . "' " . ($tramite->getCveCategoriaTramite() != NULL ? ($tramite->getCveCategoriaTramite()->getCveCategoriaTramite() == $row['cve_categoria_tramite'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmbDependencia">Dependencia</label>
                                <select name="cmbDependencia" id="cmbDependencia" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM dependencias where activo=1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_dependencia'] . "' " . ($tramite->getCveDependencia() != NULL ? ($tramite->getCveDependencia()->getCveDependencia() == $row['cve_dependencia'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba un nombre para el trámite" value="<?php echo($tramite->getNombre()); ?>" maxlength="50">
                            </div> 
                            <div class="checkbox">
                                <label><input type="checkbox" id="cbxActivo" name="cbxActivo" <?php echo($tramite->getCveTramite() != 0 ? ($tramite->getActivo() ? "checked" : "") : "checked"); ?>> Activo</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID trámite</th>
                                    <th>Tipo</th>
                                    <th>Categoria</th>
                                    <th>Dependencia</th>
                                    <th>Nombre</th>
                                    <th>PDF</th>
                                    <th>Activo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT t.cve_tramite, tt.nombre AS tipo_tramite, ct.nombre AS categoria_tramite, d.nombre AS dependencia, t.nombre, t.pdf, t.activo FROM tramites AS t ";
                                $sql .="INNER JOIN tipos_tramites AS tt ON tt.cve_tipo_tramite = t.cve_tipo_tramite ";
                                $sql .="INNER JOIN categorias_tramites AS ct ON ct.cve_categoria_tramite = t.cve_categoria_tramite ";
                                $sql .="INNER JOIN dependencias AS d ON d.cve_dependencia = t .cve_dependencia ";
                                $rst = UtilDB::ejecutaConsulta($sql);
                                foreach ($rst as $row) {
                                    ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtCveTramite').val(<?php echo($row['cve_tramite']); ?>);recargar();"><?php echo($row['cve_tramite']); ?></a></th>
                                        <th><?php echo($row['tipo_tramite']); ?></th>
                                        <th><?php echo($row['categoria_tramite']); ?></th>
                                        <th><?php echo($row['dependencia']); ?></th>
                                        <th><?php echo($row['nombre']); ?></th>
                                        <th><?php echo($row['pdf'] != NULL ? "<a href=\"../".$row['pdf']."\" target=\"_blank\"><span class=\"fa fa-file-pdf-o\" style=\"font-size: 2em;\"></span></a><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_tramites_upload_pdf.php?xCveTramite=" . $row['cve_tramite'] . "\" href=\"javascript:void(0);\">Cambiar PDF</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_tramites_upload_pdf.php?xCveTramite=" . $row['cve_tramite'] . "\" href=\"javascript:void(0);\">Subir PDF</a>"); ?></th>
                                        <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                        <th><button type="button" class="btn btn-danger" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_tramite']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>
                $(document).ready(function () {

                    /* Limpiar la ventana modal para volver a usar*/
                    $('body').on('hidden.bs.modal', '.modal', function () {
                        $(this).removeData('bs.modal');
                    });

                });

                function logout()
                {
                    $("#xAccion").val("logout");
                    $("#frmTramite").submit();
                }

                function limpiar()
                {
                    $("#xAccion").val("0");
                    $("#txtCveTramite").val("0");
                    $("#frmTramite").submit();
                }

                function grabar()
                {

                    $("#xAccion").val("grabar");
                    $("#frmTramite").submit();


                }

                function eliminar(valor)
                {
                    if (confirm("¿Estás realmente seguro de eliminar este registro?"))
                    {
                        $("#xAccion").val("eliminar");
                        $("#txtCveTramite").val(valor);
                        $("#frmTramite").submit();
                    }

                }

                function recargar()
                {
                    $("#xAccion").val("recargar");
                    $("#frmTramite").submit();

                }

                function subir()
                {
                    if ($("#fileToUpload").val() !== "")
                    {
                        $("#xAccion2").val("upload");
                        $("#frmUpload").submit();
                    }
                    else
                    {
                        alert("No ha seleccionado un archivo para subir.");
                    }
                }
        </script>
    </body>
</html>
