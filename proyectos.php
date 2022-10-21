<?php
//incluir auth_session.php en todas las páginas de usuario
include("auth_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/icono.png">
    <title>Banco de proyectos</title>
</head>
<header>
    <div class="barraMenu" align="top">
        <nav>
            <ul class="menu">
                <li><img src="img/logo-tecnm.png" width="105" align="center" /></li>
                <li class="option"><a href="home_admin.php">Inicio </a></li>
                <li class="option"><a href="proyectos.php">Proyectos</a></li>
                <li class="option"><a href="cuentas.php">Cuentas</a></li>
                <li class="option"><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <div class="container" align-items="center">
        <div class="forms">
            <form method="POST" action="registraProyecto.php">
                <div class="form login">
                    <input type="submit" value="Agregar proyecto" name="submit" class="login-button" />
                </div>
            </form>
        </div>
    </div>

    <?php  
    include("db.php");  
    $cuenta_proyectos = "SELECT * FROM proyectos";
    $resultado_busca_proyectos = mysqli_query($con,$cuenta_proyectos);
    $numero_proyectos = mysqli_num_rows($resultado_busca_proyectos);

    //Consultando la id del primer proyecto para empezar la consulta desde ahí
    $consulta_primer_proyecto = "SELECT * FROM `proyectos`";
    $resultado_primer_proy = mysqli_query($con, $consulta_primer_proyecto);    
    $registro_primer_proy = mysqli_fetch_array($resultado_primer_proy, MYSQLI_ASSOC);
    $primer_id = $registro_primer_proy['id'];
    //Contando la ultima id para parar 
    $numero_de_proyectos = mysqli_num_rows($resultado_primer_proy);
    $ultima_id = $primer_id + ($numero_de_proyectos-1);
    
    //*Recorremos los registros y los mostramos */
    for($primer_id; $primer_id<=$ultima_id; $primer_id++){
        // Obtener datos del usuario
        //id 	nombre 	descP 	alumno 	asesor 	empresa 	
        $busca_proyectos    = "SELECT * FROM `proyectos` WHERE id='$primer_id'";
        $result = mysqli_query($con, $busca_proyectos);
        $rows = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $nombre = $row['nombre'];
            $descP = $row['descP'];
            $alumno = $row['alumno'];            
            $empresa = $row['empresa'];
            $asesor = " ";

        $busca_asesor    = "SELECT * FROM `usuarios` WHERE id='$primer_id'";
        $resultado_asesor = mysqli_query($con, $busca_asesor);
        $r = mysqli_fetch_array($resultado_asesor, MYSQLI_ASSOC);
        $asesor = $r['nombre'];
        
            echo "<div class='form'>
            <h3>Datos del proyecto <br/>'$nombre'</h3><br/>
            <p>Descripción: $descP</p><br/>
            <p>Alumno encargado: $alumno</p><br/>
            <p>Asesor del proyecto: $asesor</p><br/>
            <p>Empresa a la que se aplica el proyecto: $empresa</p>
            <br>            
            </div>";
    }//for
    
    ?>

</body>

</html>