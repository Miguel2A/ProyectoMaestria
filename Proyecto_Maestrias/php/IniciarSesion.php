<?php
	include("conexion.php");
	
	session_start();
	$_SESSION['login'] = false;

	$cedula   = $_POST["cedula"];
	$password = $_POST["contraseña"];
	
	$consulta = "SELECT * FROM presidente WHERE Cedula = '$cedula' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);
	
	$consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM presidente WHERE Cedula='$cedula')";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT * FROM coordinador WHERE Cedula = '$cedula' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);
	
	$consulta3 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM coordinador WHERE Cedula = '$cedula') ";
	$consulta3 = mysqli_query($conexion, $consulta3);
	$consulta3 = mysqli_fetch_array($consulta3);

	$consulta4 = "SELECT * FROM asistente WHERE Cedula = '$cedula' ";
	$consulta4 = mysqli_query($conexion, $consulta4);
	$consulta4 = mysqli_fetch_array($consulta4);
	
	$consulta5 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM asistente WHERE Cedula = '$cedula') ";
	$consulta5 = mysqli_query($conexion, $consulta5);
	$consulta5 = mysqli_fetch_array($consulta5);

	if($consulta && $consulta1){
		if(password_verify($password, $consulta['Password'])){

			$_SESSION['login']               = true; 
			$_SESSION['cedula']              = $consulta1['Cedula'];
			$_SESSION['nombre']              = $consulta1['Nombres'];
			$_SESSION['apellidos']           = $consulta1['Apellidos'];
			$_SESSION['correo']              = $consulta1['Correo'];
			$_SESSION['telefono']            = $consulta1['Telefono'];
			$_SESSION['direccion']           = $consulta1['Direccion'];
			$_SESSION['ciudad']              = $consulta1['Ciudad'];
			$_SESSION['genero']              = $consulta1['Genero'];
			$_SESSION['fechanacimiento']     = $consulta1['FechaNacimiento'];
			$_SESSION['estadocivil']         = $consulta1['EstadoCivil'];
			$_SESSION['formacion']           = $consulta['Formacion'];
			
			header('Location: ../perfilpresidente.php');

		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else if($consulta2 && $consulta3){
		if(password_verify($password, $consulta2['Password'])){
			$_SESSION['login']               = true; 
			$_SESSION['cedula']              = $consulta3['Cedula'];
			$_SESSION['nombre']              = $consulta3['Nombres'];
			$_SESSION['apellidos']           = $consulta3['Apellidos'];
			$_SESSION['correo']              = $consulta3['Correo'];
			$_SESSION['telefono']            = $consulta3['Telefono'];
			$_SESSION['direccion']           = $consulta3['Direccion'];
			$_SESSION['ciudad']              = $consulta3['Ciudad'];
			$_SESSION['genero']              = $consulta3['Genero'];
			$_SESSION['fechanacimiento']     = $consulta3['FechaNacimiento'];
			$_SESSION['estadocivil']         = $consulta3['EstadoCivil'];
			$_SESSION['codigosnies']         = $consulta2['CodSNIES'];
			$_SESSION['fechavinculacion']    = $consulta2['FechaVinculacion'];
			$_SESSION['acunombramiento']     = $consulta2['AcuNombramiento'];
			
			header('Location: ../perfilcoordinador.php');//perfilestudiante
		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else if($consulta4 && $consulta5){
		if(password_verify($password, $consulta4['Password'])){
			$_SESSION['login']               = true; 
			$_SESSION['cedula']              = $consulta5['Cedula'];
			$_SESSION['nombre']              = $consulta5['Nombres'];
			$_SESSION['apellidos']           = $consulta5['Apellidos'];
			$_SESSION['correo']              = $consulta5['Correo'];
			$_SESSION['telefono']            = $consulta5['Telefono'];
			$_SESSION['direccion']           = $consulta5['Direccion'];
			$_SESSION['ciudad']              = $consulta5['Ciudad'];
			$_SESSION['genero']              = $consulta5['Genero'];
			$_SESSION['fechanacimiento']     = $consulta5['FechaNacimiento'];
			$_SESSION['estadocivil']         = $consulta5['EstadoCivil'];
			$_SESSION['codigosnies']         = $consulta4['CodSNIES'];
			$_SESSION['fechavinculacion']    = $consulta4['FechaVinculacion'];
			
			header('Location: ../perfilasistente.php');//perfildocente
		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else{		
		echo '<script language="javascript">alert("Usuario NO existe.");window.location.href="../index.html"</script>';	
	}
	mysqli_close($conexion);
?>