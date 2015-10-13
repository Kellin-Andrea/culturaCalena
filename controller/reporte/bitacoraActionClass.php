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
class bitacoraActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
          bitacoraTableClass::ACCION
      );

      $orderBy = array(
      bitacoraTableClass::ACCION
      );


      $this->objBitacora = bitacoraTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NUll, FALSE, FALSE);
        $this->objAccion = bitacoraTableClass::getBitacoraAccion();
////            $this->cntPages = reporteTableClass::getTotalpages(config::getRowGrid(), $where);
//            $this->objreporte = reporteTableClass::getAll($fields1, false, $orderBy, 'ASC');
      $this->defineView('bitacora', 'reporte', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
