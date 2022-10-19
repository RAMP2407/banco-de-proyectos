<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/icono.png">
    <title>Agregar un proyecto</title>
</head>
<header>    
    <div class="barraMenu" align="top">
    <nav>
                <ul class="menu">
                <li ><img src="img/logo-tecnm.png" width="105" align="right"/></li>
                <li class="option"><a href="index.html">Inicio </a></li>
                <li class="option"><a href="proyectos.php">Proyectos</a></li>
                <li class="option"><a href="#">Perfil</a></li>
                <li class="option"><a href="logout.php">Cerrar sesión</a></li>
            </ul>    
    </nav>
    </div>
</header>  

<body>

    <div class="containerRegistroProyecto">
        <div class="forms">
          
         <!-- Registra datos de alumno -->    
            <div class="form alumno">
                <form method="POST" action="registro.php">
                    <h3> </br>Datos del Alumno</h2>    
                    <div class="input-field">                        
                        <input type="text" name="noctrl" pattern="[A-Za-z\s]+" 
                        title="Utiliza solamente números" placeholder="No. Control" required>
                        <i class="uil uil-user"></i>
                    </div>
              <!--      <div class="input-field">
                        <input type="text" name="apellido" pattern="[A-Za-z\s]+" 
                        title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Ingresa los apellidos del alumno" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="noctrl" pattern="[A-Za-z\s]+" 
                        title="Utiliza solo números" placeholder="Ingresa número de control del alumno" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="apellido" pattern="[A-Za-z\s]+" 
                        title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Ingresa la carrera del alumno" required>
                        <i class="uil uil-user"></i>
                    jhkh
                        </div> -->
            </div>        
    
        <!-- Registra datos del proyecto -->         
        <div class="form proyecto">
                    <h3> </br>Datos del Proyecto</h2>  
                    <div class="input-field">
                        <input type="text" name="nombreP" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas"
                            placeholder="Nombre del Proyecto" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="descP" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas"
                            placeholder="Descripción del proyecto" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>                                                           
        </div>
        
        <!-- Registra datos de la empresa -->  
        <div class="form emp">
                    <h3> </br>Datos de la empresa en la que se implementará el proyecto</h2>    
                    <div class="input-field">
                        <input type="text" name="nomE" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas"
                            placeholder="Nombre" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>                
                    <div class="input-field">
                        <input type="text" name="giroE" pattern="[A-Za-z0-9#\s]+" title="Utiliza solo letras mayúsculas y minúsculas"
                            placeholder="Giro" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="dirE" pattern="[A-Za-z\s]+" title="Ingresa una dirección válida"
                            placeholder="Dirección" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>                
                    <div class="input-field">
                        <input type="text" name="telE" pattern="[0-9]" title="Utiliza solamente números"
                            placeholder="Teléfono" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" name="correoE" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo válido"
                            placeholder="Correo electrónico" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="webE" title="Ingresa una página web válida"
                            placeholder="Página web">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    
                    <div class="agregaP">
                        <input type="submit" class="agregaP" name="submit" value="Registrar proyecto">
                    </div>                    
                </div>                  
            </div>
        </div>  
    </div>        


    <?php
    require('db.php');
    // Insertar valores en la base de datos cuando el formulario es enviado.
    if (isset($_REQUEST['usuario'])) {
        /**Datos alumno */
        $noctrl = stripslashes($_REQUEST['noctrl']);
        $noctrl = mysqli_real_escape_string($con, $noctrl);
        /**Datos proyecto */
        $nombreP = stripslashes($_REQUEST['nombreP']);
        $nombreP    = mysqli_real_escape_string($con, $nombreP);
        $descP    = stripslashes($_REQUEST['descP']);
        $descP    = mysqli_real_escape_string($con, $descP);
        /**Datos empresa */
        $nomE = stripslashes($_REQUEST['nomE']);
        $nomE = mysqli_real_escape_string($con, $nomE);
        $giroE = stripslashes($_REQUEST['giroE']);
        $giroE = mysqli_real_escape_string($con, $giroE);
        $dirE = stripslashes($_REQUEST['dirE']);
        $dirE = mysqli_real_escape_string($con, $dirE);
        $telE = stripslashes($_REQUEST['telE']);
        $telE = mysqli_real_escape_string($con, $telE);
        $correoE = stripslashes($_REQUEST['correoE']);
        $correoE = mysqli_real_escape_string($con, $correoE);
        $webE = stripslashes($_REQUEST['webE']);
        $webE = mysqli_real_escape_string($con, $webE);

        $query    = "INSERT into `usuarios` (usuario, nombre, correo, contrasenia, rol)
                     VALUES ('$usuario', '$nombre', '$correo', '$contrasenia', '$rol')";
                     
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Registro exitoso.</h3><br/>
                  <p class='link'>Haz click aquí para <a href='login.php'>Iniciar sesión</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Campos requeridos faltantes.</h3><br/>
                  <p class='link'>Haz click aquí para <a href='registration.php'>Registrarte</a> again.</p>
                  </div>";
        }
    } 
    ?>
</body>
</html>