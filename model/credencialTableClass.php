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
class credencialTableClass extends credencialBaseTableClass {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $id .
     */

    public static function getTotalpages($lines, $where) {
        try {
            $sql = 'SELECT count (' . credencialTableClass::ID . ') AS cantidad ' .
                    'FROM ' . credencialTableClass::getNameTable() . ' ' .
                    'WHERE '. credencialTableClass::DELETED_AT . ' IS NULL ';
     
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
        



    
    public static function getNameCredencial($id) {
        try {

            $sql = 'SELECT  ' . credencialTableClass::NOMBRE . ' AS nombre '
                    . 'FROM  ' . credencialTableClass::getNameTable() . ' '
                    . 'WHERE  ' . credencialTableClass::DELETED_AT . '  IS  NULL '
                    . 'AND ' . credencialTableClass::ID . ' =  :id';

            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer [0]->nombre;
        }//end try 
        catch (PDOException $exc) {
            throw $exc;
        }//end catch
    }//end function

}//end class
