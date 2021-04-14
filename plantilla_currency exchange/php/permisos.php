<?php

include_once "utilerias.php";
$id_user_error = $per_error = $per_af_error = ""; 
$id_user = $per = $per_af = $success = $option = $checked = $check_list_ar = $i = $permiso_check = $btnsn = $arr_aux = $permiso_check_aux = "";

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
        foreach($check_list_ar as $permiso_check){
            $query="INSERT INTO permiso VALUES('$id_user','$permiso_check','$estatus')";
            $sql=mysqli_query($conection,$query);
        }
        if (!$sql){
            $arr_aux = array();
            foreach($check_list_ar as $permiso_check){
                $query="SELECT * FROM permiso WHERE idUsuario='$id_user' and permiso='$permiso_check' and estatus=false";
                $exist = mysqli_query($conection, $query);
                if (!$exist){
                    $success = "Error. No se encontro.";
                }
                else{
                    $arr_aux[] = $permiso_check;
                }
                if (!empty($arr_aux)){
                    $success = "El permiso para este usuario ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo?";
                    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
                        foreach($arr_aux as $permiso_check_aux){
                            $query="UPDATE permiso SET estatus=true WHERE idUsuario='$id_user' and permiso='$permiso_check_aux' and estatus=false";
                            $sql=mysqli_query($conection,$query);
                            if(!$sql){
                                $success = "Error en la actualización de permisos del usuario.";
                            }
                            else{
                                $success = "Alta y actualización realizada con éxito.";
                            }
                        }
                    }
                    //$success = json_encode($arr_aux);
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
            $query="UPDATE permiso SET estatus='0' WHERE idUsuario='$id_user' and permiso='$permiso_check'";
            $sql=mysqli_query($conection,$query);
        }
        if (!$sql){
            $success = "Error en la baja del Usuario.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $iduser = $check_list_ar = $permiso_check = $estatus = "";
    }
}

/*if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["per"])){
        $per_error = "Se requiere el Permiso.";
    }
    else{
        $per = test_input($_POST["per"]);
    }

    if (empty($_POST["per_af"])){
        $per_af_error = "Se requiere el Permiso a actualizar.";
    }
    else{
        $per_af = test_input($_POST["per_af"]);
    }

    if ($id_user_error == "" and $per_error == ""){
        $query="UPDATE permiso SET permiso='$per_af' WHERE idUsuario='$id_user' and permiso='$per'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $id_comp = $rol = $per_af = "";;
    }
}*/

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if ($id_user_error == "" and $per_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM permiso WHERE idUsuario='$id_user'";
        $result = mysqli_query($conection, $query);
        $iduser = $check_list_ar = $permiso_check = $estatus = "";
    }
}

/*if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    $check_list_ar = array();
    $check_list_ar = $_POST['check_list'];

    if($id_user_error == ""){
        foreach($check_list_ar as $permiso_check){
            $query="SELECT * FROM permiso WHERE idUsuario='$id_user' and permiso='$permiso_check' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error. No se encontro.";
            }
            else{
                $arr_aux[] = $permiso_check;
            }
        }
        foreach($arr_aux as $permiso_check_aux){
            $query="UPDATE permiso SET estatus=true WHERE idUsuario='$id_user' and permiso='$permiso_check_aux' and estatus=false";
            $sql=mysqli_query($conection,$query);
            if(!$sql){
                $success = "Error en la actualización de permisos del usuario.";
            }
            else{
                $success = "Alta y actualización realizada con éxito.";
            }
        }
        /*else{
            $success = "Error en la actualización de permisos del usuario.";
        }
    }
}*/


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM permiso";
    $result = mysqli_query($conection, $query);
    $id_comp = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
