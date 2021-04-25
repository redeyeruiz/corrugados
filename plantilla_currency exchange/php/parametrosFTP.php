<?php

include_once "utilerias.php";
$servidor_error = $user_error = $contrasena_error = $puerto_error = ""; 
$servidor = $user = $contrasena = $puerto = $success = $option = $btnsn = "";
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_cambios"])){
    if (empty($_POST["servidor"])){
        $servidor_error = "Se requiere el Servidor.";
    }
    else{
        $servidor = test_input($_POST["servidor"]);
    }

    if (empty($_POST["user"])){
        $user_error = "Se requiere el ID Usuario";
    }
    else{
        $user = test_input($_POST["user"]);
    }

    if (empty($_POST["contrasena"])){
        $contrasena_error = "Se requiere la contraseña";
    }
    else{
        $contrasena = test_input($_POST["contrasena"]);
    }

    if (empty($_POST["puerto"])){
        $puerto_error = "Se requiere el puerto.";
    }
    else{
        $puerto = test_input($_POST["puerto"]);
    }
    
    if($servidor_error == "" and $user_error = "" and $contrasena_error == "" and $puerto_error == ""){
        echo "Usuario".$user;
        $query="INSERT INTO parametrosftp VALUES ('$servidor','$user','$contrasena','$puerto')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error cambio en parámetro FTP.";
            $servidor = $user = $contrasena = $puerto = "";
        }
        else{
            $success = "Cambios realizada con éxito.";
            $servidor = $user = $contrasena = $puerto = "";
        }
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
