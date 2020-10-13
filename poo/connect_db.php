<?php

    require ("config_db.php");

    class Conexion {

        protected $conexion_db;
        
        // Constructor
        public function __construct() {
            
            
            $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
            
            if ($this->conexion_db->connect_errno){

                echo "No se puede conectar a la base de datos. <br>" . $this->conexion_db->connect_errno;
                return;
            }

            $this->conexion_db->set_charset(DB_CHARSET);
            
        }
        
    }


?>