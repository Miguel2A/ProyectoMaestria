<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigo              = $_POST["codigo"];
	$cedula              = $_POST["cedula"];
	$codigosnies              = $_POST["codigosnies"];
	$fotografia              = $_POST["fotografia"];
	$semestre              = $_POST["semestre"];
	$fechaingreso              = $_POST["fechaingreso"];
	$fechaegreso              = $_POST["fechaegreso"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	//$codigocohorte              = $_POST["codigocohorte"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero            = $_POST["genero"];
	$fechanacimiento            = $_POST["fechanacimiento"];
	$estadocivil      = $_POST["estadocivil"];

	//$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	//if($password == $repitepassword){
		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$cedula' ";
		$sql1 = "UPDATE estudiante SET Fotografia='$fotografia', Semestre='$semestre', FechaIngreso='$fechaingreso', FechaEgreso='$fechaegreso' WHERE CodEstudiante = '$codigo' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilmaestria.php"</script>';
			
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}

	/*}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}*/

	mysqli_close($conexion);
?>