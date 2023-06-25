<?php
include("model/recibos.php");
$conexion = require("model/conexion.php");

$objRecibos = new recibos($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$recibos = $objRecibos->get();
$listPac = $objRecibos->listPac();
$listEmp = $objRecibos->listEmp();

if (!empty($action)) {
    switch ($action) {

        case 'ADD_RECIBO':
            //die(var_dump($_REQUEST));
            //echo($_POST['paciente'] && $_POST['empleado'] && $_POST['numero_recibo'] && $_POST['fecha'] && $_POST['precio'] && $_POST['concepto']);
            //die();
            $respuesta = $objRecibos->insert(
                $_POST['paciente'],
                $_POST['empleado'],
                $_POST['numero_recibo'],
                $_POST['fecha'],
                $_POST['precio'],
                $_POST['concepto']
            );
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;


        case 'DELETE_RECIBO':
            $respuesta = $objRecibos->delete(
                $_POST['id_recibo']
            );
            //echo($respuesta); die();
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'borradoOcurrio un error intenten nuevamente';
            }
            break;

        case 'EDIT_RECIBO':
            $id = $_GET['id_recibo'];
            $respuesta = $objRecibos->edit($id, $_POST['new_paciente'],$_POST['new_empleado'], $_POST['new_numero_recibo'], $_POST['new_fecha'], $_POST['new_precio'], $_POST['new_concepto']);

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
