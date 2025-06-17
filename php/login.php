<?php
session_start();
include("../includes/config.php");
include("../includes/funciones.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = conectar();
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql_cliente = "SELECT id_cliente, usuario, contrasena, nombre FROM cliente WHERE usuario = '$usuario'";
    $ejecucion_cliente = mysqli_query($conexion, $sql_cliente) or die(mysqli_error($conexion));

    if (mysqli_num_rows($ejecucion_cliente) == 1) {
        $fila = mysqli_fetch_array($ejecucion_cliente);
        if (password_verify($contrasena, $fila['contrasena'])) {
            $_SESSION['idusuario_valido'] = $fila['id_cliente'];
            $_SESSION['usuario_valido'] = $fila['nombre'];
            header("Location: ../citas.php");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario o contraseña incorrecta";
    }

    mysqli_free_result($ejecucion_cliente);
    mysqli_close($conexion);
}

if (!empty($mensaje)) {
    $_SESSION['mensaje'] = $mensaje;
    header("Location: ../login.php");
    exit();
}
