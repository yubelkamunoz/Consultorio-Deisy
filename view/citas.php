<body>
  <!-- Comienza Formulario-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Citas</h4>
              <div class="text-danger mt-1">
                <div class="text-danger mt-1" ?php if ($error) ?>
                  <?php
                  echo $error
                  ?>
                </div>
              </div>
              <p class="card-description">
                Formulario para registrar citas 
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion del paciente">
                </div>
                <div class="form-group">
                  <label for="fecha">Fecha y hora de la cita </label>
                  <input type="datetime-local" name="fecha_hora" class="form-control" id="fecha_hora" placeholder="Fecha de la cita y hora de la cita">
                </div>
                <div class="form-group">
                  <label for="nombre_responsable">Nombre del responsable</label>
                  <input type="text" name="nombre_responsable" class="form-control" id="nombre_responsable" placeholder="Nombre del responsable">
                </div>
                <div class="form-group">
                  <label for="numero_responsable">Número del responsable</label>
                  <input type="text" name="numero_responsable" class="form-control" id="numero_responsable" placeholder="Numero del responsable">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_CITA">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Registro de Citas</h4>
              <p class="card-description">
                Citas Actuales
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Dirección</th>
                      <th>Fecha y hora de la cita</th>
                      <th>Nombre del responsable</th>
                      <th>Número del responsable</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($cita = $citas->fetch_object()) { ?>
                      <tr>
                        <td><?= $cita->id_cita ?></td>
                        <td><?= $cita->direccion ?></td>
                        <td><?= $cita->fecha_hora ?></td>
                        <td><?= $cita->nombre_responsable ?></td>
                        <td><?= $cita->numero_responsable ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_cita" value="<?php echo $cita->id_cita ?>">

                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_CITA" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>

                              <button onclick=" location = 'show-edit-citas.php?id_cita=<?php echo $cita->id_cita ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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