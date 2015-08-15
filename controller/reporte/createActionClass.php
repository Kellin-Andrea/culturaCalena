<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createTarifaValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author kelly andrea <kellinandrea18@hotmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $nombre = request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::NOMBRE, true));
                $description = request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true));



//        if (strlen($usuario) > usuarioTableClass::USER_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
//        }
                //validator::validateInsert($description,$cost);

                $data = array(
                    reporteTableClass::NOMBRE => $nombre,
                    reporteTableClass::DESCRIPCION => $description,
                );
                reporteTableClass::insert($data);
                routing::getInstance()->redirect('reporte', 'index');
            } else {
                routing::getInstance()->redirect('default', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
