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
class indexActionClass extends controllerClass implements controllerActionInterface {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: string
     */
  public function execute() {
    try {

      $fields = array(
          bitacoraTableClass::ID,
          bitacoraTableClass::ACCION,
          bitacoraTableClass::TABLA,
          bitacoraTableClass::OBSERVACION,
          bitacoraTableClass::REGISTRO,
          bitacoraTableClass::FECHA,
          
      );
      $orderBy = array(
          bitacoraTableClass::ACCION
      );
      $this->objbitacora = bitacoraTableClass::getAll($fields, false, $orderBy, 'ASC');
      $this->defineView('index', 'bitacora', session::getInstance()->getFormatOutput());
    }//end try
    catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }//end catch
  }//end  function

}//end class
