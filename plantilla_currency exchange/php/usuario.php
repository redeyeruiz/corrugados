<?php

include_once "utilerias.php";
$id_user_error = $id_comp_error = $nom_error = $contrasena_error = $rol_error = ""; 
$id_user = $id_comp = $nom = $contrasena = $rol = $success = $option = $btnsn = $exist = $val1 = $val2 = "";


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

        $query = "SELECT * FROM Compania WHERE idCompania='$id_comp' and estatus=true";
        $val1 = mysqli_query($conection,$query);
        if (!$val1){
            $success = "Error en el alta del usuario.";
            $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
        }
        else{
            $query = "SELECT * FROM Rol WHERE rol='$rol' and estatus=true";
            $val2 = mysqli_query($conection,$query);
            if (!$val2){
                $success = "Error en el alta del usuario.";
                $rol_error = "El rol ingresado no existe en los registros.";
            }
            else{
                $query="INSERT INTO Usuario(idCompania,idUsuario,nombre,contrasena,rol,estatus) VALUES ('$id_comp','$id_user','$nom','$laContrasena','$rol','$estatus')";
                $sql=mysqli_query($conection,$query);
                if (!$sql){
                    $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=false";
                    $exist = mysqli_query($conection, $query);
                    if (!$exist){
                        $success = "Error en el alta del usuario.";
                        $id_user = $id_comp = $nom = $contrasena = $rol = $estatus = "";
                    }
                    else{
                        $row = $exist-> fetch_assoc();
                        if ($row["estatus"] == "0"){
                            $success = "El ID del usuario ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                            $btnsn = "Mostrar";
                        }
                        else{
                            $success = "Error en el alta del usuario.";
                            $id_user = $id_comp = $nom = $contrasena = $rol = $estatus = "";
                        }
                    }
                }
                else{
                    $success = "Alta realizada con éxito.";
                    crea_permiso($id_user, $rol);
                    $id_user = $id_comp = $nom = $contrasena = $rol = $estatus = "";
                }
            }
        }
        
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
        $idCompania = $_SESSION['idComp'];
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=true and idCompania = '$idCompania'";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del usuario.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Usuario SET estatus=false WHERE idUsuario='$id_user' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $query="DELETE FROM Permiso WHERE idUsuario='$id_user'";
                $success = "Baja realizada con éxito.";
                //echo json_encode($row);
                registro_baja($row, $_SESSION['usuario']);
            }
            else{
                $success = "Error en la baja del usuario.";
            }
        }
        $id_comp = $id_user = $nom = $contrasena = $rol = "";
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
        $laContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del usuario.";
        }
        else{
            $query="SELECT * FROM Compania WHERE idCompania='$id_comp' and estatus=true";
            $val1 = mysqli_query($conection, $query);
            if (!$val1){
                $success = "Error en la actualización del usuario.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query="SELECT * FROM Rol WHERE rol='$rol' and estatus=true";
                $val2 = mysqli_query($conection, $query);
                if (!$val2){
                    $success = "Error en la actualización del usuario.";
                    $id_comp_error = "El rol ingresado no existe en los registros.";
                }
                else{
                    $row = $exist-> fetch_assoc();
                    if ($row["estatus"] == "1"){
                        $query="UPDATE Usuario SET idCompania='$id_comp', nombre='$nom', contrasena='$laContrasena', rol='$rol' WHERE idUsuario='$id_user' and estatus=true";
                        $sql=mysqli_query($conection,$query);
                        if(!$sql){
                            $success = "Error en la actualización de datos del usuario.";
                        }else{
                            crea_permiso($id_user, $rol);
                            $success = "Actualización realizada con éxito.";
                        }
                    }
                    else{
                        $success = "Error en la actualización de datos del usuario.";
                    }
                }
            }
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
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere dato actualizado.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    //$rol = test_input($_POST["rol"]);
    
    if ($id_user_error == "" and $id_comp_error == "" and $nom_error == "" and $contrasena_error == "" and $rol_error == ""){
        $laContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del usuario.";
        }
        else{
            $query="SELECT * FROM Compania WHERE idCompania='$id_comp' and estatus=true";
            $val1 = mysqli_query($conection, $query);
            if (!$val1){
                $success = "Error en la actualización del usuario.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query="SELECT * FROM Rol WHERE rol='$rol' and estatus=true";
                $val2 = mysqli_query($conection, $query);
                if (!$val2){
                    $success = "Error en la actualización del usuario.";
                    $id_comp_error = "El rol ingresado no existe en los registros.";
                }
                else{
                    $row = $exist-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $query="UPDATE Usuario SET idCompania='$id_comp', nombre='$nom', contrasena='$laContrasena', rol='$rol', estatus=true WHERE idUsuario='$id_user'";
                        $sql=mysqli_query($conection,$query);
                        if(!$sql){
                            $success = "Error en la actualización de datos del usuario.";
                        }else{
                            crea_permiso($id_user, $rol);
                            $success = "Actualización realizada con éxito.";
                        }
                    }
                    else{
                        $success = "Error en la actualización de datos del usuario.";
                    }
                }
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
