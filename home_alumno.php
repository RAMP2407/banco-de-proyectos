<?php
//incluir auth_session.php en todas las páginas de usuario
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="img/icono.png">
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><img src="img/logo-tecnm.png" width="105" /></li>
                <li><a href="home_alumno.php">Inicio </a></li>
                <li><a href="">Mi proyecto</a></li>
                <li><a href="http://localhost/banco-de-proyectos/logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="form">
        <p>Hola alumno, <?php echo $_SESSION['usuario']; ?>!</p>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>

</html>