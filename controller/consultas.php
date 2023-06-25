<?php

include("model/consultas.php");
$conexion = require("model/conexion.php");

$objConsultas = new consultas($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$idPaciente = empty($_REQUEST['id_paciente']) ? '' : $_REQUEST['id_paciente'];

$idConsulta = $_GET['id_consulta'];
if ($idPaciente) {
    $consultas = $objConsultas->get($idPaciente);
};

$show = $objConsultas->show();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_CONSULTA':
            $arrayValidaciones = [
                'Peso del paciente es requerido' => !empty($_POST['peso']),
                'El peso del paciente no debe incluir letras' => is_numeric($_POST['peso']),
                'El peso del paciente debe ser menor de 6 caracteres' => strlen($_POST['peso']) < 6,
                'La unidad del peso es requerido' => !empty($_POST['unidad_peso']),
                'Talla del paciente es requerido' => !empty($_POST['talla']),
                'La talla del paciente no debe incluir letras' => is_numeric($_POST['talla']),
                'La talla del paciente debe ser menor de 6 caracteres' => strlen($_POST['talla']) < 6,
                'La unidad de la talla es requerido' => !empty($_POST['unidad_talla']),
                'Presión arterial del paciente es requerido' => !empty($_POST['presion_arterial']),
                'La presión arterial del paciente no debe incluir letras' => is_numeric($_POST['presion_arterial']),
                'La presión arterial del paciente debe ser menor de 6 caracteres' => strlen($_POST['presion_arterial']) < 8,
                'Diagnostico del paciente es requerido' => !empty($_POST['diagnostico']),
                'Tratamiento del paciente es requerido' => !empty($_POST['tratamiento']),
                'Próxima consulta del paciente es requerido' => !empty($_POST['proxima_consulta']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };

            $respuesta = $objConsultas->insert($_POST['id_paciente'], $_POST['peso'], $_POST['unidad_peso'], $_POST['talla'], $_POST['unidad_talla'], $_POST['presion_arterial'], $_POST['diagnostico'], $_POST['tratamiento'], $_POST['prox_con']);
            if (true) {
                header("Location: /sistema-consultorio-deysy/show-historial.php?id_paciente=" . $_POST['id_paciente']);
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_CONSULTA':

            if (!empty($_POST['id_consulta'])) {
                $idConsulta = $_POST['id_consulta'];
                $respuesta = $objConsultas->delete($idConsulta);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-historial.php?id_paciente=" . $_POST['id_paciente']);
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_CONSULTA':
            $arrayValidaciones = [
                'La fecha de la consulta es requerido' => !empty($_POST['new_fecha']),
                'Peso del paciente es requerido' => !empty($_POST['new_peso']),
                'El peso del paciente no debe incluir letras' => is_numeric($_POST['new_peso']),
                'El peso del paciente debe ser menor de 6 caracteres' => strlen($_POST['new_peso']) < 6,
                'La unidad del peso es requerido' => !empty($_POST['new_upeso']),
                'Talla del paciente es requerido' => !empty($_POST['new_talla']),
                'La talla del paciente no debe incluir letras' => is_numeric($_POST['new_talla']),
                'La talla del paciente debe ser menor de 6 caracteres' => strlen($_POST['new_talla']) < 6,
                'La unidad de la talla es requerido' => !empty($_POST['new_utalla']),
                'Presión arterial del paciente es requerido' => !empty($_POST['new_presion']),
                'La presión arterial del paciente no debe incluir letras' => is_numeric($_POST['new_presion']),
                'La presión arterial del paciente debe ser menor de 6 caracteres' => strlen($_POST['new_presion']) < 8,
                'Diagnostico del paciente es requerido' => !empty($_POST['new_diagnostico']),
                'Tratamiento del paciente es requerido' => !empty($_POST['new_tratamiento']),
                'Próxima consulta del paciente es requerido' => !empty($_POST['new_proxima_consulta']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_consulta'];
            $respuesta = $objConsultas->edit($id, $_POST['new_fecha'], $_POST['new_peso'], $_POST['new_upeso'], $_POST['new_talla'], $_POST['new_utalla'], $_POST['new_presion'], $_POST['new_diagnostico'], $_POST['new_tratamiento'], $_POST['new_proxima_consulta']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-historial.php?id_paciente=" . $_POST['id_paciente']);
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
