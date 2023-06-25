<?php

class recibos
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT a.id_recibo, b.nombre, b.apellido, b.documento_identidad, b.direccion, c.cargo, a.numero_recibo, a.fecha, a.precio, a.concepto
        FROM recibos a
        INNER JOIN pacientes b ON b.id_paciente=a.id_paciente
        INNER JOIN empleados c ON c.id_empleado=a.id_empleado");
    }

    public function listPac()
    {

        $query = ("SELECT * FROM pacientes");

        return $this->conexion->query($query);
    }

    public function listEmp()
    {

        $query = ("SELECT * FROM empleados");

        return $this->conexion->query($query);
    }

    public function insert($idPaciente, $idEmpleado, $numRecibo, $fecha, $precio, $concepto)
    {
        /*         $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `recibos`(`id_paciente`, `id_empleado`,
        `numero_recibo`, `fecha`, `precio`, `concepto`) VALUES ('$idPaciente','$idEmpleado','$numRecibo','$fecha',
        '$precio','$concepto')");
        return $respuestaBaseDeDatos; */
        return $this->conexion->query("INSERT INTO `recibos`(`id_paciente`, `id_empleado`, `numero_recibo`, `fecha`, `precio`, `concepto`) VALUES ('$idPaciente','$idEmpleado','$numRecibo','$fecha','$precio','$concepto')");
    }

    public function delete($idRecibo)
    {
        //die("DELETE FROM `recibos` WHERE `id_recibo`=$idRecibo");
        return $this->conexion->query("DELETE FROM `recibos` WHERE `id_recibo`= $idRecibo");
    }

    public function edit($idRecibo, $idPaciente, $idEmpleado, $numRecibo, $fecha, $precio, $concepto){
        //die("UPDATE `recibos` SET `id_paciente`='$idPaciente',`id_empleado`='$idEmpleado',`numero_recibo`='$numRecibo',`fecha`='$fecha',`precio`='$precio',`concepto`='$concepto' WHERE recibos.id_recibo = $idRecibo");
        return $this->conexion->query("UPDATE `recibos` SET `id_paciente`='$idPaciente',`id_empleado`='$idEmpleado',`numero_recibo`='$numRecibo',`fecha`='$fecha',`precio`='$precio',`concepto`='$concepto' WHERE recibos.id_recibo = $idRecibo");
    }
}
