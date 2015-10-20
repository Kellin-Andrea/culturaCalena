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
  public static function getNombreById($id) {
    try {
      $sql = 'SELECT user_name AS user_name ' .
              'FROM ' . usuarioTableClass::getNameTable() .
              ' WHERE  ' . usuarioTableClass::ID . ' = :id';

      $params = array(
          ':id' => $id
      );

      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->user_name;
    } //end try
    catch (PDOException $exc) {
      throw $exc;
    }//end cath
  }

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

      public static function getTotalpagesActived($lines, $where) {
    try {
      $sql = 'SELECT count (' . usuarioTableClass::ID . ') AS cantidad ' .
              'FROM ' . usuarioTableClass::getNameTable() .
              ' WHERE  ' . usuarioTableClass::DELETED_AT . ' IS NULL' .
              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ACTIVED . '= false';



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
  public static function getCategoria($id) {


    try {

      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::IMAGEN . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , ' .
              eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DIRECCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO .
              ' FROM ' . eventoTableClass::getNameTable() . ' JOIN ' . categoriaTableClass::getNameTable() . ' ON ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' , ' . usuarioGustaCategoriaTableClass::getNameTable() .
              ' WHERE ' . usuarioGustaCategoriaTableClass::getNameTable() . '.' . usuarioGustaCategoriaTableClass::CATEGORIA_ID . '=' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' . ' '
              . 'AND' . ' ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . '  IS  NULL '
              . 'AND' . ' ' . usuarioGustaCategoriaTableClass::getNameTable() . '.' . usuarioGustaCategoriaTableClass::USUARIO_ID . '=' . $id;






      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
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
  }

// end function

  /**
   * @author: 
   * Shirley Marcela Rivero <marce250494@hotmail.com>
   * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
   * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
   * @return datatype description: Array $usuario, $password,$apellido,$correo,$genero,$fecha_nacimiento,$nombre,$tipo,$orga .
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
  }

//end function
//    SELECT a.id, a.user_name, (b.nombre || ' ' || b.apellido) AS nombre, c.nombre AS organizacion
//FROM usuario AS a, dato_usuario AS b, organizacion AS c
//WHERE a.id = b.usuario_id
//AND c.id = b.organizacion_id
//AND a.actived = false
//AND a.updated_at IS NULL
//AND a.deleted_at IS NULL
//AND b.deleted_at IS NULL
//AND c.deleted_at IS NULL
//ORDER BY a.created_at ASC

  public static function getUserActived($limit, $offset) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ', ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::USER . ', ' .
              '(' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::NOMBRE . ' || \' \' || ' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::APELLIDO . ') AS nombre ' . ', ' .
              organizacionTableClass::getNameTable() . '.' . organizacionTableClass::NOMBRE . ' AS organizacion ' .
              ' FROM ' . usuarioTableClass::getNameTable() . ', ' . datoUsuarioTableClass::getNameTable() . ', ' . organizacionTableClass::getNameTable() .
              ' WHERE ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . '= ' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::USUARIO_ID .
              ' AND ' . organizacionTableClass::getNameTable() . '.' . organizacionTableClass::ID . '= ' . datoUsuarioTableClass::getNameTable() . '. ' . datoUsuarioTableClass::ORGANIZACION_ID .
              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ACTIVED . '= false' .
              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::UPDATED_AT . ' IS NULL' .
              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::DELETED_AT . ' IS NULL' .
              ' AND ' . datoUsuarioTableClass::getNameTable() . '.' . datoUsuarioTableClass::DELETED_AT . ' IS NULL' .
              ' AND ' . organizacionTableClass::getNameTable() . '.' . organizacionTableClass::DELETED_AT . ' IS NULL' .
              ' ORDER BY ' . usuarioTableClass::getNameTable() . '. ' . usuarioTableClass::CREATED_AT . ' ASC';


      if ($limit !== null and $offset === null) {
        $sql = $sql . ' LIMIT ' . $limit;
      }

      if ($limit !== null and $offset !== null) {
        $sql .= ' LIMIT ' . $limit . ' OFFSET ' . $offset;
      }

      $answer = model::getInstance()->query($sql);
      $answer->execute();
      return $answer->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }

}

//end class
