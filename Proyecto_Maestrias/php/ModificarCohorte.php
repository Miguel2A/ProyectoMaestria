<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigocohorte              = $_POST["codigocohorte"];
	$codigosnies              = $_POST["codigosnies"];
	$nombre              = $_POST["nombre"];
	$fechainicio           = $_POST["fechainicio"];
	$fechafinalizacion              = $_POST["fechafinalizacion"];
	$numeroestudiantes               = $_POST["numeroestudiantes"];
	
	//$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	/*$consu = "SELECT Password FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consu = mysqli_query($conexion, $consu);
	$consu = mysqli_fetch_array($consu);*/

	//if(password_verify($passwordactual, $consu['Password'])){
		/*$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$_SESSION[cedula]' ";
		$sql1 = "UPDATE asistente SET FechaVinculacion='$fechavinculacion', Password='$passwordHash' WHERE Cedula = '$_SESSION[cedula]' ";*/

		$sql = "UPDATE cohorte SET Nombre='$nombre', FechaInicio='$fechainicio', FechaFinalizacion='$fechafinalizacion', NumEstudiantes='$numeroestudiantes' WHERE CodCohorte = $codigocohorte ";

		if(mysqli_query($conexion, $sql) ) {

			

	        echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilmaestria.php"</script>';
			
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	/*}else{
		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../perfilasistente.php"</script>';
	}*/
	mysqli_close($conexion);
?>
