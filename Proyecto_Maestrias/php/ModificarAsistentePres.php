<?php
	include("Conexion.php");
	include("validarSesion.php");

	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero              = $_POST["genero"];
	$fechanacimiento              = $_POST["fechanacimiento"];
	$estadocivil              = $_POST["estadocivil"];
	$codigosnies             = $_POST["codigosnies"];
	$fechavinculacion     = $_POST["fechavinculacion"];
	$password            = $_POST["contraseña"];
	$repitepassword      = $_POST["repitecontraseña"];

	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	if($password == $repitepassword){
		/*$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad' WHERE Cedula = '$cedula' ";
		$sql1 = "UPDATE docente SET Especializacion='$especializacion', Password='$passwordHash' WHERE CodigoDocente = '$codigo' ";*/
		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$cedula' ";
		$sql1 = "UPDATE asistente SET FechaVinculacion='$fechavinculacion', Password='$passwordHash' WHERE Cedula = '$cedula' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilpresidente.php"</script>';
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfilpresidente.php"</script>';
	}
	mysqli_close($conexion);
?>