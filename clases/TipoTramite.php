<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * @see {@link http://webxico.blogspot.mx/}
 */
class TipoTramite {

    private $cveTipoTramite;

    /**
     * @var ClasificacionTramite $cveClasificacionTramite Tipo ClasificacionTramite
     */
    private $cveClasificacionTramite;
    private $nombre;
    private $img;
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

    function __construct1($cveTipoTramite) {
        $this->limpiar();
        $this->cveTipoTramite = $cveTipoTramite;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveTipoTramite = 0;
        $this->cveClasificacionTramite = NULL;
        $this->nombre = "";
        $this->img = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveTipoTramite() {
        return $this->cveTipoTramite;
    }

    /**
     * @return ClasificacionTramite Devuelve tipo ClasificacionTramite
     */
    function getCveClasificacionTramite() {
        return $this->cveClasificacionTramite;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getImg() {
        return $this->img;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveTipoTramite($cveTipoTramite) {
        $this->cveTipoTramite = $cveTipoTramite;
    }

    /**
     * Establece la clasificación del tramite.
     *
     * @param ClasificacionTramite $cveClasificacionTramite Objeto tipo ClasificacionTramite
     *
     */
    function setCveClasificacionTramite(ClasificacionTramite $cveClasificacionTramite) {
        $this->cveClasificacionTramite = $cveClasificacionTramite;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveTipoTramite = UtilDB::getSiguienteNumero("TIPOS_TRAMITES", "CVE_TIPO_TRAMITE");
            $sql = "INSERT INTO TIPOS_TRAMITES VALUES($this->cveTipoTramite,".($this->cveClasificacionTramite->getCveClasificacionTramite()).",'$this->nombre','$this->img',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE TIPOS_TRAMITES SET ";
            $sql.= "cve_clasificacion_tramite = ".($this->cveClasificacionTramite->getCveClasificacionTramite()).",";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE CVE_TIPO_TRAMITE = $this->cveTipoTramite";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM TIPOS_TRAMITES WHERE CVE_TIPO_TRAMITE = $this->cveTipoTramite";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveTipoTramite = $row['cve_tipo_tramite'];
            $this->cveClasificacionTramite = new ClasificacionTramite((int) $row['cve_clasificacion_tramite']);
            $this->nombre = $row['nombre'];
            $this->img = $row['img'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar() {
        $sql = "delete from TIPOS_TRAMITES  WHERE CVE_TIPO_TRAMITE = $this->cveTipoTramite";
        UtilDB::ejecutaSQL($sql);
    }

}
