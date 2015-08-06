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

                $description = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true));
                $cost = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::VALOR, true));



//        if (strlen($usuario) > usuarioTableClass::USER_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
//        }


                validator::validateInsert($description,$cost);
                
                $data = array(
                    tarifaTableClass::DESCRIPCION => $description,
                    tarifaTableClass::VALOR => $cost
                );
                tarifaTableClass::insert($data);
                routing::getInstance()->redirect('tarifa', 'index');
            } else {
                routing::getInstance()->redirect('default', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
