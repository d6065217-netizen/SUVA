
<?php
session_start();
include "conexion.php";

if (!isset($_POST['username'], $_POST['password'])) {
    header("Location: index.php?error=1");
    exit();
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['nombre']   = $user['nombre_completo'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: index.php?error=pass");
        exit();
    }
} else {
    header("Location: index.php?error=user");
    exit();
}
?>