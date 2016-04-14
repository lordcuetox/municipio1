<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}

if(isset($_POST['cveArticulo']) && isset($_POST['cveFraccion'])&& isset($_POST['cveInciso'])&&isset($_POST['cveApartado']))
{
     $cveArticulo=  $_POST['cveArticulo'];
     $cveFraccion =  $_POST['cveFraccion'];
     $cveInciso =  $_POST['cveInciso'];
     $cveApartado =  $_POST['cveApartado'];
    
                               $sql2 = "SELECT * FROM cat_apartados where activo=1 and cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and cve_inciso=$cveInciso ";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
  if($rst2->rowCount()>0)
  {
      ?>
<option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
<?php
    foreach ($rst2 as $row) {
                                 echo("<option value='" . $row['cve_apartado'] . "' " . ($cveApartado== $row['cve_apartado']  ? "selected" : "")  . ">" . $row['descripcion'] . "</option>");
                            }
                            $rst2->closeCursor();
  }
  else
  {
        ?>
 <option value="-1">--------- No tiene ---------</option>
<?php
  }
  return;
}


if(isset($_POST['cveArticulo']) && isset($_POST['cveFraccion'])&& isset($_POST['cveInciso']) )
{ $cveArticulo=  $_POST['cveArticulo'];
  $cveFraccion =  $_POST['cveFraccion'];
       $cveInciso =  $_POST['cveInciso'];
                              $sql2 = "SELECT * FROM cat_apartados where activo=1 and cve_articulo=$cveArticulo and cve_fraccion=$cveFraccion and cve_inciso=$cveInciso ";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
  if($rst2->rowCount()>0)
  {
      ?>

    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                            <?php

                            foreach ($rst2 as $row) {
                                echo("<option value='" . $row['cve_apartado'] . "' "   . ">" . $row['descripcion'] . "</option>");
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



?>
