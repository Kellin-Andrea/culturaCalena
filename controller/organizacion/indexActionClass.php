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
                organizacionTableClass::ID,
                organizacionTableClass::NOMBRE,
                organizacionTableClass::CREATED_AT,
                organizacionTableClass::DIRECCION,
                organizacionTableClass::TELEFONO,
                organizacionTableClass::FAX,
                organizacionTableClass::CORREO,
                organizacionTableClass::PAGINA_WEB
            );
            $orderBy = array(
                organizacionTableClass::NOMBRE,
                   
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
            $this->cntPages = organizacionTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objorganizacion = organizacionTableClass::getAll($fields, true, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
            $this->defineView('index', 'organizacion', session::getInstance()->getFormatOutput());
       } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
