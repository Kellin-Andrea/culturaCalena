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
         
        $fields = array(
        sliderImageTableClass::ID,
        sliderImageTableClass::IMAGEN,
        sliderImageTableClass::NOMBRE,
        sliderImageTableClass::POSICION
        );
       
        
       
                
        
       $this->objSlider = sliderImageTableClass::getAll($fields, FALSE);
  
       $this->defineView('insert', 'slider', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
  
       }
   }
 }
