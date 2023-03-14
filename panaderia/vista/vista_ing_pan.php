<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Panes | Panadería</title>
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
            function cancelar(){
                //location.href="../controlador/controlador_pan.php?opcion=1";
                window.close();
            }
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
    <body >
        <div class="container" style="margin-bottom:30px">
            <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 290px">
            <h3 style="text-align: center;margin-top: 30px;margin-bottom: 20px;color: #5F4C0B" >REGISTRO DE PANES </h3>           
                       
        <form id="frmReg" name="frmReg" action="../controlador/controlador_pan.php?opcion=2" method="POST" enctype="multipart/form-data" >
            <table class="tb table" >
                <tr>
                    <td>Nombre</td>
                    <td> <input type="text" class="form-control" autofocus="" name="txtNom" id="txtNom" value="" size="20" required="" /> </td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td> <input type="text" class="form-control" autofocus="" name="txtDes" id="txtDes" value="" size="20" required="" /> </td>
                </tr>
                <tr>
                    <td>Imagen</td>                    
                    <td>
                        <img id="imgUsu" name="imgUsu" width="350" height="280" /> <br>
                        <input type="file" class="form-control" id="txtImg" name="txtImg" value="" required="" />
                    </td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td> <input type="text" class="form-control" autofocus="" style="width:30%" name="txtPre" id="txtpre" value="" size="20" required="" /> </td>
                </tr>                               
                                                
                <tr>
                    <td>
                        
                        <button onclick="cancelar();" class="btn btn-danger">Cancelar</button>
                    </td>
                    <td>
                        <input type="submit" value="Grabar" class="btn btn-primary" name="btnGrabar" />
                    </td>
                </tr>
            </table>
            
        </form>
        </div>
    </body>
    <footer>
            <br>
            Todos los derechos reservados david basantes
    </footer>
</html>
