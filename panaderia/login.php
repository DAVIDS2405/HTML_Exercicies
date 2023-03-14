<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <title>Lupita´s Bakery | Login</title> 
    <link href="img/block.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />  
</head>
<body style="background-color: rgb(223, 220, 220);">
    <div class="container col-lg-3" style="margin-top: 90px;">
        <div class="card col-sm-10">
            <div class="card-body">
                <form class="form-login" id="frmLogin" name="frmLogin" action="controlador/controlador_seguridad.php?opcion=1" method="POST" > 
                    <div class="form-group text-center" >
                        <h2 style="margin-bottom: 20px; color: #5F4C0B"">Lupita's Bakery</h2>
                        <img src="images/cesta_pan_semilla.jpg" height="150" width="100%"/>                        
                    </div>
                    <div class="form-group" style="padding-top: 15px; margin-left:20px; margin-right:20px">
                        <label for="" style="margin-bottom: 10px; color: #5F4C0B" >Nombre de Usuario </label>
                        <input type="text" name="txtUsu" id="txtUsu" placeholder="Introduzca nombre de usuario" class="form-control">
                    </div>
                    <div class="form-group" style="margin-bottom: 10px;padding-top: 15px;margin-left:20px;margin-right:20px">
                        <label for="" style="margin-bottom: 10px; color: #5F4C0B"" >Contraseña</label>
                        <input type="password" name="txtCon" id="txtCon" placeholder="Introduzca contraseña" class="form-control">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;padding-top: 10px;margin-left:20px;margin-right:20px">
                        <label for=""><?php  if (isset($_GET['valor'])) echo $_GET['valor'];  ?></label>                        
                    </div>
                    <div style="text-align: right;margin-right:20px">
                        <input type="submit" name="accion" value="Iniciar sesión" onclick="validar()" class="btn btn-secondary" >
                    </div>
                    
                </form>

            </div>

        </div>
    </div>
    
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>