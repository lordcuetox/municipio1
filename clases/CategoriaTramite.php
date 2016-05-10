<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * @see {@link http://webxico.blogspot.mx/}
 */
class CategoriaTramite {

    private $cveCategoriaTramite;
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

    function __construct1($cveCategoriaTramite) {
        $this->limpiar();
        $this->cveCategoriaTramite = $cveCategoriaTramite;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveCategoriaTramite = 0;
        $this->nombre = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveCategoriaTramite() {
        return $this->cveCategoriaTramite;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveCategoriaTramite($cveCategoriaTramite) {
        $this->cveCategoriaTramite = $cveCategoriaTramite;
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
            $this->cveCategoriaTramite = UtilDB::getSiguienteNumero("CATEGORIAS_TRAMITES", "CVE_CATEGORIA_TRAMITE");
            $sql = "INSERT INTO CATEGORIAS_TRAMITES VALUES($this->cveCategoriaTramite,'$this->nombre',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE CATEGORIAS_TRAMITES SET ";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE CVE_CATEGORIA_TRAMITE = $this->cveCategoriaTramite";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM CATEGORIAS_TRAMITES WHERE CVE_CATEGORIA_TRAMITE = $this->cveCategoriaTramite";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveCategoriaTramite = $row['cve_categoria_tramite'];
            $this->nombre = $row['nombre'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar() {
        $sql = "delete from CATEGORIAS_TRAMITES  WHERE CVE_CATEGORIA_TRAMITE = $this->cveCategoriaTramite";
        UtilDB::ejecutaSQL($sql);
    }

}
