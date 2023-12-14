<?php
	include("conexion.php");

	$codigosnies              = $_POST["codigosnies"];
	$nombre              = $_POST["nombre"];
	$descripcion           = $_POST["descripcion"];
	$logo            = $_POST["logo"];
	$correo              = $_POST["correo"];
	$lineatrabajo            = $_POST["lineatrabajo"];
	$fecharesolucion           = $_POST["fecharesolucion"];
	$numeroresolucion              = $_POST["numeroresolucion"];
	$archivoresolucion    = $_POST["archivoresolucion"];
	//$numeroestudiantes    = $_POST["numeroestudiantes"];

	//if($password == $repitepassword){
		//$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		/*$consultaId = "SELECT CodigoEstudiante FROM estudiante WHERE CodigoEstudiante = '$codigoestudiante' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$codigoestudiante' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);

		$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigoestudiante' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);*/

		$consultaSNIES = "SELECT CodSNIES FROM programa WHERE CodSNIES = '$codigosnies' ";
		$consultaSNIES = mysqli_query($conexion, $consultaSNIES);
		$consultaSNIES = mysqli_fetch_array($consultaSNIES);

		/*$consultaCedula = "SELECT Cedula FROM estudiante WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);*/

		//if(!$consultaCedula){
			//if(!$consultaId && !$consultaId1 && !$consultaId2){
			if(!$consultaSNIES){
				//$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad')";
				$numeroestudiantes = 0;
				$sql = "INSERT INTO programa VALUES ('$codigosnies', '$nombre', '$descripcion', '$logo', '$correo', '$lineatrabajo', '$fecharesolucion', '$numeroresolucion', '$archivoresolucion', '$numeroestudiantes')";
				//$sql1 = "INSERT INTO estudiante VALUES ('$codigoestudiante', '$cedula', '$programa', '$passwordHash')";
				if(mysqli_query($conexion, $sql) ) {
					echo '<script language="javascript">alert("El programa ha sido registrado exitosamente.");window.location.href="../perfilpresidente.php"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
				}
			}else{
				echo '<script language="javascript">alert("El Codigo SNIES ya existe.");window.location.href="../perfilpresidente.php"</script>';
			}
		/*}else{
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfiladministrador.php"</script>';
		}*/
	/*}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}*/
	mysqli_close($conexion);
?>