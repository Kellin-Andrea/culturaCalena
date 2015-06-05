<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editCategoriaValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo categoria .
 */

class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::ID, true));
        $nombre = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true));
        

        $ids = array(
            categoriaTableClass::ID => $id
        );
        
         validator::validateEdit($nombre, $id);

        $data = array(
            categoriaTableClass::NOMBRE => $nombre,
        );

        categoriaTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('categoria', 'index');
    }//end try 
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }//end function

}//end class
