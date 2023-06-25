<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Pacientes</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar pacientes de su tabla
                            </p>
                            <?php
                            while ($paciente = $pacientes->fetch_object()) { ?>
                                <?php
                                if ($paciente->id_paciente == $_GET['id_paciente']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $paciente->nombre ?>" name="new_nombre" class="form-control" id="nombre" placeholder="Nombre del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="apellido">Apellido</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $paciente->apellido ?>" name="new_apellido" class="form-control" id="apellido" placeholder="Apellido del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="nacionalidad">Nacionalidad</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-lg" value="<?php echo $paciente->nacionalidad ?>" name="new_nacionalidad" id="nacionalidad">
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
                                                        <input type="text" value="<?php echo $paciente->documento_identidad ?>" name="new_doc_ide" class="form-control" id="doc_ide" placeholder="Documento de identidad del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fec_nac">Fecha de Nacimiento</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" value="<?php echo $paciente->fecha_nacimiento ?>" name="new_fec_nac" class="form-control" id="fec_nac" placeholder="Fecha de Nacimiento del paciente">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="telefono">Telefono</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $paciente->telefono ?>" name="new_telefono" class="form-control" id="telefono" placeholder="Telefono del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Sexo</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-lg" value="<?php echo $paciente->sexo ?>" name="new_sexo" id="sexo">
                                                            <option>Femenino</option>
                                                            <option>Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fec_nac">Dirección</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $paciente->direccion ?>" name="new_direccion" class="form-control" id="direcciones" placeholder="Direccion del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_numero">Número del paciente</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?php echo $paciente->numero_paciente ?>" name="new_numero" class="form-control" id="new_numero" placeholder="Número del paciente">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <input type="hidden" name="doc_hidden" value="<?php echo $paciente->documento_identidad ?>">
                                            <?php }
                                    }
                                            ?>
                                            <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_PACIENTE">Editar</button>
                                            <button onclick=" location = 'show-table-pacientes.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>