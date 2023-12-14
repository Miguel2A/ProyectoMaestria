<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigoestudiante    = $_POST["codigoestudiante"];
	$cedula              = $_POST["cedula"];
	$codigosnies    = $_POST["codigosnies"];
	$fotografia    = $_POST["fotografia"];
	$semestre    = $_POST["semestre"];
	$fechaingreso    = $_POST["fechaingreso"];
	//$fechaegreso    = $_POST["fechaegreso"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	//$codigocohorte    = $_POST["codigocohorte"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$genero            = $_POST["genero"];
	$fechanacimiento            = $_POST["fechanacimiento"];
	$estadocivil      = $_POST["estadocivil"];

	//if($password == $repitepassword){
		//$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		$consultaId = "SELECT CodEstudiante FROM estudiante WHERE CodEstudiante = '$codigoestudiante' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodDocente FROM docente WHERE CodDocente = '$codigoestudiante' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);

		/*$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigoestudiante' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);*/

		$consultaCedula = "SELECT Cedula FROM estudiante WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		if(!$consultaCedula){
			if(!$consultaId && !$consultaId1){
				$fechaegreso = "00/00/00";
				$codigocohorte = 0;
				$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad', '$genero', '$fechanacimiento', '$estadocivil')";
				$sql1 = "INSERT INTO estudiante VALUES ('$codigoestudiante', '$cedula', '$codigosnies', '$codigocohorte', '$fotografia', '$semestre', '$fechaingreso', '$fechaegreso')";
				if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {

					echo "<a href='../perfilmaestria.php ?id=".$_POST['codigosnies']."'>La cuenta del estudiante ha sido creada exitosamente.</a>";

				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
				}
			}else{
				echo "<a href='../perfilmaestria.php ?id=".$_POST['codigosnies']."'>El Codigo ya existe.</a>";
			}
		}else{
			echo "<a href='../perfilmaestria.php ?id=".$_POST['codigosnies']."'>Ya existe un registro con ese numero de cedula.</a>";
		}
	/*}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}*/
	mysqli_close($conexion);
?>