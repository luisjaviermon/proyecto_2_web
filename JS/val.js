function v_nombre(){
	valor = document.getElementById("usuario").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		return false;
	} else { return true;}
}

function v_pass(){
	valor = document.getElementById("pass").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		return false;
	} else { 
		valor2 = document.getElementById("c_pass").value;
		if(valor == valor2) { return true; }
		else {return false;}
	}
}

function v_mail(){
	valor = document.getElementById("email").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		return false;
	} else { return true;}
}



function validar(){
	if(v_pass() && v_nombre() && v_mail()){
		document.reg.submit();
	}else{
		alert('falto rellenar algun campo o las contraseñas no coinsiden, favor de reintentar');
	}
}