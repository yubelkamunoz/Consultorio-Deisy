<?php



class utils
{
    public function validarFormatoFecha($fecha)
    {

        $valores = explode('-', $fecha);

        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0]) && $valores[0] > 1600) {
            return true;
        }
        return false;
    }

    public function validarString($string)
    {
        return preg_match("/^[\pL\s]*$/u", $string);
    }
}
