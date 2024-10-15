<?php

 class Persona {
    private $nroDni;
    private $apellido;
    private $nombre;
    private $mensajeOperacion;

    public function __construct() {
        $this->nroDni = "";
        $this->apellido = "";
        $this->nombre = "";
        $this->mensajeOperacion = "";
    }

    public function setear($nroDni, $apellido, $nombre) {
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
    }

    public function getNroDni() {
        return $this->nroDni;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getNombre() {
        return $this->nombre;
    }   
    public function getmensajeoperacion(){
        return $this->mensajeOperacion;
    }

    public function setNroDni($nroDni) {
        $this->nroDni = $nroDni;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setmensajeoperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM persona WHERE NroDni = ".$this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre']);
                    //$resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("persona->listar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona(NroDni, Apellido, Nombre) 
              VALUES('".$this->getNroDni()."', '".$this->getApellido()."', '".$this->getNombre()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("persona->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE persona SET Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."' WHERE NroDni='".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("persona->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE NroDni=".$this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona";
        if ($parametro!="") {
            $sql.=' WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("persona->listar: ".$base->getError());
        }
        return $arreglo;
    }
}

?>