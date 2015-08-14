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
                $date = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true));
                $date1 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true));
                $address = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true));
                $money = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true));
                //$user = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, ''));
                $category = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true));
                $datePublic = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true));
                $datePublic1 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true));
                $place = request::getInstance()->getPost('googleMapLatitud');
                $long = request::getInstance()->getPost('googleMapLongitud');
//        
                validator::validateEdit($nameEvent, $description, $date, $date1, $address, $money, $category, $datePublic, $datePublic1, $place, $long, $id);


                $ids = array(
                    eventoTableClass::ID => $id
                );

                $data = array(
                    eventoTableClass::ID => $id,
                    eventoTableClass::NOMBRE => $nameEvent,
                    eventoTableClass::DESCRIPCION => $description,
                    eventoTableClass::FECHA_INICIAL_EVENTO => $date,
                    eventoTableClass::FECHA_FINAL_EVENTO => $date1,
                    eventoTableClass::DIRECCION => $address,
                    eventoTableClass::COSTO => $money,
                    //eventoTableClass::USUARIO_ID => $user,                
                    eventoTableClass::CATEGORIA_ID => $category,
                    eventoTableClass::FECHA_INICIAL_PUBLICACION => $datePublic,
                    eventoTableClass::FECHA_FINAL_PUBLICACION => $datePublic1,
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
