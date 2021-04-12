<?php

include_once "utilerias.php";
$id_user_error = $id_comp_error = $nom_error = $contrasena_error = $rol_error = ""; 
$id_user = $id_comp = $nom = $contrasena = $rol = $success = $option = $btnsn = $exist = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el Nombre.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["contrasena"])){
        $contrasena_error = "Se requiere la Contraseña.";
    }
    else{
        $contrasena = test_input($_POST["contrasena"]);
    }

    $rol = test_input($_POST["rol"]);
    
    $estatus = 1;
    
    if ($id_user_error == "" and $id_comp_error == "" and $nom_error == "" and $contrasena_error == "" and $rol_error == ""){
        $laContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $query="INSERT INTO Usuario(idCompania,idUsuario,nombre,contrasena,rol,estatus) VALUES ('$id_comp','$id_user','$nom','$laContrasena','$rol','$estatus')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta del usuario.";
                $idalm = $idcomp = $desc = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El ID del usuario ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta del almacen.";
                    $id_user = $id_comp = $nom = $contrasena = $rol = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $id_user = $id_comp = $nom = $contrasena = $rol = "";
        }
        //$id_user = $id_comp = $nom = $contrasena = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }
    
    if ($id_user_error == ""){
        $query="UPDATE Usuario SET estatus='0' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del Usuario.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $id_comp = $nom = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el Nombre.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["contrasena"])){
        $contrasena_error = "Se requiere la Contraseña.";
    }
    else{
        $contrasena = test_input($_POST["contrasena"]);
    }

    $rol = test_input($_POST["rol"]);
    
    if ($id_user_error == "" and $id_comp_error == "" and $nom_error == "" and $contrasena_error == "" and $rol_error == ""){
        $query="UPDATE Usuario SET nombre='$nom', idUsuario='$id_user', contrasena='$contrasena', rol='$rol' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos de la compañía.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
       $id_user = $id_comp = $nom = $contrasena = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if ($id_user_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus='1'";
        $result = mysqli_query($conection, $query);
        $id_user = $id_comp = $nom = $contrasena = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere dato para actualizar.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }
    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere dato actualizado.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere dato actualizado.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }
    if (empty($_POST["contrasena"])){
        $contrasena_error = "Se requiere dato actualizado.";
    }
    else{
        $contrasena = test_input($_POST["contrasena"]);
    }

    $rol = test_input($_POST["rol"]);
    
    if ($id_user_error == "" and $id_comp_error == "" and $nom_error == "" and $contrasena_error == "" and $rol_error == ""){
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en el actualización de datos del usuario.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $laContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
                $query="UPDATE Usuario SET nombre='$nom', idCompania='$id_comp', estatus=true, contrasena='$laContrasena' WHERE idUsuario='$id_user'";
                $sql=mysqli_query($conection,$query);
                if(!$sql){
                    $succes = "Error  en la actualización de datos del usuario.";
                }else{
                    $success = "Alta y actualización realizada con éxito.";
                }
            }
            else{
                $success = "Error en el actualización de datos del almacen.";
            }
        }
        $id_user = $id_comp = $nom = $contrasena = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idalm = $idcomp = $desc = "";
}


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Usuario";
    $result = mysqli_query($conection, $query);
    $id_user = $id_comp = $nom = $contrasena = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
