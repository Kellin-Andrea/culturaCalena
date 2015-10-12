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
  class createTipoDocumentoValidatorClass extends validatorClass {

    public static function validateInsert($nombre) {
      $flag = false;

      if (self::notBlank($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre de tipo documento es obligatorio', 'inputname');
      } else if (is_numeric($nombre)) {
        $flag = true;
        session::getInstance()->setFlash('inputnameEvent', true);
        session::getInstance()->setError('El nombre de tipo documento no puede ser númerico', 'inputname');
      } else if (strlen($nombre) > \tipoDocumentoTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre de tipo documento excede los caracteres  permitidos', 'inputname');
      } else if (self::isUnique(\tipoDocumentoTableClass::ID, true, array(\tipoDocumentoTableClass::NOMBRE => trim($nombre)), \tipoDocumentoTableClass::getNameTable())) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El tipoDocumento digitado ya existe', 'inputname');
      } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim($nombre))) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('Por favor digite un tipo docume válido', 'inputname');
      
        
      }



      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        //request::getInstance()->addParamGet(array('id' => 12));
        routing::getInstance()->forward('tipoDocumento', 'insert');
      }
    }

  }

}