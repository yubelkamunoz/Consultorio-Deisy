<?php
include("model/patologias.php");
$conexion = require("model/conexion.php");

$objPatologias = new patologias($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$patologias = $objPatologias->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_PATOLOGIA':
            $arrayValidaciones = [
                'Nombre de la patologia es requerido' => !empty($_POST['nombre']),
                'El nombre de la patologia debe de tener mas de 2 caracteres' => strlen($_POST['nombre']) > 2,
                'Descripcion de la patologia es requerido' => !empty($_POST['descripcion']),
                'La descripcion de la patologia debe de tener mas de 3 caracteres' => strlen($_POST['descripcion']) > 3,
                'El nombre de la patologia ya existe' => $objPatologias->validarExistenciaPatologia($_POST['nombre']),

            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objPatologias->insert($_POST['nombre'], $_POST['descripcion']);
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-patologias.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
        case 'DELETE_PATOLOGIA':
            if (!empty($_POST['id_patologia'])) {
                $id = $_POST['id_patologia'];
                $respuesta = $objPatologias->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-patologias.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }
            break;

        case "EDIT_PATOLOGIA":

            $arrayValidaciones = [
                'Nombre de la patologia es requerido' => !empty($_POST['new_nombre']),
                'El nombre de la patologia debe de tener mas de 2 caracteres' => strlen($_POST['new_nombre']) > 2,
                'Descripcion de la patologia es requerido' => !empty($_POST['new_descripcion']),
                'La descripcion de la patologia debe de tener mas de 3 caracteres' => strlen($_POST['new_descripcion']) > 3,
                'El nombre de la patologia ya existe' => $_POST['hidden_nombre'] ==  $_POST['new_nombre'] ? true : $objPatologias->validarExistenciaPatologia($_POST['new_nombre']),

            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_patologia'];
            $respuesta = $objPatologias->edit($id, $_POST['new_nombre'], $_POST['new_descripcion']);

            // revisamos la respuesta de la base de datos
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-patologias.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            /*
        case 'EDIT_EMPLEADO':

            $arrayValidaciones = [
                'Ah ocurrido un error' =>  !empty($_GET['id_empleado']),
                'El nombre es requerido' =>  !empty($_POST['new_nombre']),
                'El nombre es requerido' =>  !empty($_POST['new_apellido']),
                'El documento es requerido' =>  !empty($_POST['new_documento']),

                'El cargo es requerido' =>  !empty($_POST['new_cargo']),
                'La fecha es requerida' =>  !empty($_POST['new_fecha_nacimiento']),
                'El sexo es requerido' =>  !empty($_POST['new_sexo']),
                'La direccion es requerida' =>  !empty($_POST['new_direccion']),
                'El telefono es requerido' =>  !empty($_POST['new_telefono']),
                'El rif es requerido' =>  !empty($_POST['new_rif']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            // aqui editamos en la base de datos
            $respuesta = $objEmpleados->edit($_GET['id_empleado'], $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_documento_identidad'], $_POST['new_cargo'], $_POST['new_fecha_nacimiento'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_telefono'], $_POST['new_rif']);

            // revisamos la respuesta de la base de datos
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-empleados.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            } */

            // if (!empty($_GET['id_empleado']) && !empty($_POST['new_nombre']) && !empty($_POST['new_apellido']) && !empty($_POST['new_documento_identidad']) && !empty($_POST['new_cargo']) && !empty($_POST['new_fecha_nacimineto']) && !empty($_POST['new_sexo']) && !empty($_POST['new_direccion']) && !empty($_POST['new_telefono']) && !empty($_POST['new_rif'])) {
            //     $id = $_GET['id_empleado'];
            //     $respuesta = $objempleado->edit($id, $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_documento_identidad'], $_POST['new_cargo'], $_POST['new_fecha_nacimiento'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_telefono'], $_POST['new_rif']);

            //     if ($respuesta) {
            //         header("Location: /sistema-consultorio-deysy/show-empleados.php");
            //     } else {
            //         $error = 'Ocurrio un error intenten nuevamente';
            //     }
            // }
            /*  break; */
    }
}
