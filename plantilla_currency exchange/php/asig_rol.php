<?php

include_once "utilerias.php";
$id_user_error = $rol_error = ""; 
$id_user = $rol = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
   	if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    
    if ($id_user_error == "" and $rol_error == ""){
        $query="UPDATE Usuario SET rol='$rol' WHERE idUsuario='$id_user' AND estatus=1";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de rol al Usuario.";
        }
        else{
            $query = "SELECT * FROM rol WHERE estatus = 1";
            $sql = mysqli_query($conection, $query);
            $roles = array();
            while($row = $sql->fetch_assoc()){
                array_push($roles, $row['rol']);
            }
            foreach($roles as $mirol){
                if($mirol == $rol){
                    $success = "Alta realizada con éxito.";
                }
            }
            if($success == "Alta realizada con éxito."){
                $query = "DELETE FROM Permiso WHERE idUsuario = '$id_user'";
                mysqli_query($conection, $query);
                crea_permiso($id_user, $rol);
            }else{
                $success = "Error en la alta de usuario, rol no encontrado.";
            }

        }
        $id_user = $rol = "";
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
        $query="UPDATE Usuario SET rol='' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de usuario a rol";
        }
        else{
            $success = "Baja realizada con éxito.";
            registro_baja($query, $_SESSION['usuario']);
        }
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol a asignar.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if ($id_user_error == "" and $rol_error == ""){
        $query="UPDATE Usuario SET rol='$rol' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
            crea_permiso($id_user, $rol);
        }
        $id_comp = $rol = "";
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
        $id_user = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Usuario WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $id_user = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
