<?php

    require "connect_db.php";

    class BusquedaElementos extends Conexion {

        public function __construct(){
            parent::__construct();
        }

        public function getElementos() {

            $resultado = $this->conexion_db->query("SELECT * FROM articulos");
            $elementos = $resultado->fetch_all(MYSQLI_ASSOC);
            
            return $elementos;
            
        }
    }

?>