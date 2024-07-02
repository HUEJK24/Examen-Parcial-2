<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    if (empty($nombre) || empty($apellido) || empty($fecha_nacimiento)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        $sql = "INSERT INTO autores (nombre, apellido, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$fecha_nacimiento')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: listar.php");
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Autor</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<body>
    <h1>Añadir Autor</h1>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <button type="submit">Guardar</button>
    </form>
    <a href="listar.php">Volver</a>
</body>
</html>
