<?php
function conecta_servidor(){

    return $conexion=mysqli_connect("localhost","root","","papelescorrugados");
    
}

function unsetAll(){
    unset($_SESSION['queries']);
    unset($_SESSION['direntC']);
    unset($_SESSION['nomEC']);
    unset($_SESSION['direccionC']);
    unset($_SESSION['municipioC']);
    unset($_SESSION['estadoC']);
    unset($_SESSION['telefonoC']);
    unset($_SESSION['obsC']);
    unset($_SESSION['CRC']);
    unset( $_SESSION['paisC']); 
    unset($_SESSION['RFCC']);
    unset($_SESSION['inputID']);
    unset($_SESSION['idCompania']);
    unset($_SESSION['IDorden']);
    unset($_SESSION['CPC']);
    unset($_SESSION['ordenCompra']);
    unset($_SESSION['idCliente']);
    unset($_SESSION['folio']);        
    unset($_SESSION['numOrdenes']);

    unset($_SESSION['nombreClienteDT']);
    unset($_SESSION['dirCompleta']);
    unset($_SESSION['precio']);
    unset($_POST['nombreClienteDT']);
    unset($_POST['descripcion']);
    unset($_POST['cantidad']);
    //modificar orden unsetAll


 
    unset($_SESSION['descripcion']);


    unset($_SESSION['dirEnt']);

    unset($_SESSION['idOrden']);
    unset($_SESSION['saldoOrden']);         
}
?>