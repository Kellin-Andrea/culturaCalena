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
class usuarioGustaCategoriaTableClass extends usuarioGustaCategoriaBaseTableClass {

  public static function getTotalpages($lines, $where) {
    try {
      $sql = 'SELECT count (' . usuarioGustaCategoriaTableClass::ID . ') AS cantidad ' .
              'FROM ' . usuarioGustaCategoriaTableClass::getNameTable();

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

  public static function getNombreById($id) {
    try {
      $sql = 'SELECT nombre AS nombre ' .
              'FROM ' . usuarioCredencialTableClass::getNameTable() .
              ' WHERE  ' . usuarioCredencialTableClass::USUARIO_ID . ' = :id';

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

}

//end class
