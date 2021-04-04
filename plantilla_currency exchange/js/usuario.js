function alta_usuario() {
	id_user = document.f_usuario.id_user.value;
	id_comp = document.f_usuario.id_comp.value;
	nom = document.f_usuario.nom.value;
	contrasena = document.f_usuario.contrasena.value;
	rol = document.f_usuario.rol.value;

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"usuario.php?op=altas&id_user="+id_user+"&id_comp="+id_comp+"&nom="+nom+"&contrasena="+contrasena+"&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function baja_usuario() {
	id_user = document.f_usuario.id_user.value;

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"usuario.php?op=bajas&id_user="+id_user;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function consulta_usuario() {
	id_user = document.f_usuario.id_user.value;

	if(confirm("Desea enviar los datos?")){
		var serv = servidor()+"usuario.php?op=consulta&id_user="+id_user;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function actualiza_usuario() {
	id_user = document.f_usuario.id_user.value;
	id_comp = document.f_usuario.id_comp.value;
	nom = document.f_usuario.nom.value;
	contrasena = document.f_usuario.contrasena.value;
	rol = document.f_usuario.rol.value;

	if(confirm("Desea guardar los cambios?")){
		var serv = servidor()+"usuario.php?op=actualiza&id_user="+id_user+"&id_comp="+id_comp+"&nom="+nom+"&contrasena="+contrasena+"&rol="+rol;
		location.href = serv;
	}
	else{
		alert("Ha sido cancelado");
	}
}

function reporte_usuario() {
	var serv = servidor()+"usuario.php?op=reporte";
	location.href = serv;
}