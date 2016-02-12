<?php
require_once '../clases/ElReaton.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
else
{
    $idPrincipal=$_SESSION['cve_usuario'];
}

$reata = new ElReaton();
$count = NULL;

if (isset($_SESSION['cve_usuario'])) {
    if (isset($_SESSION['cve_usuario']) != 0) {
        $reata = new ElReaton($idPrincipal);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $reata->setHabilitado($_POST['txtHabilitado']);
        $reata->setFresita($_POST['txtFresita']);
        $count = $reata->grabar();
        if ($count != 0) {
            $msg = "¡Usuario y contraseña actualizado!";
        } else {
            $msg = "[ERROR] Usuario y contraseña no actualizado";
        }
    }
    if ($_POST['xAccion'] == 'logout')
    {   
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin| Usuario Administrador</title>
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
            <?php $_GET['q'] = "reaton"; include './includeMenuAdmin.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuario Administrador</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">

                        <form role="form" name="frmReata" id="frmReata" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" />
                                <input type="hidden" class="form-control" id="txtIdReata" name="txtIdReata"
                                       placeholder="Clave usuario" value="<?php echo($reata->getCveReata()); ?>">

                            </div>
                            <div class="form-group">
                                <label for="txtHabilitado">Usuario:</label>
                                <input type="text" class="form-control" id="txtHabilitado" name="txtHabilitado" 
                                       placeholder="Usuario" value="<?php echo($reata->getHabilitado()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtFresita">Contraseña:</label>
                                <input type="password" class="form-control" id="txtFresita" name="txtFresita" 
                                       placeholder="Contraseña" value="<?php echo($reata->getFresita()); ?>">
                            </div>
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="<?php echo($count != 0 ? "alert alert-success" : "alert alert-danger"); ?>" style="<?php echo($count == NULL ? "display:none;" : "display:block;"); ?>"><?php echo($msg); ?></div>
                        <br/>
                        <br/>
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
            $("#frmReata").submit();
        }
        
        function limpiar()
        {
            $("#xAccion").val("0");
            $("#txtIdReata").val("0");
            $("#frmReata").submit();
        }

        function grabar()
        {

            if ($("#txtFresita").val() !== "" && $("#txtHabilitado").val() !== "")
            {
                $("#xAccion").val("grabar");
                $("#frmReata").submit();
            }
            else
            {
                alert("Es necesario escribir el usuario y el password");
            }


        }

        function abrirVentana() {
            var w = 400;
            var h = 400;
            var left = (screen.width / 2) - (w / 2);
            var top = (screen.height / 2) - (h / 2);
            var action = "muestra_ritos.php";
            window.open(action, 'MuestraRitos', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }

        function recargar()
        {
            $("#xAccion").val("recargar");
            $("#frmRitos").submit();

        }
        </script>
    </body>
</html>
