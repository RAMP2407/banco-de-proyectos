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
        <div class="barraMenu" align="top">
            <nav>
                <ul class="menu">
                    <li><img src="img/logo-tecnm.png" width="105" align="right" /></li>
                    <li class="option"><a href="#">Inicio </a></li>
                    <li class="option"><a href="#">Proyectos</a></li>
                    <li class="option"><a href="#">Perfil</a></li>
                    <li class="option"><a href="http://localhost/banco-de-proyectos/logout.php">Cerrar sesión</a></li>
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