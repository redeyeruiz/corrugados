<?php
    include('php/utilerias2.php');
    function setOrdenCompra(){
        
        if(!isset($_SESSION['folio']) ){
            
            if(isset($_SESSION['idCliente'])){
                $idCliente=$_SESSION['idCliente'];
                $conn=conecta_servidor();
                $query="SELECT MAX(folio) AS folio FROM `orden` WHERE '1'";
                $sql=mysqli_query($conn,$query);
                $reg=mysqli_fetch_object($sql);
                if ($reg==mysqli_fetch_array($sql)){
                    
                    echo"no FUNCIONA el max";
                    echo "error no existe tal cliente ('numOrdenes')";
                }else{
                    
                    $_SESSION['folio']=strval( intval($reg->folio) +1);
                    
                }

            }    
        }
        if(isset($_POST['ordenCompra'])){
            $ordenCompra=$_POST['ordenCompra'];
            $conn=conecta_servidor();
            $query="SELECT ordenCompra  FROM `orden` WHERE ordenCompra='$ordenCompra'";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                $_SESSION['ordenCompra']=$_POST['ordenCompra'];             
                
            }else{
                
                echo "error ese numero de órden ya existe";
                unsetAll();
                
            }


            
        }
            
               
            
    }
    
    function agregar_tabla(){
        crearIdOrden();
                
        if( isset($_POST['agregarArt']) && isset($_SESSION['idCompania']) && isset($_SESSION['direntC']) && $_SESSION['precioT'] != "0"){
    
            setOrdenCompra();
            

            $idOrden                                    =$_SESSION['IDorden'];
            $idCompania                                 =$_SESSION['idCompania'];
            $folio                                      =$_SESSION['folio'];
            $numFact                                    ='NULL';
            $ordenBaan                                  ='NULL';
            $idCliente                                  =$_SESSION['idCliente'];
            $nombreCliente =                            $_SESSION['nombreCliente']; 
            $_SESSION['dirEnt']  =$dirEnt               =$_SESSION['direntC'];
            $idArticulo                                 =$_SESSION['idArticulo'];
            $ordenCompra                                =$_SESSION['ordenCompra'];       
            $_SESSION['cantidad']=$cantidad             =$_POST['cantidad'];
            $precio                                     =$_SESSION['precio_articulo'];
            $_SESSION['descripcion'] =$decripcion       =$_POST['descripcion'];
            $_SESSION['fechaOrden'] =$fechaOrden        =$_POST['fechaOrden'];
            $_SESSION['fechaSolicitud'] =$fechaSolicitud=$_POST['fechaSolicitud'];
            $fechaEntrega                               ="NULL";
            $entregado                                  =0;
            $acumulado                                  =0;
            $total                                      =$_SESSION['precioT'];
            $costo                                      =$_SESSION['costo'];
            $moneda                                     =$_SESSION['moneda'];
            $Observaciones                              =$_POST['Observaciones'];
            $estatus=0;
            $producido=0;

            ordenTotal($_SESSION['precioT']);

            if(!isset($_SESSION['queries'])){
                $_SESSION['queries']="INSERT INTO reporteorden  (`idOrden`, `idCompania`, `folio`, `numFact`, `ordenBaan`, `idCliente`, `nombreCliente`, `dirEnt`, `idArticulo`, `ordenCompra`, `cantidad`, `precio`, `descripcion`, `fechaOrden`, `fechaSolicitud`, `fechaEntrega`, `vFac`, `vCXC`, `vPRE`, `vCST`, `vING`, `vPLN`, `vFEC`, `producido`, `entregado`, `acumulado`, `total`, `costo`, `moneda`, `nota`, `estatus`)
                VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
            
            }
                
            else{
                $_SESSION['queries'] .= "INSERT INTO reporteorden (`idOrden`, `idCompania`, `folio`, `numFact`, `ordenBaan`, `idCliente`, `nombreCliente`, `dirEnt`, `idArticulo`, `ordenCompra`, `cantidad`, `precio`, `descripcion`, `fechaOrden`, `fechaSolicitud`, `fechaEntrega`, `vFac`, `vCXC`, `vPRE`, `vCST`, `vING`, `vPLN`, `vFEC`, `producido`, `entregado`, `acumulado`, `total`, `costo`, `moneda`, `nota`, `estatus`)
                VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
            }
            
            

            update_table();

        }
        else{
            if(isset($_POST['agregarArt'])){
                echo "falta llenar todos los campode de la forum superior";
                
            }
            
        }
        
    }

    
     
    //guardar e insertar a la DB
    function guardar(){
        if(isset($_POST["guardar"]) && isset($_SESSION["queries"])   ){

            $conn = conecta_servidor();

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_SESSION['idCliente']) && !isset($_SESSION['numOrdenes'])){
                $idCliente=$_SESSION['idCliente'];
                $query="SELECT MAX(folio) AS folio FROM `orden` WHERE idCliente='$idCliente'";
                $sql=mysqli_query($conn,$query);
                $reg=mysqli_fetch_object($sql);
                if ($reg==mysqli_fetch_array($sql)){
                    $_SESSION['ordenCompra']='1';
                    echo "error no existe tal cliente ('numOrdenes')";
                }else{
    
                    
                    $_SESSION['folio']=strval( intval($reg->folio) +1);
                    
                }
            }

            
            guardarQueries();

            unsetAll();
            
            

        }
    }
    
    function guardarQueries(){
        if(isset($_SESSION['queries'])){
            $dirent=$_SESSION['direntC'];
            $idOrden=$_SESSION['IDorden'];
            $idCompania=$_SESSION['idCompania'];
            $idCliente=$_SESSION['idCliente'];
            $ordenCompra=$_SESSION['ordenCompra'];
            $fechaOrden=$_SESSION['fechaOrden'];
            $folio=$_SESSION['folio'];
            $estatus=0;

            $total=$_SESSION['ordenT'];
            $conn= conecta_servidor();
            $query="INSERT INTO orden (`idOrden`, `idCompania`, `idCliente`, `ordenCompra`, `fechaOrden`, `dirEnt`, `estatusOrden`, `tFac`, `tCXC`, `tPRE`, `tCST`, `tING`, `tPLN`, `tFEC`, `total`, `vFac`, `vCXC`, `vPRE`, `vCST`, `vING`, `vPLN`, `vFEC`, `estatus`,`folio`)
            VALUES('$idOrden','$idCompania','$idCliente','$ordenCompra','$fechaOrden','$dirent','0','null','null','null','null','null','null','null','$total','0','0','0','0','0','0','0','$estatus','$folio')";
            mysqli_query($conn, $query);
            $queries=explode("|",$_SESSION['queries'],-1);

            for($i=0;$i<count($queries);$i++){
                $query=$queries[$i];
                mysqli_query($conn, $query);
            }
            executeQuery($conn,"UPDATE cliente SET saldoOrden= saldoOrden-'$total'  WHERE idCliente ='$idCliente' AND idCompania = '$idCompania' ");
            queriesStock($conn);
        }
    }
    //cancelar una orden
    function cancelar(){
        if(isset($_POST["cancelar"]) ){
            
            unsetAll();

        } 


    }
    function update_table(){
        if(isset($_SESSION['queries'])){
            echo
            "<br><br><br>
            <h1 class='h1-orden'>Artículos Agregados</h1>
            <div class='tbl-header-orden'>
                <table class='table-orden' cellpadding='0' cellspacing='0'>
                <thead>
                    <tr>
                        <th class='th-orden' scope='col'>Folio</th>
                        <th class='th-orden' scope='col'>Cliente</th>
                        <th class='th-orden' scope='col'>Direccion de Entrega</th>
                        <th class='th-orden' scope='col'>Orden de compra</th>
                        <th class='th-orden' scope='col'>Fecha-Orden</th>
                        <th class='th-orden' scope='col'>Articulo</th>
                        <th class='th-orden' scope='col'>Descripción</th>
                        <th class='th-orden' scope='col'>Cantidad</th>
                        <th class='th-orden' scope='col'>Precio</th>
                        <th class='th-orden' scope='col'>Total</th>
                        <th class='th-orden' scope='col'>Fecha-Solicitud</th>
                    </tr>
                </thead>
                </table>
            </div>
            <div class='tbl-content-orden'>
                    <table class='table-orden' cellpadding='0' cellspacing='0'>
                    <tbody>";

            
            $queries=explode("|",$_SESSION['queries'],-1);

            for($i=0;$i<count($queries);$i++){
                $query= explode("'",$queries[$i]);
                $folio          =$query[5];
                $cliente        = $query[13];
                $dirEnt         = $query [15];
                $ordenCompra    = $query [19];
                $fechaOrden     = $query [27];
                $idArticulo     = $query [17];
                $descripcion    = $query [25];
                $cantidad       = $query [21];
                $precio         = $query [23];
                $precioT         = $query [53];
                $fechaSolicitud = $query [29];


                echo
    
                "       <tr>
                            <td class='td-orden'>$folio</td>
                            <td class='td-orden'>$cliente</td>
                            <td class='td-orden'>$dirEnt</td>
                            <td class='td-orden'>$ordenCompra</td>
                            <td class='td-orden'>$fechaOrden</td>
                            <td class='td-orden'>$idArticulo</td>
                            <td class='td-orden'>$descripcion</td>
                            <td class='td-orden'>$cantidad</td>
                            <td class='td-orden'>$precio</td>
                            <td class='td-orden'>$precioT</td>
                            <td class='td-orden'>$fechaSolicitud</td>
                        </tr>
                    ";

    
            }
            echo"
                    </tbody>
                    </table>
            </div>";

            
        }

    }

    //Tabla direccion Chequeo Saldo 

    function tabla_dir(){    

        if(isset($_SESSION['saldoOrden'])){
            $saldoOrden= floatval($_SESSION['saldoOrden']);
        
            if($saldoOrden<15000){
                warningMssg(" Cliente no tiene suficiente saldo");
                //echo " Cliente no tiene suficiente saldo";
                
            }
        }
        
        if(isset($_SESSION['idCliente'])){
    
            $idCliente=$_SESSION['idCliente'];
            
            $conexion=conecta_servidor();
            $query="SELECT * FROM dirent WHERE idCliente = '$idCliente'";
            $sql=mysqli_query($conexion,$query);
            if (mysqli_affected_rows($conexion)==0){
                echo "Error, id cliente inexistente en base de datos o no tiene direcciones asociadas";
            }
            echo "<select id='direcciones' class='datal' name='dirCompleta'>";
            while ($reg=mysqli_fetch_object($sql)){
                
                echo "<option>$reg->dirEnt, $reg->nombreEntrega, $reg->direccion, $reg->municipio, $reg->estado, $reg->telefono, $reg->observaciones, $reg->codPost, $reg->codRuta, $reg->pais, $reg->rfc";

            }
            
            
            echo "</select>";
            


        }
        
        
    

    }
    //tabla clientes
    
    function tabla_clientes(){
            
        
        
        $idRepresentante = idRep();
        
        if($idRepresentante != "ADM")
        {
            $conexion=conecta_servidor();
            $query="SELECT * FROM cliente WHERE idRepresentante = '$idRepresentante' AND bloqueo = 0 AND estatus = 1";
            $sql=mysqli_query($conexion,$query);
            if (mysqli_affected_rows($conexion)==0){
                echo "Error, id cliente inexistente en base de datos";
            }
            echo "<datalist id='nombres'>";
            while ($reg=mysqli_fetch_object($sql)){
                echo "<option>$reg->nombreCliente";

            }
            echo "</datalist>";

        }
        else
        {
            $conexion=conecta_servidor();
            $query="SELECT * FROM cliente WHERE  bloqueo = 0 AND estatus = 1";
            $sql=mysqli_query($conexion,$query);
            if (mysqli_affected_rows($conexion)==0){
                echo "Error, id cliente inexistente en base de datos";
            }
            echo "<datalist id='nombres'>";
            while ($reg=mysqli_fetch_object($sql)){
                echo "<option>$reg->nombreCliente";

            }
            echo "</datalist>"; 
        }
        
        

    }

    //ID Representante

    function idRep(){
        if(!isset($_SESSION['idRepresentante']) && $_SESSION['rol']!="ADM"){
            $idUsuario=$_SESSION['usuario'];
            $conn=conecta_servidor();
            $query="SELECT idRepresentante FROM agente WHERE idUsuario = '$idUsuario'";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                echo "error no existe representante asociado con tal usuario";
            }else{
                return $_SESSION['idRepresentante']=$reg->idRepresentante;
            }   
        }
        else
        {
            return("ADM");
        }
    }
    //valores del Cliente

    function clientValues(){
        
        if(isset($_POST['nombreClienteB'])){
            $_SESSION['nombreClienteDT']=$_POST['nombreClienteDT'];
            
        }
        
        
        if(isset($_SESSION['nombreClienteDT'])){
            
            $datosCliente=explode(",",$_SESSION['nombreClienteDT']);
            $nombreCliente=$datosCliente[0];         
            $conn=conecta_servidor();
            $query="SELECT saldoOrden,divisa,nombreCliente,idCliente,estatus,idLista,saldoOrden,bloqueo,idCompania FROM cliente WHERE nombreCliente = '$nombreCliente'";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                $_SESSION['nombreClienteDT'] ="error no existe tal cliente";
            }else{
                $_SESSION['idCliente']=$reg->idCliente;
                $_SESSION['estatus']=$reg->estatus;
                $_SESSION['idLista']=$reg->idLista;
                $_SESSION['saldoOrden']=$reg->saldoOrden;
                $_SESSION['bloqueo']=$reg->bloqueo;
                $_SESSION['idCompania']=$reg->idCompania;
                $_SESSION['nombreCliente']=$reg->nombreCliente;
                $_SESSION['moneda']=$reg->divisa;
                $_SESSION['saldoOrden']=$reg->saldoOrden;
            }
        }

        if(isset($_POST['nombreClienteB'])){
            unset($_SESSION['dirCompleta']);
            unset($_POST['dirCompleta']);
            unset($_SESSION['direntC']);
            unset($_SESSION['nomEC']);
            unset($_SESSION['direccionC']);
            unset($_SESSION['municipioC']);
            unset($_SESSION['estadoC']);
            unset($_SESSION['obsC']);
            unset($_SESSION['CPC']);
            unset($_SESSION['CRC']);
            unset($_SESSION['paisC']);
            unset($_SESSION['RFCC']);
            unset($_SESSION['queries']);
            unset($_SESSION['ordenT']);
            unset($_SESSION['ordenCompra']);
            
        }

        
    }
    //TABLA ARTICULOS
    function tabla_articulos(){
        
        if(isset($_SESSION['idCliente'])){
            
            $idCliente=$_SESSION['idCliente'];
            $conexion=conecta_servidor();
            $query="SELECT ArticuloExistente.descripcion FROM ArticuloExistente INNER JOIN ArticuloVendido WHERE  ArticuloExistente.idArticulo= ArticuloVendido.idArticulo AND idCliente = '$idCliente'" ;
            $sql=mysqli_query($conexion,$query);
            if (mysqli_affected_rows($conexion)==0){
                echo "<option> No hay articulos asignados a este cliente";
            }

            //echo "<select id='articulos_l' class='datal' name ='descripcion' list='articulos' >";
            while ($reg=mysqli_fetch_object($sql)){
                echo "<option>$reg->descripcion";
    
            }
            echo "</select>";

            
        }
        
        
        
               
    }
    // PRECIO , COSTO , CANTIDAD STOCK, SALDO
    
    function queriesStock($conn){
        $queries=explode("|",$_SESSION['queries'],-1);
        $queriesS=array();
        for($i=0;$i<count($queries);$i++){
            $query= explode("'",$queries[$i]);
            $idArticulo     = $query [17];
            $cantidad       = $query [21];
            array_push($queriesS,"UPDATE articulovendido SET stock= stock +'$cantidad'   WHERE idArticulo ='$idArticulo'");
            array_push($queriesS,"UPDATE articuloexistente SET stock= stock -'$cantidad'   WHERE idArticulo ='$idArticulo'");
        }

        for($i=0;$i<count($queriesS);$i++){
            $query=$queriesS[$i];

            mysqli_query($conn, $query);
            
        }   
    }
    function calcularCosto($idArticulo)
    {
        $conn=conecta_servidor();
        $query="SELECT costoEstandar FROM articuloexistente WHERE  idArticulo ='$idArticulo' ";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            echo "Error, no existe artiuclo con tal  idArticulo";
        }else{
            
            return$reg->costoEstandar;
        }

    }
    function calcularPrecio(){
        if(isset($_POST['calcularP']) && isset($_POST['cantidad'])  || (isset($_POST['agregarArt']) && isset($_POST['cantidad'])) ){
            
            $precio_articulo=obtenerPrecio();
            $_SESSION['precio_articulo']=strval($precio_articulo);
            
            
            $_SESSION['precioT']=strval( floatval($_POST['cantidad']) * $precio_articulo);
            if(isset($_SESSION['idArticulo'])){
                $_SESSION['costo']=strval( floatval($_POST['cantidad']) * calcularCosto($_SESSION['idArticulo']));
            }

        }
    }

    function obtenerPrecio(){
        
        if(isset($_SESSION['idCliente'])){

            $_SESSION['idArticulo']=$idArticulo=obtenerIdArticulo();
            $idLista=$_SESSION['idLista'];  
            
            $conn=conecta_servidor();
            $query="SELECT descuento,precio FROM listaPrecio WHERE idLista ='$idLista' AND idArticulo ='$idArticulo' ";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                echo "Error, no existe artiuclo con tal idLista o idArticulo";
                unset($_SESSION['ordenCompra']);
                return(NULL);
            }else{
                
                return (floatval($reg->precio)  - (floatval($reg->descuento) * floatval($reg->precio) ));
            }
        }
        
    }

    function obtenerIdArticulo(){
        if(isset($_POST['descripcion'])){
            $conn=conecta_servidor();
            $descripcion=$_POST['descripcion'];
            $query="SELECT idArticulo FROM ArticuloExistente WHERE descripcion ='$descripcion'";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                return "Error, no hay articulo con tal descripcion";
            }else{
                return $reg->idArticulo;

            }
        }
        else{
            return "Error, no hay texto en la sección de articulo";
        }
        


    }

    function ordenTotal($strPrecioT){
        if(!isset($_SESSION['ordenT'])){
            $_SESSION['ordenT']=$strPrecioT;

        }
        else{
            $_SESSION['ordenT']= strval(floatval($_SESSION['ordenT']) + floatval($strPrecioT));
        }

    }
   //Dirección

    function update_dir(){
        
        if(isset($_POST['dirCompleta']) && strlen($_POST['dirCompleta'])>10 ){
        
            $_SESSION['dirCompleta']=$direccion= $_POST['dirCompleta'];
            $dire=explode(",",$direccion);
            $_SESSION['direntC'] =$dire[0];

            $_SESSION['nomEC'] =$dire[1];
            $_SESSION['direccionC'] =$dire[2];
            $_SESSION['municipioC'] =$dire[3];
            $_SESSION['estadoC'] =$dire[4];
            $_SESSION['telefonoC'] =$dire[5];
            $_SESSION['obsC'] =$dire[6];
            $_SESSION['CPC'] =$dire[7];
            $_SESSION['CRC'] =$dire[8];
            $_SESSION['paisC'] =$dire[9]; 
            $_SESSION['RFCC'] =$dire[10];
    
               
            
        }
    }
    function crearIdOrden(){
        if(!isset($_SESSION['IDorden']) && isset($_POST['agregarArt'])){
            $_SESSION['IDorden']=uniqidReal();
        }
        
    }
        
    function uniqidReal($lenght = 32) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";

        return $value;
    }

    
    
    function campoOrdenCompra(){
        if(!isset($_SESSION['ordenCompra']))
        {
            echo '<input required class="inputCO" type="text" name="ordenCompra" placeholder=" Órden de compra"  "></input>';
        }
        else{
            $ordenCompra= "$"."_"."SESSION"."['ordenCompra']";
            $value=htmlspecialchars($ordenCompra ?? '', ENT_QUOTES);
            
            echo '<input required disabled class="inputCO" type="number" name="ordenCompra" placeholder=" Órden de compra"  value="'.$value.'" "></input>';
            
        }
        
    }

    ?>
    
    <?php 
    //FTP UPLOAD
    function getFtpParams(){
        $conn=conecta_servidor();
        
        $query="SELECT * FROM parametrosftp ";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            return "Error, no se pudieron extraer datos del ftp";
        }else{
            return array($reg->servidor,$reg->usuario,$reg->contrsena);
        }
    }
    function createFile(){


        //variables
        $idOrden="idOrden";
        $idCliente="idCliente";
        $consecutivo="consecutivo";
        $ordenCompra="ordenCompra";
        $fechaA="fechaA";
        $nombreCliente='nombreCliente';
        $ciudad='ciudad';
        $COP='COP';
        $paisA='paisA';
        $moneda="moneda";
        $pais="pais";
        $direccionA="direccionA";
        $idArticulo="idArticulo";
        $cantidad="cantidad";
        $udVta="udVta";
        $fechaEntrega="fechaEntrega";
        $precio="precio";
        $idRep="idRep";
        $folio="folio";
        $idCompania="idCompania";
        $fechaSlash="fechaSlash";
        $notas="notas";

        //Nombre de archivo
        $folioName=str_repeat("0",9-strlen($folio)).$folio;
        $filename="ordenes/"."PV-".$folioName.$idCliente.$idRep.$idCompania.".txt";
        
        $idArticuloS=str_repeat(" ",21-strlen($idArticulo)).$idArticulo;
        

        $myfile = fopen("$filename", "w") or die("Unable to open file!");
        //Escribiendo en archivo
        $txt = "ENV|$idOrden|WWWapps|WWW|ORDER||\n".
        "HDR|$idOrden|$idCliente|PDA-$consecutivo-$idCliente|$ordenCompra|$fechaA|||MOD|$moneda|$pais||0\n".
        "HAD|$idOrden|DEL|||$nombreCliente||$direccionA||$ciudad||$COP|$paisA|$pais||\n".
        "INV|$idOrden|DEL|||$nombreCliente||$direccionA||$ciudad||$COP|$paisA|$pais||\n".
        "HTX|$idOrden|(Fecha de Entrega: $fechaSlash)| $notas\n".
        "LIN|$idOrden|1|$idArticulo|ZZ|$cantidad|$udVta|$fechaEntrega|0|$precio||$idArticuloS";
        fwrite($myfile, $txt);
        fclose($myfile);
        
        

        subirArch($filename,"PV-".$folioName.$idCliente.$idRep.$idCompania.".txt");
    }
    function subirArch($file,$remote_file){
        //$file =./ordenes/PV-0000folioidClienteidRepidCompania.txt';
        //$remote_file ='PV-0000folioidClienteidRepidCompania.txt';
        $ftp_server="ftpitesm.cmoderna.com";
        $ftp_user_name="usu_itesm";
        $ftp_user_pass="usuitesm";
        // set up basic connection
        $conn_id = ftp_connect($ftp_server);

        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
        echo $login_result;

        // upload a file
        if (ftp_put($conn_id, $remote_file, $file)) {
        echo "<div class= 'alert alert-warning'>" .
        "<strong>Warning!  </strong>". "successfully uploaded $file\n"   .
            "</div";
        } else {
        echo "There was a problem while uploading $file\n";
        }

        // close the connection
        ftp_close($conn_id);
    }
    createFile();
    if (isset($_SESSION['ordenT'])){
        echo "<div class='alert alert-warning'> orden Total :  ".$_SESSION['ordenT']."</div>";
    }

    
    
?>