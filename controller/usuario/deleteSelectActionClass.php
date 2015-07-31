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
class deleteSelectActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') and request::getInstance()->hasPost('chk')) {
        
        $idsToDelete = request::getInstance()->getPost('chk');
        
        foreach ($idsToDelete as $id) {
          $ids = array(
            usuarioTableClass::ID => $id
          );
          usuarioTableClass::delete($ids, true);
        }
        
        session::getInstance()->setSuccess('Los Elementos Seleccionados fueron Borrados Exitosamente');
        
        routing::getInstance()->redirect('default', 'index');
      } else {
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
