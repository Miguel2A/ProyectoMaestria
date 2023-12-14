<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigodocente   = $_POST["codigodocente"];
	$cedula          = $_POST["cedula"];
	$formacion       = $_POST["formacion"];
	$areas           = $_POST["areas"];
	$nombre          = $_POST["nombre"];
	$apellidos       = $_POST["apellidos"];
	$direccion       = $_POST["direccion"];
	$ciudad          = $_POST["ciudad"];
	$genero          = $_POST["genero"];
	$correo          = $_POST["correo"];
	$telefono        = $_POST["telefono"];	
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

	$consultaId = "SELECT CodEstudiante FROM estudiante WHERE CodEstudiante = '$codigodocente' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	$consultaId1 = "SELECT CodDocente FROM docente WHERE CodDocente = '$codigodocente' ";
	$consultaId1 = mysqli_query($conexion, $consultaId1);
	$consultaId1 = mysqli_fetch_array($consultaId1);

	$consultaCedula = "SELECT Cedula FROM docente WHERE Cedula = '$cedula' ";
	$consultaCedula = mysqli_query($conexion, $consultaCedula);
	$consultaCedula = mysqli_fetch_array($consultaCedula);

	if(!$consultaCedula){
		if(!$consultaId && !$consultaId1){

			$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
			$sql1 = "INSERT INTO docente VALUES ('$codigodocente', '$cedula', '$formacion', '$areas')";

			if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
				if($consulta){
					echo '<script language="javascript">alert("Docente registrado.");window.location.href="../perfilpresidente.php"</script>';
				}else if($consulta1){
					echo '<script language="javascript">alert("Docente registrado.");window.location.href="../perfilcoordinador.php"</script>';
				}else if($consulta2){
					echo '<script language="javascript">alert("Docente registrado.");window.location.href="../perfilasistente.php"</script>';
				}
			}else{
				echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
			}
		}else{
			if($consulta){
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfilpresidente.php"</script>';
			}else if($consulta1){
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfilcoordinador.php"</script>';
			}else if($consulta2){
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfilasistente.php"</script>';
			}
		}
	}else{
		if($consulta){
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilcoordinador.php"</script>';
		}else if($consulta2){
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfilasistente.php"</script>';
		}
	}
	mysqli_close($conexion);
?>