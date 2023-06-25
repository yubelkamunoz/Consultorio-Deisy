<?php
include("model/citas.php");
$conexion = require("model/conexion.php");

$objCitas = new citas($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$citas = $objCitas->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_CITA':
            $arrayValidaciones = [

                'La dirección del paciente es requerido' => !empty($_POST['direccion']),
                'La dirección del paciente no debe incluir números' => !is_numeric($_POST['direccion']),
                'La dirección del paciente debe de tener más de 3 caracteres' => strlen($_POST['direccion']) > 3,
                'La fecha y hora de la cita del paciente es requerido' => !empty($_POST['fecha_hora']),
                'El nombre del responsable de la cita es requerido' => !empty($_POST['nombre_responsable']),
                'El nombre del responsable de la cita no debe incluir números' => !is_numeric($_POST['nombre_responsable']),
                'El nombre del responsable de la cita debe de tener más de 2 caracteres' => strlen($_POST['nombre_responsable']) > 2,
                'El número del responsable de la cita es requerido' => !empty($_POST['numero_responsable']),
                'El número del responsable de la cita no debe incluir letras' => is_numeric($_POST['numero_responsable']),
                'El número del responsable de la cita debe de tener más de 9 caracteres' => strlen($_POST['numero_responsable']) > 9,
                'La fecha y hora de la cita ya esta ocupada' => $objCitas->validarExistenciaFecha($_POST['fecha_hora']),
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objCitas->insert(($_POST['direccion']), $_POST['fecha_hora'],  $_POST['nombre_responsable'], $_POST['numero_responsable']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-citas.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_CITA':
            if (!empty($_POST['id_cita'])) {
                $id = $_POST['id_cita'];
                $respuesta = $objCitas->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-citas.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_CITA':
            //die(var_dump($_REQUEST));
            $arrayValidaciones = [

                'La dirección del paciente es requerido' => !empty($_POST['new_direccion']),
                'La dirección del paciente no debe incluir números' => !is_numeric($_POST['new_direccion']),
                'La dirección del paciente debe de tener más de 3 caracteres' => strlen($_POST['new_direccion']) > 3,
                'La fecha y hora de la cita del paciente es requerido' => !empty($_POST['new_fecha']),
                'El nombre del responsable de la cita es requerido' => !empty($_POST['new_nombre']),
                'El nombre del responsable de la cita no debe incluir números' => !is_numeric($_POST['new_nombre']),
                'El nombre del responsable de la cita debe de tener más de 2 caracteres' => strlen($_POST['new_nombre']) > 2,
                'El número del responsable de la cita es requerido' => !empty($_POST['new_numero']),
                'El número del responsable de la cita no debe incluir letras' => is_numeric($_POST['new_numero']),
                'El número del responsable de la cita debe de tener más de 9 caracteres' => strlen($_POST['new_numero']) > 8,
                //'La fecha y hora de la cita ya esta ocupada' => $_POST ['fecha_hidden'] == $_POST['new_fecha'] ? true : $objCitas->validarExistenciaFecha($_POST['new_fecha']),
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            
            $id = $_GET['id_cita'];
            $respuesta = $objCitas->edit($id, $_POST['new_direccion'], $_POST['new_fecha'], $_POST['new_nombre'], $_POST['new_numero']);
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-citas.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
