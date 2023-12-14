<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Cohorte</title>
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
       $codigocohorte = $_POST["codigo"];
       $consultaa = "SELECT CodSNIES, Nombre, FechaInicio, FechaFinalizacion, NumEstudiantes FROM cohorte WHERE CodCohorte = '$codigocohorte' ";
       $consultaa = mysqli_query($conexion,$consultaa);
       if($consultaa){
         while ($row1 = $consultaa->fetch_array()){
          $codigosnies = $row1['CodSNIES'];
          $nombre = $row1['Nombre'];
          $fechainicio = $row1['FechaInicio'];
          $fechafinalizacion = $row1['FechaFinalizacion'];
          $numeroestudiantes = $row1['NumEstudiantes'];
       }
       $con2 = "SELECT CodCohorte FROM cohorte WHERE CodCohorte = '$codigocohorte' ";
       $con2 = mysqli_query($conexion,$con2);
       $con2 = mysqli_fetch_array($con2);
       if ($con2) {
        ?>
        <form class="row g-3" name="modificar cohorte" method="POST" action="php/ModificarCohorte.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                Codigo Cohorte:
              </td>
              <td>
                <input type="int" name="codigocohorte" placeholder="CodCohorte" class="form-control" value="<?php echo $codigocohorte ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Codigo SNIES:
              </td>
              <td>
                <input type="int" name="codigosnies" placeholder="CodSNIES" class="form-control" value="<?php echo $codigosnies ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Nombre:
              </td>
              <td>
                <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $nombre ?>" id="validationDefault02"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Fecha de Inicio:
              </td>
              <td>
                <input type="date" name="fechainicio" placeholder="FechaInicio" class="form-control" value="<?php echo $fechainicio ?>" id="validationDefault05"  required>
              </td>
              <td>
                Fecha de Finalizacion:
              </td>
              <td>
                <input type="date" name="fechafinalizacion" placeholder="FechaFinalizacion" class="form-control" value="<?php echo $fechafinalizacion ?>" id="validationDefault05"  required>
              </td>
              
              <td>
                Numero de Estudiantes:
              </td>
              <td>
                <input type="int" name="numeroestudiantes" placeholder="NumeroEstudiantes" class="form-control" value="<?php echo $numeroestudiantes ?>" id="validationDefault05" readonly required>
              </td>
            </tr>
          
            <tr align="center" valign="middle">
              <td colspan="3">
                <?php 
                $consultaw = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
                $consultaw = mysqli_query($conexion, $consultaw);
                $consultaw = mysqli_fetch_array($consultaw);

                $consulta1w = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
                $consulta1w = mysqli_query($conexion, $consulta1w);
                $consulta1w = mysqli_fetch_array($consulta1w);

                $consulta2w = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
                $consulta2w = mysqli_query($conexion, $consulta2w);
                $consulta2w = mysqli_fetch_array($consulta2w);

                if($consultaw){
                  ?>
                  <a href="perfilpresidente.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
                  <?php
                }else if($consulta1w){
                  ?>
                  <a href="perfilcoordinador.php"><button class="btn btn-success border-dark" type="button">VOLVER</button></a>
                  <?php
                }else if($consulta2w){
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
                $consultaw = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
                $consultaw = mysqli_query($conexion, $consultaw);
                $consultaw = mysqli_fetch_array($consultaw);

                $consulta1w = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
                $consulta1w = mysqli_query($conexion, $consulta1w);
                $consulta1w = mysqli_fetch_array($consulta1w);

                $consulta2w = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
                $consulta2w = mysqli_query($conexion, $consulta2w);
                $consulta2w = mysqli_fetch_array($consulta2w);

                if($consultaw){
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
                }else if($consulta1w){
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
                }else if($consulta2w){
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