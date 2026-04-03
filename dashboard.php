<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUVA | Inicio</title>
    

    <!-- CSS -->
    <link rel="stylesheet" href="styles-dashboard.css">
</head>
<body>

<!-- HEADER -->
<header class="header">
    <div class="header-left">
        <!-- HAMBURGUESA -->
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- LOGO -->
        <img src="logo.png" alt="SUVA" class="logo">
    </div>

    <div class="header-right">
        <div class="user-text">
            <span class="user-name">
                <?php echo $_SESSION['nombre']; ?>
            </span>
            <span class="user-links">
                <a href="#">Mi Perfil</a> |
                <a href="logout.php">Cerrar sesión</a>
            </span>
        </div>
        <img src="user.png" alt="Usuario" class="user-avatar">
    </div>
</header>

<!-- OVERLAY -->
<div class="overlay" onclick="toggleMenu()"></div>

<!-- LAYOUT -->
<div class="layout">

    <!-- SIDEBAR -->
<aside class="sidebar">
    <ul>
        <li class="active">
            <a href="dashboard.php">Inicio</a>
        </li>

        <li>
            <a href="areas.php">Áreas de repaso</a>
        </li>

        <li>
            <a href="mis-actividades.php">Mis actividades</a>
        </li>

        <li>
            <a href="progreso.php">Progreso</a>
        </li>

        <li>
            <a href="documentos.php">Documentos</a>
        </li>
    </ul>
    
</aside>

    <!-- CONTENIDO -->
    <main class="content">
        <h1>BIENVENIDO A SUVA</h1>
        <p class="subtitle">Sistema unificado de valoración académica</p>

        <div class="cards">

            <div class="card">
                <h3>¿QUÉ ES SUVA?</h3>
                <p>
                    SUVA es una plataforma educativa diseñada para apoyar el aprendizaje
                    mediante actividades de repaso organizadas por áreas.
                </p>
            </div>

            <div class="card">
                <h3>¿CÓMO FUNCIONA?</h3>
                <p>
                    Explora las áreas disponibles, accede a actividades de repaso
                    y fortalece tus conocimientos de forma progresiva.
                </p>
            </div>

            <div class="card">
                <h3>COMIENZA AHORA</h3>
                <p>
                    Accede a las áreas de aprendizaje disponibles
                    y empieza a realizar actividades de repaso.
                </p>
            </div>

        </div>

        <div class="action">
            <a href="areas.php">IR A ÁREAS DE REPASO</a>
        </div>
    </main>

</div>

<!-- FOOTER -->
<footer class="footer">
    © 2026 SUVA
</footer>

<!-- JS -->
<script>
function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('open');
    document.querySelector('.overlay').classList.toggle('show');
}
</script>

</body>
</html>