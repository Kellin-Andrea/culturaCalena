<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of createestadoPqrsValidatorClass
   *
   * @author DIANA MARCELA HORMIGA <dianamarce0294@hotmail.com>
   */
  class edittipoPqrsValidatorClass extends validatorClass {

    public static function validateEdit($nombre,$id) {
      $flag = false;
      
      if (self::notBlank($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El tipo pqrsf es obligatorio', 'inputname');
      } else if (is_numeric($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El tipo pqrsf no puede ser númerico', 'inputname');
      } else if(strlen($nombre) > \tipoPqrsTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El tipo pqrsf excede los caracteres  permitidos', 'inputname');
      }
      
    

      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\tipoPqrsTableClass::ID=> $id));
        routing::getInstance()->forward('tipoPqrs', 'edit');
      }
    }

  }

}