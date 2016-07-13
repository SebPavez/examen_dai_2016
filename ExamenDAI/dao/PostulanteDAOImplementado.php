<?php

include '../dto/postulante.php';
include '../sql/ConexionPDO.php';

class PostulanteDAOImplementado  {
    
    public function validarRut($rut_ingresado) {        
        $expression = '/^(\d{1,9})-((\d|k|K){1})$/';
        return preg_match($expression, $rut_ingresado);    
    }

    public function buscarPostulante($id_postulante) {
        $conexion = new ConexionPDO();
             
        try {                  
            
            $n_id_ejecutivo = trim($id_postulante);            
            $query = "SELECT * FROM postulante WHERE rut = '$n_id_ejecutivo'";
            $statement = $conexion->prepare($query);            
            $statement->execute();
            $resultado = $statement->fetch();                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
        } finally {
            return $resultado;
        }
    }

    public function eliminarPostulante($id_postulante) {
        $conexion = new ConexionPDO();
             
        try {                  
            
            $n_id_ejecutivo = trim($id_postulante);            
            $query = "DELETE FROM postulante WHERE rut = (?)";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $n_id_ejecutivo);
            $statement->execute();
            $resultado = true;
                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
        } finally {
            return $resultado;
        }               
    }

    public function agregarPostulante(Postulante $nuevoPostulante){       
             
        try {                  
            $conexion = new ConexionPDO();
            $n_rut = trim($nuevoPostulante->getRut());
            if (!$this->validarRut($n_rut)){
                return false;
                }            
            $n_nombre = trim($nuevoPostulante->getNombre());
            $n_aPaterno = trim($nuevoPostulante->getApellido_paterno());
            $n_aMaterno = trim($nuevoPostulante->getApellido_materno());           
            
            $n_pass= trim($nuevoPostulante->getPass());
            $query = "INSERT INTO postulante VALUES("
                    . "'$n_rut',"
                    . "'$n_nombre',"
                    . "'$n_aPaterno',"
                    . "'$n_aMaterno',"                    
                    . "'$n_pass'"
                    . ")";
            $resultado = $conexion->query($query);                        
            
        } catch (Exception $exc) {           
            echo "Error en agregarPostulante: ".$exc->getMessage();
            $resultado = false;            
        } finally {
            return $resultado;
        }
    }
    
    
    public function ingresarPostulante($id_postulante, $pass) {
        $conexion = new ConexionPDO();
             
        try {            
            
            $n_id = trim($id_postulante);           
            $n_pass = trim($pass);     
            
            $query = "SELECT rut, nombre FROM postulante WHERE rut = :rut and contraseña=:pass ";
            $statement = $conexion->prepare($query);
            $statement->bindParam(':rut', $n_id);
            $statement->bindParam(':pass', $n_pass);
            $statement->execute();
            $resultados = $statement->fetch(PDO::FETCH_ASSOC);
            
            if($statement->rowCount()>0){
                return array(true, $resultados) ;
            }else{
                return false;
            }
        } catch (Exception $exc) {            
            echo $exc->getMessage(); //mensaje para debugging
            return false;
        }
    }

    public function modificarPostulante(Postulante $postulante) {
        $conexion = new ConexionPDO();             
        try {                              
            $a_paterno = trim($postulante->getApellido_paterno());            
            $a_materno = trim($postulante->getApellido_materno());            
            $nombre = trim($postulante->getNombre());            
            $rut = $this->validarRut(trim($postulante->getRut()));        
            $pass = trim($postulante->getPass());
            
            $query = "UPDATE postulante "
                    . "SET contraseña = (?), "
                    . "nombre = (?), "
                    . "apellidoPaterno = (?), "
                    . "apellidoMaterno = (?) WHERE "
                    . "rut = (?)";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $pass);
            $statement->bindValue(2, $nombre);
            $statement->bindValue(3, $a_paterno);
            $statement->bindValue(4, $a_materno);
            $statement->bindValue(5, $rut);
            $resultado = $statement->execute();             
                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
        } finally {
            return $resultado;
        }
    }
    
    

}
