<?php
include("model/empleados.php");
$conexion = require("model/conexion.php");

$objEmpleados = new empleados($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$empleados = $objEmpleados->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_EMPLEADO':
            $arrayValidaciones = [
                'Nombre del empleado es requerido' => !empty($_POST['nombre']),
                'El nombre del empleado no debe incluir numeros' => !is_numeric($_POST['nombre']),
                'El nombre del empleado debe de tener mas de 2 caracteres' => strlen($_POST['nombre']) > 2,
                'Apellido del empleado es requerido' => !empty($_POST['apellido']),
                'El apellido del empleado no debe incluir numeros' => !is_numeric($_POST['apellido']),
                'El apellido del empleado debe de tener mas de 2 caracteres' => strlen($_POST['apellido']) > 2,
                'Nacionalidad del empleado es requerido' => !empty($_POST['nacionalidad']),
                'El documento de identidad del empleado es requerido' => !empty($_POST['identidad']),
                'El documento del empleado no debe incluir letras' => is_numeric($_POST['identidad']),
                'Debe ser el documento de identidad mayor de 6 digitos' => strlen($_POST['identidad']) > 7,
                'El documento de identidad ya pertenece a un empleado' => $objEmpleados->validarExistenciaCedula($_POST['identidad']),
                'El cargo del empleado es requerido' => !empty($_POST['cargo']),
                'La fecha de nacimiento del empleado es requerido' => !empty($_POST['fecha_nacimiento']),
                'El sexo del empleado es requerido' => !empty($_POST['sexo']),
                'La direccion del empleado es requerido' => !empty($_POST['direccion']),
                'La dirección del empleado debe de tener mas de 3 caracteres' => strlen($_POST['direccion']) > 3,
                'El ttelefono del empleado es requerido' => !empty($_POST['telefono']),
                'El número de telefono del empleado debe ser mayor de 9 digitos' => strlen($_POST['telefono']) > 9,
                'El rif del empleado es requerido' => !empty($_POST['rif']),
                'El rif del empleado no debe incluir letras' => is_numeric($_POST['rif']),
                'El rif del empleado debe ser mayor de 7 digitos' => strlen($_POST['rif']) > 7,

            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objEmpleados->insert($_POST['nombre'], $_POST['apellido'],$_POST['nacionalidad'], $_POST['identidad'], $_POST['cargo'], $_POST['fecha_nacimiento'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono'], $_POST['rif']);
            
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-empleados.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
        case 'DELETE_EMPLEADO':
            if (!empty($_POST['id_empleado'])) {
                $id = $_POST['id_empleado'];
                $respuesta = $objEmpleados->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-empleados.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }
            break;

        case 'EDIT_EMPLEADO':
            $arrayValidaciones = [
                'El nombre del empleado es requerido' =>  !empty($_POST['new_nombre']),
                'El nombre del empleado no debe incluir numeros' => !is_numeric($_POST['new_nombre']),
                'El nombre del empleado debe de tener mas de 2 caracteres' => strlen($_POST['new_nombre']) > 2,


                'El apellido del empleado es requerido' =>  !empty($_POST['new_apellido']),
                'El apellido del empleado no debe incluir numeros' => !is_numeric($_POST['new_apellido']),
                'El apellido del empleado debe de tener mas de 2 caracteres' => strlen($_POST['new_apellido']) > 2,

                'La nacionalidad del empleado es requerido' =>  !empty($_POST['new_nacionalidad']),

                'El nombre del empleado es requerido' =>  !empty($_POST['new_documento_identidad']),
                'El documento del empleado no debe incluir letras' => is_numeric($_POST['new_documento_identidad']),
                'Debe ser el documento de identidad mayor de 7 digitos' => strlen($_POST['new_documento_identidad']) > 7,
                'El documento de identidad ya pertenece a un empleado' => $_POST['id_empleado'] ==  $_POST['new_documento_identidad'] ? true : $objEmpleados->validarExistenciaCedula($_POST['new_documento_identidad']),


                'El cargo del empleado es requerido' =>  !empty($_POST['new_cargo']),

                'La fecha de empleado del empleado es requerido' => !empty($_POST['new_fecha_nacimiento']),

                'El sexo del empleado es requerido' =>  !empty($_POST['new_sexo']),

                'La direccion del empleado es requerida' =>  !empty($_POST['new_direccion']),
                'La dirección del empleado debe de tener mas de 3 caracteres' => strlen($_POST['new_direccion']) > 3,

                'El telefono del empleado es requerido' =>  !empty($_POST['new_telefono']),
                'El telefono del empleado no debe incluir letras' => is_numeric($_POST['new_telefono']),
                'El telefono del empleado debe ser mayor de 9 digitos' => strlen($_POST['new_telefono']) > 9,

                'El rif del empleado es requerido' =>  !empty($_POST['new_rif']),
                'El rif del empleado no debe incluir letras' => is_numeric($_POST['new_rif']),
                'El rif del empleado debe ser mayor de 7 digitos' => strlen($_POST['new_rif']) > 7,
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            // aqui editamos en la base de datos
            $id = $_GET['id_empleado'];
            $respuesta = $objEmpleados->edit($id, $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_nacionalidad'],  $_POST['new_documento_identidad'], $_POST['new_cargo'], $_POST['new_fecha_nacimiento'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_telefono'], $_POST['new_rif']);
            // revisamos la respuesta de la base de datos
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-empleados.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
