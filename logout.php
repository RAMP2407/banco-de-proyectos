<?php
session_start();
// Terminar sesión
if (session_destroy()) {
    // Redirigir a página de inicio de sesión
    header("Location: login.php");
}
