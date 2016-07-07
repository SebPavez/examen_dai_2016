<?php
namespace dao;
include ('postulantedao.php');



/**
 * Description of PostulanteDAOImplementado
 *
 * @author sebpa
 */
class PostulanteDAOImplementado implements PostulanteDAO  {
    
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

    public function agregarPostulante(\dto\Postulante $nuevoPostulante){
        $conexion = new ConexionPDO();
             
        try {                  
            
            $n_rut = trim($nuevoPostulante->getRut());                      
            $n_nombre = trim($nuevoPostulante->getNombre());
            $n_aPaterno = trim($nuevoPostulante->getApellido_paterno());
            $n_aMaterno = trim($nuevoPostulante->getApellido_materno());
            $n_nacimiento = $nuevoPostulante->getF_nacimiento();
            $n_sexo = $nuevoPostulante->getSexo();
            $n_fono = $nuevoPostulante->getFono();
            $n_nivel_ed = $nuevoPostulante->getNivel_educacional();
            $n_mail = $nuevoPostulante->getE_mail();
            $n_direccion = $nuevoPostulante->getDireccion();
            $n_comuna = $nuevoPostulante->getComuna();
            $n_exp_laboral = $nuevoPostulante->getExperiencia_laboral();            
            $n_pass= trim($nuevoPostulante->getPass());
            $query = "INSERT INTO postulante VALUES("
                    . "'$n_rut',"
                    . "'$n_aPaterno',"
                    . "'$n_aMaterno',"
                    . "'$n_nacimiento',"
                    . "'$n_sexo',"
                    . "'$n_fono',"
                    . "'$n_nivel_ed',"
                    . "'$n_mail',"
                    . "'$n_direccion',"
                    . "'$n_comuna',"
                    . "'$n_exp_laboral',"
                    . "'$n_pass"
                    . ")";
            $statement = $conexion->query($query);                        
            if($statement != false){
                $row = $statement->fetchObject();            
                return array(true, $row);
            }else{
                return false;
            }
            $resultado = $statement->fetch();                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
            return false;
            
        }
    }
    
    
    public function ingresarPostulante($id_postulante, $pass) {
        $conexion = new ConexionPDO();
             
        try {                  
            
            $n_id_ejecutivo = trim($id_postulante);           
            $n_pass = trim($pass);            
            $query = "SELECT * FROM postulante WHERE rut = '$n_id_ejecutivo' and contraseña='$n_pass' ";
            $statement = $conexion->query($query);                        
            if($statement != false){
                $row = $statement->fetchObject();            
                return array(true, $row);
            }else{
                return false;
            }
            $resultado = $statement->fetch();                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
            return false;
            
        }
    }

    public function modificarPostulante(\dto\Postulante $postulante) {
        $conexion = new ConexionPDO();             
        try {                  
            
            $apaterno_ejecutivo = trim($postulante->getApellido_paterno());            
            $amaterno_ejecutivo = trim($postulante->getApellido_materno());            
            $nombre_ejecutivo = trim($postulante->getNombre());            
            $id_ejecutivo = $this->validarRut(trim($postulante->getRut()));        
            $pass = trim($postulante->getPass());
            
            $query = "UPDATE postulante SET (?),(?),(?),(?)) where rut = (?)";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $pass);
            $statement->bindValue(2, $nombre_ejecutivo);
            $statement->bindValue(3, $apaterno_ejecutivo);
            $statement->bindValue(4, $amaterno_ejecutivo);
            $statement->bindValue(5, $id_ejecutivo);
            $resultado = $statement->execute();             
                       
        } catch (Exception $exc) {            
            echo $exc->getMessage();
            $resultado = false;
        } finally {
            return $resultado;
        }
    }
    
    

}