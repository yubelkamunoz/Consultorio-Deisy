<body>
    <!-- Comienza Formulario editar usuarios-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Usuarios</h4>
                            <p class="card-description">
                                Formulario para modificar usuarios de su tabla
                            </p>
                            <?php
                            while ($usuario = $usuarios->fetch_object()) { ?>
                                <?php
                                if ($usuario->id == $_GET['id']){
                                ?>
                                <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <label for="nombreusuario">Usuario</label>
                                    <input type="text" value="<?php echo $usuario->usuario ?>" name="new_usu" class="form-control" id="nombreusuario" placeholder="Nombre del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" value="<?php echo $usuario->email ?>" name="new_ema" class="form-control" id="email" placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="new_pass" class="form-control" id="password" placeholder="Contraseña">
                                </div>
                                <input type="hidden" value="<?php echo $usuario->clave ?>" name="current_pass" class="form-control" id="current_pass" placeholder="Contraseña">
                                
                            <?php }}
                            ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_USUARIO">Editar</button>
                                <button onclick=" location = 'show-usuarios.php'" type="button" class="btn btn-light">Volver</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>