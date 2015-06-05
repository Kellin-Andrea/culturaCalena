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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                eventoTableClass::ID,
                eventoTableClass::NOMBRE
            );
            $ordeBy = array(
                eventoTableClass::NOMBRE
            );
            $fields1 = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER
            );
            $ordeBy1 = array(
                usuarioTableClass::USER
            );
            $fields2 = array(
                tarifaTableClass::ID,
                tarifaTableClass::DESCRIPCION
            );
            $ordeBy2 = array(
                tarifaTableClass::DESCRIPCION
            );
            $this->objevento = eventoTableClass::getAll($fields, true, $ordeBy, 'ASC');
            $this->objUsuarios = usuarioTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
            $this->objtarifa = tarifaTableClass::getAll($fields2, true, $ordeBy2, 'ASC');
            $this->defineView('insert', 'recaudoEconomico', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
