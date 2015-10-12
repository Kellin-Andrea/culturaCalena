<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editUserValidatorClass as validator;


/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
        $user = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $pass1 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true). '_1');
        $pass2 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2');

        $ids = array(
            usuarioTableClass::ID => $id
        );
        
        validator::validateEdit($user, $pass1, $pass2);

        $data = array(
            usuarioTableClass::USER => $user,
            usuarioTableClass::PASSWORD => md5($pass1),
        );

        usuarioTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('usuario', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
