<?php

class modelo_pan {
    // propiedades de Pan
    private $id;
    private $nom;
    private $des;
    private $pre;
    private $img;
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getDes() {
        return $this->des;
    }

    function getPre() {
        return $this->pre;
    }

    function getImg() {
        return $this->img;
    }

    function getEst() {
        return $this->est;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDes($des) {
        $this->des = $des;
    }

    function setPre($pre) {
        $this->pre = $pre;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $pan;
    
    
    public function __construct() {
        include_once 'Conectar.php';
        $this->base = Conectar::conexion();
        $this->pan = array();
    }
    
    public function ListadoPanes(){
        $pan = $this->base -> query ("call usp_ListaPanes()");
        
        while ($fila = $pan->fetch(PDO::FETCH_ASSOC)){
            $this-> pan[] =  $fila;
        }
        return $this->pan;
    }

       
    public function ingresar_pan(){
        $sql = "call usp_IngresarPan(?,?,?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->nom);
        $sentencia ->bindParam(2, $this->des);
        $sentencia ->bindParam(3, $this->pre);
        $sentencia ->bindParam(4, $this->img);
        $sentencia ->bindParam(5, $this->est);        
        if (!$sentencia){
            return 'Error de datos';
        }else{
            $sentencia->execute();
        }
    }
    
    public function editar_pan($xid){
        $sql = "SELECT p.id_pan, p.nom_pan, p.des_pan, p.pre_pan, p.img_pan, p.estado
                from panes p where p.id_pan=".$xid;
        
        $panes = $this->base -> query ($sql);
        //Convierte a arreglo
        while ($fila = $panes->fetch(PDO::FETCH_ASSOC)){
            $this-> pan[] =  $fila;
        }
        return $this->pan;
        
    }

    public function modificar_pan(){
        $sql = "call usp_ModificaPan(?,?,?,?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->id);
        $sentencia ->bindParam(2, $this->nom);
        $sentencia ->bindParam(3, $this->des);
        $sentencia ->bindParam(4, $this->pre);        
        $sentencia ->bindParam(5, $this->img);
        $sentencia ->bindParam(6, $this->est);        
        if (!$sentencia){
            return 'Error de datos';
        }else{
            $sentencia->execute();
        }
    }

    public function eliminar_pan($id){
        $sql = "call usp_EliminarPan(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $id);
        if (!$sentencia){
            return 'Error al eliminar pan';
        }else{
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }
}
