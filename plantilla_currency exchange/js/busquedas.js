function servidor(){
	return("http://localhost/corrugados/plantilla_currency%20exchange/php/");
}

function serv_no_php(){
	return("http://localhost/corrugados/plantilla_currency%20exchange/");
}

function cancelar_orden(){
    alert("orden cancelada");
}

function borrar_orden(){
    alert("orden borrada");
}

function busqueda_articulo(){
    var cliente = document.getElementById("cliente").value;
    var serv=servidor()+"buscar_ordenes.php?op=articulo&cliente="+cliente;
    location.href=serv;
}

function busqueda_orden(){
    alert("BUSQUEDA");
    fol = document.getElementById("fol").value;
    baan = document.getElementById("baan").value;
    client = document.getElementById("client").value;
    var serv=servidor()+"buscar_ordenes.php?op=busqueda&fol="+fol+"&baan="+baan+"&client="+client;
	location.href=serv;	

}

function tiempo_filtro(){
    f_desde = document.getElementById("f_desde").value;
    f_hasta = document.getElementById("f_hasta").value;
    var serv=servidor()+"buscar_ordenes.php?op=prom_tiempo&f_desde="+f_desde+"&f_hasta="+f_hasta;
	location.href=serv;	

}

function orden_filtro(){
    f_desde = document.getElementById("f_desde").value;
    f_hasta = document.getElementById("f_hasta").value;
    b_desde = document.getElementById("b_desde").value;
    b_hasta = document.getElementById("b_hasta").value;
    c_desde = document.getElementById("c_desde").value;
    c_hasta = document.getElementById("c_hasta").value;
    a_desde = document.getElementById("a_desde").value;
    a_hasta = document.getElementById("a_hasta").value;
    var serv=serv_no_php()+"reportes_ordenes.php?op=orden_filt&f_desde="+f_desde+"&f_hasta="+f_hasta+"&b_desde="+b_desde+"&b_hasta="+b_hasta+"&c_desde="+c_desde+"&c_hasta="+c_hasta+"&a_desde="+a_desde+"&a_hasta="+a_hasta;
	location.href=serv;	
}

function cancelarOrden(){
    fol=document.getElementById("fol").value;
    var serv=servidor()+"buscar_ordenes.php?op=go&fol="+fol;
    location.href=serv;
}

function regresar(){
    var serv=servidor()+"reportesenProc.php";
    location.href=serv;
}

function pedidoVSurtido(){
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=PVS";
    location.href=serv;
}

function unidadVentas(){
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=UDV";
    location.href=serv;
}

function ventasPorCli(){
    cliente=document.getElementById("cliente").value;
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=VPC&cliente="+cliente;
    location.href=serv;
}

function ventasPorAr(){
    articulo=document.getElementById("articulo").value;
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=VPA&articulo="+articulo;
    location.href=serv;
}
function ventasPorMes(){
    fecha=document.getElementById("fecha").value;
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=VPM&fecha="+fecha;
    location.href=serv;
}
function compaVentaFecha(){
    fecha=document.getElementById("fecha").value;
    var serv="http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php?op=CVF&fecha="+fecha;
    location.href=serv;
}

function servidorsinphp(){
    return('http://localhost/corrugados/plantilla_currency%20exchange/%22');
}