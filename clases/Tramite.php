<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * @see {@link http://webxico.blogspot.mx/}
 */
class Tramite {

    private $cveTramite;

    /**
     * @var TipoTramite $cveTipoTramite Tipo TipoTramite
     */
    private $cveTipoTramite;

    /**
     * @var CategoriaTramite $cveCategoriaTramite Tipo CategoriaTramite
     */
    private $cveCategoriaTramite;

    /**
     * @var Dependencia $cveDependencia Tipo Dependencia
     */
    private $cveDependencia;
    private $nombre;
    private $pdf;
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

    function __construct1($cveTramite) {
        $this->limpiar();
        $this->cveTramite = $cveTramite;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveTramite = 0;
        $this->cveTipoTramite = NULL;
        $this->cveCategoriaTramite = NULL;
        $this->cveDependencia = NULL;
        $this->nombre = "";
        $this->pdf = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveTramite() {
        return $this->cveTramite;
    }

    /**
     * @return TipoTramite Devuelve tipo TipoTramite
     */
    function getCveTipoTramite() {
        return $this->cveTipoTramite;
    }

    /**
     * @return CategortiaTramite Devuelve tipo CategortiaTramite
     */
    function getCveCategoriaTramite() {
        return $this->cveCategoriaTramite;
    }

    /**
     * @return Dependencia Devuelve tipo Dependencia
     */
    function getCveDependencia() {
        return $this->cveDependencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPdf() {
        return $this->pdf;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveTramite($cveTramite) {
        $this->cveTramite = $cveTramite;
    }

    function setCveTipoTramite(TipoTramite $cveTipoTramite) {
        $this->cveTipoTramite = $cveTipoTramite;
    }

    function setCveCategoriaTramite(CategoriaTramite $cveCategoriaTramite) {
        $this->cveCategoriaTramite = $cveCategoriaTramite;
    }

    function setCveDependencia(Dependencia $cveDependencia) {
        $this->cveDependencia = $cveDependencia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPdf($pdf) {
        $this->pdf = $pdf;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveDependencia = UtilDB::getSiguienteNumero("TRAMITES", "CVE_TRAMITE");
            $sql = "INSERT INTO TRAMITES VALUES($this->cveTramite," . ($this->cveTipoTramite->getCveTipoTramite()) . "," . ($this->cveCategoriaTramite->getCveCategoriaTramite()) . "," . ($this->cveDependencia->getCveDependencia()) . ",'$this->nombre','$this->pdf',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE TRAMITES SET ";
            $sql.= "cve_tipo_tramite = " . $this->cveTipoTramite->getCveTipoTramite() . ",";
            $sql.= "cve_categoria_tramite = " . $this->cveCategoriaTramite->getCveCategoriaTramite() . ",";
            $sql.= "cve_dependencia = " . $this->cveDependencia->getCveDependencia() . ",";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "pdf = '$this->pdf',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE CVE_TRAMITE = $this->cveDependencia";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM TRAMITES WHERE CVE_TRAMITE = $this->cveTramite";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveTramite = $row['cve_tramite'];
            $this->cveTipoTramite = $row['cve_tipo_tramite'];
            $this->cveCategoriaTramite = $row['cve_categoria_tramite'];
            $this->cveDependencia = $row['cve_dependencia'];
            $this->nombre = $row['nombre'];
            $this->pdf = $row['pdf'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar() {
        $sql = "delete from TRAMITES  WHERE CVE_TRAMITE = $this->cveTramite";
        UtilDB::ejecutaSQL($sql);
    }

}
