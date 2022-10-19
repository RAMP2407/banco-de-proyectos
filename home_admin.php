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
        <div class="barraMenu" align="top">
            <nav>
                <ul class="menu">
                    <li><img src="img/logo-tecnm.png" width="105" align="center" /></li>
                    <li class="option"><a href="#">Inicio </a></li>
                    <li class="option"><a href="proyectos.php">Proyectos</a></li>
                    <li class="option"><a href="#">Perfil</a></li>
                    <li class="option"><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form">
        <p>Hola admin, <?php echo $_SESSION['usuario']; ?>!</p>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>

</html>