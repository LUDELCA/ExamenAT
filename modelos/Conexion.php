<?php

class Conexion {

    public static function poo() {
        $cnx = new mysqli("localhost", "root", "", "apuestatotal");
        return $cnx;
    }

}
