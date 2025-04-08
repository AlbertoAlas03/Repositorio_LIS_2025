<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Editoriales</title>
    <?php include 'views/cabecera.php'; ?>
</head>

<body>
    <?php include 'views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Lista de Editoriales</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="<?= PATH ?>/Editoriales/create">Nuevo Editorial</a>
                <br><br>
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="table-dark">
                        <tr>
                            <th>Código del Editorial</th>
                            <th>Nombre del Editorial</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($editoriales as $editorial):
                        ?>
                            <tr>
                                <td><?= $editorial["codigo_editorial"] ?></td>
                                <td><?= $editorial["nombre_editorial"] ?></td>
                                <td><?= $editorial["contacto"] ?></td>
                                <td><?= $editorial["telefono"] ?></td>
                                <td>
                                    <a href="<?= PATH . '/Editoriales/delete/' . $editorial['codigo_editorial'] ?>" class="btn btn-danger">Eliminar</a> <!--Para eliminar-->
                                    <a href="<?= PATH . '/Editoriales/updateEditorial/' . $editorial['codigo_editorial'] ?>" class="btn btn-warning">Actualizar</a> <!--Para modificar-->
                                </td>  
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<!--Hacer CRUD de autores y agregar modificar en editoriales-->