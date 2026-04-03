<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['rol']!=='admin'){
    header("Location: /SUVA-LOGIN/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear Actividad</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="/SUVA-LOGIN/styles-dashboard.css">
</head>
<body>

<main class="content">

<div class="admin-back">
<a href="/SUVA-LOGIN/admin/admin.php" class="admin-back-link">⬅ Panel Admin</a>
</div>

<div class="admin-card">
<h1>➕ Nueva Actividad</h1>

<form action="/SUVA-LOGIN/admin/guardar-actividad.php" method="post">

    <div class="form-group">
        <label for="area">Área</label>
        <select name="area" id="area" required>
            <option value="">Seleccione</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Lengua Castellana">Lengua Castellana</option>
            <option value="Inglés">Inglés</option>
            <option value="Pedagogía">Pedagogía</option>
        </select>
    </div>

    <div class="form-group">
        <label for="actividad">Actividad</label>
        <input 
            type="text" 
            name="actividad" 
            id="actividad"
            placeholder="Ej. Operaciones básicas"
            required
        >
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" required>
    </div>

    <button type="submit" class="admin-btn">
        Guardar
    </button>

</form>
``
</div>

</main>
</body>
</html>