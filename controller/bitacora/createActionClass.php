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
class createActionClass extends controllerClass implements controllerActionInterface {
/**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: string .
     */

  public function execute() {
    try {
        /*
         * ¿todos los registros hansido registrados?
         */
      if (request::getInstance()->isMethod('POST')) {
          
          
          $accion = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::ACCION, true));
          $tabla = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::TABLA, true));
          $reg = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::REGISTRO, true));
          $obser = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::OBSERVACION, true));
          $fecha = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, true));
 

        //if (strlen($nombre) > categoriaTableClass::NOMBRE_LENGTH) {
          //throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => categoriaTableClass::NOMBRE_LENGTH)), 00001);
        

        $data = array(
       
            bitacoraTableClass::ACCION => $accion,
            bitacoraTableClass::TABLA => $tabla,
            bitacoraTableClass::REGISTRO => $reg,
            bitacoraTableClass::OBSERVACION => $obser,
            bitacoraTableClass::FECHA => $fecha
            
        );
        bitacoraTableClass::insert($data);
        routing::getInstance()->redirect('bitacora', 'index');
      }//end if 
      else {
        routing::getInstance()->redirect('bitacora', 'index');
      }//end else
    } //end try 
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }//end class

}