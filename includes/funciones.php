<?php
function conectar()
{
    global $HOSTNAME,$USERNAME,$PASSWORD,$DATABASE;
        $conexion = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD,$DATABASE) or die("Error de conexion con la base de datos");
    mysqli_set_charset($conexion,"utf8");
        return $conexion;
}
?>
