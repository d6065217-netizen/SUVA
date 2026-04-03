<?php
session_start();

/* Seguridad: solo admin */
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /SUVA-LOGIN/dashboard.php");
    exit();
}

require "../conexion.php";

/* Validación */
if (
    empty($_POST['area']) ||
    empty($_POST['actividad']) ||
    empty($_POST['fecha'])
) {
    header("Location: /SUVA-LOGIN/admin/crear-actividad.php");
    exit();
}

/* Datos */
$area = $_POST['area'];
$actividad = $_POST['actividad'];
$fecha = $_POST['fecha'];

/* Insertar en la BD */

$sql = "INSERT INTO actividades (area, actividad, usuario, estado, fecha)
        VALUES (?, ?, ?, 'pendiente', ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $area,
    $actividad,
    $usuario,
    $fecha
);
mysqli_stmt_execute($stmt);

/* 🔁 REDIRECCIÓN FINAL (AQUÍ ESTABA EL PROBLEMA) */
header("Location: /SUVA-LOGIN/admin/admin.php");
exit();
