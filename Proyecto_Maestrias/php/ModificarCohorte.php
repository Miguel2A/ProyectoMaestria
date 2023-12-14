<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigocohorte     = $_POST["codigocohorte"];
	$codigosnies       = $_POST["codigosnies"];
	$nombre            = $_POST["nombre"];
	$fechainicio       = $_POST["fechainicio"];
	$fechafinalizacion = $_POST["fechafinalizacion"];
	$numeroestudiantes = $_POST["numeroestudiantes"];

	$sql = "UPDATE cohorte SET Nombre='$nombre', FechaInicio='$fechainicio', FechaFinalizacion='$fechafinalizacion', NumEstudiantes='$numeroestudiantes' WHERE CodCohorte = $codigocohorte ";

	if(mysqli_query($conexion, $sql) ) {

		$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
		$consulta = mysqli_query($conexion, $consulta);
		$consulta = mysqli_fetch_array($consulta);

		$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
		$consulta1 = mysqli_query($conexion, $consulta1);
		$consulta1 = mysqli_fetch_array($consulta1);

		$consulta2 = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
		$consulta2 = mysqli_query($conexion, $consulta2);
		$consulta2 = mysqli_fetch_array($consulta2);

		if($consulta){
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilcoordinador.php"</script>';
		}else if($consulta2){
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfilasistente.php"</script>';
		}
	}else{
		echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
	}
	mysqli_close($conexion);
?>
