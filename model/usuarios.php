<?php

class usuarios
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT a.id_usuario, b.nombre, c.tipo_rol, a.correo
        FROM usuarios a
        INNER JOIN empleados b ON b.id_empleado=a.id_empleado
        INNER JOIN roles c ON c.id_rol=a.id_rol");
    }

    public function listEmp()
    {

        $query = ("SELECT * FROM empleados");

        return $this->conexion->query($query);
    }

    public function listRol()
    {

        $query = ("SELECT * FROM roles");

        return $this->conexion->query($query);
    }
    
    public function insert($empleado, $rol, $correo ,$password)
    {
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `usuarios`(`id_empleado`, `id_rol`, `correo`, `contrasena`) VALUES ('$empleado','$rol','$correo','$password')");
        return $respuestaBaseDeDatos;

        // if ($respuestaBaseDeDatos) {
        //     return 'Proceso Exitoso';
        // } else {
        //     return 'Ocurrio un error';
        // }
    }

    public function delete($idUsuario)
    {
        return $this->conexion->query("DELETE FROM usuarios WHERE id='$idUsuario'");
    }
    
    public function edit($idUsuario,$newUsuario,$email,$password)
    {
        return $this->conexion->query("UPDATE `usuarios` SET `usuario`='$newUsuario',`email`='$email',`clave`='$password' WHERE `usuarios`.`id` = '$idUsuario';");
    }
}
