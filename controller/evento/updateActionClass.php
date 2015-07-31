<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editEventoValidatorClass as validator;


/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo evento.
 */

class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
                
                $id = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::ID, true));
                $nameEvent = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::NOMBRE, true));
                $description = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true));
                $address = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true));
                $money = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true));
                $place = request::getInstance()->getPost('googleMapLatitud');
                $long = request::getInstance()->getPost('googleMapLongitud');
                
                validator::validateEdit($nameEvent, $description,$address, $money, $place, $long, $id);


        $ids = array(
            eventoTableClass::ID => $id
        );

        $data = array(
        eventoTableClass::ID => $id,
        eventoTableClass::NOMBRE => $nameEvent,
        eventoTableClass::DESCRIPCION => $description,
        eventoTableClass::DIRECCION => $address,
        eventoTableClass::COSTO => $money,
        eventoTableClass::LUGAR_LATITUD => $place,
        eventoTableClass::LUGAR_LONGITUD => $long
        );

        eventoTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('evento', 'index');
     } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
