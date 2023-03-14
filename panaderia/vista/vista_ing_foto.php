<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fotografías | Panadería</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>          
        <style>
            .tb{
                margin: 0 auto;
                width: 30%;
            }
            footer{
                text-align: center;
                background:black;
                color: white;
                padding-bottom: 20px;
                width: 100%;
                margin-top: 20px;
            } 
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
        <div class="container">
            <img src="../images/banner-panaderia2.jpg" class="img-responsive" style="width: 100%;height: 300px">                      
        </div>
        <h2 style=" text-align: center; color: maroon" >Registro de Fotografías</h2>
        <br>
        <form id="frmReg" name="frmReg" action="../Controlador/controlador_foto.php?opcion=2" method="POST" enctype="multipart/form-data" >
            <table class="tb table">
                <tr>
                    <td>Cliente</td>
                    <td>
                        <select name ="idcli" id="idcli" class="form-control" >
                            <?php
                                include_once '../controlador/controlador_cliente.php';
                                combo_clientes();
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Foto de mostrador</td>                    
                    <td>
                        <img id="imgUsu" name="imgUsu" width="350" height="280" /> <br>
                        <input type="file" class="form-control" id="txtImg" name="txtImg" value="" required="" />
                    </td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td> <input type="text" class="form-control" autofocus="" name="txtDes" id="txtDes" value="" size="20" required="" /> </td>
                </tr>
                
                
                
                
                <tr>
                    <td>
                        <button class="btn btn-secundary" onclick="window.history.back();" >Cancelar</button>
                    </td>
                    <td >
                        <input type="submit" value="Grabar" class="btn btn-primary" name="btnGrabar" />
                    </td>
                </tr>
            </table>
            
        </form>
        
    </body>
    <footer>
            <br>
            Todos los derechos reservados david basantes
    </footer>
</html>
