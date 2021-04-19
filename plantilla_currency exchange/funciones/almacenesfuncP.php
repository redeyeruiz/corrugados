<?php

include_once "util_pcP.php";
$idalm_error = $idcomp_error = $desc_error = ""; 
$idalm = $idcomp = $desc = $success = $option = $btnsn = $exist = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere una descripción.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == "" and $desc_error == ""){
        $query="INSERT INTO Almacen (idAlmacen, idCompania, descripcion, estatus) VALUES ('$idalm','$idcomp','$desc', true);";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM Almacen WHERE idAlmacen='$idalm' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta del almacen.";
                $idalm = $idcomp = $desc = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El ID del almacen ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta del almacen.";
                    $idalm = $idcomp = $desc = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $idalm = $idcomp = $desc = "";
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen para dar de baja.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    
    if ($idalm_error == ""){
        $query="SELECT * FROM Almacen WHERE idAlmacen='$idalm' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del almacen.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Almacen SET estatus=false WHERE idAlmacen='$idalm' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del almacen.";
            }
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere dato para actualizar.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == "" and $desc_error == ""){
        $query="SELECT * FROM Almacen WHERE idAlmacen='$idalm' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del almacen.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Almacen SET idCompania='$idcomp', descripcion='$desc' WHERE idAlmacen='$idalm' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del almacen.";
            }
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del Almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de Almacen";
        $query="SELECT * FROM Almacen WHERE idAlmacen='$idalm' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Almacen WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idalm = $idcomp = $desc = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere dato para actualizar.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == "" and $desc_error == ""){
        $query="SELECT * FROM Almacen WHERE idAlmacen='$idalm' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del almacen.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE Almacen SET idCompania='$idcomp', descripcion='$desc', estatus=true WHERE idAlmacen='$idalm'";
                $sql=mysqli_query($conection,$query);
                $success = "Alta y actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del almacen.";
            }
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idalm = $idcomp = $desc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}