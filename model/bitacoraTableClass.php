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
class bitacoraTableClass extends bitacoraBaseTableClass {

  public static function getTotalpages($lines, $where) {
    try {
      $sql = 'SELECT count (' . bitacoraTableClass::ID . ') AS cantidad ' .
              'FROM ' . bitacoraTableClass::getNameTable();

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

  public static function getBitacoraTotal($id) {
    try {



      $sql = 'SELECT COUNT(' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ID . ') AS CONTEO2' . ' ' .
              'FROM' . '  ' . bitacoraTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() . ' ' .
              'WHERE' . ' ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::USUARIO_ID . ' ' .
              'AND' . ' ' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION . ' = ' . "'identificación'" . ' ' .
              'AND' . ' ' . usuarioTableClass::getNameTable() . '.' . usuarioGustaCategoriaTableClass::ID . ' = ' . $id;




      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getBitacoraAccion() {
    try {



      $sql = 'SELECT ' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION .
              ' FROM' . '  ' . bitacoraTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() .
              ' GROUP BY ' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION;




      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getReportBitacora($idBitacora, $fechaIni, $fechaFinal) {
    try {

      if (empty($idBitacora)) {

        $sql = 'SELECT  COUNT (' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::USER . ') AS user_name , ' .
                bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION .
                ' FROM ' . bitacoraTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() .
                ' WHERE ' . bitacoraTableClass::getNameTable() . ' . ' . bitacoraTableClass::USUARIO_ID . ' = ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID
                . ' AND ' . bitacoraTableClass::getNameTable() . ' . ' . bitacoraTableClass::FECHA . ' BETWEEN ' . ' ' . "'$fechaIni'" . ' ' . 'AND' . ' ' . "'$fechaFinal'"
                . ' GROUP BY ' . bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION;
      } else {


        $sql = 'SELECT ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::USER . ', ' .
                bitacoraTableClass::getNameTable() . '.' . bitacoraTableClass::ACCION . ', ' .
                bitacoraTableClass::getNameTable() . '. ' . bitacoraTableClass::TABLA .
                ' FROM ' . bitacoraTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() .
                ' WHERE ' . bitacoraTableClass::getNameTable() . ' . ' . bitacoraTableClass::USUARIO_ID . ' = ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID .
                ' AND ' . bitacoraTableClass::getNameTable() . ' . ' . bitacoraTableClass::ACCION . ' = ' . "'$idBitacora'" .
                ' AND ' . bitacoraTableClass::getNameTable() . ' . ' . bitacoraTableClass::FECHA . ' BETWEEN ' . ' ' . "'$fechaIni'" . ' ' . 'AND' . ' ' . "'$fechaFinal'";
      }

    

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}

//end class

