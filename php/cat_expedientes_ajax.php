<?php
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveArticulo']) && isset($_POST['cveFraccion'])&& isset($_POST['cveInciso'])&&isset($_POST['cveApartado'])&&isset($_POST['cveClasificacion'])&&isset($_POST['anio'])&&isset($_POST['trimestre']))
{   $cveArticulo=  $_POST['cveArticulo'];
     $cveFraccion =  $_POST['cveFraccion'];
     $cveInciso =  $_POST['cveInciso'];
     $cveApartado =  $_POST['cveApartado'];
     $cveClasificacion =  $_POST['cveClasificacion'];
     $anio =  $_POST['anio'];
     $trimestre =  $_POST['trimestre'];
    if( $cveArticulo>0&&$cveFraccion>0 &&$cveInciso>0 && $cveApartado>0&&$cveClasificacion>0)
    {
    $sql = "SELECT *,solicitud as dato from documentacion_transparencia where cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and cve_inciso=$cveInciso and cve_apartado=$cveApartado  and cve_clasificacion_apartado=$cveClasificacion and anio=$anio and trimestre=$trimestre";
    }
    else
    {
         if($cveArticulo>0&& $cveFraccion>0 &&$cveInciso>0 && $cveApartado>0)
          {
         $sql = "SELECT *,solicitud as dato from documentacion_transparencia where cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and cve_inciso=$cveInciso and cve_apartado=$cveApartado and anio=$anio and trimestre=$trimestre";    
          }
          else
          {if($cveArticulo>0&& $cveFraccion>0 &&$cveInciso>0 )
             {
             $sql = "SELECT *,solicitud as dato from documentacion_transparencia where cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and cve_inciso=$cveInciso  and anio=$anio and trimestre=$trimestre";    
              }
              else
              {
               if($cveArticulo>0&& $cveFraccion>0)   
               {
                    $sql = "SELECT *,solicitud as dato from documentacion_transparencia where cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and anio=$anio and trimestre=$trimestre";   
               }
               else
               {
                    $sql = "SELECT *,solicitud as dato from documentacion_transparencia where cve_articulo=$cveArticulo and anio=$anio and trimestre=$trimestre"; 
               }
              }
              
          }
    }
 
    $rst = UtilDB::ejecutaConsulta($sql);
    if ($rst->rowCount() > 0) {
        ?>
        <table class="table table-bordered table-striped table-hover table-responsive">
            <thead>
                                    <tr>
                                        <th>ID Expediente</th>
                                        <th>Descripción</th>
                                        <th>Expediente</th>
                                        <th>Folio</th>
                                         <th>¿Es una solicitud?</th>
                                         <th>¿Infomex?</th>
                                        <th>Respuesta</th>
                                        <th>Anexo</th>
                                        <th>PDF</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
            <tbody>
                <?php
                foreach ($rst as $row) {
                    ?>
                              <tr>
                                            <th><a href="javascript:void(0);" onclick="$('#txtCveExpediente').val(<?php echo($row['cve_expediente']); ?>);
                                                        recargar();"><?php echo($row['cve_expediente']); ?></a></th>
                                            <th><?php echo($row['descripcion']); ?></th>
                                            <th><?php echo($row['dato']==1?$row['expediente']:'No aplica'); ?></th>
                                            <th><?php echo($row['dato']==1?$row['folio']:'No aplica'); ?></th>
                                            <th><?php echo($row['dato']==1?'Sí':'No'); ?></th>
                                            <th><?php echo( $row['dato']==1?$row['infomex']:'No aplica'); ?></th>
                                              <?php if($row['dato']==1)
                                             {
                                                 ?>
                                            <th><?php echo($row['respuesta'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['cve_expediente']) . "\" title=\"" . $row['cve_expediente'] . "\" /><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=0\" href=\"javascript:void(0);\">Cambiar respuesta</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=0\" href=\"javascript:void(0);\">Subir respuesta</a>"); ?></th>
                                            <th><?php echo($row['anexo'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['cve_expediente']) . "\" title=\"" . $row['cve_expediente'] . "\" /><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=1\" href=\"javascript:void(0);\">Cambiar anexo</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=1\" href=\"javascript:void(0);\">Subir anexo</a>"); ?></th>
                                            <th>No aplica</th>
                                                <?php
                                             }
                                             else
                                             {
                                            ?>
                                           <th>No aplica</th>
                                           <th>No aplica</th>
                                           <th><?php echo($row['pdf'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['cve_expediente']) . "\" title=\"" . $row['cve_expediente'] . "\" /><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=2\" href=\"javascript:void(0);\">Cambiar documento</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_documentacion_upload.php?xCveExpediente=" . $row['cve_expediente'] . "&xTipo=2\" href=\"javascript:void(0);\">Subir documento</a>"); ?></th>
                                            <?php
                                             }
                                            ?>
                                            <th><button type="button" class="btn btn-warning" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_noticia']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
                                        </tr>
                                             <?php 
                                             
                                             } $rst->closeCursor(); ?>
            </tbody>
        </table>
        <?php
    }
 else {
     ?>
<tr>
    <th> No existen registros</th>
</tr>
      <?php  
    }
}

?>
