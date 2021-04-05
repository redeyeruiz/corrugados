function alta_asig_rol() {
	id_user = document.f_asig_rol.id_user.value;
	rol = document.f_asig_rol.rol.value

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"asig_rol.php?op=altas&id_user="+id_user+"&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}
function baja_asig_rol() {
	id_user = document.f_asig_rol.id_user.value;

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"asig_rol.php?op=bajas&id_user="+id_user;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function consulta_asig_rol() {
	id_user = document.f_asig_rol.id_user.value;

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"asig_rol.php?op=consulta&id_user="+id_user;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function actualiza_asig_rol() {
	id_user = document.f_asig_rol.id_user.value;
	rol = document.f_asig_rol.rol.value;

	if(confirm("Desea guardar los cambios?")){
		var serv = servidor()+"asig_rol.php?op=actualiza&id_user="+id_user+"&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function reporte_asig_rol() {
	var serv = servidor()+"asig_rol.php?op=reporte";
	location.href = serv;
}