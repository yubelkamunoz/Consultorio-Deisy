<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Recibos</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar recibos
                            </p>
                            <?php
                            while ($recibo = $recibos->fetch_object()) { ?>
                                <?php
                                if ($recibo->id_recibo == $_GET['id_recibo']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php foreach ($listPac as $value) { ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label" for="text">Paciente</label><br>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single" name="new_paciente" data-iduser="<?php echo $value['id_paciente'] ?>" id="new_paciente">
                                                                <?php foreach ($listPac as $number_pac => $pac) { ?>
                                                                    <option value="<?php echo $pac['id_paciente'] ?>" <?php if ($recibo->documento_identidad === $pac['documento_identidad']) echo 'selected'; ?>>
                                                                        <?php echo ($pac['documento_identidad']) ?>
                                                                        <?php echo ($pac['nombre']) ?>
                                                                        <?php echo ($pac['apellido']) ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="col-md-6">
                                                <?php foreach ($listEmp as $value) { ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label" for="text">Empleados</label><br>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="new_empleado" data-iduser="<?php echo $value['id_empleado'] ?>" id="new_empleado">
                                                                <?php foreach ($listEmp as $number_emp => $emp) { ?>
                                                                    <option value="<?php echo $emp['id_empleado'] ?>" <?php if ($recibo->cargo === $emp['cargo']) echo 'selected'; ?>>
                                                                        <?php echo ($emp['documento_identidad']) ?>
                                                                        <?php echo ($emp['cargo']) ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="direccion">Número de Recibo</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $recibo->numero_recibo ?>" name="new_numero_recibo" class="form-control" id="new_numero_recibo" placeholder="Número de Recibo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fecha">Fecha</label>
                                                    <div class="col-sm-9">
                                                        <input type="datetime-local" value="<?php echo $recibo->fecha ?>" name="new_fecha" class="form-control" id="new_fecha" placeholder="Fecha del recibo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_precio">Costo total del servicio prestado</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" value="<?php echo $recibo->precio ?>" name="new_precio" class="form-control" id="new_precio" placeholder="Ingrese el monto en dólares">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">USD</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="concepto">Concepto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $recibo->concepto ?>" name="new_concepto" class="form-control" id="new_concepto" placeholder="Concepto del recibo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_RECIBO">Editar</button>
                                <button onclick=" location = 'show-table-pacientes.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>