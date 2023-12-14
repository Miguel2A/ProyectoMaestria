<?php
	include("Conexion.php");

	$codigocohorte    = $_POST["codigocohorte"];
	$codigosnies              = $_POST["codigosnies"];
	$nombre    = $_POST["nombre"];
	$fechainicio    = $_POST["fechainicio"];
	$fechafinalizacion              = $_POST["fechafinalizacion"];
	$numeroestudiantes           = $_POST["numeroestudiantes"];

	//if($password == $repitepassword){
		//$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		/*$consultaId = "SELECT CodEstudiante FROM estudiante WHERE CodEstudiante = '$codigodocente' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodDocente FROM docente WHERE CodDocente = '$codigodocente' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);*/

		/*$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigoestudiante' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);*/

		$consultaCohorte = "SELECT CodCohorte FROM cohorte WHERE CodCohorte = '$codigocohorte' ";
		$consultaCohorte = mysqli_query($conexion, $consultaCohorte);
		$consultaCohorte = mysqli_fetch_array($consultaCohorte);

		if(!$consultaCohorte){
			//if(!$consultaId && !$consultaId1){
				$sql = "INSERT INTO cohorte VALUES ('$codigocohorte', '$codigosnies', '$nombre', '$fechainicio', '$fechafinalizacion', '$numeroestudiantes')";
				//$sql1 = "INSERT INTO docente VALUES ('$codigodocente', '$cedula', '$formacion', '$areas')";
				if(mysqli_query($conexion, $sql) ) {
					echo '<script language="javascript">alert("El registro de la cohorte fue un exito.");window.location.href="../perfilmaestria.php"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
				}
			/*}else{
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfilmaestria.php"</script>';
			}*/
		}else{
			echo '<script language="javascript">alert("El codigo de Cohorte ya existe");window.location.href="../perfilmaestria.php"</script>';
		}
	/*}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}*/
	mysqli_close($conexion);
?>