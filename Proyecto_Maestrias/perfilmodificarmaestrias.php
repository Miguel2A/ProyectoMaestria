<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Maestrias</title>
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
       $codigosnies = $_POST["codigosnies"];
       $consultaa = "SELECT NomPrograma, Descripcion, Logo, Correo, LineaTrabajo, FechaResolucion, NumeroResolucion, ArchivoResolucion, NumEstudiantes FROM programa WHERE CodSNIES = '$codigosnies' ";
       $consultaa = mysqli_query($conexion,$consultaa);
       if($consultaa){
         while ($row1 = $consultaa->fetch_array()){
          $nomprograma = $row1['NomPrograma'];
          $descripcion = $row1['Descripcion'];
          $logo = $row1['Logo'];
          $correo = $row1['Correo'];
          $lineatrabajo = $row1['LineaTrabajo'];
          $fecharesolucion = $row1['FechaResolucion'];
          $numeroresolucion = $row1['NumeroResolucion'];
          $archivoresolucion = $row1['ArchivoResolucion'];
          $numeroestudiantes = $row1['NumEstudiantes'];
       }
       $con2 = "SELECT CodSNIES FROM programa WHERE CodSNIES = '$codigosnies' ";
       $con2 = mysqli_query($conexion,$con2);
       $con2 = mysqli_fetch_array($con2);
       if ($con2) {
        ?>
        <form class="row g-3" name="modificar maestria" method="POST" action="php/ModificarMaestria.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                Codigo SNIES:
              </td>
              <td>
                <input type="text" name="codigosnies" placeholder="CodSNIES" class="form-control" value="<?php echo $codigosnies ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Nombre de Programa:
              </td>
              <td>
                <input type="text" name="nomprograma" placeholder="Nombres" class="form-control" value="<?php echo $nomprograma ?>" id="validationDefault01"  required >
              </td>
              <td>
                Descripcion:
              </td>
              <td>
                <input type="text" name="descripcion" placeholder="Descripcion" class="form-control" value="<?php echo $descripcion ?>" id="validationDefault02"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Logo:
              </td>
              <td>
                <input type="file" name="logo" placeholder="Logo" class="form-control" value="<?php echo $logo ?>" id="validationDefault05"  required>
              </td>
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
                Linea de Trabajo:
              </td>
              <td>
                <select class="form-select" aria-label="Default select example" name="lineatrabajo"><option selected value="<?php echo $lineatrabajo; ?>"> <?php echo $lineatrabajo; ?></option>
                  <option  value="Ingeniería de Software">Ingeniería de Software</option>
                  <option  value="Inteligencia Artificial">Inteligencia Artificial</option>
                  <option  value=" Ciencia de Datos"> Ciencia de Datos</option>
                  <option  value="IoT y Tecnologías 4.0">IoT y Tecnologías 4.0</option>
                </select>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Fecha de Resolucion:
              </td>
              <td >
                <input type="date" name="fecharesolucion" placeholder="FechaResolucion" class="form-control" value="<?php echo $fecharesolucion ?>" id="validationDefault05"  required>
              </td>
              <td>
                Numero de Resolucion:
              </td>
              <td>
                <input type="number" name="numeroresolucion" placeholder="NumeroResolucion" class="form-control" value="<?php echo $numeroresolucion ?>" id="validationDefault05"  required>
              </td>
              <td>
                Archivo de Resolucion:
              </td>
              <td >
                <input type="file" name="archivoresolucion" placeholder="ArchivoResolucion" class="form-control" value="<?php echo $archivoresolucion ?>" id="validationDefault05"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td colspan="3">
                <?php

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
                  ?>
                  <a href="perfilpresidente.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
                  <?php
                }else if($consulta1){
                  ?>
                  <a href="perfilcoordinador.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
                  <?php
                }else if($consulta2){
                 ?> 
                 <a href="perfilasistente.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
                  <?php
                }   
                ?>            
              </td>
              <td colspan="3">
                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
              </td>
            </tr>
          </table>
        </form>
        <?php
      }else{
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
          ?>
          <form class="row g-3" name="volver" action="perfilpresidente.php">
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
        }else if($consulta1){
          ?>
          <form class="row g-3" name="volver" action="perfilcoordinador.php">
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
        }else if($consulta2){
          ?>
          <form class="row g-3" name="volver" action="perfilasistente.php">
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
    }
    ?>
  </div>
</div>
</div>
</body>
</html>