<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editTarifaValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author kelly Andrea <kellinandrea18@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::ID, true));
                $nombre = request::getInstance()->getPost(reporteTableClass::getNameField(reporteBaseTableClass::NOMBRE, true));
                $description = request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true));
                


                //validator::validateEdit($description, $cost, $id);

                $ids = array(
                    reporteTableClass::ID => $id
                );

                $data = array(
                    reporteTableClass::NOMBRE => $nombre,
                    reporteTableClass::DESCRIPCION => $description
                );

                reporteTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('reporte', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
