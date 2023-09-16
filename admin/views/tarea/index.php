<main id="main">
    <br>
    <section id="about-us">
        <div">
            <div>
                <h1>Tareas</h1>
                <a href="tarea.php?action=new">Nuevo</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="col-md-4">ID</th>
                            <th scope="col" class="col-md-4">descripcion</th>
                            <th scope="col" class="col-md-2">estado</th>
                            <th scope="col" class="col-md-2">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $tarea) : ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $tarea['id']; ?>
                                </th>
                                <td>
                                    <?php echo $tarea['tarea']; ?>
                                </td>
                                <td>
                                    <div class="btn-group" tareae="group" aria-label="Menu Renglon">
                                        <a class="btn btn-primary" href="tarea.php?action=edit&id=<?php echo $tarea['id'] ?>">Modificar</a>
                                        <a class="btn btn-danger" href="tarea.php?action=delete&id=<?php echo $tarea['id'] ?>">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Se encontraron
                            <?php echo sizeof($data); ?> registros.
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</main>