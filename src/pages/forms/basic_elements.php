<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema Panificadora</title>
  <link rel="stylesheet" href="src/vendors/feather/feather.css">
  <link rel="stylesheet" href="src/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="src/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/vendors/select2/select2.min.css">
  <script src="src/js/hoverable-collapse.js"></script>
  <link rel="stylesheet" href="src/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="src/images/logo.png" />
  <script src="src/vendors/js/vendor.bundle.base.js"></script>
  <script src="src/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="src/vendors/select2/select2.min.js"></script>
  <script src="src/js/off-canvas.js"></script>
  <script src="src/js/hoverable-collapse.js"></script>
  <script src="src/js/template.js"></script>
  <script src="src/js/settings.js"></script>
  <script src="src/js/todolist.js"></script>
  <script src="src/js/file-upload.js"></script>
  <script src="src/js/typeahead.js"></script>
  <script src="src/js/select2.js"></script>
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>





<!-- Comienza Sidebar -->













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
        Formulario para añadir recibos a su tabla
      </p>
      <form class="forms-sample" method="POST">
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion del paciente">
        </div>
        <div class="form-group">
          <label for="fecha">Fecha de la cita y hora de la cita </label>
          <input type="datetime-local" name="fecha_hora" class="form-control" id="fecha_hora" placeholder="Fecha de la cita y hora de la cita">
        </div>
        <div class="form-group">
          <label for="nombre_responsable">Nombre del responsable</label>
          <input type="text" name="nombre_responsable" class="form-control" id="nombre_responsable" placeholder="Nombre del responsable">
        </div>
        <div class="form-group">
          <label for="numero_responsable">Numero del responsable</label>
          <input type="text" name="numero_responsable" class="form-control" id="numero_responsable" placeholder="Numero del responsable">
        </div>

        <?php foreach ($listPac as $value) { ?>
          <div class="form-group">
            <label for="text">Paciente</label>
            <select class="js-example-basic-single w-100" name="paciente" data-iduser="<?php echo $value['id_paciente'] ?>" id="paciente">
              <?php foreach ($listPac as $number_pac => $pac) { ?>
                <option value="<?php echo $pac['id_paciente'] ?>" <?php if ($value['nombre'] == $pac['nombre']) echo 'selected'; ?>> <?php echo strtoupper($pac['nombre']) ?> </option>
              <?php } ?>
            </select>
          </div>
        <?php } ?>

        <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_CITA">Añadir</button>
        <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
      </form>
    </div>
  </div>
</div>
















<div class="container-scroller">

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
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
  </div>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
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
  </div>
</div>








<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="../../vendors/select2/select2.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../js/file-upload.js"></script>
<script src="../../js/typeahead.js"></script>
<script src="../../js/select2.js"></script>
<!-- End custom js for this page-->















<!-- nuevas -->

<script src="src/vendors/select2/select2.min.js"></script>
<script src="src/js/select2.js"></script>
<!-- End custom js for this page-->

</html>