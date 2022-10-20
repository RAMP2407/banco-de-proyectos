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
    // Crear sesión de usuario cuando el formulario es enviado.
    if (isset($_POST['usuario'])) {
        $usuario = stripslashes($_REQUEST['usuario']);
        $usuario = mysqli_real_escape_string($con, $usuario);
        $contrasenia = stripslashes($_REQUEST['contrasenia']);
        $contrasenia = mysqli_real_escape_string($con, $contrasenia);
        // Validar que el usuario existe en la base de datos
        $query    = "SELECT * FROM `usuarios` WHERE usuario='$usuario'
                     AND contrasenia='$contrasenia'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($rows == 1) {
            $_SESSION['usuario'] = $usuario;
            // Redireccionar a la página del usuario según su rol
            if ($row['rol'] == "alumno") {
                header("Location: home_alumno.php");
            } else if ($row['rol'] == "admin") {
                header("Location: home_admin.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Usuario/contraseña incorrecto.</h3><br/>
                  <p class='link'>Haz click aquí para <a href='login.php'>Iniciar sesión</a> otra vez.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <b>
                <h1 class="login-title">Inicio de sesión</h1>
            </b>
            <input type="text" class="login-input" name="usuario" placeholder="Usuario" autofocus="true" pattern="^[0-9]{8}$" title="Ingresa un número de control." />
            <input type="password" class="login-input" name="contrasenia" placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una mayúscula y minúscula, y al menos 8 o más caracteres" />
            <input type="submit" value="Inicio de sesión" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">Registrate</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>