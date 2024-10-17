<?php

 class Evento {
    private $summary;
    private $start;
    private $end;
    private $startTime;
    private $endTime;
    private $mensajeOperacion;

    public function __construct() {
        $this->summary = "";
        $this->start = "";
        $this->end = "";
        $this->startTime = "";
        $this->endTime = "";
        $this->mensajeOperacion = "";
    }

    public function setear($summary, $start, $end, $startTime, $endTime) {
        $this->setSummary($summary);
        $this->setStart($start);
        $this->setEnd($end);
        $this->setStartTime($startTime);
        $this->setEndTime($endTime);
    }

    public function getSummary() {
        return $this->summary;
    }
    public function getStart() {
        return $this->start;
    }
    public function getEnd() {
        return $this->end;
    } 
    public function getStartTime() {
        return $this->startTime;
    }
    public function getEndTime() {
        return $this->endTime;
    }
    public function getmensajeoperacion(){
        return $this->mensajeOperacion;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
    }
    public function setStart($start) {
        $this->start = $start;
    }
    public function setEnd($end) {
        $this->end = $end;
    }
    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }
    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }
    public function setmensajeoperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM evento WHERE summary = '".$this->getSummary()."' 
        AND start = '".$this->getStart()."' 
        AND end = '".$this->getEnd()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>-1){
                    $row = $base->Registro();
                    $this->setear($row['summary'], $row['start'], $row['end'], $row['startTime'], $row['endTime']);
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
        $sql="INSERT INTO evento(`summary`, `start`, `end`, `startTime`, `endTime`) 
              VALUES('".$this->getSummary()."', '".$this->getStart()."', '".$this->getEnd()."', '".$this->getStartTime()."', '".$this->getEndTime()."');";
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
        $sql = "UPDATE evento 
        SET `startTime` = '".$this->getStartTime()."', `endTime` = '".$this->getEndTime()."' 
        WHERE `summary` = '".$this->getSummary()."' AND `start` = '".$this->getStart()."' AND `end` = '".$this->getEnd()."'";
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
        $sql="DELETE FROM evento WHERE `summary`=".$this->getSummary()."'AND start='".$this->getStart()."'AND end='".$this->getEnd();
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
                    $obj->setear($row['summary'], $row['start'], $row['end'], $row['startTime'], $row['endTime']);
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