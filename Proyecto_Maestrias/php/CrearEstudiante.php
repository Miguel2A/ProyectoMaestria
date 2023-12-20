<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigoestudiante = $_POST["codigoestudiante"];
	$cedula           = $_POST["cedula"];
	$codigosnies      = $_POST["codigosnies"];
	$fotografia       = $_POST["fotografia"];
	$semestre         = $_POST["semestre"];
	$fechaingreso     = $_POST["fechaingreso"];
	$nombre           = $_POST["nombre"];
	$apellidos        = $_POST["apellidos"];
	$correo           = $_POST["correo"];
	$telefono         = $_POST["telefono"];  
	$direccion        = $_POST["direccion"];
	$ciudad           = $_POST["ciudad"];
	$genero           = $_POST["genero"];
	$fechanacimiento  = $_POST["fechanacimiento"];
	$estadocivil      = $_POST["estadocivil"];

	$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);

	$consultaId = "SELECT CodEstudiante FROM estudiante WHERE CodEstudiante = '$codigoestudiante' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	$consultaId1 = "SELECT CodDocente FROM docente WHERE CodDocente = '$codigoestudiante' ";
	$consultaId1 = mysqli_query($conexion, $consultaId1);
	$consultaId1 = mysqli_fetch_array($consultaId1);

	$consultaCedula = "SELECT Cedula FROM estudiante WHERE Cedula = '$cedula' ";
	$consultaCedula = mysqli_query($conexion, $consultaCedula);
	$consultaCedula = mysqli_fetch_array($consultaCedula);

	$consultaCedula1 = "SELECT Cedula FROM persona WHERE Cedula = '$cedula' ";
	$consultaCedula1 = mysqli_query($conexion, $consultaCedula1);
	$consultaCedula1 = mysqli_fetch_array($consultaCedula1);

	if(!$consultaCedula && !$consultaCedula1){
		if(!$consultaId && !$consultaId1){
			$fechaegreso = "00/00/00";
			$codigocohorte = 0;

			$consultanum  = "SELECT NumEstudiantes FROM programa WHERE CodSNIES = '$codigosnies' ORDER BY NumEstudiantes  DESC LIMIT 1";
			$consultanum  = mysqli_query($conexion, $consultanum);
			$consultanum  = mysqli_fetch_array($consultanum);
			$numeroestudiantes = $consultanum['NumEstudiantes'];

			++$numeroestudiantes;

			$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
			$sql1 = "INSERT INTO estudiante VALUES ('$codigoestudiante', '$cedula', '$codigosnies', '$codigocohorte', '$fotografia', '$semestre', '$fechaingreso', '$fechaegreso')";
			$sql2 = "UPDATE programa SET NumEstudiantes='$numeroestudiantes' WHERE CodSNIES =  '$codigosnies' ";

			if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) && mysqli_query($conexion, $sql2) ) {
				if($consulta){
					echo '<script language="javascript">alert("Estudiante registrado.");window.location.href="../perfilpresidente.php"</script>';
				}else if($consulta1){
					echo '<script language="javascript">alert("Estudiante registrado.");window.location.href="../perfilcoordinador.php"</script>';
				}else if($consulta2){
					echo '<script language="javascript">alert("Estudiante registrado.");window.location.href="../perfilasistente.php"</script>';
				}
			}else{
				echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
			}
		}else{
			if($consulta){
				echo '<script language="javascript">alert("El codigo ya existe.");window.location.href="../perfilpresidente.php"</script>';
			}else if($consulta1){
				echo '<script language="javascript">alert(El codigo ya existe.");window.location.href="../perfilcoordinador.php"</script>';
			}else if($consulta2){
				echo '<script language="javascript">alert("El codigo ya existe.");window.location.href="../perfilasistente.php"</script>';
			}
		}
	}else{
		if($consulta){
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert(Ya existe un registro con ese numero de cedula.");window.location.href="../perfilcoordinador.php"</script>';
		}else if($consulta2){
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilasistente.php"</script>';
		}
	}
	mysqli_close($conexion);
?>