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
  class editestadoPqrsValidatorClass extends validatorClass {

    public static function validateEdit($nombre,$id) {
      $flag = false;
      
      if (self::notBlank($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El estado pqrs es obligatorio', 'inputname');
      } else if (is_numeric($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El estado pqrs no puede ser númerico', 'inputname');
      } else if(strlen($nombre) > \estadoPqrsTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El  estado pqrs  excede los caracteres  permitidos', 'inputname');
      }
      
    

      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\estadoPqrsTableClass::ID=> $id));
        routing::getInstance()->forward('estadoPqrs', 'edit');
      }
    }

  }

}