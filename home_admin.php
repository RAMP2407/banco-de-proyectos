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
                    <li class="option"><a href="cuentas.php">Cuentas</a></li>
                    <li class="option"><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form">
        <p>Hola admin, <?php 
		include("db.php");
	$usuario = $_SESSION['usuario'];
    $busca_id = "SELECT * FROM `usuarios` WHERE usuario='$usuario'";
    $resultado_busca_id = mysqli_query($con, $busca_id);
    $row = mysqli_fetch_array($resultado_busca_id, MYSQLI_ASSOC);
    $usuario_id = $row['nombre']; echo "$usuario_id";
		?>!</p>
    </div>
</body>

</html>