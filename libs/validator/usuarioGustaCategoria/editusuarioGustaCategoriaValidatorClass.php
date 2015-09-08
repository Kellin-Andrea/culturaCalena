<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of createusuarioGustaCategoriaValidatorClass
   *
   * @author DIANA MARCELA HORMIGA <dianamarce0294@hotmail.com>
   */
  class editusuarioGustaCategoriaValidatorClass extends validatorClass {

    public static function validateEdit($cat, $usu,$id) {
            $flag = false;

            if (self::notBlank($cat)) {
                $flag = true;
                session::getInstance()->setFlash('inputcat', true);
                session::getInstance()->setError('Debes selecionar una categoria', 'inputcat');
            }




            if (self::notBlank($usu)) {
                $flag = true;
                session::getInstance()->setFlash('inputusu', true);
                session::getInstance()->setError('Debes selecionar un usuario', 'inputusu');
            }



            
      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\usuarioGustaCategoriaTableClass::ID=> $id));
        routing::getInstance()->forward('usuarioGustaCategoria', 'edit');
      }
    }

  }

}