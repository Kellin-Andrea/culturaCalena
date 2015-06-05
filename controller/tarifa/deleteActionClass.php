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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::ID, true));
        
        $ids = array(
            tarifaTableClass::ID => $id
        );
        tarifaTableClass::delete($ids, true);
        $this->arrayAjax = array(
            'code' => 100,
            'msg' => 'La eliminacion fue exitosa'
        ); 
        
          $this->defineView('delete', 'tarifa', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('tarifa', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
