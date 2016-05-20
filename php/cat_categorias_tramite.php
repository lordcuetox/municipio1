<?php
require_once '../clases/ClasificacionTramite.php';
require_once '../clases/TipoTramite.php';
require_once '../clases/CategoriaTramite.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
} else {
    $idPrincipal = $_SESSION['cve_usuario'];
}

$categoria = new CategoriaTramite();
$count = NULL;
$sql = "";
$rst = NULL;

if (isset($_POST['txtCveCategoriaTramite'])) {
    if ($_POST['txtCveCategoriaTramite'] != 0) {
        $categoria = new CategoriaTramite((int) $_POST['txtCveCategoriaTramite']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $categoria->setCveTipoTramite(new TipoTramite((int) $_POST['cmbTipoTramite']));
        $categoria->setNombre($_POST['txtNombre']);
        $categoria->setActivo(isset($_POST['cbxActivo']) ? 1 : 0);
        $count = $categoria->grabar();
    }

    if ($_POST['xAccion'] == 'eliminar') {
        $categoria->borrar();
        $categoria = new CategoriaTramite();
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
        <title>Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018 | Categoria trámites</title>
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
                        <h1 class="page-header">Categoria trámites</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center"><a href="cat_tipos_tramite.php">Tipos de trámites</a> | <a href="cat_tramites.php">Trámites</a></div>
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmCategoriaTramite" id="frmCategoriaTramite" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" />
                                <input type="hidden" class="form-control" id="txtCveCategoriaTramite" name="txtCveCategoriaTramite" value="<?php echo($categoria->getCveCategoriaTramite()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbClasificacionTramite">Clasificación trámite</label>
                                <select name="cmbClasificacionTramite" id="cmbClasificacionTramite" class="form-control">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql = "SELECT * FROM clasificaciones_tramites where activo = 1 ORDER BY nombre";
                                    $rst = UtilDB::ejecutaConsulta($sql);
                                    foreach ($rst as $row) {
                                        echo("<option value='" . $row['cve_clasificacion_tramite'] . "' " . ($categoria->getCveTipoTramite() != NULL ? ($categoria->getCveTipoTramite()->getCveClasificacionTramite()->getCveClasificacionTramite() == $row['cve_clasificacion_tramite'] ? "selected" : "") : "") . ">" . $row['nombre'] . "</option>");
                                    }
                                    $rst->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmbTipoTramite">Tipo trámite</label>
                                <select name="cmbTipoTramite" id="cmbTipoTramite" class="form-control" disabled>
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba un nombre de la categoria del trámite" value="<?php echo($categoria->getNombre()); ?>" maxlength="50">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="cbxActivo" name="cbxActivo" <?php echo($categoria->getCveCategoriaTramite() != 0 ? ($categoria->getActivo() ? "checked" : "") : "checked"); ?>> Activo</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID categoria trámite</th>
                                    <th>Tipo trámite</th>
                                    <th>Nombre</th>
                                    <th>Activo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT ct.cve_categoria_tramite, tt.nombre AS tipo_tramite, ct.nombre, ct.activo FROM CATEGORIAS_TRAMITES AS ct ";
                                $sql .= "INNER JOIN tipos_tramites AS tt ON tt.cve_tipo_tramite = ct.cve_tipo_tramite ";
                                $sql .= "ORDER BY cve_categoria_tramite DESC";
                                $rst = UtilDB::ejecutaConsulta($sql);
                                foreach ($rst as $row) {
                                    ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtCveCategoriaTramite').val(<?php echo($row['cve_categoria_tramite']); ?>);recargar();"><?php echo($row['cve_categoria_tramite']); ?></a></th>
                                        <th><?php echo($row['tipo_tramite']); ?></th>
                                        <th><?php echo($row['nombre']); ?></th>
                                        <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                        <th><button type="button" class="btn btn-danger" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_categoria_tramite']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
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
            $(document).ready(function(){
                
                $("#cmbClasificacionTramite").change(function(){
                    var xCveClasificacionTramite = this.value;
                    $("#cmbTipoTramite").html("");
                    $("#cmbTipoTramite").prop("disabled",true);
                    getComboTipoTramite(xCveClasificacionTramite,0);                  
                    
                });
                
            });
            
            <?php
            if($categoria->getCveCategoriaTramite() != 0)
            {
                echo("getComboTipoTramite(".($categoria->getCveTipoTramite()->getCveClasificacionTramite()->getCveClasificacionTramite()).",".($categoria->getCveTipoTramite()->getCveTipoTramite()).");");
            }            
            ?>

            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmCategoriaTramite").submit();
            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveCategoriaTramite").val("0");
                $("#frmCategoriaTramite").submit();
            }

            function grabar()
            {

                $("#xAccion").val("grabar");
                $("#frmCategoriaTramite").submit();


            }

            function eliminar(valor)
            {
                if (confirm("¿Estás realmente seguro de eliminar este registro?"))
                {
                    $("#xAccion").val("eliminar");
                    $("#txtCveCategoriaTramite").val(valor);
                    $("#frmCategoriaTramite").submit();
                }

            }

            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmCategoriaTramite").submit();

            }            
          
            function getComboTipoTramite(xCveClasificacionTramite,xCveTipoTramite)
            {   
                $("#cmbTipoTramite").load("cat_categorias_tramite_ajax.php",{"xAccion":"getComboTipoTramite","xCveClasificacionTramite":xCveClasificacionTramite,"xCveTipoTramite":xCveTipoTramite},function(){
                        $("#cmbTipoTramite").prop("disabled",false);
                    });
            }

        </script>
    </body>
</html>
