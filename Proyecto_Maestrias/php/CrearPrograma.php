<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigosnies       = $_POST["codigosnies"];
	$nombre            = $_POST["nombre"];
	$descripcion       = $_POST["descripcion"];
	$logo              = $_POST["logo"];
	$correo            = $_POST["correo"];
	$lineatrabajo      = $_POST["lineatrabajo"];
	$fecharesolucion   = $_POST["fecharesolucion"];
	$numeroresolucion  = $_POST["numeroresolucion"];
	$archivoresolucion = $_POST["archivoresolucion"];

	$consultaSNIES = "SELECT CodSNIES FROM programa WHERE CodSNIES = '$codigosnies' ";
	$consultaSNIES = mysqli_query($conexion, $consultaSNIES);
	$consultaSNIES = mysqli_fetch_array($consultaSNIES);

	if(!$consultaSNIES){

		$numeroestudiantes = 0;
		$sql = "INSERT INTO programa VALUES ('$codigosnies', '$nombre', '$descripcion', '$logo', '$correo', '$lineatrabajo', '$fecharesolucion', '$numeroresolucion', '$archivoresolucion', '$numeroestudiantes')";

		if(mysqli_query($conexion, $sql) ) {
			echo '<script language="javascript">alert("El programa ha sido registrado exitosamente.");window.location.href="../perfilpresidente.php"</script>';
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		echo '<script language="javascript">alert("El Codigo SNIES ya existe.");window.location.href="../perfilpresidente.php"</script>';
	}
	mysqli_close($conexion);
?>