<?php

include_once "util_pcP.php";
$idrep_error = $idcomp_error = $nomrep_error = ""; 
$idrep = $idcomp = $nomrep = $success = $option = "";

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
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Agente VALUES ('$idrep','$nomrep','$idcomp');";
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

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if ($idrep_error == ""){
        $option = "Consultas por ID del Representante";
        $query="SELECT * FROM Agente WHERE idRepresentante='$idrep'";
        $result = mysqli_query($conection, $query);
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    if ($idrep_error == ""){
        $option = "Reporte";
        $query="SELECT * FROM Agente";
        $result = mysqli_query($conection, $query);
        $idrep = $idcomp = $nomrep = "";
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

