<?php

include_once "utilerias.php";
$rol_error = $rol_desc_error = ""; 
$rol = $rol_desc = $success = $option = $btnsn = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere la descripción.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }
    $estatus = 1;
    
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="INSERT INTO rol(rol,descripcion,estatus) VALUES ('$rol','$rol_desc','$estatus')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM rol WHERE rol='$rol' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta del Rol.";
                $rol = $rol_desc = $estatus = "";;
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El rol ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta del rol.";
                    $rol = $rol_desc = $estatus = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $rol = $rol_desc = $estatus = "";
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if ($rol_error == "" and $rol_desc_error == ""){
        $query="SELECT * FROM Rol WHERE rol='$rol' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del Rol.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Rol SET estatus=false WHERE rol='$rol' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del Rol.";
            }
        }
        $rol = $rol_desc = $estatus = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere la descripción a modificar.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }
    //echo $rol_af;
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="UPDATE rol SET descripcion='$rol_desc' WHERE rol='$rol'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if ($rol_error == ""){
        $option = "Consultas por Rol";
        $query="SELECT * FROM Rol WHERE rol='$rol'";
        $result = mysqli_query($conection, $query);
        $rol = $rol_desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere dato para actualizar.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere dato actualizado.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }

    $rol = test_input($_POST["rol"]);
    
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="SELECT * FROM Rol WHERE rol='$rol' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del usuario.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE Rol SET descripcion='$rol_desc', estatus=true WHERE rol='$rol'";
                $sql=mysqli_query($conection,$query);
                if(!$sql){
                    $success = "Error en la actualización de datos del usuario.";
                }else{
                    $success = "Alta y actualización realizada con éxito.";
                }
            }
            else{
                $success = "Error en la actualización de datos del almacen.";
            }
        }
        $rol = $rol_desc = $estatus = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idalm = $idcomp = $desc = "";
}


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Rol";
    $result = mysqli_query($conection, $query);
    $rol = $rol_desc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
