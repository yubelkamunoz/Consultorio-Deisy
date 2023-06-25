<?php
include("model/pacientes.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objPacientes = new pacientes($conexion);
$objUtils = new utils();


$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$pacientes = $objPacientes->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_PACIENTE':
            $arrayValidaciones = [
                'Nombre del paciente es requerido' => !empty($_POST['nombre']),
                'En el nombre del paciente no debe incluir numeros' => !is_numeric($_POST['nombre']),
                'No permite numero ni carateres especiales' => $objUtils->validarString($_POST['nombre']),
                'Apellido del paciente es requerido' => !empty($_POST['apellido']),
                'En el apellido del paciente no debe incluir numeros' => !is_numeric($_POST['apellido']),
                'Nacionalidad del paciente es requerido' => !empty($_POST['nacionalidad']),
                'Documento de identidad del paciente es requerido' => !empty($_POST['doc_ide']),
                'En el documento de identidad del paciente no debe incluir letras' => is_numeric($_POST['doc_ide']),
                'El documento de identidad ya pertenece a un paciente' => $objPacientes->validarExistenciaCedula($_POST['doc_ide']),
                'Debe ser el documento de identidad  mayor de 6 digitos' => strlen($_POST['doc_ide']) > 7,
                'Fecha de nacimiento del paciente es requerido' => !empty($_POST['fec_nac']),
                "Validacion de fecha" => $objUtils->validarFormatoFecha($_POST['fec_nac']),
                'Telefono del paciente es requerido' => !empty($_POST['telefono']),
                'Sexo del paciente es requerido' => !empty($_POST['sexo']),
                'Dirección del paciente es requerido' => !empty($_POST['direccion']),
                'Número del paciente es requerido' => !empty($_POST['numero_paciente']),
                'En el número del paciente no debe incluir letras' => is_numeric($_POST['numero_paciente']),
                'El nombre del paciente debe de tener mas de 2 caracteres' => strlen($_POST['nombre']) > 2,
                'El apellido del paciente debe de tener mas de 2 caracteres' => strlen($_POST['apellido']) > 2,
                'El número de telefono del paciente debe ser mayor de 9 digitos' => strlen($_POST['telefono']) > 9,
                'La dirección del paciente debe de tener mas de 3 caracteres' => strlen($_POST['direccion']) > 3,
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objPacientes->insert($_POST['nombre'], $_POST['apellido'], $_POST['nacionalidad'], $_POST['doc_ide'], $_POST['fec_nac'], $_POST['telefono'], $_POST['sexo'], $_POST['direccion'], $_POST['numero_paciente']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-table-pacientes.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_PACIENTE':
            if (!empty($_POST['id_paciente'])) {
                $id = $_POST['id_paciente'];
                $respuesta = $objPacientes->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-pacientes.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_PACIENTE':

            /* die(var_dump($_REQUEST)); */
            $arrayValidaciones = [

                'Nombre del paciente es requerido' => !empty($_POST['new_nombre']),
                'En el nombre del paciente no debe incluir numeros' => !is_numeric($_POST['new_nombre']),
                'Apellido del paciente es requerido' => !empty($_POST['new_apellido']),
                'En el apellido del paciente no debe incluir numeros' => !is_numeric($_POST['new_apellido']),
                'Nacionalidad del paciente es requerido' => !empty($_POST['new_nacionalidad']),
                'Documento de identidad del paciente es requerido' => !empty($_POST['new_doc_ide']),
                'En el documento de identidad del paciente no debe incluir letras' => is_numeric($_POST['new_doc_ide']),
                'El documento de identidad ya pertenece a un paciente' => $_POST['doc_hidden'] ==  $_POST['new_doc_ide'] ? true : $objPacientes->validarExistenciaCedula($_POST['new_doc_ide']),
                'Fecha de nacimiento del paciente es requerido' => !empty($_POST['new_fec_nac']),
                'Telefono del paciente es requerido' => !empty($_POST['new_telefono']),
                'Sexo del paciente es requerido' => !empty($_POST['new_sexo']),
                'Dirección del paciente es requerido' => !empty($_POST['new_direccion']),
                'Número del paciente es requerido' => !empty($_POST['new_numero']),
                'En el número del paciente no debe incluir letras' => is_numeric($_POST['new_numero']),
                'El nombre del paciente debe de tener mas de 2 caracteres' => strlen($_POST['new_nombre']) > 2,
                'El apellido del paciente debe de tener mas de 2 caracteres' => strlen($_POST['new_apellido']) > 2,
                'Debe ser el documento de identidad  mayor de 6 digitos' => strlen($_POST['new_doc_ide']) > 6,
                'El número de telefono del paciente debe ser mayor de 9 digitos' => strlen($_POST['new_telefono']) > 9,
                'La dirección del paciente debe de tener mas de 4 caracteres' => strlen($_POST['new_direccion']) > 4,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_paciente'];
            $respuesta = $objPacientes->edit($id, $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_nacionalidad'], $_POST['new_doc_ide'], $_POST['new_fec_nac'], $_POST['new_telefono'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_numero']);

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-table-pacientes.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
