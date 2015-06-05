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
class editActionClass extends controllerClass implements controllerActionInterface {
    
/**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description string .
     */  
  public function execute() {
    try {
       /*
        * ¿los datos fueron editados?
        */
      if (request::getInstance()->hasRequest(bitacoraTableClass::ID)) {
        $fields = array(
            bitacoraTableClass::ID,
            bitacoraTableClass::ACCION,
            bitacoraTableClass::TABLA,
            bitacoraTableClass::OBSERVACION,
            bitacoraTableClass::REGISTRO,
            bitacoraTableClass::FECHA
           
        );
        $where = array(
            bitacoraTableClass::ID => request::getInstance()->getRequest(bitacoraTableClass::ID)
        );
        $this->objbitacora = bitacoraTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->defineView('edit', 'bitacora', session::getInstance()->getFormatOutput());
      }//end if 
      else {
        routing::getInstance()->redirect('bitacora', 'index');
      }//end else
//      if (request::getInstance()->isMethod('POST')) {
//
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//
//        if (strlen($usuario) > usuarioTableClass::USUARIO_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USUARIO_LENGTH)), 00001);
//        }
//
//        $data = array(
//            usuarioTableClass::USUARIO => $usuario,
//            usuarioTableClass::PASSWORD => md5($password)
//        );
//        usuarioTableClass::insert($data);
//        routing::getInstance()->redirect('default', 'index');
//      } else {
//        routing::getInstance()->redirect('default', 'index');
//      }
    }//end try
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }//end function

}//end class
