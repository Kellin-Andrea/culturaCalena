<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editestadoPqrsValidatorClass as validator;
/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID, true));
        $nombre = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true));


        $ids = array(
            estadoPqrsTableClass::ID => $id
        );

        
         validator::validateEdit($nombre, $id);
        
        $data = array(
            estadoPqrsTableClass::NOMBRE => $nombre,
           
        );

        estadoPqrsTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('estadoPqrs', 'index');
    } catch (PDOException $exc) {
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
