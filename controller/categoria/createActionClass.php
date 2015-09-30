<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createCategoriaValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo categoria .
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {


        $nombre = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true));


        //if (strlen($nombre) > categoriaTableClass::NOMBRE_LENGTH) {
        //throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => categoriaTableClass::NOMBRE_LENGTH)), 00001);

        validator::validateInsert($nombre);

        $data = array(
            categoriaTableClass::NOMBRE => $nombre,
        );
        categoriaTableClass::insert($data);
        routing::getInstance()->redirect('categoria', 'index');
        session::getInstance()->setSuccess('El Registro Fue Registrado Exitosamente');
           
      }//end if 
      else {
        routing::getInstance()->redirect('categoria', 'index');
      }//end else
    }//end try 
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }

//end function
}

//end class