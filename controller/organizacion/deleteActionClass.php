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
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::ID, true));
        
        $ids = array(
        organizacionTableClass::ID => $id
        );
        organizacionTableClass::delete($ids, true);
        //routing::getInstance()->redirect('organizacion', 'index');
        $this->arrayAjax= array(
        'code' =>100,
        'msg'=> 'La elimincacion del registro fue exitosa'
        );
          $this->defineView('delete', 'organizacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('organizacion', 'index');
      }
       } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
