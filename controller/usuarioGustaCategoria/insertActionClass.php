<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
        
      
        
        $fields = array(
                categoriaTableClass::ID,
                categoriaTableClass::NOMBRE
            );
        $ordeBy = array(
                categoriaTableClass::NOMBRE
            );
       $fields1 = array (
            usuarioTableClass::ID,
            usuarioTableClass::USER
     
        );
        
        $orderBy1 = array(
            usuarioTableClass::USER
        );
      $this->objUsuarios = usuarioTableClass::getAll($fields1, true, $orderBy1, 'ASC'); 
      $this->objcategoria = categoriaTableClass::getAll($fields, true, $ordeBy, 'ASC');; 
      $this->defineView('insert', 'usuarioGustaCategoria', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
