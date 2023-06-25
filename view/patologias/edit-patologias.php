<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Patologia</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar patologia de su tabla
                            </p>
                            <?php
                            while ($patologia = $patologias->fetch_object()) { ?>
                                <?php
                                if ($patologia->id_patologia == $_GET['id_patologia']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" value="<?php echo $patologia->nombre ?>" name="new_nombre" class="form-control" id="nombre" placeholder="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" value="<?php echo $patologia->descripcion ?>" name="new_descripcion" class="form-control" id="descripcion" placeholder="descripcion">
                                        </div>
                                        <input type="hidden" value="<?php echo $patologia->nombre ?>" name="hidden_nombre" class="form-control" id="descripcion" placeholder="descripcion">
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_PATOLOGIA">Editar</button>
                                <button onclick=" location = 'show-patologias.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>