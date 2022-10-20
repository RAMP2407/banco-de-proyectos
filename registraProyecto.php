<?php
//incluir auth_session.php en todas las páginas de usuario
include("auth_session.php");
?>
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
                <li><img src="img/logo-tecnm.png" width="105" align="center" /></li>
                <li class="option"><a href="home_admin.php">Inicio </a></li>
                <li class="option"><a href="proyectos.php">Proyectos</a></li>
                <li class="option"><a href="cuentas.php">Cuentas</a></li>
                <li class="option"><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <?php
    include("db.php");
    // Insertar valores en la base de datos cuando el formulario es enviado.
    if (isset($_POST['noctrl'])) {
        /**Datos alumno */
        $usuario = $_POST['noctrl'];
        /**Datos proyecto */
        $nombreP = $_POST['nombreP'];
        $descP = $_POST['descP'];
        /*Datos admin/asesor */
        $asesor = $_SESSION['usuario'];
        $consulta_asesor    = "SELECT * FROM `usuarios` WHERE usuario='$asesor'";
        $resultado_asesor = mysqli_query($con, $consulta_asesor);
        $registro_asesor = mysqli_fetch_array($resultado_asesor, MYSQLI_ASSOC);
        $asesor = $registro_asesor['id'];
        /**Datos empresa */
        $nomE = $_POST['nomE'];
        $giroE = $_POST['giroE'];
        $dirE = $_POST['dirE'];
        $telE = $_POST['telE'];
        $correoE = $_POST['correoE'];
        $webE = $_POST['webE'];

        //Insertar datos de la empresa en la tabla empresa
        $query1    = "INSERT INTO `empresas` (nombre, giro, direcc, tel, correo, web)
        VALUES ('$nomE', '$giroE', '$dirE', '$telE', '$correoE', '$webE')";
        $result1 = mysqli_query($con, $query1);

        //Datos tabla proyectos
        //id 	nombre 	desc 	alumno 	asesor 	empresa 	        
        //Datos tabla empresas
        //id 	nombre 	giro 	direcc 	tel 	correo 	web 	

        $consulta_usuario   = "SELECT * FROM `usuarios` WHERE usuario ='$usuario'";
        $consulta_empresa    = "SELECT * FROM `empresas` WHERE nombre ='$nomE'";
        $resultado_usuario = mysqli_query($con, $consulta_usuario);

        $registro_usuario = mysqli_fetch_array($resultado_usuario, MYSQLI_ASSOC);
        $idUser = $registro_usuario['id'];

        $rows = mysqli_num_rows($resultado_usuario);

        $resultado_empresa = mysqli_query($con,  $consulta_empresa);

        $registro_empresa = mysqli_fetch_array($resultado_empresa, MYSQLI_ASSOC);
        $idE = $registro_empresa['id'];

        if ($rows == 1) {
            //Si el usuario existe registra los datos en la base de datos
            $query  = "INSERT INTO `proyectos` (nombre, descP, alumno, asesor, empresa)
                     VALUES ('$nombreP', '$descP', '$idUser', '$asesor', '$idE')";
            $result = mysqli_query($con, $query);
            echo "<div class='form'>
            <h3>Registro de proyecto exitoso.</h3><br/>
            <p class='link'>Haz click aquí para <a href='proyectos.php'>regresar a proyectos</a></p>
            </div>";
        } else {
            echo "<div class='form'>
            <h3>El usuario ingresado no existe.</h3><br/>
            <p class='link'>Haz click aquí para <a href='proyectos.php'>regresar a proyectos</a></p>
            </div>";
        }
    } else {
    ?>

        <div class="containerRegistroProyecto">
            <div class="forms" method="post">
                <!-- Registra datos de alumno -->
                <div class="form alumno">
                    <form method="POST">
                        <h3> </br>Datos del Alumno</h2>
                            <div class="input-field">
                                <input type="text" name="noctrl" title="Utiliza solamente números" placeholder="No. Control" required>
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
                            <input type="text" name="nombreP" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Nombre del Proyecto" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="descP" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Descripción del proyecto" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                </div>

                <!-- Registra datos de la empresa -->
                <div class="form emp">
                    <h3> </br>Datos de la empresa en la que se implementará el proyecto</h2>
                        <div class="input-field">
                            <input type="text" name="nomE" pattern="[A-Za-z\s]+" title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Nombre" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="giroE" pattern="[A-Za-z0-9#\s]+" title="Utiliza solo letras mayúsculas y minúsculas" placeholder="Giro" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="dirE" pattern="[A-Za-z\s]+" title="Ingresa una dirección válida" placeholder="Dirección" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="telE" title="Utiliza solamente números" placeholder="Teléfono" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" name="correoE" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo válido" placeholder="Correo electrónico" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="webE" title="Ingresa una página web válida" placeholder="Página web">
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
    }
    ?>
</body>

</html>