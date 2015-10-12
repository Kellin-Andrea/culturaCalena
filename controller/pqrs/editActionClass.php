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
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
         try {
      if (request::getInstance()->hasRequest(pqrsTableClass::ID)) {
        
        $fields = array(
           pqrsTableClass::ID,
           pqrsTableClass::TITULO,
            pqrsTableClass::CONTENIDO,
            pqrsTableClass::USUARIO_ID
            
            );
        $where = array(
           pqrsTableClass::ID => request::getInstance()->getRequest(pqrsTableClass::ID)
        );
        
        $this->objpqrs =pqrsTableClass::getAll($fields, true, null, null, null, null, $where);
        
        
        $fields2 = array(
           detallePqrsTableClass::RESPUESTA
           
        );
        
        
        $where2 = array(
           detallePqrsTableClass::ID => request::getInstance()->getRequest(pqrsTableClass::ID)
        );
        
        $this->objDetalle =detallePqrsTableClass::getAll($fields2, true, null, null, null, null, $where2);
        
       
        
        $fields1=array(tipoPqrsTableClass::ID, tipoPqrsTableClass::NOMBRE);
        
        $this->objtipoPqrs = tipoPqrsTableClass::getAll($fields1);
        
        $fields3=array(estadoPqrsTableClass::ID, estadoPqrsTableClass::NOMBRE);
        $this->objestado = estadoPqrsTableClass::getAll($fields3);
        
        $this->defineView('edit', 'pqrs', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('pqrs', 'index');
      }

    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
