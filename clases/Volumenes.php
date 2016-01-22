<?php

/**
 *Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');
class Volumenes {

    private $cveVolumen;
    private $cveTipo;
    private $titulo;
    private $autor;
    private $imagen;
    private $descripcion;
    private $grado;
    private $archivo;
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
        }
    }

    function __construct1($cveVolumen) {
        $this->limpiar();
        $this->cveVolumen = $cveVolumen;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveVolumen = 0;
        $this->cveTipo = 0;
        $this->titulo = "";
        $this->autor = "";
        $this->imagen = "";
        $this->descripcion = "";
        $this->grado=0;
        $this->archivo="";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveVolumen() {
        return $this->cveVolumen;
    }
    function getArchivo() {
        return $this->archivo;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

        function getCveTipo() {
        return $this->cveTipo;
    }
    function getGrado() {
        return $this->grado;
    }

    function setGrado($grado) {
        $this->grado = $grado;
    }

        function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveVolumen($cveVolumen) {
        $this->cveVolumen = $cveVolumen;
    }

    function setCveTipo($cveTipo) {
        $this->cveTipo = $cveTipo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    
        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveVolumen = UtilDB::getSiguienteNumero("volumenes", "cve_volumen");
            $sql = "INSERT INTO volumenes (cve_volumen,cve_tipo,titulo,autor,imagen,descripcion,grado,archivo,activo) VALUES($this->cveVolumen,$this->cveTipo,'$this->titulo','$this->autor','$this->imagen','$this->descripcion',$this->grado,'$this->archivo',$this->activo)";

            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE volumenes SET ";
            $sql.= " cve_tipo = $this->cveTipo,";
            $sql.= " titulo = '$this->titulo',";
            $sql.= " autor = '$this->autor',";
            $sql.= " imagen = '$this->imagen',";
            $sql.= " descripcion = '$this->descripcion',";
            $sql.= " grado = $this->grado,";
            $sql.= " archivo = '$this->archivo',";
            $sql.= " activo=" . ($this->activo ? "1" : "0");
            $sql.= " WHERE cve_volumen = $this->cveVolumen";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM volumenes WHERE cve_volumen = $this->cveVolumen";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveVolumen = $row['cve_volumen'];
            $this->cveTipo = $row['cve_tipo'];
             $this->titulo = $row['titulo'];
            $this->autor = $row['autor'];
            $this->imagen = $row['imagen'];
            $this->descripcion = $row['descripcion'];
            $this->grado=$row['grado'];
            $this->archivo = $row['archivo'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveVolumen) {
            
                      /*    $sql = "update  productos set activo =0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);
               $sql = "UPDATE clasificaciones_productos SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);

               $sql = "UPDATE grados SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);
               $sql = "UPDATE clasificaciones SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);

         $rst->closeCursor();
       */
       }

}
