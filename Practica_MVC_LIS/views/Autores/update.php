<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Autor</title>
    <?php include 'views/cabecera.php'; ?>
</head>

<body>
    <?php include 'views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Actualizar autor</h3>
        </div>
        <div class="row">
            <div class="col-md-7">
                <?php
                if (isset($errores)) {
                    echo "<div class='alert alert-danger'>";
                    echo "<ul>";
                    foreach ($errores as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
                ?>
                <form role="form" action="<?= PATH ?> /Autores/processUpdate" method="POST">
                     <input type="hidden" name="codigo_autor" id="codigo_autor" value="<?= htmlspecialchars($autor['codigo_autor'] ?? '') ?>">
                    <div class="mb-3">
                        <label for="nombre_autor" class="form-label">Nombre del Autor:</label>
                        <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" value="<?= empty($autor['nombre_autor'])?'':$autor['nombre_autor']?>" placeholder="Ingresa el nombre del autor">
                    </div>
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?= empty($autor['nacionalidad'])?'':$autor['nacionalidad']?>" placeholder="Ingresa el nombre del autor">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="<?= PATH ?> /Autores">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>