<?php
include("recibos.php");
$conexion = require("../../../model/conexion.php");

$objRecibos = new recibos($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$recibos = $objRecibos->get();
$listPac = $objRecibos->listPac();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_RECIBOS':
            $respuesta = $objRoles->insert($_POST['tipo_rol']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-roles.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}

?>
