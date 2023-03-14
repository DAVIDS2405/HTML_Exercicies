<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Usuario | Panadería</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>   
        <link rel="shortcut icon" href="../images/All_logo.ico" type="images/vnd.microsoft.icon" />       
        <style>
            .tb{
                margin: 0 auto;
                width: 30%;
            }
            footer{
                text-align: center;
                background:black;
                color: white;
                
                height: 70px;
                width: 100%;
                
            }
        </style>
        
    </head>
    <body>
    <div class="container">
        <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 300px"/>
        <h3 style="text-align: center;margin-top: 30px;margin-bottom: 30px; color: #5F4C0B"" >EDICIÓN DE USUARIO </h3>        
    </div>
        
        <br>
        <?php
            foreach ($RegistrosUsuarios as $fila){
        ?>
        <form id="frmReg" name="frmReg" action="../Controlador/controlador_seguridad.php?opcion=7" method="POST" enctype="multipart/form-data" >
            <div class="container" style="width:40%; margin-bottom:30px " >
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">ID</label>
                    </div>
                    <div class="col-sm-2" >    
                        <input type="text" class="form-control" name="txtId" value="<?php echo $fila['id_usuario'] ?>" readonly />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">DNI</label>
                    </div>
                    <div class="col-sm-2" >    
                        <input type="text" class="form-control" name="txtDni" value="<?php echo $fila['nro_doc'] ?>"  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Nombre de Usuario</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="txtNom" value="<?php echo $fila['nombre'] ?>"  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Correo</label>
                    </div>
                    <div class="col-sm-6">    
                        <input type="text" class="form-control"  name="txtCorreo" value="<?php echo $fila['correo'] ?>"  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Usuario</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="txtUsu" value="<?php echo $fila['nom_usuario'] ?>"  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Contraseña</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="password" class="form-control"  name="txtCon" value="<?php echo $fila['con_usuario'] ?>"  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Rol</label>
                    </div>
                    <div class="col-sm-4">
                        <select name="Idrol" value="<?php echo $fila['nom_rol']; ?>"  class="form-control" >
                            <?php 
                                try{                                    
                                    include '../modelo/modelo_tablas.php';   
                                    $reg = new modelo_tablas();
                                    $roles = $reg->listado_roles();
                                    foreach($roles as $fil){
                                        if ($fila['nom_rol'] == $fil['nom_rol']){
                                            echo '<option value='.$fil['id_rol'].' selected >'.$fil['nom_rol'].'</option>';
                                        }else{
                                            echo '<option value='.$fil['id_rol'].' >'.$fil['nom_rol'].'</option>';
                                        }            
                                    }                                                                       
                                }catch(Exception $e){
                                    echo $e->getMessage();
                                }                                                                                               
                                
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Fecha Registro</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="txtFec" value="<?php echo $fila['fec_reg']; ?>" required=""  />
                    </div>
                </div>

                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Estado</label>
                    </div>
                    <div class="col-sm-3">
                        <select name="txtEst" class="form-control" value="<?php echo $fila['estado']; ?>" >
                            <option value='A' <?php if($fila['estado']=="A") echo ' selected ' ?> >Activo </option>
                            <option value='D'  <?php if($fila['estado']=="D") echo ' selected ' ?> >Desactivado </option>                            
                        </select>        
                    </div>
                </div>

                <div class="row" style="padding-top:10px; ">
                    <div class="col-sm-4" style="padding-top:10px">
                        <input type="button" onclick="window.close();" value="Cancelar" class="btn btn-secundary" name="btnCancelar" />
                    </div>
                    <div class="col-sm-4" style="padding-top:10px">
                        <input type="submit" value="Grabar" class="btn btn-primary" name="btnGrabar" />
                    </div>
                </div>
                
                
            </div>    
                      
            
        </form>
        <?php
            }
        ?>
    </body>
    <footer >
        <br>
            Todos los derechos david basantes
    </footer>
</html>