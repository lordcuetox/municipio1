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
    private $cveModifico;
    private $titulo;
    private $noticiaCorta;
    private $noticia;
    private $fechaInicio;
    private $fechaFin;
    private $fotoPortada;
    private $foto1;
    private $foto2;
    private $foto3;
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
        $this->cveReata=0;
        $this->titulo = "";
        $this->noticiaCorta = "";
        $this->noticia = "";
        $this->fechaInicio = null;
        $this->fechaFin = null;
        $this->fotoPortada = "";
        $this->foto1 = "";
        $this->foto2 = "";
        $this->foto3 = "";
        $this->_existe = false;
    }

    function getCveNoticia() {
        return $this->cveNoticia;
    }
 function getCveReata() {
        return $this->cveReata;
    }
    function getTitulo() {
        return $this->titulo;
    }
    function getCveModifico() {
        return $this->cveModifico;
    }

        function getNoticiaCorta() {
        return $this->noticiaCorta;
    }

    function getNoticia() {
        return $this->noticia;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
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

    function setCveNoticia($cveNoticia) {
        $this->cveNoticia = $cveNoticia;
    }
    
      function setCveReata($cveReata) {
        $this->cveReata = $cveReata;
    }
    function setCveModifico($cveModifico) {
        $this->cveModifico = $cveModifico;
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

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
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

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveNoticia = UtilDB::getSiguienteNumero("noticias", "cve_noticia");
            $sql = "INSERT INTO noticias (cve_noticia,cve_reata,titulo,noticia_corta,noticia,"
                    . "fecha_inicio,fecha_fin,foto_portada,foto1,foto2,foto3,cve_modifico)"
                    . " VALUES($this->cveNoticia,$this->cveReata,'$this->titulo','$this->noticiaCorta','$this->noticia','$this->fechaInicio','$this->fechaFin','$this->fotoPortada','$this->foto1','$this->foto2','$this->foto3',$this->cveModifico)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE noticias SET ";
            $sql.= "cve_modifico = $this->cveReata,";
            $sql.= "titulo = '$this->titulo',";
            $sql.= "noticia_corta = '$this->noticiaCorta',";
            $sql.= "noticia = '$this->noticia',";
            $sql.= "fecha_inicio = '$this->fechaInicio',";
            $sql.= "fecha_fin = '$this->fechaFin',";
            $sql.= "foto_portada = '$this->fotoPortada',";
            $sql.= "foto1 = '$this->foto1',";
            $sql.= "foto2 = '$this->foto2',";
            $sql.= "foto3 = '$this->foto3' ";
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
            $this->titulo = $row['titulo'];
            $this->noticiaCorta = $row['noticia_corta'];
            $this->noticia = $row['noticia'];
            $this->fechaInicio = $row['fecha_inicio'];
            $this->fechaFin = $row['fecha_fin'];
            $this->fotoPortada = $row['foto_portada'];
            $this->foto1 = $row['foto1'];
            $this->foto2 = $row['foto2'];
            $this->foto3 = $row['foto3'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }
    
         function borrar($cveNoticia) {
                     $sql = "delete from noticias  WHERE cve_noticia = $cveNoticia";

        $rst = UtilDB::ejecutaConsulta($sql);

         $rst->closeCursor();
         $this->limpiar();
         $this->cargar();
     
     }

}