<?php 
	if(!empty($_POST))
	{
		$usuario = $_POST["usuario"];
		$mail = $_POST["email"];
		$contra = $_POST["pass"];
		$pass_cif = password_hash($contra,PASSWORD_DEFAULT,array("cost"=>12));
		$conectar = new mysqli("localhost","id7843499_root","11a14755db","id7843499_pruebas");
		if(mysqli_connect_errno()){
			echo'<script type="text/javascript"> alert("Problemas Tecnicos"); window.location.href="/..registro.html"; </script>';
		}else{
			$comando = "SELECT * FROM COMPRADOR WHERE NOM_COMP = '$usuario'";
			$comp = $conectar->query($comando);
			if($comp->num_rows > 0){
				echo'<script type="text/javascript"> alert("El usuario ya existe, favor de intentar de nuevo"); window.location.href="registro.html"; </script>';
			}else{
				$comando = "INSERT INTO COMPRADOR (NOM_COMP,PASSWORD,MAIL) VALUES('$usuario','$pass_cif','$mail')";
				$conectar->query($comando);
				$comando = "SELECT * FROM COMPRADOR WHERE NOM_COMP = '$usuario'";
				$comp = $conectar->query($comando);
				if($comp->num_rows > 0){
					echo'<script type="text/javascript"> alert("Registro exitoso"); window.location.href="../login.html"; </script>';
				}
				else{
					echo'<script type="text/javascript"> alert("Ocurrio un error en el sistema, intentelo mas tarde"); window.location.href="../login.html"; </script>';
				}
			}
		}
	}else{
		echo "rellene";
	}
 ?>