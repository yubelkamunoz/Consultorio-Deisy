<?php

class citas
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    public function delete($idCita)
    {
        return $this->conexion->query("DELETE FROM `citas` WHERE id_cita='$idCita'");
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM `citas`");
    }

    public function insert($direccion, $fecha_hora, $nombre_responsable, $numero_responsable)
    {
        return $this->conexion->query(" INSERT INTO `citas`(`direccion`, `fecha_hora`, `nombre_responsable`, `numero_responsable`) VALUES ('$direccion','$fecha_hora','$nombre_responsable','$numero_responsable')");
    }
    public function edit($idCita, $newDireccion, $new_Fecha, $newNombre, $newNumero)
    {
        return $this->conexion->query("UPDATE citas SET id_cita ='$idCita', direccion ='$newDireccion', fecha_hora ='$new_Fecha', nombre_responsable ='$newNombre', numero_responsable ='$newNumero' WHERE citas.id_cita = '$idCita'");
    }

    public function validarExistenciaFecha($fecha_hora)
    {
        $existe = $this->conexion->query("SELECT * FROM `citas` WHERE `fecha_hora`='$fecha_hora'");
        return !$existe->fetch_object() ? true : false;
    }
}
