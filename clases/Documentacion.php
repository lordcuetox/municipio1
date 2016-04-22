<?php

/**
 *
 * @author Jorge José Jiménez Del Cueto
 * 
 */
require_once('UtilDB.php');

class Documentacion {

    private $cveArticulo;
    private $cveFraccion;
    private $cveInciso;
    private $cveApartado;
    private $cveClasificacion;
    private $anio;
    private $trimestre;
    private $cveExpediente;
    private $cveReata;
    private $descripcion;
    private $expediente;
    private $folio;
    private $respuesta;
    private $anexo;
    private $pdf;
    private $infomex;
    private $solicitud;
    private $fechaActualizacionDocumento;
    private $fechaGrabo;
    private $fechaModifico;
    private $cveModifico;
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

    function __construct1($cveExpediente) {
        $this->limpiar();
        $this->cveExpediente = $cveExpediente;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveArticulo = 0;
        $this->cveFraccion = 0;
        $this->cveInciso = 0;
        $this->cveApartado = 0;
        $this->cveClasificacion = 0;
        $this->anio = 0;
        $this->trimestre = 0;
        $this->cveExpediente = 0;
        $this->cveReata = 0;
        $this->descripcion = "";
        $this->expediente = "";
        $this->folio = "";
        $this->respuesta = "";
        $this->anexo = "";
        $this->pdf = "";
        $this->infomex = false;
        $this->solicitud = false;
        $this->fechaActualizacionDocumento = null;
        $this->fechaGrabo = null;
        $this->fechaModifico = null;
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveArticulo() {
        return $this->cveArticulo;
    }

    function getCveFraccion() {
        return $this->cveFraccion;
    }

    function getCveInciso() {
        return $this->cveInciso;
    }

    function getCveApartado() {
        return $this->cveApartado;
    }

    function getCveClasificacion() {
        return $this->cveClasificacion;
    }

    function getAnio() {
        return $this->anio;
    }

    function getTrimestre() {
        return $this->trimestre;
    }

    function getCveExpediente() {
        return $this->cveExpediente;
    }

    function getCveReata() {
        return $this->cveReata;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getExpediente() {
        return $this->expediente;
    }

    function getFolio() {
        return $this->folio;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function getAnexo() {
        return $this->anexo;
    }

    function getPdf() {
        return $this->pdf;
    }

    function getInfomex() {
        return $this->infomex;
    }

    function getSolicitud() {
        return $this->solicitud;
    }

    function getFechaActualizacionDocumento() {
        return $this->fechaActualizacionDocumento;
    }

    function getFechaGrabo() {
        return $this->fechaGrabo;
    }

    function getFechaModifico() {
        return $this->fechaModifico;
    }

    function getCveModifico() {
        return $this->cveModifico;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveArticulo($cveArticulo) {
        $this->cveArticulo = $cveArticulo;
    }

    function setCveFraccion($cveFraccion) {
        $this->cveFraccion = $cveFraccion;
    }

    function setCveInciso($cveInciso) {
        $this->cveInciso = $cveInciso;
    }

    function setCveApartado($cveApartado) {
        $this->cveApartado = $cveApartado;
    }

    function setCveClasificacion($cveClasificacion) {
        $this->cveClasificacion = $cveClasificacion;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setTrimestre($trimestre) {
        $this->trimestre = $trimestre;
    }

    function setCveExpediente($cveExpediente) {
        $this->cveExpediente = $cveExpediente;
    }

    function setCveReata($cveReata) {
        $this->cveReata = $cveReata;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setExpediente($expediente) {
        $this->expediente = $expediente;
    }

    function setFolio($folio) {
        $this->folio = $folio;
    }

    function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    function setAnexo($anexo) {
        $this->anexo = $anexo;
    }

    function setPdf($pdf) {
        $this->pdf = $pdf;
    }

    function setInfomex($infomex) {
        $this->infomex = $infomex;
    }

    function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    function setFechaActualizacionDocumento($fechaActualizacionDocumento) {
        $this->fechaActualizacionDocumento = $fechaActualizacionDocumento;
    }

    function setFechaGrabo($fechaGrabo) {
        $this->fechaGrabo = $fechaGrabo;
    }

    function setFechaModifico($fechaModifico) {
        $this->fechaModifico = $fechaModifico;
    }

    function setCveModifico($cveModifico) {
        $this->cveModifico = $cveModifico;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveExpediente = UtilDB::getSiguienteNumero("documentacion_transparencia", "cve_expediente");
            $sql = "INSERT INTO documentacion_transparencia (cve_articulo,cve_fraccion,cve_inciso,cve_apartado,cve_clasificacion_apartado,"
                    . "anio,trimestre,cve_expediente,cve_reata,descripcion,expediente,folio,respuesta,anexo,pdf,solicitud,infomex,fecha_actualizacion_documento,fecha_grabo,activo)"
                    . " VALUES($this->cveArticulo,$this->cveFraccion,$this->cveInciso,$this->cveApartado,$this->cveClasificacion,$this->anio,$this->trimestre,'$this->cveExpediente',$this->cveReata,'$this->descripcion','$this->expediente','$this->folio','$this->respuesta','$this->anexo','$this->pdf',$this->solicitud,$this->infomex,'$this->fechaActualizacionDocumento',NOW(),$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE documentacion_transparencia SET ";
            $sql.= "cve_articulo = $this->cveArticulo,";
            $sql.= "cve_fraccion = $this->cveFraccion,";
            $sql.= "cve_inciso = $this->cveInciso,";
            $sql.= "cve_apartado = $this->cveApartado,";
            $sql.= "cve_clasificacion_apartado = $this->cveClasificacion,";
            $sql.= "anio = $this->anio,";
            $sql.= "trimestre = $this->trimestre,";
            $sql.= "descripcion = '$this->descripcion',";
            $sql.= "expediente = '$this->expediente', ";
            $sql.= "folio= '$this->folio', ";
            $sql.= "respuesta= '$this->respuesta', ";
            $sql.= "anexo= '$this->anexo', ";
            $sql.= "pdf= '$this->pdf', ";
            $sql.= "infomex= $this->infomex, ";
            $sql.= "solicitud= $this->solicitud, ";
            $sql.= "fecha_actualizacion_documento = '$this->fechaActualizacionDocumento', ";
            $sql.= "fecha_modifico= NOW(), ";
            $sql.= "cve_modifico= $this->cveModifico, ";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE cve_expediente = $this->cveExpediente";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM documentacion_transparencia WHERE cve_expediente = $this->cveExpediente";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveArticulo = $row['cve_articulo'];
            $this->cveFraccion = $row['cve_fraccion'];
            $this->cveInciso = $row['cve_inciso'];
            $this->cveApartado = $row['cve_apartado'];
            $this->cveClasificacion = $row['cve_clasificacion_apartado'];
            $this->anio = $row['anio'];
            $this->trimestre = $row['trimestre'];
            $this->cveExpediente = $row['cve_expediente'];
            $this->cveReata = $row['cve_reata'];
            $this->descripcion = $row['descripcion'];
            $this->expediente = $row['expediente'];
            $this->folio = $row['folio'];
            $this->respuesta = $row['respuesta'];
            $this->anexo = $row['anexo'];
            $this->pdf = $row['pdf'];
            $this->infomex = $row['infomex'];
            $this->solicitud = $row['solicitud'];
            $this->fechaActualizacionDocumento = $row['fecha_actualizacion_documento'];
            $this->fechaGrabo = $row['fecha_grabo'];
            $this->fechaModifico = $row['fecha_modifico'];
            $this->cveModifico = $row['cve_modifico'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar($cveExpediente) {
        $sql = "delete from documentacion_transparencia  WHERE cve_expediente = $cveExpediente";
        UtilDB::ejecutaSQL($sql);
        $this->limpiar();
        $this->cargar();
    }

    function getJsonData() {
        $var = get_object_vars($this);
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value, 'getJsonData')) {
                $value = $value->getJsonData();
            }
        }
        return $var;
    }

}
