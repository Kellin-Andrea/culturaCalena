<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;
use mvc\session\sessionClass as session;    

/**
* @description: En esta clase se manejara las consultas que tengar quever con la tabla  
* @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
* @category: Pertenece al modelo  es la Table .
*/
class pqrsTableClass extends pqrsBaseTableClass {
  
    
    public static function getNombreById($id) {
      try {
          $sql = 'SELECT nombre AS nombre ' .
                    'FROM ' . pqrsTableClass::getNameTable() .
                    ' WHERE  ' . pqrsTableClass::ID . ' = :id';

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
            $sql = 'SELECT count (' . pqrsTableClass::ID . ') AS cantidad ' .
                    'FROM ' . pqrsTableClass::getNameTable(). ' ' .
                     ' WHERE '. pqrsTableClass::DELETED_AT . ' IS NULL ';
     
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
 
    
    public static function getTotalPagesPqrs($lines) {
    try {
      $sql = 'SELECT count(' . pqrsTableClass::ID . ') AS cantidad '
              . 'FROM ' . pqrsTableClass::getNameTable() .
              ' WHERE ' . pqrsTableClass::DELETED_AT . ' IS NULL' . ' AND ' . pqrsTableClass::USUARIO_ID . ' = ' . session::getInstance()->getUserId();

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

 
  public static function getPqrs($id, $limit, $offset) {

    try {

      $sql = 'SELECT ' . pqrsTableClass::getNameTable() . '.' . pqrsTableClass::ID . ' , ' .
              detallePqrsTableClass::getNameTable() . '.' . detallePqrsTableClass::RESPUESTA . ' , ' .
              pqrsTableClass::getNameTable() . '.' . pqrsTableClass::TITULO . ' , ' .
              estadoPqrsTableClass::getNameTable() . '.' . estadoPqrsTableClass::NOMBRE . ' , ' .
              usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID .
              ' FROM ' . detallePqrsTableClass::getNameTable() . ' , ' . pqrsTableClass::getNameTable() . ' , ' . estadoPqrsTableClass::getNameTable() .
              ' ,' . usuarioTableClass::getNameTable() .
              ' WHERE ' . detallePqrsTableClass::getNameTable() . '.' . detallePqrsTableClass::PQRS_ID . '=' .
              pqrsTableClass::getNameTable() . '.' . pqrsTableClass::ID .
              ' AND ' . pqrsTableClass::getNameTable() . '.' . pqrsTableClass::ESTADO_PQRS. '=' . estadoPqrsTableClass::getNameTable() . '.' .
              estadoPqrsTableClass::ID . ' AND ' . pqrsTableClass::getNameTable() . '.' . pqrsTableClass::USUARIO_ID . ' = ' .
              usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' AND ' .
              usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . $id;
     

      if ($limit !== null and $offset === null) {
        $sql = $sql . ' LIMIT ' . $limit;
      }

      if ($limit !== null and $offset !== null) {
        $sql = $sql . ' LIMIT ' . $limit . ' OFFSET ' . $offset;
      }

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }
    
        } //end class



