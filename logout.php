<?php
session_start();
session_unset(); // Limpia todas las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: login.php?cerrado=1"); // Redirige al login
exit;
