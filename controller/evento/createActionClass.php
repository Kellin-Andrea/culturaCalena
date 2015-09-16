<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createEventoValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author:
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo evento.
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $files = request::getInstance()->getFile(eventoTableClass::getNameField(eventoTableClass::IMAGEN, true));
        $nameEvent = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::NOMBRE, true));
        $description = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true));
        $date = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true));
        $date1 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true));
        $address = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true));
        $money = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true));
        //$user = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, true));
        $category = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true));
        $datePublic = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true));
        $datePublic1 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true));
        $place = request::getInstance()->getPost('googleMapLatitud');
        $long = request::getInstance()->getPost('googleMapLongitud');

        validator::validateInsert($files, $nameEvent, $description, $date, $date1, $address, $money, $category, $datePublic, $datePublic1, $place, $long);
      
      

        $data = array(
            eventoTableClass::IMAGEN => $this->generateImageName($files),
            eventoTableClass::NOMBRE => $nameEvent,
            eventoTableClass::DESCRIPCION => $description,
            eventoTableClass::FECHA_INICIAL_EVENTO => $date,
            eventoTableClass::FECHA_FINAL_EVENTO => $date1,
            eventoTableClass::DIRECCION => $address,
            eventoTableClass::COSTO => $money,
            eventoTableClass::USUARIO_ID => session::getInstance()->getUserId(),
            eventoTableClass::CATEGORIA_ID => $category,
            eventoTableClass::FECHA_INICIAL_PUBLICACION => $datePublic,
            eventoTableClass::FECHA_FINAL_PUBLICACION => $datePublic1,
            eventoTableClass::LUGAR_LATITUD => $place,
            eventoTableClass::LUGAR_LONGITUD => $long
        );

        eventoTableClass::insert($data);

        session::getInstance()->hasCredential('admin')?routing::getInstance()->redirect('evento', 'index'):routing::getInstance()->redirect('proyecto', 'index');
      } else {
        session::getInstance()->hasCredential('admin')?routing::getInstance()->redirect('evento', 'index'):routing::getInstance()->redirect('proyecto', 'index');
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
    $answer = md5($file['name'] . date(config::getFormatTimestamp())) . $ext;
    move_uploaded_file($file['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $answer);
    return $answer;
  }

}
