<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editUserValidatorClass as validator;


/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost( sliderImageTableClass::getNameField(sliderImageTableClass::ID, true));
        $files = request::getInstance()->getPost(sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true));
        $nombre = request::getInstance()->getPost(sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true));
       

        $ids = array(
        sliderImageTableClass::ID => $id
        );
        
     

        $data = array(
        sliderImageTableClass::NOMBRE=>$nombre
        );

        sliderImageTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('slider', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
