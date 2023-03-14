<?php

class modelo_cliente {
    //Campos de la tabla cliente
    private $id;
    private $tipo;
    private $nro;
    private $nom;
    private $correo;
    private $dir;
    private $iddis;
    private $usu;
    private $cla;
    private $fec;
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getNro() {
        return $this->nro;
    }

    function getNom() {
        return $this->nom;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getDir() {
        return $this->correo;
    }

    function getUsu() {
        return $this->usu;
    }

    function getCla() {
        return $this->cla;
    }

    function getIddis() {
        return $this->iddis;
    }

    function getFec() {
        return $this->fec;
    }

    function getEst() {
        return $this->est;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNro($nro) {
        $this->nro = $nro;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDir($dir) {
        $this->dir = $dir;
    }

    function setCorreo($correo) {
        $this->correo= $correo;
    }

    function setUsu($usu) {
        $this->usu= $usu;
    }

    function setCla($cla) {
        $this->cla = $cla;
    }

    function setIddis($iddis) {
        $this->iddis = $iddis;
    }

    function setFec($fec) {
        $this->fec = $fec;
    }

    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $login;
    private $clientes;
    
    public function __construct() {
        include_once 'conectar.php';
        $this->base = conectar::conexion();
        $this->login = array();
        $this->clientes = array();
    }  
      
       
    public function registro()
    {
        $sql = "call usp_ingresarCliente(?,?,?,?,?,?,?,?,?,?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $this->tipo);
        $sentencia->bindParam(2, $this->nro);
        $sentencia->bindParam(3, $this->nom);
        $sentencia->bindParam(4, $this->correo);
        $sentencia->bindParam(5, $this->dir);
        $sentencia->bindParam(6, $this->iddis);
        $sentencia->bindParam(7, $this->usu);
        $sentencia->bindParam(8, $this->cla);
        $sentencia->bindParam(9, $this->fec);
        $sentencia->bindParam(10, $this->est);
        $sentencia->execute();
    }

    public function listar_clientes(){
        $clientes = $this->base ->query ("Call usp_ListaClientes()");
        //Generar el arreglo de clientes
        while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)){
            $this-> clientes[] = $fila;
        }
        return $this->clientes;
        
    }

    public function buscar_Cliente($id){
        $clientes = $this->base ->query ("Call usp_BuscarCliente(".$id.")");
        //Generar el arreglo de clientes
        while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)){
            $this-> clientes[] = $fila;
        }
        return $this->clientes;
        
    }

    public function buscar_descuento($idcli, $idpan){
        $clientes = $this->base ->query ("Call usp_BuscarDescuento(".$idcli.",".$idpan.")");
        //Generar el arreglo de clientes
        while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)){
            $this-> clientes[] = $fila;
        }
        return $this->clientes;
        
    }

    public function eliminar_cliente($id){
        $sql = "call usp_EliminarCliente(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $id);
        if (!$sentencia){
            return 'Error al eliminar cliente';
        }else{
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }
}
