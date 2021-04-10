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
        $query="INSERT INTO Compania (idCompania, nombre, estatus) VALUES ('$idcomp','$nom', true);";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM Compania WHERE idCompania='$idcomp' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta de la compañía.";
                $idcomp = $nom = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El ID de la compañía ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta de la compañía.";
                    $idcomp = $nom = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $idcomp = $nom = "";
        }
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
        $query="SELECT * FROM Compania WHERE idCompania='$idcomp' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja de la compañía.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Compania SET estatus=false WHERE idCompania='$idcomp' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja de la compañía.";
            }
        }
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere dato actualizado.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }
    
    if ($idcomp_error == "" and $nom_error == ""){
        $query="SELECT * FROM Compania WHERE idCompania='$idcomp' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en el actualización de datos de la compañía.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Compania SET nombre='$nom' WHERE idCompania='$idcomp' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en el actualización de datos de la compañía.";
            }
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
        $query="SELECT * FROM Compania WHERE idCompania='$idcomp' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Compania WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idcomp = $nom = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere dato actualizado.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }
    
    if ($idcomp_error == "" and $nom_error == ""){
        $query="SELECT * FROM Compania WHERE idCompania='$idcomp' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en el actualización de datos de la compañía.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE Compania SET nombre='$nom', estatus=true WHERE idCompania='$idcomp'";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en el actualización de datos de la compañía.";
            }
        }
        $idcomp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idcomp = $nom = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
