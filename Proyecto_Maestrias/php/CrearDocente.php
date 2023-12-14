<?php
	include("conexion.php");

	$codigodocente    = $_POST["codigodocente"];
	$cedula              = $_POST["cedula"];
	$formacion    = $_POST["formacion"];
	$areas    = $_POST["areas"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero            = $_POST["genero"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];	
	$fechanacimiento            = $_POST["fechanacimiento"];
	$estadocivil      = $_POST["estadocivil"];

	//if($password == $repitepassword){
		//$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		$consultaId = "SELECT CodEstudiante FROM estudiante WHERE CodEstudiante = '$codigodocente' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodDocente FROM docente WHERE CodDocente = '$codigodocente' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);

		/*$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigoestudiante' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);*/

		$consultaCedula = "SELECT Cedula FROM docente WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		if(!$consultaCedula){
			if(!$consultaId && !$consultaId1){
				$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
				$sql1 = "INSERT INTO docente VALUES ('$codigodocente', '$cedula', '$formacion', '$areas')";
				if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
					echo '<script language="javascript">alert("La cuenta del docente ha sido creada exitosamente.");window.location.href="../perfilmaestria.php"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
				}
			}else{
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfilmaestria.php"</script>';
			}
		}else{
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilmaestria.php"</script>';
		}
	/*}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}*/
	mysqli_close($conexion);
?>