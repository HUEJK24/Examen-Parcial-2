<?php
include '../config.php';

$sql = "SELECT libros.*, autores.nombre AS autor_nombre, autores.apellido AS autor_apellido FROM libros JOIN autores ON libros.autor_id = autores.id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Libros</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<form action="" method="get">
    <input type="text" name="search" placeholder="Buscar por título o autor" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>
<body>
    <h1>Libros</h1>
    <a href="crear.php">Añadir Libro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha de Publicación</th>
            <th>Autor</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['fecha_publicacion']; ?></td>
            <td><?php echo $row['autor_nombre'] . ' ' . $row['autor_apellido']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="/gestion_libros_autores/index.php">Volver</a>
</body>
</html>

<?php $conn->close(); ?>

