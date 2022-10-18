<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registro</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // Insertar valores en la base de datos cuando el formulario es enviado.
    if (isset($_REQUEST['usuario'])) {
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
    } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registrate</h1>
            <input type="text" class="login-input" name="usuario" placeholder="Usuario" required />
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
            <input type="submit" name="submit" value="Registrate" class="login-button">
            <p class="link"><a href="login.php">Inicio de sesión</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>