function alta_rol() {
	id_comp = document.f_rol.id_comp.value;
	rol = document.f_rol.rol.value;
	
	if(confirm("Desea guardar los datos?")){
		var serv = servidor()+"rol.php?op=altas&rol="+rol+"&id_comp="+id_comp;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function baja_rol(){
	rol = document.f_rol.rol.value;

	if(confirm("Desea guardar los datos?")){
		var serv = servidor()+"rol.php?op=bajas&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function consulta_rol() {
	rol = document.f_rol.rol.value;
	id_comp = document.f_rol.id_comp.value;

	if(confirm("Desea guardar los datos?")){
		var serv = servidor()+"rol.php?op=consultas&rol="+rol+"&id_comp="+id_comp;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function actualiza_rol() {
	id_comp = document.f_rol.id_comp.value;
	rol = document.f_rol.rol.value;

	if(confirm("Desea guardar los cambios?")){
		var serv = servidor()+"rol.php?op=actualiza&id_comp="+id_comp+"&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function reporte_rol() {
	id_comp = document.f_rol.id_comp.value;
	rol = document.f_rol.rol.value;

	var serv = servidor()+"rol.php?op=reporte";
	location.href = serv;
}