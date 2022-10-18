<?php
//incluir auth_session.php en todas las páginas de usuario
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tablero</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="form">
        <p>Hola, <?php echo $_SESSION['usuario']; ?>!</p>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>

</html>