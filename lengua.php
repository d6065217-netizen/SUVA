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
    <title>SUVA | Lengua Castellana</title>

    <!-- CSS GENERAL (sube una carpeta) -->
    <link rel="stylesheet" href="../styles-dashboard.css">

    <!-- CSS ESPECÍFICO DE LENGUAJE -->
    <link rel="stylesheet" href="styles-lengua.css">
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

<!-- OVERLAY -->
<div class="overlay" onclick="toggleMenu()"></div>

<!-- LAYOUT -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul>
            <li><a href="../dashboard.php">Inicio</a></li>
            <li class="active"><a href="../areas.php">Áreas de Repaso</a></li>
            <li><a href="#">Mis actividades</a></li>
            <li><a href="#">Progreso</a></li>
            <li><a href="#">Documentos</a></li>
        </ul>
    </aside>

    <!-- CONTENIDO -->
    <main class="content">

        <h1>Lengua Castellana</h1>
        <p class="subtitle">
            Actividades para fortalecer la lectura, la escritura
            y la comprensión del lenguaje.
        </p>

        <div class="lenguaje-content">

            <p class="lenguaje-description">
                En esta sección podrás mejorar tus habilidades comunicativas
                a través de ejercicios de comprensión lectora, ortografía
                y producción de textos.
            </p>

            <!-- ACTIVIDADES -->
            <div class="activities-grid">

                <div class="activity-card">
                    <h3>Comprensión Lectora</h3>
                    <p>
                        Lee textos y responde preguntas para mejorar
                        la comprensión.
                    </p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Ortografía</h3>
                    <p>
                        Practica reglas ortográficas y uso correcto
                        de las palabras.
                    </p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Producción de Textos</h3>
                    <p>
                        Redacta textos breves aplicando coherencia
                        y cohesión.
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

<!-- ✅ JS AL FINAL -->
<script>
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');

    if (!sidebar || !overlay) return;

    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
}
</script>

</body>
</html>