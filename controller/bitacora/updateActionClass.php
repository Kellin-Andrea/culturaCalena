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
 * @category: Pertenece al controlador modulo bitacora.
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    
    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: string
     */
  public function execute() {
    try {
        /*
         * ¿los datos fueron actualizados?
         */
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::ID, true));
        $accion = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::ACCION, true));
        $tabla = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::TABLA, true));
        $reg = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::REGISTRO, true));
        $obs = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::OBSERVACION, true));
        $fecha = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, true));
        

        $ids = array(
            bitacoraTableClass::ID => $id
        );

        $data = array(
            bitacoraTableClass::ACCION => $accion,
            bitacoraTableClass::TABLA => $tabla,
            bitacoraTableClass::REGISTRO => $reg,
            bitacoraTableClass::OBSERVACION => $obs,
            bitacoraTableClass::FECHA => $fecha
        );

        bitacoraTableClass::update($ids, $data);
      }//end if

      routing::getInstance()->redirect('bitacora', 'index');
    }//end  try 
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }//end function

}//end class
