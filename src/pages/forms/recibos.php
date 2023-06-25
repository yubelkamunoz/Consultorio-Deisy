<?php

class recibos
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM `recibos`");
    }

    public function listPac(){
        
        $query = ("SELECT * FROM pacientes");
        
        return $this->conexion->query($query);
    }
}