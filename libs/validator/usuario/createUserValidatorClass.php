<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;
    

    /**
     * Description of shfSecurityCreateUserValidationClass
     *
     * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
     */
    class createUserValidatorClass extends validatorClass {

        public static function validateInsert($user, $pass1, $pass2) {
            $flag = false;

           if (self::notBlank($user)) {
        $flag = true;
        session::getInstance()->setFlash('inputUser', true);
        session::getInstance()->setError('El nombre de usuario es requerido', 'inputUser');
      } else if (is_numeric($user)) {
        $flag = true;
        session::getInstance()->setFlash('inputUser', true);
        session::getInstance()->setError('El usuario no puede ser númerico', 'inputUser');
      } else if (strlen($user) > \usuarioTableClass::USER_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputUser', true);
        session::getInstance()->setError('El usuario digitado es mayor en cantidad de caracteres a lo permitido', 'inputUser');
      } else if (self::isUnique(\usuarioTableClass::ID, true, array(\usuarioTableClass::USER => trim($user)), \usuarioTableClass::getNameTable())) {
        $flag = true;
        session::getInstance()->setFlash('inputUser', true);
        session::getInstance()->setError('El usuario digitado ya existe', 'inputUser');
      }

      if (self::notBlank($pass1) or self::notBlank($pass2)) {
        $flag = true;
        session::getInstance()->setFlash('inputPass', true);
        session::getInstance()->setError('Las contraseñas son requeridas', 'inputPass');
      } else if (($pass1) !== ($pass2)) {
        $flag = true;
        session::getInstance()->setFlash('inputPass', true);
        session::getInstance()->setError('Las contraseñas no coinciden', 'inputPass');
      }


      
            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                routing::getInstance()->forward('usuario', 'insert');
            }
        }

    }

}