<?php
session_start();
include("includes/config.php");
include("includes/funciones.php");

if (!isset($_SESSION['idusuario_valido'])) {
    header("Location: login.php?tiempo=acabado");
    exit;
}


$tiempo = 120;

if  (isset($_SESSION['ultima_actividad'])){

        $inactivo = time() - $_SESSION['ultima_actividad'];

        if($inactivo > $tiempo){
                session_unset();
                session_destroy();
                header("Location: login.php?tiempo=acabado");
                exit();
        }
}

$_SESSION['ultima_actividad'] = time();




$nombrecliente = $_SESSION['usuario_valido'];
$idcliente = $_SESSION['idusuario_valido'];
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 
	$dia = $_POST['fecha'];
	$hora = $_POST['hora'];
	$servicio = $_POST['servicio'];

    $conexion = conectar ();

    $sql_revisar =" SELECT COUNT(*) as total from cita where dia = '$dia' and hora = '$hora'";
    $ejecucion_revisar = mysqli_query($conexion,$sql_revisar);
    $filas = mysqli_fetch_array($ejecucion_revisar);
    if($filas['total']>0){
        echo "<p style='color:red;'>Ya existe una cita reservada para esta fecha y hora. Por favor elige otro horario.</p>";
    }else{

    $campo_cita = "id_cliente, dia, hora, tipo_servicio";
	$contenido_cita = "'$idcliente', '$dia', '$hora', '$servicio'";
	$sql_cita = "insert into cita ($campo_cita) values ($contenido_cita)";
	
	mysqli_query($conexion, $sql_cita);
	mysqli_close($conexion);
}
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Barber Exotic V1</title>
    <link rel="stylesheet" href="style/citas.css" />
</head>
<body>

<div class="logo">
<div class="bienvenida">
    <p>Bienvenido, <?php echo htmlspecialchars($nombrecliente) ?></p>

</div>


    <img class="imagen" src="img/logobarber.png"/>

    <div class="acciones">
        <button class="boton" onclick="window.location.href='portada.php'">Volver al Inicio</button>
        <button class="boton" onclick="window.location.href='logout.php'">Cerrar sesión</button>

    </div>
</div>

<div class="contenedor">
    <div class="citas">
    
<form action="citas.php" method="post" class="form-cita" id="formCita">
    <label for="fecha">Selecciona el día:</label>
    <input type="date" id="fecha" name="fecha" required />

<label for="hora">Selecciona la hora:</label>
<select id="hora" name="hora" required>
    <option value="" disabled selected>-- Elige un hora --</option>
        <option value="08:00">08:00</option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="16:00">16:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
</select>


    <label for="servicio">Tipo de servicio:</label>
    <select id="servicio" name="servicio" required>
        <option value="" disabled selected>-- Elige un servicio --</option>
        <option value="corte">Corte de cabello</option>
        <option value="afeitado">Afeitado clásico</option>
        <option value="barba">Arreglo de barba</option>
        <option value="combo">Combo corte + barba</option>
    </select>

    <button type="submit">Reservar cita</button>
</form>
    </div>
    <div class="miscitas">
        <label>Estas son mis citas:</label>
        <?php
$conexion = conectar();
$sql = "SELECT dia, hora, tipo_servicio FROM cita WHERE id_cliente = '$idcliente' ORDER BY dia, hora";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<ul>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<li style='color:red;'>" . htmlspecialchars($fila['dia']) . " a las " . htmlspecialchars($fila['hora']) . " - " . htmlspecialchars($fila['tipo_servicio']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tienes citas registradas.</p>";
}

mysqli_close($conexion);
?>

    </div>
</div>

</body>
</html>
