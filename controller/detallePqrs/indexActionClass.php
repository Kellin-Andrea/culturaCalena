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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
          detallePqrsTableClass::ID,
          detallePqrsTableClass::RESPUESTA,
          
          detallePqrsTableClass::USUARIO_ID,
          detallePqrsTableClass::CREATED_AT
      );
      $orderBy = array(
          detallePqrsTableClass::ID
      );
      $this->objdetalle = detallePqrsTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'detallePqrs', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
