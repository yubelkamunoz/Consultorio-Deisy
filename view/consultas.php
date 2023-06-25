<body>
    <!-- Comienza info-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <!-- Comienza Tabla panes -->
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Nueva Consulta</h4>
                            <p class="card-description">
                                Agendar nueva consulta para el paciente
                            </p>
                            <div class="text-danger mt-1" <?php if ($error) ?>>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <label for="peso">Peso</label>
                                    <input type="text" name="peso" class="form-control" id="peso" placeholder="Peso del paciente">
                                </div>
                                <div class="form-group">
                                    <label for="unidad_peso">Unidad de medida del Peso</label>
                                    <select class="form-control" name="unidad_peso" id="nacionalidad">
                                        <option>Kilogramos</option>
                                        <option>Gramos</option>
                                        <!-- <option>Miligramos</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="talla">Talla</label>
                                    <input type="text" name="talla" class="form-control" id="talla" placeholder="Talla del paciente">
                                </div>
                                <div class="form-group">
                                    <label for="unidad_talla">Unidad de medida de la Talla</label>
                                    <select class="form-control" name="unidad_talla" id="nacionalidad">
                                        <option>Metros</option>
                                        <option>Centímetros</option>
                                        <!-- <option>Milímetros</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="presion_arterial">Presión Arterial</label>
                                    <div class="input-group">
                                        <input type="text" name="presion_arterial" class="form-control" id="tension" placeholder="Ejemplo: 120/80">
                                        <div class="input-group-append">
                                            <span class="input-group-text">mm Hg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="diagnostico">Diagnóstico</label>
                                    <textarea class="form-control" name="diagnostico" id="diagnostico" rows="5" placeholder="Escriba aqui el diagnostico de su paciente"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tratamiento">Tratamiento</label>
                                    <textarea class="form-control" name="tratamiento" id="tratamiento" rows="5" placeholder="Escriba aqui el tratamiento de su paciente"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="talla">Próxima Consulta</label>
                                    <input type="date" name="prox_con" class="form-control" id="prox_con" placeholder="">
                                </div>
                                <div>
                                    <blockquote class="blockquote blockquote-warning">
                                        <h4 class="card-title text-warning">Nota:</h4>
                                        <p class="text-warning"> Cada vez que añades una nueva consulta se le agrega la fecha y hora actual. Esta información será mostrada en el historial del paciente.</p>
                                    </blockquote>
                                </div>
                                <?php
                                while ($paciente = $pacientes->fetch_object()) { ?>
                                    <?php
                                    if ($paciente->id_paciente == $_GET['id_paciente']) {
                                    ?>
                                        <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                        <button type="submit" name="accion" class="btn btn-success mr-2" onclick=" location = 'show-edit-pacientes.php?id_paciente=<?php echo $paciente->id_paciente ?>'" value="ADD_CONSULTA">Añadir</button>
                                        <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Comienza Tabla panes -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Paciente <?php echo $paciente->nombre ?> <?php echo $paciente->apellido ?></h4>
                            <p class="card-description">
                                Ficha del paciente
                            </p>
                            <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <!-- <td class="py-2 mx-12">
                                        <img src="src/images/faces/face1.jpg" alt="image" />
                                    </td> --><br>
                                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                    <?php $pac = $paciente->id_paciente ?>

                                    <label for="nombre">Nombre: <?php echo $paciente->nombre ?></label>
                                    <br>
                                    <label for="apellido">Apellido: <?php echo $paciente->apellido ?></label>
                                    <br>
                                    <label for="nacionalidad">Nacionalidad: <?php echo $paciente->nacionalidad ?></label>
                                    <br>
                                    <label for="doc_ide">Documento de identidad: <?php echo $paciente->documento_identidad ?></label>
                                    <br>
                                    <label for="fec_nac">Fecha de Nacimiento: <?php echo $paciente->fecha_nacimiento ?></label>
                                    <br>
                                    <label for="telefono">Telefono: <?php echo $paciente->telefono ?></label>
                                    <br>
                                    <label for="telefono">Sexo: <?php echo $paciente->sexo ?></label>
                                    <br>
                                    <label for="telefono">Dirección: <?php echo $paciente->direccion ?></label>
                                    <br>
                                    <input type="hidden" name="doc_hidden" value="<?php echo $paciente->doc_ide ?>">
                                    <button type="button" onclick=" location = 'show-edit-pacientes.php?id_paciente=<?php echo $paciente->id_paciente ?>'" name="accion" class="btn btn-outline-warning btn-fw">Editar</button>
                            <?php }
                                }
                            ?>
                            <button onclick=" location = 'show-table-pacientes.php'" type="button" class="btn btn-outline-light btn-fw">Volver</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>