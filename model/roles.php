<?php
        
        class roles
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM `roles`");
    }

    public function insert($tipo_rol)
    {
        return $this->conexion->query("INSERT INTO `roles`(`tipo_rol`) VALUES ('$tipo_rol')");
    }
    public function delete($idRol)
    {
        return $this->conexion->query("DELETE FROM `roles` WHERE `id_rol`='$idRol'");
    }
    public function edit($idRol,$new_tipo_rol)
    {
        /* die("UPDATE `roles` SET nombre ='$new_tipo_rol' WHERE roles.id_rol =$idRol"); */
        return $this->conexion->query("UPDATE `roles` SET tipo_rol ='$new_tipo_rol' WHERE roles.id_rol =$idRol");
    }


}