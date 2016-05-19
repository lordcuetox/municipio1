<?php
require_once '../clases/Dependencia.php';
require_once '../clases/TipoDependencia.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
} else {
    $idPrincipal = $_SESSION['cve_usuario'];
}

$dependencia = new Dependencia();
$count = NULL;
$sql = "";
$rst = NULL;

if (isset($_POST['txtCveDependencia'])) {
    if ($_POST['txtCveDependencia'] != 0) {
        $dependencia = new Dependencia((int) $_POST['txtCveDependencia']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $dependencia->setCveTipoDependencia(new TipoDependencia((int) $_POST['cmbTipoDependencia']));
        $dependencia->setNombre($_POST['txtNombre']);
        $dependencia->setTitular($_POST['txtTitular']);
        $dependencia->setActivo(isset($_POST['cbxActivo']) ? 1 : 0);
        $count = $dependencia->grabar();
    }

    if ($_POST['xAccion'] == 'eliminar') {
        $dependencia->borrar();
        $dependencia = new Dependencia();
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
        <title>Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018 | Dependencias</title>
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
                        <h1 class="page-header">Dependencias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmDependencia" id="frmDependencia" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" />
                                <input type="hidden" class="form-control" id="txtCveDependencia" name="txtCveDependencia" value="<?php echo($dependencia->getCveDependencia()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbTipoDependencia">Tipo dependencia</label>
                                <select name="cmbTipoDependencia" id="cmbTipoDependencia" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM tipos_dependencia where activo=1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_tipo_dependencia'] . "' " . ($dependencia->getCveTipoDependencia() != NULL ? ($dependencia->getCveTipoDependencia()->getCveTipoDependencia() == $row['cve_tipo_dependencia'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba un nombre para la dependencia" value="<?php echo($dependencia->getNombre()); ?>" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="txtTitular">Titular:</label>
                                <input type="text" class="form-control" id="txtTitular" name="txtTitular" placeholder="Escriba un nombre completo del titular de la dependencia" value="<?php echo($dependencia->getTitular()); ?>" maxlength="50">
                            </div> 
                            <div class="checkbox">
                                <label><input type="checkbox" id="cbxActivo" name="cbxActivo" <?php echo($dependencia->getCveDependencia() != 0 ? ($dependencia->getActivo() ? "checked" : "") : "checked"); ?>> Activo</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID Dependencia</th>
                                    <th>Nombre de la dependencia</th>
                                    <th>Titular</th>
                                    <th>Tipo dependecia</th>
                                    <th>Activo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT d.cve_dependencia, d.nombre,d.titular, td.nombre AS tipo_dependencia, d.activo FROM dependencias AS d INNER JOIN tipos_dependencia AS td ON d.cve_tipo_dependencia = td.cve_tipo_dependencia ORDER BY d.cve_dependencia DESC";
                                $rst = UtilDB::ejecutaConsulta($sql);
                                foreach ($rst as $row) {
                                    ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtCveDependencia').val(<?php echo($row['cve_dependencia']); ?>);
                                                recargar();"><?php echo($row['cve_dependencia']); ?></a></th>
                                        <th><?php echo($row['nombre']); ?></th>
                                        <th><?php echo($row['titular']); ?></th>
                                        <th><?php echo($row['tipo_dependencia']); ?></th>
                                        <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                        <th><button type="button" class="btn btn-danger" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_dependencia']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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

            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmDependencia").submit();
            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveDependencia").val("0");
                $("#frmDependencia").submit();
            }

            function grabar()
            {

                $("#xAccion").val("grabar");
                $("#frmDependencia").submit();


            }

            function eliminar(valor)
            {
                if (confirm("¿Estás realmente seguro de eliminar este registro?"))
                {
                    $("#xAccion").val("eliminar");
                    $("#txtCveDependencia").val(valor);
                    $("#frmDependencia").submit();
                }

            }

            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmDependencia").submit();

            }

        </script>
    </body>
</html>
