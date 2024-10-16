<?php

class ABM_Evento {
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Evento
     */
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('evento',$param) && array_key_exists('fechaInicio',$param) && array_key_exists('fechaFin',$param) && array_key_exists('horaInicio',$param) && array_key_exists('horaFin',$param)){
            $obj = new Evento();
            $obj->setear($param['evento'], $param['fechaInicio'], $param['fechaFin'], $param['horaInicio'], $param['horaFin']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Evento
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['evento']) && isset($param['fechaInicio']) && isset($param['fechaFin']) ){
            $obj = new Evento();
            $obj->setear($param['evento'], $param['fechaInicio'], $param['fechaFin'], null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['evento']) && isset($param['fechaInicio']) && isset($param['fechaFin']))
            $resp = true;
        return $resp;
    }

     /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['NroDni'] =null;
        $elObjtEvento = $this->cargarObjeto($param);
        if ($elObjtEvento!=null and $elObjtEvento->insertar()){
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtEvento = $this->cargarObjetoConClave($param);
            if ($elObjtEvento!=null and $elObjtEvento->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtEvento = $this->cargarObjeto($param);
            if($elObjtEvento!=null and $elObjtEvento->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param!=NULL){
            if  (isset($param['evento']))
                $where.=" and evento ='".$param['evento']."'";
            if  (isset($param['fechaInicio']))
                 $where.=" and fechaInicio ='".$param['fechaInicio']."'";
            if  (isset($param['fechaFin']))
                $where.=" and fechaFin ='".$param['fechaFin']."'";
            if  (isset($param['horaInicio']))
                $where.=" and horaInicio ='".$param['horaInicio']."'";
            if  (isset($param['horaFin']))
                $where.=" and horaFin ='".$param['horaFin']."'";
        }
        $arreglo = Evento::listar($where);  
        return $arreglo; 
    }
}