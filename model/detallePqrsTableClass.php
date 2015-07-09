<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of bitacoraTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
*/
class detallePqrsTableClass extends detallePqrsBaseTableClass{
 
    
    public static function getTotalpages($lines, $where) {
        try {
            $sql = 'SELECT count (' . detallePqrsTableClass::ID . ') AS cantidad ' .
                    'FROM ' . detallePqrsTableClass::getNameTable() . ' ' .
                    ' WHERE '. detallePqrsTableClass::DELETED_AT . ' IS NULL ';
     
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
        } //end class




