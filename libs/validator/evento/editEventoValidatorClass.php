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

    public static function validateEdit($nameEvent, $description,$address, $money, $place, $long, $id) {
      $flag = false;
      
      if (self::notBlank($nameEvent)) {
        $flag = true;
        session::getInstance()->setFlash('inputnameEvent', true);
        session::getInstance()->setError('El nombre del evento es obligatorio', 'inputnameEvent');
      } else if (is_numeric($nameEvent)) {
        $flag = true;
        session::getInstance()->setFlash('inputnameEvent', true);
        session::getInstance()->setError('El nombre del evento puede ser númerico', 'inputnameEvent');
      } else if(strlen($nameEvent) > \eventoTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputnameEvent', true);
        session::getInstance()->setError('El nombre del evento excede los caracteres  permitidos', 'inputnameEvent');
      }
      
   

//      $type = array(
//          'image/png',
//          'image/jpeg',
//          'image/jpg',
//          'image/gif'
//      );
//      if ($image['error'] !== 0) {
//        $flag = true;
//        session::getInstance()->setFlash('inputFile', true);
//        session::getInstance()->setError('Ocurrio un error en la carga de la imágen, por favor vuelva a intentarlo', 'inputFile');
//      } else if ((array_search($image['type'], $type) === false)) {
//        $flag = true;
//        session::getInstance()->setFlash('inputFile', true);
//        session::getInstance()->setError('Solo se permiten imágenes del tipo jpg, png o gif', 'inputFile');
//      } else if ($image['size'] > 200000) {
//        $flag = true;
//        session::getInstance()->setFlash('inputFile', true);
//        session::getInstance()->setError('Solo se permiten imágenes con un tamaño máximo de 150kB', 'inputFile');
//      } else if ($flag === true) {
//        session::getInstance()->setFlash('inputFile', true);
//        session::getInstance()->setError('Debido a errores en el formulario, por favor vuelve a cargar la imagen que vas a usar', 'inputFile');
//      }


      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\eventoTableClass::ID => $id));
        routing::getInstance()->forward('evento', 'edit');
      }
    }

  }

}