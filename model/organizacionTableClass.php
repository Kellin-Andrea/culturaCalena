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
class organizacionTableClass extends organizacionBaseTableClass {
  
     public static function getNombreById($id) {
      try {
          $sql = 'SELECT nombre AS nombre ' .
                    'FROM ' . organizacionTableClass::getNameTable() .
                    ' WHERE  ' . organizacionTableClass::ID . ' = :id';

            $params = array(
                ':id' => $id
            );

            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->nombre;
      } //end try
      catch (PDOException $exc) {
          throw $exc;
      }//end cath
    }
    
    public static function getTotalpages($lines, $where) {
        try {
            $sql = 'SELECT count (' . organizacionTableClass::ID . ') AS cantidad ' .
                    'FROM ' . organizacionTableClass::getNameTable(). ' ' .
                     ' WHERE '. organizacionTableClass::DELETED_AT . ' IS NULL ';
     
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



