<?php

class modelo_detalle {
    // propiedades de detalle
    private $iddet;
    private $idpan;
    private $idped;
    private $can;
    private $descto;
    
    function getIddet() {
        return $this->iddet;
    }

    function getIdpan() {
        return $this->idpan;
    }
    
    function getIdped() {
        return $this->idped;
    }

    function getCan() {
        return $this->can;
    }
    
    function getDescto() {
        return $this->descto;
    }

    function setIddet($iddet) {
        $this->iddet = $iddet;
    }

    function setIdped($idped) {
        $this->idped = $idped;
    }

    function setIdpan($idpan) {
        $this->idpan = $idpan;
    }

    function setCan($can) {
        $this->can = $can;
    }   

    function setDescto($descto) {
        $this->descto = $descto;
    }   

    private $base;
    private $pan;
    
    
    public function __construct() {
        include_once 'Conectar.php';
        $this->base = Conectar::conexion();
        $this->pan = array();
    }
    
    public function ListadoDetalles(){
        $pan = $this->base -> query ("call usp_ListaDetalles()");
        
        while ($fila = $pan->fetch(PDO::FETCH_ASSOC)){
            $this-> pan[] =  $fila;
        }
        return $this->pan;
    }

    public function ListadoDetalles2($xped){
        $pan = $this->base -> query ("SELECT d.id_det, p.id_pan, p.nom_pan, d.can_pan, d.descto, d.imp_pan, d.can_dev
        from detalle d inner join panes p on d.id_pan=p.id_pan WHERE id_ped=".$xped);
        
        while ($fila = $pan->fetch(PDO::FETCH_ASSOC)){
            $this-> pan[] =  $fila;
        }
        return $this->pan;
    }
       
    public function ingresar_Detalle(){
        $sql = "call usp_IngresarDetalle(?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->idpan);
        $sentencia ->bindParam(2, $this->can);
        $sentencia ->bindParam(3, $this->descto);

        if (!$sentencia){
            return 'Error de datos';
           
        }else{            
            $sentencia->execute();
        }
    }
    
    public function Eliminar_Detalle($id){
        $sql = "call usp_EliminarDetalle(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $id);
        if (!$sentencia){
            echo 0;
            return 'Error al eliminar el cliente';
            
        }else{
            echo 1;
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }

    public function actualizar_detalle(){
        $sql = "call usp_ActualizarDetalle(?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->iddet);
        $sentencia ->bindParam(2, $this->idpan);
        $sentencia ->bindParam(3, $this->can);

        if (!$sentencia){            
           
        }else{            
            $sentencia->execute();            
        }
        
    }
    
}
