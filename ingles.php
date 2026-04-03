<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUVA | Inglés</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../styles-dashboard.css">
    <link rel="stylesheet" href="styles-ingles.css">
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
        <img src="../logo.png" class="logo" alt="SUVA">
    </div>

    <div class="header-right">
        <div class="user-text">
            <span class="user-name"><?php echo $_SESSION['nombre']; ?></span>
            <span class="user-links">
                <a href="#">Mi Perfil</a> |
                <a href="../logout.php">Cerrar sesión</a>
            </span>
        </div>

        <img src="../user.png" class="user-avatar" alt="Usuario">
    </div>
</header>

<!-- OVERLAY (OBLIGATORIO) -->
<div class="overlay" onclick="toggleMenu()"></div>

<!-- LAYOUT -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul>
            <li>
                <a href="../dashboard.php">Inicio</a>
            </li>
            <li class="active">
                <a href="../areas.php">Áreas de Repaso</a>
            </li>
            <li>
                <a href="#">Mis actividades</a>
            </li>
            <li>
                <a href="#">Progreso</a>
            </li>
            <li>
                <a href="#">Documentos</a>
            </li>
        </ul>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="content">

        <h1>Inglés</h1>
        <p class="subtitle">
            Actividades de repaso para fortalecer el vocabulario,
            la comprensión lectora y la gramática básica del idioma inglés.
        </p>

        <div class="ingles-content">

            <p class="ingles-description">
                En esta sección podrás practicar el idioma inglés mediante
                actividades progresivas enfocadas en vocabulario, lectura
                y estructuras gramaticales.
            </p>

            <!-- ACTIVIDADES -->
            <div class="activities-grid">

                <div class="activity-card">
                    <h3>Vocabulary Basics</h3>
                    <p>
                        Aprende palabras y expresiones básicas del idioma inglés.
                    </p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Reading Practice</h3>
                    <p>
                        Ejercicios de comprensión lectora con textos sencillos.
                    </p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Grammar Basics</h3>
                    <p>
                        Practica estructuras gramaticales simples del idioma inglés.
                    </p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

            </div>

            <!-- VOLVER -->
            <div class="back-area">
                <a href="../areas.php">← Volver a Áreas de Repaso</a>
            </div>

        </div>

    </main>

</div>

<!-- FOOTER -->
<footer class="footer">
    © 2026 SUVA
</footer>

<!-- ✅ JAVASCRIPT AL FINAL (CLAVE) -->
<script>
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');

    if (!sidebar || !overlay) {
        console.error('Sidebar u overlay no encontrados');
        return;
    }

    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
}
</script>

</body>
</html>