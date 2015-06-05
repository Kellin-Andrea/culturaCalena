<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createTipoDocumentoValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo tipoDocumento.
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
          $nombre = request::getInstance()->getPost(tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true));
          
      
           
          validator::validateInsert($nombre);


//        if (strlen($tipoDocumento) > tipoDocumentoTableClass::NOMBRE_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => tipoDocumentoTableClass::NOMBRE_LENGTH)), 00001);
//        }

        $data = array(
        tipoDocumentoTableClass::NOMBRE => $nombre
        );
        tipoDocumentoTableClass::insert($data);
         session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
        routing::getInstance()->redirect('tipoDocumento', 'index');
      } else {
        routing::getInstance()->redirect('tipoDocumento', 'index');
      }
        } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}