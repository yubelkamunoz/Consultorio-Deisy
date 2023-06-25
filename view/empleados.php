<body>
  <!-- Comienza Formulario panes-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Empleados</h4>
              <div class="text-danger mt-1">
                <div class="text-danger mt-1" ?php if ($error) ?>
                  <?php
                  echo $error
                  ?>
                </div>
              </div>
              <p class="card-description">
                Formulario para añadir empleados a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="nombre">Nombre del empleado</label>
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del empleado">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido del empleado</label>
                  <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese el apellido del empleado">
                </div>
                <div class="form-group">
                  <label for="nacionalidad">
                    Nacionalidad</label>
                  <select class="form-control" name="nacionalidad" id="nacionalidad">
                    <option>Venezolano (a)</option>
                    <option>Colombiano (a)</option>
                    <option>Extranjero (a)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="documento de identidad">Documento de identidad</label>
                  <input type="text" name="identidad" class="form-control" id="identidad" placeholder="Ingrese el documento de identidad del empleado ">
                </div>
                <div class="form-group">
                  <label for="cargo">
                    Cargo</label>
                  <select class="form-control" name="cargo" id="cargo">
                    <option>Doctor (a)</option>
                    <option>Secretario (a)</option>
                    <option>Enfermero (a)</option>
                    <option>Ayudante (a)</option>
                    <option>Cajero (a)</option>
                    <option>Conductor (a)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                  <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento">
                </div>
                <div class="form-group">
                  <label for="sexo">Sexo</label>
                  <select class="form-control" name="sexo" id="sexo">
                    <option>Masculino</option>
                    <option>Femenino</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="direccion">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="telefono">
                </div>
                <div class="form-group">
                  <label for="rif">Rif</label>
                  <input type="text" name="rif" class="form-control" id="rif" placeholder="rif">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_EMPLEADO">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla empleados -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Registro de Empleados</h4>
              
              <div class="row">
                <div class="col-lg-6">
                <p class="card-description">
                Empleados Activos
              </p>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                  <button type="button" onclick=" location = 'reports/report_empleados.php'" name="accion" class="btn btn-info mr-2" value="REPORT_PDF">Generar Reporte</button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Nacionalidad</th>
                      <th>Documento de identidad</th>
                      <th>Cargo</th>
                      <th>Fecha de Nacimiento</th>
                      <th>Sexo</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Rif</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($empleado = $empleados->fetch_object()) { ?>
                      <tr>
                        <td><?= $empleado->id_empleado ?></td>
                        <td><?= $empleado->nombre ?></td>
                        <td><?= $empleado->apellido ?></td>
                        <td><?= $empleado->nacionalidad ?></td>
                        <td><?= $empleado->documento_identidad ?></td>
                        <td><?= $empleado->cargo ?></td>
                        <td><?= $empleado->fecha_nacimiento ?></td>
                        <td><?= $empleado->sexo ?></td>
                        <td><?= $empleado->direccion ?></td>
                        <td><?= $empleado->telefono ?></td>
                        <td><?= $empleado->rif ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_empleado" value="<?php echo $empleado->id_empleado ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_EMPLEADO" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>

                              <button onclick=" location = 'show-edit-empleados.php?id_empleado=<?php echo $empleado->id_empleado ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
                                <i class="mdi mdi-lead-pencil"></i>


                          </form>
                        </td>
                      </tr>

                    <?php }
                    ?>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>