<?php
require_once '../clases/Documentacion.php';
require_once '../clases/UtilDB.php';
require_once '../php/functions.php';
session_start();
$numParrafos = 0;
$ids_parrafos = array();


if (!isset($_SESSION['cve_expediente'])) {
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
        $fi = strtotime(str_replace('/', '-', ($_POST['txtFechaInicio'] . " " . "00:00:00")));
        $ff = strtotime(str_replace('/', '-', ($_POST['txtFechaFin'] . " " . "23:59:59")));
        $finicio = date('Y-m-d H:i:s', $fi);
        $ffin = date('Y-m-d H:i:s', $ff);
        $fecha = strtotime(str_replace('/', '-', (date("d/m/Y h:i"))));
        $fmodificacion = date('Y-m-d H:i:s', $fecha);
        $fgrabo=date('Y-m-d H:i:s', $fecha);

        $noticia->setTitulo($_POST['txtTitulo']);
        $noticia->setCveReata($_SESSION['cve_usuario']);
        $noticia->setCveModifico($_SESSION['cve_usuario']);
        $noticia->setNoticiaCorta($_POST['txtNoticiaCorta']);
        if(isset($_POST['txtIdsParrafos']))
        { $tmp = explode(",",$_POST['txtIdsParrafos']);
          $noticia->setNoticia(getParrafoTextoCompleto2($tmp));
        }
        else
        { $noticia->setNoticia(getParrafoTextoCompleto((int) $_POST['txtNumParrafos']));
        }
        $noticia->setFechaInicio($finicio);
        $noticia->setFechaFin($ffin);
        $noticia->setFgrabo($fgrabo);
        $noticia->setFmodifico($fmodificacion);
        $count = $noticia->grabar();
    }
             if ($_POST['xAccion'] == 'eliminar') {
        $noticia->borrar($_POST['txtCveNoticia']);
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
                        <form role="form" name="frmDocumentacion" id="frmDocumentacion" action="documentacion.php" method="POST">
                            <div class="form-group">
                                <label for="xAccion"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>

                                <input type="hidden" class="form-control" id="txtCveExpediente" name="txtCveExpediente"
                                       placeholder="ID Expediente" value="<?php echo($documentacion->getCveExpediente()); ?>">
                            </div>
                            


                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>

                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Noticia</th>
                                        <th>Título</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Foto de Portada</th>
                                        <th>Foto 1</th>
                                        <th>Foto 2</th>
                                        <th>Foto 3</th>
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

                $(".date-picker").datepicker({yearRange: "-0:+10", changeMonth: true, changeYear: true});
                $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});

                /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });

            function agregarParrafo(opcion)
            { 
                if (parrafos === 0)
                {
                    $("#txtParrafo1").toggle("slow");
                    $("#txtParrafo1").focus();
                    $("#txtNumParrafos").val(++parrafos);
                }
                else
                {
                    if ($("#txtParrafo" + (parrafos)).val() === "")
                    {
                        alert("El párrafo actual esta vacío.");
                        $("#txtParrafo" + (parrafos)).focus();
                    }
                    else
                    {   if(opcion === "new")
                        { $("<textarea class=\"form-control\" rows=\"4\" cols=\"50\" id=\"txtParrafo" + (parrafos + 1) + "\" name=\"txtParrafo" + (parrafos + 1) + "\" placeholder=\"Párrafo " + (parrafos + 1) + "\" style=\"display:none;\"></textarea>").insertBefore("#txtParrafo" + parrafos++);//primero se asiga y despues se incrementa en uno.
                          $("#txtParrafo" + (parrafos - 1)).toggle("slow");//Oculto en párrafo anterior 
                        }
                        else
                        {   $("<br/><br/><br/><textarea class=\"form-control\" rows=\"4\" cols=\"50\" id=\"txtParrafo" + (parrafos + 1) + "\" name=\"txtParrafo" + (parrafos + 1) + "\" placeholder=\"Párrafo " + (parrafos + 1) + "\" style=\"display:none;\"></textarea><button type=\"button\" class=\"btn btn-warning\" id=\"btnEliminar"+(parrafos + 1)+"\" name=\"btnEliminar"+(parrafos + 1)+"\" style=\"display:none;\"><span class=\"glyphicon glyphicon-trash\"></span> Eliminar párrafo</button>").insertAfter("#btnEliminar" + parrafos++);//primero se asiga y despues se incrementa en uno.
                            $("#txtIdsParrafos").val($("#txtIdsParrafos").val()+","+parrafos);
                        }
                                    
                        $("#txtParrafo" + (parrafos)).toggle("slow"); //Muestro el párrafo actual.
                        $("#txtParrafo" + (parrafos)).focus();
                        $("#txtNumParrafos").val(parrafos);
                    }

                }

            }

            function eliminarParrafo(num)
            {  if(parrafos === 1)
               { alert("Debe dejar al menos un párrafo."); 
               }
               else
               {   $("#txtParrafo" + num).remove();
                   $("#btnEliminar" + num).remove();
                   $("#txtNumParrafos").val(--parrafos);//primero se decrementa en uno y luego se asigna.
                   //parrafos_eliminar.push(num);
                   //$("#txtIdsParrafosEliminados").val(parrafos_eliminar.toString());
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(','+num,''));
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(num+',',''));
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(num,''));
               }
               
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

