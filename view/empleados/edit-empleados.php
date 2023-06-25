<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar empleados</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar empleados de su tabla
                            </p>
                            <?php
                            while ($empleado = $empleados->fetch_object()) { ?>
                                <?php
                                if ($empleado->id_empleado == $_GET['id_empleado']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->nombre ?>" name="new_nombre" class="form-control" id="nombre" placeholder="Nombre del empleado">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="apellido">Apellido</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->apellido ?>" name="new_apellido" class="form-control" id="apellido" placeholder="Apellido del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="nacionalidad">
                                                        Nacionalidad</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" value="<?php echo $empleado->nacionalidad ?>" name="new_nacionalidad" id="nacionalidad">
                                                            <option>Venezolano (a)</option>
                                                            <option>Colombiano (a)</option>
                                                            <option>Extranjero (a)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="doc_ide">Documento de identidad</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->documento_identidad ?>" name="new_documento_identidad" class="form-control" id="documento" placeholder="Documento de identidad del empelado">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="cargo">Cargo</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-lg" value="<?php echo $empleado->cargo ?>" name="new_cargo" id="empleado">
                                                            <option>Doctor (a)</option>
                                                            <option>Secretario (a)</option>
                                                            <option>Enfermero (a)</option>
                                                            <option>Ayudante (a)</option>
                                                            <option>Cajero (a)</option>
                                                            <option>Conductor (a)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fecha">Fecha de Nacimiento</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" value="<?php echo $empleado->fecha_nacimiento ?>" name="new_fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento del empleado">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Sexo</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-lg" value="<?php echo $empleado->sexo ?>" name="new_sexo" id="sexo">
                                                            <option>Femenino</option>
                                                            <option>Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fecha">Dirección</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->direccion ?>" name="new_direccion" class="form-control" id="direcciones" placeholder="Direccion del empleado">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="telefono">Teléfono</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->telefono ?>" name="new_telefono" class="form-control" id="telefono" placeholder="Telefono del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="doc_ide">RIF</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $empleado->rif ?>" name="new_rif" class="form-control" id="rif" placeholder="rif del empleado">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id_empleado" value="<?php echo $empleado->documento_identidad ?>">
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_EMPLEADO">Editar</button>
                                <button onclick=" location = 'show-empleados.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>