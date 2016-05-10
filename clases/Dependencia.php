<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * @see {@link http://webxico.blogspot.mx/}
 */
class Dependencia {

    private $cveDependencia;
    private $nombre;
    private $activo;
    private $_existe;

    function __construct() {
        $this->limpiar();
        $args = func_get_args();
        $nargs = func_num_args();

        switch ($nargs) {
            case 1:
                self::__construct1($args[0]);
                break;
            //case 2:
            //self::__construct2($args[0], $args[1]);
            //break;
        }
    }

    function __construct1($cveDependencia) {
        $this->limpiar();
        $this->cveDependencia = $cveDependencia;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveDependencia = 0;
        $this->nombre = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveDependencia() {
        return $this->cveDependencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveDependencia($cveDependencia) {
        $this->cveDependencia = $cveDependencia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveDependencia = UtilDB::getSiguienteNumero("DEPENDENCIAS", "CVE_DEPENDENCIA");
            $sql = "INSERT INTO DEPENDENCIAS VALUES($this->cveDependencia,'$this->nombre',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE DEPENDENCIAS SET ";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE CVE_DEPENDENCIA = $this->cveDependencia";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM DEPENDENCIAS WHERE CVE_DEPENDENCIA = $this->cveDependencia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveDependencia = $row['cve_dependencia'];
            $this->nombre = $row['nombre'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar() {
        $sql = "delete from DEPENDENCIAS  WHERE CVE_DEPENDENCIA = $this->cveDependencia";
        UtilDB::ejecutaSQL($sql);
    }

}
