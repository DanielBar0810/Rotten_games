<?php
    // Inicia la sesión (si aún no se ha iniciado)
    session_start();

    // Destruye la sesión actual
    session_destroy();
    session_unset();

    // Redirige al usuario a la página de inicio de sesión
    header('Location: ../index.php');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    exit;
?>