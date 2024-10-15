<?php

 class Persona {
    private $evento;
    private $fechaInicio;
    private $fechaFin;
    private $horaInicio;
    private $horaFin;
    private $mensajeOperacion;

    public function __construct() {
        $this->evento = "";
        $this->fechaInicio = "";
        $this->fechaFin = "";
        $this->horaInicio = "";
        $this->horaFin = "";
        $this->mensajeOperacion = "";
    }

    public function setear($evento, $fechaInicio, $fechaFin, $horaInicio, $horaFin) {
        $this->setEvento($evento);
        $this->setFechaInicio($fechaInicio);
        $this->setFechaFin($fechaFin);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
    }

    public function getEvento() {
        return $this->evento;
    }
    public function getFechaInicio() {
        return $this->fechaInicio;
    }
    public function getFechaFin() {
        return $this->fechaFin;
    } 
    public function getHoraInicio() {
        return $this->horaInicio;
    }
    public function getHoraFin() {
        return $this->horaFin;
    }
    public function getmensajeoperacion(){
        return $this->mensajeOperacion;
    }

    public function setEvento($evento) {
        $this->evento = $evento;
    }
    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }
    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }
    public function setHoraFin($horaFin) {
        $this->horaFin = $horaFin;
    }
    public function setmensajeoperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM evento WHERE evento = ".$this->getEvento()." AND fechaInicio = ".$this->getFechaInicio()." AND fechaFin = ".$this->getFechaFin();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['evento'], $row['fechaInicio'], $row['fechaFin'], $row['horaInicio'], $row['horaFin']);
                    //$resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("evento->listar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO evento(evento, fechaInicio, fechaFin, horaInicio, horaFin) 
              VALUES('".$this->getEvento()."', '".$this->getFechaInicio()."', '".$this->getFechaFin()."', '".$this->getHoraInicio()."', '".$this->getHoraFin()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("evento->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("evento->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE evento SET horaInicio='".$this->getHoraInicio()."', horaFin='".$this->getHoraFin()."' WHERE evento='".$this->getEvento()."'. AND . ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("evento->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("evento->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM evento WHERE evento=".$this->getEvento()."AND fechaInicio=".$this->getFechaInicio()."AND fechaFin=".$this->getFechaFin();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("evento->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("evento->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM evento";
        if ($parametro!="") {
            $sql.=' WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new Evento();
                    $this->setear($row['evento'], $row['fechaInicio'], $row['fechaFin'], $row['horaInicio'], $row['horaFin']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("evento->listar: ".$base->getError());
        }
        return $arreglo;
    }
}

?>