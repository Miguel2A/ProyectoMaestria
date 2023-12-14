<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$codigosnies         = $_POST["codigosnies"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero              = $_POST["genero"];
	$fechanacimiento     = $_POST["fechanacimiento"];
	$estadocivil         = $_POST["estadocivil"];
	$fechavinculacion    = $_POST["fechavinculacion"];
	$acuerdonombramiento = $_POST["acuerdonombramiento"];
	$password            = $_POST["contraseña"];
	$repitepassword      = $_POST["repitecontraseña"];

	if($password == $repitepassword){
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		$consultaCedula = "SELECT Cedula FROM coordinador WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		$consultaId = "SELECT Cedula FROM persona WHERE Cedula = '$cedula' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		if(!$consultaCedula){
			if(!$consultaId){

				$consultaId2 = "SELECT * FROM coordinador WHERE CodSNIES = $codigosnies ";
				$consultaId2 = mysqli_query($conexion, $consultaId2);
				$consultaId2 = mysqli_fetch_array($consultaId2);

				if(!$consultaId2){

					$consulta22 = "SELECT Id FROM coordinador ORDER BY Id DESC LIMIT 1";
					$consulta22 = mysqli_query($conexion, $consulta22);
					$consulta22 = mysqli_fetch_array($consulta22);
					$id = $consulta22['Id'];

					++$id;

					$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
					$sql1 = "INSERT INTO coordinador VALUES ('$id','$cedula', '$codigosnies', '$fechavinculacion', '$acuerdonombramiento', '$passwordHash')";

					if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1)) {
						echo '<script language="javascript">alert("La cuenta del coordinador ha sido creada exitosamente.");window.location.href="../perfilpresidente.php"</script>';
					}else{
						echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
					}
				}else{
					echo '<script language="javascript">alert("Ya existe asignado un coordinador en esta maestria.");window.location.href="../perfilpresidente.php"</script>';
				}
			}else{
				echo '<script language="javascript">alert("La cedula ya se encuentra registrada anteriormente.");window.location.href="../perfilpresidente.php"</script>';
			}
		}else{
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilpresidente.php"</script>';
		}
	}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfilpresidente.php"</script>';
	}
	mysqli_close($conexion);
?>