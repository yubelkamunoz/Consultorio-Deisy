<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Citas</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar citas de su tabla
                            </p>
                            <?php
                            while ($cita = $citas->fetch_object()) { ?>
                                <?php
                                if ($cita->id_cita == $_GET['id_cita']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" value="<?php echo $cita->direccion ?>" name="new_direccion" class="form-control" id="direccion" placeholder="Direccion">
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_hora">Fecha y hora de la cita</label>
                                            <input type="datetime-local" value="<?php echo $cita->fecha_hora ?>" name="new_fecha" class="form-control" id="fecha_hora" placeholder="Fecha y hora">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre_responsable">Nombre del responsable</label>
                                            <input type="text" value="<?php echo $cita->nombre_responsable ?>" name="new_nombre" class="form-control" id="nombre" placeholder="Nombre del responsable">
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_responsable">Número del responsable</label>
                                            <input type="text" value="<?php echo $cita->numero_responsable ?>" name="new_numero" class="form-control" id="numero" placeholder="Numero del responsable">
                                        </div>
                                        <input type="hidden" name="fecha_hidden" value="<?php echo $cita->fecha_hora ?>">
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_CITA">Editar</button>
                                <button onclick=" location = 'show-citas.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>