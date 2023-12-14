<?php
	include("Conexion.php");
	include("validarSesion.php");

	$cedula           = $_POST["cedula"];
	$codigosnies      = $_POST["codigosnies"];
	$fechavinculacion = $_POST["fechavinculacion"];
	$nombre           = $_POST["nombre"];
	$apellidos        = $_POST["apellidos"];
	$correo           = $_POST["correo"];
	$direccion        = $_POST["direccion"];
	$ciudad           = $_POST["ciudad"];
	$genero           = $_POST["genero"];
	$fechanacimiento  = $_POST["fechanacimiento"];
	$estadocivil      = $_POST["estadocivil"];
	$formacion        = $_POST["formacion"];
	$telefono         = $_POST["telefono"];
	$password         = $_POST["contraseña"];
	$repitepassword   = $_POST["repitecontraseña"];
					
	$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	if($password == $repitepassword){
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		$consultaCedula = "SELECT Cedula FROM asistente WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		$consultaId = "SELECT Cedula FROM persona WHERE Cedula = '$cedula' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		if(!$consultaCedula){
			if(!$consultaId){

				$consultaId2 = "SELECT * FROM asistente WHERE CodSNIES = $codigosnies ";
				$consultaId2 = mysqli_query($conexion, $consultaId2);
				$consultaId2 = mysqli_fetch_array($consultaId2);

				if(!$consultaId2){

					$consulta22 = "SELECT Id FROM asistente ORDER BY Id DESC LIMIT 1";
					$consulta22 = mysqli_query($conexion, $consulta22);
					$consulta22 = mysqli_fetch_array($consulta22);

					$id = $consulta22['Id'];

					++$id;

					$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
					$sql1 = "INSERT INTO asistente VALUES ('$id','$cedula', '$codigosnies', '$fechavinculacion', '$passwordHash')";

					if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
						if($consulta){
				        	echo '<script language="javascript">alert("La cuenta del asistente ha sido creada exitosamente.");window.location.href="../perfilpresidente.php"</script>';
				        }else if($consulta1){
				        	echo '<script language="javascript">alert("La cuenta del asistente ha sido creada exitosamente.");window.location.href="../perfilcoordinador.php"</script>';
				        }
					}else{
						echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
					}
				}else{
			        if($consulta){
			        	echo '<script language="javascript">alert("Ya existe asignado un asistente en esta maestria.");window.location.href="../perfilpresidente.php"</script>';
			        }else if($consulta1){
			        	echo '<script language="javascript">alert("Ya existe asignado un asistente en esta maestria.");window.location.href="../perfilcoordinador.php"</script>';
			        }
				}
			}else{
				if($consulta){
					echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilpresidente.php"</script>';
			    }else if($consulta1){
			        echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilcoordinador.php"</script>';
			    }
			}
		}else{
			if($consulta){
			    echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilpresidente.php"</script>';
			}else if($consulta1){
				echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilcoordinador.php"</script>';
			}
		}
	}else{
		if($consulta){
			echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfilcoordinador.php"</script>';
		}
	}
	mysqli_close($conexion);
?>