<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveArticulo']) && isset($_POST['cveFraccion']) )
{ $cveArticulo=  $_POST['cveArticulo'];
  $cveFraccion =  $_POST['cveFraccion'];
                              $sql2 = "SELECT * FROM cat_fracciones where activo=1 and cve_articulo=$cveArticulo ORDER BY descripcion";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
  if($rst2->rowCount()>0)
  {
      ?>

    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                            <?php

                            foreach ($rst2 as $row) {
                                echo("<option value='" . $row['cve_fraccion'] . "' " . ($cveFraccion== $row['cve_fraccion']  ? "selected" : "")  . ">" . $row['descripcion'] . "</option>");
                            }
                            $rst2->closeCursor();
                            ?> 

<?php
  }
 else {
  ?> 
    <option value="-1">--------- No tiene ---------</option>
<?php
      
  }
return;}
if(isset($_POST['cveArticulo']))
{ $cveArticulo =  $_POST['cveArticulo'];
                            $sql2 = "SELECT * FROM cat_fracciones where activo=1 and cve_articulo=$cveArticulo ORDER BY descripcion";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
    if($rst2->rowCount()>0)
  {
?>

     <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                            <?php

                            foreach ($rst2 as $row) {
                                echo("<option value='" . $row['cve_fraccion'] . "'> " . $row['descripcion'] . "</option>");
                            }
                            $rst2->closeCursor();
                            ?> 
<?php
  }
 else {
    ?> 
    <option value="0">--------- No tiene ---------</option>
<?php    
  }
return;}


?>
