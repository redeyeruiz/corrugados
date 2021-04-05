<?php

include_once "util_pcP.php";
$idcomp_error = $nom_error = ""; 
$idcomp = $nom = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el nombre de la compañía.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }
    
    if ($idcomp_error == "" and $nom_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Compania VALUES ('$idcomp','$nom');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de la compañía.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    
    if ($idcomp_error == ""){
        $query="DELETE FROM Compania WHERE idCompania='$idcomp'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de la compañía.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el nombre de la compañía.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }
    
    if ($idcomp_error == "" and $nom_error == ""){
        $query="UPDATE Compania SET nombre='$nom' WHERE idCompania='$idcomp'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos de la compañía.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de la compañía";
        $query="SELECT * FROM Compania WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Compania";
    $result = mysqli_query($conection, $query);
    $idcomp = $nom = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
