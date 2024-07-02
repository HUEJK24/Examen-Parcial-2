<?php
include '../config.php';

$sql = "SELECT * FROM autores";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Autores</title>
    <link rel="stylesheet" href="/gestion_libros_autores/Assents/Style.css">
</head>
<body>
    <h1>Autores</h1>
    <a href="crear.php">Añadir Autor</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['fecha_nacimiento']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este autor?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="/gestion_libros_autores/index.php">Volver</a>
</body>
</html>

<?php $conn->close(); ?>
