<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigocohorte     = $_POST["codigocohorte"];
	$codigosnies       = $_POST["codigosnies"];
	$nombre            = $_POST["nombre"];
	$fechainicio       = $_POST["fechainicio"];
	$fechafinalizacion = $_POST["fechafinalizacion"];

	$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);

	$consultaCohorte = "SELECT CodCohorte FROM cohorte WHERE CodCohorte = '$codigocohorte' ";
	$consultaCohorte = mysqli_query($conexion, $consultaCohorte);
	$consultaCohorte = mysqli_fetch_array($consultaCohorte);

	if(!$consultaCohorte){
		$numeroestudiantes = 0;
		$sql = "INSERT INTO cohorte VALUES ('$codigocohorte', '$codigosnies', '$nombre', '$fechainicio', '$fechafinalizacion', '$numeroestudiantes')";
		if(mysqli_query($conexion, $sql) ) {
			if($consulta){
				echo '<script language="javascript">alert("El registro de la cohorte fue un exito.");window.location.href="../perfilpresidente.php"</script>';
			}else if($consulta1){
				echo '<script language="javascript">alert("El registro de la cohorte fue un exito.");window.location.href="../perfilcoordinador.php"</script>';
			}else if($consulta2){
				echo '<script language="javascript">alert("El registro de la cohorte fue un exito.");window.location.href="../perfilasistente.php"</script>';
			}
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		if($consulta){
			echo '<script language="javascript">alert("El codigo de Cohorte ya existe.");window.location.href="../perfilpresidente.php"</script>';
		}else if($consulta1){
			echo '<script language="javascript">alert("El codigo de Cohorte ya existe.");window.location.href="../perfilcoordinador.php"</script>';
		}else if($consulta2){
			echo '<script language="javascript">alert("El codigo de Cohorte ya existe.");window.location.href="../perfilasistente.php"</script>';
		}
	}
	mysqli_close($conexion);
?>