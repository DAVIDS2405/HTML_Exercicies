<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pan | Panadería </title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>                
        <style>
            .tb{
                margin: 0 auto;
                width: 30%
            }
            
            .hc { color: #3e5f8a; }
 
        </style>
        <script>
            function init(){
                
                var inputFile = document.getElementById('txtImg');
                inputFile.addEventListener('change', mostrarImagen, false);
            }
            function mostrarImagen(event){
                
                var file = event.target.files[0];
                var leer = new FileReader();
                leer.onload = function(event){
                    var img = document.getElementById('imgPan');
                    img.src= event.target.result;                    
                }
                leer.readAsDataURL(file);
            }
            window.addEventListener('load', init, false)
        </script>
    </head>
    <body>
    <div class="container">
        <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 300px">
        <h3 style="text-align: center;margin-top: 30px;margin-bottom: 30px" >PANES - Edición </h3>
        <div class="row">
            <div class="col-sm-5">
                <button class="btn btn-warning" onclick="window.close()" >Regresar</button>
                
            </div>
            
        </div>
    </div>
        
        <?php
            foreach ($RegistrosPanes as $fila){
        ?>
        <form id="frmProm" name="frmProm" action="../controlador/controlador_pan.php?opcion=4" method="POST" enctype="multipart/form-data" >
            <table class="tb table">
                <tr>
                    <td class="hc">ID</td>
                    <td> <input type="text" id="txtId" style="width:30%" name="txtId" class="form-control" value="<?php echo $fila['id_pan'] ?>" readonly=""  /> </td>
                </tr>
                <tr>
                    <td class="hc" >Nombre de Pan</td>
                    <td> <input type="text" id="txtNom" name="txtNom" class="form-control" value="<?php echo $fila['nom_pan'] ?>" required="" /> </td>
                </tr>

                <tr>
                    <td class="hc" >Descripción de Pan</td>
                    <td> <input type="text" id="txtDes" name="txtDes" class="form-control" value="<?php echo $fila['des_pan'] ?>" required="" /> </td>
                </tr>
                <tr>
                    <td class="hc" >Precio</td>
                    <td> <input type="text" id="txtPre" style="width:30%" name="txtPre" class="form-control" value="<?php echo $fila['pre_pan'] ?>" required="" /> </td>
                </tr>
                <tr>
                    <td>Imagen</td>                    
                    <td>
                        <img id="imgPan" width="350" height="280" src="../Fotos/Pan/<?php echo $fila['img_pan'] ?>" /> <br>
                        <input type="file" class="form-control" id="txtImg" name="txtImg" value="" required />
                    </td>
                </tr>
                
                
                <tr>
                    <td>Estado</td>
                    <td>
                        <select name="txtEst" class="form-control" style="width:30%" >
                            <option value="A" >Activo</option>
                            <option value="D" >Desactivado</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td >
                                           
                        <button onclick="window.close()" class="btn btn-secundary">Cancelar</button>
                    </td>
                    <td >
                        <input type="submit" value="Actualizar" class="btn btn-primary " name="btnGrabar" />
                    </td>
                </tr>
                
            </table>
            
        </form>
        
        <?php
            }
        ?>
    </body>
</html>
