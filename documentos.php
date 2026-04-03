<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /SUVA-LOGIN/index.php");
    exit();
}
require "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documentos | SUVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SUVA-LOGIN/styles-dashboard.css">
</head>

<body class="documentos-page">

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

    <aside class="sidebar">
        <ul>
            <li><a href="/SUVA-LOGIN/dashboard.php">Inicio</a></li>
            <li><a href="/SUVA-LOGIN/areas.php">Áreas de repaso</a></li>
            <li><a href="/SUVA-LOGIN/mis-actividades.php">Mis actividades</a></li>
            <li><a href="/SUVA-LOGIN/progreso.php">Progreso</a></li>
            <li class="active"><a href="/SUVA-LOGIN/documentos.php">Documentos</a></li>
        </ul>
    </aside>

    <main class="content">
        <h1>Documentos</h1>
        <p class="subtitle">Material disponible para descargar</p>

        <div class="cards">

        <?php
        $res = mysqli_query($conn, "SELECT * FROM documentos ORDER BY fecha DESC");

        if (mysqli_num_rows($res) === 0) {
            echo "<p>No hay documentos disponibles.</p>";
        }

        while ($d = mysqli_fetch_assoc($res)) {
            echo "
            <div class='card'>
                <h3>{$d['titulo']}</h3>
                <p>Fecha: {$d['fecha']}</p>
                <a href='/SUVA-LOGIN/uploads/{$d['archivo']}' class='area-btn' download>
                    Descargar
                </a>
            </div>
            ";
        }
        ?>

        </div>
    </main>

</div>

<footer class="footer">© 2026 SUVA</footer>

</body>
</html>