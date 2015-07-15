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
 * @author Kelly Manzano <kellinandrea18@hotmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(eventoPatrocinadorTableClass::ID)) {


                $fields = array(
                    eventoPatrocinadorTableClass::ID,
                    eventoPatrocinadorTableClass::PATROCINADOR_ID,
                    eventoPatrocinadorTableClass::EVENTO_ID
                );
                $where = array(
                    eventoPatrocinadorTableClass::ID => request::getInstance()->getRequest(eventoPatrocinadorTableClass::ID)
                );
                
                $this->objEventoPatrocinador = eventoPatrocinadorTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'eventoPatrocinador', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('eventoPatrocinador', 'index');
            }
//   
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
