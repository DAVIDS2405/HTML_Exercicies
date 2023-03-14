<!DOCTYPE html>

<html>
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
        <h3 style="text-align: center;margin-top: 30px;margin-bottom: 30px; color: #5F4C0B"" >REGISTRO DE USUARIO </h3>        
    </div>
        
        <br>
        <form id="frmReg" name="frmReg" action="../Controlador/controlador_seguridad.php?opcion=4" method="POST" enctype="multipart/form-data" >
            <div class="container" style="width:40%; margin-bottom:30px " >
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">DNI</label>
                    </div>
                    <div class="col-sm-2" >    
                        <input type="text" class="form-control" name="txtDni" value=""  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Nombre de Usuario</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="txtNom" value=""  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Correo</label>
                    </div>
                    <div class="col-sm-6">    
                        <input type="text" class="form-control"  name="txtCorreo" value=""  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Usuario</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="txtUsu" value=""  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Contraseña</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="password" class="form-control"  name="txtCon" value=""  required="" />
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-sm-4" >
                        <label for="">Rol</label>
                    </div>
                    <div class="col-sm-4">
                        <select name="Idrol" class="form-control" >
                                <?php
                                    try{                                    
                                        include '../modelo/modelo_tablas.php';   
                                        $reg = new modelo_tablas();
                                        $roles = $reg->listado_roles();
                                        foreach($roles as $fil){                                            
                                            echo '<option value='.$fil['id_rol'].' selected >'.$fil['nom_rol'].'</option>';                                                        
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
                        <input type="date" class="form-control" name="txtFec" value="<?php echo date('Y-m-d') ?>" required=""  />
                    </div>
                </div>
                <div class="row" style="padding-top:10px; ">
                    <div class="col-sm-4" style="padding-top:10px">
                        <input type="button" onclick="window.history.back();" value="Cancelar" class="btn btn-secundary" name="btnCancelar" />
                    </div>
                    <div class="col-sm-4" style="padding-top:10px">
                        <input type="submit" value="Grabar" class="btn btn-primary" name="btnGrabar" />
                    </div>
                </div>
                
                
            </div>    
                      
            
        </form>
        
    </body>
    <footer >
        <br>
            Todos los derechos david basantes
    </footer>
</html>