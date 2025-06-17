<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include ("../includes/config.php");
include ("../includes/funciones.php");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 echo "✅ Formulario recibido<br>";
	$usuario = $_POST['usuario'];
	$contrasena = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$edad = $_POST['veredad'];

	$conexion = conectar ();
	$campo_cliente = "usuario, contrasena, nombre, apellido, telefono, correo, edad";
	$contenido_cliente = "'$usuario', '$contrasena', '$nombre', '$apellido', '$telefono', '$correo', '$edad'";
	$sql_cliente = "insert into cliente ($campo_cliente) values ($contenido_cliente)";
	if(mysqli_query($conexion,$sql_cliente)){
		$cliente_id = mysqli_insert_id($conexion);
		echo"✅ Usuario registrado correctamente. ID: $cliente_id<br>";
		 echo "<a href='../login.php'>Ir al login</a>";
	}else{
		 echo "❌ Error al registrar el usuario: " . mysqli_error($conexion);
	}
	
	mysqli_close($conexion);
}
?>
