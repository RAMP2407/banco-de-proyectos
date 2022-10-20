<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="img/icono.png">
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // Dar de alta usuario
    if (isset($_POST['alta'])) {
        // Obtener datos del usuario
        $usuario = stripslashes($_REQUEST['usuario']);
        $usuario = mysqli_real_escape_string($con, $usuario);
        $nombre = stripslashes($_REQUEST['nombre']);
        $nombre    = mysqli_real_escape_string($con, $nombre);
        $correo    = stripslashes($_REQUEST['correo']);
        $correo    = mysqli_real_escape_string($con, $correo);
        $contrasenia = stripslashes($_REQUEST['contrasenia']);
        $contrasenia = mysqli_real_escape_string($con, $contrasenia);
        $rol = stripslashes($_REQUEST['rol']);
        $rol = mysqli_real_escape_string($con, $rol);
        // Revisar si el usuario ya existe, en ese caso mostrar mensaje
        $query    = "SELECT * FROM `usuarios` WHERE usuario='$usuario'
        AND contrasenia='$contrasenia'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            echo "<div class='form'>
            <h3>Este usuario ya existe.</h3><br/>
            <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
            </div>";
        } else {
            // Registrar usuario
            $query    = "INSERT into `usuarios` (usuario, nombre, correo, contrasenia, rol)
                         VALUES ('$usuario', '$nombre', '$correo', '$contrasenia', '$rol')";
            $nuevo_usuario   = mysqli_query($con, $query);
            if ($nuevo_usuario) {
                echo "<div class='form'>
                <h3>Registro exitoso.</h3><br/>
                <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
                </div>";
            } else {
                echo "<div class='form'>
                <h3>Campos requeridos faltantes.</h3><br/>
                <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
                </div>";
            }
        }
    }
    // Dar de baja usuario
    else if (isset($_POST['baja'])) {
        // Obtener datos del usuario
        $usuario = stripslashes($_REQUEST['usuario']);
        $usuario = mysqli_real_escape_string($con, $usuario);
        $contrasenia = stripslashes($_REQUEST['contrasenia']);
        $contrasenia = mysqli_real_escape_string($con, $contrasenia);
        // Borrar registro y en caso de que no exista mostrar mensaje
        $query = "DELETE FROM `usuarios` WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_affected_rows($con);
        if ($rows == 1) {
            echo "<div class='form'>
            <h3>El usuario $usuario ha sido dado de baja.</h3><br/>
            <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
            </div>";
        } else {
            echo "<div class='form'>
            <h3>Este usuario no existe.</h3><br/>
            <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
            </div>";
        }
    }
    // Consulta
    else if (isset($_POST['consulta'])) {
        // Obtener datos del usuario
        $usuario = stripslashes($_REQUEST['usuario']);
        $usuario = mysqli_real_escape_string($con, $usuario);
        $query    = "SELECT * FROM `usuarios` WHERE usuario='$usuario'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        // Mostrar información del usuario en pantalla si existe 
        // en caso contrario mostrar mensaje
        if ($rows == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $nombre = $row['nombre'];
            $correo = $row['correo'];
            $contrasenia = $row['contrasenia'];
            $rol = $row['rol'];
            echo "<div class='form'>
            <h3>Datos del usuario $usuario</h3><br/>
            <p>Nombre: $nombre</p>
            <p>Correo: $correo</p>
            <p>Contraseña: $contrasenia</p>
            <p>Rol: $rol</p>
            <br>
            <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
            </div>";
        } else {
            echo "<div class='form'>
            <h3>Este usuario no existe.</h3><br/>
            <p class='link'>Haz click aquí para <a href='cuentas.php'>regresar a cuentas</a>.</p>
            </div>";
        }
    } else {
    ?>

        <header>
            <div class="barraMenu" align="top">
                <nav>
                    <ul class="menu">
                        <li><img src="img/logo-tecnm.png" width="105" align="center" /></li>
                        <li class="option"><a href="#">Inicio </a></li>
                        <li class="option"><a href="proyectos.php">Proyectos</a></li>
                        <li class="option"><a href="cuentas.php">Cuentas</a></li>
                        <li class="option"><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <form class="form" method="post" name="login">
            <b>
                <h1 class="login-title">Dar de alta usuario</h1>
            </b>
            <input type="text" class="login-input" name="usuario" placeholder="Usuario" autofocus="true" />
            <input type="text" class="login-input" name="nombre" placeholder="Nombre completo" required />
            <input type="text" class="login-input" name="correo" placeholder="Correo electrónico">
            <input type="password" class="login-input" name="contrasenia" placeholder="Contraseña">
            <div class="rol-input">
                <label for="rol">Escoge un rol: </label>
                <select name="rol">
                    <option selected value="alumno">Alumno</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="submit" value="Alta" name="alta" class="login-button" />
        </form>

        <form class="form" method="post" name="login">
            <b>
                <h1 class="login-title">Dar de baja usuario</h1>
            </b>
            <input type="text" class="login-input" name="usuario" placeholder="Usuario" autofocus="true" />
            <input type="password" class="login-input" name="contrasenia" placeholder="Contraseña" />
            <input type="submit" value="Baja" name="baja" class="login-button" />
        </form>

        <form class="form" method="post" name="login">
            <b>
                <h1 class="login-title">Consulta</h1>
            </b>
            <input type="text" class="login-input" name="usuario" placeholder="Usuario" autofocus="true" />
            <input type="submit" value="Consulta" name="consulta" class="login-button" />
        </form>
    <?php
    }
    ?>
</body>

</html>