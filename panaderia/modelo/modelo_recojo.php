<?php

class modelo_recojo {
    //Campos de la tabla recojo
    private $id;
    private $fec;
    private $idped;
    private $nom;
    private $tot;
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getFec() {
        return $this->fec;
    }

    function getIdped() {
        return $this->idped;
    }

    function getNom() {
        return $this->nom;
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

    function setFec($fec) {
        $this->fec = $fec;
    }

    function setIdped($idped) {
        $this->idped = $idped;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setTot($tot) {
        $this->tot = $tot;
    }

    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $recojos;
    
    public function __construct() {
        include_once 'conectar.php';
        $this->base = conectar::conexion();        
        $this->recojos = array();
    }  
      
       
    public function registro_recojo()
    {
        $sql = "call usp_IngresarRecojo(?);";
        $sentencia = $this->base ->prepare($sql);              
        $sentencia->bindParam(1, $this->idped);       
        $sentencia->execute();
    }

    public function listar_recojos(){
        $recojos = $this->base ->query ("Call usp_ListaRecojos()");
        //Generar el arreglo de clientes
        while ($fila = $recojos->fetch(PDO::FETCH_ASSOC)){
            $this-> recojos[] = $fila;
        }
        return $this->recojos;
        
    }
    public function eliminar_recojo($id){
        try{
            $sql = "call usp_EliminarRecojo(?);";
            $sentencia = $this->base ->prepare($sql);
            $sentencia->bindParam(1, $id);
            if (!$sentencia){
                return 'Error al eliminar recojo';
            }else{
                $sentencia->execute();
                return 'Eliminación correcta';
            }     
        }catch(Exception $e){
            return 'Error al eliminar recojo';
        }
        
    }
    public function listar_pedidos_recojos(){
        $pedidos = $this->base ->query ("Call usp_ListaPedidosA()");
        //Generar el arreglo de clientes
        while ($fila = $pedidos->fetch(PDO::FETCH_ASSOC)){
            $this-> pedidos[] = $fila;
        }
        return $this->pedidos;
        
    }
    public function ListadoPedidosDetalles($id){
        $recojos= $this->base -> query ("call usp_ListaPedidoDetalles(".$id.")");
        
        while ($fila = $recojos->fetch(PDO::FETCH_ASSOC)){
            $this-> recojos[] =  $fila;
        }
        return $this->recojos;
    }
}
