<?php
require_once 'lib/crud_controller.php';

$canciones = on_list_page_load();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajar con Canciones</title>
</head>

<body>
    <h1>Trabajar con Canciones</h1>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Canción</th>
                    <th>Autor</th>
                    <th>Genero</th>
                    <th> <a href="crud_form.php?mode=INS">Nuevo</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($canciones as $cancion) {
                ?>
                    <tr>
                        <td><?php echo $cancion["id"]; ?></td>
                        <td><a href="crud_form.php?mode=DSP&id=<?php echo $cancion["id"]; ?>"><?php echo $cancion["cancion"]; ?></a></td>
                        <td><?php echo $cancion["autor"]; ?></td>
                        <td><?php echo $cancion["genero"]; ?></td>
                        <td>
                            <a href="crud_form.php?mode=UPD&id=<?php echo $cancion["id"]; ?>">Editar</a>
                            <a href="crud_form.php?mode=DEL&id=<?php echo $cancion["id"]; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>
