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
class eventoTableClass extends eventoBaseTableClass {

  public static function getNombreById($id) {
    try {
      $sql = 'SELECT nombre AS nombre ' .
              'FROM ' . eventoTableClass::getNameTable() .
              ' WHERE  ' . eventoTableClass::ID . ' = :id';

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
      $sql = 'SELECT count (' . eventoTableClass::ID . ') AS cantidad ' .
              'FROM ' . eventoTableClass::getNameTable() . ' ' .
              ' WHERE ' . eventoTableClass::DELETED_AT . ' IS NULL ';

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

  public static function getEventoProfile($id) {
    try {


      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' ,' . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::USUARIO_ID . ' = '
              . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID .
              ' AND ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . $id .
              ' AND evento.deleted_at IS NULL';


      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getEventoReport($idCate, $fechaIni, $fechaFinal) {
    try {


      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' ' . 'AS evento' . ','
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO . ','
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_PUBLICACION . ','
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_PUBLICACION . ','
              . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . '=' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              'AND' . ' ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . $idCate .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CREATED_AT . ' ' .
              'BETWEEN' . ' ' . "'$fechaIni'" . ' ' . 'AND' . ' ' . "'$fechaFinal'";


      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getEventoReportCosto($fechaIni2, $fechaFinal2) {
    try {

//        //
//
//
//SELECT  count(evento.id) as eventos, SUM(costo)as costo, categoria.nombre 
//FROM evento, categoria
//where
//evento.categoria_id=categoria.id
//
//and fecha_Inicial_publicacion between '2015-04-01' and '2015-04-30'
//GROUP BY categoria.nombre


      $sql = 'SELECT COUNT(' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ') AS CONTEO' . ','
              . ' ' . 'SUM(' . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ') AS Costo' . ','
              . ' ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE . ' ' .
              'FROM' . '  ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() . ' ' .
              'WHERE' . ' ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_PUBLICACION . ' ' .
              'BETWEEN' . ' ' . "'$fechaIni2'" . ' ' . 'AND' . ' ' . "'$fechaFinal2'" . ' ' .
              'GROUP BY' . ' ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE;





      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getTotalProyect($lines) {
    try {
      $sql = 'SELECT count(' . eventoTableClass::ID . ') AS cantidad '
              . 'FROM ' . eventoTableClass::getNameTable() .
              ' WHERE ' . eventoTableClass::DELETED_AT . ' IS NULL'.
              ' AND NOW() BETWEEN fecha_inicial_publicacion AND fecha_final_publicacion' ;
//      print_r($sql);
//      exit();

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getTotalProyectCategoria($lines, $idCategoria) {
    try {
      $sql = 'SELECT count(' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ') AS cantidad '
              . 'FROM ' . eventoTableClass::getNameTable() . ', ' . categoriaTableClass::getNameTable() .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . ' IS NULL' .
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' = ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID .
              ' AND NOW() BETWEEN fecha_inicial_publicacion AND fecha_final_publicacion'.
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' = ' . $idCategoria;
//      print_r($sql);
//      exit();

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getEventTotal($id) {
    try {



      $sql = 'SELECT COUNT(' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ') AS CONTEO' . ' ' .
              'FROM' . '  ' . eventoTableClass::getNameTable() . ' , ' . usuarioTableClass::getNameTable() . ' ' .
              'WHERE' . ' ' . usuarioTableClass::getNameTable() . '.' . usuarioTableClass::ID . ' = ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::USUARIO_ID . ' ' .
              'AND' . ' ' . usuarioTableClass::getNameTable() . '.' . usuarioGustaCategoriaTableClass::ID . ' = ' . $id;




      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getCategoriaDeporte() {


    try {

      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::IMAGEN . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DIRECCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO . ' , '
              . categoriaTableClass::getNameTable() . ' . ' . categoriaTableClass::NOMBRE . ' ' .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() . ' ' .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE . ' = ' . "'Deportes'" .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . ' IS NULL ';

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }

  public static function getCategoriaMusic() {


    try {

      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::IMAGEN . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DIRECCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO . ' , '
              . categoriaTableClass::getNameTable() . ' . ' . categoriaTableClass::NOMBRE . ' ' .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() . ' ' .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE . ' = ' . "'Musica'" .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . ' IS NULL ';


      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }

  public static function getCategoriaTheatre() {


    try {

      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::IMAGEN . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DIRECCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO . ' , '
              . categoriaTableClass::getNameTable() . ' . ' . categoriaTableClass::NOMBRE . ' ' .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() . ' ' .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE . ' = ' . "'Artes'" .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . ' IS NULL ';


      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }

  public static function getCategoriaDanza() {


    try {

      $sql = 'SELECT ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ID . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::IMAGEN . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::NOMBRE . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DESCRIPCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::COSTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_INICIAL_EVENTO . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::DIRECCION . ' , '
              . eventoTableClass::getNameTable() . '.' . eventoTableClass::FECHA_FINAL_EVENTO . ' , '
              . categoriaTableClass::getNameTable() . ' . ' . categoriaTableClass::NOMBRE . ' ' .
              ' FROM ' . eventoTableClass::getNameTable() . ' , ' . categoriaTableClass::getNameTable() . ' ' .
              ' WHERE ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::CATEGORIA_ID . ' = ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::ID . ' ' .
              ' AND ' . categoriaTableClass::getNameTable() . '.' . categoriaTableClass::NOMBRE . ' = ' . "'Baile'" .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::DELETED_AT . ' IS NULL ';


      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (\PDOException $exc) {
      throw $exc;
    }
  }

  public static function getTotalpagesActived($lines, $where) {
    try {
      $sql = 'SELECT count (' . eventoTableClass::ID . ') AS cantidad ' .
              'FROM ' . eventoTableClass::getNameTable() .
              ' WHERE  ' . eventoTableClass::DELETED_AT . ' IS NULL' .
              ' AND ' . eventoTableClass::getNameTable() . '.' . eventoTableClass::ACTIVED . '= false';


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

  public static function getEventActived($limit, $offset) {
    try {
      $sql = 'SELECT evento.id, evento.nombre as evento, descripcion, categoria.nombre as categoria, user_name ' .
              ' FROM evento, categoria, usuario ' .
              ' WHERE evento.categoria_id = categoria.id ' .
              ' AND evento.usuario_id = usuario.id' .
              ' AND evento.actived = false' .
              ' AND NOW() BETWEEN fecha_inicial_publicacion AND fecha_final_publicacion AND evento.deleted_at IS NULL ' .
              ' AND evento.deleted_at IS NULL';



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

  public static function getEventProyect($limit, $offset) {
    try {
      $sql = 'SELECT evento.id, evento.nombre as evento, descripcion, categoria.nombre as categoria, 
              evento.direccion, evento.costo, evento.fecha_inicial_evento, evento.fecha_final_evento, evento.imagen, user_name ' .
              ' FROM evento, categoria, usuario ' .
              ' WHERE evento.categoria_id = categoria.id ' .
              ' AND evento.usuario_id = usuario.id' .
              ' AND evento.actived = true' .
              ' AND NOW() BETWEEN fecha_inicial_publicacion AND fecha_final_publicacion AND evento.deleted_at IS NULL ' .
              ' AND evento.deleted_at IS NULL'. ' ORDER BY evento.created_at DESC';


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

  public static function getEventProyectCategoria($limit, $offset, $idCategoria) {
    try {
      $sql = 'SELECT evento.id, evento.nombre as evento, descripcion, categoria.nombre as categoria, 
              evento.direccion, evento.costo, evento.fecha_inicial_evento, evento.fecha_final_evento, evento.imagen, user_name ' .
              ' FROM evento, categoria, usuario ' .
              ' WHERE evento.categoria_id = categoria.id ' .
              ' AND evento.usuario_id = usuario.id' .
              ' AND evento.actived = true' .
              ' AND evento.deleted_at IS NULL' .
               ' AND NOW() BETWEEN fecha_inicial_publicacion AND fecha_final_publicacion'.
              ' AND evento.categoria_id = ' . $idCategoria . ' ORDER BY evento.created_at DESC';

//      print_r($sql);
//      exit();
   
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

  public static function getEventoCategoria() {
    try {


      $sql = 'SELECT categoria.id, categoria.nombre ' .
              ' FROM categoria';
//      print_r($sql);
//      exit();

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
