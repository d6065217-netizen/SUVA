<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /SUVA-LOGIN/dashboard.php");
    exit();
}

require "../conexion.php";

$id = $_POST['id'];
$estado = $_POST['estado'];

mysqli_query(
    $conn,
    "UPDATE actividades SET estado='$estado' WHERE id=$id"
);

header("Location: admin.php");
exit();