<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Barber Exotic V1</title>

<script src="js/login.js"></script>
<link rel="stylesheet" href="style/login.css" />
<?php
session_start();
$mensaje = '';
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);  // para que no aparezca siempre
}
?>


<?php
if (isset($_GET['cerrado']) && $_GET['cerrado'] == '1') {
    echo "<script>alert('Has cerrado sesión correctamente. ¡Hasta pronto!');</script>";
}

if (isset($_GET['tiempo']) && $_GET['tiempo'] == 'acabado') {
    echo "<p style='color:red; text-align:center;'>Sesión expirada por inactividad. Por favor, vuelve a iniciar sesión.</p>";
}
?>
</head>
<body>

<div class="logo">
    <img class="imagen" src="img/logobarber.png"/>
    <div class="acciones">
        <button class="boton" onclick="window.location.href='portada.php'">Volver al Inicio</button>
    </div>
</div>

<div class="foto">
<div id="medio" class="contenedor">
<form action="php/login.php" method="post" enctype="multipart/form-data">
<fieldset class="centrar"id="field">
		<table  id="tabla">
			<tr>
				<td>Usuario: <input type="text" id="usuario" name="usuario" /></td>
				<td>Contraseña: <input type="password" id="contrasena" name="contrasena" /></td>
				<td><input type="checkbox" name="show" id="show" onclick="verpass()"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php if (!empty($mensaje)): ?>
    					<p class="mensaje-error"><?php echo htmlspecialchars($mensaje); ?></p>
					<?php endif; ?>
				</td>
			</tr>
			</table>
             		<button class="boton" type="submit">Iniciar sesión</button>
        </fieldset>
</form><br><br><br>
<button  class="boton" onclick="window.location.href='formulario.php'">Crea un usuario</button>
</div>
</div>
</body>
</html>
