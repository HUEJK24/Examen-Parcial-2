<?php
include '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM libros WHERE id=$id";
$result = $conn->query($sql);
$libro = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $autor_id = $_POST['autor_id'];
    $precio = $_POST['precio'];

    $sql = "UPDATE libros SET titulo='$titulo', fecha_publicacion='$fecha_publicacion', autor_id='$autor_id', precio='$precio' WHERE id=$id";

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
    <title>Editar Libro</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<body>
    <h1>Editar Libro</h1>
    <form action="" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $libro['titulo']; ?>" required>
        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <input type="date" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo $libro['fecha_publicacion']; ?>" required>
        <label for="autor_id">Autor:</label>
        <select name="autor_id" id="autor_id" required>
            <?php while($autor = $autores->fetch_assoc()) { ?>
            <option value="<?php echo $autor['id']; ?>" <?php if($autor['id'] == $libro['autor_id']) echo 'selected'; ?>><?php echo $autor['nombre'] . ' ' . $autor['apellido']; ?></option>
            <?php } ?>
        </select>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="<?php echo $libro['precio']; ?>" required>
        <button type="submit">Guardar</button>
    </form>
    <a href="listar.php">Volver</a>
</body>
</html>
