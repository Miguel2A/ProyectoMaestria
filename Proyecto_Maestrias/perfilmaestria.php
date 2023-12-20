<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil Presidente Maestria</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: #00923F;" >
      <a class="navbar-brand text-white" href=""><b>
        <?php
          $consultax = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
          $consultax = mysqli_query($conexion, $consultax);
          $consultax = mysqli_fetch_array($consultax);

          $consulta1x = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
          $consulta1x = mysqli_query($conexion, $consulta1x);
          $consulta1x = mysqli_fetch_array($consulta1x);

          $consulta2x = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
          $consulta2x = mysqli_query($conexion, $consulta2x);
          $consulta2x = mysqli_fetch_array($consulta2x);

          if($consultax){
            ?> 
            <h6 class="text-white" align="center "> BIENVENIDO PRESIDENTE </h6>
            <?php
          }else if($consulta1x){
            ?> 
            <h6 class="text-white" align="center "> BIENVENIDO COORDINADOR </h6>
            <?php
          }else if($consulta2x){
            ?> 
            <h6 class="text-white" align="center "> BIENVENIDO ASISTENTE </h6>
            <?php
          }

      ?>
      </b></a>
      <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active text-white bg-transparent" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><?php echo 'Maestria ' . htmlspecialchars($_GET["id"]) ; ?></button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link text-white bg-transparent" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Estudiantes</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link text-white bg-transparent" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Docentes</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link text-white bg-transparent" id="cohortes-tab" data-bs-toggle="tab" data-bs-target="#cohortes-tab-pane" type="button" role="tab" aria-controls="cohortes-tab-pane" aria-selected="false">Cohortes</button>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="php/CerrarSesion.php">Cerrar Sesión</a>
    </li>
    <li class="nav-item">
      <?php
          $consultax = "SELECT Cedula FROM presidente WHERE Cedula = '$_SESSION[cedula]' ";
          $consultax = mysqli_query($conexion, $consultax);
          $consultax = mysqli_fetch_array($consultax);

          $consulta1x = "SELECT Cedula FROM coordinador WHERE Cedula = '$_SESSION[cedula]' ";
          $consulta1x = mysqli_query($conexion, $consulta1x);
          $consulta1x = mysqli_fetch_array($consulta1x);

          $consulta2x = "SELECT Cedula FROM asistente WHERE Cedula = '$_SESSION[cedula]' ";
          $consulta2x = mysqli_query($conexion, $consulta2x);
          $consulta2x = mysqli_fetch_array($consulta2x);

          if($consultax){
            ?> 
            <a class="nav-link text-white" href="perfilpresidente.php">Regresar</a>
            <?php
          }else if($consulta1x){
            ?> 
            <a class="nav-link text-white" href="perfilcoordinador.php">Regresar</a>
            <?php
          }else if($consulta2x){
            ?> 
            <a class="nav-link text-white" href="perfilasistente.php">Regresar</a>
            <?php
          }
      ?>
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
            <h4 id="scrollspyHeading1" align="center"><b><i>INFORMACION MAESTRIAS</i></b></h4>
            
            <?php
                      if($inc){
                        $id1 = htmlspecialchars($_GET['id']);
                        $consulta = "SELECT * FROM programa WHERE CodSNIES = '$id1' ";
                        $resultado = mysqli_query($conexion,$consulta);
                        if($resultado){
                          while ($row = $resultado->fetch_array()) {
                            $codigosnies       = $row['CodSNIES'];
                            $nomprograma       = $row['NomPrograma'];
                            $descripcion       = $row['Descripcion'];
                            $logo              = $row['Logo'];
                            $correo            = $row['Correo'];
                            $lineatrabajo      = $row['LineaTrabajo'];
                            $fecharesolucion   = $row['FechaResolucion'];
                            $numeroresolucion  = $row['NumeroResolucion'];
                            $archivoresolucion = $row['ArchivoResolucion'];
                            $numeroestudiantes = $row['NumEstudiantes'];
                           
                              ?>
                              <table class="table table-striped">
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
                                    <b>NOMBRE</b>
                                  </td>
                                  <td>
                                    <?php echo $nomprograma; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>DESCRIPCION</b>
                                  </td>
                                  <td>
                                    <?php echo $descripcion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>LOGO</b>
                                  </td>
                                  <td>
                                    <?php echo $logo; ?>
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
                                    <b>LINEA DE TRABAJO</b>
                                  </td>
                                  <td>
                                    <?php echo $lineatrabajo; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>FECHA DE RESOLUCION</b>
                                  </td>
                                  <td>
                                    <?php echo $fecharesolucion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>NUMERO DE RESOLUCION</b>
                                  </td>
                                  <td>
                                    <?php echo $numeroresolucion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>ARCHIVO DE RESOLUCION</b>
                                  </td>
                                  <td>
                                    <?php echo $archivoresolucion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>NUMERO DE ESTUDIANTES</b>
                                  </td>
                                  <td>
                                    <?php echo $numeroestudiantes; ?>
                                  </td>
                                </tr>
                                
                              </table>
                              <?php
                          }
                        }
                      }
                      ?>

                <br><br>
                <h4 id="scrollspyHeading2" align="center"><b><i>LISTADO DE ESTUDIANTES MATRICULADOS</i></b></h4>
                <p> 
                  <table class="table table-striped bg-white">
                    <tr align="center">
                      <td>
                        <b>COD_EST</b> 
                      </td>
                      <td>
                        <b>CEDULA</b> 
                      </td>
                      <td>
                        <b>NOMBRES</b> 
                      </td>
                      <td>
                        <b>APELLIDOS</b> 
                      </td>
                    </tr>
                    <tbody class="table-group-divider">
                      <?php
                      if($inc){
                        $consulta = "SELECT estudiante.CodEstudiante, estudiante.Cedula, estudiante.CodSNIES, estudiante.Semestre, persona.Nombres, persona.Apellidos FROM
                        estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                        $resultado = mysqli_query($conexion,$consulta);
                        if($resultado){
                          while ($row2 = $resultado->fetch_array()) {
                            $codigoestudiante = $row2['CodEstudiante'];
                            $cedula = $row2['Cedula'];
                            $codigosnies = $row2['CodSNIES'];
                            $semestre = $row2['Semestre'];
                            $nombre = $row2['Nombres'];
                            $apellido = $row2['Apellidos'];
                            $codsnies12 = htmlspecialchars($_GET["id"]);
                            if($codigosnies == $codsnies12){
                              if($cedula){
                                ?>
                                <tr align="center">
                                  <td>
                                    <?php echo $codigoestudiante; ?>
                                  </td>
                                  <td>
                                    <?php echo $cedula; ?>
                                  </td>

                                  <td>
                                    <?php echo $nombre; ?>
                                  </td>
                                  <td>
                                    <?php echo $apellido; ?>
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
              <br><br>
              <h4 id="scrollspyHeading12" align="center"><b><i>LISTADO DE DOCENTES ASIGNADOS</i></b></h4>
              <p> 
                <table class="table table-striped">
                  <tr align="center">
                    <td>
                      <b>COD_DOC</b> 
                    </td>
                    <td>
                      <b>CEDULA</b>
                    </td>
                    <td>
                      <b>NOMBRES</b>
                    </td>
                    <td>
                      <b>APELLIDOS</b>
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta2 = "SELECT docente.CodDocente, docente.Cedula, docente.Formacion, persona.Nombres, persona.Apellidos FROM
                      docente inner join persona on docente.Cedula = persona.Cedula ";
                      $resultado2 = mysqli_query($conexion,$consulta2);
                      if($resultado2){
                        while ($row3 = $resultado2->fetch_array()) {
                          $codigodocente1 = $row3['CodDocente'];
                          $cedula1 = $row3['Cedula'];
                          $formacion1 = $row3['Formacion'];
                          $nombre1 = $row3['Nombres'];
                          $apellido1 = $row3['Apellidos'];

                          

                          if($cedula1){
                            ?>
                            
                                <?php 
                                $consultam = "SELECT CodDocente, CodSNIES FROM docente_programa ";
                                $consultamx = mysqli_query($conexion, $consultam);

                                while ($row34 = $consultamx->fetch_array()){
                                  $codigodoc1 = $row34['CodDocente'];
                                  $codigosnies1 = $row34['CodSNIES'];
                                  $codsnies12 = htmlspecialchars($_GET["id"]);

                                  if($codigodoc1 == $codigodocente1 && $codigosnies1 == $codsnies12 ){
                                    ?>
                                    <tr align="center">
                                      <td>
                                        <?php echo $codigodocente1; ?>
                                      </td>
                                      <td>
                                        <?php echo $cedula1; ?>
                                      </td>
                                      <td>
                                        <?php echo $nombre1; ?>
                                      </td>
                                      <td>
                                        <?php echo $apellido1; ?>
                                      </td>
                                    </tr>
                                    
                                    <?php
                                  }
                                }
                                ?>
                            <?php
                          }else{
                          }
                        }
                      }
                    }
                    ?>
                  </table>
                </p>
            
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active text-white" style="background-color: #00923F;" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro-tab-pane" type="button" role="tab" aria-controls="registro-tab-pane" aria-selected="true">REGISTRAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Visualizar-tab" data-bs-toggle="tab" data-bs-target="#Visualizar-tab-pane" type="button" role="tab" aria-controls="Visualizar-tab-pane" aria-selected="false">VISUALIZAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Modificar-tab" data-bs-toggle="tab" data-bs-target="#Modificar-tab-pane" type="button" role="tab" aria-controls="Modificar-tab-pane" aria-selected="false">MODIFICAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Egresar-tab" data-bs-toggle="tab" data-bs-target="#Egresar-tab-pane" type="button" role="tab" aria-controls="Egresar-tab-pane" aria-selected="false">EGRESAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Titular-tab" data-bs-toggle="tab" data-bs-target="#Titular-tab-pane" type="button" role="tab" aria-controls="Titular-tab-pane" aria-selected="false">TITULAR</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="registro-tab-pane" role="tabpanel" aria-labelledby="registro-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-10" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <h4 id="scrollspyHeading1" align="center"><b><i>REGISTRAR</i></b></h4>
                <p>       
                  <div class="card-group" align="center">
                    <div class="card bg-transparent" style="width: 18rem;">
                      <div class="card-body">
                        <form class="row g-3" name="nuevo estudiante" method="POST" action="php/CrearEstudiante.php">
                          <table class="table table-success table-striped">
                            <tr align="center" valign="middle">
                              <td>
                                Codigo Estudiante:
                              </td>
                              <td>
                                <input type="number" name="codigoestudiante" placeholder="CodEstudiante" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Cedula:
                              </td>
                              <td colspan="2">
                                <input type="number" name="cedula" placeholder="Cedula" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Codigo SNIES:
                              </td>
                              <td colspan="2">
                                <select class="form-select" aria-label="Default select example" name="codigosnies">
                                  <option  value="<?php echo htmlspecialchars($_GET["id"]) ; ?>"><?php echo htmlspecialchars($_GET["id"]) ; ?></option> -->
                                
                                </select>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              <td>
                                Fotografia:
                              </td>
                              <td>
                                <input type="file" name="fotografia" placeholder="Fotografia" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Semestre:
                              </td>
                              <td colspan="2">
                                <select class="form-select" aria-label="Default select example" name="semestre">
                                  <option selected > 1 </option>
                                  <option  value="2">2</option>
                                  <option  value="3">3</option>
                                  <option  value="4">4</option>
                                </select>
                              </td>
                              <td>
                                Fecha de Ingreso:
                              </td>
                              <td colspan="2">
                                <input type="date" name="fechaingreso" placeholder="FechaIngreso" class="form-control" id="validationDefault01" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              
                              <td>
                                Nombres:
                              </td>
                              <td>
                                <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Apellidos:
                              </td>
                              <td colspan="2">
                                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" required>
                              </td>
                              <td>
                                Correo:
                              </td>
                              <td colspan="2">
                                <div class="input-group">
                                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                  <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                </div>
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
                                Direccion:
                              </td>
                              <td colspan="2">
                                <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault05" required>
                              </td>
                              <td>
                                Ciudad:
                              </td>
                              <td colspan="2">
                                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault05" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle"> 
                              <td>
                                Genero:
                               <td>
                                <select class="form-select" aria-label="Default select example" name="genero">
                                      
                                      <option  value="Masculino">Masculino</option>
                                      <option  value="Femenino">Femenino</option>
                                    </select>
                                </td>
                              </td>
                              <td>
                                Fecha de Nacimiento:
                              </td>
                              <td colspan="2">
                                <input type="date" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" id="validationDefault01" required>
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
                            </tr>
                            <tr align="center" valign="middle">
                              <td colspan="7">
                                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                              </td>
                            </tr>
                          </table>
                        </form>
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
        <div class="tab-pane fade" id="Visualizar-tab-pane" role="tabpanel" aria-labelledby="Visualizar-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-10 border-black" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <h4 id="scrollspyHeading2" align="center"><b><i>VISUALIZAR ESTUDIANTES</i></b></h4>
                <p> 
                  <table class="table table-striped bg-white">
                    <tr align="center">
                      <td>
                        <b>COD_EST</b> 
                      </td>
                      <td>
                        <b>CEDULA</b> 
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
                        <b>DIRECCION</b> 
                      </td>
                      <td>
                        <b>CIUDAD</b> 
                      </td>
                      <td>
                        <b>GENERO</b> 
                      </td>
                      <td>
                        <b>FECHA N</b> 
                      </td>
                      <td>
                        <b>EST CIVIL</b> 
                      </td>
                      <td>
                        <b>SEMESTRE</b> 
                      </td>
                    </tr>
                    <tbody class="table-group-divider">
                      <?php
                      if($inc){
                        $consulta = "SELECT estudiante.CodEstudiante, estudiante.Cedula, estudiante.CodSNIES, estudiante.Semestre, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono, persona.Direccion, persona.Ciudad, persona.Genero, persona.FechaNacimiento, persona.EstadoCivil FROM
                        estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                        $resultado = mysqli_query($conexion,$consulta);
                        if($resultado){
                          while ($row2 = $resultado->fetch_array()) {
                            $codigoestudiante = $row2['CodEstudiante'];
                            $cedula = $row2['Cedula'];
                            $codigosnies = $row2['CodSNIES'];
                            $semestre = $row2['Semestre'];
                            $nombre = $row2['Nombres'];
                            $apellido = $row2['Apellidos'];
                            $correo = $row2['Correo'];
                            $telefono = $row2['Telefono'];
                            $direccion = $row2['Direccion'];
                            $ciudad = $row2['Ciudad'];
                            $genero = $row2['Genero'];
                            $fechanacimiento = $row2['FechaNacimiento'];
                            $estadocivil = $row2['EstadoCivil'];

                            $codsnies12 = htmlspecialchars($_GET["id"]);
                            if($codigosnies === $codsnies12){
                              if($cedula){
                                ?>
                                <tr align="center">
                                  <td>
                                    <?php echo $codigoestudiante; ?>
                                  </td>
                                  <td>
                                    <?php echo $cedula; ?>
                                  </td>

                                  <td>
                                    <?php echo $nombre; ?>
                                  </td>
                                  <td>
                                    <?php echo $apellido; ?>
                                  </td>
                                  <td>
                                    <?php echo $semestre; ?>
                                  </td>
                                  <td>
                                    <?php echo $telefono; ?>
                                  </td>
                                  <td>
                                    <?php echo $direccion; ?>
                                  </td>
                                  <td>
                                    <?php echo $ciudad; ?>
                                  </td>
                                  <td>
                                    <?php echo $genero; ?>
                                  </td>
                                  <td>
                                    <?php echo $fechanacimiento; ?>
                                  </td>
                                  <td>
                                    <?php echo $estadocivil; ?>
                                  </td>
                                  <td>
                                    <?php echo $semestre; ?>
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
              <br>
            </div>
          </div>
        </div>
        <div class="tab-pane fade show" id="Modificar-tab-pane" role="tabpanel" aria-labelledby="Modificar-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-11 border-black" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <table class="table table-striped bg-white">
                  <tr align="center">
                    <td>
                      <b>COD_EST</b> 
                    </td>
                    <td>
                      <b>CEDULA</b> 
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
                      <b>SEMESTRE</b> 
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta7 = "SELECT estudiante.CodEstudiante, estudiante.Cedula, estudiante.Semestre, estudiante.CodSNIES, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono FROM
                      estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                      $resultado3 = mysqli_query($conexion,$consulta7);
                      if($resultado3){
                        while ($roww10 = $resultado3->fetch_array()) {
                          $codigoestudiante11          = $roww10['CodEstudiante'];
                          $cedula11 = $roww10['Cedula'];
                          $semestre11     = $roww10['Semestre'];
                          $codigosnies11 = $roww10['CodSNIES'];
                          $nombre11          = $roww10['Nombres'];
                          $apellido11          = $roww10['Apellidos'];
                          $correo11 = $roww10['Correo'];
                          $telefono11          = $roww10['Telefono'];
                          $codsnies13 = htmlspecialchars($_GET["id"]);
                          if($codigosnies11 == $codsnies13){
                            if($cedula11){
                            ?>
                            <tr align="center">
                              <td>
                                <?php echo $codigoestudiante11; ?>
                              </td>
                              <td>
                                <?php echo $cedula11; ?>
                              </td>

                              <td>
                                <?php echo $nombre11; ?>
                              </td>
                              <td>
                                <?php echo $apellido11; ?>
                              </td>
                              <td>
                                <?php echo $correo11; ?>
                              </td>
                              <td>
                                <?php echo $telefono11; ?>
                              </td>
                              <td>
                                <?php echo $semestre11; ?>
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
                  <div class="container" align="center" style="width: 45rem;">
                    <form class="row g-3" name="modificar estudiante" method="POST" action="perfilmodificarestudiante.php" >
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="coddd" class="form-label"><b>CODIGO</b></label>
                          <select class="form-select" aria-label="Default select example" name="codigo">
                              <?php
                              $consulta_codigosnies = "SELECT CodEstudiante, CodSNIES FROM estudiante ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == htmlspecialchars($_GET["id"])){
                                    ?>
                                      <option  value="<?php echo $mostrar_codigosnies['CodEstudiante'] ?>"><?php echo $mostrar_codigosnies['CodEstudiante'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              ?>
                              </select>
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
        <div class="tab-pane fade show" id="Egresar-tab-pane" role="tabpanel" aria-labelledby="Egresar-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-11 border-black" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <table class="table table-striped bg-white">
                  <tr align="center">
                    <td>
                      <b>COD_EST</b> 
                    </td>
                    <td>
                      <b>CEDULA</b> 
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
                      <b>SEMESTRE</b> 
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta7 = "SELECT estudiante.CodEstudiante, estudiante.Cedula, estudiante.Semestre, estudiante.CodSNIES, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono FROM
                      estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                      $resultado3 = mysqli_query($conexion,$consulta7);
                      if($resultado3){
                        while ($roww10 = $resultado3->fetch_array()) {
                          $codigoestudiante11          = $roww10['CodEstudiante'];
                          $cedula11 = $roww10['Cedula'];
                          $semestre11     = $roww10['Semestre'];
                          $codigosnies11 = $roww10['CodSNIES'];
                          $nombre11          = $roww10['Nombres'];
                          $apellido11          = $roww10['Apellidos'];
                          $correo11 = $roww10['Correo'];
                          $telefono11          = $roww10['Telefono'];
                          $codsnies13 = htmlspecialchars($_GET["id"]);
                          if($codigosnies11 == $codsnies13){
                            if($cedula11){
                            ?>
                            <tr align="center">
                              <td>
                                <?php echo $codigoestudiante11; ?>
                              </td>
                              <td>
                                <?php echo $cedula11; ?>
                              </td>

                              <td>
                                <?php echo $nombre11; ?>
                              </td>
                              <td>
                                <?php echo $apellido11; ?>
                              </td>
                              <td>
                                <?php echo $correo11; ?>
                              </td>
                              <td>
                                <?php echo $telefono11; ?>
                              </td>
                              <td>
                                <?php echo $semestre11; ?>
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
                  <div class="container" align="center" style="width: 45rem;">
                    <form class="row g-3" name="egresar estudiante" method="POST" action="perfilegresarestudiante.php" >
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="coddd" class="form-label"><b>CODIGO</b></label>
                          <select class="form-select" aria-label="Default select example" name="codigo">
                              <?php
                              $consulta_codigosnies = "SELECT CodEstudiante, CodSNIES FROM estudiante ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == htmlspecialchars($_GET["id"])){
                                    ?>
                                      <option  value="<?php echo $mostrar_codigosnies['CodEstudiante'] ?>"><?php echo $mostrar_codigosnies['CodEstudiante'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              ?>
                              </select>
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
        <div class="tab-pane fade show" id="Titular-tab-pane" role="tabpanel" aria-labelledby="Titular-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-11 border-black" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <table class="table table-striped bg-white">
                  <tr align="center">
                    <td>
                      <b>COD_EST</b> 
                    </td>
                    <td>
                      <b>CEDULA</b> 
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
                      <b>SEMESTRE</b> 
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta7 = "SELECT estudiante.CodEstudiante, estudiante.Cedula, estudiante.Semestre, estudiante.CodSNIES, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono FROM
                      estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                      $resultado3 = mysqli_query($conexion,$consulta7);
                      if($resultado3){
                        while ($roww10 = $resultado3->fetch_array()) {
                          $codigoestudiante11          = $roww10['CodEstudiante'];
                          $cedula11 = $roww10['Cedula'];
                          $semestre11     = $roww10['Semestre'];
                          $codigosnies11 = $roww10['CodSNIES'];
                          $nombre11          = $roww10['Nombres'];
                          $apellido11          = $roww10['Apellidos'];
                          $correo11 = $roww10['Correo'];
                          $telefono11          = $roww10['Telefono'];
                          $codsnies13 = htmlspecialchars($_GET["id"]);
                          if($codigosnies11 == $codsnies13){
                            if($cedula11){
                            ?>
                            <tr align="center">
                              <td>
                                <?php echo $codigoestudiante11; ?>
                              </td>
                              <td>
                                <?php echo $cedula11; ?>
                              </td>

                              <td>
                                <?php echo $nombre11; ?>
                              </td>
                              <td>
                                <?php echo $apellido11; ?>
                              </td>
                              <td>
                                <?php echo $correo11; ?>
                              </td>
                              <td>
                                <?php echo $telefono11; ?>
                              </td>
                              <td>
                                <?php echo $semestre11; ?>
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
                  <div class="container" align="center" style="width: 45rem;">
                    <form class="row g-3" name="titular estudiante" method="POST" action="perfiltitularestudiante.php" >
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="coddd" class="form-label"><b>CODIGO</b></label>
                          <select class="form-select" aria-label="Default select example" name="codigo">
                              <?php
                              $consulta_codigosnies = "SELECT CodEstudiante, CodSNIES FROM estudiante ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == htmlspecialchars($_GET["id"])){
                                    ?>
                                      <option value="<?php echo $mostrar_codigosnies['CodEstudiante'] ?>"><?php echo $mostrar_codigosnies['CodEstudiante'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              ?>
                              </select>
                          
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
      </div>
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
     <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-white" style="background-color: #00923F;" id="registroD-tab" data-bs-toggle="tab" data-bs-target="#registroD-tab-pane" type="button" role="tab" aria-controls="registroD-tab-pane" aria-selected="true">REGISTRAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="VisualizarD-tab" data-bs-toggle="tab" data-bs-target="#VisualizarD-tab-pane" type="button" role="tab" aria-controls="VisualizarD-tab-pane" aria-selected="false">VISUALIZAR</button>
      </li>
      
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="ModificarD-tab" data-bs-toggle="tab" data-bs-target="#ModificarD-tab-pane" type="button" role="tab" aria-controls="ModificarD-tab-pane" aria-selected="false">MODIFICAR</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="registroD-tab-pane" role="tabpanel" aria-labelledby="registroD-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>REGISTRAR</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/CrearDocente.php">
                        <table class="table table-success table-striped">
                          <tr align="center" valign="middle">
                            <td>
                              Codigo:
                            </td>
                            <td>
                              <input type="number" name="codigodocente" placeholder="Codigo" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Cedula:
                            </td>
                            <td>
                              <input type="number" name="cedula" placeholder="Cedula" class="form-control" id="validationDefault01" required>
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
                              Areas:
                            </td>
                            <td>
                              <input type="text" name="areas" placeholder="Areas" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Nombres:
                            </td>
                            <td>
                              <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" required>
                            </td>
                            <td>
                              Apellidos:
                            </td>
                            <td>
                              <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" required>
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
                              Correo:
                            </td>
                            <td colspan="2">
                              <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                              </div>
                            </td>
                            <td>
                              Telefono:
                            </td>
                            <td colspan="2">
                              <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Fecha de Nacimiento:
                            </td>
                            <td colspan="2">
                              <input type="date" name="fechanacimiento" placeholder="FechaNacimiento" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Estado Civil:
                            </td>
                            <td colspan="2">
                              <select class="form-select" aria-label="Default select example" name="estadocivil">
                                <option  value="Soltero/a">Soltero/a</option>
                                <option  value="Casado/a">Casado/a</option>
                                <option  value="Divorsiado/a">Divorciado/a</option>
                                <option  value="Viudo/a">Viudo/a</option>
                              </select>
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
              </p>
              <h4 id="scrollspyHeading1" align="center"><b><i>ASIGNAR</i></b></h4>
              <p>
                <div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/AsignarDocente.php">
                        <table class="table table-success table-striped">
                          <tr align="center" valign="middle">
                            <td>
                              Codigo:
                            </td>
                            <td>
                              <input type="number" name="codigodocente" placeholder="codigodocente" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Codigo SNIES:
                            </td>
                            <td>
                              <select class="form-select" aria-label="Default select example" name="codigosnies">
                                <option  value="<?php echo htmlspecialchars($_GET["id"]) ; ?>"><?php echo htmlspecialchars($_GET["id"]) ; ?></option> -->
                                                                </select>
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
      </div>
      <div class="tab-pane fade" id="VisualizarD-tab-pane" role="tabpanel" aria-labelledby="VisualizarD-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading12" align="center"><b><i>VISUALIZAR DOCENTES</i></b></h4>
              <p> 
                <table class="table table-striped">
                  <tr align="center">
                    <td>
                      <b>COD_DOC</b> 
                    </td>
                    <td>
                      <b>CEDULA</b>
                    </td>
                    <td>
                      <b>FORMACION</b>
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
                      <b>DIRECCION</b>
                    </td>
                    <td>
                      <b>CIUDAD</b>
                    </td>
                    <td>
                      <b>GENERO</b>
                    </td>
                    <td>
                      <b>FECHA N</b>
                    </td>
                    <td>
                      <b>ESTADO CIVIL</b>
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta2 = "SELECT docente.CodDocente, docente.Cedula, docente.Formacion, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono, persona.Direccion, persona.Ciudad, persona.Genero, persona.FechaNacimiento, persona.EstadoCivil FROM
                      docente inner join persona on docente.Cedula = persona.Cedula ";
                      $resultado2 = mysqli_query($conexion,$consulta2);
                      if($resultado2){
                        while ($row3 = $resultado2->fetch_array()) {
                          $codigodocente1 = $row3['CodDocente'];
                          $cedula1 = $row3['Cedula'];
                          $formacion1 = $row3['Formacion'];
                          $nombre1 = $row3['Nombres'];
                          $apellido1 = $row3['Apellidos'];
                          $correo1 = $row3['Correo'];
                          $telefono1 = $row3['Telefono'];
                          $direccion1 = $row3['Direccion'];
                          $ciudad1 = $row3['Ciudad'];
                          $genero1 = $row3['Genero'];
                          $fechanacimiento1 = $row3['FechaNacimiento'];
                          $estadocivil1 = $row3['EstadoCivil'];

                          if($cedula1){
                            ?>
                            
                                <?php 
                                $consultam = "SELECT CodDocente, CodSNIES FROM docente_programa ";
                                $consultamx = mysqli_query($conexion, $consultam);

                                while ($row34 = $consultamx->fetch_array()){
                                  $codigodoc1 = $row34['CodDocente'];
                                  $codigosnies1 = $row34['CodSNIES'];
                                  $codsnies122 = htmlspecialchars($_GET["id"]);

                                  if($codigodoc1 == $codigodocente1 && $codigosnies1 == htmlspecialchars($_GET["id"]) ){
                                    ?>
                                    <tr align="center">
                                      <td>
                                        <?php echo $codigodocente1; ?>
                                      </td>
                                      <td>
                                        <?php echo $cedula1; ?>
                                      </td>
                                      <td>
                                        <?php echo $formacion1; ?>
                                      </td>
                                      <td>
                                        <?php echo $nombre1; ?>
                                      </td>
                                      <td>
                                        <?php echo $apellido1; ?>
                                      </td>
                                      <td>
                                        <?php echo $correo1; ?>
                                      </td>
                                      <td>
                                        <?php echo $telefono1; ?>
                                      </td>
                                      <td>
                                        <?php echo $direccion1; ?>
                                      </td>
                                      <td>
                                        <?php echo $ciudad1; ?>
                                      </td>
                                      <td>
                                        <?php echo $genero1; ?>
                                      </td>
                                      <td>
                                        <?php echo $fechanacimiento1; ?>
                                      </td>
                                      <td>
                                        <?php echo $estadocivil1; ?>
                                      </td>
                                    </tr>
                                    
                                    <?php
                                  }
                                }
                                ?>
                            <?php
                          }else{
                          }
                        }
                      }
                    }
                    ?>
                  </table>
                </p>
              <h4 id="scrollspyHeading15" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    <div class="tab-pane fade show" id="ModificarD-tab-pane" role="tabpanel" aria-labelledby="ModificarD-tab" tabindex="0">
      <br>
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-11 border-black" style="background-color: #F0F2EE;">
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
            <table class="table table-striped bg-white">
              <tr align="center">
                <td>
                  <b>COD_DOC</b> 
                </td>
                <td>
                  <b>CEDULA</b> 
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
                  <b>FORMACION</b> 
                </td>
              </tr>
              <tbody class="table-group-divider">
                <?php
                    if($inc){
                      $consulta2 = "SELECT docente.CodDocente, docente.Cedula, docente.Formacion, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono FROM
                      docente inner join persona on docente.Cedula = persona.Cedula ";
                      $resultado2 = mysqli_query($conexion,$consulta2);
                      if($resultado2){
                        while ($row3 = $resultado2->fetch_array()) {
                          $codigodocente1 = $row3['CodDocente'];
                          $cedula1 = $row3['Cedula'];
                          $formacion1 = $row3['Formacion'];
                          $nombre1 = $row3['Nombres'];
                          $apellido1 = $row3['Apellidos'];
                          $correo1 = $row3['Correo'];
                          $telefono1 = $row3['Telefono'];

                          

                          if($cedula1){
                            ?>
                            
                                <?php 
                                $consultam = "SELECT CodDocente, CodSNIES FROM docente_programa ";
                                $consultamx = mysqli_query($conexion, $consultam);

                                while ($row34 = $consultamx->fetch_array()){
                                  $codigodoc1 = $row34['CodDocente'];
                                  $codigosnies1 = $row34['CodSNIES'];
                                  $codsnies12 = htmlspecialchars($_GET["id"]);

                                  if($codigodoc1 == $codigodocente1 && $codigosnies1 == $codsnies12 ){
                                    ?>
                                    <tr align="center">
                                      <td>
                                        <?php echo $codigodocente1; ?>
                                      </td>
                                      <td>
                                        <?php echo $cedula1; ?>
                                      </td>
                                      
                                      <td>
                                        <?php echo $nombre1; ?>
                                      </td>
                                      <td>
                                        <?php echo $apellido1; ?>
                                      </td>
                                      <td>
                                        <?php echo $correo1; ?>
                                      </td>
                                      <td>
                                        <?php echo $telefono1; ?>
                                      </td>
                                      <td>
                                        <?php echo $formacion1; ?>
                                      </td>
                                    </tr>
                                    
                                    <?php
                                  }
                                }
                                ?>
                            <?php
                          }else{
                          }
                        }
                      }
                    }
                    ?>
              </table>
              <div class="container" align="center" style="width: 45rem;">
              <form class="row g-3" name="modificar docente" method="POST" action="perfilmodificardocente.php" >
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="coddd" class="form-label"><b>CODIGO</b></label>
                          <select class="form-select" aria-label="Default select example" name="codigo">
                              <?php
                              $consulta_codigosnies = "SELECT CodDocente, CodSNIES FROM docente_programa ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == htmlspecialchars($_GET["id"])){
                                    ?>
                                      <option  value="<?php echo $mostrar_codigosnies['CodDocente'] ?>"><?php echo $mostrar_codigosnies['CodDocente'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
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
  </div>
</div>
<div class="tab-pane fade" id="cohortes-tab-pane" role="tabpanel" aria-labelledby="cohortes-tab" tabindex="0">
     <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-white" style="background-color: #00923F;" id="registroCoh-tab" data-bs-toggle="tab" data-bs-target="#registroCoh-tab-pane" type="button" role="tab" aria-controls="registroCoh-tab-pane" aria-selected="true">REGISTRAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="VisualizarCoh-tab" data-bs-toggle="tab" data-bs-target="#VisualizarCoh-tab-pane" type="button" role="tab" aria-controls="VisualizarCoh-tab-pane" aria-selected="false">VISUALIZAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="ModificarCoh-tab" data-bs-toggle="tab" data-bs-target="#ModificarCoh-tab-pane" type="button" role="tab" aria-controls="ModificarCoh-tab-pane" aria-selected="false">MODIFICAR</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="registroCoh-tab-pane" role="tabpanel" aria-labelledby="registroCoh-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>REGISTRAR</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nueva cohorte" method="POST" action="php/CrearCohorte.php">
                        <table class="table table-success table-striped">
                          <tr align="center" valign="middle">
                            <td>
                              Codigo Cohorte:
                            </td>
                            <td>
                              <input type="number" name="codigocohorte" placeholder="Codigo" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Codigo SNIES:
                            </td>
                            <td>

                              <?php
                               //$codsnies12 = echo .htmlspecialchars($_GET["id"]);
                               // . htmlspecialchars($_GET["id"])
                              ?>

                              <input type="number" name="codigosnies" placeholder="CodigoSnies" class="form-control" id="validationDefault01" value="<?php echo htmlspecialchars($_GET["id"]); ?>" readonly required>
                              
                              
                            </td>
                            <td>
                              Nombre:
                            </td>
                            <td>
                              <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Fecha de Inicio:
                            </td>
                            <td colspan="2">
                              <input type="date" name="fechainicio" placeholder="FechaInicio" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Fecha de Finalizacion:
                            </td>
                            <td colspan="2">
                              <input type="date" name="fechafinalizacion" placeholder="FechaFinalizacion" class="form-control" id="validationDefault01" required>
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
      </div>
      <div class="tab-pane fade" id="VisualizarCoh-tab-pane" role="tabpanel" aria-labelledby="VisualizarCoh-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading12" align="center"><b><i>VISUALIZAR</i></b></h4>
              <p> 
                <table class="table table-striped">
                  <tr align="center">
                    <td>
                      <b>CODIGO</b> 
                    </td>
                    <td>
                      <b>NOMBRE</b>
                    </td>
                    <td>
                      <b>FECHA INICIO</b>
                    </td>
                    <td>
                      <b>FECHA FIN</b>
                    </td>
                    <td>
                      <b>NUMERO ESTUDIANTES</b>
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta2 = "SELECT CodCohorte, CodSNIES, Nombre, FechaInicio, FechaFinalizacion, NumEstudiantes FROM
                      cohorte ";
                      $resultado2 = mysqli_query($conexion,$consulta2);
                      if($resultado2){
                        while ($row3 = $resultado2->fetch_array()) {
                          $codigocohorte1 = $row3['CodCohorte'];
                          $codigosnies1 = $row3['CodSNIES'];
                          $nombre1 = $row3['Nombre'];
                          $fechainicio1 = $row3['FechaInicio'];
                          $fechafinalizacion1 = $row3['FechaFinalizacion'];
                          $numeroestudiantes1 = $row3['NumEstudiantes'];
                          $codsnies133 = htmlspecialchars($_GET["id"]);
                          if($codigosnies1 == $codsnies133){
                            if($codigocohorte1){
                              ?>
                              <tr align="center">
                                <td>
                                  <?php echo $codigocohorte1; ?>
                                </td>
                                <td>
                                  <?php echo $nombre1; ?>
                                </td>
                                <td>
                                  <?php echo $fechainicio1; ?>
                                </td>
                                <td>
                                  <?php echo $fechafinalizacion1; ?>
                                </td>
                                <td>
                                  <?php echo $numeroestudiantes1; ?>
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
                <br><br>
                <h4 id="scrollspyHeading2" align="center"><b><i>LISTADO DE ESTUDIANTES EGRESADOS DE LA COHORTE</i></b></h4>
                <p> 
                  <table class="table table-striped bg-white">
                    <tr align="center">
                      <td>
                        <b>COD_EST</b> 
                      </td>
                      <td>
                        <b>CEDULA</b> 
                      </td>
                      <td>
                        <b>NOMBRES</b> 
                      </td>
                      <td>
                        <b>APELLIDOS</b> 
                      </td>
                      <td>
                        <b>COHORTE</b> 
                      </td>
                    </tr>
                    <tbody class="table-group-divider">
                      <?php
                      if($inc){
                        $consulta = "SELECT persona.Nombres, persona.Apellidos, estudiante.CodEstudiante, estudiante.Cedula, estudiante.CodCohorte, estudiante.Semestre, cohorte.CodSNIES FROM persona inner join estudiante on persona.Cedula = estudiante.Cedula inner join cohorte on estudiante.CodCohorte = cohorte.CodCohorte ";
                        $resultado = mysqli_query($conexion,$consulta);
                        if($resultado){
                          while ($row2 = $resultado->fetch_array()) {
                            $nombre = $row2['Nombres'];
                            $apellido = $row2['Apellidos'];
                            $codigoestudiante = $row2['CodEstudiante'];
                            $cedula = $row2['Cedula'];
                            $codigocohorte = $row2['CodCohorte'];
                            $semestre = $row2['Semestre'];
                            $codigosnies = $row2['CodSNIES'];
                            
                            $codsnies12 = htmlspecialchars($_GET["id"]);

                            if($codigosnies == $codsnies12){
                              //$cosxx = "SELECT CodCohorte FROM cohorte";
                              //$cosxx = mysqli_query($conexion,$cosxx);
                              //$mostrar_coxx=mysqli_fetch_array($cosxx);

                             // if($cosxx){
                                
                                if($cedula){
                                  ?>
                                  <tr align="center">
                                    <td>
                                      <?php echo $codigoestudiante; ?>
                                    </td>
                                    <td>
                                      <?php echo $cedula; ?>
                                    </td>

                                    <td>
                                      <?php echo $nombre; ?>
                                    </td>
                                    <td>
                                      <?php echo $apellido; ?>
                                    </td>
                                    <td>
                                      <?php echo $codigocohorte; ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                              //}
                              
                            }
                          }
                        }
                      }
                      ?>
                    </table>
                  </p>
              <h4 id="scrollspyHeading15" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    <div class="tab-pane fade show" id="ModificarCoh-tab-pane" role="tabpanel" aria-labelledby="ModificarCoh-tab" tabindex="0">
      <br>
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-11 border-black" style="background-color: #F0F2EE;">
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
            <h4 id="scrollspyHeading12" align="center"><b><i>MODIFICAR</i></b></h4>
            <table class="table table-striped bg-white">
              <tr align="center">
                <td>
                      <b>CODIGO</b> 
                    </td>
                    <td>
                      <b>NOMBRE</b>
                    </td>
                    <td>
                      <b>FECHA INICIO</b>
                    </td>
                    <td>
                      <b>FECHA FIN</b>
                    </td>
                    <td>
                      <b>NUMERO ESTUDIANTES</b>
                    </td>
              </tr>
              <tbody class="table-group-divider">
                <?php
                if($inc){
                  $consulta7 = "SELECT CodCohorte, CodSNIES, Nombre, FechaInicio, FechaFinalizacion, NumEstudiantes FROM
                      cohorte ";
                  $resultado3 = mysqli_query($conexion,$consulta7);
                  if($resultado3){
                    while ($roww10 = $resultado3->fetch_array()) {
                      $codigocohorte11  = $roww10['CodCohorte'];
                      $codigosnies11 = $roww10['CodSNIES'];
                      $nombre11 = $roww10['Nombre'];
                      $fechainicio11 = $roww10['FechaInicio'];
                      $fechafinalizacion11 = $roww10['FechaFinalizacion'];
                      $numeroestudiantes11 = $roww10['NumEstudiantes'];
                      $codsnies134 = htmlspecialchars($_GET["id"]);
                      if($codigosnies11 == $codsnies134){
                        if($codigocohorte11){
                          ?>
                          <tr align="center">
                            <td>
                              <?php echo $codigocohorte11; ?>
                            </td>
                            <td>
                              <?php echo $nombre11; ?>
                            </td>

                            <td>
                              <?php echo $fechainicio11; ?>
                            </td>
                            <td>
                              <?php echo $fechafinalizacion11; ?>
                            </td>
                            <td>
                              <?php echo $numeroestudiantes11; ?>
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
              <div class="container" align="center" style="width: 45rem;">
                <form class="row g-3" name="modificar docente" method="POST" action="perfilmodificarcohorte.php" >
                  <table class="table table-striped" align="center">
                    <td align="center">
                     <div class="col-md-6">
                      <label for="coddd" class="form-label"><b>CODIGO</b></label>
                       <select class="form-select" aria-label="Default select example" name="codigo">
                              <?php
                              $consulta_codigosnies = "SELECT CodCohorte, CodSNIES FROM cohorte ";
                              $consulta_codigosnies = mysqli_query($conexion, $consulta_codigosnies);

                              while($mostrar_codigosnies=mysqli_fetch_array($consulta_codigosnies))
                                {
                                  if($mostrar_codigosnies['CodSNIES'] == htmlspecialchars($_GET["id"])){
                                    ?>
                                      <option  value="<?php echo $mostrar_codigosnies['CodCohorte'] ?>"><?php echo $mostrar_codigosnies['CodCohorte'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
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
  </div>
</div>
<br>
</div>
</body>
</html>