<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil Coordinador</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: #00923F;" >
      <a class="navbar-brand text-white" href=""><b>UNIVERSIDAD DE NARIÑO</b></a>
      <ul class="nav nav-pillss" style="background-color: #00923F;" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link text-white" href="php/CerrarSesion.php">Cerrar Sesión</a>
        </li>
      </ul>
    </nav>
  </header>
  <br>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-10 border-black" style="background-color: #F0F2EE;">
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2 " tabindex="0">
            <h4 id="scrollspyHeading1" align="center"><b><i></i></b></h4>
            <p>
              <div class="card mb-3" style="background-color: #DADED6;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="img/Coordinadorr.jpeg" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body" align="justify">
                      <h5 class="card-title" align="center">
                        <?php 
                        if($inc){
                          $con = "SELECT Nombres, Apellidos FROM persona WHERE Cedula = (SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]') ";
                          $res = mysqli_query($conexion,$con);
                          if($res){
                            while ($r = $res->fetch_array()){
                              $n = $r['Nombres'];
                              $a = $r['Apellidos'];
                              ?>
                              <b>
                                <i> 
                                  SEÑOR COORDINADOR
                                  <br>
                                  <?php
                                  echo $n;
                                  ?>
                                  &nbsp;
                                  <?php
                                  echo $a;
                                  ?>
                                  <br>
                                  BIENVENIDO
                                </i>
                              </b>
                              <?php
                            }
                          }
                        }
                        ?> 
                      </h5>
                      <p class="card-text">
                        <br>
                        Un coordinador debe tener aptitudes técnicas y personales, como atención al cliente, introducción de datos, gestión de presupuestos, manejo de equipos de oficina, dominio de Microsoft Office, habilidades interpersonales, capacidad de organización, capacidad de comunicación, capacidad de resolución de problemas y dotes de liderazgo. También debe ser capaz de comunicarse y gestionar el equipo administrativo y otros departamentos, gestionar múltiples tareas y proyectos, priorizar tareas y cumplir plazos, y adaptarse a situaciones y necesidades cambiantes.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-white">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Visualizar Información Personal.
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <?php
                      if($inc){
                        $consulta = "SELECT * FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
                        $resultado = mysqli_query($conexion,$consulta);
                        $consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]') ";
                        $resultado1 = mysqli_query($conexion,$consulta1);
                        if($resultado && $resultado1){
                          while ($row = $resultado->fetch_array()) {
                            $cedula            = $row['Cedula'];
                            $codigosnies        = $row['CodSNIES'];
                            $fechavinculacion      = $row['FechaVinculacion'];
                            $acunombramiento        = $row['AcuNombramiento'];
                            $contraseña        = $row['Password'];
                            while($row1 = $resultado1->fetch_array()){
                              $ce              = $row1['Cedula'];
                              $nombres         = $row1['Nombres'];
                              $apellidos       = $row1['Apellidos'];
                              $correo          = $row1['Correo'];
                              $telefono        = $row1['Telefono'];
                              $direccion       = $row1['Direccion'];
                              $ciudad          = $row1['Ciudad'];
                              $genero          = $row1['Genero'];
                              $fechanacimiento = $row1['FechaNacimiento'];
                              $estadocivil     = $row1['EstadoCivil'];
                              ?>
                              <table class="table table-striped">
                                <tr align="center">
                                  <td>
                                    <b>CEDULA</b> 
                                  </td>
                                  <td>
                                    <?php echo $cedula; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>NOMBRES</b>
                                  </td>
                                  <td>
                                    <?php echo $nombres; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>APELLIDOS</b>
                                  </td>
                                  <td>
                                    <?php echo $apellidos; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CORREO</b>
                                  </td>
                                  <td>
                                    <?php echo $correo; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>TELEFONO</b>
                                  </td>
                                  <td>
                                    <?php echo $telefono; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>DIRECCIÓN</b>
                                  </td>
                                  <td>
                                    <?php echo $direccion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CIUDAD</b>
                                  </td>
                                  <td>
                                    <?php echo $ciudad; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>GENERO</b>
                                  </td>
                                  <td>
                                    <?php echo $genero; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>FECHA DE NACIMIENTO</b>
                                  </td>
                                  <td>
                                    <?php echo $fechanacimiento; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>ESTADO CIVIL</b>
                                  </td>
                                  <td>
                                    <?php echo $estadocivil; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CODIGO SNIES</b>
                                  </td>
                                  <td>
                                    <?php echo $codigosnies; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>FECHA VINCULACION</b>
                                  </td>
                                  <td>
                                    <?php echo $fechavinculacion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>ACUERDO NOMBRAMIENTO </b>
                                  </td>
                                  <td>
                                    <?php echo $acunombramiento; ?>
                                  </td>
                                </tr>
                              </table>
                              <?php
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Modificar Información Personal.
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse bg-light" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="card-group" align="center">
                        <div class="card bg-transparent border-light" style="width: 18rem;">
                          <div class="card-body">
                            <form class="row g-3" name="modificar coordinador" method="POST" action="php/ModificarCoordinador.php">
                              <table class="table table-success table-striped">
                                <tr align="center" valign="middle">
                                  <td>
                                    Nombres:
                                  </td>
                                  <td>
                                    <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" value="<?php echo $nombres; ?>" required >
                                  </td>
                                  <td>
                                    Apellidos:
                                  </td>
                                  <td>
                                    <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" value="<?php echo $apellidos; ?>" required>
                                  </td>
                                  <td>
                                    Correo:
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                      <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" value="<?php echo $correo; ?>" required>
                                    </div>
                                  </td>
                                  
                                </tr>
                                <tr align="center" valign="middle">
                                  <td>
                                    Telefono:
                                  </td>
                                  <td>
                                    <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" value="<?php echo $telefono; ?>" required>
                                  </td>
                                  <td>
                                    Direccion:
                                  </td>
                                  <td>
                                    <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault06" value="<?php echo $direccion; ?>" required>
                                  </td>
                                  <td>
                                    Ciudad:
                                  </td>
                                  <td>
                                    <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault07" value="<?php echo $ciudad; ?>" required>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                <td>
                                    Genero:
                                  </td>
                                  <td>
                                    <select class="form-select" aria-label="Default select example" name="genero">
                                      <option selected value="<?php echo $genero; ?>"> <?php echo $genero; ?></option>
                                      <option  value="Masculino">Masculino</option>
                                      <option  value="Femenino">Femenino</option>
                                    </select>
                                  </td>
                                  <td>
                                    Fecha de Nacimiento:
                                  </td>
                                  <td>
                                    <input type="date" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" id="validationDefault09" value="<?php echo $fechanacimiento; ?>" required>
                                  </td>
                                  <td>
                                    Estado Civil:
                                  </td>
                                  <td>
                                    <select class="form-select" aria-label="Default select example" name="estadocivil">
                                      <option selected value="<?php echo $estadocivil; ?>"> <?php echo $estadocivil; ?></option>
                                      <option  value="Soltero/a">Soltero/a</option>
                                      <option  value="Casado/a">Casado/a</option>
                                      <option  value="Divorsiado/a">Divorciado/a</option>
                                      <option  value="Viudo/a">Viudo/a</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td>
                                    Fecha de Vinculacion:
                                  </td>
                                  <td colspan="2">
                                    <input type="date" name="fechavinculacion" placeholder="FechaVinculacion" class="form-control" id="validationDefault09" value="<?php echo $fechanacimiento; ?>" required>
                                  </td>
                                  <td>
                                    Acuerdo Nombramiento:
                                  </td>
                                  <td colspan="2">
                                    <input type="file" name="acuerdonombramiento" placeholder="AcuNombramiento" class="form-control" id="validationDefault08" value="<?php echo $acunombramiento; ?>" required>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td>
                                    Contraseña:
                                  </td>
                                  <td colspan="2">
                                    <input type="password" name="contraseñaactual" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault12" required>
                                  </td>
                                  <td colspan="2">
                                    Nueva Contraseña:
                                  </td>
                                  <td>
                                    <input type="password" name="contraseñanueva" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault13" required>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td colspan="6">
                                    <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                                  </td>
                                </tr>
                              </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Maestrias.
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <table align="center">
                        <tr>
                          <td>
                            <div  style="max-width: 18rem;">
                              <table align="center" class="table table-success table-striped">
                                <tr align="center">
                                  <th align="center"colspan="2" >
                                    MAESTRIA A LA QUE PERTENECE
                                  </th>
                                </tr>
                                <tr>
                                  <td align="center">
                                    <b> Nombre </b>
                                  </td>
                                  <td align="center">
                                    <b> Ingresar </b>
                                  </td>
                                </tr>
                                <?php
                                $sql_maestrias="SELECT CodSNIES, NomPrograma FROM programa";
                                $consulta_maestrias=mysqli_query($conexion,$sql_maestrias);

                                $sql_coordinador="SELECT CodSNIES FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
                                $consulta_coordinador=mysqli_query($conexion,$sql_coordinador);
                                $mostrar_coordinador=mysqli_fetch_array($consulta_coordinador);


                                while($mostrar_maestrias=mysqli_fetch_array($consulta_maestrias))
                                {
                                  if($mostrar_maestrias['CodSNIES'] == $mostrar_coordinador['CodSNIES'] ){
                                  ?>
                                    <tr align="center">
                                      <td>
                                        <?php echo $mostrar_maestrias['NomPrograma'] ?>
                                      </td>
                                      <td>
                                        <?php echo "<a href='perfilmaestria.php? id=".$mostrar_maestrias['CodSNIES']."'>Aceptar</a>" ?>
                                      </td>
                                    </tr>
                                    <?php
                                  }
                                }
                                ?>
                              </table>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <?php
                      $sql_coordinadorr="SELECT CodSNIES FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";

                      $consulta_coordinadorr=mysqli_query($conexion,$sql_coordinadorr);
                      $mostrar_coordinadorr=mysqli_fetch_array($consulta_coordinadorr);
                      $a=$mostrar_coordinadorr['CodSNIES'];

                      $consultaaa = "SELECT NomPrograma, Descripcion, Logo, Correo, LineaTrabajo, FechaResolucion, NumeroResolucion, ArchivoResolucion, NumEstudiantes FROM programa WHERE CodSNIES = $a ";
                       $consultaaa = mysqli_query($conexion,$consultaaa);
                       if($consultaaa){
                         while ($row1 = $consultaaa->fetch_array()){
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
                       $con2 = "SELECT CodSNIES FROM programa WHERE CodSNIES = $a ";
                       $con2 = mysqli_query($conexion,$con2);
                       $con2 = mysqli_fetch_array($con2);
                       if ($con2) {
                        ?>
                        <form class="row g-3" name="modificar maestria" method="POST" action="php/ModificarMaestria.php">
                          <table class="table table-success table-striped">
                            <tr align="center" >
                              <th colspan="6">
                                MODIFICAR DATOS DE LA MAESTRIA
                              </th>
                            </tr>
                            
                            <tr align="center" valign="middle">
                              <td>
                                Codigo SNIES:
                              </td>
                              <td>
                                <input type="text" name="codigosnies" placeholder="CodSNIES" class="form-control" value="<?php echo $mostrar_coordinador['CodSNIES'] ?>" id="validationDefault01" readonly required >
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
                                
                                <select class="form-select" aria-label="Default select example" name="lineatrabajo">
                                  <option selected value="<?php echo $lineatrabajo ?>" > <?php echo $lineatrabajo ?> </option>
                                  <option  value="Ingeniería de Software">Ingeniería de Software</option>
                                  <option  value="Inteligencia Artificial">Inteligencia Artificial</option>
                                  <option  value="Ciencia de Datos">Ciencia de Datos</option>
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
                              <td >
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
                              
                              <td colspan="6">
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
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingCinco">
                    <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCinco" aria-expanded="false" aria-controls="flush-collapseCinco">
                      Asistentes.
                    </button>
                  </h2>
                  <div id="flush-collapseCinco" class="accordion-collapse collapse" aria-labelledby="flush-headingCinco" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <form class="row g-3" name="nuevo asistente" method="POST" action="php/CrearAsistente.php">
                        <table class="table table-success table-striped">
                          <tr align="center">
                            <th colspan="6">
                              REGISTRAR
                            </th>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Cedula:
                            </td>
                            <td>
                              <input type="number" name="cedula" placeholder="Cedula" class="form-control" id="validationDefault01" required>
                            </td>
                            <td>
                              Codigo SNIES:
                            </td>
                            <td>
                              <?php

                              $consulta_codigosnies = "SELECT CodSNIES FROM programa ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == $_SESSION['codigosnies'] ){
                                    ?>
                                    <input type="number" name="codigosnies" placeholder="CodSNIES" class="form-control" id="validationDefault01" value="<?php echo $mostrar_codigosnies['CodSNIES'] ?>" readonly required>
                                    <?php
                                  }
                                }
                                ?>
                            </td>
                            <td>
                              Fecha Vinculacion:
                            </td>
                            <td>
                              <input type="date" name="fechavinculacion" placeholder="FechaVinculacion" class="form-control" id="validationDefault01" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                          <td>
                              Nombres:
                            </td>
                            <td>
                              <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault02" required>
                            </td>
                            <td>
                              Apellidos:
                            </td>
                            <td>
                              <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" required>
                            </td>
                            <td>
                              Correo:
                            </td>
                            <td>
                              <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                              </div>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Direccion:
                            </td>
                            <td>
                              <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Ciudad:
                            </td>
                            <td>
                              <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Genero:
                            </td>
                            <td>
                              
                              <select class="form-select" aria-label="Default select example" name="genero">
                                      
                                      <option  value="Masculino">Masculino</option>
                                      <option  value="Femenino">Femenino</option>
                                    </select>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Fecha de Nacimiento:
                            </td>
                            <td>
                              <input type="date" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Estado Civil:
                            </td>
                            <td>
                              <select class="form-select" aria-label="Default select example" name="estadocivil">
                                <option  value="Soltero/a">Soltero/a</option>
                                <option  value="Casado/a">Casado/a</option>
                                <option  value="Divorsiado/a">Divorciado/a</option>
                                <option  value="Viudo/a">Viudo/a</option>
                              </select>
                            </td>
                            <td>
                              Formacion:
                            </td>
                            <td>
                              <input type="text" name="formacion" placeholder="Formacion" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Telefono:
                            </td>
                            <td>
                              <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" required>
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
                            <td colspan="6">
                              <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                            </td>
                          </tr>
                        </table>
                      </form>
                      <p> 
                        
                          <table class="table table-striped">
                        <tr align="center">
                          <th colspan="7">
                            VISUALIZAR
                          </th>
                        </tr>
                        <tr align="center">
                          <td>
                            <b>CEDULA</b>
                          </td>
                          <td>
                            <b>CODIGO SNIES</b>
                          </td>
                          <td>
                            <b>NOMBRES</b>
                          </td>
                          <td>
                            <b>APELLIDOS</b>
                          </td>
                          <td>
                            <b>CORREO</b>
                          </td>
                          <td>
                            <b>TELEFONO</b>
                          </td>
                          <td>
                            <b>FECHA VINCULACION</b>
                          </td>
                        </tr>
                        <tbody class="table-group-divider">
                          <?php
                          if($inc){
                            $consulta2 = "SELECT asistente.Cedula, asistente.CodSNIES, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono, asistente.FechaVinculacion FROM
                            asistente inner join persona on asistente.Cedula = persona.Cedula ";
                            $resultado2 = mysqli_query($conexion,$consulta2);
                            if($resultado2){
                              while ($row30 = $resultado2->fetch_array()) {
                                $cedula101 = $row30['Cedula'];
                                $codsnies101 = $row30['CodSNIES'];
                                $nombre101 = $row30['Nombres'];
                                $apellido101 = $row30['Apellidos'];
                                $correo101 = $row30['Correo'];
                                $telefono101 = $row30['Telefono'];
                                $fechavinculacion101 = $row30['FechaVinculacion'];
                                if($codsnies101 == $_SESSION['codigosnies']){
                                  if($cedula101){
                                    ?>
                                    <tr align="center">
                                      <td>
                                        <?php echo $cedula101; ?>
                                      </td>
                                      <td>
                                        <?php echo $codsnies101; ?>
                                      </td>
                                      <td>
                                        <?php echo $nombre101; ?>
                                      </td>
                                      <td>
                                        <?php echo $apellido101; ?>
                                      </td>
                                      <td>
                                        <?php echo $correo101; ?>
                                      </td>
                                      <td>
                                        <?php echo $telefono101; ?>
                                      </td>
                                      <td>
                                        <?php echo $fechavinculacion101; ?>
                                      </td>
                                    </tr>
                                    <?php
                                  }
                                }
                                
                              }
                            }
                          }
                          ?>
                        </table>
                       
                      
                      
                      </p>
                      <div class="container" align="center" style="width: 45rem;">
                        <form class="row g-3" name="modificar asistente" method="POST" action="perfilmodificarasistente.php" >
                          <table class="table table-striped" align="center">
                            <td align="center">
                              <div class="col-md-6">
                                <label for="coddd" class="form-label"><b>MODIFICAR</b></label>
                                <input type="text" name="cedula" placeholder="Ingrese cedula asistente" class="form-control" id="coddd" required>
                                <br>
                                <button class="btn btn-success border-dark" type="submit" name="enviar">Cargar Datos</button>
                              </div>
                            </td>
                          </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </p>
            <h4 id="scrollspyHeading4" align="center"><b><i>CONTACTOS</i></b></h4>
            <p> 
              <div class="card-group">
                <div class="card">
                  <img src="img/contacto.png" class="card-img-top">
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text text-black">
                      Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                    </p>
                    <img src="img/redes.jpg" width="100" height="50">  
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text text-black">
                      Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                    </p>
                  </div>
                </div>
              </div> 
            </p>
          </div>
        </div>
      </div>
      <br>
    </div>
<br>
</div>
</body>
</html>