<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Roles</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar el rol seleccionado de su tabla
                            </p>
                            <?php
                            while ($rol = $roles->fetch_object()) { ?>
                                <?php
                                if ($rol->id_rol == $_GET['id_rol']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="tipo_rol">Tipo de rol</label>
                                            <input type="text" value="<?php echo $rol->tipo_rol ?>" name="new_tipo_rol" class="form-control" id="tipo_rol" placeholder="Ingrese nuevo rol">
                                        </div>
                                        <div>
                                            <blockquote class="blockquote blockquote-warning">
                                                <h4 class="card-title text-warning">Nota:</h4>
                                                <p class="text-warning"> Comuniquese con el desarrolador para poder realizar acciones en este módulo.</p>
                                            </blockquote>
                                        </div>
                                <?php }
                            }
                                ?>
                                <!-- <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_ROL">Editar</button> -->
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="">Editar</button>
                                <button onclick=" location = 'show-roles.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>