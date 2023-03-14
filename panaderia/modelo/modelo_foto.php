<?php


class modelo_foto {
    // propiedades de foto
    private $id;
    private $des;
    private $idcli;
    private $img;
    private $fec;
    private $est;
    
    function getId() {
        return $this->id;
    }

    function getDes() {
        return $this->des;
    }

    function getImg() {
        return $this->img;
    }

    function getIdcli() {
        return $this->idcli;
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

    function setDes($des) {
        $this->des = $des;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setIdcli($idcli) {
        $this->idcli = $idcli;
    }

    function setFec($fec) {
        $this->fec = $fec;
    }

    function setEst($est) {
        $this->est = $est;
    }

    private $base;
    private $foto;
    
    
    public function __construct() {
        include_once 'Conectar.php';
        $this->base = Conectar::conexion();
        $this->foto = array();
    }
    
    public function ListadoFotos(){
        $foto = $this->base -> query ("call usp_ListaFotos()");
        
        while ($fila = $foto->fetch(PDO::FETCH_ASSOC)){
            $this-> foto[] =  $fila;
        }
        return $this->foto;
    }

    public function editar_foto($xid){
        $sql = "SELECT f.id_foto, f.des_foto, f.img_foto, c.nombre, f.fec_foto, f.estado
                from foto f inner join cliente c on f.id_cliente=c.id_cliente where id_foto=".$xid;
        
        $fotos = $this->base -> query ($sql);
        //Convierte a arreglo
        while ($fila = $fotos->fetch(PDO::FETCH_ASSOC)){
            $this-> foto[] =  $fila;
        }
        return $this->foto;
        
    }
       
    public function ingresar_foto(){
        $sql = "call usp_IngresarFoto(?,?,?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->des);
        $sentencia ->bindParam(2, $this->idcli);
        $sentencia ->bindParam(3, $this->img);
        $sentencia ->bindParam(4, $this->fec);
        $sentencia ->bindParam(5, $this->est);        
        if (!$sentencia){
            return 'Error de datos';
        }else{
            $sentencia->execute();
        }
    }
    
    public function modificar_foto(){
        $sql = "call usp_ModificaFoto(?,?,?,?,?,?)";
        $sentencia= $this->base -> prepare ($sql);        
        $sentencia ->bindParam(1, $this->id);
        $sentencia ->bindParam(2, $this->des);
        $sentencia ->bindParam(3, $this->idcli);
        $sentencia ->bindParam(4, $this->img);        
        $sentencia ->bindParam(5, $this->fec);
        $sentencia ->bindParam(6, $this->est);        
        if (!$sentencia){
            return 'Error de datos';
        }else{
            $sentencia->execute();
        }
    }

    public function eliminar_foto($id){
        $sql = "call usp_EliminarFoto(?);";
        $sentencia = $this->base ->prepare($sql);
        $sentencia->bindParam(1, $id);
        if (!$sentencia){
            return 'Error al eliminar foto';
        }else{
            $sentencia->execute();
            return 'Eliminación correcta';
        }
    }

    
}