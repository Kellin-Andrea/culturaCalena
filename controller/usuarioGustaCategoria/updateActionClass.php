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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::ID, true));
        $usu = request::getInstance()->getPost(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true));
        $cat = request::getInstance()->getPost(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true));

        $ids = array(
            usuarioGustaCategoriaTableClass::ID => $id
        );

        $data = array(
            usuarioGustaCategoriaTableClass::USUARIO_ID => $usu,
            usuarioGustaCategoriaTableClass::CATEGORIA_ID => $cat
        );

        usuarioGustaCategoriaTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('usuarioGustaCategoria', 'index');
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
