<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
<title>Formulario simple v1</title>
<script src="js/formulario.js"></script>
<link rel="stylesheet" href="style/formulario.css" />

</head>
<body>

<div class="logo">
	<img class="imagen" src="img/logobarber.png"/>
</div>
<div class="form">
<form action="php/formulario.php" method="post" enctype="multipart/form-data" onsubmit="return validartodo()">
        <fieldset id="field">
			<table  id="tabla">
				<tr>
					<td colspan="3" id="medio">Credenciales para iniciar sesión</td>
				</tr>
				<tr>
					<td>Introduce tu usuario: <input type="text" id="usuario" name="usuario"/></td>
					<td>Introduce tu contraseña: <input type="password" name="pass" id="pass" oninput="validarfortaleza()"/></td>
					<td><input type="checkbox" name="show" id="show" onclick="verpass()"/></td>
				<tr>
					<td></td><td id="medio"><span id="fortaleza"></span></td><td></td>
				</tr>
				<tr>
					<td colspan="3" id="medio">Datos de contacto</td>
				</tr>
				<tr>
					<td>Introduce tu nombre: <input type="text" id="nombre" name="nombre"/></td>
					<td>Introduce tu apellido: <input type="text" id="apellido" name="apellido"/></td>
				</tr>
				<tr>
					<td>Introduce tu telefono: <input type="text" id="telefono" name="telefono"/>
					<td>Introduce tu correo: <input type="text" id="correo" name="correo"/></td>
				</tr>	
				<tr>
					<td>Introduce tu edad: <input type="date" id="fecha" name="fecha" oninput="validarfecha()"/></td>
				</tr>
				<tr>
					<td id="medio"><span id="valifecha" name="valifecha" ></span></td><td><input type="hidden" id="veredad" name="veredad"></td>
				</tr>
				<tr>
					<td><td id="medio"><span id="validarfile"></span></td>
					
				<tr>			
				<tr>
					<td id="derecha"><button type="submit">Enviar</button></td>
					<td><input type="hidden" id="visualizarp" name="visualizarp"></td>
					<td><button type="reset">Borrar</button></td>
				</tr>
			</table>
                <input type="hidden" id="edad" name="valifecha">
        </fieldset>
</form><br><br><br>
</div>
<div id="centrar">
	<button class="centrar" onclick="window.location.href='login.php'">Volver al login</button>
 
</div>
</body>
</html>
