<?php
require_once('modelo.php');


class usuarios extends modeloCredencialesBD{

    //Construct

    public function __construct()
    {
        parent::__construct();
    }

   //Methods
    //Función que envía dos parámetros al procedimiento almacenado
    public function validar_usuario($usr,$pwd){
        $instruccion = "CALL sp_validar_usuario('".$usr."','".$pwd."')";
        
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

        if($resultado){
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
