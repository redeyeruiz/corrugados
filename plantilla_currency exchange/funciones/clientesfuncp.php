<?php

include_once "util_pcP.php";
$idcomp_error = $idcliente_error = $idrep_error = $idlist_error = $idalma_error = $nom_error = $status_error = $analista_error = $divisa_error = $limitcre_error = $salorden_error = $salfac_error =  ""; 
$idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = $success = $option = $exist = $btnsn = $val1 = $val2 = $val3 = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if (empty($_POST["idlist"])){
        $idlist_error = "Se requiere el ID de la lista de precios.";
    }
    else{
        $idlist = test_input($_POST["idlist"]);
    }

    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el ID del almacén";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el Nombre del Cliente";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["status"])){
        $status_error = "Se requiere el Status del Cliente";
    }
    else{
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["analista"])){
        $analista_error = "Se requiere el Analista";
    }
    else{
        $analista = test_input($_POST["analista"]);
    }

    if (empty($_POST["divisa"])){
        $divisa_error = "Se requiere la Divisa";
    }
    else{
        $divisa = test_input($_POST["divisa"]);
    }

    if (empty($_POST["limitcre"])){
        $limitcre_error = "Se requiere el limite de credito";
    }
    else{
        $limitcre = test_input($_POST["limitcre"]);
    }

    if (empty($_POST["salorden"])){
        $salorden_error = "Se requiere el Saldo de la Orden";
    }
    else{
        $salorden = test_input($_POST["salorden"]);
    }

    if (empty($_POST["salfac"])){
        $salfac_error = "Se requiere el Saldo de la Factura";
    }
    else{
        $salfac = test_input($_POST["salfac"]);
    }


    if ($idcomp_error == "" and $idcliente_error == "" and $idrep_error == "" and $idlist_error == "" and $idalma_error == "" and $nom_error == "" and $status_error == "" and $analista_error == "" and $divisa_error == "" and $limitcre_error == "" and $salorden_error == "" and $salfac_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
        $val1 = mysqli_query($conection,$query);
        $row = $val1-> fetch_assoc();
        if ($row["estatus"] == "0"){
            $success = "Error en el alta del cliente.";
            $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
        }
        else{
            $query = "SELECT * FROM Agente WHERE idRepresentante='$idrep'";
            $val2 = mysqli_query($conection,$query);
            $row = $val2-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del cliente.";
                $id_comp_error = "El ID del representante ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalma'";
                $val3 = mysqli_query($conection,$query);
                $row = $val3-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del cliente.";
                    $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
                }
                else{
                    $query="INSERT INTO Cliente (idCliente, idCompania, idRepresentante, idLista, idAlmacen, nombreCliente, estatusCliente, analista, divisa, limCredito, saldoOrden, saldoFactura, bloqueo, estatus) VALUES ('$idcliente','$idcomp','$idrep','$idlist','$idalma','$nom','$status','$analista','$divisa','$limitcre','$salorden','$salfac', false, true);";
                    $sql=mysqli_query($conection,$query);
                    if (!$sql){
                        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente' and estatus=false";
                        $exist = mysqli_query($conection, $query);
                        if (!$exist){
                            $success = "Error en el alta del cliente.";
                            $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
                        }
                        else{
                            $row = $exist-> fetch_assoc();
                            if ($row["estatus"] == "0"){
                                $success = "El ID del cliente ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                                $btnsn = "Mostrar";
                            }
                            else{
                                $success = "Error en el alta del cliente.";
                                $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
                            }
                        }
                    }
                    else{
                        $success = "Alta realizada con éxito.";
                        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
                    }
                    //$idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
                }
            }
        }
    }
}


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if ($idcliente_error == ""){
        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del cliente.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Cliente SET estatus=false WHERE idCliente='$idcliente' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del cliente.";
            }
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el dato actualizado.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if (empty($_POST["idlist"])){
        $idlist_error = "Se requiere el dato actualizado.";
    }
    else{
        $idlist = test_input($_POST["idlist"]);
    }

    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el dato actualizado.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el dato actualizado.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["status"])){
        $status_error = "Se requiere el dato actualizado.";
    }
    else{
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["analista"])){
        $analista_error = "Se requiere el dato actualizado.";
    }
    else{
        $analista = test_input($_POST["analista"]);
    }

    if (empty($_POST["divisa"])){
        $divisa_error = "Se requiere el dato actualizado.";
    }
    else{
        $divisa = test_input($_POST["divisa"]);
    }

    if (empty($_POST["limitcre"])){
        $limitcre_error = "Se requiere el dato actualizado.";
    }
    else{
        $limitcre = test_input($_POST["limitcre"]);
    }

    if (empty($_POST["salorden"])){
        $salorden_error = "Se requiere el dato actualizado.";
    }
    else{
        $salorden = test_input($_POST["salorden"]);
    }

    if (empty($_POST["salfac"])){
        $salfac_error = "Se requiere el dato actualizado.";
    }
    else{
        $salfac = test_input($_POST["salfac"]);
    }
    
    if ($idcomp_error == "" and $idcliente_error == "" and $idrep_error == "" and $idlist_error == "" and $idalma_error == "" and $nom_error == "" and $status_error == "" and $analista_error == "" and $divisa_error == "" and $limitcre_error == "" and $salorden_error == "" and $salfac_error == ""){
        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del cliente.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del cliente.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Agente WHERE idRepresentante='$idrep'";
                $val2 = mysqli_query($conection,$query);
                $row = $val2-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del cliente.";
                    $id_comp_error = "El ID del representante ingresado no existe en los registros.";
                }
                else{
                    $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalma'";
                    $val3 = mysqli_query($conection,$query);
                    $row = $val3-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $success = "Error en el alta del cliente.";
                        $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
                    }
                    else{
                        $row = $exist-> fetch_assoc();
                        if ($row["estatus"] == "1"){
                            $query="UPDATE Cliente SET idCompania='$idcomp', idRepresentante='$idrep', idLista='$idlist', idAlmacen='$idalma', nombreCliente='$nom', estatusCliente='$status', analista='$analista', divisa='$divisa', limCredito='$limitcre', saldoOrden='$salorden', saldoFactura='$salfac' WHERE idCliente='$idcliente' AND estatus=true";
                            $sql=mysqli_query($conection,$query);
                            $success = "Actualización realizada con éxito.";
                        }
                        else{
                            $success = "Error en la actualización de datos del cliente.";
                        }
                    }
                }
            }
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if ($idcliente_error == ""){
        $option = "Consultas por Id del Cliente";
        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Cliente WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el dato actualizado.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if (empty($_POST["idlist"])){
        $idlist_error = "Se requiere el dato actualizado.";
    }
    else{
        $idlist = test_input($_POST["idlist"]);
    }

    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el dato actualizado.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el dato actualizado.";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["status"])){
        $status_error = "Se requiere el dato actualizado.";
    }
    else{
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["analista"])){
        $analista_error = "Se requiere el dato actualizado.";
    }
    else{
        $analista = test_input($_POST["analista"]);
    }

    if (empty($_POST["divisa"])){
        $divisa_error = "Se requiere el dato actualizado.";
    }
    else{
        $divisa = test_input($_POST["divisa"]);
    }

    if (empty($_POST["limitcre"])){
        $limitcre_error = "Se requiere el dato actualizado.";
    }
    else{
        $limitcre = test_input($_POST["limitcre"]);
    }

    if (empty($_POST["salorden"])){
        $salorden_error = "Se requiere el dato actualizado.";
    }
    else{
        $salorden = test_input($_POST["salorden"]);
    }

    if (empty($_POST["salfac"])){
        $salfac_error = "Se requiere el dato actualizado.";
    }
    else{
        $salfac = test_input($_POST["salfac"]);
    }
    
    if ($idcomp_error == "" and $idcliente_error == "" and $idrep_error == "" and $idlist_error == "" and $idalma_error == "" and $nom_error == "" and $status_error == "" and $analista_error == "" and $divisa_error == "" and $limitcre_error == "" and $salorden_error == "" and $salfac_error == ""){
        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del cliente.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del cliente.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Agente WHERE idRepresentante='$idrep'";
                $val2 = mysqli_query($conection,$query);
                $row = $val2-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del cliente.";
                    $id_comp_error = "El ID del representante ingresado no existe en los registros.";
                }
                else{
                    $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalma'";
                    $val3 = mysqli_query($conection,$query);
                    $row = $val3-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $success = "Error en el alta del cliente.";
                        $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
                    }
                    else{
                        $row = $exist-> fetch_assoc();
                        if ($row["estatus"] == "0"){
                            $query="UPDATE Cliente SET idCompania='$idcomp', idRepresentante='$idrep', idLista='$idlist', idAlmacen='$idalma', nombreCliente='$nom', estatusCliente='$status', analista='$analista', divisa='$divisa', limCredito='$limitcre', saldoOrden='$salorden', saldoFactura='$salfac', estatus=true WHERE idCliente='$idcliente'";
                            $sql=mysqli_query($conection,$query);
                            $success = "Alta y actualización realizada con éxito.";
                        }
                        else{
                            $success = "Error en la actualización de datos del cliente.";
                        }
                    }
                }
            }
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}