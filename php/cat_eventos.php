<?php
require_once '../clases/Evento.php';
require_once '../clases/UtilDB.php';

session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

$evento = new Evento();
$count = NULL;

if (isset($_POST['txtCveEvento'])) {
    if ($_POST['txtCveEvento'] != 0) {
        $evento = new Evento($_POST['txtCveEvento']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {

        $evento->setCveReata($_SESSION['cve_usuario']);
        $evento->setNombre($_POST['txtNombre']);
        $evento->setDataLs1($_POST['txtDataLs1']);
        $evento->setDataLs2($_POST['txtDataLs2']);
        $evento->setDataLs3($_POST['txtDataLs3']);
        $evento->setDataLs4($_POST['txtDataLs4']);
        $evento->setLink($_POST['txtLink']);
        $evento->setCveModifico($_SESSION['cve_usuario']);
        $evento->setActivo(isset($_POST['cbxActivo']) ? 1 : 0);
        $count = $evento->grabar();
    }
    if ($_POST['xAccion'] == 'eliminar') {
        $evento->borrar($_POST['txtCveEvento']);
    }

    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        unset($_SESSION['nombre']);
        header('Location:login.php');
        return;
    }
}

$sql = "SELECT * FROM eventos ORDER BY cve_evento DESC";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018 | Eventos</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Gestor de contenido del H. Ayuntamiento de Macuspana 2016-2018">
        <meta name="keywords" content="ayuntamiento, Macuspana">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- other browsers -->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet"/>
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
            $_GET['q'] = "eventos";
            include './includeMenuAdmin.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Eventos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-8">&nbsp;</div>
                    <div class="col-sm-8">
                        <form role="form" name="frmEventos" id="frmEventos" action="cat_eventos.php" method="POST">
                            <div class="form-group">
                                <label for="xAccion"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>

                                <input type="hidden" class="form-control" id="txtCveEvento" name="txtCveEvento"
                                       placeholder="ID Evento" value="<?php echo($evento->getCveEvento()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre del evento</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba un nombre para el evento" value="<?php echo($evento->getNombre()); ?>" maxlength="150">
                            </div>                             
                            <div class="form-group">
                                <label for="txtDataLs1">Data ls1:</label><br/>
                                <input type="text" class="form-control" id="txtDataLs1" name="txtDataLs1" placeholder="Data ls1" value="<?php echo($evento->getDataLs1() != NULL ? $evento->getDataLs1():"offsetxin: left;offsetxout: right;offsetyin: 150;offsetyout: -250;fadein: false;fadeout: false;easingin: easeoutquart;easingout: easeinquart;durationin: 2500;durationout: 2500;delayin: 500;showuntil: 1;"); ?>" maxlength="250">
                            </div>
                            <div class="form-group">
                                <label for="txtDataLs2">Data ls2:</label><br/>
                                <input type="text" class="form-control" id="txtDataLs2" name="txtDataLs2" placeholder="Data ls2" value="<?php echo($evento->getDataLs2() != NULL ? $evento->getDataLs2():"offsetxin: left;offsetxout: right;offsetyin: 150;offsetyout: -250;fadein: false;fadeout: false;easingin: easeoutquart;easingout: easeinquart;durationin: 2500;durationout: 2500;delayin: 500;showuntil: 1;"); ?>" maxlength="250">
                            </div>
                            <div class="form-group">
                                <label for="txtDataLs3">Data ls3:</label><br/>
                                <input type="text" class="form-control" id="txtDataLs3" name="txtDataLs3" placeholder="Data ls3" value="<?php echo($evento->getDataLs3() != NULL ? $evento->getDataLs3():"offsetxin: left;offsetxout: right;offsetyin: 150;offsetyout: -250;fadein: false;fadeout: false;easingin: easeoutquart;easingout: easeinquart;durationin: 2500;durationout: 2500;delayin: 500;showuntil: 1;"); ?>" maxlength="250">
                            </div>
                            <div class="form-group">
                                <label for="txtDataLs4">Data ls4:</label><br/>
                                <input type="text" class="form-control" id="txtDataLs4" name="txtDataLs4" placeholder="Data ls4" value="<?php echo($evento->getDataLs4() != NULL ? $evento->getDataLs4():"offsetxin: left;offsetxout: right;offsetyin: 150;offsetyout: -250;fadein: false;fadeout: false;easingin: easeoutquart;easingout: easeinquart;durationin: 2500;durationout: 2500;delayin: 500;showuntil: 1;"); ?>" maxlength="250">
                            </div>
                            <div class="form-group">
                                <label for="txtLink">Link:</label><br/>
                                <input type="text" class="form-control" id="txtLink" name="txtLink" placeholder="Link" value="<?php echo($evento->getLink()); ?>" maxlength="100">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="cbxActivo" name="cbxActivo" <?php echo($evento->getCveEvento() != 0 ? ($evento->getActivo() ? "checked" : "") : "checked"); ?>> Activo</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-success" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Noticia</th>
                                        <th>Nombre</th>
                                        <th>Foto de Portada</th>
                                        <th>Foto 1</th>
                                        <th>Foto 2</th>
                                        <th>Foto 3</th>
                                        <th>Foto 4</th>
                                        <th>Link</th>
                                        <th>PDF</th>
                                        <th>Activo</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rst as $row) { ?>
                                        <tr>
                                            <th><a href="javascript:void(0);" onclick="$('#txtCveEvento').val(<?php echo($row['cve_evento']); ?>);
                                                    recargar();"><?php echo($row['cve_evento']); ?></a></th>
                                            <th><?php echo($row['nombre']); ?></th>
                                            <th><?php echo($row['foto_principal'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto_principal'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=0\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=0\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto1'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto1'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=1\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=1\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto2'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto2'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=2\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=2\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto3'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto3'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=3\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=3\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto4'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto4'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=4\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=" . $row['cve_evento'] . "&xNumImagen=4\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['link'] != NULL? "<a href=\"".$row['link']."\" target=\"_blank\"><span class=\"glyphicon glyphicon-link\" style=\"font-size: 2em;\"></span></a>":"-----"); ?></th>
                                            <th><?php echo($row['pdf'] != NULL ? "<a href=\"../".$row['pdf']."\" target=\"_blank\"><span class=\"fa fa-file-pdf-o\" style=\"font-size: 2em;\"></span></a><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_pdf.php?xCveEvento=" . $row['cve_evento'] . "\" href=\"javascript:void(0);\">Cambiar PDF</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_pdf.php?xCveEvento=" . $row['cve_evento'] . "\" href=\"javascript:void(0);\">Subir PDF</a>"); ?></th>
                                            <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                            <th><button type="button" class="btn btn-danger" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_evento']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-sm-4">&nbsp;</div>
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
        <script src="../js/jQuery/plugins/ckeditor/ckeditor.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>
                $(document).ready(function () {

                    $(".date-picker").datepicker({yearRange: "-0:+10", changeMonth: true, changeYear: true, dateFormat: 'yy-mm-dd'});
                    $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});

                    /* Limpiar la ventana modal para volver a usar*/
                    $('body').on('hidden.bs.modal', '.modal', function () {
                        $(this).removeData('bs.modal');
                    });

                    CKEDITOR.replace("txtDescripcion");

                });

                function logout()
                {
                    $("#xAccion").val("logout");
                    $("#frmEventos").submit();
                }

                function msg(opcion)
                {
                    switch (opcion)
                    {
                        case 0:
                            alert("[ERROR] Evento no grabado");
                            break;
                        case 1:
                            alert("Evento grabado con éxito!");
                            break;
                        default:
                            break;

                    }

                }

                function limpiar()
                {
                    $("#xAccion").val("0");
                    $("#txtCveEvento").val("0");
                    $("#frmEventos").submit();
                }

                function validar()
                {
                    var msg = "";
                    var valido = true;

                    if ($("#txtNombre").val() === "")
                    {
                        msg += "Ingrese por favor el nombre del evento";
                        valido = false;
                    }

                    if (!valido)
                    {
                        alert(msg);
                    }
                    return valido;

                }

                function grabar()
                {
                    if (validar())
                    {
                        $("#xAccion").val("grabar");
                        $("#frmEventos").submit();
                    }
                }

                function eliminar(valor)
                {
                    if (confirm("¿Estás realmente seguro de eliminar este registro?"))
                    {
                        $("#xAccion").val("eliminar");
                        $("#txtCveEvento").val(valor);
                        $("#frmEventos").submit();
                    }

                }

                function recargar()
                {
                    $("#xAccion").val("recargar");
                    $("#frmEventos").submit();

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


                msg(<?php echo($count) ?>);
        </script>
    </body>
</html>