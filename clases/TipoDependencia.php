<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * @see {@link http://webxico.blogspot.mx/}
 */
class TipoDependencia {

    private $cveTipoDependencia;
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

    function __construct1($cveTipoDependencia) {
        $this->limpiar();
        $this->cveTipoDependencia = $cveTipoDependencia;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveTipoDependencia = 0;
        $this->nombre = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveTipoDependencia() {
        return $this->cveTipoDependencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveTipoDependencia($cveTipoDependencia) {
        $this->cveTipoDependencia = $cveTipoDependencia;
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
            $this->cveTipoDependencia = UtilDB::getSiguienteNumero("TIPOS_DEPENDENCIA", "CVE_TIPO_DEPENDENCIA");
            $sql = "INSERT INTO TIPOS_DEPENDENCIA VALUES($this->cveTipoDependencia,'$this->nombre',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE TIPOS_DEPENDENCIA SET ";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE CVE_TIPO_DEPENDENCIA = $this->cveTipoDependencia";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM TIPOS_DEPENDENCIA WHERE CVE_TIPO_DEPENDENCIA = $this->cveTipoDependencia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveTipoDependencia = $row['cve_tipo_dependencia'];
            $this->nombre = $row['nombre'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar() {
        $sql = "delete from TIPOS_DEPENDENCIA  WHERE CVE_TIPO_DEPENDENCIA = $this->cveTipoDependencia";
        UtilDB::ejecutaSQL($sql);
    }

}
