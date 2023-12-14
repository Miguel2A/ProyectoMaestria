<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigosnies              = $_POST["codigosnies"];
	$nombreprograma              = $_POST["nomprograma"];
	$descripcion           = $_POST["descripcion"];
	$logo              = $_POST["logo"];
	$correo            = $_POST["correo"];
	$lineatrabajo           = $_POST["lineatrabajo"];
	$fecharesolucion              = $_POST["fecharesolucion"];
	$numeroresolucion               = $_POST["numeroresolucion"];
	$archivoresolucion               = $_POST["archivoresolucion"];
	//$numeroestudiantes               = $_POST["numeroestudiantes"];
	
	//$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	/*$consu = "SELECT Password FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consu = mysqli_query($conexion, $consu);
	$consu = mysqli_fetch_array($consu);*/

	//if(password_verify($passwordactual, $consu['Password'])){
		/*$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad', Genero='$genero', FechaNacimiento='$fechanacimiento', EstadoCivil='$estadocivil' WHERE Cedula = '$_SESSION[cedula]' ";
		$sql1 = "UPDATE asistente SET FechaVinculacion='$fechavinculacion', Password='$passwordHash' WHERE Cedula = '$_SESSION[cedula]' ";*/

		$sql = "UPDATE programa SET NomPrograma='$nombreprograma', Descripcion='$descripcion', Logo='$logo', Correo='$correo', LineaTrabajo='$lineatrabajo', FechaResolucion='$fecharesolucion', NumeroResolucion='$numeroresolucion', ArchivoResolucion='$archivoresolucion' WHERE CodSNIES = $codigosnies ";

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
	/*}else{
		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../perfilasistente.php"</script>';
	}*/
	mysqli_close($conexion);
?>
