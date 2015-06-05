<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of createEventoValidatorClass
   *
   * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
   */
  class editCategoriaValidatorClass extends validatorClass {

    public static function validateEdit($nombre,$id) {
      $flag = false;
      
      if (self::notBlank($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre de la categoria es obligatorio', 'inputname');
      } else if (is_numeric($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre de la categoria no puede ser númerico', 'inputname');
      } else if(strlen($nombre) > \categoriaTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre de la categoria excede los caracteres  permitidos', 'inputname');
      }
      
    

      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\categoriaTableClass::ID => $id));
        routing::getInstance()->forward('categoria', 'edit');
      }
    }

  }

}