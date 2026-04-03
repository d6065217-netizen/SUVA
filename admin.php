<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /SUVA-LOGIN/dashboard.php");
    exit();
}
require "../conexion.php";

/* Obtener actividades */
$res = mysqli_query($conn, "SELECT * FROM actividades ORDER BY fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin | SUVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SUVA-LOGIN/styles-dashboard.css">
</head>

<body class="admin-page">

<main class="content">


<div class="admin-actions">

    <a href="/SUVA-LOGIN/dashboard.php" class="admin-link secondary">
        ← Volver al Dashboard
    </a>

    <a href="/SUVA-LOGIN/admin/crear-actividad.php" class="admin-link">
        ➕ Crear actividad
    </a>

</div>

<div class="action">
    <a href="/SUVA-LOGIN/admin/subir-documento.php" class="admin-link">
        📄 Subir documento
    </a>
</div>



    <table class="admin-table">
        <tr>
            <th>Área</th>
            <th>Actividad</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>

        <?php while ($a = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?= $a['area'] ?></td>
            <td><?= $a['actividad'] ?></td>
            <td><?= $a['usuario'] ?></td>
            <td><?= $a['estado'] ?></td>
            <td>
                <form method="post" action="cambiar-estado.php">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <select name="estado">
                        <option value="pendiente">Pendiente</option>
                        <option value="progreso">En progreso</option>
                        <option value="completada">Completada</option>
                    </select>
                    <button type="submit">Guardar</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</main>
</body>
</html>