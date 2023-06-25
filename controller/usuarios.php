<?php
include("model/usuarios.php");
$conexion = require("model/conexion.php");

$objUsuarios = new usuarios($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];

$usuarios = $objUsuarios->get();
$listEmp = $objUsuarios->listEmp();
$listRol = $objUsuarios->listRol();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_USUARIO':
            $arrayValidaciones = [
                /* 'Nombre del usuario es requerido' => !empty($_POST['name_usuario']),
                'El nombre del usuario debe de tener mas de 3 caracteres'  => strlen($_POST['name_usuario']) > 3,
                'El nombre del usuario no debe tener numeros'  => ctype_alpha($_POST['name_usuario']), */
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objUsuarios->insert($_POST['empleado'], $_POST['rol'], $_POST['correo'], password_hash($_POST['contrasena'], PASSWORD_DEFAULT));

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-usuarios.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_USUARIO':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $respuesta = $objUsuarios->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-usuarios.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }


        case 'EDIT_USUARIO':
            if (!empty($_GET['id']) && !empty($_POST['new_usu']) && !empty($_POST['new_ema'])) {
                $id = $_GET['id'];
                $clave = empty($_POST['new_pass']) ? $_POST['current_pass'] : password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
                $respuesta = $objUsuarios->edit($id, $_POST['new_usu'], $_POST['new_ema'], $clave);


                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-usuarios.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
    }
}
