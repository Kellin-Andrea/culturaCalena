<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo categoria .
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = null;

            $fields = array(
                categoriaTableClass::ID,
                categoriaTableClass::NOMBRE,
                categoriaTableClass::CREATED_AT
            );
            $orderBy = array(
                categoriaTableClass::NOMBRE
            );

            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }


            $this->cntPages = categoriaTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objcategoria = categoriaTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
            $this->defineView('index', 'categoria', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
