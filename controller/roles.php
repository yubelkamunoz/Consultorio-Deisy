<?php
include("model/roles.php");
$conexion = require("model/conexion.php");

$objRoles = new roles($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$roles = $objRoles->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_ROL':
            $arrayValidaciones = [];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objRoles->insert($_POST['tipo_rol']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-roles.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_ROL':
            if (!empty($_POST['id_rol'])) {
                $id = $_POST['id_rol'];
                $respuesta = $objRoles->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-roles.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
        case 'EDIT_ROL':
            $id = $_GET['id_rol'];
            $respuesta = $objRoles->edit($id, $_POST['new_tipo_rol']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-roles.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
