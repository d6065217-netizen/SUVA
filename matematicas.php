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
    <title>SUVA | Matemáticas</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../styles-dashboard.css">
    <link rel="stylesheet" href="styles-matematicas.css">
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

<!-- ✅ OVERLAY (OBLIGATORIO) -->
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

    <!-- CONTENIDO -->
    <main class="content">

        <h1>Matemáticas</h1>
        <p class="subtitle">
            Actividades de repaso para fortalecer el razonamiento lógico
            y la resolución de problemas matemáticos.
        </p>

        <div class="matematicas-content">

            <p class="matematicas-description">
                En esta sección podrás practicar conceptos matemáticos básicos
                y desarrollar habilidades de cálculo y lógica.
            </p>

            <div class="activities-grid">

                <div class="activity-card">
                    <h3>Operaciones Básicas</h3>
                    <p>Suma, resta, multiplicación y división.</p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Problemas Matemáticos</h3>
                    <p>Aplicación de operaciones en situaciones reales.</p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

                <div class="activity-card">
                    <h3>Razonamiento Lógico</h3>
                    <p>Ejercicios de análisis y deducción.</p>
                    <a href="#" class="activity-btn">Empezar</a>
                </div>

            </div>

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

<!-- ✅ JAVASCRIPT (AL FINAL, CLAVE) -->
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