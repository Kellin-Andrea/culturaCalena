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

        $where = null;
        
      $fields = array(
      recaudoEconomicoTableClass::ID,
      recaudoEconomicoTableClass::USUARIO_ID,
      recaudoEconomicoTableClass::EVENTO_ID,
      recaudoEconomicoTableClass::OBSERVACION,
      recaudoEconomicoTableClass::TARIFA_ID,
      recaudoEconomicoTableClass::VALOR_TOTAL,
      recaudoEconomicoTableClass::VALOR_PARCIAL,
      recaudoEconomicoTableClass::CREATED_AT
      );
      $orderBy = array(
      recaudoEconomicoTableClass::USUARIO_ID
      );
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
      $this->cntPages = recaudoEconomicoTableClass::getTotalpages(config::getRowGrid(), $where);
      $this->objrecaudoEconomico = recaudoEconomicoTableClass::getAll($fields, true, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
      $this->defineView('index', 'recaudoEconomico', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
