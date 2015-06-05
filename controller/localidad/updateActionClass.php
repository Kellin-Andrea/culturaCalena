<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editLocalidadValidatorClass as validator;
/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo localidad.
 */

class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
          
        $id = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::ID, true));    
        $nombre = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::NOMBRE, true));
       

        $ids = array(
            localidadTableClass::ID => $id
        );
        
         validator::validateEdit($nombre,$id);


        $data = array(
            localidadTableClass::NOMBRE => $nombre,
         
        );

        localidadTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('localidad', 'index');
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
