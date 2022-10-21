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
                <li><a href="mi_proyecto.php">Mi proyecto</a></li>
                <li><a href="http://localhost/banco-de-proyectos/logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="form">
        <p>Hola alumno, <?php 
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