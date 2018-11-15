<?php 
	$conectar = new mysqli("localhost","id7843499_root","11a14755db","id7843499_pruebas");
	if(mysqli_connect_errno()){
		echo "error en la conexion";
	}else{
		$usuario = $_POST["user"];
		$pass = $_POST["password"];
		$comando = "SELECT NOM_COMP,PASSWORD FROM COMPRADOR WHERE NOM_COMP='$usuario'";
		$result = $conectar->query($comando);
		
		$rows = $result->num_rows;

		if($rows!=0){
			$tabla = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($tabla as $elemento) {
 				
 				if(password_verify($pass,$elemento['PASSWORD'])){
 					session_start();
					$_SESSION["usuario"] = $_POST["user"];
					header("Location: p.php");
 				}else{
 					echo'<script type="text/javascript"> alert("usuario o contraseña incorrecto"); window.location.href="../login.html"; </script>';
 				
 				}

 			}
			
		}else{
			echo'<script type="text/javascript"> alert("usuario o contraseña incorrecto"); window.location.href="../login.html"; </script>';
		}
 	}
 ?>
 