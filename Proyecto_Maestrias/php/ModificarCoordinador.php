<?php
	include("Conexion.php");
	include("validarSesion.php");

	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero              = $_POST["genero"];
	$fechanacimiento              = $_POST["fechanacimiento"];
	$estadocivil              = $_POST["estadocivil"];
	//$codigosnies             = $_POST["codigosnies"];
	$fechavinculacion     = $_POST["fechavinculacion"];
	$acuerdonombramiento              = $_POST["acuerdonombramiento"];
	$passwordactual      = $_POST["contraseñaactual"];
	$password            = $_POST["contraseñanueva"];
	
	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	$consu = "SELECT Password FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consu = mysqli_query($conexion, $consu);
	$consu = mysqli_fetch_array($consu);

	if(password_verify($passwordactual, $consu['Password'])){
		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$_SESSION[cedula]' ";
		$sql1 = "UPDATE coordinador SET FechaVinculacion='$fechavinculacion', AcuNombramiento='$acuerdonombramiento', Password='$passwordHash' WHERE Cedula = '$_SESSION[cedula]' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilcoordinador.php"</script>';
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../perfilcoordinador.php"</script>';
	}
	mysqli_close($conexion);
?>