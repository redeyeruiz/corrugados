<?php

include_once "util_pcP.php";
$idrep_error = $idcomp_error = $nomrep_error = ""; 
$idrep = $idcomp = $nomrep = $success = $option = $exist = $btnsn = $val1 = "";

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
        $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
        $val1 = mysqli_query($conection,$query);
        $row = $val1-> fetch_assoc();
        if ($row["estatus"] == "0"){
            $success = "Error en el alta del agente.";
            $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
        }
        else{
            $query="INSERT INTO Agente (idRepresentante, nomRepresentante, idCompania, estatus) VALUES ('$idrep','$nomrep','$idcomp', true);";
            $sql=mysqli_query($conection,$query);
            if (!$sql){
                $query="SELECT * FROM Agente WHERE idRepresentante='$idrep' and estatus=false";
                $exist = mysqli_query($conection, $query);
                if (!$exist){
                    $success = "Error en el alta del agente.";
                    $idrep = $idcomp = $nomrep = "";
                }
                else{
                    $row = $exist-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $success = "El ID del agente ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                        $btnsn = "Mostrar";
                    }
                    else{
                        $success = "Error en el alta del agente.";
                        $idrep = $idcomp = $nomrep = "";
                    }
                }
            }
            else{
                $success = "Alta realizada con éxito.";
                $idrep = $idcomp = $nomrep = "";
            }
            //$idrep = $idcomp = $nomrep = "";
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante para dar de baja.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    
    if ($idrep_error == ""){
        $query="SELECT * FROM Agente WHERE idRepresentante='$idrep' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del agente.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Agente SET estatus=false WHERE idRepresentante='$idrep' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del agente.";
            }
        }
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere dato para actualizar.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nomrep"])){
        $nomrep_error = "Se requiere dato actualizado.";
    }
    else{
        $nomrep = test_input($_POST["nomrep"]);
    }
    
    if ($idrep_error == "" and $idcomp_error == "" and $nomrep_error == ""){
        $query="SELECT * FROM Agente WHERE idRepresentante='$idrep' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del agente.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del agente.";
                $idcomp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "1"){
                    $query="UPDATE Agente SET idCompania='$idcomp', nomRepresentante='$nomrep' WHERE idRepresentante='$idrep' AND estatus=true";
                    $sql=mysqli_query($conection,$query);
                    $success = "Actualización realizada con éxito.";
                }
                else{
                    $success = "Error en la actualización de datos del agente.";
                }
            }
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
        $query="SELECT * FROM Agente WHERE idRepresentante='$idrep' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Agente WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idrep = $idcomp = $nomrep = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere dato para actualizar.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["nomrep"])){
        $nomrep_error = "Se requiere dato actualizado.";
    }
    else{
        $nomrep = test_input($_POST["nomrep"]);
    }
    
    if ($idrep_error == "" and $idcomp_error == "" and $nomrep_error == ""){
        $query="SELECT * FROM Agente WHERE idRepresentante='$idrep' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del agente.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del agente.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $query="UPDATE Agente SET idCompania='$idcomp', nomRepresentante='$nomrep', estatus=true WHERE idRepresentante='$idrep'";
                    $sql=mysqli_query($conection,$query);
                    if(!$sql){
                        //$success = "Error en la actualización de datos del usuario.";
                        $success = mysqli_error($conection);
                    }else{
                        $success = "Alta y actualización realizada con éxito.";
                    }
                }
                else{
                    $success = "Error en la actualización de datos del agente.";
                }
            }
        }
        $idrep = $idcomp = $nomrep = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idrep = $idcomp = $nomrep = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

