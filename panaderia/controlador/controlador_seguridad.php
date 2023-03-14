<?php session_start();
include_once '../modelo/modelo_seguridad.php';

$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        validar();
        break;
    case 2:
        $_SESSION['opcion']=0;
        listado_usuarios();
        break;
    case 3:
        $_SESSION['opcion']=1;
        registro_usuario();
        
        listado_usuarios();
        break;
    case 4:
        $_SESSION['opcion']=1;
        registro_usuario();
        listado_usuarios();
        break;
    case 5:
        $_SESSION['opcion']=3;
        eliminar_usuario();       
        listado_usuarios();        
        break;  
    case 6:
        editar_usuario();
        break; 
    case 7:
        $_SESSION['opcion']=2;
        modificar_usuario();        
        listado_usuarios();
        break;            
}

function registro_usuario(){
   
    $dni=$_POST['txtDni'];
    $nom=$_POST['txtNom'];
    $correo=$_POST['txtCorreo'];
    $usu=$_POST['txtUsu'];
    $con=$_POST['txtCon'];
    $rol=$_POST['Idrol'];    
    $fec=$_POST['txtFec'];    
    $est='A';

    $reg = new modelo_seguridad();
    $reg->setDni($dni);
    $reg->setNom($nom);
    $reg->setCorreo($correo);
    $reg->setUsu($usu);
    $reg->setCon($con);
    $reg->setIdRol($rol);    
    $reg->setFec($fec);
    $reg->setEst($est);

    $reg->registro_usuario();
    
}

function modificar_usuario(){
    $id=$_POST['txtId'];
    $dni=$_POST['txtDni'];
    $nom=$_POST['txtNom'];
    $correo=$_POST['txtCorreo'];
    $usu=$_POST['txtUsu'];
    $con=$_POST['txtCon'];
    $rol=$_POST['Idrol'];    
    $fec=$_POST['txtFec'];    
    $est=$_POST['txtEst'];    

    $reg = new modelo_seguridad();
    $reg->setId($id);
    $reg->setDni($dni);
    $reg->setNom($nom);
    $reg->setCorreo($correo);
    $reg->setUsu($usu);
    $reg->setCon($con);
    $reg->setIdRol($rol);    
    $reg->setFec($fec);
    $reg->setEst($est);

    $reg->modificar_usuario();
    
}

function validar(){
    //Obtenemos los valores del formulario
    $nomusu = $_POST['txtUsu'];
    $clausu = $_POST['txtCon'];
    
    $reg = new modelo_seguridad();
    
    $registro = $reg ->validar($nomusu, $clausu);
    
    echo var_dump($registro)."<br><br>";
 
    foreach($registro as $reg){
        $_SESSION['idusuario'] = $reg['id_usuario']; // variable 
        $_SESSION['idrol'] = $reg['id_rol']; // variable 
        $_SESSION['opcion']=0;
    }
    if (empty($registro)){  
        //regresa al login y le pasa una variable
        header('Location: ../login.php?valor=Mensaje: Verificar datos ingresados');
    }else{
        //Ingresa al menú del sistema
        $_SESSION['usuario'] = $nomusu; // variable 
        $_SESSION['idrol'] = $reg['id_rol']; // variable 
        $_SESSION['opcion']=0;  
        header('Location: ../menu.php');
    }    
}

function listado_usuarios(){
    $reg = new modelo_seguridad();
    $RegistrosUsuarios = $reg ->listar_usuarios();    
    include_once '../vista/vista_usuarioS.php';    
}

function editar_usuario(){
    $xid = $_GET['id'];    
    $reg = new modelo_seguridad();
    $RegistrosUsuarios = $reg-> editar_usuario($xid);    
    include_once '../vista/vista_edi_usuario.php';
}

function eliminar_usuario(){
    $xid = $_GET['id'];    
    $reg = new modelo_seguridad();
    $reg-> eliminar_usuario($xid);    
    
}

?>
