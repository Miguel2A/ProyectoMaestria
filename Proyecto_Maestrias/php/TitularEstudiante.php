<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigo          = $_POST["codigo"];
	$cedula          = $_POST["cedula"];
	$codigosnies     = $_POST["codigosnies"];
	$fotografia      = $_POST["fotografia"];
	$semestre        = $_POST["semestre"];
	$fechaingreso    = $_POST["fechaingreso"];
	$fechaegreso     = $_POST["fechaegreso"];
	$nombre          = $_POST["nombre"];
	$apellidos       = $_POST["apellidos"];
	$correo          = $_POST["correo"];
	$telefono        = $_POST["telefono"];
	$codigocohorte   = $_POST["codigocohorte"];
	$direccion       = $_POST["direccion"];
	$ciudad          = $_POST["ciudad"];
	$genero          = $_POST["genero"];
	$fechanacimiento = $_POST["fechanacimiento"];
	$estadocivil     = $_POST["estadocivil"];

	$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);

	$consulta_titu  = "SELECT CodCohorte FROM estudiante WHERE CodEstudiante = '$codigo' ";
	$consulta_titu  = mysqli_query($conexion, $consulta_titu);
	$consulta_titu  = mysqli_fetch_array($consulta_titu);

	if($consulta_titu['CodCohorte'] == 0){

		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$cedula' ";
		$sql1 = "UPDATE estudiante SET Fotografia='$fotografia', Semestre='$semestre', FechaIngreso='$fechaingreso', FechaEgreso = '$fechaegreso', CodCohorte = '$codigocohorte' WHERE CodEstudiante = '$codigo' ";

		$consultanum  = "SELECT NumEstudiantes FROM cohorte WHERE CodCohorte = '$codigocohorte' ORDER BY NumEstudiantes  DESC LIMIT 1";
		$consultanum  = mysqli_query($conexion, $consultanum);
		$consultanum  = mysqli_fetch_array($consultanum);
		$numeroestudiantes = $consultanum['NumEstudiantes'];

		++$numeroestudiantes;

		$sql22 = "UPDATE cohorte SET NumEstudiantes='$numeroestudiantes' WHERE CodCohorte =  '$codigocohorte' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) && mysqli_query($conexion, $sql22) ) {
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
	}else{
		if($consulta){
			echo '<script language="javascript">alert("El estudiante ya es egrsado titulado.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert("El estudiante ya es egrsado titulado.");window.location.href="../perfilcoordinador.php"</script>';
		}else if($consulta2){
			echo '<script language="javascript">alert("El estudiante ya es egrsado titulado.");window.location.href="../perfilasistente.php"</script>';
		}
	}
	mysqli_close($conexion);
?>