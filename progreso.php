<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /SUVA-LOGIN/index.php");
    exit();
}

require "conexion.php";

/* Total de actividades */
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM actividades");
$total = mysqli_fetch_assoc($totalQuery)['total'];

/* Completadas */
$completadasQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS completadas FROM actividades WHERE estado = 'completada'"
);
$completadas = mysqli_fetch_assoc($completadasQuery)['completadas'];

/* Calcular porcentaje */
$porcentaje = ($total > 0) ? round(($completadas / $total) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Progreso | SUVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SUVA-LOGIN/styles-dashboard.css">
</head>

<body class="progreso-page">

<script>
function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('open');
    document.querySelector('.overlay').classList.toggle('show');
}
</script>

<header class="header">
    <div class="header-left">
        <div class="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
        <img src="/SUVA-LOGIN/logo.png" class="logo">
    </div>

    <div class="header-right">
        <div class="user-text">
            <span class="user-name"><?= $_SESSION['nombre']; ?></span>
            <span class="user-links">
                <a href="/SUVA-LOGIN/mi-perfil.php">Mi Perfil</a> |
                <a href="/SUVA-LOGIN/logout.php">Cerrar sesión</a>
            </span>
        </div>
        <img src="/SUVA-LOGIN/user.png" class="user-avatar">
    </div>
</header>

<div class="overlay" onclick="toggleMenu()"></div>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul>
            <li><a href="/SUVA-LOGIN/dashboard.php">Inicio</a></li>
            <li><a href="/SUVA-LOGIN/areas.php">Áreas de repaso</a></li>
            <li><a href="/SUVA-LOGIN/mis-actividades.php">Mis actividades</a></li>
            <li class="active"><a href="/SUVA-LOGIN/progreso.php">Progreso</a></li>
            <li><a href="/SUVA-LOGIN/documentos.php">Documentos</a></li>
        </ul>
    </aside>

    <!-- CONTENIDO -->
    <main class="content">
        <h1>Mi Progreso</h1>
        <p class="subtitle">Resumen de tu avance académico</p>

        <div class="admin-card">

            <h2><?= $porcentaje; ?>%</h2>
            <p>Actividades completadas</p>

            <div class="progress-bar">
                <div class="progress-fill" style="width: <?= $porcentaje; ?>%"></div>
            </div>

            <p style="margin-top:10px;">
                <?= $completadas; ?> de <?= $total; ?> actividades completadas
            </p>

        </div>
    </main>

</div>

<footer class="footer">© 2026 SUVA</footer>

</body>
</html>
