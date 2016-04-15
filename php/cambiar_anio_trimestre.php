<?php
session_start();

$anio = isset($_SESSION['anio']) ? ((int) $_SESSION['anio']) : date("Y");
$trimestre = 0;

if (isset($_SESSION['trimestre'])) {
    $trimestre = (int) $_SESSION['trimestre'];
} else {
    if (date('m') > 0 and date('m') <= 3) {
        $trimestre = 1;
    } elseif (date('m') >= 4 and date('m') <= 6) {
        $trimestre = 2;
    } elseif (date('m') >= 7 and date('m') <= 9) {
        $trimestre = 3;
    } else {
        $trimestre = 4;
    }
}



if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

if (isset($_POST['xAccion'])) {

    if ($_POST['xAccion'] == 'cambiarAnioTrimestre') {
        $_SESSION['cambiar_anio_trimestre'] = 1;
        $_SESSION['anio'] = $_POST['cmbAnio'];
        $_SESSION['trimestre'] = $_POST['cmbTrimestre'];
        header('Location:cat_documentacion.php');
        return;
    }
    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin| Cambiar Año & trimestre</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
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
            $_GET['q'] = "transparencia";
            include './includeMenuAdmin.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Elija año y trimestre</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">

                        <form role="form" name="frmAnioTrimestre" id="frmAnioTrimestre" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <label for="cmbAnio"> Año</label>
                                <input type="hidden" name="xAccion" id="xAccion" value="0" />
                                <select name="cmbAnio" id="cmbAnio" class="form-control" placeholder="Año a reportar" >
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <option value="2016" <?php echo($anio == 2016 ? "selected" : ""); ?>>--------- 2016 ---------</option>
                                    <option value="2017" <?php echo($anio == 2017 ? "selected" : ""); ?>>--------- 2017 ---------</option>
                                    <option value="2018" <?php echo($anio == 2018 ? "selected" : ""); ?>>--------- 2018 ---------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmbTrimestre"> Trimestre</label>
                                <select name="cmbTrimestre" id="cmbTrimestre" class="form-control" placeholder="Trimestre a reportar" >
                                    <option value="0" >--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <option value="1" <?php echo($trimestre == 1 ? "selected" : ""); ?>>--------- Primer Trimestre (enero-marzo)---------</option>
                                    <option value="2" <?php echo($trimestre == 2 ? "selected" : ""); ?>>--------- Segundo Trimestre (abril-junio)---------</option>
                                    <option value="3" <?php echo($trimestre == 3 ? "selected" : ""); ?>>--------- Tercer Trimestre (julio-septiembre)---------</option>
                                    <option value="4" <?php echo($trimestre == 4 ? "selected" : ""); ?>>--------- Cuarto Trimestre (octubre-diciembre)---------</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" id="btnCambiar" name="btnCambiar" onclick="cambiar();">Aceptar</button>
                        </form>
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
                                    $("#frmAnioTrimestre").submit();
                                }

                                function cambiar()
                                {
                                    $("#xAccion").val("cambiarAnioTrimestre");
                                    $("#frmAnioTrimestre").submit();

                                }
        </script>
    </body>
</html>