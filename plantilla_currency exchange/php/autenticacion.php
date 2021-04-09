
<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASSWORD = '';
$DATABASE_NAME = 'PapelesCorrugados';

$conexion = @mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

if(mysqli_connect_errno()){
    $_SESSION['mens_error'] = "No se pudo conectar a la base de datos. Inténtelo de nuevo más tarde.";
    header('Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php');
    die();
}

if($statement = $conexion->prepare('SELECT nombre, contrasena, rol FROM usuario WHERE idUsuario = ?')){
    $statement->bind_param('s', $_POST['username']);
    $statement->execute();
    $statement->store_result();
    if($statement->num_rows >0){
        $statement->bind_result($nom, $contra, $rol);
        $statement->fetch();
        if(password_verify($_POST['pass'], $contra)){
        //if($contra==$_POST['pass']){
            session_regenerate_id();
            $_SESSION['conectado'] = TRUE;
            $_SESSION['nombre'] = $nom;
            $_SESSION['usuario'] = $_POST['username'];
            $_SESSION['rol'] = $rol;
            header("Location: http://localhost/corrugados/plantilla_currency%20exchange/inicio.php");
            die();
        }else{
            $_SESSION['mens_error'] = "Usuario o contraseña incorrectos, inténtelo de nuevo.";
            header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
            die();
        }
    }else{
        $_SESSION['mens_error'] = "Usuario o contraseña incorrectos, inténtelo de nuevo.";
        header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
        die();
    }
}


?>
