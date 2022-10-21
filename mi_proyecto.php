<?php
//incluir auth_session.php en todas las páginas de usuario
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mi proyecto</title>
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
    <?php
    include("db.php");
    // Obtener id del usuario
    $usuario = $_SESSION['usuario'];
    $busca_id = "SELECT * FROM `usuarios` WHERE usuario='$usuario'";
    $resultado_busca_id = mysqli_query($con, $busca_id);
    $row = mysqli_fetch_array($resultado_busca_id, MYSQLI_ASSOC);
    $usuario_id = $row['id'];

    $busca_proyectos    = "SELECT * FROM `proyectos` WHERE alumno='$usuario_id'";
    $result = mysqli_query($con, $busca_proyectos);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nombre = $row['nombre'];
    $descP = $row['descP'];
    $alumno = $row['alumno'];
    $empresa = $row['empresa'];
    $asesor = $row['asesor'];

    //Recuperar alumno
    $busca_alumno = "SELECT * FROM `usuarios` WHERE id='$alumno'";
    $resultado_alumno = mysqli_query($con, $busca_alumno);
    $r = mysqli_fetch_array($resultado_alumno, MYSQLI_ASSOC);
    $alumno = $r['nombre'];

    //Recuperar asesor
    $busca_asesor    = "SELECT * FROM `usuarios` WHERE id='$asesor'";
    $resultado_asesor = mysqli_query($con, $busca_asesor);
    $r = mysqli_fetch_array($resultado_asesor, MYSQLI_ASSOC);
    $asesor = $r['nombre'];

    //Recuperar empresa
    $busca_empresa = "SELECT * FROM `empresas` WHERE id='$empresa'";
    $resultado_empresa = mysqli_query($con, $busca_empresa);
    $r = mysqli_fetch_array($resultado_empresa, MYSQLI_ASSOC);
    $empresa = $r['nombre'];

    echo "<div class='form'>
        <h3>Datos del proyecto <br/>\"$nombre\"</h3><br/>
        <p>Descripción: $descP</p><br/>
        <p>Alumno encargado: $alumno</p><br/>
        <p>Asesor del proyecto: $asesor</p><br/>
        <p>Empresa a la que se aplica el proyecto: $empresa</p>
        <br>            
        </div>";

    ?>
</body>

</html>