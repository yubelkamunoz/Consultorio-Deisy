<?php

class patologias
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM `patologias`");
    }

    public function insert($nombre, $descripcion)
    {
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `patologias`(`nombre`, `descripcion`) VALUES ('$nombre','$descripcion')");
        return $respuestaBaseDeDatos;

        return $this->conexion->query(" INSERT INTO `patologia`(`nombre`, `descripcion`) VALUES ('$nombre','$descripcion')");
    }


    public function delete($idPatologia)
    {
        return $this->conexion->query("DELETE FROM `patologias` WHERE  `id_patologia`='$idPatologia'");
    }


    public function edit($idPatologia, $nombre, $descripcion)
    {
        return $this->conexion->query("UPDATE `patologias` SET `nombre`='$nombre', `descripcion`='$descripcion' WHERE patologias.id_patologia = $idPatologia");

    }

    public function validarExistenciaPatologia($nombre)
    {
        $existe = $this->conexion->query("SELECT * FROM `patologias` WHERE `nombre`='$nombre'");
        return !$existe->fetch_object() ? true : false;
    }
}
