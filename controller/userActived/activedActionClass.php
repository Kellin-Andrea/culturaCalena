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
class activedActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID, true));


        $ids = array(
            usuarioTableClass::ID => $id
        );
        
        $data = array(
        usuarioTableClass::ACTIVED => 't'
        );

        usuarioTableClass::update($ids, $data);

        //routing::getInstance()->redirect('default', 'index');
        $this->arrayAjax = array(
            'code' => 100,
            'msg' => 'La activacion fue exitosa'
        );
        $this->defineView('actived', 'userActived', session::getInstance()->getFormatOutput());

        session::getInstance()->setSuccess('El usuario fue activado exitosamente');
      } else {
        routing::getInstance()->redirect('userActived', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}