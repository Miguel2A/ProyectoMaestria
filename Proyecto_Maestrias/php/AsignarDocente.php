<?php
	include("Conexion.php");
	include("validarSesion.php");

	$codigodocente = $_POST["codigodocente"];
	$codigosnies   = $_POST["codigosnies"];

	$consulta = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$consulta1 = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);

	$consulta3 = "SELECT CodDocente FROM docente WHERE CodDocente  = '$codigodocente' ";
	$consulta3 = mysqli_query($conexion, $consulta3);
	$consulta3 = mysqli_fetch_array($consulta3);

	$consultaId1 = "SELECT CodDocente, CodSNIES FROM docente_programa WHERE CodDocente = '$codigodocente' AND CodSnies = '$codigosnies' ";
	$consultaId1 = mysqli_query($conexion, $consultaId1);
	$consultaId1 = mysqli_fetch_array($consultaId1);

	if($consulta3){
		if(!$consultaId1){
			$sql = "INSERT INTO docente_programa VALUES ('$codigodocente', '$codigosnies')";			
			if(mysqli_query($conexion, $sql) ) {
			    if($consulta){
			       	echo '<script language="javascript">alert("Docente asignado.");window.location.href="../perfilpresidente.php"</script>';
			    }else if($consulta1){
			       	echo '<script language="javascript">alert("Docente asignado.");window.location.href="../perfilcoordinador.php"</script>';
			    }else if($consulta2){
			       	echo '<script language="javascript">alert("Docente asignado.");window.location.href="../perfilasistente.php"</script>';
			    }
			}else{
				echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
			}
		}else{
			if($consulta){
			    echo '<script language="javascript">alert("El docente ya pertenece a esta maestria.");window.location.href="../perfilpresidente.php"</script>';
			}else if($consulta1){
			    echo '<script language="javascript">alert("El docente ya pertenece a esta maestria.");window.location.href="../perfilcoordinador.php"</script>';
			}else if($consulta2){
		       	echo '<script language="javascript">alert("El docente ya pertenece a esta maestria.");window.location.href="../perfilasistente.php"</script>';
		    }
		}
	}else{
		if($consulta){
		    echo '<script language="javascript">alert("No existe este codigo de docente.");window.location.href="../perfilpresidente.php"</script>';
	    }else if($consulta1){
	     	echo '<script language="javascript">alert("No existe este codigo de docente.");window.location.href="../perfilcoordinador.php"</script>';
	    }else if($consulta2){
	       	echo '<script language="javascript">alert("No existe este codigo de docente.");window.location.href="../perfilasistente.php"</script>';
	    }
	}
	mysqli_close($conexion);

?>