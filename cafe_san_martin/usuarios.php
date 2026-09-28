<?php
include("conexion.php");


$resultado = $conexion->query("SELECT * FROM usuarios");
$total_usuarios = $resultado ? $resultado->num_rows : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios - Café San Martín</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h2>☕ Café San Martín - Administración</h2>
        <nav>
            <ul>
                <li><a href="index.html">Volver al Sitio</a></li>
            </ul>
        </nav>
    </header>

    <div class="container-seccion">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Listado de Usuarios</h2>
            <div style="background: #1E3F20; color: white; padding: 10px 20px; border-radius: 5px; text-align: center;">
                Total Usuarios <br><strong>👥 <?php echo $total_usuarios; ?></strong>
            </div>
        </div>

        <table border="1" style="width:100%; margin-top:20px; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #F0EAD6;">
                    <th style="padding: 10px;">#</th>
                    <th style="padding: 10px;">Usuario</th>
                    <th style="padding: 10px;">Nombre</th>
                    <th style="padding: 10px;">Estado</th>
                    <th style="padding: 10px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td style="padding: 10px;"><?php echo $row['id']; ?></td>
                        <td style="padding: 10px;"><?php echo $row['username']; ?></td>
                        <td style="padding: 10px;"><?php echo $row['nombre']; ?></td>
                        <td style="padding: 10px;"><?php echo $row['estado']; ?></td>
                        <td style="padding: 10px;">
                            <button style="background: #d9534f; color:white; border:none; padding:5px 10px; border-radius:3px;">Borrar</button>
                            <button style="background: #f0ad4e; color:white; border:none; padding:5px 10px; border-radius:3px;">Editar</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align:center; padding:15px;">No hay usuarios registrados en la base de datos.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>