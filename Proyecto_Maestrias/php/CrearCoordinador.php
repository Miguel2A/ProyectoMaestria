<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$codigosnies              = $_POST["codigosnies"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero     = $_POST["genero"];
	$fechanacimiento       = $_POST["fechanacimiento"];
	$estadocivil       = $_POST["estadocivil"];
	$fechavinculacion       = $_POST["fechavinculacion"];
	$acuerdonombramiento       = $_POST["acuerdonombramiento"];
	$password            = $_POST["contraseña"];
	$repitepassword      = $_POST["repitecontraseña"];

	if($password == $repitepassword){
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		/*$consultaId = "SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$codigodocente' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodigoEstudiante FROM estudiante WHERE CodigoEstudiante = '$codigodocente' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);

		$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigodocente' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);*/

		$consultaCedula = "SELECT Cedula FROM coordinador WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		$consultaId = "SELECT Cedula FROM persona WHERE Cedula = '$cedula' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		if(!$consultaCedula){
			//if(!$consultaId && !$consultaId1 && !$consultaId2){
			if(!$consultaId){
				/*$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad')";
				$sql1 = "INSERT INTO docente VALUES ('$codigodocente', '$cedula', '$especializacion', '$passwordHash')";*/
				$consulta22 = "SELECT Id FROM coordinador ORDER BY Id DESC LIMIT 1";
				$consulta22 = mysqli_query($conexion, $consulta22);
				$consulta22  = mysqli_fetch_array($consulta22);
				$id = $consulta22['Id'];

				++$id;

				$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
				$sql1 = "INSERT INTO coordinador VALUES ('$id','$cedula', '$codigosnies', '$fechavinculacion', '$acuerdonombramiento', '$passwordHash')";

				if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1)) {
					/*$consulta2 = "SELECT idNumero FROM numeroasesorias ORDER BY idNumero DESC LIMIT 1";
					$consulta2  = mysqli_query($conexion, $consulta2);
					$consulta2  = mysqli_fetch_array($consulta2);
					$idNumero = $consulta2['idNumero'];
					
					++$idNumero;

					$cantidad=0;

					$sql2 = "INSERT INTO numeroasesorias VALUES ('$idNumero', '$codigodocente', '$cantidad')";

					if( mysqli_query($conexion, $sql2) ){

					}else{
						echo "Error" . $sql2 . "<br>" . mysqli_error($conexion);
					}*/
					/*
					$consulta3 = "SELECT idNumeroJ FROM numerojurados ORDER BY idNumeroJ DESC LIMIT 1";
					$consulta3  = mysqli_query($conexion, $consulta3);
					$consulta3  = mysqli_fetch_array($consulta3);
					$idNumeroJ = $consulta3['idNumeroJ'];

					++$idNumeroJ;

					$cantidadJ=0;

					$sql3 = "INSERT INTO numerojurados VALUES ('$idNumeroJ', '$codigodocente', '$cantidadJ')";

					if( mysqli_query($conexion, $sql3) ){
					}else{
						echo "Error" . $sql3 . "<br>" . mysqli_error($conexion);
					}*/

					echo '<script language="javascript">alert("La cuenta del coordinador ha sido creada exitosamente.");window.location.href="../perfilpresidente.php"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
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