<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pacientes</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para registrar un nuevo paciente
                            </p>
                            <form class="forms-sample" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="nombre">Nombres</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del paciente">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="apellido">Apellidos</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido del paciente">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="nacionalidad">Nacionalidad</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="nacionalidad" id="nacionalidad">
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
                                                <input type="text" name="doc_ide" class="form-control" id="doc_ide" placeholder="Documento de identidad del paciente">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="fec_nac">Fecha de Nacimiento</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="fec_nac" class="form-control" id="fec_nac" placeholder="Fecha de Nacimiento del paciente">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="telefono">Teléfono</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono del paciente">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="sexo">Sexo</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="sexo" id="sexo">
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
                                                <input type="text" name="direccion" class="form-control" id="direcciones" placeholder="Direccion del paciente">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="numero_paciente">Número del paciente</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="numero_paciente" class="form-control" id="numero_paciente" placeholder="Número del paciente">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_PACIENTE">Añadir</button>
                                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  