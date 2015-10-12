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
 * @category: Pertenece al controlador modulo Pqrs.
 */
class insertActionClass extends controllerClass implements controllerActionInterface {
  public function execute() {
    try {
    
    $fields = array(
     tipoPqrsTableClass::ID,
     tipoPqrsTableClass::NOMBRE
     );   
    $ordeBy = array(
    tipoPqrsTableClass::NOMBRE
    );
    
    $fields1 = array(
     estadoPqrsTableClass::ID,
     estadoPqrsTableClass::NOMBRE
     );   
    $ordeBy1 = array(
    estadoPqrsTableClass::NOMBRE
    );
    
    $this->objestado = estadoPqrsTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
    $this->objtipoPqrs = tipoPqrsTableClass::getAll($fields, true, $ordeBy, 'ASC');  
      $this->defineView('insert', 'pqrs', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }
}