<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createusuarioGustaCategoriaValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $usu = request::getInstance()->getPost(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true));
                $cat = request::getInstance()->getPost(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true));



//        if (strlen($usuario) > usuarioTableClass::USER_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
//        }
                validator::validateInsert($cat, $usu);

                $data = array(
                    usuarioGustaCategoriaTableClass::USUARIO_ID => $usu,
                    usuarioGustaCategoriaTableClass::CATEGORIA_ID => $cat
                );
                usuarioGustaCategoriaTableClass::insert($data);
                routing::getInstance()->redirect('usuarioGustaCategoria', 'index');
            } else {
                routing::getInstance()->redirect('usuarioGustaCategoria', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
