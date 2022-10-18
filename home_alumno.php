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
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><img src="img/logo-tecnm.png" width="105" /></li>
                <li><a href="">Inicio </a></li>
                <li><a href="">Mi proyecto</a></li>
                <li><a href="">Perfil</a></li>
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