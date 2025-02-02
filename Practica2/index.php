<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.rtl.min.css" />

</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">Calculadora de CUM</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar materia</a>
                <?php
                clearstatcache();
                $materias = simplexml_load_file('materias.xml');

                if ($materias === false || count($materias->materia) == 0) {
                    echo "<h3 class='text-center text-muted'>Ningun registro...</h3>";
                } else {
                ?>
                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>UVS</th>
                            <th>Nota</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $materias = simplexml_load_file('materias.xml');
                            $cum = 0;
                            $numerador = 0;
                            $denominador = 0;
                            foreach ($materias->materia as $materia) {
                                $numerador += $materia->nota * $materia->uvs;
                                $denominador += $materia->uvs;
                            ?>
                                <tr>
                                    <td><?php echo $materia->codigo; ?></td>
                                    <td><?php echo $materia->nombre; ?></td>
                                    <td><?php echo $materia->uvs; ?></td>
                                    <td><?php echo $materia->nota; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-editar"
                                            data-codigo="<?php echo $materia->codigo; ?>"
                                            data-nombre="<?php echo $materia->nombre; ?>"
                                            data-uvs="<?php echo $materia->uvs; ?>"
                                            data-nota="<?php echo $materia->nota; ?>"
                                            data-toggle="modal"
                                            data-target="#editModal">Editar</a>
                                        <a href="borrar.php?codigo=<?php echo $materia->codigo; ?>" class="btn btn-danger">Borrar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                <?php
                    if ($denominador != 0) {
                        $cum = round($numerador / $denominador, 2);
                        echo "<h2>CUM: $cum </h2>";
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Modal de edición -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="actualizar.php" method="POST">
                        <input type="hidden" id="edit-codigo" name="codigo">
                        <div class="form-group">
                            <label for="edit-nombre">Nombre</label>
                            <input type="text" class="form-control" id="edit-nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="edit-uvs">UVS</label>
                            <input type="number" class="form-control" id="edit-uvs" name="uvs">
                        </div>
                        <div class="form-group">
                            <label for="edit-nota">Nota</label>
                            <input type="number" step="0.01" class="form-control" id="edit-nota" name="nota">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('nueva_modal.php');
    if (isset($_GET['exito'])) {
    ?>
        <script>
            alertify.success('!Materia agregada con exito!');
        </script>
    <?php
    }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-editar").forEach(button => {
                button.addEventListener("click", function() {
                    document.getElementById("edit-codigo").value = this.getAttribute("data-codigo");
                    document.getElementById("edit-nombre").value = this.getAttribute("data-nombre");
                    document.getElementById("edit-uvs").value = this.getAttribute("data-uvs");
                    document.getElementById("edit-nota").value = this.getAttribute("data-nota");
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_GET['exito']) && $_GET['exito'] === 'edit') { ?>
                alertify.success('Materia actualizada correctamente');
            <?php } ?>
        });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>