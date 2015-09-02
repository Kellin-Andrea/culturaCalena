<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createtipoPqrsValidatorClass as validator;
/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
          
          $nombre = request::getInstance()->getPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true));
          
      

//        if (strlen($tipoDocumento) > tipoDocumentoTableClass::NOMBRE_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => tipoDocumentoTableClass::NOMBRE_LENGTH)), 00001);
//        }

          
          validator::validateInsert($nombre);
          
        $data = array(
            tipoPqrsTableClass::NOMBRE => $nombre
        );
        tipoPqrsTableClass::insert($data);
         session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
        routing::getInstance()->redirect('tipoPqrs', 'index');
      } else {
        routing::getInstance()->redirect('tipoPqrs', 'index');
      }
        } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}