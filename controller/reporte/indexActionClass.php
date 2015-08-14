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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

        $where = null;
        
      $fields = array(
          reporteTableClass::ID,
          reporteTableClass::NOMBRE,
          reporteTableClass::DESCRIPCION,
         
      );
      $orderBy = array(
          reporteTableClass::NOMBRE
      );
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
      $this->cntPages = reporteTableClass::getTotalpages(config::getRowGrid(), $where);
      $this->objreporte = reporteTableClass::getAll($fields, false, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
      $this->defineView('index', 'reporte', session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
