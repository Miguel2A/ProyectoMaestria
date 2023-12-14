<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Docente</title>
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
       $cod = $_POST["codigo"];
       $con = "SELECT Cedula, Formacion, Areas FROM docente WHERE CodDocente = '$cod' ";
       $con = mysqli_query($conexion,$con);
       if($con){
         while ($row1 = $con->fetch_array()){
          $cedula = $row1['Cedula'];
          $formacion = $row1['Formacion'];
          $areas = $row1['Areas'];
          $con1 = "SELECT * FROM persona WHERE Cedula = '$cedula' ";
          $con1 = mysqli_query($conexion,$con1);
          while ($row2 = $con1->fetch_array()){
           $ced1 = $row2['Cedula'];
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
       $con2 = "SELECT CodDocente FROM docente WHERE CodDocente = '$cod' ";
       $con2 = mysqli_query($conexion,$con2);
       $con2 = mysqli_fetch_array($con2);
       if($con2){
        ?>
        <form class="row g-3" name="modificar docente" method="POST" action="php/ModificarDocente.php">

          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                                Codigo Docente:
                              </td>
                              <td>
                                <input type="number" name="codigo" placeholder="Codigo" class="form-control" value="<?php echo $cod ?>" id="validationDefault01" readonly required>
                              </td>
                              <td>
                                Cedula:
                              </td>
                              <td>
                                <input type="number" name="cedula" placeholder="Cedula" class="form-control" value="<?php echo $cedula ?>" id="validationDefault01" required>
                              </td>
                              <td>
                                Formacion:
                              </td>
                              <td>
                                <input type="text" name="formacion" placeholder="Formacion" class="form-control" value="<?php echo $formacion ?>" id="validationDefault01" required>
                              </td>
                              
                              
                            </tr>
                            
                            <tr align="center" valign="middle">
                              <td>
                                Areas:
                              </td>
                              <td>
                                <input type="text" name="areas" placeholder="Areas" class="form-control" value="<?php echo $areas ?>" id="validationDefault01" required>
                              </td>
                              <td>
                                Nombres:
                              </td>
                              <td>
                                <input type="text" name="nombre" placeholder="Nombres" class="form-control" value="<?php echo $nombre ?>" id="validationDefault01" required>
                              </td>
                              <td>
                                Apellidos:
                              </td>
                              <td>
                                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" value="<?php echo $apellido ?>" id="validationDefault02" required>
                              </td>
                            </tr>
                            
                            <tr align="center" valign="middle">
                              <td>
                                Direccion:
                              </td>
                              <td>
                                <input type="text" name="direccion" placeholder="Direccion" class="form-control" value="<?php echo $direccion ?>" id="validationDefault05" required>
                              </td>
                              <td>
                                Ciudad:
                              </td>
                              <td>
                                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" value="<?php echo $ciudad ?>" id="validationDefault05" required>
                              </td>
                              <td>
                                Genero:
                              </td>
                              <td>
                                <input type="text" name="genero" placeholder="Genero" class="form-control" value="<?php echo $genero ?>" id="validationDefault05" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              
                              <td>
                                Correo:
                              </td>
                              <td colspan="2">
                                <div class="input-group">
                                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                  <input type="email" name="correo" placeholder="Email" class="form-control" value="<?php echo $correo ?>" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                </div>
                              </td>
                              <td>
                                Telefono:
                              </td>
                              <td colspan="2">
                                <input type="phone" name="telefono" placeholder="Telefono" class="form-control" value="<?php echo $telefono ?>" id="validationDefault05" required>
                              </td>
                              
                            </tr>
                            <tr align="center" valign="middle">
                              <td>
                                Fecha de Nacimiento:
                              </td>
                              <td colspan="2">
                                <input type="date" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" value="<?php echo $fechanacimiento ?>" id="validationDefault01" required>
                              </td>
                              <td>
                                Estado Civil:
                              </td>
                              <td colspan="2">
                                <input type="text" name="estadocivil" placeholder="EstadoCivil" class="form-control" value="<?php echo $estadocivil ?>" id="validationDefault01" required>
                              </td>
            </tr>
            <tr align="center" valign="middle">
              <td colspan="3">
                <a href="perfilmaestria.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
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
        <form class="row g-3" name="volver" action="perfilmaestria.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                <div class="alert alert-danger border-dark text-black" role="alert">
                  CODIGO INCORRECTO
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