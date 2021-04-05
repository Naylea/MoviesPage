<?php

require_once('modelo.php');

class peliculas extends modeloCredencialesBD{
	protected $id;
	protected $pregunta;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function consultar_peliculas(){
		$instruccion = "CALL sp_listar_peliculas()";
		
		$consulta=$this->_db->query($instruccion);
		$resultado=$consulta->fetch_all(MYSQLI_ASSOC);
		
	if(!$resultado){
		echo "Fallo al consultar las peliculas";
		
		}
	else{
		return $resultado;
		$resultado->close();
		$this->_db->close();
	}
	}
	
	public function agregar_pelicula($pelicula1,$sinopsis1,$review1,$puntuacion1){
		$nombre=$_FILES['imagen1']['name'];
        $guardado=$_FILES['imagen1']['tmp_name'];

        if(!file_exists('imgP')){
            mkdir('imgP',0777,true);
            if(file_exists('imgP')){
                if(move_uploaded_file($guardado, 'imgP/'.$nombre)){
                    echo "Archivo guardado con exito";
                }else{
                    echo "Archivo no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($guardado, 'imgP/'.$nombre)){
                echo "";
            }else{
                echo "";
            }
        }
        
        $sql="CALL agregar_pelicula('".$pelicula1."','".$sinopsis1."','".$review1."','".$puntuacion1."','".$nombre."')";
        
        $resultado=$this->_db->query($sql);
        

			return $resultado;
			$resultado->close();
			$this->_db->close();
	
    }


   public function eliminA($id){
	   $sql= "delete from peliculas where id = '".$id."'";
	   $resultado=$this->_db->query($sql);
	   
	   if(!$resultado){
		   
		   echo "fallo al eliminar";
		}
   }
   
   public function actualizar_peliculas($id,$pelicula1,$sinopsis1,$review1,$puntuacion1){
	   
		
		$sql="UPDATE peliculas SET pelicula ='".$pelicula1."',sinopsis='".$sinopsis1."',review='".$review1."',puntuacion='".$puntuacion1."' where id='".$id."'";
		
		$resultado=$this->_db->query($sql);
		if(!$resultado){
			echo "fallo actualizacion de pregunta";
		}else{
			return $resultado;
			$resultado->close();
			$this->_db->close();
			
		
	}
}
public function subir_puntuacion($puntuacion,$id){
		
	$sql="UPDATE peliculas SET Puntuacion ='".$puntuacion."' where id='".$id."'";
	
	$resultado=$this->_db->query($sql);

	if(!$resultado){
		echo "fallo ingreso de pregunta";
	}else{
		return $resultado;
		$resultado->close();
		$this->_db->close();
		
	
}
}
}
?>