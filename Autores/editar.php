<?php
include '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM autores WHERE id=$id";
$result = $conn->query($sql);
$autor = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $sql = "UPDATE autores SET nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha_nacimiento' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<body>
    <h1>Editar Autor</h1>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $autor['nombre']; ?>" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $autor['apellido']; ?>" required>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $autor['fecha_nacimiento']; ?>" required>
        <button type="submit">Guardar</button>
    </form>
    <a href="listar.php">Volver</a>
</body>
</html>
