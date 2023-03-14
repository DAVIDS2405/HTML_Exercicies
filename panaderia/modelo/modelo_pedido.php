<?php

class modelo_pedido {
    //Campos de la tabla pedido
    private $id;
    private $idcli;
    private $fec;
    private $tot;    
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getIdcli() {
        return $this->idcli;
    }

    function getFec() {
        return $this->fec;
    }

    function getTot() {
        return $this->tot;
    }

    function getEst() {
        return $this->est;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdcli($idcli) {
        $this->idcli = $idcli;
    }

    function setFec($fec) {
        $this->fec = $fec;
    }

    function setTot($tot) {
        $this->tot = $tot;
    }
       
    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $pedidos;
    
    public function __construct() {
        include_once 'conectar.php';
        $this->base = conectar::conexion();
        $this->login = array();
        $this->pedidos = array();
    }  
      
       
    public function registro_pedido()
    {
        $sql = "call usp_ingresarPedido(?,?,?,?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $this->idcli);
        $sentencia->bindParam(2, $this->fec);
        $sentencia->bindParam(3, $this->tot);
        $sentencia->bindParam(4, $this->est);      
        return $sentencia->execute();
    }

    public function listar_pedidos(){
        $pedidos = $this->base ->query ("Call usp_ListaPedidos()");
        //Generar el arreglo de clientes
        while ($fila = $pedidos->fetch(PDO::FETCH_ASSOC)){
            $this-> pedidos[] = $fila;
        }
        return $this->pedidos;
        
    }

    public function contar_pedidos(){
        $clientes = $this->base ->query ("select max(id_ped) as cantidad from pedidos");
        //Generar el arreglo de clientes
        while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)){
            $this-> clientes[] = $fila;
        }
        return $this->clientes;
        
    }

    public function eliminar_pedido($id){
        try{
            $sql = "call usp_EliminarPedido(?);";
            $sentencia = $this->base ->prepare($sql);
            $sentencia->bindParam(1, $id);
            if (!$sentencia){
                return 'Error al eliminar pedido';
            }else{
                $sentencia->execute();
                return 'Eliminación correcta';
            }     
        }catch(Exception $e){
            return 'Error al eliminar pedido';
        }
        
    }

    public function actualizar($np){
        $sql = "call usp_actualizar(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $np);
        if (!$sentencia){
            return 'Error al eliminar foto';
        }else{
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }
}
