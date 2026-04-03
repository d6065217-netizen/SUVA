
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
    <title>SUVA | Áreas de Repaso</title>

    <link rel="stylesheet" href="styles-dashboard.css">
    <link rel="stylesheet" href="styles-areas.css">
</head>
<body>

<script>
function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('open');
    document.querySelector('.overlay').classList.toggle('show');
}
</script>
<header class="header">
    <div class="header-left">

        <!-- HAMBURGUESA -->
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- LOGO -->
        <img src="logo.png" class="logo" alt="SUVA">
    </div>

    <div class="header-right">
        <div class="user-text">
            <span class="user-name"><?php echo $_SESSION['nombre']; ?></span>
            <span class="user-links">
                <a href="#">Mi Perfil</a> |
                <a href="logout.php">Cerrar sesión</a>
            </span>
        </div>

        <img src="user.png" class="user-avatar" alt="Usuario">
    </div>
</header>

<div class="layout">
    
<aside class="sidebar">
    <ul>
        <li>
            <a href="dashboard.php">Inicio</a>
        </li>

        <li class="active">
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

    <main class="content">
        <h1>Áreas de Repaso</h1>
        
<div class="areas-grid">

    <div class="area-card">
        <h3>Matemáticas</h3>
        <p>Operaciones básicas, razonamiento lógico y resolución de problemas.</p>
        <a href="MATERIAS/matematicas.php" class="area-btn">Entrar</a>
    </div>

    <div class="area-card">
        <h3>Lengua Castellana</h3>
        <p>Comprensión lectora, ortografía y producción de textos.</p>
        <a href="MATERIAS/lengua.php" class="area-btn">Entrar</a>
    </div>

    <div class="area-card">
        <h3>Ciencias Sociales</h3>
        <p>Historia, geografía, ciudadanía y contexto social.</p>
        <a href="MATERIAS/ciencias_sociales.php" class="area-btn">Entrar</a>
    </div>

    <div class="area-card">
        <h3>Ciencias Naturales</h3>
        <p>Seres vivos, ecosistemas y medio ambiente.</p>
        <a href="MATERIAS/ciencias_naturales.php" class="area-btn">Entrar</a>
    </div>

    <div class="area-card">
        <h3>Inglés</h3>
        <p>Vocabulario, comprensión básica y práctica del idioma.</p>
        <a href="MATERIAS/ingles.php" class="area-btn">Entrar</a>
    </div>

    <div class="area-card">
        <h3>Pedagogía</h3>
        <p>Fundamentos educativos y estrategias de aprendizaje.</p>
        <a href="MATERIAS/pedagogia.php" class="area-btn">Entrar</a>
    </div>

</div>

</div>

    </main>
</div>

<footer class="footer">
    © 2026 SUVA
</footer>

</body>
</html>
