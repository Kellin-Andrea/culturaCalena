<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of createEventoValidatorClass
   *
   * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
   */
  class editEventoValidatorClass extends validatorClass {

  public static function validateEdit($nameEvent, $description, $date, $date1, $address, $money, $category, $datePublic, $datePublic1, $place, $long,$id) {
            $flag = false;

              if (self::notBlank($nameEvent)) {
                $flag = true;
                session::getInstance()->setFlash('inputnameEvent', true);
                session::getInstance()->setError('El nombre del evento es obligatorio', 'inputnameEvent');
            } else if (is_numeric($nameEvent)) {
                $flag = true;
                session::getInstance()->setFlash('inputnameEvent', true);
                session::getInstance()->setError('El nombre del evento no puede ser númerico', 'inputnameEvent');
            } else if (strlen($nameEvent) > \eventoTableClass::NOMBRE_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputnameEvent', true);
                session::getInstance()->setError('El nombre del evento excede los caracteres  permitidos', 'inputnameEvent');
            }

            if (self::notBlank($description)) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion del evento es obligatorio', 'inputdescription');
            } else if (is_numeric($description)) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion del evento no puede ser númerico', 'inputdescription');
            } else if (strlen($description) > \eventoTableClass::DESCRIPCION_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion del evento excede los caracteres  permitidos', 'inputdescription');
            }

            if (self::notBlank($date)) {
                $flag = true;
                session::getInstance()->setFlash('inputdate', true);
                session::getInstance()->setError('la fecha inicial del evento es obligatoria', 'inputdate');
            } else if (strtotime($date) <= strtotime(date(config::getFormatTimestamp()))) {
                $flag = true;
                session::getInstance()->setFlash('inputdate', true);
                session::getInstance()->setError('La fecha  inicial del evento no puede ser menor o igual a la de hoy', 'inputdate');
            } else if (strtotime($date) <= strtotime(date(config::getFormatTimestamp())));
           

            if (self::notBlank($date1)) {
                $flag = true;
                session::getInstance()->setFlash('inputdate1', true);
                session::getInstance()->setError('la fecha final del evento es obligatorio', 'inputdate1');
            } else if (strtotime($date1) <= strtotime(date(config::getFormatTimestamp()))) {
                $flag = true;
                session::getInstance()->setFlash('inputdate1', true);
                session::getInstance()->setError('La fecha final del evento no puede ser menor o igual a la fecha inicial del evento', 'inputdate1');
            }


            if (self::notBlank($address)) {
                $flag = true;
                session::getInstance()->setFlash('inputaddress', true);
                session::getInstance()->setError('la direccion del evento es obligatorio', 'inputaddress');
            } else if (strlen($address) > \eventoTableClass::DIRECCION_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputaddress', true);
                session::getInstance()->setError('la direccion del evento excede los caracteres  permitidos', 'inputaddress');
            }

            if ($money != 0 and self::notBlank($money)) {
                $flag = true;
                session::getInstance()->setFlash('inputmoney', true);
                session::getInstance()->setError('el costo del evento es obligatorio', 'inputmoney');
            }

            if (self::notBlank($category)) {
                $flag = true;
                session::getInstance()->setFlash('inputcategory', true);
                session::getInstance()->setError('Debes selecionar una categoria', 'inputcategory');
            }

            if (self::notBlank($datePublic)) {
                $flag = true;
                session::getInstance()->setFlash('inputdatePublic', true);
                session::getInstance()->setError('la fecha inicial de publicacion del evento es obligatorio', 'inputdatePublic');
            } else if (strtotime($date1) <= strtotime(date(config::getFormatTimestamp()))) {
                $flag = true;
                session::getInstance()->setFlash('inputdatePublic', true);
                session::getInstance()->setError('La fecha inicial de publicacion del evento no puede ser menor o igual a la fecha inicial del evento', 'inputdatePublic');
            }

            if (self::notBlank($datePublic1)) {
                $flag = true;
                session::getInstance()->setFlash('inputdatePublic1', true);
                session::getInstance()->setError('la fecha final de publicacion del evento es obligatorio', 'inputdatePublic1');
            } else if (strtotime($date1) <= strtotime(date(config::getFormatTimestamp()))) {
                $flag = true;
                session::getInstance()->setFlash('inputdatePublic1', true);
                session::getInstance()->setError('La fecha final de publicacion del evento no puede ser menor o igual a la fecha inicial del evento', 'inputdatePublic1');
            }

            if ($flag === true) {
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array('id' => $id));
                routing::getInstance()->forward('evento', 'edit');
            }
        }

    }

}