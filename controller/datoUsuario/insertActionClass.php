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
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
          
     
        $fields1 = array(
        localidadTableClass::ID,
        localidadTableClass::NOMBRE
        );
        
        $orderBy1 = array(
        localidadTableClass::NOMBRE
        );
        
        $fields2 = array(
        tipoDocumentoTableClass::ID,
        tipoDocumentoTableClass::NOMBRE
        );
        
        $orderBy2 = array(
        tipoDocumentoTableClass::NOMBRE
        );
        
        $fields3 = array(
        organizacionTableClass::ID,
        organizacionTableClass::NOMBRE
        );
          
        $orderBy3 = array(
        organizacionTableClass::NOMBRE
        );
        
        $this->objlocal = localidadTableClass::getAll($fields1, true, $orderBy1, 'ASC');
        $this->objtipoDocumento = tipoDocumentoTableClass::getAll($fields2, true, $orderBy2, 'ASC');
        $this->objorganizacion = organizacionTableClass::getAll($fields3, true, $orderBy3, 'ASC');
     
      $this->defineView('insert', 'datoUsuario', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}