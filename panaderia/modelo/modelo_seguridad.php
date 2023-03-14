<?php

class modelo_seguridad {
    //Campos de la tabla usuario
    private $id;
    private $dni;
    private $nom;    
    private $correo;
    private $usu;
    private $con;
    private $idrol;
    private $fec;
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getDni() {
        return $this->dni;
    }

    function getNom() {
        return $this->nom;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getUsu() {
        return $this->usu;
    }

    function getIdrol() {
        return $this->idrol;
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

    function setDni($dni) {
        $this->dni = $dni;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setUsu($usu) {
        $this->usu = $usu;
    }

    function setCon($con) {
        $this->con= $con;
    }

    function setIdrol($idrol) {
        $this->idrol = $idrol;
    }

    function setFec($fec) {
        $this->fec = $fec;
    }

    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $login;
    
    public function __construct() {
        include_once 'conectar.php';
        $this->base = conectar::conexion();
        $this->login = array();
    }  
      
    public function validar($nom, $cla){
        $sql = "call usp_validarLogin ('".$nom."','".$cla."')";
        
        $login = $this->base ->query($sql);
        while ($fila = $login->fetch(PDO::FETCH_ASSOC)){
            $this-> login[] =  $fila;
        }
        return $this->login;
    }
    
    public function registro_usuario()
    {
        $sql = "call usp_IngresarUsuario(?,?,?,?,?,?,?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $this->dni);
        $sentencia->bindParam(2, $this->nom);
        $sentencia->bindParam(3, $this->correo);
        $sentencia->bindParam(4, $this->usu);
        $sentencia->bindParam(5, $this->con);
        $sentencia->bindParam(6, $this->idrol);
        $sentencia->bindParam(7, $this->fec);
        
        $sentencia->execute();
    }

    public function editar_usuario($xid){
        $sql = "SELECT u.id_usuario, u.nro_doc, u.nombre, u.correo, u.nom_usuario, u.con_usuario, r.nom_rol, u.fec_reg, u.estado from usuarios u inner join rol r on u.id_rol = r.id_rol where id_usuario=".$xid;        
        
        $login = $this->base -> query ($sql);
        //Convierte a arreglo
        while ($fila = $login->fetch(PDO::FETCH_ASSOC)){
            $this-> login[] =  $fila;
        }
        return $this->login;        
    }

    public function modificar_usuario()
    {
        $sql = "call usp_ModificarUsuario(?,?,?,?,?,?,?,?,?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $this->id);
        $sentencia->bindParam(2, $this->dni);
        $sentencia->bindParam(3, $this->nom);
        $sentencia->bindParam(4, $this->correo);
        $sentencia->bindParam(5, $this->usu);
        $sentencia->bindParam(6, $this->con);
        $sentencia->bindParam(7, $this->idrol);
        $sentencia->bindParam(8, $this->fec);
        $sentencia->bindParam(9, $this->est);
        $sentencia->execute();
    }

    public function listar_usuarios(){
        $usuarios = $this->base ->query ("Call usp_ListaUsuarios()");
        //Generar el arreglo de clientes
        while ($fila = $usuarios->fetch(PDO::FETCH_ASSOC)){
            $this-> usuarios[] = $fila;
        }
        return $this->usuarios;
        
    }

    public function eliminar_usuario($id){
        $sql = "call usp_EliminarUsuario(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $id);
        if (!$sentencia){
            return 'Error al eliminar usuario';
        }else{
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }

}
