<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $autor_id = $_POST['autor_id'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO libros (titulo, fecha_publicacion, autor_id, precio) VALUES ('$titulo', '$fecha_publicacion', '$autor_id', '$precio')";

    if ($conn->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

$sql = "SELECT * FROM autores";
$autores = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Libro</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<body>
    <h1>Añadir Libro</h1>
    <form action="" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <input type="date" name="fecha_publicacion" id="fecha_publicacion" required>
        <label for="autor_id">Autor:</label>
        <select name="autor_id" id="autor_id" required>
            <?php while($autor = $autores->fetch_assoc()) { ?>
            <option value="<?php echo $autor['id']; ?>"><?php echo $autor['nombre'] . ' ' . $autor['apellido']; ?></option>
            <?php } ?>
        </select>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" required>
        <button type="submit">Guardar</button>
    </form>
    <a href="listar.php">Volver</a>
</body>
</html>
