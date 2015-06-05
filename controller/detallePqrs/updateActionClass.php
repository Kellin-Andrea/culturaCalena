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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id= request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::ID, true));
     

        $ids = array(
            detallePqrsTableClass::ID => $id
        );

        $data = array(
            detallePqrsTableClass::RESPUESTA => $id,
          
        );

        detallePqrsTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('detallePqrs', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
