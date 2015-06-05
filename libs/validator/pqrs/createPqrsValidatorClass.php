<?php

namespace mvc\validator {
  
  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of shfSecurityCreateUserValidationClass
   *
   * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
   */
  class createPqrsValidatorClass extends validatorClass {

    public static function validateInsert($titulo,$contenido,$tipo,$estado) {
      $flag = false;
      
      if (self::notBlank($titulo)) {
        $flag = true;
        session::getInstance()->setFlash('inputTitulo', true);
        session::getInstance()->setError('El titulo del pqrs es obligatorio', 'inputTitulo');
      } else if (is_numeric($titulo)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El titulo del pqrs no puede ser númerico', 'inputTitulo');
      } else if(strlen($titulo) > \pqrsTableClass::TITULO_LENGHT) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El titulo del pqrs excede los caracteres permitidos', 'inputTitulo');
      }
        
      if (self::notBlank($contenido )) {
        $flag = true;
        session::getInstance()->setFlash('inputContenido', true);
        session::getInstance()->setError('El contenido del pqrs es obligatorio', 'inputContenido');
      } else if (is_numeric($contenido )) {
        $flag = true;
        session::getInstance()->setFlash('inputContenido', true);
        session::getInstance()->setError('El contenido no puede ser númerico', 'inputContenido');
      } else if (strlen($contenido ) > \pqrsTableClass::CONTENIDO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputContenido', true);
        session::getInstance()->setError('El contenido excede los caracteres permitidos', 'inputContenido');
      }
     
      
      if (self::notBlank($tipo)) {
        $flag = true;
        session::getInstance()->setFlash('inputTipo', true);
        session::getInstance()->setError('Debes selecionar un tipo pqrs', 'inputTipo');
//      } else if (!self::collection(trim(request::getInstance()->getPost('inputSexo')), array('t', 'f'))) {
//        $flag = true;
//        session::getInstance()->setFlash('inputSexo', true);
//        session::getInstance()->setError('La respuesta dada no es correcta', 'inputSexo');
      }
      
      if (self::notBlank($estado)) {
        $flag = true;
        session::getInstance()->setFlash('inputEstado', true);
        session::getInstance()->setError('Debes selecionar una estado pqrs', 'inputEstado');
//      } else if (!self::collection(trim(request::getInstance()->getPost('inputSexo')), array('t', 'f'))) {
//        $flag = true;
//        session::getInstance()->setFlash('inputSexo', true);
//        session::getInstance()->setError('La respuesta dada no es correcta', 'inputSexo');
      }
     

      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('pqrs', 'insert');
      }
    }

  }

  }
