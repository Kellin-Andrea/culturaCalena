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
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
          
            $where = null;
            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                //validaciones   
                if (isset($filter['Usuario']) and $filter['Usuario'] !== null and $filter['Usuario'] !== "") {
                    $where[usuarioTableClass::USER] = $filter['Usuario'];
                }

                if (isset($filter['fechaCreacion1']) and $filter['fechaCreacion1'] !== null and $filter['fechaCreacion1'] !== "") {
                    $where[usuarioTableClass::CREATED_AT] = array(
                        date(config::getFormatTimestamp(), strtotime($filter['fechaCreacion1'] . ' 00:00:00')),
                        date(config::getFormatTimestamp(), strtotime($filter['fechaCreacion2'] . ' 23:59:59'))
                    );
                }

                session::getInstance()->setAttribute('defaultIndexFilters', $where);
            } else if (session::getInstance()->hasAttribute('defaultIndexFilters')) {
                $where = session::getInstance()->getAttribute('defaultIndexFilters');
            }
            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER,
                usuarioTableClass::PASSWORD,
                usuarioTableClass::CREATED_AT
            );

            $orderBy = array(
                usuarioTableClass::ID,
            );



            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }


            $this->cntPages = usuarioTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
            $this->defineView('index', 'usuario', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
