<?php

/**
 *
 * @author Jorge José Jiménez Del Cueto
 * 
 */
require_once('UtilDB.php');

class Noticia {

    private $cveNoticia;
    private $cveReata;
    private $tipoEvento;
    private $titulo;
    private $noticiaCorta;
    private $noticia;
    private $fotoPortada;
    private $foto1;
    private $foto2;
    private $foto3;
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

    function __construct1($cveNoticia) {
        $this->limpiar();
        $this->cveNoticia = $cveNoticia;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveNoticia = 0;
        $this->cveReata = 0;
        $this->tipoEvento = 0;
        $this->titulo = "";
        $this->noticiaCorta = "";
        $this->noticia = "";
        $this->fotoPortada = "";
        $this->foto1 = "";
        $this->foto2 = "";
        $this->foto3 = "";
        $this->fechaGrabo = null;
        $this->fechaModifico = null;
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveNoticia() {
        return $this->cveNoticia;
    }

    function getCveReata() {
        return $this->cveReata;
    }

    function getTipoEvento() {
        return $this->tipoEvento;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getNoticiaCorta() {
        return $this->noticiaCorta;
    }

    function getNoticia() {
        return $this->noticia;
    }

    function getFotoPortada() {
        return $this->fotoPortada;
    }

    function getFoto1() {
        return $this->foto1;
    }

    function getFoto2() {
        return $this->foto2;
    }

    function getFoto3() {
        return $this->foto3;
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

    function setCveNoticia($cveNoticia) {
        $this->cveNoticia = $cveNoticia;
    }

    function setCveReata($cveReata) {
        $this->cveReata = $cveReata;
    }

    function setTipoEvento($tipoEvento) {
        $this->tipoEvento = $tipoEvento;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setNoticiaCorta($noticiaCorta) {
        $this->noticiaCorta = $noticiaCorta;
    }

    function setNoticia($noticia) {
        $this->noticia = $noticia;
    }

    function setFotoPortada($fotoPortada) {
        $this->fotoPortada = $fotoPortada;
    }

    function setFoto1($foto1) {
        $this->foto1 = $foto1;
    }

    function setFoto2($foto2) {
        $this->foto2 = $foto2;
    }

    function setFoto3($foto3) {
        $this->foto3 = $foto3;
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
            $this->cveNoticia = UtilDB::getSiguienteNumero("noticias", "cve_noticia");
            $sql = "INSERT INTO noticias (cve_noticia,cve_reata,tipo_evento,titulo,noticia_corta,noticia,"
                    . "foto_portada,foto1,foto2,foto3,fecha_grabo,activo)"
                    . " VALUES($this->cveNoticia,$this->cveReata,$this->tipoEvento,'$this->titulo','$this->noticiaCorta','$this->noticia',NULL,NULL,NULL,NULL,NOW(),$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE noticias SET ";
            $sql.= "tipo_evento = $this->tipoEvento,";
            $sql.= "titulo = '$this->titulo',";
            $sql.= "noticia_corta = '$this->noticiaCorta',";
            $sql.= "noticia = '$this->noticia',";
            $sql.= "foto_portada = '$this->fotoPortada',";
            $sql.= "foto1 = '$this->foto1',";
            $sql.= "foto2 = '$this->foto2',";
            $sql.= "foto3 = '$this->foto3', ";
            $sql.= "fecha_modifico= NOW(), ";
            $sql.= "cve_modifico = $this->cveReata,";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE cve_noticia = $this->cveNoticia";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM noticias WHERE cve_noticia = $this->cveNoticia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveNoticia = $row['cve_noticia'];
            $this->cveReata = $row['cve_reata'];
            $this->tipoEvento = $row['tipo_evento'];
            $this->titulo = $row['titulo'];
            $this->noticiaCorta = $row['noticia_corta'];
            $this->noticia = $row['noticia'];
            $this->fotoPortada = $row['foto_portada'];
            $this->foto1 = $row['foto1'];
            $this->foto2 = $row['foto2'];
            $this->foto3 = $row['foto3'];
            $this->fechaGrabo = $row['fecha_grabo'];
            $this->fechaModifico = $row['fecha_modifico'];
            $this->cveModifico = $row['cve_modifico'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

    function borrar($cveNoticia) {
        $sql = "delete from noticias  WHERE cve_noticia = $cveNoticia";
        UtilDB::ejecutaSQL($sql);
        $this->limpiar();
        $this->cargar();
    }

}