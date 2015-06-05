<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
          
          //$id = request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::ID, true));
          $respuesta = request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true));
          //$pqrs = request::getInstance()->hasPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::PQRS_ID, true));

//        if (strlen($usuario) > usuarioTableClass::USER_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
//        }

        $data = array(
            //detallePqrsTableClass::ID => $id,
            detallePqrsTableClass::RESPUESTA => $respuesta,
            //detallePqrsTableClass::PQRS_ID => $pqrs
        );
        detallePqrsTableClass::insert($data);
        routing::getInstance()->redirect('detallePqrs', 'index');
      } else {
        routing::getInstance()->redirect('detallePqrs', 'index');
      }
     } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}