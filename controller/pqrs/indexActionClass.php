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
 * @category: Pertenece al controlador modulo Pqrs.
 */
class indexActionClass extends controllerClass implements controllerActionInterface {
    public function execute() {
        try {
            $where = null;
            
            $fields = array(
            pqrsTableClass::ID,
            pqrsTableClass::TITULO,
            pqrsTableClass::CONTENIDO,
            pqrsTableClass::TIPO_PQRS,
            pqrsTableClass::ESTADO_PQRS,
            );
            $orderBy = array(
            pqrsTableClass::TITULO,
                   
            );
            
            $where2 = array(
            pqrsTableClass::getNameTable().'.'. pqrsTableClass::DELETED_AT. ' IS NULL'
            );
            
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
            $this->cntPages = pqrsTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objpqrs = pqrsTableClass::getAll($fields, TRUE, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
            $this->defineView('index', 'pqrs', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }
}