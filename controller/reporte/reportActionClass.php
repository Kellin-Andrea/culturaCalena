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
 * @author kelly Andrea <kellinandrea18@hotmail.com>
 */
class reportActionClass extends controllerClass implements controllerActionInterface {

  
  public function execute() {
    try {
      $fields = array(
          eventoTableClass::ID,
          eventoTableClass::NOMBRE,
          );
      $orderBy = array(
          eventoTableClass::NOMBRE
      );

      $this->objEvento = eventoTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'reporte', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
