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
class recordarMeTableClass extends recordarMeBaseTableClass {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $hash, $ip_address .
     */
    public static function deleteSession($hash, $ip_address) {
        try {
            $sql = 'DELETE FROM ' . recordarMeTableClass::getNameTable() . '
              WHERE ' . recordarMeTableClass::HASH_COOKIE . ' = :hash
              AND ' . recordarMeTableClass::IP_ADDRESS . ' = :ip_address';
            $params = array(
                ':hash' => $hash,
                ':ip_address' => $ip_address
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            return true;
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
     * @return datatype description: Array $ip_address, $hash.
     */
    public static function getUserAndPassword($ip_address, $hash) {
        try {
            $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' AS id_usuario,
                  ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' AS usuario,
                  ' . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' AS credencial
              FROM ' . usuarioTableClass::getNameTable() . ' INNER JOIN ' . recordarMeTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . recordarMeTableClass::getNameField(recordarMeTableClass::USUARIO_ID) . '
                   INNER JOIN ' . usuarioCredencialTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID) . '
                   INNER JOIN ' . credencialTableClass::getNameTable() . ' ON ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::CREDENCIAL_ID) . '
              WHERE ' . recordarMeBaseTableClass::getNameField(recordarMeTableClass::IP_ADDRESS) . ' = :ip_address
              AND ' . recordarMeBaseTableClass::getNameField(recordarMeTableClass::HASH_COOKIE) . ' = :hash
              AND ' . usuarioBaseTableClass::getNameField(usuarioBaseTableClass::DELETED_AT) . ' IS NULL
              AND ' . usuarioBaseTableClass::getNameField(usuarioBaseTableClass::ACTIVED) . ' = :actived
              AND ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . ' IS NULL';
            $params = array(
                ':ip_address' => $ip_address,
                ':hash' => $hash,
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
     * @return datatype description: return true .
     */
    public static function clearSessions() {
        try {
            $sql = 'DELETE FROM ' . recordarMeTableClass::getNameTable() . ' WHERE localtimestamp(0) > (' . recordarMeTableClass::CREATED_AT . ' + INTERVAL :timeSeconds)';
            $params = array(
                ':timeSeconds' => config::getCookieTime() . ' seconds'
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
