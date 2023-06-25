<?php

class consultas
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($idPaciente)
    {
        return $this->conexion->query("SELECT * FROM consultas WHERE id_paciente = '$idPaciente' 
        ORDER BY consultas.fecha_consulta DESC");
    }

    public function show()
    {
        return $this->conexion->query("SELECT * FROM consultas");
    }


    public function insert($idPaciente, $peso, $unidadPeso, $talla, $unidadTalla, $tension, $diagnostico, $tratamiento, $proxCon)
    {
        return $this->conexion->query("INSERT INTO `consultas`(`id_paciente`, `peso`, `unidad_peso`, `talla`, `unidad_talla`,`presion_arterial`, `diagnostico`, `tratamiento`, `proxima_consulta`) VALUES ('$idPaciente','$peso','$unidadPeso','$talla',' $unidadTalla','$tension','$diagnostico','$tratamiento','$proxCon')");
    }

    public function delete($idConsulta)
    {
        return $this->conexion->query("DELETE FROM `consultas` WHERE `id_consulta`='$idConsulta'");
    }

    public function edit($idConsulta, $fecha_consulta, $peso, $unidad_peso, $talla, $unidad_talla, $presion_arterial, $diagnostico, $tratamiento, $proxima_consulta)
    {
        return $this->conexion->query("UPDATE `consultas` SET `fecha_consulta`='$fecha_consulta',`peso`='$peso',
        `unidad_peso`='$unidad_peso',`talla`='$talla',`unidad_talla`='$unidad_talla',`presion_arterial`='$presion_arterial',`diagnostico`='$diagnostico',`tratamiento`='$tratamiento',`proxima_consulta`='$proxima_consulta' WHERE consultas.id_consulta = '$idConsulta'");
    }

    
}
