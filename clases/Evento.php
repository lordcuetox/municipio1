<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * 
 */
require_once('UtilDB.php');

class Evento {

    private $cveEvento;
    private $cveReata;
    private $cveModifico;
    private $nombre;
    private $fotoPrincipal;
    private $foto1;
    private $foto2;
    private $foto3;
    private $foto4;
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $fgrabo;
    private $fmodifico;
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

    function __construct1($cveEvento) {
        $this->limpiar();
        $this->cveEvento = $cveEvento;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveEvento = 0;
        $this->cveModifico=0;
        $this->cveReata=0;
        $this->fgrabo=null;
        $this->fmodifico=null;
        $this->nombre = "";
        $this->fotoPrincipal = "";
        $this->foto1 = "";
        $this->foto2 = "";
        $this->foto3 = "";
        $this->foto4 = "";
        $this->descripcion = "";
        $this->fechaInicio = null;
        $this->fechaFin = null;
        $this->_existe = false;
    }
    
    function getCveReata() {
        return $this->cveReata;
    }

    function getCveModifico() {
        return $this->cveModifico;
    }

    function getFgrabo() {
        return $this->fgrabo;
    }

    function getFmodifico() {
        return $this->fmodifico;
    }

        
    function getCveEvento() {
        return $this->cveEvento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFotoPrincipal() {
        return $this->fotoPrincipal;
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

    function getFoto4() {
        return $this->foto4;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function setCveEvento($cveEvento) {
        $this->cveEvento = $cveEvento;
    }
    function setCveReata($cveReata) {
        $this->cveReata = $cveReata;
    }

    function setCveModifico($cveModifico) {
        $this->cveModifico = $cveModifico;
    }

    function setFgrabo($fgrabo) {
        $this->fgrabo = $fgrabo;
    }

    function setFmodifico($fmodifico) {
        $this->fmodifico = $fmodifico;
    }

        

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFotoPrincipal($fotoPrincipal) {
        $this->fotoPrincipal = $fotoPrincipal;
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

    function setFoto4($foto4) {
        $this->foto4 = $foto4;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveEvento = UtilDB::getSiguienteNumero("eventos", "cve_evento");
            $sql = "INSERT INTO eventos (cve_evento,cve_reata,nombre,foto_principal,foto1,foto2,foto3,foto4,descripcion,fecha_inicio,fecha_fin,fecha_grabo)"
                    . " VALUES($this->cveEvento,$this->cveReata,'$this->nombre','$this->fotoPrincipal','$this->foto1','$this->foto2','$this->foto3','$this->foto4','$this->descripcion','$this->fechaInicio','$this->fechaFin','$this->fgrabo')";
           
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE eventos SET ";
            $sql.= "nombre = '$this->nombre',";
            $sql.= "foto_principal = '$this->fotoPrincipal',";
            $sql.= "foto1 = '$this->foto1',";
            $sql.= "foto2 = '$this->foto2',";
            $sql.= "foto3 = '$this->foto3',";
            $sql.= "foto4 = '$this->foto4',";
            $sql.= "descripcion = '$this->descripcion',";
            $sql.= "fecha_inicio = '$this->fechaInicio',";
            $sql.= "fecha_fin = '$this->fechaFin',";
            $sql.= "fecha_termino = '$this->fmodifico',";
            $sql.= "cve_persona_modifico= $this->cveModifico ";
            $sql.= " WHERE cve_evento = $this->cveEvento";
            
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM eventos WHERE cve_evento = $this->cveEvento";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveEvento = $row['cve_evento'];
            $this->nombre = $row['nombre'];
            $this->fotoPrincipal = $row['foto_principal'];
            $this->foto1 = $row['foto1'];
            $this->foto2 = $row['foto2'];
            $this->foto3 = $row['foto3'];
            $this->foto4 = $row['foto4'];
            $this->descripcion = $row['descripcion'];
            $this->fechaInicio = $row['fecha_inicio'];
            $this->fechaFin = $row['fecha_fin'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }
    
     function borrar($cveEvento) {
                     $sql = "delete from eventos  WHERE cve_evento = $cveEvento";

        $rst = UtilDB::ejecutaConsulta($sql);

         $rst->closeCursor();

         $this->limpiar();
         $this->cargar();
     
     }

}
