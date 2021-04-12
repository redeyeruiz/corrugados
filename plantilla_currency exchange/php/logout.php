<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['mens_error'] = "Sesión cerrada correctamente.";
header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
die();
?>