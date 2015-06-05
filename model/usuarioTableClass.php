<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * @description: En esta clase se manejara las consultas que tengar quever con la tabla  
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al modelo  es la Table .
 */
class usuarioTableClass extends usuarioBaseTableClass {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $lines, $where .
     */
    public static function getTotalpages($lines, $where) {
        try {
            $sql = 'SELECT count (' . usuarioTableClass::ID . ') AS cantidad ' .
                    'FROM ' . usuarioTableClass::getNameTable() .
                    ' WHERE  ' . usuarioTableClass::DELETED_AT . ' IS NULL';



            if (is_array($where) === true) {
                foreach ($where as $fields => $value) {
                    if (is_array($value)) {
                        $sql = $sql . '  AND  ' . $fields . '  BETWEEN  ' . ((is_numeric($value[0])) ? $value[0] : " '$value[0]' ") . 'AND' . ((is_numeric($value[1])) ? $value[1] : " '$value[1]' ");
                    }//end if 
                    else {
                        $sql = $sql . '  AND   ' . $fields . '  =  ' . ((is_numeric($value)) ? $value : " '$value' ");
                    }//end else
                }//end foreach
            }//end  if

            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return ceil($answer[0]->cantidad / $lines);
        }//end try
        catch (PDOException $exc) {
            throw $exc;
        }//end catch
    }

//end function

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $usuario, $password .
     */
    public static function verifyUser($usuario, $password) {
        try {
            $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' as credencial,
	' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
	' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' as id_usuario
    FROM ' . usuarioTableClass::getNameTable() . ' LEFT JOIN ' . usuarioCredencialTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID) . '
    LEFT JOIN ' . credencialTableClass::getNameTable() . ' ON ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::CREDENCIAL_ID) . '
    WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' = :actived
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
    AND ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . ' IS NULL
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
            $params = array(
                ':user' => $usuario,
                ':pass' => md5($password),
                ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer : false;
         }//end try 
        catch (PDOException $exc) {
            throw $exc;
        }//end catch
    }// end function

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $usuario, $password,$apellido,$correo,$genero,$fecha_nacimiento,$nombre,$tipo,$orga .
     */
    public static function verifyDatos($usuario, $password, $apellido, $correo, $genero, $fecha_nacimiento, $nombre, $tipo, $orga) {
        try {
            $sql = 'SELECT  ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
                       ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' as password,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO) . ' as apellido,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO) . ' as correo,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO) . ' as genero,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO) . ' as fecha,
                       ' . localidadTableClass::getAll(localidadTableClass::NOMBRE) . ' as nombre,
                       ' . tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE) . ' as tipo, 
                       ' . organizacionTableClass::getAll(organizacionTableClass::NOMBRE) . ' as orga    
                     FROM  ' . usuarioTableClass::getNameTable() . 'LEFT JOIN ' . datoUsuarioTableClass::getNameTable() . 'ON' . usuarioTableClass::getNameField(usuarioTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::USUARIO_ID) . ''
                    . 'LEFT JOIN' . localidadTableClass::getNameTable() . 'ON' . localidadTableClass::getNameField(localidadTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID) . 'LEFT JOIN' .
                    tipoDocumentoTableClass::getNameTable() . 'ON' . tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID) . 'LEFT JOIN' .
                    organizacionTableClass::getNameTable() . 'ON' . organizacionTableClass::getNameField(organizacionTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID) . '
                     WHERE  ' . usuarioTableClass::DELETED_AT . '  IS  NULL '
                    . 'AND ' . usuarioTableClass::ID . ' =  :id';


            $params = array(
                ':user' => $usuario,
                ':pass' => md5($password),
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':genero' => $genero,
                ':fecha' => $fecha_nacimiento,
                ':nombre' => $nombre,
                ':tipo' => $tipo,
                ':orga' => $orga,
                ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer : false;
        }//end try 
        catch (PDOException $exc) {
            throw $exc;
        }//end catch
    }//end function

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: $id .
     */
    public static function setRegisterLastLoginAt($id) {
        try {
            $sql = 'UPDATE ' . usuarioTableClass::getNameTable() . '
              SET ' . usuarioTableClass::LAST_LOGIN_AT . ' = :last_login_at
              WHERE ' . usuarioTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id,
                ':last_login_at' => date(config::getFormatTimestamp())
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            return true;
        }//end try  
        catch (PDOException $exc) {
            throw $exc;
        }//end catch
    }//end function

}//end class
