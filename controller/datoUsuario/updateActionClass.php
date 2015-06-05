<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editDatoUsuarioValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true));
        $name = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
        $lastName = request:: getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true));
        $mail = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true));
        
         

        $ids = array(
            datoUsuarioTableClass::ID => $id
        );
        
       validator::validateEdit($name,$lastName,$mail,$id );


        $data = array(
                datoUsuarioTableClass::NOMBRE => $name,
                datoUsuarioTableClass::APELLIDO => $lastName,
                datoUsuarioTableClass::CORREO => $mail,
               
        );

        datoUsuarioTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('datoUsuario', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
