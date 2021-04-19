<?php

include_once "utilerias.php";
$dir_error = $ip_error = ""; 
$dir = $ip = $success = $option = $btnsn = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_cambios"])){
    if (empty($_POST["dir"])){
        $dir_error = "Se requiere el Directorio de entrada para auntenticación.";
    }
    else{
        $dir = test_input($_POST["dir"]);
    }

    if (empty($_POST["ip"])){
        $ip_error = "Se requiere el IP del servidor.";
    }
    else{
        $ip = test_input($_POST["ip"]);
    }
    
    if ($dir_error == "" and $ip_error == ""){
        $query="INSERT INTO parametrosad(directorioEntrada, ip) VALUES ('$dir','$ip')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error de cambios en paramétros FTP.";
            $dir = $ip = "";;
        }
        else{
            $success = "Cambios realizada con éxito.";
            $dir = $ip = "";
        }
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
