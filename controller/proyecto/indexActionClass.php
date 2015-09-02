<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author kelly andrea manzano <kellinandrea18@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
   
    
    try { 
   
      
        $fields=array(
        eventoTableClass::ID,
        eventoTableClass::NOMBRE,
        eventoTableClass::DESCRIPCION,
        eventoTableClass::DIRECCION,
        eventoTableClass::COSTO,
        eventoTableClass::FECHA_INICIAL_EVENTO,
        eventoTableClass::FECHA_FINAL_EVENTO,
        eventoTableClass::IMAGEN 
        );
        
       $ordeBy=array(
        eventoTableClass::NOMBRE
        );

     


    
       $this->objProyecto = eventoTableClass::getAll($fields, true, $ordeBy, 'ASC');
     
       
      $this->defineView('index', 'proyecto', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
