<?php

$idrep_error = $idcomp_error = $nomrep_error = ""; 
$idrep = $idcomp = $nomrep = $success = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nomrep"])){
        $nomrep_error = "Se requiere el nombre del representante.";
    }
    else{
        $nomrep = test_input($_POST["nomrep"]);
    }
    
    if ($idrep_error == "" and $idcomp_error == "" and $nomrep_error == ""){
        $query="INSERT INTO Agente VALUES ('$idcomp','$idrep','$nomrep')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del agente.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    
    if ($idrep_error == "" and $idcomp_error == ""){
        $query="DELETE FROM Agente WHERE idCompania='$idcomp' AND idRepresentante='$idrep'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del agente.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nomrep"])){
        $nomrep_error = "Se requiere el nombre del representante.";
    }
    else{
        $nomrep = test_input($_POST["nomrep"]);
    }
    
    if ($idrep_error == "" and $idcomp_error == "" and $nomrep_error == ""){
        $query="UPDATE Agente SET idCompania='$idcomp', nomRepresentante='$nomrep' WHERE idRepresentante='$idrep'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos del agente.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idrep = $idcomp = $nomrep = "";
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

