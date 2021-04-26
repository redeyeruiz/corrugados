<?php

include_once "utilerias.php";
$id_user_error = $per_error = $per_af_error = ""; 
$id_user = $per = $per_af = $success = $option = $checked = $check_list_ar = $i = $permiso_check = $btnsn = $arr_aux = $permiso_check_aux = $val1 = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    $check_list_ar = array();
    $check_list_ar = $_POST['check_list'];
    $estatus = 1;
    
    if(array_key_exists('check_list', $_POST) and $id_user_error == ""){
        $query = "SELECT * FROM Usuario WHERE idUsuario='$id_user'";
        $val1 = mysqli_query($conection,$query);
        $row = $val1-> fetch_assoc();
        if ($row["estatus"] == "0"){
            $success = "Error en el alta del permiso.";
            $id_comp_error = "El ID de usuario ingresado no existe en los registros.";
        }
        else{
            foreach($check_list_ar as $permiso_check){
                $query="INSERT INTO Permiso VALUES('$id_user','$permiso_check','$estatus')";
                $sql=mysqli_query($conection,$query);
            }
            if (!$sql){
                $arr_aux = array();
                foreach($check_list_ar as $permiso_check){
                    $query="SELECT * FROM Permiso WHERE idUsuario='$id_user' and permiso='$permiso_check' and estatus=false";
                    $exist = mysqli_query($conection, $query);
                    if (!$exist){
                        $success = "Error. No se encontro.";
                    }
                    else{
                        $arr_aux[] = $permiso_check;
                    }
                    if (!empty($arr_aux)){
                        $success = "El permiso para este usuario ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo?";
                        $btnsn = "Mostrar";
                    }
                    else{
                        $success = "Error en el alta del permiso.";
                        $iduser = $check_list_ar = $permiso_check = $estatus = "";
                    }
                }
            }
            else{
                $success = "Alta realizada con éxito.";
                $iduser = $check_list_ar = $permiso_check = $estatus = "";
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

    $check_list_ar = array();
    $check_list_ar = $_POST['check_list'];
    $estatus = 1;
    
    if(array_key_exists('check_list', $_POST) and $id_user_error == ""){
        foreach($check_list_ar as $permiso_check){
            $query="UPDATE Permiso SET estatus='0' WHERE idUsuario='$id_user' and permiso='$permiso_check'";
            $sql=mysqli_query($conection,$query);
        }
        if (!$sql){
            $success = "Error en la baja del Usuario.";
        }
        else{
            $success = "Baja realizada con éxito.";
            registro_baja($query, $_SESSION['usuario']);
        }
        $iduser = $check_list_ar = $permiso_check = $estatus = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if ($id_user_error == "" and $per_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM Permiso WHERE idUsuario='$id_user'";
        $result = mysqli_query($conection, $query);
        $iduser = $check_list_ar = $permiso_check = $estatus = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    $check_list_ar = array();
    $check_list_ar = $_POST['check_list'];
    $estatus = 1;

    if($id_user_error == ""){
        $query = "SELECT * FROM Usuario WHERE idUsuario='$id_user'";
        $val1 = mysqli_query($conection,$query);
        $row = $val1-> fetch_assoc();
        if ($row["estatus"] == "0"){
            $success = "Error en la actualización del usuario.";
            $id_comp_error = "El ID de usuario ingresado no existe en los registros.";
        }
        else{
            foreach($check_list_ar as $permiso_check_aux){
                $query="DELETE FROM Permiso WHERE estatus=false AND idUsuario='$id_user' AND permiso='$permiso_check_aux'";
                $sql=mysqli_query($conection,$query);
                $query="INSERT INTO Permiso VALUES('$id_user','$permiso_check_aux','$estatus')";
                $sql=mysqli_query($conection,$query);
                if(!$sql){
                    $success = "Error en la actualización de permisos del usuario.";
                }
                else{
                    $success = "Alta y actualización realizada con éxito.";
                }
            }
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Permiso";
    $result = mysqli_query($conection, $query);
    $id_comp = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
