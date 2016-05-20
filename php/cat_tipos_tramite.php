<?php
require_once '../clases/TipoTramite.php';
require_once '../clases/ClasificacionTramite.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
} else {
    $idPrincipal = $_SESSION['cve_usuario'];
}

$tipo_tramite = new TipoTramite();
$count = NULL;
$sql = "";
$rst = NULL;

if (isset($_POST['txtCveTipoTramite'])) {
    if ($_POST['txtCveTipoTramite'] != 0) {
        $tipo_tramite = new TipoTramite((int) $_POST['txtCveTipoTramite']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $tipo_tramite->setCveClasificacionTramite(new ClasificacionTramite((int) $_POST['cmbClasificacionTramite']));
        $tipo_tramite->setNombre($_POST['txtNombre']);
        $tipo_tramite->setActivo(isset($_POST['cbxActivo']) ? 1 : 0);
        $count = $tipo_tramite->grabar();
    }
    
    if ($_POST['xAccion'] == 'eliminar') {
        $tipo_tramite->borrar();
        $tipo_tramite = new TipoTramite();
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
        <title>Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018 | Tipo trámite</title>
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
            $_GET['q'] = "tramites";
            include './includeMenuAdmin.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tipo trámite</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center"><a href="cat_categorias_tramite.php">Categorias de trámites</a> | <a href="cat_tramites.php">Trámites</a></div>
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmTipoTramite" id="frmTipoTramite" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" />
                                <input type="hidden" class="form-control" id="txtCveTipoTramite" name="txtCveTipoTramite" value="<?php echo($tipo_tramite->getCveTipoTramite()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbClasificacionTramite">Clasificación trámite</label>
                                <select name="cmbClasificacionTramite" id="cmbClasificacionTramite" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM CLASIFICACIONES_TRAMITES where activo=1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_clasificacion_tramite'] . "' " . ($tipo_tramite->getCveClasificacionTramite() != NULL ? ($tipo_tramite->getCveClasificacionTramite()->getCveClasificacionTramite() == $row['cve_clasificacion_tramite'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba un nombre para tipo de trámite" value="<?php echo($tipo_tramite->getNombre()); ?>" maxlength="50">
                            </div> 
                            <div class="checkbox">
                                <label><input type="checkbox" id="cbxActivo" name="cbxActivo" <?php echo($tipo_tramite->getCveTipoTramite() != 0 ? ($tipo_tramite->getActivo() ? "checked" : "") : "checked"); ?>> Activo</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID tipo trámite</th>
                                    <th>Nombre del trámite</th>
                                    <th>Clasificación trámite</th>
                                    <th>Imagen</th>
                                    <th>Activo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT tt.cve_tipo_tramite, tt.nombre, ct.nombre AS clasificacion_tramite, tt.img, tt.activo FROM TIPOS_TRAMITES AS tt INNER JOIN CLASIFICACIONES_TRAMITES AS ct ON ct.cve_clasificacion_tramite = tt.cve_clasificacion_tramite ORDER BY tt.cve_tipo_tramite DESC";
                                $rst = UtilDB::ejecutaConsulta($sql);
                                foreach ($rst as $row) {
                                    ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtCveTipoTramite').val(<?php echo($row['cve_tipo_tramite']); ?>);
                                                recargar();"><?php echo($row['cve_tipo_tramite']); ?></a></th>
                                        <th><?php echo($row['nombre']); ?></th>
                                        <th><?php echo($row['clasificacion_tramite']); ?></th>
                                        <th><?php echo($row['img'] != NULL ? "<span class=\"fa fa-file-image-o\"  style=\"font-size: 2em; cursor:pointer;\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['img'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" ></span><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_tipos_tramite_upload_img.php?xCveTipoTramite=" . $row['cve_tipo_tramite'] . "\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_tipos_tramite_upload_img.php?xCveTipoTramite=" . $row['cve_tipo_tramite'] . "\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                        <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                        <th><button type="button" class="btn btn-danger" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_tipo_tramite']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
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

                $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});

                /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });

            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmTipoTramite").submit();
            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveTipoTramite").val("0");
                $("#frmTipoTramite").submit();
            }

            function grabar()
            {

                $("#xAccion").val("grabar");
                $("#frmTipoTramite").submit();


            }
            
            function eliminar(valor)
            {
                if (confirm("¿Estás realmente seguro de eliminar este registro?"))
                {
                    $("#xAccion").val("eliminar");
                    $("#txtCveTipoTramite").val(valor);
                    $("#frmTipoTramite").submit();
                }

            }

            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmTipoTramite").submit();

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
