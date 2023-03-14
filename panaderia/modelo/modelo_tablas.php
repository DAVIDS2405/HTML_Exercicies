<?php

class modelo_tablas {
    //Usuario
    private $idusu;
    private $nomusu;
    private $fecreg;
    

    private $data;
    private $usu; 
    private $tip;   
    private $dis;   

    function __construct() {
        //Conectarme con la BD
       
        include_once 'conectar.php';
        $this->data = conectar::conexion();
        $this->usu = array();
        $this->tip = array();
        $this->dis = array();
        
    }
    
    public function listado_usuarios(){
        $sql="call usp_ListadoUsuarios();";
        $usuarios = $this->data ->query($sql);
        
        while ($fila = $usuarios->fetch(PDO::FETCH_ASSOC)){
            $this->usu[] = $fila;
        }
        return $this->usu;
    
    }

    public function listado_roles(){
        $sql="call usp_ListaRoles();";
        $usuarios = $this->data ->query($sql);
        
        while ($fila = $usuarios->fetch(PDO::FETCH_ASSOC)){
            $this->usu[] = $fila;
        }
        return $this->usu;
    }

   //Distrito
   private $iddis;
   private $nomdis;
   private $codpos;
   function getIddis() {
       return $this->iddis;
   }

   function getNomdis() {
       return $this->nomdis;
   }

   function getCodpos() {
       return $this->codpos;
   }

   function setIddis($iddis) {
       $this->iddis = $iddis;
   }

   function setNomdis($nomdis) {
       $this->nomdis = $nomdis;
   }

   function setCodpos($codpos) {
       $this->codpos = $codpos;
   }

   
   
      
   public function listado_distritos(){
       $sql="call usp_ListadoDistritos();";
       $clientes = $this->data ->query($sql);
       
       while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)){
           $this->dis[] = $fila;
       }
       return $this->dis;
   
   }






}
