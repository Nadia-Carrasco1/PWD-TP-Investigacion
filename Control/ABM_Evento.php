<?php

class ABM_Evento {
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Evento
     */
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('summary',$param) && array_key_exists('start',$param) && array_key_exists('end',$param) && array_key_exists('startTime',$param) && array_key_exists('endTime',$param)){
            $obj = new Evento();
            $obj->setear($param['summary'], $param['start'], $param['end'], $param['startTime'], $param['endTime']);
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
        if( isset($param['summary']) && isset($param['start']) && isset($param['end']) ){
            $obj = new Evento();
            $obj->setear($param['summary'], $param['start'], $param['end'], null, null);
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
        if (isset($param['summary']) && isset($param['start']) && isset($param['end']))
            $resp = true;
        return $resp;
    }

     /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtEvento = $this->cargarObjeto($param);
        if ($elObjtEvento!=null && $elObjtEvento->insertar()){
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
            if  (isset($param['summary']))
                $where.=" and summary ='".$param['summary']."'";
            if  (isset($param['start']))
                 $where.=" and start ='".$param['start']."'";
            if  (isset($param['end']))
                $where.=" and end ='".$param['end']."'";
            if  (isset($param['startTime']))
                $where.=" and startTime ='".$param['startTime']."'";
            if  (isset($param['endTime']))
                $where.=" and endTime ='".$param['endTime']."'";
        }
        $arreglo = Evento::listar($where);  
        return $arreglo; 
    }
    
    
    
}