<?php
require_once '../clases/Documentacion.php';
require_once '../clases/UtilDB.php';
require_once '../php/functions.php';
session_start();
$numParrafos = 0;
$ids_parrafos = array();


if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}



$documentacion = new Documentacion();
$count = NULL;

if (isset($_POST['txtCveExpediente'])) {
    if ($_POST['txtCveExpediente'] != 0) {
        $documentacion = new Documentacion($_POST['txtCveExpediente']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {

    }
             if ($_POST['xAccion'] == 'eliminar') {
        $documentacion->borrar($_POST['txtCveExpediente']);
    }


    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}

$sql = "SELECT * FROM noticias ORDER BY cve_noticia DESC";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de contenido | Transparencia</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial del Ayuntamiento de Macuspana">
        <meta name="keywords" content="Página oficial del Ayuntamiento de Macuspana">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link href="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet"/>
        <!-- Bootstrap Core CSS -->
        <link href="../startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- MetisMenu CSS -->
        <link href="../startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="../startbootstrap-sb-admin-2-1.0.5/dist/css/sb-admin-2.css" rel="stylesheet"/>
        <!-- Custom Fonts -->
        <link href="../startbootstrap-sb-admin-2-1.0.5/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
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
                        <h1 class="page-header">Transparencia</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-8">&nbsp;</div>
                    <div class="col-sm-8">
                        <form role="form" name="frmDocumentacion" id="frmDocumentacion" action="cat_documentacion.php" method="POST">
                            <div class="form-group">
                                <label for="xAccion"><input type="text" class="form-control" name="xAccion" id="xAccion" value="0" /></label>

                                <input type="hidden" class="form-control" id="txtCveExpediente" name="txtCveExpediente"
                                       placeholder="ID Expediente" value="<?php echo($documentacion->getCveExpediente()); ?>">
                            </div>
                                                        <div class="form-group">
                                <label for="cmbCveArticulo">Artículo</label>
                                <select name="cmbCveArticulo" id="cmbCveArticulo" class="form-control" placeholder="Artículo">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql2 = "SELECT * FROM cat_articulos where activo=1 ORDER BY descripcion";
                                    $rst2 = UtilDB::ejecutaConsulta($sql2);
                                    foreach ($rst2 as $row) {
                                        echo("<option value='" . $row['cve_articulo'] . "' " . ($documentacion->getCveArticulo() != 0 ? ($documentacion->getCveArticulo() == $row['cve_articulo'] ? "selected" : "") : "") . ">" . $row['descripcion'] . "</option>");
                                    }
                                    $rst2->closeCursor();
                                    ?>

                                </select>
                            </div>
                                                        <div class="form-group">
                                <label for="ajaxCmbFraccion">Fracción:</label>
                                <select name="ajaxCmbFraccion" id="ajaxCmbFraccion" class="form-control" placeholder="Fracción" disabled>
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>


                                </select>
                            </div>
                            


                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>

                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Expediente</th>
                                        <th>Descripción</th>
                                        <th>Expediente</th>
                                        <th>Folio</th>
                                         <th>¿Infomex?</th>
                                        <th>Respuesta</th>
                                        <th>Anexo</th>
                                        <th>PDF</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($rst as $row) { ?>
                                        <tr>
                                            <th><a href="javascript:void(0);" onclick="$('#txtCveNoticia').val(<?php echo($row['cve_noticia']); ?>);
                                                        recargar();"><?php echo($row['cve_noticia']); ?></a></th>
                                            <th><?php echo($row['titulo']); ?></th>
                                            <th><?php echo($row['fecha_inicio']); ?></th>
                                            <th><?php echo($row['fecha_fin']); ?></th>
                                            <th><?php echo($row['foto_portada'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['titulo']) . "\" title=\"" . $row['titulo'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto_portada'] . "' alt='" . $row['titulo'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=0\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=0\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto1'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['titulo']) . "\" title=\"" . $row['titulo'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto1'] . "' alt='" . $row['titulo'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=1\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=1\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto2'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['titulo']) . "\" title=\"" . $row['titulo'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto2'] . "' alt='" . $row['titulo'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=2\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=2\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto3'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['titulo']) . "\" title=\"" . $row['titulo'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto3'] . "' alt='" . $row['titulo'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=3\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_noticias_upload_img.php?xCveNoticia=" . $row['cve_noticia'] . "&xNumImagen=3\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><button type="button" class="btn btn-warning" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_noticia']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
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
        <script src="../startbootstrap-sb-admin-2-1.0.5/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>
            var parrafos = <?php echo((int)$numParrafos); ?>;
            var parrafos_eliminar = new Array();

            $(document).ready(function () {
                $("#cmbCveArticulo").change(function () {
                    var cveOriente = 0;
                    //   var optionSelected = $("option:selected", this);
                    //    var valueSelected = this.value;
                    cveArticulo = this.value;
                    cargarComboFraccion(cveArticulo);

                });

                $("#ajaxCmbFraccion").change(function () {
                    //   var optionSelected = $("option:selected", this);
                    //    var valueSelected = this.value;
                    cargarMuestra($("#cmbCveOriente").val(), this.value);

                });

               /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
                        function cargarComboFraccion(cveArticulo)
            {   //En el div con id 'ajaxCmb' se cargara lo que devuelva el ajax, esta petición  es realizada como POST

                $("#ajaxCmbFraccion").load("cat_fracciones_combos_ajax.php", {"cveArticulo": cveArticulo}, function (responseTxt, statusTxt, xhr) {
                    $("#ajaxCmbFraccion").attr({'disabled': false});
                    cargarCombo2($("#cmbCveArticulo").val(), $("#ajaxCmbFraccion").val());
                });
            }
                        function cargarComboFraccion2(cveArticulo, cveFraccion)
            {   //En el div con id 'ajaxCmb' se cargara lo que devuelva el ajax, esta petición  es realizada como POST
                // $("#ajaxCmb").html("");
                $("#ajaxCmbFraccion").load("cat_fracciones_combos_ajax.php", {"cveArticulo": cveArticulo, "cveFraccion": cveFraccion}, function (responseTxt, statusTxt, xhr) {
                    $("#ajaxCmbFraccion").attr({'disabled': false});
                   // cargarMuestra(cveOriente, cveGranLogia);
                });
            }




            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmNoticias").submit();
            }

            function msg(opcion)
            {
                switch (opcion)
                {
                    case 0:
                        alert("[ERROR] Noticia no grabada");
                        break;
                    case 1:
                        alert("Noticia grabada con éxito!");
                        break;
                    default:
                        break;

                }

            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveNoticia").val("0");
                $("#frmNoticias").submit();
            }

            function validar()
            {
                var msg = "";
                var valido = false;

                if ($("#txtParrafo1").val() === "" && parrafos === 0)
                {
                    msg += "Agregue por lo menos un párrafo a la noticia.";
                }
                else if ($("#txtParrafo" + (parrafos)).val() === "")
                {
                    $("#txtParrafo" + (parrafos)).focus();
                    msg += "El párrafo actual esta vacío.";
                }
                else
                {
                    valido = true;
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
                    $("#frmNoticias").submit();
                }
            }

            function eliminar(valor)
            {

                $("#xAccion").val("eliminar");
                $("#txtCveNoticia").val(valor);
                $("#frmNoticias").submit();

            }




            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmNoticias").submit();

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

