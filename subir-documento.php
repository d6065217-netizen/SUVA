<?php
session_start();

/* =========================
   CONTROL DE ROL (SOLO ADMIN)
========================= */
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /SUVA-LOGIN/dashboard.php");
    exit();
}

require "../conexion.php";

/* =========================
   PROCESAR FORMULARIO
========================= */
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = trim($_POST['titulo']);
    $fecha = date("Y-m-d");

    if (empty($titulo)) {
        $mensaje = "El título es obligatorio.";
    } elseif (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== 0) {
        $mensaje = "Debe seleccionar un archivo.";
    } else {

        $archivo = $_FILES['archivo'];
        $nombreOriginal = $archivo['name'];
        $tmp = $archivo['tmp_name'];
        $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

        /* Tipos permitidos */
        $permitidos = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx'];

        if (!in_array($extension, $permitidos)) {
            $mensaje = "Tipo de archivo no permitido.";
        } else {

            /* Nombre único */
            $nombreFinal = time() . "_" . basename($nombreOriginal);
            $rutaDestino = "../uploads/" . $nombreFinal;

            if (move_uploaded_file($tmp, $rutaDestino)) {

                $sql = "INSERT INTO documentos (titulo, archivo, fecha)
                        VALUES (?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $titulo, $nombreFinal, $fecha);
                mysqli_stmt_execute($stmt);

                header("Location: /SUVA-LOGIN/documentos.php");
                exit();

            } else {
                $mensaje = "Error al subir el archivo.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documento | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SUVA-LOGIN/styles-dashboard.css">
</head>

<body class="admin-page">

<main class="content">

    <div class="admin-card">

        <h1>📄 Subir Documento</h1>
        <p class="subtitle">Solo administradores</p>

        <?php if ($mensaje): ?>
            <p style="color:red; font-weight:bold;"><?= $mensaje ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Título del documento</label>
                <input type="text" name="titulo" required>
            </div>

            <div class="form-group">
                <label>Archivo</label>
                <input type="file" name="archivo" required>
            </div>

            <button type="submit" class="admin-btn">
                Subir documento
            </button>

        </form>

        <div class="action" style="margin-top:20px;">
            <a href="/SUVA-LOGIN/admin/admin.php" class="admin-link secondary">
                ← Volver al Panel Admin
            </a>
        </div>

    </div>

</main>

</body>
</html>