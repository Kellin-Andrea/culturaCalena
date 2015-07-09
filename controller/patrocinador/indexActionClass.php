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
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = null;
            
            $fields = array(
                patrocinadorTableClass::ID,
                patrocinadorTableClass::NOMBRE,
                patrocinadorTableClass::CREATED_AT,
                patrocinadorTableClass::DIRECCION,
                patrocinadorTableClass::TELEFONO,
                patrocinadorTableClass::CORREO,
                
            );
            $orderBy = array(
                patrocinadorTableClass::ID,
                   
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
            $this->cntPages = patrocinadorTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objpatrocinador= patrocinadorTableClass::getAll($fields, true, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
            $this->defineView('index', 'patrocinador', session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}