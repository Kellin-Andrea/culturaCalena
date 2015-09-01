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

//  public static function getGustosProfile($idCate) {
//    try {
//
//
//      $sql = ' SELECT ' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::NOMBRE . ' ' . 'AS dato' . ','
//              . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::APELLIDO . ' , '
//              . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE .
//              ' FROM ' . datoUsuarioTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable().' , ' 
//              . usuarioGustaCategoriaTableClass::getNameTable(). ' , ' . usuarioTableClass::getNameTable().
//              ' WHERE ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . '=' . usuarioGustaCategoriaTableClass::getNameTable() . '.' . usuarioGustaCategoriaTableClass::CATEGORIA_ID.
//              ' AND ' . ' ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::USUARIO_ID. 
//              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . usuarioGustaCategoriaTableClass::getNameTable(). '.' . usuarioGustaCategoriaTableClass::USUARIO_ID. 
//              ' AND ' . usuarioGustaCategoriaTableClass::getNameTable(). '.'. usuarioGustaCategoriaTableClass::CATEGORIA_ID. ' = '.$idCate;
//
//
//
//       return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
//       
//    } catch (PDOException $exc) {
//      throw $exc;
//      
//    }
//  }

}

//end class
