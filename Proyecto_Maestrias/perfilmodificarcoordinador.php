<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Coordinador</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<br>
	<div class="row h-100 justify-content-center align-items-center">
    <div class="card col-10 " style="background-color: #F0F2EE;">
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
       <?php
       $consultaa = $_POST["cedula"];
       $consultaa = "SELECT Cedula, CodSNIES, FechaVinculacion, AcuNombramiento FROM coordinador WHERE Cedula = '$consultaa' ";
       $consultaa = mysqli_query($conexion,$consultaa);
       if($consultaa){
         while ($row1 = $consultaa->fetch_array()){
          $cedula = $row1['Cedula'];
          $codigosnies = $row1['CodSNIES'];
          $fechavinculacion = $row1['FechaVinculacion'];
          $acuerdonombramiento = $row1['AcuNombramiento'];
          $con1 = "SELECT * FROM persona WHERE Cedula = '$cedula' ";
          $con1 = mysqli_query($conexion,$con1);
          while ($row2 = $con1->fetch_array()){
           $cedula1 = $row2['Cedula'];
           $nombre = $row2['Nombres'];
           $apellido = $row2['Apellidos'];
           $correo = $row2['Correo'];
           $telefono = $row2['Telefono'];
           $direccion = $row2['Direccion'];
           $ciudad = $row2['Ciudad'];
           $genero = $row2['Genero'];
           $fechanacimiento = $row2['FechaNacimiento'];
           $estadocivil = $row2['EstadoCivil'];
         }
       }
       $con2 = "SELECT Cedula FROM coordinador WHERE Cedula = '$cedula' ";
       $con2 = mysqli_query($conexion,$con2);
       $con2 = mysqli_fetch_array($con2);
       if ($con2) {
        ?>
        <form class="row g-3" name="modificar coordinador" method="POST" action="php/ModificarCoordinadorPres.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                Cedula:
              </td>
              <td>
                <input type="text" name="cedula" placeholder="Cedula" class="form-control" value="<?php echo $cedula1 ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Nombres:
              </td>
              <td>
                <input type="text" name="nombre" placeholder="Nombres" class="form-control" value="<?php echo $nombre ?>" id="validationDefault01"  required >
              </td>
              <td>
                Apellidos:
              </td>
              <td>
                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" value="<?php echo $apellido ?>" id="validationDefault02"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Correo:
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                  <input type="email" name="correo" placeholder="Email" class="form-control" value="<?php echo $correo ?>" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                </div>
              </td>
              <td>
                Telefono:
              </td>
              <td>
                <input type="phone" name="telefono" placeholder="Telefono" class="form-control" value="<?php echo $telefono ?>" id="validationDefault05"  required>
              </td>
              <td>
                Direccion:
              </td>
              <td>
                <input type="text" name="direccion" placeholder="Direccion" class="form-control" value="<?php echo $direccion ?>" id="validationDefault05"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Ciudad:
              </td>
              <td>
                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" value="<?php echo $ciudad ?>" id="validationDefault05"  required>
              </td>
              <td>
                Genero:
              </td>
              <td>
                <input type="text" name="genero" placeholder="Genero" class="form-control" value="<?php echo $genero ?>" id="validationDefault05"  required>
              </td>
              <td>
                Fecha de Nacimiento:
              </td>
              <td>
                <input type="text" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" value="<?php echo $fechanacimiento ?>" id="validationDefault05"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Codigo SNIES:
              </td>
              <td>
                <input type="text" name="codigosnies" placeholder="CodigoSnies" class="form-control" value="<?php echo $codigosnies ?>" id="validationDefault05" readonly required>
              </td>
              <td>
                Fecha de Vinculacion:
              </td>
              <td>
                <input type="text" name="fechavinculacion" placeholder="FechaVinculacion" class="form-control" value="<?php echo $fechavinculacion ?>" id="validationDefault05" required>
              </td>
              <td>
                Estado Civil:
              </td>
              <td>
                <input type="text" name="estadocivil" placeholder="EstadoCivil" class="form-control" value="<?php echo $estadocivil ?>" id="validationDefault05"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Acuerdo de Nombramiento:
              </td>
              <td>
                <input type="text" name="acuerdonombramiento" placeholder="AcuerdoNombramiento" class="form-control" value="<?php echo $acuerdonombramiento ?>" id="validationDefault05" required>
              </td>
              <td>
                Contraseña:
              </td>
              <td>
                <input type="password" name="contraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
              </td>
              <td>
                Repite Contraseña:
              </td>
              <td>
                <input type="password" name="repitecontraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td colspan="3">
                <a href="perfilpresidente.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
              </td>
              <td colspan="3">
                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
              </td>
            </tr>
          </table>
        </form>
        <?php
      }else{
        ?>
        <form class="row g-3" name="volver" action="perfilpresidente.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                <div class="alert alert-danger border-dark text-black" role="alert">
                  CEDULA INCORRECTA
                </div>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
              </td>
            </tr>
          </table>
        </form>
        <?php
      }
    }
    ?>
  </div>
</div>
</div>
</body>
</html>