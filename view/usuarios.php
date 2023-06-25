<body>
  <!-- Comienza Formulario usuarios-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Usuarios</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para registrar un nuevo usuario
              </p>
              <form class="forms-sample" method="POST">
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
                <!-- ROL -->
                <?php foreach ($listRol as $value) { ?>
                  <div class="form-group">
                    <label for="text">Roles</label>
                    <select class="form-control" name="rol" data-iduser="<?php echo $value['id_rol'] ?>" id="rol">
                      <?php foreach ($listRol as $number_rol => $rol) { ?>
                        <option value="<?php echo $rol['id_rol'] ?>" <?php if ($value['tipo_rol'] == $rol['tipo_rol']) echo 'selected'; ?>>
                          <?php echo ($rol['tipo_rol']) ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" name="correo" class="form-control" id="correo" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                  <label for="contrasena">Contraseña</label>
                  <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_USUARIO">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla usuarios -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Usuarios</h4>
              <p class="card-description">
                Usuarios Activos
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Empleado</th>
                      <th>Rol</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($usuario = $usuarios->fetch_object()) { ?>
                      <tr>
                        <td><?= $usuario->id_usuario ?></td>
                        <td><?= $usuario->nombre  ?></td>
                        <td><?= $usuario->tipo_rol ?></td>
                        <td><?= $usuario->correo ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id" value="<?php echo $usuario->id_usuario ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_USUARIO" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-usuarios.php?id=<?php echo $usuario->id_usuario ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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