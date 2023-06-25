<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recibos</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para realizar recibos
              </p>
              <form class="forms-sample" method="POST">
                <!-- PACIENTE -->
                <?php foreach ($listPac as $value) { ?>
                  <div class="form-group">
                    <label for="text">Paciente</label><br>
                    <select class="js-example-basic-single" name="paciente" data-iduser="<?php echo $value['id_paciente'] ?>" id="paciente">
                      <?php foreach ($listPac as $number_pac => $pac) { ?>
                        <option value="<?php echo $pac['id_paciente'] ?>" <?php if ($value['nombre'] == $pac['nombre']) echo 'selected'; ?>>
                          <?php echo ($pac['documento_identidad']) ?>
                          <?php echo ($pac['nombre']) ?>
                          <?php echo ($pac['apellido']) ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } ?>
                <!-- EMPLEADO -->
                <?php foreach ($listEmp as $value) { ?>
                  <div class="form-group">
                    <label for="text">Empleados</label>
                    <select class="form-control" name="empleado" data-iduser="<?php echo $value['id_empleado'] ?>" id="empleado">
                      <?php foreach ($listEmp as $number_emp => $emp) { ?>
                        <option value="<?php echo $emp['id_empleado'] ?>" <?php if ($value['cargo'] == $emp['cargo']) echo 'selected'; ?>>
                          <?php echo ($emp['documento_identidad']) ?>
                          <?php echo ($emp['cargo']) ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } ?>

                <!-- EMPLEADO -->
                <!--                 <?php //foreach ($listEmp as $value) { 
                                      ?>
                  <div class="form-group">
                    <label for="text">Empleados . .</label>
                    <select class="js-example-basic-single" name="empleado" data-iduser="<?php //echo $value['id_empleado'] 
                                                                                          ?>" id="empleado">
                      <?php //foreach ($listEmp as $number_emp => $emp) { 
                      ?>
                        <option value="<?php //echo $emp['id_empleado'] 
                                        ?>" <?php //if ($value['nombre'] == $emp['nombre']) echo 'selected'; 
                                                                            ?>>
                          <?php //echo ($emp['documento_identidad']) 
                          ?>
                          <?php //echo ($emp['nombre']) 
                          ?>
                          <?php //echo ($emp['apellido']) 
                          ?>
                        </option>
                      <?php //} 
                      ?>
                    </select>
                  </div>
                <?php //} 
                ?> -->
                <div class="form-group">
                  <label for="direccion">Número de Recibo</label>
                  <input type="text" name="numero_recibo" class="form-control" id="numero_recibo" placeholder="Número de Recibo">
                </div>
                <div class="form-group">
                  <label for="fecha">Fecha</label>
                  <input type="datetime-local" name="fecha" class="form-control" id="fecha" placeholder="Fecha del recibo">
                </div>
                <div class="form-group">
                  <label for="precio">Costo total del servicio prestado</label>
                  <div class="input-group">
                    <input type="text" name="precio" class="form-control" id="precio" placeholder="Ingrese el monto en dólares">
                    <div class="input-group-append">
                      <span class="input-group-text">USD</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="concepto">Concepto</label>
                  <input type="text" name="concepto" class="form-control" id="concepto" placeholder="Concepto del recibo">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_RECIBO">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- TERMINA FORMULARIO -->
        <!-- COMIENZA TABLA -->
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Citas</h4>
              <p class="card-description">
                Citas Disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre del paciente</th>
                      <th>Apellido del paciente</th>
                      <th>DNI del paciente</th>
                      <th>Dirección del paciente</th>
                      <th>Empleado</th>
                      <th>Número del recibo</th>
                      <th>Fecha y hora del recibo</th>
                      <th>Costo total</th> 
                      <th>Concepto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- AQUI VA EL WHILE -->
                    <?php
                    while ($recibo = $recibos->fetch_object()) { ?>
                      <tr>
                        <td><?= $recibo->id_recibo ?></td>
                        <td><?= $recibo->nombre ?></td>
                        <td><?= $recibo->apellido ?></td>
                        <td><?= $recibo->documento_identidad ?></td>
                        <td><?= $recibo->direccion?></td>
                        <td><?= $recibo->cargo ?></td>
                        <td><?= $recibo->numero_recibo?></td>
                        <td><?= $recibo->fecha ?></td>
                        <td><?= $recibo->precio ?> USD</td>
                        <td><?= $recibo->concepto ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_recibo" value="<?php echo $recibo->id_recibo?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_RECIBO" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-recibos.php?id_recibo=<?php echo $recibo->id_recibo ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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
        <!-- TERMINA TABLA -->
      </div>
    </div>
  </div>
</body>































<!-- AQUI ESTA EL UNICO SELECT CON BUSCADOR ORIGINAL DE LA PLANTILLA QUE SIRVE EN ESTE SISTEMA -->
<!-- <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion del paciente">
              </div> 
              <h4 class="card-title">Select 2</h4>
              <div class="form-group">
                <label>Single select box using select 2</label>
                <select class="js-example-basic-single w-100">
                  <option value="AL">Alabama</option>
                  <option value="WY">Wyoming</option>
                  <option value="AM">America</option>
                  <option value="CA">Canada</option>
                  <option value="RU">Russia</option>
                </select>
              </div>
            </div>
          </div>
        </div> -->