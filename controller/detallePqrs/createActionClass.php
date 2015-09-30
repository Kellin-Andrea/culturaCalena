<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
 use\mvc\validator\createDetallePqrsValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $respuesta = request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true));


        validator::validateInsert($respuesta);

        $data = array(
            detallePqrsTableClass::RESPUESTA => $respuesta,
        );
        detallePqrsTableClass::insert($data);
        routing::getInstance()->redirect('detallePqrs', 'index');
        session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
        
      } else {
        routing::getInstance()->redirect('detallePqrs', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
