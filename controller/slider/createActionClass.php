<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;
use mvc\validator\createUserValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') === true) {


        $files = request::getInstance()->getFile(sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true));
        $name = request::getInstance()->getPost(sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true));





        //var_export($user);
        //exit();

        $data = array(
            sliderImageTableClass::IMAGEN => $this->generateImageName($files),
            sliderImageTableClass::NOMBRE => $name
        );

        $id = sliderImageTableClass::insert($data);


     
        routing::getInstance()->redirect('slider', 'index');
        session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
      } else {
        routing::getInstance()->redirect('', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function generateImageName($file) {
    $ext = null;
    switch ($file['type']) {
      case 'image/png':
        $ext = '.png';
        break;
      case 'image/jpeg':
        $ext = '.jpg';
        break;
      case 'image/jpg':
        $ext = '.jpg';
        break;
      case 'image/gif':
        $ext = '.gif';
        break;
    }
    $answer =  md5($file['name'] . date(config::getFormatTimestamp())) . $ext;
    move_uploaded_file($file['tmp_name'], config::getPathAbsolute() . 'web/slider/' . $answer);
    return $answer;
  }

}
