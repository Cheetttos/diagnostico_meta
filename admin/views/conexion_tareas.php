<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Tareas</title>
</head>

<body>
    <h1>Gestión de Tareas</h1>

    <h2>Crear Nueva Tarea</h2>
    <form method="POST">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="1">Pendiente</option>
            <option value="2">En Progreso</option>
            <option value="3">Completada</option>
        </select>
        <button type="submit">Crear Tarea</button>
    </form>

    <h2>Lista de Tareas</h2>
    <ul>
        <?php foreach ($tareas as $tarea) : ?>
            <li>
                ID: <?php echo $tarea['id']; ?><br>
                Descripción: <?php echo $tarea['descripcion']; ?><br>
                Estado: <?php echo ($tarea['estado']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>