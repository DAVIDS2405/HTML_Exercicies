<!DOCTYPE html>

<?php    
    include_once '../General/libGeneral.php';    
    cabecera();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Promoción</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>                
        <style>
            .tb{
                margin: 0 auto;
                width: 35%
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
                    var img = document.getElementById('imgUsu');
                    img.src= event.target.result;                    
                }
                leer.readAsDataURL(file);
            }
            window.addEventListener('load', init, false)
        </script>
    </head>
    <body>
        <h2 style=" text-align: center;" > Modificar Foto</h2>
        <?php
            foreach ($RegistroFotos as $fila){
        ?>
        <form id="frmProm" name="frmProm" action="../controlador/controlador_foto.php?opcion=4" method="POST" enctype="multipart/form-data" >
            <table class="tb table">
                <tr>
                    <td class="hc">ID</td>
                    <td> <input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $fila['id_foto'] ?>" readonly=""  /> </td>
                </tr>
                <tr>
                    <td class="hc" >Descripción de foto</td>
                    <td> <input type="text" name="txtDes" class="form-control" value="<?php echo $fila['des_foto'] ?>" required="" /> </td>
                </tr>
                <tr>
                    <td>Imagen</td>                    
                    <td>
                        <img id="imgUsu" width="350" height="280" src="../Fotos/<?php echo $fila['img_foto'] ?>" /> <br>
                        <input type="file" class="form-control" id="txtImg" name="txtImg" value="" required="" />
                    </td>
                </tr>
                
                <tr>
                    <td>Libro</td>
                    <td>
                        <select name="idcli" class="form-control" value ="<?php echo $fila['nombre'] ?>">
                            <?php
                               
                            include_once '../Controlador/controlador_cliente.php';
                            combo_clientes2($fila['nombre']);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de toma</td>
                    <td> <input type="date" class="form-control" name="txtFec" value="<?php echo $fila['fec_foto'] ?>"  /> </td>
                </tr>
                
                <tr>
                    <td>Estado</td>
                    <td>
                        <select name="txtEst" class="form-control" >
                            <option value="A" >Activo</option>
                            <option value="D" >Desactivado</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Actualizar" class="btn btn-primary btn-block " name="btnGrabar" />
                    </td>
                </tr>
                
            </table>
            
        </form>
        
        <?php
            }
        ?>
    </body>
</html>
