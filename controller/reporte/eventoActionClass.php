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
class eventoActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fields = array(
                categoriaTableClass::ID,
                categoriaTableClass::NOMBRE,
                
            );

////        $where = null;
////        
////         
////            if (request::getInstance()->hasPost('filter')) {
////                $filter = request::getInstance()->getPost('filter');
////                //validaciones   
////                if (isset($filter['Evento']) and $filter['Evento'] !== null and $filter['Evento'] !== "") {
////                    $where[eventoTableClass::CATEGORIA_ID] = $filter['Evento'];
////                }
////
////                if (isset($filter['fechaPublicacion1']) and $filter['fechaPublicacion1'] !== null and $filter['fechaPublicacion1'] !== "") {
////                    $where[eventoTableClass::FECHA_INICIAL_PUBLICACION] = array(
////                        date(config::getFormatTimestamp(), strtotime($filter['fechaPublicacion1'] . ' 00:00:00')),
////                        date(config::getFormatTimestamp(), strtotime($filter['fechaPublicacion2'] . ' 23:59:59'))
////                    );
////                }
////
////                session::getInstance()->setAttribute('defaultIndexFilters', $where);
////            } else if (session::getInstance()->hasAttribute('defaultIndexFilters')) {
////                $where = session::getInstance()->getAttribute('defaultIndexFilters');
////            }
////        
//      $fields1 = array(
//          reporteTableClass::ID,
//          reporteTableClass::NOMBRE,
//          reporteTableClass::DESCRIPCION,
//         
//      );
//      $orderBy = array(
//          reporteTableClass::NOMBRE
//      );
////      $page = 0;
////            if (request::getInstance()->hasGet('page')) {
////                $this->page = request::getInstance()->getGet('page');
////                $page = request::getInstance()->getGet('page') - 1;
////                $page = $page * config::getRowGrid();
////            }
            $this->objCategoria2 = categoriaTableClass::getAll($fields);
////            $this->cntPages = reporteTableClass::getTotalpages(config::getRowGrid(), $where);
//            $this->objreporte = reporteTableClass::getAll($fields1, false, $orderBy, 'ASC');
            $this->defineView('evento', 'reporte', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
